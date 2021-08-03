<?php 
namespace Classes; 

/**
 * This is the Parser class
 * 
 */
class Parser {

  /**
   * Use an instance of Curl class
   */
  private $curl;

  public function __construct(Curl $curl) {

    $this->curl = $curl;
    if(!$curl){
      throw new \Exception('Can not construct parser');
    }
    
  }

  /**
   * Get the url from Curl request and select a subparser depending on the URL
   * Return an array of the parsed result
   * @return array
   */
  public function parse() {

    require_once("SubParser/PageParser.php");

    // Get url from curl 
    $url = $this->curl->getInfo()["url"];

    // Filter page url using regex
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

      // Return result for database query
      $result = $parser->getParse();
      return $result;
  }

}


?>
