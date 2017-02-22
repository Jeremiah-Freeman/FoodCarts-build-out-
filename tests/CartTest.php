<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Cart.php";
    require_once "src/Cuisine.php";
    $server = 'mysql:host=localhost:8889;dbname=cart_app_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);
    class CartTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Cart::deleteAll();
            Cuisine::deleteAll();
        }
        function test_save()
        {
            //Arrange
            $type = "Thai";
            $test_cuisine = new Cuisine($type);
            $test_cuisine->save();
            $name = "super dog";
            $id = null;
            $cuisine_id = $test_cuisine->getId();
            $street = "12345 Se 11th Ave";
            $city = "Portland";
            $state = "OR";
            $zip = 97204;
            $phone = '5031111111';
            $url = "www.thaisuperdog.com";
            $test_cart = new Cart($name, $id, $cuisine_id, $street, $city, $state, $zip, $phone, $url);
            //Act
            $test_cart->save();
            //Assert
            $result = Cart::getAll();
            $this->assertEquals($test_cart, $result[0]);
        }
        function test_getAll()
        {
            //Arrange
            $type = "Thai";
            $test_cuisine = new Cuisine($type);
            $test_cuisine->save();

            // 1 object
            $name = "super dog";
            $id = null;
            $cuisine_id = $test_cuisine->getId();
            $street = "12345 Se 11th Ave";
            $city = "Portland";
            $state = "OR";
            $zip = 97204;
            $phone = '5031111111';
            $url = "www.thaisuperdog.com";
            $test_cart = new Cart($name, $id, $cuisine_id, $street, $city, $state, $zip, $phone, $url);
            $test_cart->save();
            //2 object
            $name2 = "super cat";
            $id2 = null;
            $cuisine_id2 = $test_cuisine->getId();
            $street2 = "12345 Se 11th Ave";
            $city2 = "Portland";
            $state2 = "OR";
            $zip2 = 97204;
            $phone2 = '5031111111';
            $url2 = "www.thaisupercat.com";
            $test_cart2 = new Cart($name2, $id2, $cuisine_id2, $street2, $city2, $state2, $zip2, $phone2, $url2);
            $test_cart2->save();

            //Act
            $result = Cart::getAll();
            //Assert
            $this->assertEquals([$test_cart, $test_cart2], $result);
        }
        function test_deleteAll()
        {
            //Arrange
            $type = "Thai";
            $test_cuisine = new Cuisine($type);
            $test_cuisine->save();

            // 1 object
            $name = "super dog";
            $id = null;
            $cuisine_id = $test_cuisine->getId();
            $street = "12345 Se 11th Ave";
            $city = "Portland";
            $state = "OR";
            $zip = 97204;
            $phone = '5031111111';
            $url = "www.thaisuperdog.com";
            $test_cart = new Cart($name, $id, $cuisine_id, $street, $city, $state, $zip, $phone, $url);
            $test_cart->save();
            //2 object
            $name2 = "super cat";
            $id2 = null;
            $cuisine_id2 = $test_cuisine->getId();
            $street2 = "12345 Se 11th Ave";
            $city2 = "Portland";
            $state2 = "OR";
            $zip2 = 97204;
            $phone2 = '5031111111';
            $url2 = "www.thaisupercat.com";
            $test_cart2 = new Cart($name2, $id2, $cuisine_id2, $street2, $city2, $state2, $zip2, $phone2, $url2);
            $test_cart2->save();
            //Act
            Cart::deleteAll();
            //Assert
            $result = Cart::getAll();
            $this->assertEquals([], $result);
        }
        function test_getId()
          {
              //Arrange
              $type = "Thai";
              $test_cuisine = new Cuisine($type);
              $test_cuisine->save();

              // 1 object
              $name = "super dog";
              $id = null;
              $cuisine_id = $test_cuisine->getId();
              $street = "12345 Se 11th Ave";
              $city = "Portland";
              $state = "OR";
              $zip = 97204;
              $phone = '5031111111';
              $url = "www.thaisuperdog.com";
              $test_cart = new Cart($name, $id, $cuisine_id, $street, $city, $state, $zip, $phone, $url);
              $test_cart->save();
              //Act
              $result = $test_cart->getId();
              //Assert
              $this->assertEquals(true, is_numeric($result));
          }
          function test_getCuisineId()
          {
              //Arrange
              $type = "Thai";
              $test_cuisine = new Cuisine($type);
              $test_cuisine->save();

              // 1 object
              $name = "super dog";
              $id = null;
              $cuisine_id = $test_cuisine->getId();
              $street = "12345 Se 11th Ave";
              $city = "Portland";
              $state = "OR";
              $zip = 97204;
              $phone = '5031111111';
              $url = "www.thaisuperdog.com";
              $test_cart = new Cart($name, $id, $cuisine_id, $street, $city, $state, $zip, $phone, $url);
              $test_cart->save();
              //Act
              $result = $test_cart->getCuisineId();
              //Assert
              $this->assertEquals(true, is_numeric($result));
          }
          function test_updateName()
          {
              //Arrange
              $type = "Thai";
              $test_cuisine = new Cuisine($type);
              $test_cuisine->save();

              // 1 object
              $name = "super dog";
              $id = null;
              $cuisine_id = $test_cuisine->getId();
              $street = "12345 Se 11th Ave";
              $city = "Portland";
              $state = "OR";
              $zip = 97204;
              $phone = '5031111111';
              $url = "www.thaisuperdog.com";
              $test_cart = new Cart($name, $id, $cuisine_id, $street, $city, $state, $zip, $phone, $url);
              $test_cart->save();
              $new_name = "Dog great";
              //Act
              $test_cart->update($new_name);
              //Assert
              $this->assertEquals($new_name, $test_cart->getName());
          }
        function test_find()
        {
            //Arrange
            $type = "Thai";
            $test_cuisine = new Cuisine($type);
            $test_cuisine->save();

            // 1 object
            $name = "super dog";
            $id = null;
            $cuisine_id = $test_cuisine->getId();
            $street = "12345 Se 11th Ave";
            $city = "Portland";
            $state = "OR";
            $zip = 97204;
            $phone = '5031111111';
            $url = "www.thaisuperdog.com";
            $test_cart = new Cart($name, $id, $cuisine_id, $street, $city, $state, $zip, $phone, $url);
            $test_cart->save();
            //2 object
            $name2 = "super cat";
            $id2 = null;
            $cuisine_id2 = $test_cuisine->getId();
            $street2 = "12345 Se 11th Ave";
            $city2 = "Portland";
            $state2 = "OR";
            $zip2 = 97204;
            $phone2 = '5031111111';
            $url2 = "www.thaisupercat.com";
            $test_cart2 = new Cart($name2, $id2, $cuisine_id2, $street2, $city2, $state2, $zip2, $phone2, $url2);
            $test_cart2->save();
            //Act
            $result = Cart::find($test_cart->getId());
            //Assert
            $this->assertEquals($test_cart, $result);
        }
    }
?>
