<?php 

class Router {

  private $curl;

  function __construct(Curl $curl) {

    $this->curl = $curl;
    if(!$curl){
      throw new \Exception('Can not construct router');
    }
    
  }

  // Route action based on sites
  function routing() {

    $url = $this->curl->getInfo()["url"];

     if (preg_match('/dantri/',$url)) {
        $parse = new dtParser($this->curl);
        $array = $parse->printParse();
        return $array;
      } else if (preg_match('/vnexpress/',$url)) {
        $parse = new vneParser($this->curl);
        $array = $parse->printParse();
        return $array;
      } else if (preg_match('/vietnamnet/',$url)) {
        $parse = new vnnParser($this->curl);
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