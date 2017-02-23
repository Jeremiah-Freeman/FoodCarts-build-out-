<?php
/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/
require_once "src/Cuisine.php";

$server = 'mysql:host=localhost:8889;dbname=cart_app_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

class CuisineTest extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        Cuisine::deleteAll();

    }

    function test_getType()
    {
        //Arrange
        $type = "Thai";
        $test_cuisine = new Cuisine($type);
        //Act
        $result = $test_cuisine->getType();
        //Assert
        $this->assertEquals($type, $result);
    }

    function test_getId()
    {
        //Arrange
        $type = "Thai";
        $id = 1;
        $test_cuisine = new Cuisine($type,$id);
        //Act
        $result = $test_cuisine->getId();
        //Assert
        $this->assertEquals(true, is_numeric($result));
    }

    function test_save()
    {
        //Arrange
        $type = "Thai";
        $test_cuisine = new Cuisine($type);
        $test_cuisine->save();
        //Act
        $result = Cuisine::getAll();
        //Assert
        $this->assertEquals($test_cuisine, $result[0]);
    }
    //
    function test_getAll()
    {
        //Arrange
        $type = "Thai";
        $type2 = "Indian";
        $test_Cuisine = new Cuisine($type);
        $test_Cuisine->save();
        $test_Cuisine2 = new Cuisine($type2);
        $test_Cuisine2->save();
        //Act
        $result = Cuisine::getAll();
        //Assert
        $this->assertEquals([$test_Cuisine, $test_Cuisine2], $result);
    }

    function test_deleteAll()
    {
       //Arrange
       $type = "Thai";
       $type2 = "Indian";
       $test_Cuisine = new Cuisine($type);
       $test_Cuisine->save();
       $test_Cuisine2 = new Cuisine($type2);
       $test_Cuisine2->save();
       //Act
       Cuisine::deleteAll();
       $result = Cuisine::getAll();
       //Assert
       $this->assertEquals([], $result);
    }
    //
    function test_find()
    {
       //Arrange
       $type = "Thai";
       $type2 = "Indian";
       $test_Cuisine = new Cuisine($type);
       $test_Cuisine->save();
       $test_Cuisine2 = new Cuisine($type2);
       $test_Cuisine2->save();
       //Act
       $result = Cuisine::find($test_Cuisine->getId());
       //Assert
       $this->assertEquals($test_Cuisine, $result);
    }

}


?>
