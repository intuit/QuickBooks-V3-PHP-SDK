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
namespace QuickBooksOnline\API\DataService;

use QuickBooksOnline\API\Core\CoreHelper;
use QuickBooksOnline\API\Core\Http\Serialization\IEntitySerializer;
use QuickBooksOnline\API\Core\HttpClients\FaultHandler;
use QuickBooksOnline\API\Core\HttpClients\RestHandler;
use QuickBooksOnline\API\Core\ServiceContext;
use QuickbooksOnline\API\Core\CoreConstants;
use QuickBooksOnline\API\Core\HttpClients\SyncRestHandler;
use QuickBooksOnline\API\Core\HttpClients\RequestParameters;
use QuickBooksOnline\API\Core\Http\Serialization\JsonObjectSerializer;
use QuickBooksOnline\API\Core\Http\Serialization\SerializationFormat;
use QuickBooksOnline\API\Data\IPPAttachable;
use QuickBooksOnline\API\Data\IPPIntuitEntity;
use QuickBooksOnline\API\Data\IPPTaxService;
use QuickBooksOnline\API\Data\IPPid;
use QuickBooksOnline\API\Exception\IdsException;
use QuickBooksOnline\API\Exception\ServiceException;
use QuickBooksOnline\API\Exception\IdsExceptionManager;
use QuickBooksOnline\API\Exception\SdkException;
use QuickBooksOnline\API\Diagnostics\TraceLevel;
use QuickBooksOnline\API\Diagnostics\ContentWriter;
use QuickBooksOnline\API\XSD2PHP\src\com\mikebevz\xsd2php\Php2Xml;
use QuickBooksOnline\API\Core\OAuth\OAuth2\OAuth2LoginHelper;
use QuickBooksOnline\API\Core\OAuth\OAuth2\OAuth2AccessToken;
use QuickBooksOnline\API\Core\HttpClients\ClientFactory;

/**
 * Class DataServicd
 *
 * This file contains DataService performs CRUD operations on IPP REST APIs.
 */
class DataService
{

    /**
     * The METHOD UPDATE.
     * @var String
     */
    const UPDATE = 'update';

    /**
     * The METHOD FINDBYID.
     * @var String
     */
    const FINDBYID = 'FindById';

    /**
     * The METHOD ADD.
     * @var String
     */
    const ADD = 'Add';

    /**
     * The METHOD Delete.
     * @var String
     */
    const DELETE = 'Delete';

    /**
     * The METHOD VOID.
     * @var String
     */
    const VOID = 'Void';

    /**
     * The METHOD UPLOAD.
     * @var String
     */
    const UPLOAD = 'upload';

    /**
     * The METHOD SENDEMAIL.
     * @var String
     */
    const SENDEMAIL = 'SendEmail';

    /**
     * The Service context object.
     * @var ServiceContext The service Context of the request
     */
    private $serviceContext;

    /**
     * Rest Request Handler for actually sending the request
     * @var SyncRestHandler
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
     * If not false, the request from last dataService did not return 2xx
     * @var FaultHandler
     */
    private $lastError = false;

    /**
     * The OAuth 2 Login helper for get RefreshToken
     * @var OAuth2LoginHelper
     */
    private $OAuth2LoginHelper;

    /**
     * A boolean value to decide if excetion will be thrown on non-200 request
     * @var Boolean
     */
    private $throwExceptionOnError = false;

    /**
     * The client to be used for HTTP request. You can choose either defaukt(cURL) or GuzzleHttpClient if that is available
     * @var String
     */
    private $clientName = CoreConstants::CLIENT_CURL;


    /**
     * Initializes a new instance of the DataService class. The old way to construct the dataService. Used by PHP SDK < 3.0.0
     *
     * @param ServiceContext $serviceContext      IPP Service Context
     * @throws SdkException
     */
    public function __construct($serviceContext)
    {
        if (null == $serviceContext || !is_object($serviceContext)) {
            throw new SdkException('Undefined ServiceContext. DataService constructor has NULL or Non_Object ServiceContext as Constructor');
        }
        $this->updateServiceContextSettingsForOthers($serviceContext);
    }

    /**
     * Set the corresponding settings for the dataService based on ServiceContext
     * @var ServiceContext $serviceContext        The service Context for this DataService
     */
    public function updateServiceContextSettingsForOthers($serviceContext)
    {
        $this->setupServiceContext($serviceContext);
        $this->setupSerializers();
        $this->useMinorVersion();
        $this->setupRestHandler($serviceContext);
    }

    /**
     * Set or Update the ServiceContext of this DataService.
     *
     * @var ServiceContext $serviceContext The new ServiceContext passed by.
     * @return $this
     */
    private function setupServiceContext($serviceContext)
    {
        $this->serviceContext = $serviceContext;
        return $this;
    }

    /**
     * Return the ServiceContext of this DataService
     *
     * @return ServiceContext
     * @throws \Exception ServiceContext is NULL.
     */
    public function getServiceContext()
    {
        if (isset($this->serviceContext)) {
            return $this->serviceContext;
        } else {
            throw new SdkException("Trying to Return an Empty Service Context.");
        }
    }

    /**
     * Set the SyncRest Handler for the DataService. If the client Name changed, the underlying Client that SyncRestHandler used will also changed.
     *
     * @var ServiceContext $serviceContext         The service Context for this DataService
     * @return $this
     *
     */
    protected function setupRestHandler($serviceContext)
    {
       if(isset($serviceContext)){
          $client = ClientFactory::createClient($this->getClientName());
          $this->restHandler = new SyncRestHandler($serviceContext, $client);
       }else{
          throw new SdkException("Can not set the Rest Client based on null ServiceContext.");
       }
       return $this;
    }

    /**
     * Return the current Client Name used by DataService
     * @return String clientName
     */
    public function getClientName(){
        return $this->clientName;
    }
    /**
     * PHP SDK currently only support XML for Object Serialization and Deserialization, except for Report Service
     *
     * @return $this
     */
    public function useXml()
    {
        $serviceContext = $this->getServiceContext();
        $serviceContext->useXml();
        $this->updateServiceContextSettingsForOthers($serviceContext);
        return $this;
    }

    /**
     * PHP SDK currently only support XML for Object Serialization and Deserialization, except for Report Service
     *
     * @return $this
     */
    public function useJson()
    {
        $serviceContext = $this->getServiceContext();
        $serviceContext->useJson();
        $this->updateServiceContextSettingsForOthers($serviceContext);
        return $this;
    }

    /**
     * Set a new directory for request and response log
     *
     * @param String $new_log_location     The directory path for storing request and response log
     *
     * @return $this
     */
    public function setLogLocation($new_log_location)
    {
        $restHandler = $this->restHandler;
        $loggerUsedByRestHandler = $restHandler->getRequestLogger();
        $loggerUsedByRestHandler->setLogDirectory($new_log_location);
        return $this;
    }

    /**
     * Set a new Minor Version
     *
     * @param String $newMinorVersion     The new minor version that passed
     *
     * @return $this
     */
    public function setMinorVersion($newMinorVersion)
    {
        $serviceContext = $this->getServiceContext();
        $serviceContext->setMinorVersion($newMinorVersion);
        $this->updateServiceContextSettingsForOthers($serviceContext);
        return $this;
    }

    /**
     * Disable the logging function
     *
     * @return $this
     */
    public function disableLog()
    {
        $restHandler = $this->restHandler;
        $loggerUsedByRestHandler = $restHandler->getRequestLogger();
        $loggerUsedByRestHandler->setLogStatus(false);
        return $this;
    }

    /**
     * Enable the logging function
     *
     * @return $this
     */
    public function enableLog()
    {
        $restHandler = $this->restHandler;
        $loggerUsedByRestHandler = $restHandler->getRequestLogger();
        $loggerUsedByRestHandler->setLogStatus(true);
        return $this;
    }


    /**
     * Choose if want to throw exception when there is an non-200 http status code returned.
     * @param Boolean $bool                 Turn on exception throwing error or not
     */
    public function throwExceptionOnError($bool){
        $this->throwExceptionOnError = $bool;
        return $this;
    }

    /**
     * Return the settings for thrown exception on non-200 error code
     * @return Boolean   Thrown Exception on Error or not
     */
    public function isThrownExceptionOnError(){
        return $this->throwExceptionOnError;
    }

    /**
     * Return the client Name used by this DataSerivce
     * @return String the Client Name. It can be curl or GuzzleHttpClient
     */
    public function getClinetName(){
       return $this->clientName;
    }

    /**
     * The client Name can be either 'curl', 'guzzle', or 'guzzlehttp'.
     *
     * @param String $clientName              The client Name used by the service
     *
     * @return $this
     */
    public function setClientName($clientName){
       $this->clientName = $clientName;
       $serviceContext = $this->getServiceContext();
       $this->setupRestHandler($serviceContext);
       return $this;
    }

    /**
     * New Static function for static Reading from Config or Passing Array
     * The config needs to include
     *
     * @param $settings
     * @return DataService
     * @throws SdkException
     * @throws SdkException
     */
    public static function Configure($settings)
    {
        if (isset($settings)) {
            if (is_array($settings)) {
                $ServiceContext = ServiceContext::ConfigureFromPassedArray($settings);
                if (!isset($ServiceContext)) {
                    throw new SdkException('Construct ServiceContext from OAuthSettigs failed.');
                }
                $DataServiceInstance = new DataService($ServiceContext);

            } elseif (is_string($settings)) {
                $ServiceContext = ServiceContext::ConfigureFromLocalFile($settings);
                if (!isset($ServiceContext)) {
                    throw new SdkException('Construct ServiceContext from File failed.');
                }
                $DataServiceInstance = new DataService($ServiceContext);

            }

            if($ServiceContext->IppConfiguration->OAuthMode == CoreConstants::OAUTH2)
            {
                $oauth2Config = $ServiceContext->IppConfiguration->Security;
                if($oauth2Config instanceof OAuth2AccessToken){
                    $DataServiceInstance->configureOAuth2LoginHelper($oauth2Config, $settings);
                }else{
                    throw new SdkException("SDK Error. OAuth mode is not OAuth 2.");
                }
            }

            return $DataServiceInstance;

        } else {
            throw new SdkException("Passed Null to Configure method. It expects either a file path for the config file or an array containing OAuth settings and BaseURL.");
        }
    }

    /**
     * After the ServiceContext is complete, also set the LoginHelper based on the ServiceContext.
     * @param OAuth2AccessToken $oauth2Conifg      OAuth 2 Token related information
     * @param Array $settings                      The array that include the redirectURL, scope, state information
     */
    private function configureOAuth2LoginHelper($oauth2Conifg, $settings)
    {
          $refreshToken = CoreConstants::getRefreshTokenFromArray($settings);
          if(isset($refreshToken)){
               //Login helper for refresh token API call
               $this->OAuth2LoginHelper = new OAuth2LoginHelper(null,
                                                                null,
                                                                null,
                                                                null,
                                                                null,
                                                                $this->getServiceContext());
          }else{
                $redirectURL = CoreConstants::getRedirectURL($settings);
                $scope = array_key_exists('scope', $settings) ? $settings['scope'] : null;
                $state = array_key_exists('state', $settings) ? $settings['state'] : null;
                $this->OAuth2LoginHelper = new OAuth2LoginHelper($oauth2Conifg->getClientID(),
                                                                 $oauth2Conifg->getClientSecret(),
                                                                 $redirectURL,
                                                                 $scope,
                                                                 $state);
          }
    }



    /**
     * Return the OAuth 2 Login Helper. The OAuth 2 Login helper can be used to generate OAuth code, get refresh Token, etc.
     * @return $OAuth2LoginHelper      A helper to get OAuth 2 related values.
     */
    public function getOAuth2LoginHelper()
    {
        return $this->OAuth2LoginHelper;
    }

    /**
     * Update the OAuth 2 Token that will be used for API calls later.
     *
     * @param OAuth2AccessToken $newOAuth2AccessToken   The OAuth 2 Access Token that will be used later.
     *
     * @return $this
     */
    public function updateOAuth2Token($newOAuth2AccessToken)
    {
        try{
          $this->serviceContext->updateOAuth2Token($newOAuth2AccessToken);
          $realmID = $newOAuth2AccessToken->getRealmID();
          $this->serviceContext->realmId = $realmID;
          $this->setupRestHandler($this->serviceContext);
        } catch (SdkException $e){
          echo $e->getTraceAsString();
        }
        return $this;
    }

    /**
     * Get the error from last request
     *
     * @return lastError
     */
    public function getLastError()
    {
        return $this->lastError;
    }

    /**
     * Setups serializers objects for responces and requests based on service context
     */
    public function setupSerializers()
    {
        $this->responseSerializer = CoreHelper::GetSerializer($this->serviceContext, false);
        $this->requestSerializer = CoreHelper::GetSerializer($this->serviceContext, true);
    }

    private function useMinorVersion()
    {
        $version = $this->serviceContext->IppConfiguration->minorVersion;
        if (is_numeric($version) && !empty($version)) {
            $this->serviceContext->minorVersion = $version;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getMinorVersion()
    {
        return $this->serviceContext->minorVersion;
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
    protected function getResponseSerializer()
    {
        return $this->responseSerializer;
    }

    /**
     * Returns serializer for request objects
     * @return IEntitySerializer
     */
    protected function getRequestSerializer()
    {
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
    private function getXmlFromObj($phpObj)
    {
        if (!$phpObj) {
            echo "getXmlFromObj NULL arg\n";
            var_dump(debug_backtrace());

            return false;
        }

        $php2xml = new Php2Xml(CoreConstants::PHP_CLASS_PREFIX);
        $php2xml->overrideAsSingleNamespace = 'http://schema.intuit.com/finance/v3';

        try {
            return $php2xml->getXml($phpObj);
        } catch (Exception $e) {
            echo "getXmlFromObj EXCEPTION: " . $e->getMessage() . "\n";
            var_dump($phpObj);
            var_dump(debug_backtrace());

            return false;
        }
    }

    /**
     * Decorate an IPP v3 Entity name (like 'Class') to be a POPO class name (like 'IPPClass')
     *
     * @param string Intuit Entity name
     * @return POPO class name
     */
    private static function decorateIntuitEntityToPhpClassName($intuitEntityName)
    {
        $className = CoreConstants::PHP_CLASS_PREFIX . $intuitEntityName;
        $className = trim($className);

        return $className;
    }


    //Since we add the namespace, this one needs to be changed as well.
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
    private static function cleanPhpClassNameToIntuitEntityName($phpClassName)
    {
        $phpClassName = self::removeNameSpaceFromPhpClassName($phpClassName);
        if (0 == strpos($phpClassName, CoreConstants::PHP_CLASS_PREFIX)) {
            return substr($phpClassName, strlen(CoreConstants::PHP_CLASS_PREFIX));
        }

        return null;
    }

    /**
     * Remove the Namespace from a php class name
     *
     * @param string $phpClassName QuickBooksOnline\API\Data\...
     * @return string ipp...
     */
    private static function removeNameSpaceFromPhpClassName($phpClassName)
    {
        $lists = explode('\\', $phpClassName);
        $ippEntityName = end($lists);

        return $ippEntityName;
    }

    /**
     *  Using the @entity and @uri to generate Request.
     *  Response will parsed. It will store any Error Code in 3xx to 5xx level.
     *
     * @param IPPIntuitEntity $entity
     * @param string $uri
     * @param string $httpsPostBody
     * @param string $CALLINGMETHOD
     * @param string|null $boundaryString
     * @param string|null $email
     * @return null|Excepiton
     */
    private function sendRequestParseResponseBodyAndHandleHttpError($entity, $uri, $httpsPostBody, $CALLINGMETHOD, $boundaryString = null, $email = null)
    {
        switch ($CALLINGMETHOD) {
            case DataService::DELETE:
            case DataService::ADD:
            case DataService::VOID:
            case DataService::UPDATE:
                $requestParameters = $this->initPostRequest($entity, $uri);
                break;
            case DataService::FINDBYID:
                if ($this->serviceContext->IppConfiguration->Message->Request->SerializationFormat == SerializationFormat::Json) {
                    $requestParameters = new RequestParameters($uri, 'GET', CoreConstants::CONTENTTYPE_APPLICATIONJSON, null);
                } else {
                    $requestParameters = new RequestParameters($uri, 'GET', CoreConstants::CONTENTTYPE_APPLICATIONXML, null);
                }
                break;
            case DataService::UPLOAD:
                if (!isset($boundaryString)) {
                    throw new Exception("Upload Image has unset value: boundaryString.");
                }
                // Creates request parameters
                $requestParameters = $this->getPostRequestParameters($uri, "multipart/form-data; boundary={$boundaryString}");
                break;
            case DataService::SENDEMAIL:
                $requestParameters = $this->getPostRequestParameters($uri . (is_null($email) ? '' : '?sendTo=' . urlencode($email)), CoreConstants::CONTENTTYPE_OCTETSTREAM);
                break;
        }
        $restRequestHandler = $this->getRestHandler();
        list($responseCode, $responseBody) = $restRequestHandler->sendRequest($requestParameters, $httpsPostBody, null, $this->isThrownExceptionOnError());
        $faultHandler = $restRequestHandler->getFaultHandler();
        if ($faultHandler) {
            $this->lastError = $faultHandler;
            return null;
        } else {
            $this->lastError = false;
            if (strcmp($CALLINGMETHOD, DataService::ADD) == 0) {
                $responseBody = $this->fixTaxServicePayload($entity, $responseBody);
            }
            try {
                $parsedResponseBody = $this->getResponseSerializer()->Deserialize($responseBody, true);
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
     * @throws IdsException
     */
    public function Update($entity)
    {
        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called Method: Update.");

        // Validate parameter
        if (!$entity) {
            $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Error, "Argument Null Exception");
            throw new IdsException('Argument Null Exception');
        }
        $this->verifyOperationAccess($entity, __FUNCTION__);

        $httpsPostBody = $this->executeObjectSerializer($entity, $urlResource);

        // Builds resource Uri
        // Handle some special cases
        if ((strtolower('preferences') == strtolower($urlResource)) &&
            (CoreConstants::IntuitServicesTypeQBO == $this->serviceContext->serviceType)
        ) {
            // URL format for *QBO* prefs request is different than URL format for *QBD* prefs request
            $uri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, $urlResource));
        }
        //We no longer support QBD on PHP SDK The code is removed.
        /*else if ((strtolower('company') == strtolower($urlResource)) &&
                (CoreConstants::IntuitServicesTypeQBO == $this->serviceContext->serviceType)) {
            // URL format for *QBD* companyinfo request is different than URL format for *QBO* companyinfo request
            $urlResource = 'companyInfo';
            $uri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, $urlResource . '?operation=update'));
        }*/ else {
            // Normal case
            $uri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, $urlResource . '?operation=update'));
        }

        // Send Request and return response
        return $this->sendRequestParseResponseBodyAndHandleHttpError($entity, $uri, $httpsPostBody, DataService::UPDATE);
    }

    /**
     * The Read request. You can either pass an object that contains the Id that you want to read, or
     * pass the Entity Name and the Id.
     * Before v4.0.0, it supports the read of CompanyInfo and Preferences.
     * After v4.0.0, it DOES NOT support read of CompanyInfo or Preferences. Please use getCompanyInfo() or getCompanyPreferences() method instead.
     * Only use this one to do READ request with ID.
     *
     * Developer has two ways to call the GET request. Take Invoice for an example:
     * 1) FindById($invoice);
     * or
     * 2) FindById("invoice", 1);
     *
     * @param object|String $entity Entity to Find, or the String Name of the Entity
     * @return IPPIntuitEntity Returns an entity of specified Id.
     * @throws IdsException
     */
    public function FindById($entity, $Id = null)
    {
        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called Method FindById.");
        if(is_object($entity)){
           $httpsPostBody = $this->executeObjectSerializer($entity, $urlResource);
           // Validate parameter
           if (!$entity || !$entity->Id) {
              $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Error, "Argument Null Exception");
              throw new IdsException('Argument Null Exception when calling FindById for Endpoint:' . get_class($entity));
          }
          $this->verifyOperationAccess($entity, __FUNCTION__);
          $entityId = $this->getIDString($entity->Id);
          // Normal case
          $uri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, $urlResource, $entityId));
          // Send request
          return $this->sendRequestParseResponseBodyAndHandleHttpError($entity, $uri, null, DataService::FINDBYID);
        }else if(is_string($entity) && isset($Id)){
          $uri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, strtolower($entity), $Id));
          $requestParameters = new RequestParameters($uri, 'GET', CoreConstants::CONTENTTYPE_APPLICATIONXML, null);
          $restRequestHandler = $this->getRestHandler();
          list($responseCode, $responseBody) = $restRequestHandler->sendRequest($requestParameters, null, null, $this->isThrownExceptionOnError());
          $faultHandler = $restRequestHandler->getFaultHandler();
          //$faultHandler now is true or false
          if ($faultHandler) {
              $this->lastError = $faultHandler;
              return null;
          } else {
              //clean the error
              $this->lastError = false;
              $parsedResponseBody = $this->getResponseSerializer()->Deserialize($responseBody, true);
              return $parsedResponseBody;
          }
        }
    }

    /**
     * Creates an entity under the specified realm. The realm must be set in the context.
     *
     * @param IPPIntuitEntity $entity Entity to Create.
     * @return IPPIntuitEntity Returns the created version of the entity.
     * @throws IdsException
     */
    public function Add($entity)
    {
        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called Method Add.");

        // Validate parameter
        if (!$entity) {
            $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Error, "Argument Null Exception");
            throw new IdsException('Argument Null Exception');
        }
        $this->verifyOperationAccess($entity, __FUNCTION__);
        if ($this->isJsonOnly($entity)) {
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
     * @return null|Excepiton
     * @throws IdsException
     */
    public function Delete($entity)
    {
        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called Method Delete.");

        // Validate parameter
        if (!$entity) {
            $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Error, "Argument Null Exception");
            throw new IdsException('Argument Null Exception');
        }
        $this->verifyOperationAccess($entity, __FUNCTION__);

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
     * @return null|Excepiton
     * @throws IdsException
     */
    public function Void($entity)
    {
        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called Method Void.");

        // Validate parameter
        if (!$entity) {
            $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Error, "Argument Null Exception");
            throw new IdsException('Argument Null Exception');
        }
        $this->verifyOperationAccess($entity, __FUNCTION__);

        // Builds resource Uri
        $httpsPostBody = $this->executeObjectSerializer($entity, $urlResource);
        $uri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, $urlResource . '?operation=void'));

        // Creates request
        return $this->sendRequestParseResponseBodyAndHandleHttpError($entity, $uri, $httpsPostBody, DataService::VOID);
    }

    /**
     * Uploads an attachment to an Entity on QuickBooks Online. For security reason, text file is not supported for uploading.
     *
     * @param string $bits                        Encoded Base64 bytes for the attachment
     * @param string $fileName                    Filename to use for this file
     * @param string $mimeType                    MIME type to send in the HTTP Headers
     * @param IPPAttachable $objAttachable        Entity including the attachment, it can be invoice, bill, etc
     * @return array                              Returns an array of entities fulfilling the query.
     * @throws IdsException
     */
    public function Upload($imgBits, $fileName, $mimeType, $objAttachable)
    {
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
     * @param IPPIntuitEntity $entity
     * @param Directory a writable directory for the PDF to be saved.
     * @return boolean
     * @throws IdsException, SdkException
     *
     */
    public function DownloadPDF($entity, $dir=null)
    {
        $this->validateEntityId($entity);
        $this->verifyOperationAccess($entity, __FUNCTION__);

        //Find the ID
        $entityID =  $this->getIDString($entity->Id);
        $uri = implode(CoreConstants::SLASH_CHAR, array('company',
                $this->serviceContext->realmId,
                self::getEntityResourceName($entity),
                $entityID,
                CoreConstants::getType(CoreConstants::CONTENTTYPE_APPLICATIONPDF)));
        $requestParameters = $this->getGetRequestParameters($uri, CoreConstants::CONTENTTYPE_APPLICATIONPDF);
        $restRequestHandler = $this->getRestHandler();


        list($responseCode, $responseBody) = $restRequestHandler->sendRequest($requestParameters, null, null, $this->isThrownExceptionOnError());
        $faultHandler = $restRequestHandler->getFaultHandler();
        if ($faultHandler) {
            $this->lastError = $faultHandler;
            //Add allow for through exception if users set it up
            return null;
        } else {
            $this->lastError = false;
            return $this->processDownloadedContent(new ContentWriter($responseBody), $responseCode, $this->getExportFileNameForPDF($entity, "pdf"), $dir);
        }
    }

    /**
     * Sends entity by email for entities that have this operation
     *
     * @param IPPIntuitEntity $entity
     * @param string|null $email
     * @return boolean
     * @throws IdsException, SdkException
     *
     */
    public function SendEmail($entity, $email = null)
    {
        $this->validateEntityId($entity);
        $this->verifyOperationAccess($entity, __FUNCTION__);

        $entityId=$this->getIDString($entity->Id);
        $uri = implode(CoreConstants::SLASH_CHAR, array('company',
                $this->serviceContext->realmId,
                self::getEntityResourceName($entity),
                $entityId,
                'send'));

        if (is_null($email)) {
            $this->logInfo("Entity " . get_class($entity) . " with id=" . $entityId . " is using default email");
        } else {
            $this->logInfo("Entity " . get_class($entity) . " with id=" . $entityId . " is using $email");
            if (!$this->verifyEmailAddress($email)) {
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
     * @param int $startPosition Starting page number
     * @param int $maxResults Page size
     * @return array Returns an array of entities fulfilling the query. If the response is Empty, it will return NULL
     */
    public function Query($query, $startPosition = null, $maxResults = null)
    {
        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called Method Query.");

        if ('QBO' == $this->serviceContext->serviceType) {
            $httpsContentType = CoreConstants::CONTENTTYPE_APPLICATIONTEXT;
        } else {
            $httpsContentType = CoreConstants::CONTENTTYPE_TEXTPLAIN;
        }

        $httpsUri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, 'query'));
        $httpsPostBody = $this->appendPaginationInfo($query, $startPosition, $maxResults);

        $requestParameters = $this->getPostRequestParameters($httpsUri, $httpsContentType);
        $restRequestHandler = $this->getRestHandler();
        list($responseCode, $responseBody) = $restRequestHandler->sendRequest($requestParameters, $httpsPostBody, null, $this->isThrownExceptionOnError());
        $faultHandler = $restRequestHandler->getFaultHandler();
        if ($faultHandler) {
            $this->lastError = $faultHandler;
            return null;
        } else {
            $this->lastError = false;
            $parsedResponseBody = null;
            try {
                $responseXmlObj = simplexml_load_string($responseBody);
                if ($responseXmlObj && $responseXmlObj->QueryResponse) {
                    $tmpXML = $responseXmlObj->QueryResponse->asXML();
                }
                $parsedResponseBody = $this->responseSerializer->Deserialize($tmpXML, false);
                //echo "Parsed Body is: \n";
                //var_dump($parsedResponseBody);
                //echo "\n Parsed Body over.\n";
            } catch (\Exception $e) {
                throw new \Exception("Exception appears in converting Response to XML.");
            }

            return $parsedResponseBody;
        }
    }

    /**
     * Append the Pagination Data to the Query string if it is not appended
     * @param Integer StartPostion
     * @param Integer MaxResults
     * @return String The query string
     */
    private function appendPaginationInfo($query, $startPosition, $maxResults){
       $query = trim($query);
       if(isset($startPosition) && !empty($startPosition)){
           if(stripos($query, "STARTPOSITION") === false){
              if(stripos($query, "MAXRESULTS") !== false){
                //In MaxResult is defined,we don't set startPosition
              }else{
                $query = $query . " " . "STARTPOSITION " . $startPosition;
              }
           }else{
             //Ignore the startPosition if it is already used on the query
           }
       }

       if(isset($maxResults) && !empty($maxResults)){
           if(stripos($query, "MAXRESULTS") === false){
                $query = $query . " " . "MAXRESULTS " . $maxResults;
           }else{
             //Ignore the maxResults if it is already used on the query
           }
       }

       return $query;

    }

    /**
     * Retrieves all entities by name
     *
     * @param string $entityName
     * @param int $pageNumber
     * @param int $pageSize
     * @return array Returns an array of entities of specified type.
     */
    public function FindAll($entityName, $pageNumber = 0, $pageSize = 500)
    {
        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called Method FindAll.");

        $phpClassName = DataService::decorateIntuitEntityToPhpClassName($entityName);

        // Handle some special cases
        if (strtolower('company') == strtolower($entityName)) {
            $entityName = 'CompanyInfo';
        }

        if ('QBO' == $this->serviceContext->serviceType) {
            $httpsContentType = CoreConstants::CONTENTTYPE_APPLICATIONTEXT;
        } else {
            $httpsContentType = CoreConstants::CONTENTTYPE_TEXTPLAIN;
        }

        $httpsUri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, 'query'));
        $httpsPostBody = "select * from $entityName startPosition $pageNumber maxResults $pageSize";

        $requestParameters = $this->getPostRequestParameters($httpsUri, $httpsContentType);
        $restRequestHandler = $this->getRestHandler();
        list($responseCode, $responseBody) = $restRequestHandler->sendRequest($requestParameters, $httpsPostBody, null, $this->isThrownExceptionOnError());
        $faultHandler = $restRequestHandler->getFaultHandler();
        if ($faultHandler) {
            $this->lastError = $faultHandler;
            return null;
        } else {
            $this->lastError = false;
            $parsedResponseBody = null;
            try {
                $responseXmlObj = simplexml_load_string($responseBody);
                if ($responseXmlObj && $responseXmlObj->QueryResponse) {
                    $parsedResponseBody = $this->responseSerializer->Deserialize($responseXmlObj->QueryResponse->asXML(), false);
                }
            } catch (\Exception $e) {
                throw new \Exception("Exception appears in converting Response to XML.");
            }

            return $parsedResponseBody;
        }
    }

    /**
     * Returns List of entities changed after certain time.
     *
     * @param array entityList List of entity.
     * @param long changedSince DateTime of timespan after which entities were changed.
     * @return IntuitCDCResponse Returns an IntuitCDCResponse.
     */
    public function CDC($entityList, $changedSince)
    {
        $this->serviceContext->IppConfiguration->Logger->CustomLogger->Log(TraceLevel::Info, "Called Method CDC.");

        // Validate parameter
        if (count($entityList) <= 0) {
            $exception = new IdsException('ParameterNotNullMessage');
            $this->serviceContext->IppConfiguration->Logger->CustomLogger->Log(TraceLevel::Error, "ParameterNotNullMessage");
            IdsExceptionManager::HandleException($exception);
        }

        $entityString = implode(",", $entityList);

        $query = null;
        $uri = null;

        if(is_string($changedSince)){
           $formattedChangedSince = trim($changedSince);
        }else{
            $formattedChangedSince = date("Y-m-d\TH:i:s", $this->verifyChangedSince($changedSince));
        }

        $query = "entities=" . $entityString . "&changedSince=" . $formattedChangedSince;
        $uri = "company/{1}/cdc?{2}";
        //$uri = str_replace("{0}", CoreConstants::VERSION, $uri);
        $uri = str_replace("{1}", $this->serviceContext->realmId, $uri);
        $uri = str_replace("{2}", $query, $uri);

        // Creates request parameters
        $requestParameters = $this->getGetRequestParameters($uri, CoreConstants::CONTENTTYPE_APPLICATIONXML);
        $restRequestHandler = $this->getRestHandler();

        list($responseCode, $responseBody) = $restRequestHandler->sendRequest($requestParameters, null, null, $this->isThrownExceptionOnError());
        $faultHandler = $restRequestHandler->getFaultHandler();
        if ($faultHandler) {
            $this->lastError = $faultHandler;
            return null;
        } else {
            $this->lastError = false;
            $returnValue = new IntuitCDCResponse();
            try {
                $xmlObj = simplexml_load_string($responseBody);
                $responseArray = $xmlObj->CDCResponse->QueryResponse;
                if(sizeof($responseArray) != sizeof($entityList)){
                    throw new ServiceException("The number of Entities requested on CDC does not match the number of Response.");
                }

                for($i = 0; $i < sizeof($responseArray); $i++){
                    $currentResponse = $responseArray[$i];
                    $currentEntityName = $entityList[$i];
                    $entities = $this->responseSerializer->Deserialize($currentResponse->asXML(), false);
                    $entityName = $currentEntityName;
                    //If we find the actual name, update it.
                    foreach ($currentResponse->children() as $currentResponseChild) {
                        $entityName = (string)$currentResponseChild->getName();
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
    public function Retrieve($entity)
    {
        $this->verifyOperationAccess($entity, __FUNCTION__);

        return $this->FindById($entity);
    }

    /**
     * Serializes oblect into specified format
     * @param IPPIntuitEntity $entity
     * @param String $urlResource
     * @return type
     */
    protected function executeObjectSerializer($entity, &$urlResource)
    {
        //
        $result = $this->getRequestSerializer()->Serialize($entity);
        $urlResource = $this->getRequestSerializer()->getResourceURL();

        return $result;
    }

    /**
     * Returns post request, depends on configuration and entity rule "jsonOnly"
     * @param IPPIntuitEntity $entity
     * @param string $uri
     * @return RequestParameters
     */
    protected function initPostRequest($entity, $uri)
    {
        return $this->isJsonOnly($entity)
            ? $this->getPostJsonRequest($uri)
            : $this->getPostRequest($uri);
    }

    /**
     * Returns content type depends from serialization format
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
     * @param string $uri
     * @return RequestParameters
     */
    private function getPostJsonRequest($uri)
    {
        return $this->getPostRequestParameters($uri, CoreConstants::CONTENTTYPE_APPLICATIONJSON);
    }

    /**
     * Return true if specified entity can work with JSON only serialization
     * @param IPPIntuitEntity $entity
     * @return boolean
     */
    private function isJsonOnly($entity)
    {
        return $this->isAllowed($entity, "jsonOnly");
    }

    /**
     * Returns pre-defined request with POST method and content type from settings
     * @param string $uri
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
    private function getGetRequestParameters($uri, $type)
    {
        return $this->getRequestParameters($uri, 'GET', $type);
    }

    /**
     * Returns pre-defined request with POST method
     * @param string $uri
     * @param string $type
     * @return RequestParameters
     */
    private function getPostRequestParameters($uri, $type)
    {
        return $this->getRequestParameters($uri, 'POST', $type);
    }

    /**
     * Wraps and returns RequestParameters object
     * @param string $uri
     * @param string $method
     * @param string $type
     * @param string $apiName
     * @return RequestParameters
     */
    protected function getRequestParameters($uri, $method, $type, $apiName = null)
    {
        return new RequestParameters($uri, $method, $type, $apiName);
    }

    /**
     * Returns current serialization format
     *
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
    private function handleTaxService($entity, $uri)
    {
        if ($this->isTaxServiceSafe($entity)) {
            return $uri . '/taxcode';
        }

        return $uri;
    }

    /**
     * Verifies that entity has TaxService type
     * update the TaxService with namespace added
     * If this class is not available on include_path or wab't loaded the method will return false
     *
     * @param IPPTaxService $entity
     * @return bool
     */
    private function isTaxServiceSafe($entity)
    {
        $IPPTaxServiceClassWIthNameSpace = "QuickBooksOnline\\API\\Data\\IPPTaxService";

        return class_exists($IPPTaxServiceClassWIthNameSpace) && ($entity instanceof $IPPTaxServiceClassWIthNameSpace);
    }

    /**
     * Methods provides workaround to successfully process TaxService response
     * @param $entity
     * @param $content
     * @return string
     */
    private function fixTaxServicePayload($entity, $content)
    {
        if ($this->isTaxServiceSafe($entity)) {
            //get first "line" to make sure we don't have TaxService in response
            $sample = substr(trim($content), 0, 20);
            $taxServiceName = self::cleanPhpClassNameToIntuitEntityName(get_class($entity));
            if (false === strpos($sample, $taxServiceName)) {
                //last attempt to verify content before
                if (0 === strpos($sample, '{"TaxCode":')) {
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
     * @deprecated The download for QuickBooksOnline is only supporting download PDF for Invoice and SalesReceipt. Other download function are not defined now.
     */
    public function Download($entity)
    {
        return $this->FindById($entity);
    }

    /**
     * Verifies string as email agains RFC 822
     * @param string $email
     * @return type
     */
    public function verifyEmailAddress($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Returns PDF filename based on entity type and id
     * @param IPPIntuitEntity $entity
     * @param string $ext
     * @return string
     */
    public function getExportFileNameForPDF($entity, $ext, $usetimestamp = true)
    {
        //TODO: add timestamp or GUID
        $this->validateEntityId($entity);

        return self::getEntityResourceName($entity) . "_" . $this->getIDString($entity->Id) . ($usetimestamp ? "_" . time() : "") . ".$ext";
    }

    /**
     * Returns the Sync Resthandler associated with the dataserivce
     * @return SyncRestHandler          The SyncRestHandler with the DataService
     */
    protected function getRestHandler()
    {
        if(isset($this->restHandler)){
             return $this->restHandler;
        }else{
             throw new SdkException("The SyncRest handler associated with the DataService is not set.");
        }
    }

    /**
     * Saves exported (e.g. check DownloadPDF) entity into file according to strategy in settings
     * @param ContentWriter $writer
     * @param int $responseCode
     * @param string $fileName
     * @return mixed full path with filename or open handler
     */
    protected function processDownloadedContent(ContentWriter $writer, $responseCode, $fileName = null, $dir)
    {
        $writer->setPrefix($this->getPrefixFromSettings());
        try {
            if(isset($dir) && !empty($dir)){
                $writer->saveFile($dir, $fileName);
            }else if ($this->isTempFile()) {
                $writer->saveTemp();
            } elseif ($this->isFileExport()) {
                $writer->saveFile($this->getFileExportDir(), $fileName);
            } else {
                $writer->saveAsHandler();
            }
            //return object as is
            if ($this->isReturnContentWriter()) {
                return $writer;
            }
            $writer->resetContent();
            $this->logInfo("File was downloaded (http response = $responseCode), bytes written: {$writer->getBytes()}");
        } catch (Exception $ex) {
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
        return (CoreConstants::FILE_STRATEGY === $this->serviceContext->IppConfiguration->ContentWriter->strategy);
    }

    /**
     * Returns true if SDK is configured to export files to another location
     * @return boolean
     */
    private function isFileExport()
    {
        return (CoreConstants::EXPORT_STRATEGY === $this->serviceContext->IppConfiguration->ContentWriter->strategy);
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
    private function isAllowed($entity, $method)
    {
        $className = get_class($entity);
        if (!$className) {
            $this->logError("Intuit entity is expected here instead of $entity");
            throw new IdsException('Unexpected Argument Exception');
        }

        $classArray = explode('\\', $className);
        $trimedClassName = end($classArray);

        return $this->serviceContext->IppConfiguration->OpControlList->isAllowed($trimedClassName, $method);
    }


    private function verifyOperationAccess($entity, $func)
    {
        if (!$this->isAllowed($entity, $func)) {
            $this->logError("Cannot invoke " . $func . " for \"" . get_class($entity) . "\" because of operation contstrains.");
            throw new IdsException('Operation ' . $func . ' is not allowed for entity ' . get_class($entity));
        }

        return true;
    }


    private function validateEntityId($entity)
    {
        if (empty($entity)) {
            $this->logError("Argument Null Exception");
            throw new IdsException('Argument Null Exception');
        }
        if (!isset($entity->Id)) {
            $this->logError("Property ID doesn't exist");
            throw new IdsException('Property ID is not set');
        }

        if (empty($entity->Id)) {
            $this->logError("Property ID is empty");
            throw new IdsException('Property ID is empty');
        }

        return true;
    }

    private function logError($message)
    {
        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Error, $message);
    }

    private function logInfo($message)
    {
        $this->serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, $message);
    }


    /**
     * Creates new batch
     *
     * @return Batch returns the batch object
     */
    public function CreateNewBatch()
    {
        $batch = new Batch($this->serviceContext, $this->getRestHandler(), $this->isThrownExceptionOnError());

        return $batch;
    }


    /**
     * Parse input date-time string into unix timestamp
     * @param string $str
     * @return int timestamp or false overwise
     * @throws SdkException
     */
    private function convertToTimestamp($str)
    {
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

        //@TODO: mktime is deprecated since 5.3.0, this package needs 5.6
        return mktime($hour, $minute, $second, $month, $day, $year);
    }

    /**
     * Checks if input string is a valid timestamp or not
     * @param string timestamp contains input timestamp-like string
     * @return bool
     */
    public function isValidTimeStamp($timestamp)
    {
        return ((string)(int)$timestamp === $timestamp) && ($timestamp <= PHP_INT_MAX) && ($timestamp >= ~PHP_INT_MAX);
    }

    /**
     * Verifies input and returns unix timestamp
     * @param mixed $value
     * @return int
     * @throws SdkException
     */
    protected function verifyChangedSince($value)
    {
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

    /**
     * Get the Company Information
     * @return IPPCompanyInfo   CompanyInformation
     */
    public function getCompanyInfo()
    {
        $currentServiceContext = $this->getServiceContext();
        if (!isset($currentServiceContext) || empty($currentServiceContext->realmId)) {
            throw new SdkException("Please Setup Service Context before making get CompanyInfo call.");
        }
        //The CompanyInfo URL
        $uri = implode(CoreConstants::SLASH_CHAR, array('company', $currentServiceContext->realmId, 'companyinfo', $currentServiceContext->realmId));
        $requestParameters = new RequestParameters($uri, 'GET', CoreConstants::CONTENTTYPE_APPLICATIONXML, null);
        $restRequestHandler = $this->getRestHandler();
        list($responseCode, $responseBody) = $restRequestHandler->sendRequest($requestParameters, null, null, $this->isThrownExceptionOnError());
        $faultHandler = $restRequestHandler->getFaultHandler();
        //$faultHandler now is true or false
        if ($faultHandler) {
            $this->lastError = $faultHandler;
            return null;
        } else {
            $this->lastError = false;
            $parsedResponseBody = $this->getResponseSerializer()->Deserialize($responseBody, true);
            return $parsedResponseBody;
        }
    }

    /**
     * Get the Company Preferences Information
     * @return JSON/XML String      CompanyInformation
     */
    public function getCompanyPreferences()
    {
        $currentServiceContext = $this->getServiceContext();
        if (!isset($currentServiceContext) || empty($currentServiceContext->realmId)) {
           throw new SdkException("Please Setup Service Context before making get Company Preferences call.");
        }
        //The Preferences URL
        $uri = implode(CoreConstants::SLASH_CHAR, array('company', $currentServiceContext->realmId, 'preferences'));
        $requestParameters = new RequestParameters($uri, 'GET', CoreConstants::CONTENTTYPE_APPLICATIONXML, null);
        $restRequestHandler = $this->getRestHandler();
        list($responseCode, $responseBody) = $restRequestHandler->sendRequest($requestParameters, null, null, $this->isThrownExceptionOnError());
        $faultHandler = $restRequestHandler->getFaultHandler();
        //$faultHandler now is true or false
        if ($faultHandler) {
            $this->lastError = $faultHandler;
            return null;
        } else {
            $this->lastError = false;
            $parsedResponseBody = $this->getResponseSerializer()->Deserialize($responseBody, true);
            return $parsedResponseBody;
        }
    }

    /**
     * Get the actual ID string value of either an IPPid object, or an Id string
     * @param Object $id
     * @return String Id
     */
    private function getIDString($id){
        if($id instanceof IPPid || $id instanceof QuickBooksOnline\API\Data\IPPid){
            return (String)$id->value;
        }else{
            return (String)$id;
        }
    }
}
