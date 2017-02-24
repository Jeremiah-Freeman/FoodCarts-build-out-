<?php
// Cart class definition.
class Cart
{
    // private object properties
    private $cuisine_id;
    private $cuisine;
    private $name_id;
    private $name;
    private $address_id;
    private $address;
    private $profile_id;
    private $profile;
    private $promotion_id;
    private $promotion;
    private $phone;
    private $id;
    private $url;
    private $cart_image_url;

    // cart object constructor
    function __construct($address, $cuisine, $phone, $profile, $promotion, $name, $url,$cart_image_url, $id=null)
    {
        $this->address= $address;
        $this->cuisine = $cuisine;
        $this->phone = $phone;
        $this->profile = $profile;
        $this->promotion = $promotion;
        $this->name = $name;
        $this->url = $url;
        $this->id = $id;
        $this->cart_image_url = $cart_image_url;
    }

    // getter methods
    function getAddress()
    {
        return $this->address;
    }
    function getCuisine()
    {
        return $this->cuisine;
    }
    function getPhone()
    {
        return $this->phone;
    }
    function getProfile()
    {
        return $this->profile;
    }
    function getPromotion()
    {
        return $this->promotion;
    }
    function getName()
    {
        return $this->name;
    }
    function getUrl()
    {
        return $this->url;
    }
    function getId()
    {
        return $this->id;
    }
    function getCartImageUrl()
    {
        return $this->cart_image_url;
    }

    //id's

    function getCuisineId()
    {
        return $this->cuisine_id;
    }
    function getNameId()
    {
        return $this->name_id;
    }
    function getAddressId()
    {
        return $this->address_id;
    }
    function getProfileId()
    {
        return $this->profile_id;
    }
    function getPromotionId()
    {
        return $this->promotion_id;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO carts (address_id, cuisine_id, name_id, cart_id, profile_id, promotion_id, phone, url, cart_image_url) VALUES ({$this->address->getId()}, {$this->cuisine->getId()},{$this->name->getId()}, {$this->cart->getId()}, {$this->profile->getId()}, {$this->promotion->getId()},  '{$this->getPhone()}','{$this->getUrl()}', '{$this->getCartImageUrl()}')");
        $this->id= $GLOBALS['DB']->lastInsertId();

    }
    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM carts;");
    }
    static function getAll()
    {
        $returned_carts = $GLOBALS['DB']->query("SELECT * FROM carts ");
        $carts = array();
        foreach($returned_carts as $cart) {
            $cart_phone = $cart['phone'];
            $cart_url = $cart['url'];
            $cart_id = $cart['id'];
            $cart_image_url = $cart['cart_image_url'];
            $cart_cuisine = Cuisine::find($cart['cuisine_id']);
            $cart_name = Cart_Name::find($cart['name_id']);
            $cart_address = Address::find($cart['address_id']);
            $cart_profile = Profile::find($cart['profile_id']);
            $cart_promotion = Promotion::find($cart['promotion_id']);

            $new_type = new Cart($cart_address, $cart_cuisine, $cart_phone, $cart_profile, $cart_promotion, $cart_name, $cart_url, $cart_image_url, $cart_id);
            array_push($carts, $new_type);
        }
        return $carts;
    }


    static function find($search_id)
    {
        $found_cart = null;
        $carts = Cart::getAll();
        foreach($carts as $cart) {
            $cart_id = $cart->getId();
            if ($cart_id == $search_id) {
                $found_cart = $cart;
            }
        }
        return $found_cart;
    }
}
?>
