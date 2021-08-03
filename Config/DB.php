<?php 
namespace Config;

class DB {

  // Connect to database 
  protected function connect() {
      
      $conn = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
      }
      $conn -> set_charset("utf8");

      return $conn;
    }

}


?>