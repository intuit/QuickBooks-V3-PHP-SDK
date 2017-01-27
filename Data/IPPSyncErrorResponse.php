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
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPSyncErrorResponse
 * @var IPPSyncErrorResponse
 * @xmlDefinition 
                Product: QBW
                Description: Provides a wrapper for SyncError for Conflict API Response
                Consists of list of SyncError objects
             
 */
class IPPSyncErrorResponse
	{

		/**                                                                       
		* Initializes this object, optionally with pre-defined property values    
		*                                                                         
		* Initializes this object and it's property members, using the dictionary
		* of key/value pairs passed as an optional argument.                      
		*                                                                         
		* @param dictionary $keyValInitializers key/value pairs to be populated into object's properties 
		* @param boolean $verbose specifies whether object should echo warnings   
		*/                                                                        
		public function __construct($keyValInitializers=array(), $verbose=FALSE)
		{
			foreach($keyValInitializers as $initPropName => $initPropVal)
			{
				if (property_exists('IPPSyncErrorResponse',$initPropName))
				{
					$this->{$initPropName} = $initPropVal;
				}
				else
				{
					if ($verbose)
						echo "Property does not exist ($initPropName) in class (".get_class($this).")";
				}
			}
		}

	
	/**
	 * @Definition 
                        Product:QBW
                        Description: Wrapper of both types of Objects CloudVersion and QBVersion of objects
                        If there are multiple errored objects you will get a list of errored objects
                    
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName SyncError
	 * @var com\intuit\schema\finance\v3\IPPSyncError
	 */
	public $SyncError;
	/**
	 * @Definition 
		           		Product: QBW
		           		Description: Specifies the latest time when Upload happened.
		           
	 * @xmlType attribute
	 * @xmlName latestUploadTime
	 * @var string
	 */
	public $latestUploadTime;
	/**
	 * @Definition Specifies the starting row number in this result
	 * @xmlType attribute
	 * @xmlName startPosition
	 * @var integer
	 */
	public $startPosition;
	/**
	 * @Definition Specifies the number of records in this result 
	 * @xmlType attribute
	 * @xmlName maxResults
	 * @var integer
	 */
	public $maxResults;
	/**
	 * @Definition Specifies the total count of records that satisfy the filter condition 
	 * @xmlType attribute
	 * @xmlName totalCount
	 * @var integer
	 */
	public $totalCount;


} // end class IPPSyncErrorResponse
