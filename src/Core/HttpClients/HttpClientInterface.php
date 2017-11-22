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

/**
 * A Parent Interface for all the Http Clients
 *
 * @package QuickbooksOnline
 */
 interface HttpClientInterface
 {
    /**
     *  Use a client to send request to server and get response to parse
     *  @param string  $url         The endpoint url
     *  @param string  $method      It will be either POST or GET
     *  @param array   $headers     THe headers for this request
     *  @param string  $body        For POST request, it will be the JSON
     *  @param int     $timeout     THe timeout in seconds for the request
     *  @param boolean $verifySSL   Set to false for OAuth 1, set to true for OAuth 2
     *  @return IntuitResponse      Return the Intuit Response based on the HTTP Response
     *  @throws SDKException        If there is a configuration or the Netwokr issue, a SDKException is thrown.
     */
     public function makeAPICall($url, $method, array $headers, $body, $timeOut, $verifySSL);

     /**
      * Prepare the necessary options for the HTTP Client. For example, set the headers, Body and request url.
      *
      *  @param string  $url         The endpoint url
      *  @param string  $method      It will be either POST or GET
      *  @param array   $headers     THe headers for this request
      *  @param string  $body        For POST request, it will be the JSON
      *  @param int     $timeout     THe timeout in seconds for the request
      *  @param boolean $verifySSL   Set to false for OAuth 1, set to true for OAuth 2
      */
     public function prepareRequest($url, $method, array $headers, $body, $timeOut, $verifySSL);

     /**
      * Return the last Response of API call
      *
      * @return IntuitResponse | False
      */
     public function getLastResponse();

     /**
      * Convert the response returned from server to a Customeized Intuit Response
      * @param mix  The response from the http client
      */
     public function setIntuitResponse($response);
}
