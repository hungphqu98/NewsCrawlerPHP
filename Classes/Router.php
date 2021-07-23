<?php 

class Router {

  private $curl;

  function __construct(Curl $curl) {

    $this->curl = $curl;
    if(!$curl){
      throw new \Exception('Can not construct router');
    }
    
  }

  // Route action based on URL
  function routing() {

    $url = $this->curl->getInfo()["url"];

     if (preg_match('/dantri/',$url)) {
        $parser = new dtParser($this->curl);
      } else if (preg_match('/vnexpress/',$url)) {
        $parser = new vneParser($this->curl);
      } else if (preg_match('/vietnamnet/',$url)) {
        $parser = new vnnParser($this->curl);
      } else if (empty($url)){
        echo '<pre>';
        echo "No URl sent";
        echo '</pre>';
      } else {
        echo '<pre>';
        echo "Only URLs from dantri,vietnamnet,vnexpress are allowed";
        echo '</pre>';
      }

      $result = $parser->printParse();
      return $result;
  }

}


?>