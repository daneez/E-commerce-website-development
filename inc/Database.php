<?php
  include "config.php";

  class Database {
    protected static $connection;

    protected function connect(){
      if(!isset(self::$connection)){
        self::$connection = new mysqli(SERVER_NAME,USERNAME,PASSWORD,DATABASE);
      }
      if(self::$connection===false){
        return false;
      }
      return self::$connection;
    }

    protected function query($query){
      $connection = $this->connect();
      $result = $connection->query($query);
      return $result;
    }
    
    public function select($query){
      $rows = array();
      $result = $this->query($query);
      if($result===false){
        return false;
      }
      while ($row = $result->fetch_assoc()){
        $rows[]= $row;
      }
      return $rows;
    }
    
    public function error(){
      $connection = $this->connect();
      return $connection->error;
    }
  }