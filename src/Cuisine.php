<?php
class Cuisine
{
    private $type;
    private $id;

    function __construct($type,$id=null)
    {
        $this->type = $type;
        $this->id = $id;
    }
    function setType($new_type)
    {
        $this->type = (string) $new_type;
    }
    function getType()
    {
        return $this->type;
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
        foreach($returned_cuisines as $type) {
            $name = $type['type'];
            $id = $type['id'];
            $new_type = new Cuisine($type, $id);
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
