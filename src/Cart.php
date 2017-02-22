<?php
    class Cart
    {
        private $name;
        private $id;
        private $cuisine_id;
        private $street;
        private $city;
        private $state;
        private $zip;
        private $phone;
        private $url;

        function __construct($name, $id = null, $cuisine_id, $street, $city, $state, $zip, $phone, $url)
        {
            $this->name = $name;
            $this->id = $id;
            $this->cuisine_id = $cuisine_id;
            $this->street = $street;
            $this->city = $city;
            $this->state = $state;
            $this->zip = $zip;
            $this->phone = $phone;
            $this->url = $url;
        }
        // getters
        function getName()
        {
            return $this->name;
        }
        function getCuisineId()
        {
            return $this->cuisine_id;
        }
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
        function getPhone()
        {
            return $this->phone;
        }
        function getUrl()
        {
            return $this->url;
        }

        //setters
        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }
        function setCuisineId($new_cuisine_id)
        {
            $this->cuisine_id = (string) $new_cuisine_id;
        }
        function setStreet($new_street)
        {
            $this->street = (string) $new_street;
        }
        function setCity($new_city)
        {
            $this->city = (string) $new_city;
        }
        function setState($new_state)
        {
            $this->state = (string) $new_state;
        }
        function setZip($new_zip)
        {
            $this->zip = (string) $new_zip;
        }
        function setPhone($new_phone)
        {
            $this->phone = (string) $new_phone;
        }
        function setUrl($new_url)
        {
            $this->url = (string) $new_url;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO carts (name, cuisine_id, street, city, state, zip, phone, url) VALUES ('{$this->getName()}', {$this->getCuisineId()}, '{$this->getStreet()}','{$this->getCity()}','{$this->getState()}',{$this->getZip()},'{$this->getPhone()}','{$this->getUrl()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }
        static function getAll()
        {
            $returned_carts = $GLOBALS['DB']->query("SELECT * FROM carts;");
            $carts = array();
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
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM carts;");
        }
        function getId()
        {
            return $this->id;
        }
        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE carts SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        static function find($search_id)
        {
            $found_cart = null;
            $carts = Cart::getAll();
            foreach($carts as $cart){
                $cart_id = $cart->getId();
                if($cart_id == $search_id) {
                    $found_cart = $cart;
                }
            }
            return $found_cart;
        }
    }
?>
