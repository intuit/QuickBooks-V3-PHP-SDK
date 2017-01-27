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
require_once('IPPIntuitEntity.php');

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPSyncActivity
 * @var IPPSyncActivity
 * @xmlDefinition 
       			 Product: QBW
        		 Description: Provides upload/writeback activity for a given period of time. Query activity using 
        		 			  StartSyncTMS OR EndSyncTMS
      		
 */
class IPPSyncActivity
	extends IPPIntuitEntity	{

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
				if (property_exists('IPPSyncActivity',$initPropName))
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
            				 Description: indicates when the data sync upload or write back started
          				
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName LatestUploadDateTime
	 * @var string
	 */
	public $LatestUploadDateTime;
	/**
	 * @Definition 
            				Product: QBW
            				Description: indicates when the data sync upload or write back completed
          				
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName LatestWriteBackDateTime
	 * @var string
	 */
	public $LatestWriteBackDateTime;
	/**
	 * @Definition 
            				Product: QBW
            				Description: can be either Upload or Write back sync type
          				
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SyncType
	 * @var com\intuit\schema\finance\v3\IPPSyncType
	 */
	public $SyncType;
	/**
	 * @Definition 
            				Product: QBW
            				Description: indicates when the data sync upload or write back started
            				Filterable: QBW
          				
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName StartSyncTMS
	 * @var string
	 */
	public $StartSyncTMS;
	/**
	 * @Definition 
            				Product: QBW
            				Description: indicates when the data sync upload or write back completed
            				Filterable: QBW
          				
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EndSyncTMS
	 * @var string
	 */
	public $EndSyncTMS;
	/**
	 * @Definition 
            				Product: QBW
            				Description: name of the entity that is part of the data sync
          				
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EntityName
	 * @var string
	 */
	public $EntityName;
	/**
	 * @Definition 
            				Product: QBW
            				Description: number of rows of this entity that have been uploaded or written back to QB
          				
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EntityRowCount
	 * @var integer
	 */
	public $EntityRowCount;


} // end class IPPSyncActivity
