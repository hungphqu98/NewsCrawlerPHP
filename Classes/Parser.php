<?php 

class Parser {

  private $curl;

  public function __construct(Curl $curl) {

    $this->curl = $curl;
    if(!$curl){
      throw new \Exception('Can not construct router');
    }
    
  }

  // Route action based on URL
  public function parse() {

    $url = $this->curl->getInfo()["url"];

     if (preg_match('/dantri/',$url)) {
        $parser = new DtParser($this->curl);
      } else if (preg_match('/vnexpress/',$url)) {
        $parser = new VneParser($this->curl);
      } else if (preg_match('/vietnamnet/',$url)) {
        $parser = new VnnParser($this->curl);
      } else if (empty($url)){
        echo '<pre>';
        echo "No URl sent";
        echo '</pre>';
      } else {
        echo '<pre>';
        echo "Only URLs from dantri,vietnamnet,vnexpress are allowed";
        echo '</pre>';
      }

      $result = $parser->getParse();
      return $result;
  }

}


?>