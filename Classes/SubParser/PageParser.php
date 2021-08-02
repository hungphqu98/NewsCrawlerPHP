<?php 
namespace Classes\SubParser;

abstract class PageParser {

  protected $curl;

  protected $dataTitle = '';

  protected $dataContent = '';

  protected $dataDate = '';

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
        $formattedTitle = $this->formatTitle($title);
        $content = $this->getContent($news);
        $formattedContent = $this->formatContent($content);
        $date = $this->getDate($news);
        $formattedDate = $this->formatDate($date);

        $result = array(
          'title' => $formattedTitle,
          'content' => $formattedContent,
          'date' => $formattedDate
        );
        return $result;

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
    abstract protected function getTitle($news);

    // get content
    abstract protected function getContent($news);

    // get published date
    abstract protected function getDate($news);

    // format title 
    protected function formatTitle($dataTitle) {

      $titles = $dataTitle->item(0)->nodeValue;
      $titles = preg_replace('/\s+/', ' ', $titles);
      $title = trim($titles," ");
      return $this->title = $title;

    }

    // format content
    protected function formatContent($dataContent) {
      
      $content = '';
      foreach ($dataContent as $line) {
        $content .= $line->nodeValue;
      }
      return $this->content = $content;

    }

    // format date 
    protected function formatDate($dataDate) {

      $dateString = $dataDate->item(0)->nodeValue;
      preg_match('^\\d{1,2}/\\d{1,2}/\\d{4}^',$dateString,$day);
      preg_match('^\\d{1,2}:\\d{1,2}^',$dateString,$time);
      $date = $day[0]. " " .$time[0];
      return $this->date = $date;

    }


}

?>
