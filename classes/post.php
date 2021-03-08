<?php
class Post {
    private $username;
    private $text;
    private $date;
    private $id;
    public function __construct($u, $t, $d){
        $this->username = $u;
        $this->text = $t;
        $this->date = $d;
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