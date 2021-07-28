<?php 

class Query extends DB {

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