<?php 
  namespace Classes\SubParser;

  class VneParser extends PageParser {
    
    protected $titleQuery = "//*[@class='title-detail']";
    protected $contentQuery = "//*[@class='Normal']";
    protected $dateQuery = "//*[@class='date']";
 
 }
