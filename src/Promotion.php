<?php
class Promotion
{
    private $description;
    private $id;

    function __construct($description, $id=null)
    {
        $this->description = $description;
        $this->id = $id;
    }

    function setDescription($new_description)
    {
        $this->description = $new_description;
    }

    function getDescription()
    {
        return $this->description;
    }

    function getId()
    {
        return $this->id;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO descriptions (description) VALUES ('{$this->getDescription()}')");
        $this->id= $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
        $returned_descriptions = $GLOBALS['DB']->query("SELECT * FROM descriptions;");
        $descriptions = array();
        foreach($returned_descriptions as $description) {
            $new_description = $description['description'];
            $id = $description['id'];
            $new_description = new Promotion($new_description, $id);
            array_push($descriptions, $new_description);
        }
        return $descriptions;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM descriptions;");
    }

    static function find($search_id)
    {
        $found_description = null;
        $descriptions = Promotion::getAll();
        foreach($descriptions as $description) {
            $description_id = $description->getId();
            if ($description_id == $search_id) {
                $found_description = $description;
            }
        }
        return $found_description;
    }

}

?>
