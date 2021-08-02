<?php
namespace Classes;

class Curl {

  public $handler = null;

  public $url = '';

  public $method = 'GET';

  public $curlContent;

  public $curlInfo = [];

  // Init curl
  public function init() {

    if ($this->handler == null) {
      $this->handler = curl_init();
    }

  }

  // Get url
  public function getUrl($url='') {
    $this->url = $url;
    return $this;

  }
  
  // Request method
  public function method($method = 'GET') {
    
    $this->method = $method;
    if ($method != 'GET') {
      echo '<pre>';
      echo "Only GET requests with curl are supported";
      echo '</pre>';
    }
    return $this;

  }

  // Set request option
  public function setOptArray() {
    
    return curl_setopt_array($this->handler,[
      CURLOPT_URL => $this->url,
      CURLOPT_CUSTOMREQUEST => $this->method,
      CURLOPT_RETURNTRANSFER => true,
    ]);

  }

  // Get data from curl request
  public function get() {

    $this->init();
    $this->getUrl($_POST['url'])->method('GET')->setOptArray();

  }

  // Exec curl request
  public function exec() {

    return curl_exec($this->handler);

  }

  // Get info
  public function getInfo() {

    return curl_getinfo($this->handler);

  }

  // Get version 
  public function version() {

    return curl_version();

  }

  // Return string error 
  public function strError($errnum) {

    return curl_strerror($errnum);

  } 

  // Get last error number
  public function errNo() {

    return curl_errno($this->handler);

  }

  // Get error 
  public function error() {

    return curl_error($this->handler);

  }

  // Get handler
  public function getHandler() {

    return $this->handler;

  }

  // Reset request 
  public function reset() {

    return curl_reset($this->handler);
    
  }

  // Close request
  public function close() {

    curl_close($this->handler);
    $this->handler = null;

  }

}

?>
