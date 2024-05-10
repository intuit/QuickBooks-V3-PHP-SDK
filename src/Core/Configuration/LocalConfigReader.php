<?php
namespace QuickBooksOnline\API\Core\Configuration;

use QuickBooksOnline\API\Security\OAuthRequestValidator;
use QuickBooksOnline\API\Core\Http\Compression\CompressionFormat;
use QuickBooksOnline\API\Core\Http\Serialization\SerializationFormat;
use QuickBooksOnline\API\Core\CoreConstants;
use QuickBooksOnline\API\Core\Http\Message;
use QuickBooksOnline\API\Core\Http\Request;
use QuickBooksOnline\API\Core\Http\Response;
use QuickBooksOnline\API\Diagnostics\Logger;
use QuickBooksOnline\API\Core\Configuration\OperationControlList;
use QuickBooksOnline\API\Core\OAuth\OAuth2\OAuth2AccessToken;
use SimpleXMLElement;
use QuickBooksOnline\API\Exception\SdkException;

/**
 * Specifies the Default Configuration Reader implmentation used by the SDK. The ConfigReader can either read a file or from passed arrays
 *
 * @hao - separate each function to its own method
 *
 * Example XML File

 * Example:
 *<?xml version="1.0" encoding="utf-8" ?>
*<configuration>
 *<intuit>
    * <ipp>
        * <security mode="OAuth">
            * <oauth1 consumerKey="lve2eZN6ZNBrjN0Wp26JVYJbsOOFbF"
                *			consumerSecret="fUhPIeu6jrq1UmNGXSMsIsl0JaHuHzSkFf3tsmrW"
                    *		accessTokenKey="qye2etcpyquO3B1t8ydZJI8OTelqJCMiLZlY5LdX7qZunwoo"
                        *	accessTokenSecret="2lEUtSEIvXf64CEkMLaGDK5rCwaxE9UvfW1dYrrH"
                            *QBORealmID="193514489870599"/>
         *</security>
         *<message>
            * <request serializationFormat="Xml" compressionFormat="None"/>
             *<response serializationFormat="Xml" compressionFormat="None"/>
         *</message>
         *<service>
            * <baseUrl qbo="https://qbonline-e2e.api.intuit.com/" ipp="https://appcenter.intuit.com/api/" />
         *</service>
         *<logger>
            * <requestLog enableRequestResponseLogging="true" requestResponseLoggingDirectory="/tmp/IdsLogs" />
         *</logger>
         *<!--
            * Available strategies are file, handler and export.
             *file - saves response into temporary file in system temp folder.
                *			The file should be removed manually

             *handler - saves response into temporary file and provides file handler.
                *				 The file is automatically removed after script termination or when developer closes the handler

             *export - saves response into export folder. Additional parameter "exportDirectory" should be specified
                *	<contentWriter strategy="export" exportDirectory="/path/to/target/folder">

             *For advance usage you can specify returnObject="true" to work with instance of contentWriter
         *-->
         *<contentWriter strategy="file" prefix="ipp"/>
         *<specialConfiguration>
        *		 <TaxService jsonOnly="true"/>
*		 </specialConfiguration>
    *	 <minorVersion>3</minorVersion>
     *</ipp>
 *</intuit>
*</configuration>
 */
class LocalConfigReader
{
    /**
     * Reads the configuration from the config file and converts it to custom
     * config objects which the end developer will use to get or set the properties.
     *
     * @param $filePath
     *           A Customer FilePath. If different than the default sdk.config file
     * @return IppConfiguration The custom config object.
     */
    public static function ReadConfigurationFromFile($filePath, $OAuthOption = CoreConstants::OAUTH1)
    {
        $ippConfig = new IppConfiguration();

        try {
            if (isset($filePath) && file_exists($filePath)) {
                $xmlObj = simplexml_load_file($filePath);
            } else {
                // $xmlObj = simplexml_load_file(PATH_SDK_ROOT . 'sdk.config');
                 throw new \Exception("Can't Read Configuration from file: ". $filePath);
            }

            LocalConfigReader::initializeOAuthSettings($xmlObj, $ippConfig, $OAuthOption);
            LocalConfigReader::initializeRequestAndResponseSerializationAndCompressionFormat($xmlObj, $ippConfig);
            LocalConfigReader::initializeServiceBaseURLAndLogger($xmlObj, $ippConfig);
            LocalConfigReader::initializeAPIEntityRules($xmlObj, $ippConfig);
            LocalConfigReader::setupMinorVersion($ippConfig, $xmlObj);

            return $ippConfig;
        } catch (\Exception $e) {
            throw new SdkException("Error Reading the ");
        }
    }

    public static function ReadConfigurationFromParameters($OAuthConfig, $baseUrl, $defaultLoggingLocation = CoreConstants::DEFAULT_LOGGINGLOCATION, $minorVersion = CoreConstants::DEFAULT_SDK_MINOR_VERSION)
    {
        $ippConfig = new IppConfiguration();
        try {
                //Set OAuth1 or OAuth2
                if (isset($OAuthConfig)) {
                    $ippConfig->Security = $OAuthConfig;
                } else {
                    throw new \Exception("Empty OAuth Config from Constuct IPP Configuration on LocalConfigReader");
                }
                if($OAuthConfig instanceof OAuthRequestValidator){
                  $ippConfig->OAuthMode = CoreConstants::OAUTH1;
                }else{
                  $ippConfig->OAuthMode = CoreConstants::OAUTH2;
                }
                //Set Logger and Searlization format. The default one is XML
                LocalConfigReader::initializeMessage($ippConfig);
                LocalConfigReader::setRequestAndResponseSerializationFormat($ippConfig, CompressionFormat::None, CompressionFormat::None, SerializationFormat::Xml, SerializationFormat::Xml);
                //Set base Urls
                $ippConfig->BaseUrl = new BaseUrl();
                $ippConfig->BaseUrl->Qbo = $baseUrl;
                //Set content writer and logger
                LocalConfigReader::setupLogger($ippConfig, $defaultLoggingLocation, "TRUE");
                LocalConfigReader::setupContentWriter($ippConfig, CoreConstants::FILE_STRATEGY, CoreConstants::PHP_CLASS_PREFIX, null, false);
                //Set API Entity Rules
                $rules=CoreConstants::getQuickBooksOnlineAPIEntityRules();
                LocalConfigReader::initOperationControlList($ippConfig, $rules);
                //Set minor version
                $ippConfig->minorVersion = $minorVersion;

            return $ippConfig;
        } catch (\Exception $e) {
            throw new \Exception("Can't Config Environments from passed parameters");
        }
    }

    /**
    * Initializes API Entity Rules
    *
    * @param IppConfiguration $ippConfig
    * @param \SimpleXMLElement $xmlObj
  */
    public static function initializeAPIEntityRules($xmlObj, $ippConfig)
    {
        $rules=CoreConstants::getQuickBooksOnlineAPIEntityRules();
        LocalConfigReader::initOperationControlList($ippConfig, $rules);
        $specialConfig = LocalConfigReader::populateJsonOnlyEntities($xmlObj);
        if (is_array($specialConfig) && ($ippConfig->OpControlList instanceof OperationControlList)) {
            $ippConfig->OpControlList->appendRules($specialConfig);
        }
    }

  /**
   * Initializes operation contrtol list
   * @param IppConfiguration $ippConfig
   * @param array $array
  */
  public static function initOperationControlList($ippConfig, $array)
  {
      $ippConfig->OpControlList = new OperationControlList(OperationControlList::getDefaultList(true));
      $ippConfig->OpControlList->appendRules($array);
  }

   /**
    * Initializes operation contrtol list
    * @param IppConfiguration $ippConfig
    * @param \SimpleXMLElement $xmlObj
   */
   public static function setupMinorVersion($ippConfig, $xmlObj)
   {
       if (isset($xmlObj) &&
             isset($xmlObj->intuit->ipp->minorVersion)) {
           $ippConfig->minorVersion = (int) $xmlObj->intuit->ipp->minorVersion;
       }
   }



   /**
    * Returns array in a OperationControlList rules format from XML
    * @param \SimpleXMLElement $xmlObj
    * @return boolean
   */
   public static function populateJsonOnlyEntities($xmlObj)
   {
       if (isset($xmlObj) &&
            isset($xmlObj->intuit->ipp->specialConfiguration)) {
           $specialCnf = $xmlObj->intuit->ipp->specialConfiguration;
           if (!$specialCnf instanceof SimpleXMLElement) {
               return false;
           }
           if (!$specialCnf->children() instanceof SimpleXMLElement) {
               return false;
           }
           if (!$specialCnf->children()->count()) {
               return false;
           }
           $rules = array();
           foreach ($specialCnf->children() as $entity) {
               if (!$entity->attributes()->count()) {
                   continue;
               }
               $name = self::decorateEntity($entity->getName());
               if (!array_key_exists($name, $rules)) {
                   $rules[$name] = array();
               }
               foreach ($entity->attributes() as $attr) {
                   $rules[$name][$attr->getName()] = filter_var((string)$entity->attributes(), FILTER_VALIDATE_BOOLEAN);
               }
           }
           return $rules;
       }
       return false;
   }

     /**
     * Initialize OAuth Settings from Simple XML Reading from SDK.config or specific file
     * rightnow the default OAuth module is OAuth 1.
     * @Hao
     */
   public static function initializeOAuthSettings($xmlObj, $ippConfig, $OAuthOption)
   {

         // if it is OAuth1 Settings.
         if (isset($xmlObj) &&
                 isset($xmlObj->intuit->ipp->security) &&
                 $OAuthOption == CoreConstants::OAUTH1  &&
                 isset($xmlObj->intuit->ipp->security->oauth1)) {
             try {
                 $currentAccessTokenKey = $xmlObj->intuit->ipp->security->oauth1->attributes()['accessTokenKey'];
                 $currentAccessTokenSecret = $xmlObj->intuit->ipp->security->oauth1->attributes()['accessTokenSecret'];
                 $currentConsumerKey = $xmlObj->intuit->ipp->security->oauth1->attributes()['consumerKey'];
                 $currentConsumerSecret =    $xmlObj->intuit->ipp->security->oauth1->attributes()['consumerSecret'];
                 $ippConfig->RealmID =  $xmlObj->intuit->ipp->security->oauth1->attributes()['QBORealmID'];
                 $ippConfig->OAuthMode = CoreConstants::OAUTH1;
             } catch (\Exception $e) {
                 throw new \Exception("Can't Read OAuth1 values from config file.");
             }
             $ippConfig->Security = new OAuthRequestValidator($currentAccessTokenKey, $currentAccessTokenSecret, $currentConsumerKey, $currentConsumerSecret);
         }
         // OAUth 2 settings if available
         elseif (isset($xmlObj) &&
                 isset($xmlObj->intuit->ipp->security) &&
                 $OAuthOption == CoreConstants::OAUTH2  &&
                 isset($xmlObj->intuit->ipp->security->oauth2)) {
             //Implement OAuth 2 parts here
            // Set SSL check status to be true
            $ippConfig->SSLCheckStatus = true;
            $currentOAuth2AccessTokenKey = $xmlObj->intuit->ipp->security->oauth2->attributes()['accessTokenKey'];
            $currentOAuth2RefreshTokenKey = $xmlObj->intuit->ipp->security->oauth2->attributes()['refreshTokenKey'];
            $clientID = $xmlObj->intuit->ipp->security->oauth2->attributes()['ClientID'];
            $clientSecret =    $xmlObj->intuit->ipp->security->oauth2->attributes()['ClientSecret'];
            $ippConfig->RealmID =  $xmlObj->intuit->ipp->security->oauth2->attributes()['QBORealmID'];
            $OAuth2AccessToken = new OAuth2AccessToken($clientID, $clientSecret, $currentOAuth2AccessTokenKey, $currentOAuth2RefreshTokenKey);

            $ippConfig->Security = $OAuth2AccessToken;
            $ippConfig->OAuthMode = CoreConstants::OAUTH2;
         } else {
             throw new \Exception("Can't load " .$OAuthOption .  " config from config file or the OAuth option is not supported.");
         }
   }

     /**
       * Initialize Compression Serialization format Settings from Simple XML Reading from SDK.config
     * @Hao
     */
     public static function initializeRequestAndResponseSerializationAndCompressionFormat($xmlObj, $ippConfig)
     {
         LocalConfigReader::initializeMessage($ippConfig);

         $requestSerializationFormat = null;
         $requestCompressionFormat = null;
         $responseSerializationFormat = null;
         $responseCompressionFormat = null;

         if (isset($xmlObj) &&
                 isset($xmlObj->intuit->ipp->message->request)) {
             $requestAttr = $xmlObj->intuit->ipp->message->request->attributes();
             $requestSerializationFormat = (string)$requestAttr->serializationFormat;
             $requestCompressionFormat = (string)$requestAttr->compressionFormat;
         }

         // Initialize Response Configuration Object
         if (isset($xmlObj) &&
                 isset($xmlObj->intuit->ipp->message->response)) {
             $responseAttr = $xmlObj->intuit->ipp->message->response->attributes();
             $responseSerializationFormat = (string)$responseAttr->serializationFormat;
             $responseCompressionFormat = (string)$responseAttr->compressionFormat;
         }
         LocalConfigReader::setRequestAndResponseSerializationFormat($ippConfig, $requestCompressionFormat, $responseCompressionFormat, $requestSerializationFormat, $responseSerializationFormat);
     }

    public static function initializeMessage($ippConfig)
    {
        // Initialize Request Configuration Object
         $ippConfig->Message = new Message();
        $ippConfig->Message->Request = new Request();
        $ippConfig->Message->Response = new Response();
    }

    public static function setRequestAndResponseSerializationFormat($ippConfig, $requestCompressionFormat, $responseCompressionFormat, $requestSerializationFormat, $responseSerializationFormat)
    {
        switch ($requestCompressionFormat) {
                        case CompressionFormat::None:
                                $ippConfig->Message->Request->CompressionFormat = CompressionFormat::None;
                                break;
                        case CompressionFormat::GZip:
                                $ippConfig->Message->Request->CompressionFormat = CompressionFormat::GZip;
                                break;
                        case CompressionFormat::Deflate:
                                $ippConfig->Message->Request->CompressionFormat = CompressionFormat::Deflate;
                                break;
                        default:
                                //Default compression set to None
                                $ippConfig->Message->Request->CompressionFormat = CompressionFormat::None;
                                break;
         }

        switch ($responseCompressionFormat) {
                        case CompressionFormat::None:
                                $ippConfig->Message->Response->CompressionFormat = CompressionFormat::None;
                                break;
                        case CompressionFormat::GZip:
                                $ippConfig->Message->Response->CompressionFormat = CompressionFormat::GZip;
                                break;
                        case CompressionFormat::Deflate:
                                $ippConfig->Message->Response->CompressionFormat = CompressionFormat::Deflate;
                                break;
                        default:
                                //Default compression set to None
                                $ippConfig->Message->Response->CompressionFormat = CompressionFormat::None;
                                break;
            }

        switch ($requestSerializationFormat) {
                        //case Intuit\Ipp\Utility\SerializationFormat::DEFAULT:
                        case SerializationFormat::Xml:
                                $ippConfig->Message->Request->SerializationFormat = SerializationFormat::Xml;
                                break;
                        case SerializationFormat::Json:
                                $ippConfig->Message->Request->SerializationFormat = SerializationFormat::Json;
                                break;
                        case SerializationFormat::Custom:
                                $ippConfig->Message->Request->SerializationFormat = SerializationFormat::Custom;
                                break;
                        default:
                                //Default compression set to XML
                                $ippConfig->Message->Request->SerializationFormat = SerializationFormat::Xml;
                                break;
            }

        switch ($responseSerializationFormat) {
                        case SerializationFormat::Xml:
                                $ippConfig->Message->Response->SerializationFormat = SerializationFormat::Xml;
                                break;
                        //case Intuit\Ipp\Utility\SerializationFormat::DEFAULT:
                        case SerializationFormat::Json:
                                $ippConfig->Message->Response->SerializationFormat = SerializationFormat::Json;
                                break;
                        case SerializationFormat::Custom:
                                $ippConfig->Message->Response->SerializationFormat = SerializationFormat::Custom;
                                break;
                        default:
                                //Default compression set to XML
                                $ippConfig->Message->Response->SerializationFormat = SerializationFormat::Xml;
                                break;
            }
    }

     /**
       * Initialize BaseURL and log Settings from Simple XML Reading from SDK.config
     * @Hao
     */
     public static function initializeServiceBaseURLAndLogger($xmlObj, $ippConfig)
     {
         // Initialize BaseUrl Configuration Object
        $ippConfig->BaseUrl = new BaseUrl();
         if (isset($xmlObj) &&
             isset($xmlObj->intuit->ipp->service->baseUrl)) {
             $responseAttr = $xmlObj->intuit->ipp->service->baseUrl->attributes();
             $ippConfig->BaseUrl->Qbo = (string)$responseAttr->qbo;
             $ippConfig->BaseUrl->Ipp = (string)$responseAttr->ipp;
         } else {
             throw new \Exception("Base Url is not available from Config file.");
         }

        // Initialize Logger
        if (isset($xmlObj) &&
                 isset($xmlObj->intuit->ipp->logger->requestLog)) {
            $requestLogAttr = $xmlObj->intuit->ipp->logger->requestLog->attributes();
            $ServiceRequestLoggingLocation = (string)$requestLogAttr->requestResponseLoggingDirectory;
            $EnableRequestResponseLogging = (string)$requestLogAttr->enableRequestResponseLogging;
            LocalConfigReader::setupLogger($ippConfig, $ServiceRequestLoggingLocation, $EnableRequestResponseLogging);
        } else {
            throw new \Exception("Log settings is not available from Config file.");
        }

     // A developer is forced to write in the same style.
     // This should be refactored
     if (isset($xmlObj) &&
              isset($xmlObj->intuit->ipp->contentWriter)) {
         $contentWriterAttr = $xmlObj->intuit->ipp->contentWriter->attributes();
         $strategy = ContentWriterSettings::checkStrategy((string)$contentWriterAttr->strategy);
         $prefix = (string)$contentWriterAttr->prefix;
         $exportDir = $contentWriterAttr->exportDirectory;
         $returnOject = $contentWriterAttr->returnObject;
         LocalConfigReader::setupContentWriter($ippConfig, $strategy, $prefix, $exportDir, $returnOject);
     } else {
         throw new \Exception("Content Writer Settings is not available from Config file.");
     }
     }

    public static function setupLogger($ippConfig, $ServiceRequestLoggingLocation, $EnableRequestResponseLogging)
    {
        $ippConfig->Logger = new Logger();
        $ippConfig->Logger->RequestLog->ServiceRequestLoggingLocation = $ServiceRequestLoggingLocation;
        $ippConfig->Logger->RequestLog->EnableRequestResponseLogging = $EnableRequestResponseLogging;
    }

    public static function setupContentWriter($ippConfig, $strategy, $prefix, $exportDir, $returnOject)
    {
        $ippConfig->ContentWriter = new ContentWriterSettings();
        $ippConfig->ContentWriter->strategy = $strategy;
        $ippConfig->ContentWriter->prefix = $prefix;
        $ippConfig->ContentWriter->exportDir = $exportDir ? (string)$exportDir : null;
        $ippConfig->ContentWriter->returnOject = $returnOject ? filter_var($returnOject, FILTER_VALIDATE_BOOLEAN): false;
        $ippConfig->ContentWriter->verifyConfiguration();
    }


   /**
   * Creates PHP class entity from intuit name
   * @param string $name
   * @return string
   */
   private static function decorateEntity($name)
   {
       return CoreConstants::PHP_CLASS_PREFIX . $name;
   }
}
