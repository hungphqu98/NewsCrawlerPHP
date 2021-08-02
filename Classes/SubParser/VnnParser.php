<?php 
  namespace Classes\SubParser;

  class VnnParser extends PageParser {
  
    // get title
    protected function getTitle($news) {
  
      $dataTitle = $news->query("//*[@class='title f-22 c-3e']");
      return $this->dataTitle = $dataTitle;
  
    }
  
    // get content
    protected function getContent($news) {
  
      $dataContent = $news->query("//*[@class='ArticleContent']/p");
      return $this->dataContent = $dataContent;
  
    }
  
    // get published date
    protected function getDate($news) {
  
      $dataDate = $news->query("//*[@class='ArticleDate']");
      return $this->date = $dataDate;
      
    }
  
  }


?>
