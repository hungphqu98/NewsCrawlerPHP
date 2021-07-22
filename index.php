<?php 
  require 'Classes/DB.php';
  require 'Classes/Curl.php';
  require 'Classes/Parser.php';
  require 'Classes/Router.php';
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

  $data = new Data();


  if ($_POST) {
  $curl = new Curl();
  $curl->init();
  $curl->getUrl($_POST['url'])->method('GET')->setOptArray();
  $parse = new Parser($curl);
  $router = new Router($parse, $curl);
  $result = $router->routing();

  echo $data->insert($result);
  
  $curl->close();
  }
  ?>

</body>

</html>