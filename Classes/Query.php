<?php 

class Query extends DB {

  public function getAll() {
    $sql = "SELECT * FROM `news`";
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

    $string = "INSERT INTO `news` (" . implode(",",array_keys($data)) . ") VALUES ('" . implode("','", array_values($data)) . "')";
    
    if (mysqli_query($this->connect(),$string)) {
      echo "<br>";
      echo "<strong>Data added to database!</strong>";
      return true;
    } else {
      echo "<br/>";
      echo "Cannot add to database";
    }
  }

}



?>