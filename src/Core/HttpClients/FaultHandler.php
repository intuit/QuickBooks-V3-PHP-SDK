<?php
namespace QuickBooksOnline\API\Core\HttpClients;

/**
 * Handles the 3xx, 4xx and 5xx response status code in the response and handles them.
 * This class use the pecl OAuth Extension. Rewrite it to be native cURL request @Hao
 */
class FaultHandler
{
	 /**
	 * The Service Context
	 * @var ServiceContext context
	 */
    private $context;

    /**
		* If any 3xx, 4xx or 5xx status code is returned, it will store here
		*/
    private $httpStatusCode;

    /**
		* The response body from Intuit
		*/
		private $responseBody;

    /**
		*The call is made through OAuth, if any code other than 2xx is returned, OAuth will have an error message generated as well.
		* The OAuth error message will store here.
		*/
		private $oAuthHelperError;
	/**
	 * Initializes a new instance of the FaultHandler class.
	 * @param ServiceContext context
	 */
    public function __construct($context, $OAuthException)
    {
        $this->context = $context;
				$this->generateErrorFromOAuthMsg($OAuthException);
    }

    /**
		* generate Error from OAuth Exception
		*/
    private function generateErrorFromOAuthMsg($OAuthException)
		{
				if(get_class($OAuthException) == 'OAuthException'){
					  $this->httpStatusCode = $OAuthException->getCode();
						$this->oAuthHelperError = $OAuthException->getMessage();
						$this->responseBody = $OAuthException->lastResponse;
				}else{
					throw new \Exception("OAuthException required for generate error from Intuit. The passed parameters for Fault handler is not OAuthException");
				}
		}

		public function getHttpStatusCode(){
			return $this->httpStatusCode;
		}

		public function getOAuthHelperError(){
			return $this->oAuthHelperError;
		}

		public function getResponseBody(){
			return $this->responseBody;
		}
}
?>
