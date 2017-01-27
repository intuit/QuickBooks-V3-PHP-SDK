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

/**
* Base Urls for QBO, QBD and IPP
*/
class BaseUrl
{
	/**
	 * Gets or sets the url for QuickBooks Desktop Rest Service.
	 * @var string 
	 */
    public $Qbd;

	/**
	 * Gets or sets the url for QuickBooks Online Rest Service.
	 * @var string 
	 */
    public $Qbo;

	/**
	 * Gets or sets the url for Platform Rest Service.
	 * @var string 
	 */
    public $Ipp;

	/**
	 * Initializes a new instance of the BaseUrl class.
	 *
	 * @param string $Qbd url for QuickBooks Desktop Rest Service
	 * @param string $Qbo url for QuickBooks Online Rest Service
	 * @param string $Ipp url for Platform Rest Service
	 */
    public function __construct($Qbd=NULL, $Qbo=NULL, $Ipp=NULL)
    {
    	$this->Qbd=$Qbd;
    	$this->Qbo=$Qbo;
    	$this->Ipp=$Ipp;
    }
}