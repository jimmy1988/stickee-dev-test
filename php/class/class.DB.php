<?php
  class DB{
    protected $mysqli = null;

    public function __construct(){
      global $mysql;
      $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

      if($this->mysqli->connect_error){
        die("Connection failed: " . $this->mysqli->connect_error);
      }
    }
  }

?>
