<?php 

class DB {

  private $server;
  private $username;
  private $password;
  private $dbname;

  protected function connect() {
      $this->server = 'localhost';
      $this->username = 'hungphqu';
      $this->password = '12345';
      $this->dbname = 'newsdb';

      $conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);
      $conn -> set_charset("utf8");
      return $conn;
    }

}

class Data extends DB {

  public function getAll() {
    $sql = "SELECT * FROM test";
    $result = $this->connect()->query($sql);
    $numRows = $result->num_rows;
    if ($numRows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }
  }

  public function insert($data) {
    $string = "INSERT INTO news (" . implode(",",array_keys($data)) . ") VALUES ('" . implode("','", array_values($data)) . "')";
    if (mysqli_query($this->connect(),$string)) {
      echo "<br>";
      echo "<strong>Data added to database!</strong>";
      return true;
    } else {
      echo "Wrong";
      echo $this->connect()->connect_error;
      echo $this->connect->connect_error;
      echo $this->connect->error;
    }
  }
}



?>