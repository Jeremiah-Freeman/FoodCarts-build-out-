<?php
// Address class definition.
class Address
{
    // private object properties
    private $street;
    private $city;
    private $state;
    private $zip;
    private $city_id;
    private $state_id;
    private $id;
    // address object constructor
    function __construct($street, $city, $state, $zip, $id=null)
    {
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->id = $id;
    }
    // getter methods
    function getStreet()
    {
        return $this->street;
    }
    function getCity()
    {
        return $this->city;
    }
    function getState()
    {
        return $this->state;
    }
    function getZip()
    {
        return $this->zip;
    }
    function getId()
    {
        return $this->id;
    }
    function getStateId()
    {
        return $this->state_id;
    }
    function getCityId()
    {
        return $this->city_id;
    }
    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO addresses (city_id, state_id, street, zip) VALUES ({$this->city->getId()},{$this->state->getId()},'{$this->getStreet()}',{$this->getzip()})");
        $this->id= $GLOBALS['DB']->lastInsertId();
    }
    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM addresses;");
    }
    static function getAll()
    {
        $returned_addresses = $GLOBALS['DB']->query("SELECT * FROM addresses ");
        $addresses = array();
        foreach($returned_addresses as $address) {
            $address_street = $address['street'];
            $address_zip = $address['zip'];
            $address_id = $address['id'];
            $address_city = City::find($address['city_id']);
            $address_state = State::find($address['state_id']);
            $new_type = new Address($address_street, $address_city, $address_state, $address_zip, $address_id);
            array_push($addresses, $new_type);
        }
        return $addresses;
    }
    static function find($search_id)
    {
        $found_address = null;
        $addresses = Address::getAll();
        foreach($addresses as $address) {
            $address_id = $address->getId();
            if ($address_id == $search_id) {
                $found_address = $address;
            }
        }
        return $found_address;
    }
}
?>
