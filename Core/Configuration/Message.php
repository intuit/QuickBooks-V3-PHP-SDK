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

require_once(PATH_SDK_ROOT . 'Core/Configuration/Request.php');
require_once(PATH_SDK_ROOT . 'Core/Configuration/Response.php');

/**
 * Contains properties about the Request and Response configuration settings.
 */
class Message
{
	/**
	 * Request configuration settings
	 * @var Request 
	 */
	public $Request;

	/**
	 * Response configuration settings
	 * @var Response 
	 */
	public $Response;
	
	/**
	 * Initializes a new instance of the Message class.
	 *
	 * @param Request $Request Request configuration settings
	 * @param Response $Response Response configuration settings
	 */
	public function __construct($Request=NULL, $Response=NULL)
	{
		$this->Request = $Request;
		$this->Response = $Response;
	}
}
