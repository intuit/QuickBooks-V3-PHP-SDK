<?php

/**
 * IRestHandler contains the methods for preparing the REST request, calls REST services and returns the response.
 */
abstract class IRestHandler
{
	/**
	 * Returns the response by calling REST service.
	 *
	 * @param ServiceContext $requestParameters The parameters
	 * @param string $requestBody The request body
	 * @param string $oauthRequestUri The OAuth request uri
	 */	
    abstract public function GetResponse($requestParameters, $requestBody, $oauthRequestUri);
}

?>