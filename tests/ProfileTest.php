<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/
require_once "src/Profile.php";
require_once "src/First_Name.php";
require_once "src/Last_Name.php";

$server = 'mysql:host=localhost:8889;dbname=cart_app_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

class ProfileTest extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        Profile::deleteAll();

    }

    function test_getStory()
    {
        //Arrange
        $story = "12345 ne dog";
        $first_name = new First_Name("portland");
        $last_name = new Last_Name("Guam");
        $photo_url = "tester";
        $test_profile = new Profile($story, $first_name, $last_name, $photo_url);
        //Act
        $result = $test_profile->getStory();
        //Assert
        $this->assertEquals($story, $result);
    }
//
    function test_getId()
    {
        //Arrange
        $story = "12345 ne dog";
        $first_name = new First_Name("portland");
        $last_name = new Last_Name("Guam");
        $photo_url = "tester";
        $id = 1;
        $test_profile = new Profile($story, $first_name, $last_name, $photo_url, $id);

        //Act
        $result = $test_profile->getId();
        //Assert
        $this->assertEquals(true, is_numeric($result));
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

        //Act
        $result = Profile::getAll();

        //Assert
        $this->assertEquals($test_profile, $result[0]);
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


        $story2 = "12345 ww dog";
        $first_name2 = new First_Name("portland");
        $first_name2->save();
        $last_name2 = new Last_Name("sss");
        $last_name2->save();
        $photo_url2 = "tester";
        $test_profile2 = new Profile($story, $first_name, $last_name, $photo_url);
        $test_profile2->save();
        //Act
        $result = Profile::getAll();
        //Assert
        $this->assertEquals([$test_profile, $test_profile2], $result);
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


       $story2 = "12345 ww dog";
       $first_name2 = new First_Name("portland");
       $first_name2->save();
       $last_name2 = new Last_Name("sss");
       $last_name2->save();
       $photo_url2 = "tester";
       $test_profile2 = new Profile($story, $first_name, $last_name, $photo_url);
       $test_profile2->save();
       //Act
       Profile::deleteAll();
       $result = Profile::getAll();
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


       $story2 = "12345 ww dog";
       $first_name2 = new First_Name("portland");
       $first_name2->save();
       $last_name2 = new Last_Name("sss");
       $last_name2->save();
       $photo_url2 = "tester";
       $test_profile2 = new Profile($story, $first_name, $last_name, $photo_url);
       $test_profile2->save();
       //Act
       $result = Profile::find($test_profile->getId());
       //Assert
       $this->assertEquals($test_profile, $result);
    }

}
//

?>
