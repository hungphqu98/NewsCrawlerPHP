<?php 

abstract class PageParser {

  protected $curl;

  public function __construct(Curl $curl) {

    $this->curl = $curl;
    if(!$curl){
      throw new \Exception('Can not construct parser');
    }

  }

   // Print parsed data 
   public function getParse() {

      $news = $this->htmlParse();
      $title = $this->getTitle($news);
      echo '<br>';
      $content = $this->getContent($news);
      echo '<br>';
      $date = $this->getDate($news);
      $arr = array(
        'title' => $title,
        'content' => $content,
        'date' => $date
      );
      return $arr;
  }

  // Parse page data from html
  public function htmlParse() {
 
    $html = $this->curl->exec();
    $dom = new DOMDocument();
    $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html,LIBXML_NOERROR);
    $parse = new DOMXPath($dom);
    return $parse;
    
  }

  // get title
  abstract public function getTitle($title);

  // get content
  abstract public function getContent($content);

  // get published date
  abstract public function getDate($date);




}

?>
