<!--
André Nordlund
VT21 DT100G/DT058G Datateknik Webbprogrammering 7.5 HP
Denna klass hanterar objektet post som är strukturen som används för att skriva ut inlägg
 -->
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