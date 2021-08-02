<?php 

  spl_autoload_register('autoLoader');

  function autoLoader($name){

    $classes = array(
      'DB' => '../Config/DB.php',
      'Query' => '../Config/Query.php',
      'Curl' => 'Curl.php',
      'Parser' => 'Parser.php',
      'PageParser' => 'SubParser/PageParser.php',
    );

  if (!array_key_exists($name, $classes)) {
      die('Class "' . $name . '" not found.');
  }
  require_once $classes[$name];

  }

?>
