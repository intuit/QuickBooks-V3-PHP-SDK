<?php

require_once(PATH_SDK_ROOT . 'Core/Configuration/IppConfiguration.php');
require_once(PATH_SDK_ROOT . 'Core/Configuration/Message.php');
require_once(PATH_SDK_ROOT . 'Core/Configuration/CompressionFormat.php');
require_once(PATH_SDK_ROOT . 'Core/Configuration/SerializationFormat.php');
require_once(PATH_SDK_ROOT . 'Core/Configuration/BaseUrl.php');
require_once(PATH_SDK_ROOT . 'Core/Configuration/Logger.php');
require_once(PATH_SDK_ROOT . 'Core/Configuration/ContentWriterSettings.php');
require_once(PATH_SDK_ROOT . 'Security/OAuthRequestValidator.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/CompressionFormat.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/SerializationFormat.php');



/**
 * Specifies the Default Configuration Reader implmentation used by the SDK.
 * 
 * TODO: Improve internal implementation of the config reader
 */
class LocalConfigReader
{
	/**
	 * Reads the configuration from the config file and converts it to custom 
	 * config objects which the end developer will use to get or set the properties.
	 * 
	 * @return IppConfiguration The custom config object.
	 */
	public static function ReadConfiguration()
	{
		/*
		// Example:
		
		<?xml version="1.0" encoding="utf-8" ?>
		<configuration>
		  <intuit>
		    <ipp>
		      <security mode="OAuth">
		        <oauth consumerKey="" consumerToken="" accessKey="" accessToken="" />
		      </security>
		      <message>
		        <request serializationFormat="Xml" compressionFormat="None"/>
		        <response serializationFormat="Xml" compressionFormat="None"/>
		      </message>
		      <service>
		        <baseUrl qbd="https://quickbooks.api.intuit.com/" qbo="https://quickbooks.api.intuit.com/" ipp="https://appcenter.intuit.com" />
		      </service>
		      <logger>       
		        <!-- To enable/disable Request and Response log-->
		        <requestLog enableRequestResponseLogging="true" requestResponseLoggingDirectory="/IdsLogs" />    
		      </logger>
		    </ipp>
		  </intuit>
		  <appSettings>
		  </appSettings>
		</configuration>
		*/
		
		$ippConfig = new IppConfiguration();
		
		$xmlObj = simplexml_load_file(PATH_SDK_ROOT . 'sdk.config');

		// Initialize OAuthRequestValidator Configuration Object
		if ($xmlObj &&
		    $xmlObj->intuit &&
		    $xmlObj->intuit->ipp &&
		    $xmlObj->intuit->ipp->security &&
		    $xmlObj->intuit->ipp->security->oauth && 
		    $xmlObj->intuit->ipp->security->oauth->attributes())
		{
			$ippConfig->Security = new OAuthRequestValidator($xmlObj->intuit->ipp->security->oauth->attributes()->accessToken,
			                                                 $xmlObj->intuit->ipp->security->oauth->attributes()->accessKey,
			                                                 $xmlObj->intuit->ipp->security->oauth->attributes()->consumerToken,
			                                                 $xmlObj->intuit->ipp->security->oauth->attributes()->consumerKey
			                                                 );
		}

        // Get value for SSL Check
        if ($xmlObj &&
            $xmlObj->intuit &&
            $xmlObj->intuit->ipp &&
            $xmlObj->intuit->ipp->security &&
            $xmlObj->intuit->ipp->security->OAuthSSL &&
            $xmlObj->intuit->ipp->security->OAuthSSL->attributes())
        {
            // SSLCheckStatus
            $SSLCheckFlag = strtolower(trim($xmlObj->intuit->ipp->security->OAuthSSL->attributes()->check));
            $ippConfig->SSLCheckStatus = ($SSLCheckFlag === "false") ? false : true;

        }

		// Initialize Request Configuration Object
		$ippConfig->Message = new Message();
		$ippConfig->Message->Request = new Request();
        $ippConfig->Message->Response = new Response();

		$requestSerializationFormat = NULL;
		$requestCompressionFormat = NULL;
		$responseSerializationFormat = NULL;
		$responseCompressionFormat = NULL;
		
		if ($xmlObj &&
		    $xmlObj->intuit &&
		    $xmlObj->intuit->ipp &&
		    $xmlObj->intuit->ipp->message &&
		    $xmlObj->intuit->ipp->message->request &&
		    $xmlObj->intuit->ipp->message->request->attributes())
		{
			$requestAttr = $xmlObj->intuit->ipp->message->request->attributes();
			$requestSerializationFormat = (string)$requestAttr->serializationFormat;
			$requestCompressionFormat = (string)$requestAttr->compressionFormat;
		}

		// Initialize Response Configuration Object
		if ($xmlObj &&
		    $xmlObj->intuit &&
		    $xmlObj->intuit->ipp &&
		    $xmlObj->intuit->ipp->message &&
		    $xmlObj->intuit->ipp->message->response->attributes())
		{
			$responseAttr = $xmlObj->intuit->ipp->message->response->attributes();
			$responseSerializationFormat = (string)$responseAttr->serializationFormat;
			$responseCompressionFormat = (string)$responseAttr->compressionFormat;
		}

        switch ($requestCompressionFormat)
        {
            case Intuit\Ipp\Utility\CompressionFormat::None:
                $ippConfig->Message->Request->CompressionFormat = CompressionFormat::None;
                break;
            case Intuit\Ipp\Utility\CompressionFormat::GZip:
                $ippConfig->Message->Request->CompressionFormat = CompressionFormat::GZip;
                break;
            case Intuit\Ipp\Utility\CompressionFormat::Deflate:
                $ippConfig->Message->Request->CompressionFormat = CompressionFormat::Deflate;
                break;
            default:
                break;
        }
        
        switch ($responseCompressionFormat)
        {
            case Intuit\Ipp\Utility\CompressionFormat::None:
                $ippConfig->Message->Response->CompressionFormat = CompressionFormat::None;
                break;
            case Intuit\Ipp\Utility\CompressionFormat::GZip:
                $ippConfig->Message->Response->CompressionFormat = CompressionFormat::GZip;
                break;
            case Intuit\Ipp\Utility\CompressionFormat::Deflate:
                $ippConfig->Message->Response->CompressionFormat = CompressionFormat::Deflate;
                break;
        }

        switch ($requestSerializationFormat)
        {
            //case Intuit\Ipp\Utility\SerializationFormat::DEFAULT:
            case Intuit\Ipp\Utility\SerializationFormat::Xml:
                $ippConfig->Message->Request->SerializationFormat = SerializationFormat::Xml;
                break;
            case Intuit\Ipp\Utility\SerializationFormat::Json:
                $ippConfig->Message->Request->SerializationFormat = SerializationFormat::Json;
                break;
            case Intuit\Ipp\Utility\SerializationFormat::Custom:
                $ippConfig->Message->Request->SerializationFormat = SerializationFormat::Custom;
                break;
        }

        switch ($responseSerializationFormat)
        {
            case Intuit\Ipp\Utility\SerializationFormat::Xml:
                $ippConfig->Message->Response->SerializationFormat = SerializationFormat::Xml;
                break;
            //case Intuit\Ipp\Utility\SerializationFormat::DEFAULT:
            case Intuit\Ipp\Utility\SerializationFormat::Json:
                $ippConfig->Message->Response->SerializationFormat = SerializationFormat::Json;
                break;
            case Intuit\Ipp\Utility\SerializationFormat::Custom:
                $ippConfig->Message->Response->SerializationFormat = SerializationFormat::Custom;
                break;
        }

		// Initialize BaseUrl Configuration Object
		$ippConfig->BaseUrl = new BaseUrl();
		if ($xmlObj &&
		    $xmlObj->intuit &&
		    $xmlObj->intuit->ipp &&
		    $xmlObj->intuit->ipp->service &&
		    $xmlObj->intuit->ipp->service->baseUrl && 
		    $xmlObj->intuit->ipp->service->baseUrl->attributes())
		{
			$responseAttr = $xmlObj->intuit->ipp->service->baseUrl->attributes();
			$ippConfig->BaseUrl->Qbd = (string)$responseAttr->qbd;
			$ippConfig->BaseUrl->Qbo = (string)$responseAttr->qbo;
			$ippConfig->BaseUrl->Ipp = (string)$responseAttr->ipp;
		}

		// Initialize Logger
		$ippConfig->Logger = new LoggerMech();
		if ($xmlObj &&
		    $xmlObj->intuit &&
		    $xmlObj->intuit->ipp &&
		    $xmlObj->intuit->ipp->logger &&
		    $xmlObj->intuit->ipp->logger->requestLog && 
		    $xmlObj->intuit->ipp->logger->requestLog->attributes())
		{
			$requestLogAttr = $xmlObj->intuit->ipp->logger->requestLog->attributes();
			$ippConfig->Logger->RequestLog->ServiceRequestLoggingLocation = (string)$requestLogAttr->requestResponseLoggingDirectory;
			$ippConfig->Logger->RequestLog->EnableRequestResponseLogging = (string)$requestLogAttr->enableRequestResponseLogging;
		}
                
                // A developer is forced to write in the same style.
                // This should be refactored
                $ippConfig->ContentWriter = new ContentWriterSettings();
                if ($xmlObj &&
		    $xmlObj->intuit &&
		    $xmlObj->intuit->ipp &&
		    $xmlObj->intuit->ipp->contentWriter &&
		    $xmlObj->intuit->ipp->contentWriter->attributes())
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
		}
                
                self::initOperationControlList($ippConfig,self::getRules()); 
		$specialConfig = self::populateJsonOnlyEntities($xmlObj);
                if(is_array($specialConfig) && ($ippConfig->OpControlList instanceof OperationControlList)) {
                    $ippConfig->OpControlList->appendRules($specialConfig);
                }
                
                self::setupMinorVersion($ippConfig,$xmlObj);
                
		return $ippConfig;
	}
        
        /**
         * Initializes operation contrtol list
         * @param IppConfiguration $ippConfig
         * @param array $array
         */
        public static function initOperationControlList($ippConfig, $array)
        {
            $ippConfig->OpControlList = new OperationControlList( OperationControlList::getDefaultList(true) );
            $ippConfig->OpControlList->appendRules($array);
        }
        
                /**
         * Initializes operation contrtol list
         * @param IppConfiguration $ippConfig
         * @param array $array
         */
        public static function setupMinorVersion($ippConfig, $xmlObj)
        {
            if($xmlObj &&
                $xmlObj->intuit &&
		$xmlObj->intuit->ipp && $xmlObj->intuit->ipp->minorVersion){
                    $ippConfig->minorVersion = (int) $xmlObj->intuit->ipp->minorVersion;
            }         
        }
        
        /**
         * Returns current rules
         * @return array
         */
        public static function getRules()
        {
            return 
               array(
                    OperationControlList::ALL => array(
                                                        "DownloadPDF" => FALSE,
                                                        "jsonOnly" => FALSE,
                                                        "SendEmail"=> FALSE
                                                      ),
                    "IPPTaxService" => array(OperationControlList::ALL => FALSE, 
                                             'Add' => TRUE),
                    "IPPSalesReceipt" => array( "DownloadPDF" => TRUE, "SendEmail" => TRUE ),
                    "IPPInvoice"      => array( "DownloadPDF" => TRUE, "SendEmail" => TRUE  ),
                    "IPPEstimate"     => array( "DownloadPDF" => TRUE, "SendEmail" => TRUE  ),
                );
        }
        
        /**
         * Returns array in a OperationControlList rules format from XML
         * @param type $xmlObj
         * @return boolean
         */
        public static function populateJsonOnlyEntities($xmlObj)
        {
            if( $xmlObj &&
                $xmlObj->intuit &&
                $xmlObj->intuit->ipp &&
                $xmlObj->intuit->ipp->specialConfiguration) {
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
         * Creates PHP class entity from intuit name
         * @param type $name
         * @return type
         */
        private static function decorateEntity($name)
        {
            return PHP_CLASS_PREFIX . $name;
        }

}

