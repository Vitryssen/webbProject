<?php
class Handler {
    private $posts = array();
    public function __construct(){
      if(strlen(file_get_contents("/userhome/anno1907/public_html/writeable/rawData")) > 0){
        $this->posts = unserialize(file_get_contents("/userhome/anno1907/public_html/writeable/rawData"));
      }
    }
    public function savePosts(){
      file_put_contents("/userhome/anno1907/public_html/writeable/rawData", serialize($this->posts));
    }
    public function addPost($postObj){
      $this->posts[] = $postObj;
    }
    public function __get($property) {
      if (property_exists($this, $property)) {
        return $this->$property;
      }
    }
    public function __set($property, $value) {
      if (property_exists($this, $property)) {
        $this->$property = $value;
      }
      return $this;
    }
}
?>