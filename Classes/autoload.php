<?php 

spl_autoload_register('autoLoader');

  /**
   * Autoload mandatory classes
   */
  function autoLoader($name){

    $classes = array(
      'DB\DB' => 'DB/DB.php',
      'DB\Query' => 'DB/Query.php',
      'Classes\Curl' => 'Curl.php',
      'Classes\Parser' => 'Parser.php'
    );

  if (!array_key_exists($name, $classes)) {
      die('Class "' . $name . '" not found.');
  }
  require_once $classes[$name];

  }

?>
