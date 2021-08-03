<?php 
  namespace Classes\SubParser;

  /**
   * This is parser class for VnExpress pages containing html tag information for query
   */
  class VneParser extends PageParser {
    
    protected $titleQuery = "//*[@class='title-detail']";
    protected $contentQuery = "//*[@class='Normal']";
    protected $dateQuery = "//*[@class='date']";
 
 }
