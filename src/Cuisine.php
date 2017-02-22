<?php
class Cuisine
{
    private $type;
    private $id;

    function __construct($type, $id=null)
    {
        $this->type = $type;
        $this->id = $id;
    }

    function setType($new_type)
    {
        $this->type = $new_type;
    }

    function getType()
    {
        return $this->type;
    }

    function getId()
    {
        return $this->id;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO cuisines (type) VALUES ('{$this->getType()}')");
        $this->id= $GLOBALS['DB']->lastInsertId();
    }

    function getCarts()
    {
        $carts = Array();
        $returned_carts = $GLOBALS['DB']->query("SELECT * FROM carts WHERE cuisine_id = {$this->getId()};");
        foreach($returned_carts as $cart) {
            $name = $cart['name'];
            $id = $cart['id'];
            $cuisine_id = $cart['cuisine_id'];
            $street = $cart['street'];
            $city = $cart['city'];
            $state = $cart['state'];
            $zip = intval($cart['zip']);
            $phone = $cart['phone'];
            $url = $cart['url'];
            $new_cart = new Cart($name, $id, $cuisine_id,$street,$city,$state,$zip,$phone,$url);
            array_push($carts, $new_cart);
        }
        return $carts;
    }
    function update($new_type)
    {
        $GLOBALS['DB']->exec("UPDATE cuisines SET type = '{$new_type}' WHERE id = {$this->getId()};");
        $this->setName($new_type);
    }
    function delete()
    {
        $GLOBALS['DB']->exec("DELETE FROM cuisines WHERE id = {$this->getId()};");
        $GLOBALS['DB']->exec("DELETE FROM carts WHERE cuisine_id = {$this->getId()};");
    }

    static function getAll()
    {
        $returned_cuisines = $GLOBALS['DB']->query("SELECT * FROM cuisines;");
        $cuisines = array();
        foreach($returned_cuisines as $cuisine) {
            $cuisine_type = $cuisine['type'];
            $id = $cuisine['id'];
            $new_type = new Cuisine($cuisine_type, $id);
            array_push($cuisines, $new_type);
        }
        return $cuisines;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM cuisines;");
    }

    static function find($search_id)
    {
        $found_cuisine = null;
        $cuisines = Cuisine::getAll();
        foreach($cuisines as $cuisine) {
            $cuisine_id = $cuisine->getId();
            if ($cuisine_id == $search_id) {
                $found_cuisine = $cuisine;
            }
        }
        return $found_cuisine;
    }




}



?>
