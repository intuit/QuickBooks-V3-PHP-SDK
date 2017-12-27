<?php
/*******************************************************************************
 * Copyright (c) 2017 Intuit
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *******************************************************************************/
namespace QuickBooksOnline\API\Core\HttpClients;

use QuickBooksOnline\API\Exception\SdkException;

/**
 * Class BaseCurl
 *
 * A Http Client using PHP cURL extension to send HTTP/HTTPS request to QuickBooks Online
 * @package QuickbooksOnline
 *
 */
class BaseCurl{

  /* The cURL extension of PHP */
  private $curl = null;

  /* constructor of BaseCurl */
  public function __construct(){
    $this->init();
  }

  /**
   * Intialize a new PHP cURL extension instance for handling HTTP/HTTPS request
   */
  public function init(){
    if (!extension_loaded('curl')) {
        throw new SdkException('The PHP exention curl must be installed to use this PDK.');
    }
    $this->curl = curl_init();
  }

  /**
   * Check if cURL instance is set or Not
   * @return True or False
   */
  public function isCurlSet(){
      if(!isset($this->curl) || $this->curl === 0) return false;
      return true;
  }

  /**
   * set options for curl
   * @param String $k The key
   * @param String $v The value
   */
  public function setupOption($k, $v){
      if($this->isCurlSet()){
        curl_setopt($this->curl, $k, $v);
      } else {
        throw new SdkException("cURL instance is not set when calling setup Option.");
      }
  }

  /**
   * set options for curl by passing an array
   * @param array $k The options set for the curl
   */
  public function setupCurlOptArray(array $ary){
    if($this->isCurlSet()){
      curl_setopt_array($this->curl, $ary);
    } else {
      throw new SdkException("cURL instance is not set when calling setup curl Option from array.");
    }
  }

  /**
   * Send the request
   * @return the HTTP result
   */
  public function execute(){
    if($this->isCurlSet()){
      return curl_exec($this->curl);
    } else {
      throw new SdkException("cURL instance is not set when trying to execute it.");
    }
  }

  /**
   * retrun the error number
   * @return int Error Number during sending cURL request
   */
  public function errno(){
    if($this->isCurlSet()){
        return curl_errno($this->curl);
    } else {
      throw new SdkException("cURL instance is not set when trying to get errno code from the execution.");
    }
  }

  /**
   * retrun the error message
   * @return string Error nessage during sending cURL request
   */
  public function error(){
    if($this->isCurlSet()){
        return curl_error($this->curl);
    } else {
      throw new SdkException("cURL instance is not set when trying to get error from the execution.");
    }
  }

  /**
   * retrun the curl Version
   * @return curl version
   */
  public function version(){
      return curl_version();
  }

  /**
   * Get info from a curl reference from the type
   * Mainly used after execute()
   * use $type=CURLINFO_HEADER_OUT for header, and $type=CURLINFO_HTTP_CODE for http_code
   * @param String The information you want to retrieve
   * @return mixed
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
