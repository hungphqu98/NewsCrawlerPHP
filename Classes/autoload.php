<?php 

  spl_autoload_register('autoLoader');

  function autoLoader($name){

    $classes = array(
      'DB' => 'DB.php',
      'Query' => 'Query.php',
      'Curl' => 'Curl.php',
      'Parser' => 'Parser.php',
      'PageParser' => 'SubParser/PageParser.php',
      'DtParser' => 'SubParser/DtParser.php',
      'VneParser' => 'SubParser/VneParser.php',
      'VnnParser' => 'SubParser/VnnParser.php'   
    );

  if (!array_key_exists($name, $classes)) {
      die('Class "' . $name . '" not found.');
  }
  require_once $classes[$name];

  }

?>
