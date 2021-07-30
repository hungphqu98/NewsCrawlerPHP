<?php 
  
  class VneParser extends PageParser {
    
    // get title
    protected function getTitle($news) {
  
      $dataTitle = $news->query("//*[@class='title-detail']");
      return $this->dataTitle = $dataTitle;

    }
 
    // get content
    protected function getContent($news) {
  
      $dataContent = $news->query("//*[@class='Normal']");
      return $this->dataContent = $dataContent;
      
    }
  
    // get published date
    protected function getDate($news) {
  
      $dataDate = $news->query("//*[@class='date']");
      return $this->dataDate = $dataDate;

    }
 
 }
