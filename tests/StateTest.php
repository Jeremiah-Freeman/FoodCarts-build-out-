<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/
require_once "src/State.php";

$server = 'mysql:host=localhost:8889;dbname=cart_app_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

class StateTest extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        State::deleteAll();

    }

    function test_getState()
    {
        //Arrange

        $state = "portland";
        $test_state = new State($state);
        //Act
        $result = $test_state->getStateName();
        //Assert
        $this->assertEquals($state, $result);
    }

    function test_getId()
    {
        //Arrange
        $state = "portland";
        $id = 1;
        $test_state = new State($state, $id);

        //Act
        $result = $test_state->getId();
        //Assert
        $this->assertEquals(true, is_numeric($result));
    }

    function test_save()
    {
        //Arrange
        $state = "portland";
        $test_state = new State($state);
        $test_state->save();


        //Act
        $result = State::getAll();

        //Assert
        $this->assertEquals($test_state, $result[0]);
    }

    function test_getAll()
    {
        //Arrange
        $state = "Bangkok";
        $state2 = "Bangalore";
        $test_state = new State($state);
        $test_state->save();
        $test_state2 = new State($state2);
        $test_state2->save();
        //Act
        $result = State::getAll();
        //Assert
        $this->assertEquals([$test_state, $test_state2], $result);
    }

    function test_deleteAll()
    {
       //Arrange
       $state = "Bangkok";
       $state2 = "Bangalore";
       $test_state = new State($state);
       $test_state->save();
       $test_state2 = new State($state2);
       $test_state2->save();
       //Act
       State::deleteAll();
       $result = State::getAll();
       //Assert
       $this->assertEquals([], $result);
    }

    function test_find()
    {
       //Arrange
       $state = "Bangkok";
       $state2 = "Bangalore";
       $test_state = new State($state);
       $test_state->save();
       $test_state2 = new State($state2);
       $test_state2->save();
       //Act
       $result = State::find($test_state->getId());
       //Assert
       $this->assertEquals($test_state, $result);
    }

}
//

?>
