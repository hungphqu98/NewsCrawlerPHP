<?php 
  
  class VneParser extends PageParser {
 
   // get title
   public function getTitle($news) {
 
     $q = $news->query("//*[@class='title-detail']");
     $title = $q->item(0)->nodeValue;
     echo 'Title: '. $title;
     return $title;
 
   }
 
   // get content
   public function getContent($news) {
 
     $q = $news->query("//*[@class='Normal']");
     $content = '';
     foreach ($q as $s) {
       $content .= $s->nodeValue;
     }
     echo 'Content:' . $content;
     return $content;
     
   }
 
   // get published date
   public function getDate($news) {
 
     $q = $news->query("//*[@class='date']");
     $dateString = $q->item(0)->nodeValue;
     preg_match('^\\d{1,2}/\\d{1,2}/\\d{4}^',$dateString,$day);
     preg_match('^\\d{1,2}:\\d{1,2}^',$dateString,$time);
     $date = $day[0]. " " .$time[0];
     echo 'Date: '.$date;
     return $date;
   }
 
 }