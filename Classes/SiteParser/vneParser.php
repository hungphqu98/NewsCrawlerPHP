<?php 
  
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
     echo 'Title: '. $title;
     return $title;
 
   }
 
   // Print content
   public function printContent($news) {
 
     $q = $news->query("//*[@class='Normal']");
     $content = $q[0]->nodeValue;
     foreach ($q as $s) {
       $content .= $s->nodeValue;
     }
     echo 'Content:' . $content;
     return $content;
     
   }
 
   // Print published date
   public function printDate($news) {
 
     $q = $news->query("//*[@class='date']");
     $dateString = $q->item(0)->nodeValue;
     preg_match('^\\d{1,2}/\\d{1,2}/\\d{4}^',$dateString,$day);
     preg_match('^\\d{1,2}:\\d{1,2}^',$dateString,$time);
     $date = $day[0]. " " .$time[0];
     echo 'Date: '.$date;
     return $date;
   }
 
 }
