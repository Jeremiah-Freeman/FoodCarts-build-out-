<?php
class City
{
    private $city_name;
    private $id;

    function __construct($city_name, $id=null)
    {
        $this->city_name = $city_name;
        $this->id = $id;
    }

    function setCityName($new_city_name)
    {
        $this->city_name = $new_city_name;
    }

    function getCityName()
    {
        return $this->city_name;
    }

    function getId()
    {
        return $this->id;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO cities (city_name) VALUES ('{$this->getCityName()}')");
        $this->id= $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
        $returned_cities = $GLOBALS['DB']->query("SELECT * FROM cities;");
        $cities = array();
        foreach($returned_cities as $city) {
            $new_city_name = $city['city_name'];
            $id = $city['id'];
            $new_city_name = new City($new_city_name, $id);
            array_push($cities, $new_city_name);
        }
        return $cities;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM cities;");
    }

    static function find($search_id)
    {
        $found_city = null;
        $cities = City::getAll();
        foreach($cities as $city) {
            $city_id = $city->getId();
            if ($city_id == $search_id) {
                $found_city = $city;
            }
        }
        return $found_city;
    }




}



?>
