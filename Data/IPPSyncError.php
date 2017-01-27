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
 * @xmlName IPPSyncError
 * @var IPPSyncError
 * @xmlDefinition 
                Product: QBW
                Description: Wrapper object for specifying both version of the objects
                If there is any warnings on a object basis that is also send back
                This object is output object only
            
 */
class IPPSyncError
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
				if (property_exists('IPPSyncError',$initPropName))
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
	 * @Definition Indicates the type of error that happened in the sync to desktop
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName Error
	 * @var com\intuit\schema\finance\v3\IPPError
	 */
	public $Error;
	/**
	 * @Definition 
                        Product: QBW
                        Description: Indicates the cloud version of the synced object
                    
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName CloudVersion
	 * @var com\intuit\schema\finance\v3\IPPSyncObject
	 */
	public $CloudVersion;
	/**
	 * @Definition 
                        Product: QBW
                        Description: Indicates the QB version of the synced object
                    
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName QBVersion
	 * @var com\intuit\schema\finance\v3\IPPSyncObject
	 */
	public $QBVersion;
	/**
	 * @Definition 
                    Product: QBW
                    Description: Indicates error type of entity. The value must correspond to SyncErrorType.
                
	 * @xmlType attribute
	 * @xmlName Type
	 * @var string
	 */
	public $Type;
	/**
	 * @Definition 
                    Product: ALL
                    Description: Indicates the apptoken of the entity.
                
	 * @xmlType attribute
	 * @xmlName AppToken
	 * @var string
	 */
	public $AppToken;


} // end class IPPSyncError
