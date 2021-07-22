<?php 

class DB {

  private $server;
  private $username;
  private $password;
  private $dbname;

  protected function connect() {
      $this->server = 'localhost';
      $this->username = 'root';
      $this->password = '';
      $this->dbname = 'newsdb';

      $conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);
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
      return true;
    } else {
      echo mysqli_error($this->connect());
    }
  }
}



?>