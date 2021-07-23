<?php 

  class dtParser extends Parser {

    // Parse data from html
    public function htmlParse() {

      $html = $this->curl->exec();
      $dom = new DOMDocument();
      $dom->loadHTML($html,LIBXML_NOERROR);
      $parse = new DOMXPath($dom);
      return $parse;
      
    }

    public function call() {
      echo "34342";
    }

    // Print title
    public function printTitle($news) {

      $q = $news->query("//*[@class='dt-news__title']");
      $title = $q->item(0)->nodeValue;
      echo 'Title: '. $title;
      return $title;

    }

    // Print content
    public function printContent($news) {

      $q = $news->query("//*[@class='dt-news__content']");
      $content = $q->item(0)->nodeValue;
      echo 'Content: '.$content;
      return $content;

    }

    // Print published date
    public function printDate($news) {

      $q = $news->query("//*[@class='dt-news__time']");
      $dateString = $q->item(0)->nodeValue;
      preg_match('^\\d{1,2}/\\d{1,2}/\\d{4}^',$dateString,$day);
      preg_match('^\\d{1,2}:\\d{1,2}^',$dateString,$time);
      $date = $day[0]. " " .$time[0];
      echo 'Date: '.$date;
      return $date;
      
    }

  }
