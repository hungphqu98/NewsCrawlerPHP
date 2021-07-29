<?php 

  class VnnParser extends PageParser {
  
    // get title
    protected function getTitle($news) {
  
      $data = $news->query("//*[@class='title f-22 c-3e']");
      $title = $this->formatTitle($data);
      return $this->title = $title;
  
    }
  
    // get content
    protected function getContent($news) {
  
      $data = $news->query("//*[@class='ArticleContent']/p");
      $content = $this->formatContent($data);
      return $this->content = $content;
  
    }
  
    // get published date
    protected function getDate($news) {
  
      $data = $news->query("//*[@class='ArticleDate']");
      $date = $this->formatDate($data);
      return $this->date = $date;
      
    }
  
  }


?>
