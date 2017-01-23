<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once(PATH_SDK_ROOT . 'Core/LogRequestsToDisk.php');
require_once(PATH_SDK_ROOT . 'Core.Test/Initializer.php');
require_once(PATH_SDK_ROOT . 'Diagnostics/TraceLogger.php');

date_default_timezone_set('America/Chicago');

/**
* Tests for ServiceContext class
*/
class ServiceContextTest extends PHPUnit_Framework_TestCase
{
	// QBD
	private $accessToken;
	private $accessTokenSecret;
	private $consumerKey;
	private $consumerSecret;
	private $realmIdIA;
	private $realmIdF;
	private $appToken;
	private $appDBId;
	private $userName;
	private $password;
	private $ticket;

	// QBO
	private $accessTokenQbo;
	private $accessTokenSecretQbo;
	private $consumerKeyQbo;
	private $consumerSecretQbo;
	private $realmIdIAQbo;
	private $realmIdFQbo;
	private $appTokenQbo;
	private $appDBIdQbo;
	private $userNameQbo;
	private $passwordQbo;
	private $ticketQbo;


	/**
	 * Initialize a ServiceContextTest object
	 */
	public function __construct($name)
	{
		parent::__construct($name);

        //initialising private data members that is used for QBD related operations
		$this->accessToken       = ConfigurationManager::AppSettings('AccessTokenQBD');
		$this->accessTokenSecret = ConfigurationManager::AppSettings('AccessTokenSecretQBD');
		$this->consumerKey       = ConfigurationManager::AppSettings('ConsumerKeyQBD');
		$this->consumerSecret    = ConfigurationManager::AppSettings('ConsumerSecretQBD');
		$this->realmIdIA         = ConfigurationManager::AppSettings('RealmIAQBD');
		$this->realmIdF          = ConfigurationManager::AppSettings('RealmFedQBD');
		$this->appToken          = ConfigurationManager::AppSettings('AppTokenQBD');
		$this->appDBId           = ConfigurationManager::AppSettings('AppDBIdQBD');
		$this->userName          = ConfigurationManager::AppSettings('UserNameQBD');
		$this->password          = ConfigurationManager::AppSettings('PasswordQBD');
		$this->ticket            = ConfigurationManager::AppSettings('TicketQBD');

        //initialising private data members that is used for QBO related operations
		$this->accessTokenQbo       = ConfigurationManager::AppSettings('AccessTokenQBO');
		$this->accessTokenSecretQbo = ConfigurationManager::AppSettings('AccessTokenSecretQBO');
		$this->consumerKeyQbo       = ConfigurationManager::AppSettings('ConsumerKeyQBO');
		$this->consumerSecretQbo    = ConfigurationManager::AppSettings('ConsumerSecretQBO');
		$this->realmIdIAQbo         = ConfigurationManager::AppSettings('RealmIAQBO');
		$this->realmIdFQbo          = ConfigurationManager::AppSettings('RealmIdFedQBO');
		$this->appTokenQbo          = ConfigurationManager::AppSettings('AppTokenQBO');
		$this->appDBIdQbo           = ConfigurationManager::AppSettings('AppDBIdQBO');
		$this->userNameQbo          = ConfigurationManager::AppSettings('UserNameQBO');
		$this->passwordQbo          = ConfigurationManager::AppSettings('PasswordQBO');
		$this->ticketQbo            = ConfigurationManager::AppSettings('TicketQBO');
	}

	/**
	 * A test for ServiceContext Constructor
	 */
    public function testServiceContextConstructorTest()
    {
        $serviceContext = Initializer::InitializeServiceContextQbo();
        $this->assertNotNull($serviceContext, 'Constructor failed');
    }

	/**
	 * A test for ServiceContext Constructor - QBD
   * Change to QBO Test.
	 */
	public function testServiceContextConstructorForQBDTest()
	{
	    try
	    {
	        $oauthValidator = new OAuthRequestValidator($this->accessTokenQbo, $this->accessTokenSecretQbo, $this->consumerKeyQbo, $this->consumerSecretQbo);
	        $context = new ServiceContext($this->realmIdIAQbo, IntuitServicesType::QBO);
	    }
	    catch (Exception $e)
	    {
	        $this->assertTrue(FALSE, 'Constructor failed - QBD');
	    }
	}


	/**
	 * A test for ServiceContext Constructor - QBO
	 */
	public function testServiceContextConstructorForQBOTest()
	{
	    try
	    {
	        $oauthValidator = new OAuthRequestValidator($this->accessTokenQbo, $this->accessTokenSecretQbo, $this->consumerKeyQbo, $this->consumerSecretQbo);
	        $context = new ServiceContext($this->realmIdIAQbo, IntuitServicesType::QBO);
	    }
	    catch (Exception $e)
	    {
	        $this->assertTrue(FALSE, 'Constructor failed - QBO');
	    }
	}

	/**
	 * A test for ServiceContext Constructor
	 */
	public function testServiceContextConstructorNullValidator1_Test()
	{
	    try
	    {
	        $context = new ServiceContext(NULL, IntuitServicesType::QBO);
	        $this->assertTrue(FALSE, 'Constructor succeeded when it should have thrown an exception');
	    }
	    catch (Exception $e)
	    {
			// Should end up here
	    	return;
	    }
	}

	/**
	 * A test for BaseUrl
	 */
	public function testBaseUrlQBDTest()
	{
	    try
	    {
			$oauthValidator = new OAuthRequestValidator($this->accessTokenQbo, $this->accessTokenSecretQbo, $this->consumerKeyQbo, $this->consumerSecretQbo);
			$context = new ServiceContext($this->realmIdIAQbo, IntuitServicesType::QBO);
	        $this->assertNotNull($context->IppConfiguration->BaseUrl, 'BaseUrl not set up');
	    }
	    catch (Exception $e)
	    {
			// Should not end up here
			$this->assertTrue(FALSE, 'Unexpected exception ' . $e->getMessage());
	    	return;
	    }

	}


	/**
	 * A test for RealmId
	 */
	public function testRealmIdQBDTest()
	{
	    try
	    {
			$oauthValidator = new OAuthRequestValidator($this->accessTokenQbo, $this->accessTokenSecretQbo, $this->consumerKeyQbo, $this->consumerSecretQbo);
			$context = new ServiceContext($this->realmIdIAQbo, IntuitServicesType::QBO);
	        $this->assertEquals($this->realmIdIAQbo, $context->realmId, 'RealmId not set up correctly');
	    }
	    catch (Exception $e)
	    {
			// Should not end up here
			$this->assertTrue(FALSE, 'Unexpected exception');
	    	return;
	    }

	}


	/**
	 * A test for ServiceTypeTest
	 */
	public function testServiceTypeTest()
	{
	    try
	    {
			$oauthValidator = new OAuthRequestValidator($this->accessTokenQbo, $this->accessTokenSecretQbo, $this->consumerKeyQbo, $this->consumerSecretQbo);
			$context = new ServiceContext($this->realmIdIAQbo, IntuitServicesType::QBO);
            $expected = IntuitServicesType::QBO;
	        $this->assertEquals($context->serviceType, $expected, 'ServiceType not set up correctly');
	    }
	    catch (Exception $e)
	    {
	    	// Should not end up here
	        $this->assertTrue(FALSE, 'Unexpected exception');
	    	return;
	    }
	}


	/**
	 * A test for IDSLoggerTest
	 */
	public function testIDSLoggerTest()
	{
	    try
	    {
			$oauthValidator = new OAuthRequestValidator($this->accessToken, $this->accessTokenSecret, $this->consumerKey, $this->consumerSecret);
			$context = new ServiceContext($this->realmIdIA, IntuitServicesType::QBD);
			$actual = new TraceLogger();
			$actualClass = get_class($context->IppConfiguration->Logger->CustomLogger);
			$expectedClass = get_class($actual);
	        $this->assertEquals($actualClass, $expectedClass, "TraceLogger not set up correctly ([{$actualClass}] vs [{$expectedClass}])");
	    }
	    catch (Exception $e)
	    {
	    }
	}


	/**
	 * A test for ServiceRequestsLogging
	 */
	public function testServiceRequestsLoggingTest()
	{
	    try
	    {
			$oauthValidator = new OAuthRequestValidator($this->accessToken, $this->accessTokenSecret, $this->consumerKey, $this->consumerSecret);
			$context = new ServiceContext($this->realmIdIA, IntuitServicesType::QBD);
	        $this->assertFalse($context->IppConfiguration->Logger->RequestLog->EnableRequestResponsLogging, "EnableRequestResponsLogging not set up correctly");
	        $context->IppConfiguration->Logger->RequestLog->EnableRequestResponsLogging=TRUE;
	        $this->assertTrue($context->IppConfiguration->Logger->RequestLog->EnableRequestResponsLogging, "EnableRequestResponsLogging not set up correctly");
	    }
	    catch (Exception $e)
	    {
	    }
	}

	/**
	 * A test for ServiceRequestLoggingLocationTest
	 */
	public function testServiceRequestLoggingLocationTest()
	{
	    try
	    {
			$oauthValidator = new OAuthRequestValidator($this->accessToken, $this->accessTokenSecret, $this->consumerKey, $this->consumerSecret);
			$context = new ServiceContext($this->realmIdIA, IntuitServicesType::QBD);

			$badPath = "asdfgasgasg";
			$context->IppConfiguration->Logger->RequestLog->ServiceRequestLoggingLocation = $badPath;
	    }
	    catch (Exception $e)
	    {
	    	// Theoretically we wish we'd land here like the .NET SDK would, but in PHP we're using properties rather
	    	// than function-based getters/setters, so no realtime param validation on property set.
	    }
	}

	/**
	 * Many AppToken-related tests, Federated tests, and DBID-related tests were here, but are not relavant for PHP SDK
	 */

	public function testDisableSSlCheck() {
		$serviceContext = new ServiceContext($this->realmIdIAQbo, IntuitServicesType::QBO);
		$serviceContext->disableSSlCheck();
		$this->assertFalse($serviceContext->IppConfiguration->SSLCheckStatus, false);

	}
}
?>
