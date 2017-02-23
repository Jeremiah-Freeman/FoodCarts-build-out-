<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/
require_once "src/Address.php";

$server = 'mysql:host=localhost:8889;dbname=cart_app_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

class AddressTest extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        Address::deleteAll();

    }

    function test_getStreet()
    {
        //Arrange
        $street = "12345 ne dog";
        $city = new City("portland");
        $state = new State("Guam");
        $zip = 97230;
        $test_address = new Address($street, $city, $state, $zip);
        //Act
        $result = $test_address->getStreet();
        //Assert
        $this->assertEquals($street, $result);
    }
//
    function test_getId()
    {
        //Arrange
        $street = "12345 ne dog";
        $city = new City("portland");
        $state = new State("Guam");
        $zip = 97230;
        $id = 1;
        $test_address = new Address($street, $city, $state, $zip, $id);

        //Act
        $result = $test_address->getId();
        //Assert
        $this->assertEquals(true, is_numeric($result));
    }

    function test_save()
    {
        //Arrange
        $street = "12345 ne dog";
        $city = new City("portland");
        $city->save();
        $state = new State("Guam");
        $state->save();
        $zip = 97230;
        $test_address = new Address($street, $city, $state, $zip);
        $test_address->save();

        //Act
        $result = Address::getAll();

        //Assert
        $this->assertEquals($test_address, $result[0]);
    }
    //
    function test_getAll()
    {
        //Arrange
        $street = "12345 ne dog";
        $city = new City("portland");
        $city->save();
        $state = new State("Guam");
        $state->save();
        $zip = 97230;
        $test_address = new Address($street, $city, $state, $zip);
        $test_address->save();


        $street2 = "12345 ww dog";
        $city2 = new City("portland");
        $city2->save();
        $state2 = new State("sss");
        $state2->save();
        $zip2 = 97230;
        $test_address2 = new Address($street, $city, $state, $zip);
        $test_address2->save();
        //Act
        $result = Address::getAll();
        //Assert
        $this->assertEquals([$test_address, $test_address2], $result);
    }

    function test_deleteAll()
    {
       //Arrange
       $street = "12345 ne dog";
       $city = new City("portland");
       $city->save();
       $state = new State("Guam");
       $state->save();
       $zip = 97230;
       $test_address = new Address($street, $city, $state, $zip);
       $test_address->save();


       $street2 = "12345 ww dog";
       $city2 = new City("portland");
       $city2->save();
       $state2 = new State("sss");
       $state2->save();
       $zip2 = 97230;
       $test_address2 = new Address($street, $city, $state, $zip);
       $test_address2->save();
       //Act
       Address::deleteAll();
       $result = Address::getAll();
       //Assert
       $this->assertEquals([], $result);
    }
//     //
//     function test_find()
//     {
//        //Arrange
//        $type = "Thai";
//        $type2 = "Indian";
//        $test_Address = new Address($type);
//        $test_Address->save();
//        $test_Address2 = new Address($type2);
//        $test_Address2->save();
//        //Act
//        $result = Address::find($test_Address->getId());
//        //Assert
//        $this->assertEquals($test_Address, $result);
//     }

}
//

?>
