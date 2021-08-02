<?php 
namespace Classes; 

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
        require_once("SubParser/DtParser.php");
        $parser = new SubParser\DtParser($this->curl);
      } else if (preg_match('/vnexpress/',$url)) {
        require_once("SubParser/VneParser.php");
        $parser = new SubParser\VneParser($this->curl);
      } else if (preg_match('/vietnamnet/',$url)) {
        require_once("SubParser/VnnParser.php");
        $parser = new SubParser\VnnParser($this->curl);
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
