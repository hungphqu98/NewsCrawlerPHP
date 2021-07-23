<?php 

  spl_autoload_register('AutoLoader');

  function AutoLoader($name){

    $classes = array(
      'DB' => 'DB.php',
      'Query' => 'Query.php',
      'Curl' => 'Curl.php',
      'Parser' => 'Parser.php',
      'Router' => 'Router.php',
      'dtParser' => 'SiteParser/dtParser.php',
      'vneParser' => 'SiteParser/vneParser.php',
      'vnnParser' => 'SiteParser/vnnParser.php'   
    );

  if (!array_key_exists($name, $classes)) {
      die('Class "' . $name . '" not found.');
  }
  require_once $classes[$name];

  }

?>