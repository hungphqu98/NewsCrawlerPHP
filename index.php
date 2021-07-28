<?php 
  require 'Classes/autoload.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <form method="post" action="index.php">
    <p>
      <label for="url">URL:</label>
      <input style="width: 50%" type="text" name="url" id="url">
    </p>
    <button type="submit">Submit</button>
  </form>
  <hr>

  <?php 

  if ($_POST) {
  
  // Start curl
  $curl = new Curl();
  $curl->get();
  
  // Parse data
  $parser = new Parser($curl);
  $result = $parser->parse();
  
  // Insert parsed data to db
  $data = new Query();
  $data->insert($result);
  
  $curl->close();

  }
  ?>

</body>

</html>
