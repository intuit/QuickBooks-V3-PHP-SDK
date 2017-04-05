<?php
namespace QuickBooksOnline\API\Core;

use QuickBooksOnline\API\Core\Configuration\IppConfiguration;
use QuickBooksOnline\API\Core\Configuration\LocalConfigReader;
use QuickBooksOnline\API\Security\OAuthRequestValidator;
use QuickBooksOnline\API\Diagnostics\TraceLevel;
use QuickBooksOnline\API\Exception\SdkException;

/**
 * THe Service Context Class contains necessary settings for
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
	 * @var MinorVersion
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
	 public function __construct($realmId, $serviceType = CoreConstants::IntuitServicesTypeQBO, $requestValidator = NULL)
	 {
		  $this->IppConfiguration = LocalConfigReader::ReadConfiguration();

	    // Validate Parameters
	    if (empty($realmId))
	    {
			    throw new SdkException('Invalid Realm.');
	        //IdsExceptionManager.HandleException(new InvalidRealmException(Properties.Resources.ParameterNotNullEmptyMessage, new ArgumentException(Properties.Resources.ParameterNotNullMessage, Properties.Resources.RealmIdParameterName)));
	    }

	    $this->realmId = $realmId;
	    $this->serviceType = $serviceType;
	    if ($requestValidator != NULL)
	    {
	    	  $this->IppConfiguration->Security = $requestValidator;
	        $this->requestValidator = $requestValidator;
	    }
	    else
	    {
	    	// Leave unchanged - already loaded from config file.
	    	  $requestValidatorFromFile = $this->IppConfiguration->Security;
	        $this->requestValidator = $requestValidatorFromFile;
	    }

	    $this->isCreateMethod = false;
	    $this->baseserviceURL = $this->GetBaseURL();

	    return $this;
	 }

	 public static function ConfigureFromLocalFile()
	 {
      $localIppConfiguration = LocalConfigReader::ReadConfiguration();
		 	$QBORealmID = $localIppConfiguration->RealmID;
			if (empty($QBORealmID))
	    {
				throw new \Exception('Sdk.config files contain empty RealmID.');
			}

			$serviceType = CoreConstants::IntuitServicesTypeQBO;
			$OAuthConfig = $localIppConfiguration->Security;
			$serviceContextInstance = new ServiceContext($QBORealmID, $serviceType, $OAuthConfig);

			return $serviceContextInstance;
	 }

	 public static function ConfigureFromPassedArray(array $settings){
		 if(empty($settings)){
			 throw new \Exception("Empty OAuth Array passed. Can't construct ServiceContext based on Empty Array");
		 }


		 //Currently Only Support OAuth 1.0
		 if (!isset($settings['auth_mode']) || strcasecmp($settings['auth_mode'], CoreConstants::OAUTH1)) {
            throw new \Exception("'auth_mode' must be provided with oauth1");
     }

		 if (!isset($settings['consumerKey'])) {
            throw new Exception("'consumerKey' must be provided");
     }

		 if (!isset($settings['consumerSecret'])) {
						throw new Exception("'consumerSecret' must be provided");
		 }

		 if (!isset($settings['accessTokenKey'])) {
						throw new Exception("'accessTokenKey' must be provided");
		 }

		 if (!isset($settings['accessTokenSecret'])) {
						throw new Exception("'accessTokenSecret' must be provided");
		 }

		 if (!isset($settings['QBORealmID'])) {
						throw new Exception("'QBORealmID' must be provided");
		 }

		 $OAuthConfig = new OAuthRequestValidator( $settings['accessTokenKey'],
		 																						$settings['accessTokenSecret'],
			  																				$settings['consumerKey'],
		                                            $settings['consumerSecret']);
     $QBORealmID = $settings['QBORealmID'];

     $serviceType = CoreConstants::IntuitServicesTypeQBO;
		 $serviceContextInstance = new ServiceContext($QBORealmID, $serviceType, $OAuthConfig);
		 return $serviceContextInstance;
	 }

	/**
	 * Gets the base Uri for a QBO user.
	 *
	 * @return string Returns the base Uri endpoint for a user.
	 */
	public function GetBaseURL()
	{
		  $this->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "Called GetBaseURL method.");
	    $baseurl = NULL;


	    if ($this->serviceType == CoreConstants::IntuitServicesTypeQBO)
	    {
	    	if ($this->IppConfiguration &&
	    	    $this->IppConfiguration->BaseUrl &&
	    	    $this->IppConfiguration->BaseUrl->Qbo)
				{
							$baseurl = $this->IppConfiguration->BaseUrl->Qbo . implode(CoreConstants::SLASH_CHAR, array(CoreConstants::VERSION)) . CoreConstants::SLASH_CHAR;
			  }

	        if (empty($baseurl))
	        {
	            $baseurl = CoreConstants::QBO_BASEURL;
	        }

	        //this.IppConfiguration.Logger.CustomLogger.Log(TraceLevel.Info, string.Format(CultureInfo.InvariantCulture, "BaseUrl set for QBD Service Type: {0}.", baseurl));
	    }
	    else if ($this->serviceType == CoreConstants::IntuitServicesTypeIPP)
	    {
	    	if ($this->IppConfiguration &&
	    	    $this->IppConfiguration->BaseUrl &&
	    	    $this->IppConfiguration->BaseUrl->Ipp)
			  {
	            $baseurl = $this->IppConfiguration->BaseUrl->Ipp;
	        }

	        if (empty($baseurl))
	        {
	            $baseurl = CoreConstants::IPP_BASEURL;
	        }

	        //this.IppConfiguration.Logger.CustomLogger.Log(TraceLevel.Info, string.Format(CultureInfo.InvariantCulture, "BaseUrl set for Intuit Platform Service Type: {0}.", baseurl));
	    }

	    return $baseurl;
	}

	/**
	 * Populates the values of the service context like service type and base url to Platform Services.
	 */
	public function UsePlatformServices()
	{
		$this->serviceType = CoreConstants::IntuitServicesTypeIPP;
		$this->baseserviceURL = $this->GetBaseURL();
	}

	public function disableSSlCheck() {
		$this->IppConfiguration->SSLCheckStatus = false;
	}
}
