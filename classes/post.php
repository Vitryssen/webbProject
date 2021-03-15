<?php
class Post {
    private $username;
    private $text;
    private $date;
    private $id;
    private $imageUrl;
    public function __construct($u, $t, $d, $i){
        $this->username = $u;
        $this->text = $t;
        $this->date = $d;
        $this->imageUrl = $i;
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