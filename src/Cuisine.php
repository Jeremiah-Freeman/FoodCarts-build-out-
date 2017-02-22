<?php
class Cuisine
{
    private $type;
    private $id;

    function __construct($type, $id=null)
    {
        $this->type = $type;
        $this->id = $id;
    }
    function setType($new_type)
    {
        $this->type = $new_type;
    }
    function getType()
    {
        return $this->type;
    }
    function getId()
    {
        return $this->id;
    }
    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO cuisines (type) VALUES ('{$this->getType()}')");
        $this->id= $GLOBALS['DB']->lastInsertId();
    }
    static function getAll()
    {
        $returned_cuisines = $GLOBALS['DB']->query("SELECT * FROM cuisines;");
        $cuisines = array();
        foreach($returned_cuisines as $cuisine) {
            $cuisine_type = $cuisine['type'];
            $id = $cuisine['id'];
            $new_type = new Cuisine($cuisine_type, $id);
            array_push($cuisines, $new_type);
        }
        return $cuisines;
    }
    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM cuisines;");
    }


}



?>
