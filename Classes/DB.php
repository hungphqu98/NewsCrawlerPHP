<?php 

class DB {

  private $server;
  private $username;
  private $password;
  private $dbname;

  // Connect to database 
  protected function connect() {
      $this->server = 'localhost';
      $this->username = 'hungphqu';
      $this->password = '12345';
      $this->dbname = 'newsdb';

      $conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);
      if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
      }
      $conn -> set_charset("utf8");
      return $conn;
    }

}


?>