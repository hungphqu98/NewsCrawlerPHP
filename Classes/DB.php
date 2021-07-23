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

class Data extends DB {

  public function getAll() {
    $sql = "SELECT * FROM news";
    $result = $this->connect()->query($sql);
    $numRows = $result->num_rows;
    if ($numRows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }
  }

  // Insert to db
  public function insert($data) {
    $string = "INSERT INTO news (" . implode(",",array_keys($data)) . ") VALUES ('" . implode("','", array_values($data)) . "')";
    if (mysqli_query($this->connect(),$string)) {
      echo "<br>";
      echo "<strong>Data added to database!</strong>";
      return true;
    } else {
      echo "Cannot add to database";
    }
  }
}



?>