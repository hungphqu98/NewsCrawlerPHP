<?php 

  spl_autoload_register('AutoLoader');

  function AutoLoader($name){

    $classes = array(
      'DB' => 'DB.php',
      'Query' => 'Query.php',
      'Curl' => 'Curl.php',
      'Router' => 'Router.php',
      'PageParser' => 'SubParser/PageParser.php',
      'dtParser' => 'SubParser/dtParser.php',
      'vneParser' => 'SubParser/vneParser.php',
      'vnnParser' => 'SubParser/vnnParser.php'   
    );

  if (!array_key_exists($name, $classes)) {
      die('Class "' . $name . '" not found.');
  }
  require_once $classes[$name];

  }

?>
