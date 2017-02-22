<?php
/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/
require_once "src/Cuisine.php";
// require_once "src/Task.php";
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

}


?>
