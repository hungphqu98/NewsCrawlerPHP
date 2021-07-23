<?php 

class Parser {

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

  // 

}

?>