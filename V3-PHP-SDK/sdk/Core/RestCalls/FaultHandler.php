<?php

/**
 * Handles the 3xx, 4xx and 5xx response status code in the response and handles them.
 */
class FaultHandler
{
	 /**
	 * The Service Context
	 * @var ServiceContext context
	 */
    private $context;

    /**
		If any 3xx, 4xx or 5xx status code is returned, it will store here
		*/
    private $httpStatusCode;

    /**
		The response body from Intuit
		*/
		private $responseBody;

    /**
		The call is made through OAuth, if any code other than 2xx is returned, OAuth will have an error message generated as well.
		The OAuth error message will store here.
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
					throw new Exception("OAuthException required for generate error from Intuit. The passed parameters for Fault handler is not OAuthException");
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
	/**
	 * Parses the Response and throws appropriate exceptions.
	 * @param WebException webException
	 * @param int StatusCode HTTP Response code
	 * @param bool isIpp
	 * @return IdsException
	 */
	 //It was never used. Remove and run in regression test.
	 /*
    public function ParseResponseAndThrowException($webException, $StatusCode, $isIpp = FALSE)
    {
        $idsException = NULL;

        // Checks whether the webException is null or not.
        if ($webException != NULL)
        {
            // Ids will set the following error codes. Depending on that we will be throwing specific exceptions.
            switch ($StatusCode)
            {
            	// HTTP OK: 200
            	case 200:
            		break;
                // Bad Request: 400
                case 400:
                // Unauthorized: 401
                case 401:
                // ServiceUnavailable: 503
                case 503:
                // InternalServerError: 500
                case 500:
                // Forbidden: 403
                case 403:
                // NotFound: 404
                case 404:
                // Default. Throw generic exception i.e. IdsException.
                default:
					$idsException = new IdsException("HTTP Response: $StatusCode");
					break;
            }
        }

        // Return the Ids Exception.
        return $idsException;
    }
		*/
}
?>
