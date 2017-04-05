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





/**
 * Specifies the Default Configuration Reader implmentation used by the SDK.
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
	public static function ReadConfiguration($filePath = null, $OAuthOption = CoreConstants::OAUTH1)
	{
		$ippConfig = new IppConfiguration();

		try {

			if(isset($filePath) && file_exists($filePath)){
				  $xmlObj = simplexml_load_file($filePath);
			}else
			{
				  $xmlObj = simplexml_load_file(PATH_SDK_ROOT . 'sdk.config');
			}

			LocalConfigReader::initializeOAuthSettings($xmlObj, $ippConfig, $OAuthOption);
			LocalConfigReader::initializeRequestAndResponseSerializationAndCompressionFormat($xmlObj, $ippConfig);
	    LocalConfigReader::intializaeServiceBaseURLAndLogger($xmlObj, $ippConfig);
			LocalConfigReader::initializeAPIEntityRules($xmlObj, $ippConfig);
	    LocalConfigReader::setupMinorVersion($ippConfig,$xmlObj);

			return $ippConfig;

		} catch (Exception $e) {
				throw new SdkException("Error Reading the ");
		}


	}

	/**
 	* Initializes API Entity Rules
	*
 	* @param IppConfiguration $ippConfig
	* @param XMLObject $xmlObj
  */
	public static function initializeAPIEntityRules($xmlObj, $ippConfig){
		$rules=CoreConstants::getQuickBooksOnlineAPIEntityRules();
		LocalConfigReader::initOperationControlList($ippConfig, $rules);
		$specialConfig = LocalConfigReader::populateJsonOnlyEntities($xmlObj);
		if(is_array($specialConfig) && ($ippConfig->OpControlList instanceof OperationControlList)) {
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
      $ippConfig->OpControlList = new OperationControlList( OperationControlList::getDefaultList(true));
      $ippConfig->OpControlList->appendRules($array);
  }

   /**
    * Initializes operation contrtol list
    * @param IppConfiguration $ippConfig
    * @param XMLObject $xmlObj
   */
   public static function setupMinorVersion($ippConfig, $xmlObj)
   {
      if(isset($xmlObj) &&
		     isset($xmlObj->intuit->ipp->minorVersion)){
              $ippConfig->minorVersion = (int) $xmlObj->intuit->ipp->minorVersion;
      }
    }



   /**
    * Returns array in a OperationControlList rules format from XML
    * @param type $xmlObj
    * @return boolean
   */
   public static function populateJsonOnlyEntities($xmlObj)
   {
        if( isset($xmlObj) &&
            isset($xmlObj->intuit->ipp->specialConfiguration))
				{
                    $specialCnf = $xmlObj->intuit->ipp->specialConfiguration;
                    if(!$specialCnf instanceof SimpleXMLElement)              { return false; }
                    if(!$specialCnf->children() instanceof SimpleXMLElement)  { return false; }
                    if(!$specialCnf->children()->count())                     { return false; }
                    $rules = array();
                    foreach($specialCnf->children() as $entity) {
                        if(!$entity->attributes()->count()) { continue; }
                        $name = self::decorateEntity($entity->getName());
                        if(!array_key_exists($name, $rules)) {
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
   public static function initializeOAuthSettings($xmlObj, $ippConfig, $OAuthOption){

		 // if it is OAuth1 Settings.
		 if ( isset($xmlObj) &&
		 		 isset($xmlObj->intuit->ipp->security) &&
		 		 $OAuthOption == CoreConstants::OAUTH1  &&
		 		 isset($xmlObj->intuit->ipp->security->oauth1))
		 {
		   	try{
		 	   	$currentAccessTokenKey = $xmlObj->intuit->ipp->security->oauth1->attributes()['accessTokenKey'];
		 	   	$currentAccessTokenSecret = $xmlObj->intuit->ipp->security->oauth1->attributes()['accessTokenSecret'];
		 		  $currentConsumerKey = $xmlObj->intuit->ipp->security->oauth1->attributes()['consumerKey'];
		 	  	$currentConsumerSecret = 	$xmlObj->intuit->ipp->security->oauth1->attributes()['consumerSecret'];
		 		  $ippConfig->RealmID =  $xmlObj->intuit->ipp->security->oauth1->attributes()['QBORealmID'];
		 	  }catch (\Exception $e){
		 		  throw new \Exception("Can't Read OAuth1 values from config file.");
		 	  }
		 	  $ippConfig->Security = new OAuthRequestValidator(	$currentAccessTokenKey,$currentAccessTokenSecret,$currentConsumerKey,$currentConsumerSecret);
		 }
		 // OAUth 2 settings if available
		 else if ( isset($xmlObj) &&
		 		 isset($xmlObj->intuit->ipp->security) &&
		 		 $OAuthOption == CoreConstants::OAUTH2  &&
		 		 isset($xmlObj->intuit->ipp->security->oauth2))
		 {
		 	//Implement OAuth 2 parts here
		 	// Set SSL check status to be true
		 	$ippConfig->SSLCheckStatus = true;
		 }
		 else{
		 		throw new \Exception("Can't load " .$OAuthOption .  " config from config file or the OAuth option is not supported.");
		 }
	 }

	 /**
 	   * Initialize Compression Serialization format Settings from Simple XML Reading from SDK.config
  	 * @Hao
 	 */
	 public static function initializeRequestAndResponseSerializationAndCompressionFormat($xmlObj, $ippConfig){
		 // Initialize Request Configuration Object
		 $ippConfig->Message = new Message();
		 $ippConfig->Message->Request = new Request();
		 $ippConfig->Message->Response = new Response();

		 $requestSerializationFormat = NULL;
		 $requestCompressionFormat = NULL;
		 $responseSerializationFormat = NULL;
		 $responseCompressionFormat = NULL;

		 if (isset($xmlObj) &&
		 		 isset($xmlObj->intuit->ipp->message->request))
		 {
		 	  $requestAttr = $xmlObj->intuit->ipp->message->request->attributes();
		 	  $requestSerializationFormat = (string)$requestAttr->serializationFormat;
		 	  $requestCompressionFormat = (string)$requestAttr->compressionFormat;
		 }

		 // Initialize Response Configuration Object
		 if (isset($xmlObj) &&
		 		 isset($xmlObj->intuit->ipp->message->response))
		 {
		 	  $responseAttr = $xmlObj->intuit->ipp->message->response->attributes();
		 	  $responseSerializationFormat = (string)$responseAttr->serializationFormat;
		 	  $responseCompressionFormat = (string)$responseAttr->compressionFormat;
		 }

		 switch ($requestCompressionFormat)
		 {
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

		 switch ($responseCompressionFormat)
		 {
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

		 	switch ($requestSerializationFormat)
		 	{
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

		 	switch ($responseSerializationFormat)
		 	{
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
	 public static function intializaeServiceBaseURLAndLogger($xmlObj, $ippConfig){
    // Initialize BaseUrl Configuration Object
 		$ippConfig->BaseUrl = new BaseUrl();
 		if ( isset($xmlObj) &&
 		     isset($xmlObj->intuit->ipp->service->baseUrl))
 		{
 			$responseAttr = $xmlObj->intuit->ipp->service->baseUrl->attributes();
 			$ippConfig->BaseUrl->Qbo = (string)$responseAttr->qbo;
 			$ippConfig->BaseUrl->Ipp = (string)$responseAttr->ipp;
 		} else {
 			throw new \Exception("Base Url is not available from Config file.");
 		}

 		// Initialize Logger
 		$ippConfig->Logger = new Logger();
 		if ( isset($xmlObj) &&
 		     isset($xmlObj->intuit->ipp->logger->requestLog))
 		{
 			$requestLogAttr = $xmlObj->intuit->ipp->logger->requestLog->attributes();
 			$ippConfig->Logger->RequestLog->ServiceRequestLoggingLocation = (string)$requestLogAttr->requestResponseLoggingDirectory;
 			$ippConfig->Logger->RequestLog->EnableRequestResponseLogging = (string)$requestLogAttr->enableRequestResponseLogging;
 		}else {
 			throw new \Exception("Log settings is not available from Config file.");
 		}

     // A developer is forced to write in the same style.
     // This should be refactored
     $ippConfig->ContentWriter = new ContentWriterSettings();
     if ( isset($xmlObj) &&
 		      isset($xmlObj->intuit->ipp->contentWriter))
 		{
 			$contentWriterAttr = $xmlObj->intuit->ipp->contentWriter->attributes();
 			$ippConfig->ContentWriter->strategy = ContentWriterSettings::checkStrategy((string)$contentWriterAttr->strategy);
 			$ippConfig->ContentWriter->prefix = (string)$contentWriterAttr->prefix;
      $ippConfig->ContentWriter->exportDir = $contentWriterAttr->exportDirectory
                                                                     ? (string)$contentWriterAttr->exportDirectory
                                                                     : null;
      $ippConfig->ContentWriter->returnOject = $contentWriterAttr->returnObject
                                                                     ? filter_var((string)$contentWriterAttr->returnObject, FILTER_VALIDATE_BOOLEAN)
                                                                     : false;
      $ippConfig->ContentWriter->verifyConfiguration();
 		}else{
			throw new \Exception("Content Writer Settings is not available from Config file.");
		}
	 }


   /**
   * Creates PHP class entity from intuit name
   * @param type $name
   * @return type
   */
   private static function decorateEntity($name)
   {
      return PHP_CLASS_PREFIX . $name;
   }

}
