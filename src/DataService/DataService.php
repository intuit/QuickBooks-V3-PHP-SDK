<?php

require_once(PATH_SDK_ROOT . 'Core/CoreHelper.php');
require_once(PATH_SDK_ROOT . 'Core/ContentWriter.php');
require_once(PATH_SDK_ROOT . 'Core/OperationControlList.php');
require_once(PATH_SDK_ROOT . 'DataService/Batch.php');
require_once(PATH_SDK_ROOT . 'DataService/IntuitCDCResponse.php');

/**
 * This file contains DataService performs CRUD operations on IPP REST APIs.
 */
class DataService {

    /**
     * The METHOD UPDATE.
     */
    const UPDATE = 'update';

    /**
     * The METHOD FINDBYID.
     */
    const FINDBYID = 'FindById';

    /**
     * The METHOD ADD.
    */
    const ADD = 'Add';

    /**
     * The METHOD Delete.
    */
    const DELETE = 'Delete';

    /**
     * The METHOD VOID.
    */
    const VOID = 'Void';

    /**
     * The METHOD UPLOAD.
    */
    const UPLOAD = 'upload';

    /**
     * The METHOD SENDEMAIL.
    */
    const SENDEMAIL = 'SendEmail';

    /**
     * The Service context object.
     * @var ServiceContext
     */
    private $serviceContext;

    /**
     * Rest Request Handler.
     * @var IRestHandler
     */
    private $restHandler;

    /**
     * Serializer needs to be used fore responce object
     * @var IEntitySerializer
     */
    private $responseSerializer;

    /**
     * Serializer needs to be used for request object
     * @var IEntitySerializer
     */
    private $requestSerializer;

    /**
     * If true, indicates a desire to echo verbose output
     * @var bool
     */
    private $verbose;

    /**
    * If not null, the request from last dataService did not return 2xx
    * @var FalutHandler
    */
    private $lastError = null;

    /**
     * Initializes a new instance of the DataService class.
     *
     * @param ServiceContext $serviceContext IPP Service Context
     */
    public function __construct($serviceContext) {
        if (NULL == $serviceContext) {
            throw new InvalidArgumentException('Resources.ServiceContextCannotBeNull');
        }

        if (!is_object($serviceContext)) {
            throw new InvalidParameterException('Wrong arg type passed - is not an object.');
        }

        //ServiceContextValidation(serviceContext);
        $this->serviceContext = $serviceContext;

        $this->setupSerializers();
        $this->useMinorVersion();

        $this->restHandler = new SyncRestHandler($serviceContext);

        // Set the Service type to either QBO or QBD by calling a method.
        $this->serviceContext->UseDataServices();
    }

    /**
    * Get the error from last request
    * @return lastError
    */
    public function getLastError()
    {
      return $this->lastError;
    }

    /**
     * Setups serializers objects for responces and requests based on service context
     */
    public function setupSerializers() {
        $this->responseSerializer = CoreHelper::GetSerializer($this->serviceContext, false);
        $this->requestSerializer = CoreHelper::GetSerializer($this->serviceContext, true);
    }

    private function useMinorVersion()
    {
        $version = $this->serviceContext->IppConfiguration->minorVersion;
        if(is_numeric($version) && !empty($version)) {
            $this->serviceContext->minorVersion = $version;
        }
    }

    public function getMinorVersion()
    {
        return  $this->serviceContext->minorVersion;
    }

    /**
     * Force json serializers for request and response
     */
    public function forceJsonSerializers()
    {
        $this->requestSerializer = new JsonObjectSerializer();
        $this->responseSerializer = new JsonObjectSerializer();
    }

    /**
     * Returns serializer for responce objects
     * @return IEntitySerializer
     */
    protected function getResponseSerializer() {
        return $this->responseSerializer;
    }

    /**
     * Returns serializer for request objects
     * @return IEntitySerializer
     */
    protected function getRequestSerializer() {
        return $this->requestSerializer;
    }

    /**
     * Marshall a POPO object to XML, presumably for inclusion on an IPP v3 API call
     *
     *
     *
     * @param POPOObject $phpObj inbound POPO object
     * @return string XML output derived from POPO object
     * @depricated
     */
    private function getXmlFromObj($phpObj) {
        if (!$phpObj) {
            echo "getXmlFromObj NULL arg\n";
            var_dump(debug_backtrace());
            return FALSE;
        }

        $php2xml = new com\mikebevz\xsd2php\Php2Xml(PHP_CLASS_PREFIX);
        $php2xml->overrideAsSingleNamespace = 'http://schema.intuit.com/finance/v3';

        try {
            return $php2xml->getXml($phpObj);
        } catch (Exception $e) {
            echo "getXmlFromObj EXCEPTION: " . $e->getMessage() . "\n";
            var_dump($phpObj);
            var_dump(debug_backtrace());
            return FALSE;
        }
    }

    /**
     * Decorate an IPP v3 Entity name (like 'Class') to be a POPO class name (like 'IPPClass')
     *
     * @param string Intuit Entity name
     * @return POPO class name
     */
    private static function decorateIntuitEntityToPhpClassName($intuitEntityName) {
        return PHP_CLASS_PREFIX . $intuitEntityName;
    }

    private static function getEntityResourceName($entity)
    {
        return strtolower(self::cleanPhpClassNameToIntuitEntityName(get_class($entity)));
    }

    /**
     * Clean a POPO class name (like 'IPPClass') to be an IPP v3 Entity name (like 'Class')
     *
     * @param string $phpClassName POPO class name
     * @return string Intuit Entity name
     */
    private static function cleanPhpClassNameToIntuitEntityName($phpClassName) {
        if (0 == strpos($phpClassName, PHP_CLASS_PREFIX))
            return substr($phpClassName, strlen(PHP_CLASS_PREFIX));

        return NULL;
    }

    /**
    *  Using the @entity and @uri to generate Request.
    *  Response will parsed. It will store any Error Code in 3xx to 5xx level.
    */
    private function sendRequestParseResponseBodyAndHandleHttpError($entity, $uri, $httpsPostBody, $CALLINGMETHOD, $boundaryString=null, $email=null){
      switch ($CALLINGMETHOD){
        case DataService::DELETE:
        case DataService::ADD:
        case DataService::VOID:
        case DataService::UPDATE:
          $requestParameters = $this->initPostRequest($entity, $uri);
          break;
        case DataService::FINDBYID:
          if ($this->serviceContext->IppConfiguration->Message->Request->SerializationFormat == SerializationFormat::Json) {
              $requestParameters = new RequestParameters($uri, 'GET', CoreConstants::CONTENTTYPE_APPLICATIONJSON, NULL);
            } else {
              $requestParameters = new RequestParameters($uri, 'GET', CoreConstants::CONTENTTYPE_APPLICATIONXML, NULL);
            }
          break;
        case DataService::UPLOAD:
          if(!isset($boundaryString)){
            throw new Exception("Upload Image has unset value: boundaryString.");
          }
          // Creates request parameters
          $requestParameters = $this->getPostRequestParameters($uri, "multipart/form-data; boundary={$boundaryString}");
          break;
        case DataService::SENDEMAIL:
          $requestParameters = $this->getPostRequestParameters($uri . (is_null($email) ? '' :  '?sendTo=' . $email), CoreConstants::CONTENTTYPE_OCTETSTREAM);
          break;
        }

      //$restRequestHandler = new SyncRestHandler($this->serviceContext);
      $restRequestHandler = $this->getRestHandler();
      list($responseCode, $responseBody) = $restRequestHandler->GetResponse($requestParameters, $httpsPostBody, NULL);
      $faultHandler = $restRequestHandler->getFaultHandler();
      if(isset($faultHandler)){
          $this->lastError = $faultHandler;
          return null;
      }else{
         if(strcmp($CALLINGMETHOD, DataService::ADD) == 0){
           $responseBody = $this->fixTaxServicePayload($entity, $responseBody);
         }
         try {
             $parsedResponseBody = $this->getResponseSerializer()->Deserialize($responseBody, TRUE);
         } catch (Exception $e) {
             return new Excepiton("Exception in deserialize ResponseBody.");
         }

        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Finished Executing Method " . $CALLINGMETHOD);
        return $parsedResponseBody;
      }
    }

    /**
     * Updates an entity under the specified realm. The realm must be set in the context.
     *
     * @param IPPIntuitEntity $entity Entity to Update.
     * @return IPPIntuitEntity Returns an updated version of the entity with updated identifier and sync token.
     */
    public function Update($entity) {
        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called Method: Update.");

        // Validate parameter
        if (!$entity) {
            $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Error, "Argument Null Exception");
            throw new IdsException('Argument Null Exception');
        }
        $this->verifyOperationAccess($entity,__FUNCTION__);

        $httpsPostBody = $this->executeObjectSerializer($entity, $urlResource);

        // Builds resource Uri
        // Handle some special cases
        if ((strtolower('preferences') == strtolower($urlResource)) &&
                (IntuitServicesType::QBO == $this->serviceContext->serviceType)) {
            // URL format for *QBO* prefs request is different than URL format for *QBD* prefs request
            $uri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, $urlResource));
        } else if ((strtolower('company') == strtolower($urlResource)) &&
                (IntuitServicesType::QBD == $this->serviceContext->serviceType)) {
            // URL format for *QBD* companyinfo request is different than URL format for *QBO* companyinfo request
            $urlResource = 'companyInfo';
            $uri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, $urlResource . '?operation=update'));
        } else {
            // Normal case
            $uri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, $urlResource . '?operation=update'));
        }

        // Send Request and return response
        return $this->sendRequestParseResponseBodyAndHandleHttpError($entity, $uri, $httpsPostBody, DataService::UPDATE);
    }

    /**
     * Returns an entity under the specified realm. The realm must be set in the context.
     *
     * @param object $entity Entity to Find
     * @return IPPIntuitEntity Returns an entity of specified Id.
     */
    public function FindById($entity) {

        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called Method FindById.");

        $httpsPostBody = $this->executeObjectSerializer($entity, $urlResource);

        // Validate parameter
        if ($entity && (strtolower('preferences') == strtolower($urlResource))) {
            // Exempt from general-purpose bad parameter check.  This is a special, allowable case.
        } else if (!$entity || !$entity->Id) {
            $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Error, "Argument Null Exception");
            throw new IdsException('Argument Null Exception');
        }
        $this->verifyOperationAccess($entity,__FUNCTION__);

        $entityId = $entity->Id;

        // Handle some special cases
        if (strtolower('preferences') == strtolower($urlResource)) {
            // FindById semantics for CompanyInfo are unusual.  Handle via special case.
            $allEntities = $this->FindAll('Preferences');

            foreach ($allEntities as $singletonPreferences) {
                return $singletonPreferences;
            }
            return NULL;
        } else if ((strtolower('company') == strtolower($urlResource)) ||
                (strtolower('companyinfo') == strtolower($urlResource))) {
            // FindById semantics for CompanyInfo are unusual.  Handle via special case.
            $allEntities = $this->FindAll('Company');
            foreach ($allEntities as $oneCompany) {
                if (0 == strcmp($oneCompany->Id, $entity->Id)) {
                    return $oneCompany;
                }
            }
            return NULL;
        } else {
            // Normal case
            $uri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, $urlResource, $entityId));
        }
        // Send request
        return $this->sendRequestParseResponseBodyAndHandleHttpError($entity, $uri, NULL, DataService::FINDBYID);

    }

    /**
     * Creates an entity under the specified realm. The realm must be set in the context.
     *
     * @param IPPIntuitEntity $entity Entity to Create.
     * @return IPPIntuitEntity Returns the created version of the entity.
     */
    public function Add($entity) {
        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called Method Add.");

        // Validate parameter
        if (!$entity) {
            $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Error, "Argument Null Exception");
            throw new IdsException('Argument Null Exception');
        }
        $this->verifyOperationAccess($entity,__FUNCTION__);
        if($this->isJsonOnly($entity)) {
           $this->forceJsonSerializers();
        }
        $httpsPostBody = $this->executeObjectSerializer($entity, $urlResource);

        // Builds resource Uri
        $resourceURI = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, $urlResource));
        $uri = $this->handleTaxService($entity, $resourceURI);

        // Send request
        return $this->sendRequestParseResponseBodyAndHandleHttpError($entity, $uri, $httpsPostBody, DataService::ADD);
    }

    /**
     * Deletes an entity under the specified realm. The realm must be set in the context.
     *
     * @param IPPIntuitEntity $entity Entity to Delete.
     */
    public function Delete($entity) {

        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called Method Delete.");

        // Validate parameter
        if (!$entity) {
            $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Error, "Argument Null Exception");
            throw new IdsException('Argument Null Exception');
        }
        $this->verifyOperationAccess($entity,__FUNCTION__);

        // Builds resource Uri
        $httpsPostBody = $this->executeObjectSerializer($entity, $urlResource);
        $uri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, $urlResource . '?operation=delete'));

        // Creates request
        return $this->sendRequestParseResponseBodyAndHandleHttpError($entity, $uri, $httpsPostBody, DataService::DELETE);

    }

    /**
     * Voids an entity under the specified realm. The realm must be set in the context.
     *
     * @param IPPIntuitEntity $entity Entity to Void.
     */
    public function Void($entity) {

        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called Method Void.");

        // Validate parameter
        if (!$entity) {
            $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Error, "Argument Null Exception");
            throw new IdsException('Argument Null Exception');
        }
        $this->verifyOperationAccess($entity,__FUNCTION__);

        // Builds resource Uri
        $httpsPostBody = $this->executeObjectSerializer($entity, $urlResource);
        $uri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, $urlResource . '?include=void'));

        // Creates request
        return $this->sendRequestParseResponseBodyAndHandleHttpError($entity, $uri, $httpsPostBody, DataService::VOID);

    }

    /**
      * Uploads an image
      *
      * @param string $imgBits image bytes
      * @param string $fileName Filename to use for this file
      * @param string $mimeType MIME type to send in the HTTP Headers
      * @param IPPAttachable $objAttachable entity describing the attachement
      * @return array Returns an array of entities fulfilling the query.
    */
    public function Upload($imgBits, $fileName, $mimeType, $objAttachable) {

          $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called Method Upload.");

          // Validate parameter
          if (!$imgBits || !$mimeType || !$fileName) {
              $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Error, "Argument Null Exception");
              throw new IdsException('Argument Null Exception');
          }
          // Builds resource Uri
          $urlResource = "upload";
          $uri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, $urlResource));

          $boundaryString = md5(time());

          $MetaData = $this->executeObjectSerializer($objAttachable, $urlResource);

            $desiredIdentifier = '0';
            $newline = "\r\n";
            $dataMultipart = '';
            $dataMultipart .= '--' . $boundaryString . $newline;
            $dataMultipart .= "Content-Disposition: form-data; name=\"file_metadata_{$desiredIdentifier}\"" . $newline;
            $dataMultipart .= "Content-Type: " . CoreConstants::CONTENTTYPE_APPLICATIONXML . '; charset=UTF-8' . $newline;
            $dataMultipart .= 'Content-Transfer-Encoding: 8bit' . $newline . $newline;
            $dataMultipart .= $MetaData;
            $dataMultipart .= '--' . $boundaryString . $newline;
            $dataMultipart .= "Content-Disposition: form-data; name=\"file_content_{$desiredIdentifier}\"; filename=\"{$fileName}\"" . $newline;
            $dataMultipart .= "Content-Type: {$mimeType}" . $newline;
            $dataMultipart .= 'Content-Transfer-Encoding: base64' . $newline . $newline;
            $dataMultipart .= chunk_split(base64_encode($imgBits)) . $newline;
            $dataMultipart .= "--" . $boundaryString . "--" . $newline . $newline; // finish with two eol's!!

            return $this->sendRequestParseResponseBodyAndHandleHttpError(null, $uri, $dataMultipart, DataService::UPLOAD, $boundaryString);
    }

    /**
     * Returns PDF for entities which can be downloaded as PDF
     * @param type $entity
     * @return boolean
     * @throws IdsException, SdkException
     *
     */
    public function DownloadPDF($entity) {

        $this->validateEntityId($entity);
        $this->verifyOperationAccess($entity,__FUNCTION__);

         $uri = implode(CoreConstants::SLASH_CHAR,
                        array(  'company',
                                $this->serviceContext->realmId,
                                self::getEntityResourceName($entity),
                                $entity->Id,
                                CoreConstants::getType(CoreConstants::CONTENTTYPE_APPLICATIONPDF)));
         $requestParameters = $this->getGetRequestParameters($uri, CoreConstants::CONTENTTYPE_APPLICATIONPDF);
         $restRequestHandler = $this->getRestHandler();


        list($responseCode, $responseBody) = $restRequestHandler->GetResponse($requestParameters, NULL, NULL);
        $faultHandler = $restRequestHandler->getFaultHandler();
        if(isset($faultHandler)){
            $this->lastError = $faultHandler;
            return NULL;
        }else{
          return $this->processDownloadedContent(new ContentWriter($responseBody),$responseCode, $this->getExportFileNameForPDF($entity, "pdf") );
        }
    }

    /**
     * Returns PDF for entities which can be downloaded as PDF
     * @param type $entity
     * @return boolean
     * @throws IdsException, SdkException
     *
     */
    public function SendEmail($entity,$email=null) {

        $this->validateEntityId($entity);
        $this->verifyOperationAccess($entity,__FUNCTION__);

         $uri = implode(CoreConstants::SLASH_CHAR,
                        array(  'company',
                                $this->serviceContext->realmId,
                                self::getEntityResourceName($entity),
                                $entity->Id,
                                'send'));

        if(is_null($email)) {
            $this->logInfo("Entity ".  get_class($entity)." with id=".$entity->Id." is using default email");
        } else {
            $this->logInfo("Entity ".  get_class($entity)." with id=".$entity->Id." is using $email");
            if(!$this->verifyEmailAddress($email)) {
                $this->logError("Valid email is expected, but received $email");
                throw new SdkException("Valid email is expected, but received $email");
            }
        }

        return $this->sendRequestParseResponseBodyAndHandleHttpError($entity, $uri, null, DataService::SENDEMAIL, null, $email);

    }

    /**
     * Retrieves specified entities based passed page number and page size and query
     *
     * @param string $query Query to issue
     * @param string $pageNumber Starting page number
     * @param string $pageSize Page size
     * @return array Returns an array of entities fulfilling the query.
     */
    public function Query($query, $pageNumber = 0, $pageSize = 500) {
        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called Method Query.");

        if ('QBO' == $this->serviceContext->serviceType)
            $httpsContentType = CoreConstants::CONTENTTYPE_APPLICATIONTEXT;
        else
            $httpsContentType = CoreConstants::CONTENTTYPE_TEXTPLAIN;

        $httpsUri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, 'query'));
        $httpsPostBody = $query;

        $requestParameters = $this->getPostRequestParameters($httpsUri, $httpsContentType);
        $restRequestHandler = new SyncRestHandler($this->serviceContext);
        list($responseCode, $responseBody) = $restRequestHandler->GetResponse($requestParameters, $httpsPostBody, NULL);
        $faultHandler = $restRequestHandler->getFaultHandler();
        if(isset($faultHandler)){
            $this->lastError = $faultHandler;
            return NULL;
        }else{
          $parsedResponseBody = NULL;
          try {
              $responseXmlObj = simplexml_load_string($responseBody);
              //
              //var_dump($responseXmlObj);
              if ($responseXmlObj && $responseXmlObj->QueryResponse)
                  $tmpXML = $responseXmlObj->QueryResponse->asXML();
                  $parsedResponseBody = $this->responseSerializer->Deserialize($tmpXML, FALSE);
                  //echo "Parsed Body is: \n";
                  //var_dump($parsedResponseBody);
                  //echo "\n Parsed Body over.\n";
          } catch (Exception $e) {
              throw new Exception("Exception appears in converting Response to XML.");
          }
          return $parsedResponseBody;
        }

    }

    /**
     * Retrieves specified entity based passed page number and page size
     *
     * @param string $urlResource Entity type to Find
     * @return array Returns an array of entities of specified type.
     */
    public function FindAll($entityName, $pageNumber = 0, $pageSize = 500) {
        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called Method FindAll.");

        $phpClassName = DataService::decorateIntuitEntityToPhpClassName($entityName);

        // Handle some special cases
        if (strtolower('company') == strtolower($entityName))
            $entityName = 'CompanyInfo';

        if ('QBO' == $this->serviceContext->serviceType)
            $httpsContentType = CoreConstants::CONTENTTYPE_APPLICATIONTEXT;
        else
            $httpsContentType = CoreConstants::CONTENTTYPE_TEXTPLAIN;

        $httpsUri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, 'query'));
        $httpsPostBody = "select * from $entityName startPosition $pageNumber maxResults $pageSize";

        $requestParameters = $this->getPostRequestParameters($httpsUri, $httpsContentType);
        $restRequestHandler = new SyncRestHandler($this->serviceContext);
        list($responseCode, $responseBody) = $restRequestHandler->GetResponse($requestParameters, $httpsPostBody, NULL);
        $faultHandler = $restRequestHandler->getFaultHandler();
        if(isset($faultHandler)){
            $this->lastError = $faultHandler;
            return NULL;
        }else{
          $parsedResponseBody = NULL;
          try {
              $responseXmlObj = simplexml_load_string($responseBody);
              if ($responseXmlObj && $responseXmlObj->QueryResponse)
                  $parsedResponseBody = $this->responseSerializer->Deserialize($responseXmlObj->QueryResponse->asXML(), FALSE);
          } catch (Exception $e) {
              throw new Exception("Exception appears in converting Response to XML.");
          }
          return $parsedResponseBody;
        }
    }

    /**
     * Returns List of entities changed after certain time.
     * @param array entityList List of entity.
     * @param long changedSince DateTime of timespan after which entities were changed.
     * @return IntuitCDCResponse Returns an IntuitCDCResponse.
     */
    public function CDC($entityList, $changedSince) {
        $this->serviceContext->IppConfiguration->Logger->CustomLogger->Log(TraceLevel::Info, "Called Method CDC.");

        // Validate parameter
        if (count($entityList) <= 0) {
            $exception = new IdsException('ParameterNotNullMessage');
            $this->serviceContext->IppConfiguration->Logger->CustomLogger->Log(TraceLevel::Error, "ParameterNotNullMessage");
            IdsExceptionManager::HandleException($exception);
        }

        $entityString = implode(",", $entityList);

        $query = NULL;
        $uri = NULL;


        $formattedChangedSince = date("Y-m-d\TH:m:sP", $this->verifyChangedSince($changedSince));
        $query = "entities=" . $entityString . "&changedSince=" . $formattedChangedSince;
        $uri = "company/{1}/cdc?{2}";
        //$uri = str_replace("{0}", CoreConstants::VERSION, $uri);
        $uri = str_replace("{1}", $this->serviceContext->realmId, $uri);
        $uri = str_replace("{2}", $query, $uri);

        // Creates request parameters
        $requestParameters = $this->getGetRequestParameters($uri, CoreConstants::CONTENTTYPE_APPLICATIONXML);
        $restRequestHandler = new SyncRestHandler($this->serviceContext);

        list($responseCode, $responseBody) = $restRequestHandler->GetResponse($requestParameters, NULL, NULL);
        $faultHandler = $restRequestHandler->getFaultHandler();
        if(isset($faultHandler)){
            $this->lastError = $faultHandler;

            return NULL;
        }else{
          $returnValue = new IntuitCDCResponse();
          try {
              $xmlObj = simplexml_load_string($responseBody);
              foreach ($xmlObj->CDCResponse->QueryResponse as $oneObj) {
                  $entities = $this->responseSerializer->Deserialize($oneObj->asXML(), FALSE);

                  $entityName = NULL;
                  foreach ($oneObj->children() as $oneObjChild) {
                      $entityName = (string) $oneObjChild->getName();
                      break;
                  }

                  $returnValue->entities[$entityName] = $entities;
              }
          } catch (Exception $e) {
              IdsExceptionManager::HandleException($e);
          }

          $this->serviceContext->IppConfiguration->Logger->CustomLogger->Log(TraceLevel::Info, "Finished Executing Method CDC.");
          return $returnValue;
        }

    }


    /**
     * Returns an entity under the specified realm. The realm must be set in the context.
     *
     * @param object $entity Entity to Find
     * @return IPPIntuitEntity Returns an entity of specified Id.
     */
    public function Retrieve($entity) {
        $this->verifyOperationAccess($entity,__FUNCTION__);
        return $this->FindById($entity);
    }

    /**
     * Serializes oblect into specified format
     * @param IPPIntuitEntity $entity
     * @param String $urlResource
     * @return type
     */
    protected function executeObjectSerializer($entity, &$urlResource) {
        //
        $result = $this->getRequestSerializer()->Serialize($entity);
        $urlResource = $this->getRequestSerializer()->getResourceURL();
        return $result;
    }

    /**
     * Returns post request, depends on configuration and entity rule "jsonOnly"
     * @param type $entity
     * @param type $uri
     * @return RequestParameters
     */
    protected function initPostRequest($entity, $uri)
    {
        return $this->isJsonOnly($entity)
                ? $this->getPostJsonRequest($uri)
                : $this->getPostRequest($uri);
    }

    /**
     * Returns content type depends from seriaization format
     * @return string
     */
    private function getContentType()
    {
        return ($this->getSerializationFormat() == SerializationFormat::Json)
                    ? CoreConstants::CONTENTTYPE_APPLICATIONJSON
                    : CoreConstants::CONTENTTYPE_APPLICATIONXML;
    }

    /**
     * Returns post request with pre-defined POST method and JSON serialization
     * @param type $uri
     * @return RequestParameters
     */
    private function getPostJsonRequest($uri)
    {
        return $this->getPostRequestParameters($uri, CoreConstants::CONTENTTYPE_APPLICATIONJSON);
    }

    /**
     * Return true if specified entity can work with JSON only serialization
     * @param type $entity
     * @return boolean
     */
    private function isJsonOnly($entity)
    {
        return $this->isAllowed($entity, "jsonOnly");
    }

    /**
     * Returns pre-defined request with POST method and content type from settings
     * @param type $uri
     * @return RequestParameters
     */
    private function getPostRequest($uri)
    {
        return $this->getPostRequestParameters($uri, $this->getContentType());
    }

    /**
     * Returns pre-defined request with GET method
     * @param string $uri
     * @param string $type
     * @return RequestParameters
     */
    private function getGetRequestParameters($uri,$type)
    {
        return $this->getRequestParameters($uri, 'GET', $type);
    }

    /**
     * Returns pre-defined request with POST method
     * @param string $uri
     * @param string $type
     * @return RequestParameters
     */
    private function getPostRequestParameters($uri,$type)
    {
        return $this->getRequestParameters($uri, 'POST', $type);
    }

    /**
     * Wraps and returns RequestParameters object
     * @param string $uri
     * @param string $method
     * @param string $type
     * @param string $apiName
     * @return \RequestParameters
     */
    protected function getRequestParameters($uri,$method,$type,$apiName = null)
    {
        return new RequestParameters($uri, $method, $type, $apiName);
    }

    /**
     * Returns current serialization format
     * @return string
     */
    protected function getSerializationFormat()
    {
        return $this->serviceContext->IppConfiguration->Message->Request->SerializationFormat;
    }

    /**
     * Handles unusual URL mapping for TaxService
     * @param IPPIntuitEntity $entity
     * @param string $uri
     * @return string
     */
    private function handleTaxService($entity,$uri)
    {

        if($this->isTaxServiceSafe($entity)) {
            return $uri . '/taxcode';
        }
        return $uri;
    }

    /**
     * Verifies that entity has TaxService type
     * If this class is not available on include_path or wab't loaded the method will return false
     * @param IPPTaxService $entity
     * @return type
     */
    private function isTaxServiceSafe($entity)
    {
        return class_exists('IPPTaxService') && ($entity instanceof IPPTaxService);
    }

    /**
     * Methods provides workaround to succesfully process TaxService response
     */
    private function fixTaxServicePayload($entity,$content)
    {
        if($this->isTaxServiceSafe($entity)) {
            //get first "line" to make sure we don't have TaxService in response
            $sample = substr(trim($content),0,20);
            $taxServiceName = self::cleanPhpClassNameToIntuitEntityName(get_class($entity));
            if(false === strpos($sample,$taxServiceName)) {
                //last attempt to verify content before
                if(0 === strpos($sample,'{"TaxCode":')) {
                    return "{\"$taxServiceName\":$content}";
                }
            }
        }
        return $content;
    }



    /**
     * Returns an downloaded entity under the specified realm. The realm must be set in the context.
     *
     * @param object $entity Entity to Find
     * @return IPPIntuitEntity Returns an entity of specified Id.
     */
    public function Download($entity) {
        return $this->FindById($entity);
    }

    /**
     * Verifies string as email agains RFC 822
     * @param type $email
     * @return type
     */
    public function verifyEmailAddress($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Returns PDF filename based on entity type and id
     * @param type $entity
     * @param type $ext
     * @return type
     */
    public function getExportFileNameForPDF($entity, $ext, $usetimestamp = true)
    {
        //TODO: add timestamp or GUID
        $this->validateEntityId($entity);
        return self::getEntityResourceName($entity) . "_" . $entity->Id . ($usetimestamp ? "_" . time() : "") . ".$ext";
    }

    /**
     * Returns new instance of rest handler
     * @return \SyncRestHandler
     */
    protected function getRestHandler()
    {
        return new SyncRestHandler($this->serviceContext);
    }

    /**
     * Saves exported (e.g. check DownloadPDF) entity into file according to strategy in settings
     * @param ContentWriter $writer
     * @param int $responseCode
     * @param string $fileName
     * @return mixed full path with filename or open handler
     */
    protected function processDownloadedContent(ContentWriter $writer, $responseCode, $fileName = null)
    {
        $writer->setPrefix($this->getPrefixFromSettings());
        try {
            if($this->isTempFile()) {
                $writer->saveTemp();
            } elseif($this->isFileExport()) {
                $writer->saveFile($this->getFileExportDir(),$fileName);
            } else {
                $writer->saveAsHandler();
            }
            //return object as is
            if($this->isReturnContentWriter()) {
                return $writer;
            }
            $writer->resetContent();
            $this->logInfo("File was downloaded (http response = $responseCode), bytes written: {$writer->getBytes()}");
        } catch(Exception $ex) {
             $this->logError("Exception appears during response processing. Http response was $responseCode: " . $ex->getMessage() . "\n" . $ex->getTraceAsString());
             return null;
        }

        return $writer->isHandler() ? $writer->getHandler() : $writer->getTempPath();
    }

    /**
     * Returns true or false if writer object is allowed as return result
     * @return boolean
     */
    private function isReturnContentWriter()
    {
         return $this->serviceContext->IppConfiguration->ContentWriter->returnOject;
    }

    /**
     * Returns prefix for contentWriter
     * @return string
     */
    private function getPrefixFromSettings()
    {
       return $this->serviceContext->IppConfiguration->ContentWriter->prefix;
    }

    /**
     * Returns true if SDK is configured to save temporary files
     * @return boolean
     */
    private function isTempFile()
    {
        return (ContentWriterSettings::FILE_STRATEGY === $this->serviceContext->IppConfiguration->ContentWriter->strategy);
    }

    /**
     * Returns true if SDK is configured to export files to another location
     * @return boolean
     */
    private function isFileExport()
    {
         return (ContentWriterSettings::EXPORT_STRATEGY === $this->serviceContext->IppConfiguration->ContentWriter->strategy) ;
    }

    /**
     * Returns path to directory where SDK should save files
     * @return string
     */
    private function getFileExportDir()
    {
        return $this->serviceContext->IppConfiguration->ContentWriter->exportDir;
    }


    /**
     * Simple verification for entities which can be returned as PDF
     */
    private function isAllowed($entity,$method)
    {
        $className = get_class($entity);
        if(!$className) {
            $this->logError("Intuit entity is expected here instead of $entity");
            throw new IdsException('Unexpected Argument Exception');
        }
       // Need to make that configurable or use XSD generator
       return $this->serviceContext->IppConfiguration->OpControlList->isAllowed($className, $method);
    }


    private function verifyOperationAccess($entity,$func)
    {
        if(!$this->isAllowed($entity,$func)) {
            $this->logError("Cannot invoke ".$func." for \"" . get_class($entity)."\" because of operation contstrains.");
            throw new IdsException('Operation '.$func.' is not allowed for entity '. get_class($entity));
        }
        return true;
    }


    private function validateEntityId($entity) {
        if (empty($entity)) {
            $this->logError("Argument Null Exception");
            throw new IdsException('Argument Null Exception');
        }
        if(!isset($entity->Id)) {
             $this->logError("Property ID doesn't exist");
            throw new IdsException('Property ID is not set');
        }

        if(empty($entity->Id)) {
             $this->logError("Property ID is empty");
            throw new IdsException('Property ID is empty');
        }

        return true;
    }

    private function logError($message) {
        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Error,$message);
    }

    private function logInfo($message) {
        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, $message);
    }





    /**
     * Creates new batch
     *
     * @return Batch returns the batch object
     */
    public function CreateNewBatch() {
        $batch = new Batch($this->serviceContext, $this->restHandler);
        return $batch;
    }



    /**
     * Parse input date-time string into unix timestamp
     * @param type $str
     * @return int timestamp or false overwise
     */
    private function convertToTimestamp($str) {
        $result = date_parse($str);
        if (!$result) {
            return false;
        }
        if (empty($result) || !is_array($result)) {
            return false;
        }
        extract($result);
        if (!empty($errors)) {
            throw new SdkException("SDK failed to parse date value \"$str\":"
            . (is_array($errors) ? implode("\n", $errors) : $errors)
            );
        }
        return mktime($hour, $minute, $second, $month, $day, $year);
    }

    /**
     * Checks if input string is a valid timestamp or not
     * @param string timestamp contains input timestamp-like string
     */
    function isValidTimeStamp($timestamp) {
        return ((string) (int) $timestamp === $timestamp) && ($timestamp <= PHP_INT_MAX) && ($timestamp >= ~PHP_INT_MAX);
    }

    /**
     * Verifies input and returns unix timestamp
     * @param mixed $value
     * @return int
     */
    protected function verifyChangedSince($value) {
        if (is_int($value)) {
            return $value;
        }
        // remove whitespaces, tabulation etc
        $trimmed = trim($value);
        if ($this->isValidTimeStamp($trimmed)) {
            return $trimmed;
        }
        //at this point we have numeric string which is not timestamp
        if (is_numeric($value)) {
            throw new SdkException("Input string doesn't look as unix timestamp or date string");
        }
        // trying to parse string into timestamp
        $converted = $this->convertToTimestamp($value);
        if (!$converted) {
            throw new SdkException("Input value should be unix timestamp or valid date string");
        }
        return $converted;
    }

}
