<?php

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
