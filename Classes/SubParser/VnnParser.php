<?php 
  namespace Classes\SubParser;

  /**
   * This is parser class for Vietnamnet pages containing html tag information for query
   */
  class VnnParser extends PageParser {
    
    protected $titleQuery = "//*[@class='title f-22 c-3e']";
    protected $contentQuery = "//*[@class='ArticleContent']/p";
    protected $dateQuery = "//*[@class='ArticleDate']";
  
  }


?>
