<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/
require_once "src/Profile.php";
require_once "src/Cuisine.php";
require_once "src/Cart_Name.php";
require_once "src/Promotion.php";
require_once "src/Profile.php";
require_once "src/Address.php";
require_once "src/First_Name.php";
require_once "src/Last_Name.php";
require_once "src/City.php";
require_once "src/State.php";
require_once "src/Cart.php";

$server = 'mysql:host=localhost:8889;dbname=cart_app_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

class CartTest extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        Cart::deleteAll();

    }

    function test_save()
    {
        //Arrange
        $story = "12345 ne dog";
        $first_name = new First_Name("portland");
        $first_name->save();
        $last_name = new Last_Name("Guam");
        $last_name->save();
        $photo_url = "tester";
        $test_profile = new Profile($story, $first_name, $last_name, $photo_url);
        $test_profile->save();
        $promotion = new Promotion("a buck off");
        $promotion->save();
        $cuisine = new Cuisine("thai");
        $cuisine->save();
        $cart_name = new Cart_Name("thai me up");
        $cart_name->save();
        $street = "12345 ne dog";
        $city = new City("portland");
        $city->save();
        $state = new State("Guam");
        $state->save();
        $zip = 97230;
        $test_address = new Address($street, $city, $state, $zip);
        $test_address->save();
        $phone = "33333333";
        $url = "www.thai.com";
        $test_cart_image = "www.cartpictrue.com";
        $test_cart = new Cart($test_address, $cuisine, $phone, $test_profile, $promotion, $cart_name, $url, $test_cart_image);
        $test_cart->save();


        //Act
        $result = Cart::getAll();

        //Assert
        $this->assertEquals($test_cart, $result[0]);
    }
    //
    function test_getAll()
    {
        //Arrange
        $story = "12345 ne dog";
        $first_name = new First_Name("portland");
        $first_name->save();
        $last_name = new Last_Name("Guam");
        $last_name->save();
        $photo_url = "tester";
        $test_profile = new Profile($story, $first_name, $last_name, $photo_url);
        $test_profile->save();
        $promotion = new Promotion("a buck off");
        $promotion->save();
        $cuisine = new Cuisine("thai");
        $cuisine->save();
        $cart_name = new Cart_Name("thai me up");
        $cart_name->save();
        $street = "12345 ne dog";
        $city = new City("portland");
        $city->save();
        $state = new State("Guam");
        $state->save();
        $zip = 97230;
        $test_address = new Address($street, $city, $state, $zip);
        $test_address->save();
        $phone = "33333333";
        $url = "www.thai.com";
        $test_cart_image = "www.cartpictrue.com";
        $test_cart = new Cart($test_address, $cuisine, $phone, $test_profile, $promotion, $cart_name, $url, $test_cart_image);
        $test_cart->save();

        $story2 = "12345 ne dog";
        $first_name2 = new First_Name("portland");
        $first_name2->save();
        $last_name2 = new Last_Name("Guam");
        $last_name2->save();
        $photo_url2 = "tester";
        $test_profile2 = new Profile($story2, $first_name2, $last_name2, $photo_url2);
        $test_profile2->save();
        $promotion2 = new Promotion("a buck off");
        $promotion2->save();
        $cuisine2 = new Cuisine("thai");
        $cuisine2->save();
        $cart_name2 = new Cart_Name("thai me up");
        $cart_name2->save();
        $street2 = "12345 ne dog";
        $city2 = new City("portland");
        $city2->save();
        $state2 = new State("Guam");
        $state2->save();
        $zip2 = 97230;
        $test_address2 = new Address($street2, $city2, $state2, $zip2);
        $test_address->save();
        $phone2 = "33333333";
        $url2 = "www.thaidsafd.com";
        $test_cart_image2 = "www.cartpictruesdfadfsa.com";
        $test_cart2 = new Cart($test_address2, $cuisine2, $phone2, $test_profile2, $promotion2, $cart_name2, $url2, $test_cart_image2);
        $test_cart2->save();


        //Act
        $result = Cart::getAll();
        //Assert
        $this->assertEquals([$test_cart, $test_cart2], $result);
    }

    function test_deleteAll()
    {

       //Arrange
       $story = "12345 ne dog";
       $first_name = new First_Name("portland");
       $first_name->save();
       $last_name = new Last_Name("Guam");
       $last_name->save();
       $photo_url = "tester";
       $test_profile = new Profile($story, $first_name, $last_name, $photo_url);
       $test_profile->save();
       $promotion = new Promotion("a buck off");
       $promotion->save();
       $cuisine = new Cuisine("thai");
       $cuisine->save();
       $cart_name = new Cart_Name("thai me up");
       $cart_name->save();
       $street = "12345 ne dog";
       $city = new City("portland");
       $city->save();
       $state = new State("Guam");
       $state->save();
       $zip = 97230;
       $test_address = new Address($street, $city, $state, $zip);
       $test_address->save();
       $phone = "33333333";
       $url = "www.thai.com";
       $test_cart_image = "www.cartpictrue.com";
       $test_cart = new Cart($test_address, $cuisine, $phone, $test_profile, $promotion, $cart_name, $url, $test_cart_image);
       $test_cart->save();

       $story2 = "12345 ne dog";
       $first_name2 = new First_Name("portland");
       $first_name2->save();
       $last_name2 = new Last_Name("Guam");
       $last_name2->save();
       $photo_url2 = "tester";
       $test_profile2 = new Profile($story2, $first_name2, $last_name2, $photo_url2);
       $test_profile2->save();
       $promotion2 = new Promotion("a buck off");
       $promotion2->save();
       $cuisine2 = new Cuisine("thai");
       $cuisine2->save();
       $cart_name2 = new Cart_Name("thai me up");
       $cart_name2->save();
       $street2 = "12345 ne dog";
       $city2 = new City("portland");
       $city2->save();
       $state2 = new State("Guam");
       $state2->save();
       $zip2 = 97230;
       $test_address2 = new Address($street2, $city2, $state2, $zip2);
       $test_address->save();
       $phone2 = "33333333";
       $url2 = "www.thaidsafd.com";
       $test_cart_image2 = "www.cartpictruesdfadfsa.com";
       $test_cart2 = new Cart($test_address2, $cuisine2, $phone2, $test_profile2, $promotion2, $cart_name2, $url2, $test_cart_image2);
       $test_cart2->save();


       //Act
       Cart::deleteAll();
       $result = Cart::getAll();
       //Assert
       $this->assertEquals([], $result);
    }
    //
    function test_find()
    {
       //Arrange
       $story = "12345 ne dog";
       $first_name = new First_Name("portland");
       $first_name->save();
       $last_name = new Last_Name("Guam");
       $last_name->save();
       $photo_url = "tester";
       $test_profile = new Profile($story, $first_name, $last_name, $photo_url);
       $test_profile->save();
       $promotion = new Promotion("a buck off");
       $promotion->save();
       $cuisine = new Cuisine("thai");
       $cuisine->save();
       $cart_name = new Cart_Name("thai me up");
       $cart_name->save();
       $street = "12345 ne dog";
       $city = new City("portland");
       $city->save();
       $state = new State("Guam");
       $state->save();
       $zip = 97230;
       $test_address = new Address($street, $city, $state, $zip);
       $test_address->save();
       $phone = "33333333";
       $url = "www.thai.com";
       $test_cart_image = "www.cartpictrue.com";
       $test_cart = new Cart($test_address, $cuisine, $phone, $test_profile, $promotion, $cart_name, $url, $test_cart_image);
       $test_cart->save();


       $story2 = "12345 ne dog";
       $first_name2 = new First_Name("portland");
       $first_name2->save();
       $last_name2 = new Last_Name("Guam");
       $last_name2->save();
       $photo_url2 = "tester";
       $test_profile2 = new Profile($story2, $first_name2, $last_name2, $photo_url2);
       $test_profile2->save();
       $promotion2 = new Promotion("a buck off");
       $promotion2->save();
       $cuisine2 = new Cuisine("thai");
       $cuisine2->save();
       $cart_name2 = new Cart_Name("thai me up");
       $cart_name2->save();
       $street2 = "12345 ne dog";
       $city2 = new City("portland");
       $city2->save();
       $state2 = new State("Guam");
       $state2->save();
       $zip2 = 97230;
       $test_address2 = new Address($street2, $city2, $state2, $zip2);
       $test_address->save();
       $phone2 = "33333333";
       $url2 = "www.thaidsafd.com";
       $test_cart_image2 = "www.cartpictruesdfadfsa.com";
       $test_cart2 = new Cart($test_address2, $cuisine2, $phone2, $test_profile2, $promotion2, $cart_name2, $url2, $test_cart_image2);
       $test_cart2->save();

       //Act
       $result = Cart::find($test_cart->getId());
       //Assert
       $this->assertEquals($test_cart, $result);
    }

}
//

?>
