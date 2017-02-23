<?php
class State
{
    private $state_name;
    private $id;

    function __construct($state_name, $id=null)
    {
        $this->state_name = $state_name;
        $this->id = $id;
    }

    function setStateName($new_state_name)
    {
        $this->state_name = $new_state_name;
    }

    function getStateName()
    {
        return $this->state_name;
    }

    function getId()
    {
        return $this->id;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO states (state_name) VALUES ('{$this->getStateName()}')");
        $this->id= $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
        $returned_states = $GLOBALS['DB']->query("SELECT * FROM states;");
        $states = array();
        foreach($returned_states as $state) {
            $new_state_name = $state['state_name'];
            $id = $state['id'];
            $new_state_name = new State($new_state_name, $id);
            array_push($states, $new_state_name);
        }
        return $states;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM states;");
    }

    static function find($search_id)
    {
        $found_state = null;
        $states = State::getAll();
        foreach($states as $state) {
            $state_id = $state->getId();
            if ($state_id == $search_id) {
                $found_state = $state;
            }
        }
        return $found_state;
    }




}



?>
