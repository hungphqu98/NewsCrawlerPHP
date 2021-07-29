<?php 

  class DtParser extends PageParser {

    // get title
    protected function getTitle($news) {

      $data = $news->query("//*[@class='dt-news__title']");
      $title = $this->formatTitle($data);
      return $this->title = $title;

    }

    // get content
    protected function getContent($news) {

      $data = $news->query("//*[@class='dt-news__content']/p");
      $content = $this->formatContent($data);
      return $this->content = $content;

    }

    // get published date
    protected function getDate($news) {

      $data = $news->query("//*[@class='dt-news__time']");
      $date = $this->formatDate($data);
      return $this->date = $date;
      
    }

  }
