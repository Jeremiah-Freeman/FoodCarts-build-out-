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
    function __construct($street, $city, $state, $zip)
    {
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
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
        $GLOBALS['DB']->exec("INSERT INTO cities (city_name) VALUES ({$this->getCity()})");
        $this->city_id= $GLOBALS['DB']->lastInsertId();

        $GLOBALS['DB']->exec("INSERT INTO states (state_name) VALUES ({$this->getState()})");
        $this->state_id= $GLOBALS['DB']->lastInsertId();

        $GLOBALS['DB']->exec("INSERT INTO addresses (city_id, state_id, street, zip) VALUES ({$this->getCityId()},{$this->getStateId()},'{$this->getStreet()}',{$this->getzip()})");
        $this->id= $GLOBALS['DB']->lastInsertId();
    }
}
?>
