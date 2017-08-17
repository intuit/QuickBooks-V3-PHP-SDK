<?php
namespace QuickBooksOnline\API\Core\HttpClients;

use QuickBooksOnline\API\Exception\SdkException;

class BaseCurl{

  private $curl;

  public function __construct(){
    $this->init();
  }

  public function init(){
    if (!extension_loaded('curl')) {
        throw new \Exception('The PHP exention curl must be installed to use this PDK.');
    }
    $this->curl = curl_init();
  }

  public function isCurlSet(){
      if(!isset($this->curl)) return false;
      return true;
  }

  public function setupOption($k, $v){
      if($this->isCurlSet()){
        curl_setopt($this->curl, $k, $v);
      } else {
        throw new SdkException("cURL instance is not set when calling setup Option.");
      }
  }

  public function setupCurlOptArray(array $ary){
    if($this->isCurlSet()){
      curl_setopt_array($this->curl, $ary);
    } else {
      throw new SdkException("cURL instance is not set when calling setup curl Option from array.");
    }
  }

  public function execute(){
    if($this->isCurlSet()){
      return curl_exec($this->curl);
    } else {
      throw new SdkException("cURL instance is not set when trying to execute it.");
    }
  }

  public function errno(){
    if($this->isCurlSet()){
        return curl_errno($this->curl);
    } else {
      throw new SdkException("cURL instance is not set when trying to get errno code from the execution.");
    }
  }

  public function error(){
    if($this->isCurlSet()){
        return curl_error($this->curl);
    } else {
      throw new SdkException("cURL instance is not set when trying to get error from the execution.");
    }
  }

  public function version(){
      return curl_version();
  }

  /**
   * Get info from a curl reference from the type
   * Mainly used after execute()
   * use $type=CURLINFO_HEADER_OUT for header, and $type=CURLINFO_HTTP_CODE for http_code
  */
  public function getInfo($type)
  {
    if($this->isCurlSet()){
      return curl_getinfo($this->curl, $type);
    }else {
      throw new SdkException("cURL instance is not set when trying to get info from the type:" . $type);
    }
  }

  /**
   * Close the resource connection to curl
   * Remove the pointer after closed 
  */
  public function close()
  {
      curl_close($this->curl);
      $this->curl = null;
  }
}

 ?>
