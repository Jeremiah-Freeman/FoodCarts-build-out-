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

        echo "new id: \n";
        echo $test_cuisine->getId();
        //Act
        $result = Cuisine::getAll();
        //Assert
        $this->assertEquals($test_cuisine, $result[0]);
    }

}


?>
