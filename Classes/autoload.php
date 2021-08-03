<?php 
define('ROOT_URI', 'E:\Programming\xampps\htdocs\NewsCrawlerPHP\\');
spl_autoload_register(function ($class) {
  $file = ROOT_URI. str_replace('\\', '/', $class) .'.php';
  if (file_exists($file)) {
      require $file;
  } else {
    echo $file;
  }
});

?>
