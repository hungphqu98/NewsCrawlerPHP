<?php 
  namespace Classes\SubParser;

  class VnnParser extends PageParser {
    
    protected $titleQuery = "//*[@class='title f-22 c-3e']";
    protected $contentQuery = "//*[@class='ArticleContent']/p";
    protected $dateQuery = "//*[@class='ArticleDate']";
  
  }


?>
