/*******************************************************************************
* Copyright 2016 Intuit
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
*     http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*******************************************************************************/
<?php

require_once(PATH_SDK_ROOT . 'Utility/UtilityConstants.php');

/**
 * Intuit Error Handler class.
 */
class IntuitErrorHandler
{
	/**
	 * Check the response for any errors it might indicate. Will throw an exception if API response indicates an error.
	 * Will throw an exception if it has a problem determining success or error.
	 * @param string response The API response to examine
	 */
    public function HandleErrors($response)
    {
        // To handle plain text response
        if (!IsValidXml($response))
        {
            return;
        }

        $responseXml = simplexml_load_string($response);
        IntuitErrorHandler::HandleErrorsXml($responseXml);
    }	
	
	/**
	 * Check the response for any errors it might indicate. Will throw an exception if API response indicates an error.
	 * Will throw an exception if it has a problem determining success or error.
	 * @param SimpleXMLElement responseXml
	 */    
	public function HandleErrorsXml($responseXml)
	{
		$errCodeNode = $responseXml->{UtilityConstants::ERRCODEXPATH};
	
	    if ($errCodeNode == NULL)
	    {
	        return;
	    }
	
	    $errorCode;
	    if ((int)$errCodeNode)
	    {
	        throw new IdsException('HandleErrors error code (UtilityConstants::ERRCODEXPATH): '.(int)$errCodeNode);
	    }
	
	    if ($errorCode == 0)
	    {
	        // 0 indicates success
	        return;
	    }
	
		$errTextNode = $responseXml->{UtilityConstants::ERRTEXTXPATH};
	    if ($errTextNode == NULL)
	    {
	        throw new IdsException('HandleErrors error code (UtilityConstants::ERRTEXTXPATH): '.(int)$errCodeNode);
	    }
	
	    $errorText = (string)$errTextNode;
	    $errDetailNode = $responseXml->{UtilityConstants::ERRDETAILXPATH};
	    $errorDetail = $errDetailNode != null ? (string)$errDetailNode : NULL;
	
	    if (!$errorDetail)
	    {
	        throw new IdsException('HandleErrors error code (UtilityConstants::ERRDETAILXPATH): '.(string)$errorDetail);
	    }
	
	    throw new IdsException('HandleErrors error code: '.$errorText);
	}

	
	/**
	 * Validates the input string is a well formatted xml string
	 * @param string inputString Input xml string
	 * @return bool True if 'inputString' is a valid xml
	 */  
	public static function IsValidXml($inputString)
	{
	    if (0!==strpos($inputString, '<'))
	    {
	        return FALSE;
	    }
	
	    try
	    {
	    	$doc = simplexml_load_string($inputString);
	    }
	    catch(Exception $e)
	    {
	        return FALSE;
	    }
	
	    return TRUE;
	}    
}
