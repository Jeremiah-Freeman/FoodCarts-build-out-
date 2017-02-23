<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/
require_once "src/City.php";

$server = 'mysql:host=localhost:8889;dbname=cart_app_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

class CityTest extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        City::deleteAll();

    }

    function test_getCity()
    {
        //Arrange

        $city = "portland";
        $test_city = new City($city);
        //Act
        $result = $test_city->getCityName();
        //Assert
        $this->assertEquals($city, $result);
    }

    function test_getId()
    {
        //Arrange
        $city = "portland";
        $id = 1;
        $test_city = new City($city, $id);

        //Act
        $result = $test_city->getId();
        //Assert
        $this->assertEquals(true, is_numeric($result));
    }

    function test_save()
    {
        //Arrange
        $city = "portland";
        $test_city = new City($city);
        $test_city->save();


        //Act
        $result = City::getAll();

        //Assert
        $this->assertEquals($test_city, $result[0]);
    }

    function test_getAll()
    {
        //Arrange
        $city = "Bangkok";
        $city2 = "Bangalore";
        $test_city = new City($city);
        $test_city->save();
        $test_city2 = new City($city2);
        $test_city2->save();
        //Act
        $result = City::getAll();
        //Assert
        $this->assertEquals([$test_city, $test_city2], $result);
    }

    function test_deleteAll()
    {
       //Arrange
       $city = "Bangkok";
       $city2 = "Bangalore";
       $test_city = new City($city);
       $test_city->save();
       $test_city2 = new City($city2);
       $test_city2->save();
       //Act
       City::deleteAll();
       $result = City::getAll();
       //Assert
       $this->assertEquals([], $result);
    }

    function test_find()
    {
       //Arrange
       $city = "Bangkok";
       $city2 = "Bangalore";
       $test_city = new City($city);
       $test_city->save();
       $test_city2 = new City($city2);
       $test_city2->save();
       //Act
       $result = City::find($test_city->getId());
       //Assert
       $this->assertEquals($test_city, $result);
    }

}
//

?>
