<?php
class Last_Name
{
    private $last_name;
    private $id;

    function __construct($last_name, $id=null)
    {
        $this->last_name = $last_name;
        $this->id = $id;
    }

    function setLastName($new_last_name)
    {
        $this->last_name = $new_last_name;
    }

    function getLastName()
    {
        return $this->last_name;
    }

    function getId()
    {
        return $this->id;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO last_names (last_name) VALUES ('{$this->getLastName()}')");
        $this->id= $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
        $returned_last_names = $GLOBALS['DB']->query("SELECT * FROM last_names;");
        $last_names = array();
        foreach($returned_last_names as $last_name) {
            $new_last_name = $last_name['last_name'];
            $id = $last_name['id'];
            $new_last_name = new Last_Name($new_last_name, $id);
            array_push($last_names, $new_last_name);
        }
        return $last_names;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM last_names;");
    }

    static function find($search_id)
    {
        $found_last_name = null;
        $last_names = Last_Name::getAll();
        foreach($last_names as $last_name) {
            $last_name_id = $last_name->getId();
            if ($last_name_id == $search_id) {
                $found_last_name = $last_name;
            }
        }
        return $found_last_name;
    }

}

?>
