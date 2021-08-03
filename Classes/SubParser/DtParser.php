<?php 
  namespace Classes\SubParser;

  class DtParser extends PageParser {

    protected $titleQuery = "//*[@class='dt-news__title']";
    protected $contentQuery = "//*[@class='dt-news__content']/p";
    protected $dateQuery = "//*[@class='dt-news__time']";

  }
