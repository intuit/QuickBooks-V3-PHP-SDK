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
 * This class processes the CDC request.
 */
class IntuitCDCResponse
{
	/**
	 * list of entities.
	 * @var array entities
	 */
    public $entities;

	/**
	 * IdsException in case of ResponseType is exception.
	 * @var array exceptions
	 */
    public $exceptions;

	/**
	 * Initializes a new instance of the IntuitBatchResponse class.
	 */
    public function __construct()
    {
        $this->entities = array();
        $this->exceptions = array();
    }

	/**
	 * Gets the List of entity value with particular key
	 * @var string key
	 */
    public function getEntity($key)
    {
    	foreach($this->entities as $entityKey => $entityVal)
    	{
    		if ($entityKey==$key)
    			return $entityVal;
    	}
    	return NULL;
    }
}
