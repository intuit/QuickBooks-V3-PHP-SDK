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

 use QuickBooksOnline\API\Core\CoreConstants;
 use QuickBooksOnline\API\Exception\SdkException;


/**
 * Class ClientFactory
 *
 * A client factory to create different type of Http client instance for sending HTTP/HTTPS requests over Network.
 */
class ClientFactory{

  //private constructor for static factory class
  private function __construct(){}

  /**
   * A static factory to create Http Client.
   * @param String HttpClient Name, default is using curl. Developer can set guzzleclient by passing 'guzzle' as client Name
   * @return HttpClientInterface
   */
  public static function createClient($clientName = CoreConstants::CLIENT_CURL){
      if($clientName == CoreConstants::CLIENT_CURL){
         if(extension_loaded('curl')){
            return new CurlHttpClient();
         }else{
            throw new SdkException("curl extension is not enabled. Cannot create curl http client for the SDK.");
         }
      }

      if(strcasecmp($clientName, CoreConstants::CLIENT_GUZZLE) == 0 ||strcasecmp($clientName, CoreConstants::CLIENT_GUZZLE_FULL) == 0){
          if(class_exists('GuzzleHttp\Client')){
             return new GuzzleHttpClient();
          }else{
            throw new SdkException("guzzle client cannot be found. Cannot create guzzle http client for the SDK.");
          }
      }

      throw new SdkException("The client Name you passed is not supported. Please use either 'curl' or 'guzzle' for the client Name.");
  }
}
