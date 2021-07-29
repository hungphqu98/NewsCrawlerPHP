<?php 
  
  class VneParser extends PageParser {
    
    // get title
    protected function getTitle($news) {
  
      $data = $news->query("//*[@class='title-detail']");
      $title = $this->formatTitle($data);
      return $this->title = $title;

    }
 
    // get content
    protected function getContent($news) {
  
      $data = $news->query("//*[@class='Normal']");
      $content = $this->formatContent($data);
      return $this->content = $content;
      
    }
  
    // get published date
    protected function getDate($news) {
  
      $data = $news->query("//*[@class='date']");
      $date = $this->formatDate($data);
      return $this->date = $date;

    }
 
 }
