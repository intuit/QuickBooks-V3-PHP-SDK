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

require_once(PATH_SDK_ROOT . 'Exception/IdsException.php');

/**
 * Manages all the exceptions thrown to the user.
 */
class IdsExceptionManager
{
	/**
	 * Handles exception thrown to the user.
	 * @param string errorMessage Error Message
	 */
	public static function HandleExceptionMessage($errorMessage)
	{
	    throw new IdsException($errorMessage);
	}
	
	/**
	 * Handles Exception thrown to the user.
	 * @param IdsException idsException Ids Exception
	 */
	public static function HandleExceptionObject($idsException)
	{
	    throw $idsException;
	}
	
	/**
	 * Handles Exception thrown to the user.
	 * @param string errorMessage Error Message
	 * @param string errorCode Error Code.
	 * @param string source Source of the exception.
	 * @param IdsException innerException Ids Exception
	 */
	public static function HandleException($errorMessage=NULL, $errorCode=NULL, $source=NULL, $innerException=NULL)
	{
		$message = implode(", ", array($errorMessage, $errorCode, $source));
		throw new IdsException($message);
	}    
    
}

?>
