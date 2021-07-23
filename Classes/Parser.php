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
   public function printParse() {

      $news = $this->htmlParse();
      $title = $this->printTitle($news);
      echo '<br>';
      $content = $this->printContent($news);
      echo '<br>';
      $date = $this->printDate($news);
      $arr = array(
        'title' => $title,
        'content' => $content,
        'date' => $date
      );
      return $arr;
  }


}

?>