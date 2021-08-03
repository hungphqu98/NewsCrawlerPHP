<?php 
namespace Classes\SubParser;

abstract class PageParser {

  protected $curl;

  protected $titleQuery = "";

  protected $contentQuery = "";

  protected $dateQuery = "";

  protected $title;

  protected $content;

  protected $date;

    public function __construct(\Classes\Curl $curl) {

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

        $result = array(
          'title' => $title,
          'content' => $content,
          'date' => $date
        );
        return $result;

    }

    // Parse page data from html
    public function htmlParse() {
  
      $html = $this->curl->exec();
      $dom = new \DOMDocument();
      $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html,LIBXML_NOERROR);
      $parse = new \DOMXPath($dom);
      return $parse;
      
    }

    // get title
    protected function getTitle($news) {
      $dataTitle = $news->query($this->titleQuery);
      $titles = $dataTitle->item(0)->nodeValue;
      $titles = preg_replace('/\s+/', ' ', $titles);
      $title = trim($titles," ");
      return $this->title = $title;
    }

    // get content
    protected function getContent($news) {
      $dataContent = $news->query($this->contentQuery);
      $content = '';
      foreach ($dataContent as $line) {
        $content .= $line->nodeValue;
      }
      return $this->content = $content;
    }

    // get published date
    protected function getDate($news) {
      $dataDate = $news->query($this->dateQuery);
      $dateString = $dataDate->item(0)->nodeValue;
      preg_match('^\\d{1,2}/\\d{1,2}/\\d{4}^',$dateString,$day);
      preg_match('^\\d{1,2}:\\d{1,2}^',$dateString,$time);
      $date = $day[0]. " " .$time[0];
      return $this->date = $date;
    }


}

?>
