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
namespace QuickBooksOnline\API\Core;

use QuickBooksOnline\API\Core\Configuration\IppConfiguration;
use QuickBooksOnline\API\Core\Configuration\LocalConfigReader;
use QuickBooksOnline\API\Security\OAuthRequestValidator;
use QuickBooksOnline\API\Diagnostics\TraceLevel;
use QuickBooksOnline\API\Exception\SdkException;
use QuickBooksOnline\API\Core\Http\Compression\CompressionFormat;
use QuickBooksOnline\API\Core\Http\Serialization\SerializationFormat;
use QuickBooksOnline\API\Core\CoreConstants;
use QuickBooksOnline\API\Security\RequestValidator;
use QuickBooksOnline\API\Core\OAuth\OAuth2\OAuth2AccessToken;

/**
 * THe Service Context Class contains necessary settings for RestCalls
 */
class ServiceContext
{
    /**
     * The Realm Id.
     * Realm ID is the Company ID
     * @var string
     */
    public $realmId;

    /**
     * Intuit Service Type(QBO/QB).
     * @var string
     */
    public $serviceType;

    /**
     * Base Uri for IDS Service Call.
     * @var string
     */
    public $baseserviceURL;

    /**
     * Application Token.
     * @var string
     */
    private $appToken;

    /**
     * this flag indicates if static create methods of this class has been invoked.
     * @var string
     */
    private $isCreateMethod;

    /**
     * Temporary storage for serialization and compression values for request and reponse.
     * @var string
     */
    private $messageValues;

    /**
     * The Request validator
     * @var RequestValidator
     */
    public $requestValidator;

    /**
     * The Minor Version that would that returns additinoal fields from build v71
     * @var string
     */
    public $minorVersion;

    /**
     * Gets or sets the Ipp configuration.
     * @var IppConfiguration
     */
    public $IppConfiguration;


    /**
     * Keep this method for backward compability. Remove in next Release. USe Static factory to contruct new Instance();
     * @Feb.7th, 2017 Hao
     * Old Constructor from previous SDK code. Keep unchanged for backward compability.
     *   Initializes a new instance of the ServiceContext class.
     *
     * @param string $realmId The realm id.
     * @param IntuitServicesType $serviceType Service Type - QBO/QB.
     * @param RequestValidator $requestValidator The request validate.
     * @throws IdsException If arguments are null or empty.
     * @throws InvalidRealmException If realm id is invalid.
     * @throws InvalidTokenException If the token is invalid.
     * @return ServiceContext Returns ServiceContext object.
     */
    private function __construct($realmId, $serviceType = CoreConstants::IntuitServicesTypeQBO, $requestValidator = null, $ippConfiguration = null)
    {
        if (isset($ippConfiguration)) {
            //$this->IppConfiguration = LocalConfigReader::ReadConfiguration();
            $this->IppConfiguration = $ippConfiguration;
        } else {
            throw new SdkException("You shouldn't pass a null ippConfiguration in Current release");
        }

        $this->realmId = $realmId;
        $this->serviceType = $serviceType;
        if ($requestValidator != null) {
            $this->IppConfiguration->Security = $requestValidator;
            $this->requestValidator = $requestValidator;
        } else {
            // Leave unchanged - already loaded from config file.
            $requestValidatorFromFile = $this->IppConfiguration->Security;
            $this->requestValidator = $requestValidatorFromFile;
        }

        $this->isCreateMethod = false;
        $this->baseserviceURL = $this->getBaseURL();

        return $this;
    }

    public static function ConfigureFromLocalFile($filePath)
    {
        $localIppConfiguration = LocalConfigReader::ReadConfigurationFromFile($filePath);
        $QBORealmID = $localIppConfiguration->RealmID;
        if (empty($QBORealmID)) {
            throw new SdkException('Sdk.config files contain empty RealmID.');
        }

        $serviceType = CoreConstants::IntuitServicesTypeQBO;
        $OAuthConfig = $localIppConfiguration->Security;
        $serviceContextInstance = new ServiceContext($QBORealmID, $serviceType, $OAuthConfig, $localIppConfiguration);

        return $serviceContextInstance;
    }

    /**
     * Configure the OAuth 1 or OAuth 2 values from a passed array
     * @param Array $settings    The array that contains OAuth 1 or OAuth 2 settings
     */
    public static function ConfigureFromPassedArray(array $settings)
    {
        ServiceContext::checkIfOAuthIsValid($settings);

        if(strcasecmp($settings['auth_mode'], CoreConstants::OAUTH1) == 0) {
             $OAuthConfig = new OAuthRequestValidator(
               $settings['accessTokenKey'],
               $settings['accessTokenSecret'],
               $settings['consumerKey'],
               $settings['consumerSecret']
             );
        }else{
             $OAuthConfig = new OAuth2AccessToken(
               $settings['ClientID'],
               $settings['ClientSecret'],
               CoreConstants::getAccessTokenFromArray($settings),
               CoreConstants::getRefreshTokenFromArray($settings)
             );
        }
        $QBORealmID = array_key_exists('QBORealmID', $settings) ? $settings['QBORealmID'] : null;
        $baseURL =    array_key_exists('baseUrl', $settings) ? $settings['baseUrl']: null;
        if(strcasecmp($baseURL, CoreConstants::DEVELOPMENT_SANDBOX) == 0){
           $baseURL = CoreConstants::SANDBOX_DEVELOPMENT;
        }else if(strcasecmp($baseURL, CoreConstants::PRODUCTION_QBO) == 0){
           $baseURL = CoreConstants::QBO_BASEURL;
        }
        $checkedBaseURL = ServiceContext::checkAndAddBaseURLSlash($baseURL);

        if($OAuthConfig instanceof OAuth2AccessToken){
           $OAuthConfig->setRealmID($QBORealmID);
           $OAuthConfig->setBaseURL($checkedBaseURL);
        }
        $serviceType = CoreConstants::IntuitServicesTypeQBO;
        $IppConfiguration = LocalConfigReader::ReadConfigurationFromParameters($OAuthConfig, $checkedBaseURL, CoreConstants::DEFAULT_LOGGINGLOCATION, CoreConstants::DEFAULT_SDK_MINOR_VERSION);
        $serviceContextInstance = new ServiceContext($QBORealmID, $serviceType, $OAuthConfig, $IppConfiguration);
        return $serviceContextInstance;
    }



    /**
     * Check if passed array has mininum required fields
     *
     * @param Array $settings        The array contain OAuth 1 or OAuth 2 settings
     */
    public static function checkIfOAuthIsValid(array $settings){
      if (!isset($settings) || empty($settings)) {
          throw new SdkException("Empty OAuth Array passed. Can't construct ServiceContext based on Empty Array.");
      }

      if(!isset($settings['auth_mode'])){
          throw new SdkException("No OAuth 1 or OAuth 2 Mode specified. Can't validate OAuth tokens.");
      }

      $mode = $settings['auth_mode'];

      //OAuth 1 settings, OAuth 1 must provide all four values.
      if (strcasecmp($mode, CoreConstants::OAUTH1) == 0) {
        if (!isset($settings['accessTokenKey'])) {
            throw new SdkException("'accessTokenKey' must be provided in OAuth1.");
        }

        if (!isset($settings['accessTokenSecret'])) {
            throw new SdkException("'accessTokenSecret' must be provided in OAuth1.");
        }
      }
      //OAuth 2 settings, Only client ID and Client Secret is required. For making API call, all four values, Client ID, Client Secret, Access Token, Access Token Secret are required.
      else if(strcasecmp($mode, CoreConstants::OAUTH2) == 0){
        if (!isset($settings['ClientID'])) {
            throw new SdkException("'ClientID' must be provided in OAuth2.");
        }

        if (!isset($settings['ClientSecret'])) {
            throw new SdkException("'ClientSecret' must be provided in OAuth2.");
        }
      }
      //Now other OAuth is supported
      else{
        throw new SdkException("OAuth Mode is not supported.");
      }
    }

    /**
     * When user passing the URL from Code. Sometimes they forget to add "/" at the end of string. Add it for them.
     * @param String $baseURL          return the formated string for the
     */
    private static function checkAndAddBaseURLSlash($baseURL){
        $lastChar = substr($baseURL, -1);
        if(strcmp($lastChar, "/") != 0){
             $baseURL = $baseURL . "/";
        }
        return $baseURL;
    }


    /**
     * Gets the base Uri for a QBO user.
     *
     * @return string Returns the base Uri endpoint for a user.
     */
    public function getBaseURL()
    {
        $this->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called GetBaseURL method.");
        try {
            if ($this->serviceType === CoreConstants::IntuitServicesTypeQBO) {
                $baseurl = $this->IppConfiguration->BaseUrl->Qbo . implode(CoreConstants::SLASH_CHAR, array(CoreConstants::VERSION)) . CoreConstants::SLASH_CHAR;
            }
            else if($this->serviceType === CoreConstants::IntuitServicesTypeIPP){
                $this->IppConfiguration->BaseUrl->Ipp  =  CoreConstants::IPP_BASEURL;
                $baseurl = $this->IppConfiguration->BaseUrl->Ipp;
            }
        } catch (\Exception $e) {
            throw new \Exception("Base URL is not setup");
        }
        return $baseurl;
    }

    /**
     * Populates the values of the service context like service type and base url to Platform Services.
     */
    public function UsePlatformServices()
    {
        $this->serviceType = CoreConstants::IntuitServicesTypeIPP;
        $this->baseserviceURL = $this->getBaseURL();
    }

    public function disableSSlCheck()
    {
        $this->IppConfiguration->SSLCheckStatus = false;
    }

    /**
     * Currently the Object serailziation and deserilization only supports XML format.
     */
    public function useXml()
    {
        $this->IppConfiguration->Message->Request->CompressionFormat = CompressionFormat::None;
        $this->IppConfiguration->Message->Response->CompressionFormat = CompressionFormat::None;
        $this->IppConfiguration->Message->Request->SerializationFormat = SerializationFormat::Xml;
        $this->IppConfiguration->Message->Response->SerializationFormat = SerializationFormat::Xml;
    }

    /**
     * Currently the Object serailziation and deserilization only supports XML format.
     * To be Supported, Currently it is only a place holder @Hao
     */
    public function useJson()
    {
        $this->IppConfiguration->Message->Request->CompressionFormat = CompressionFormat::None;
        $this->IppConfiguration->Message->Response->CompressionFormat = CompressionFormat::None;
        $this->IppConfiguration->Message->Request->SerializationFormat = SerializationFormat::Json;
        $this->IppConfiguration->Message->Response->SerializationFormat = SerializationFormat::Json;
    }

    /**
     * Disable Log the request and response to disk
     */
    public function disableLog()
    {
        try {
            $_ippConfigInstance = $this->getIppConfig();
            LocalConfigReader::setupLogger($_ippConfigInstance, CoreConstants::DEFAULT_LOGGINGLOCATION, "FALSE");
        } catch (\Exception $e) {
            throw new \Exception("Error in disable Log.");
        }
    }

    /**
     * Set a new Location for Log instead of the default Location
     * @param $new_log_location
     *        The new log directory path. It is a directory, not a file
     */
    public function setLogLocation($new_log_location)
    {
        try {
            $_ippConfigInstance = $this->getIppConfig();
            LocalConfigReader::setupLogger($_ippConfigInstance, $new_log_location, "TRUE");
        } catch (\Exception $e) {
            throw new \Exception("Error in setting up new Log Configuration: " . $new_log_location);
        }
    }

    public function setMinorVersion($new_minor_version)
    {
        try {
            $_ippConfigInstance = $this->getIppConfig();
            $_ippConfigInstance->minorVersion = $new_minor_version;
        } catch (\Exception $e) {
            throw new \Exception("Error in setting up minor version.");
        }
    }

    /**
     * Return the Ipp Configuration for the ServiceContext for changing the settings
     * @return IppConfiguration
     *            The IppConfiguration for current settings
     */
    private function getIppConfig()
    {
        $_ippConfiguration = $this->IppConfiguration;
        if (isset($_ippConfiguration)) {
            return $_ippConfiguration;
        } else {
            throw new \Exception("Return Null or Empty IppConfiguration.");
        }
    }

    /**
     * Update OAuth 2 Access Token with the new Token Value
     * @param OAuth2AccessToken  The OAuth 2 token that contains access token, refresh token
     */
    public function updateOAuth2Token($OAuth2AccessToken){
      if($OAuth2AccessToken instanceof OAuth2AccessToken && $this->requestValidator instanceof OAuth2AccessToken){
        $this->IppConfiguration->Security = $OAuth2AccessToken;
        $this->requestValidator = $OAuth2AccessToken;
      }

    }
}
