<?php 

class Parser {

  protected $curl;

  public function __construct(Curl $curl) {

    $this->curl = $curl;

  }

  public function checkUrl() {

    $url = $this->curl->getInfo()["url"];
    return $url;

  }

   // Print parsed data 
   public function printParse() {

      $news = $this->htmlParse();
      $title = $this->printTitle($news);
      // echo '<br>';
      $content = $this->printContent($news);
      // echo '<br>';
      $date = $this->printDate($news);
      $arr = array(
        'title' => $title,
        'content' => $content,
        'date' => $date
      );
      return $arr;
  }

}

class vnnParser extends Parser {
  
  // Parse data from HTML
  public function htmlParse() {

    $html = $this->curl->exec();
    $dom = new DOMDocument();
    $dom->loadHTML($html,LIBXML_NOERROR);
    $parse = new DOMXPath($dom);
    return $parse;
    
  }

  // Print title
  public function printTitle($news) {

    $q = $news->query("//*[@class='title f-22 c-3e']");
    $title = $q->item(0)->nodeValue;
    // echo 'Title: '. $title;
    return $title;

  }

  // Print content
  public function printContent($news) {

    $q = $news->query("//*[@class='ArticleContent']");
    $content = $q->item(0)->nodeValue;
    // echo 'Content: '.$content;
    return $content;

  }

  // Print published date
  public function printDate($news) {

    $q = $news->query("//*[@class='ArticleDate']");
    $dateString = $q->item(0)->nodeValue;
    preg_match('^\\d{1,2}/\\d{1,2}/\\d{4}^',$dateString,$day);
    preg_match('^\\d{1,2}:\\d{1,2}^',$dateString,$time);
    $date = $day[0]. " " .$time[0];
    var_dump($date);
    // echo 'Date: '.$date;
    return $date;
    
  }

}

class vneParser extends Parser {
  
   // Parse data from html
   public function htmlParse() {

    $html = $this->curl->exec();
    $dom = new DOMDocument();
    $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html,LIBXML_NOERROR);
    $parse = new DOMXPath($dom);
    return $parse;
    
  }

  // Print title
  public function printTitle($news) {

    $q = $news->query("//*[@class='title-detail']");
    $title = $q->item(0)->nodeValue;
    // echo 'Title: '. $title;
    return $title;

  }

  // Print content
  public function printContent($news) {

    $q = $news->query("//*[@class='Normal']");
    $content = $q[0]->nodeValue;
    foreach ($q as $s) {
      $content .= $s->nodeValue;
    }
    // var_dump($content);
    return $content;
    
  }

  // Print published date
  public function printDate($news) {

    $q = $news->query("//*[@class='date']");
    $dateString = $q->item(0)->nodeValue;
    preg_match('^\\d{1,2}/\\d{1,2}/\\d{4}^',$dateString,$day);
    preg_match('^\\d{1,2}:\\d{1,2}^',$dateString,$time);
    $date = $day[0]. " " .$time[0];
    var_dump($date);
    // echo 'Date: '.$date;
    return $date;
  }

}

class dtParser extends Parser {
  
  // Parse data from html
  public function htmlParse() {

    $html = $this->curl->exec();
    $dom = new DOMDocument();
    $dom->loadHTML($html,LIBXML_NOERROR);
    $parse = new DOMXPath($dom);
    return $parse;
    
  }

  // Print title
  public function printTitle($news) {

    $q = $news->query("//*[@class='dt-news__title']");
    $title = $q->item(0)->nodeValue;
    // echo 'Title: '. $title;
    return $title;

  }

  // Print content
  public function printContent($news) {

    $q = $news->query("//*[@class='dt-news__content']");
    $content = $q->item(0)->nodeValue;
    // echo 'Content: '.$content;
    return $content;

  }

  // Print published date
  public function printDate($news) {

    $q = $news->query("//*[@class='dt-news__time']");
    $dateString = $q->item(0)->nodeValue;
    preg_match('^\\d{1,2}/\\d{1,2}/\\d{4}^',$dateString,$day);
    preg_match('^\\d{1,2}:\\d{1,2}^',$dateString,$time);
    $date = $day[0]. " " .$time[0];
    var_dump($date);
    // echo 'Date: '.$date;
    return $date;
    
  }

}

?>