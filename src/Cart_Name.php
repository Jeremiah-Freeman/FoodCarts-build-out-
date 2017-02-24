<?php
class Cart_Name
{
    private $cart_name;
    private $id;

    function __construct($cart_name, $id=null)
    {
        $this->cart_name = $cart_name;
        $this->id = $id;
    }

    function setCartName($new_cart_name)
    {
        $this->cart_name = $new_cart_name;
    }

    function getCartName()
    {
        return $this->cart_name;
    }

    function getId()
    {
        return $this->id;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO cart_names (cart_name) VALUES ('{$this->getCartName()}')");
        $this->id= $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
        $returned_cart_names = $GLOBALS['DB']->query("SELECT * FROM cart_names;");
        $cart_names = array();
        foreach($returned_cart_names as $cart_name) {
            $new_cart_name = $cart_name['cart_name'];
            $id = $cart_name['id'];
            $new_cart_name = new Cart_Name($new_cart_name, $id);
            array_push($cart_names, $new_cart_name);
        }
        return $cart_names;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM cart_names;");
    }

    static function find($search_id)
    {
        $found_cart_name = null;
        $cart_names = Cart_Name::getAll();
        foreach($cart_names as $cart_name) {
            $cart_name_id = $cart_name->getId();
            if ($cart_name_id == $search_id) {
                $found_cart_name = $cart_name;
            }
        }
        return $found_cart_name;
    }

}

?>
