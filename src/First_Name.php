<?php
class First_Name
{
    private $first_name;
    private $id;

    function __construct($first_name, $id=null)
    {
        $this->first_name = $first_name;
        $this->id = $id;
    }

    function setFirstName($new_first_name)
    {
        $this->first_name = $new_first_name;
    }

    function getFirstName()
    {
        return $this->first_name;
    }

    function getId()
    {
        return $this->id;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO first_names (first_name) VALUES ('{$this->getFirstName()}')");
        $this->id= $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
        $returned_first_names = $GLOBALS['DB']->query("SELECT * FROM first_names;");
        $first_names = array();
        foreach($returned_first_names as $first_name) {
            $new_first_name = $first_name['first_name'];
            $id = $first_name['id'];
            $new_first_name = new First_Name($new_first_name, $id);
            array_push($first_names, $new_first_name);
        }
        return $first_names;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM first_names;");
    }

    static function find($search_id)
    {
        $found_first_name = null;
        $first_names = First_Name::getAll();
        foreach($first_names as $first_name) {
            $first_name_id = $first_name->getId();
            if ($first_name_id == $search_id) {
                $found_first_name = $first_name;
            }
        }
        return $found_first_name;
    }

}

?>
