<?php
// Profile class definition.
class Profile
{
    // private object properties
    private $story;
    private $first_name;
    private $last_name;
    private $photo_url;
    private $first_name_id;
    private $last_name_id;
    private $id;
    // profile object constructor
    function __construct($story, $first_name, $last_name, $photo_url, $id=null)
    {
        $this->story = $story;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->photo_url = $photo_url;
        $this->id = $id;
    }
    // getter methods
    function getStory()
    {
        return $this->story;
    }
    function getFirstName()
    {
        return $this->first_name;
    }
    function getLastName()
    {
        return $this->last_name;
    }
    function getPhotoUrl()
    {
        return $this->photo_url;
    }
    function getId()
    {
        return $this->id;
    }
    function getLastNameId()
    {
        return $this->last_name_id;
    }
    function getFirstNameId()
    {
        return $this->first_name_id;
    }
    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO profiles (first_name_id, last_name_id, story, photo_url) VALUES ({$this->first_name->getId()},{$this->last_name->getId()},'{$this->getStory()}','{$this->getPhotoUrl()}')");
        $this->id= $GLOBALS['DB']->lastInsertId();
    }
    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM profiles;");
    }
    static function getAll()
    {
        $returned_profiles = $GLOBALS['DB']->query("SELECT * FROM profiles ");
        $profiles = array();
        foreach($returned_profiles as $profile) {
            $profile_story = $profile['story'];
            $profile_photo_url = $profile['photo_url'];
            $profile_id = $profile['id'];
            $profile_first_name = First_Name::find($profile['first_name_id']);
            $profile_last_name = Last_Name::find($profile['last_name_id']);
            $new_type = new Profile($profile_story, $profile_first_name, $profile_last_name, $profile_photo_url, $profile_id);
            array_push($profiles, $new_type);
        }
        return $profiles;
    }
    static function find($search_id)
    {
        $found_profile = null;
        $profiles = Profile::getAll();
        foreach($profiles as $profile) {
            $profile_id = $profile->getId();
            if ($profile_id == $search_id) {
                $found_profile = $profile;
            }
        }
        return $found_profile;
    }
}
?>
