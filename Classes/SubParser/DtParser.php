<?php 

  class DtParser extends PageParser {

    // get title
    protected function getTitle($news) {

      $dataTitle = $news->query("//*[@class='dt-news__title']");
      return $this->dataTitle = $dataTitle;

    }

    // get content
    protected function getContent($news) {

      $dataContent = $news->query("//*[@class='dt-news__content']/p");
      return $this->dataContent = $dataContent;

    }

    // get published date
    protected function getDate($news) {

      $dataDate = $news->query("//*[@class='dt-news__time']");
      return $this->dataDate = $dataDate;
      
    }

  }
