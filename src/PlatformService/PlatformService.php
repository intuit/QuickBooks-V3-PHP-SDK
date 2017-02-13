<?php 
require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/InvalidTokenException.php');
require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/InvalidParameterException.php');
require_once(PATH_SDK_ROOT . 'Core/RestCalls/RequestParameters.php');
require_once(PATH_SDK_ROOT . 'Core/RestCalls/SyncRestHandler.php');


/**
 * This file contains Intuit Platform services.
 */
class PlatformService
{

	/**
	 * The Service context object.
	 * @var ServiceContext 
	 */
	public $serviceContext;

	/**
	 * The Rest request handler object.
	 * @var RequestHandler 
	 */
	public $restRequestHandler;

	/**
	 * Request Xml Document
	 * @var unknown 
	 */
	private $requestXmlDocument;
	
	/**
	 * Initializes a new instance of the PlatformService class.
	 *
	 * @param ServiceContext IPP Service Context
	 * @throws ArgumentException:  The exception that is thrown when one of the argument(s) provided to a method  is not valid.
	 * @throws InvalidTokenException:  When invalid tokens are passed.
	 * @throws ArgumentNullException:  When Service context parameter sent as null.
	 */	
	public function __construct($serviceContext)
	{
		if (NULL == $serviceContext)
		{
			throw new ArgumentNullException('Resources.ServiceContextCannotBeNull');
		}
		
		if (!is_object($serviceContext))
		{
			throw new InvalidParameterException('Wrong arg type passed - is not an object.');
		}
		
		if (0 !== strcmp('ServiceContext',get_class($serviceContext)))
		{
			throw new InvalidParameterException('Wrong arg type passed - is not the correct class.');
		}
		
		$this->serviceContext = $serviceContext;
		$this->restRequestHandler = new SyncRestHandler($serviceContext);

        // Set the serviceContext IPP configuration to what IPP is accepting.
        $this->serviceContext->IppConfiguration->Message->Request->SerializationFormat = SerializationFormat::Xml;
        $this->serviceContext->IppConfiguration->Message->Request->CompressionFormat = CompressionFormat::None;
        $this->serviceContext->IppConfiguration->Message->Response->SerializationFormat = SerializationFormat::Xml;
        $this->serviceContext->IppConfiguration->Message->Response->CompressionFormat = CompressionFormat::None;
		
		// Set the service type to IPP by calling a method
		$this->serviceContext->UsePlatformServices();

		$this->serviceContext = $serviceContext;
		$this->restRequestHandler = new SyncRestHandler($serviceContext);
	}

	/**
	 * Get App Menu
	 *
	 * @return string Html of App Menu
	 */	
	public function GetAppMenu()
	{
		$this->requestXmlDocument = '';
		$uriFragment = implode(CoreConstants::SLASH_CHAR,array('v1', 'Account', 'AppMenu'));
		$requestParameters = new RequestParameters(NULL,'GET', NULL, $uriFragment);
		list($respCode,$respHtml) = $this->restRequestHandler->GetResponse($requestParameters, $this->requestXmlDocument, NULL);
		return $respHtml;
	}	
	
	/**
	 * Reconnect generates a new OAuth access token and invalidates the OAuth access token used
	 * in the request, thereby extending the life span by six months.
	 *
	 * @return SimpleXMLElement Xml of Reconnect response
	 */	
	public function Reconnect()
	{
		$this->requestXmlDocument = '';
		$uriFragment = implode(CoreConstants::SLASH_CHAR,array('v1', 'Connection', 'Reconnect'));
		$requestParameters = new RequestParameters(NULL,'GET', NULL, $uriFragment);
		list($respCode,$respXml) = $this->restRequestHandler->GetResponse($requestParameters, $this->requestXmlDocument, NULL);
		return simplexml_load_string($respXml);
	}
	
	/**
	 * Disconnect invalidates the OAuth access token in the request, thereby disconnecting
	 * the user from QuickBooks for this app.
	 *
	 * @return SimpleXMLElement Xml of Disconnect response
	 */	
	public function Disconnect()
	{
		$this->requestXmlDocument = '';
		$uriFragment = implode(CoreConstants::SLASH_CHAR,array('v1', 'Connection', 'Disconnect'));
		$requestParameters = new RequestParameters(NULL,'GET', NULL, $uriFragment);
		list($respCode,$respXml) = $this->restRequestHandler->GetResponse($requestParameters, $this->requestXmlDocument, NULL);
		return simplexml_load_string($respXml);
	}

	
	/**
	 * Returns user information such as first name, last name, and email address.
	 *
	 * @return SimpleXMLElement Xml of Disconnect response
	 */	
	public function CurrentUser()
	{
		$this->requestXmlDocument = '';
		$uriFragment = implode(CoreConstants::SLASH_CHAR,array('v1', 'user', 'current'));
		$requestParameters = new RequestParameters(NULL,'GET', NULL, $uriFragment);
		list($respCode,$respXml) = $this->restRequestHandler->GetResponse($requestParameters, $this->requestXmlDocument, NULL);
		return simplexml_load_string($respXml);
	}
	
}

?>
