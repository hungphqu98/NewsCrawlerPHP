<?php 

class Router {

  private $parser;

  function __construct(Parser $parser, Curl $curl) {

    $this->parser = $parser;    
    $this->curl = $curl;
    
  }

  function routing() {

    global $curl;

    $this->curl->exec();

    $url = $this->parser->checkUrl();

     if (preg_match('/dantri/',$url)) {
        $parse = new dtParser($curl);
        $array = $parse->printParse();
        return $array;
      } else if (preg_match('/vnexpress/',$url)) {
        $parse = new vneParser($curl);
        $array = $parse->printParse();
        return $array;
      } else if (preg_match('/vietnamnet/',$url)) {
        $parse = new vnnParser($curl);
        $array = $parse->printParse();
        return $array;
      } else if (empty($url)){
        echo '<pre>';
        echo "No URl sent";
        echo '</pre>';
      } else {
        echo '<pre>';
        echo "Only URLs from dantri,vietnamnet,vnexpress are allowed";
        echo '</pre>';
      }
  }

}


?>