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

    // // setter methods
    // function setAddress($street, $city, $state, $zip)
    // {
    //     $this->street = $street;
    //     $this->city = $city;
    //     $this->state = $state;
    //     $this->zip = $zip;
    // }
    function save()
    {
        // $GLOBALS['DB']->exec("INSERT INTO cities (city_name) VALUES ({$this->getCity()})");
        // $this->city_id= $GLOBALS['DB']->lastInsertId();
        // echo "City Name: " . $this->getCity() . "\n";
        // echo "City ID: " . $this->getCityId() . "\n";
        //
        // $GLOBALS['DB']->exec("INSERT INTO states (state_name) VALUES ({$this->getState()})");
        // $this->state_id= $GLOBALS['DB']->lastInsertId();
        //
        // // echo "State Name: " . $this->getState() . "\n";
        // // echo "State ID: " . $this->getStateId() . "\n";
        //
        // $GLOBALS['DB']->exec("INSERT INTO addresses (city_id, state_id, street, zip) VALUES ({$this->getCityId()},{$this->getStateId()},'{$this->getStreet()}',{$this->getzip()})");
        // $this->id= $GLOBALS['DB']->lastInsertId();

        // echo "Address ID: " . $this->getId() . "\n";
    }
    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM addresses;");
    }
    static function getAll()
    {
        // $returned_addresses = $GLOBALS['DB']->query("SELECT * FROM addresses ");
        // $addresses = array();
        // foreach($returned_addresses as $address) {
        //     $address_street = $address['street'];
        //     $address_zip = $address['zip'];
        //     $address_id = $address['id'];
        //     $address_city = "HELLO";
        //     $address_state = "Hello";

            // echo "Inside getALL \n";
            // echo $address_street;
            // // echo $address_city;
            // // echo $address_state;
            //
            // var_dump($address);
            //
            //
            // $new_type = new Address($address_street, $address_city, $address_state, $address_zip, $address_id);
            // array_push($addresses, $new_type);
        //}
        //return $addresses;
    }
}
?>
