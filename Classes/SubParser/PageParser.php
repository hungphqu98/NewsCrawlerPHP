<?php 

abstract class PageParser {

  protected $curl;

  public $title = '';

  public $content = '';

  public $date = '';

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
        $content = $this->getContent($news);
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
    abstract protected function getTitle($title);

    // get content
    abstract protected function getContent($content);

    // get published date
    abstract protected function getDate($date);

    // format title 
    protected function formatTitle($data) {

      $titles = $data->item(0)->nodeValue;
      $titles = preg_replace('/\s+/', ' ', $titles);
      $title = trim($titles," ");
      return $title;

    }

    // format content
    protected function formatContent($data) {
      
      $content = '';
      foreach ($data as $line) {
        $content .= $line->nodeValue;
      }
      return $content;

    }

    // format date 
    protected function formatDate($data) {

      $dateString = $data->item(0)->nodeValue;
      preg_match('^\\d{1,2}/\\d{1,2}/\\d{4}^',$dateString,$day);
      preg_match('^\\d{1,2}:\\d{1,2}^',$dateString,$time);
      $date = $day[0]. " " .$time[0];
      return $date;

    }


}

?>
