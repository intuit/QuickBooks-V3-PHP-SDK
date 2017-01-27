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

require_once(PATH_SDK_ROOT . 'Core/CoreHelper.php');
require_once(PATH_SDK_ROOT . 'Core/RestCalls/Compression/DataCompressionFormat.php');
require_once(PATH_SDK_ROOT . 'Core/RestCalls/Compression/GZipCompressor.php');
require_once(PATH_SDK_ROOT . 'Core/RestCalls/Compression/DeflateCompressor.php');

/**
 * Rest Handler class.
 */	       
 class RestHandler {

	/**
	 * The contex
	 * @var ServiceContext 
	 */	     
    private $serviceContext;

	/**
	 * Response serializer.
	 * @var IEntitySerializer 
	 */	     
    private $ResponseSerializer;

	/**
	 * Gets or sets Request compressor.
	 * @var ICompressor
	 */	     
    private $RequestCompressor;

	/**
	 * Gets or sets Response compressor.
	 * @var ICompressor
	 */	     
    private $ResponseCompressor;

	/**
	 * Gets or sets Request serializer.
	 * @var IEntitySerializer
	 */	     
    private $RequestSerializer;

	/**
	 * Initializes a new instance of the RestHandler class.
	 *
	 * @param ServiceContext $context The Service Context
	 */	
    protected function __construct($context)
    {
        $this->serviceContext = $context;
		$this->RequestCompressor = CoreHelper::GetCompressor($this->serviceContext, true);
		$this->ResponseCompressor = CoreHelper::GetCompressor($this->serviceContext, false);
		$this->RequestSerializer = CoreHelper::GetSerializer($this->serviceContext, true);
		$this->ResponseSerializer = CoreHelper::GetSerializer($this->serviceContext, false);
        $this->RequestLogging = CoreHelper::GetRequestLogging($this->serviceContext);
    }	
}


?>
