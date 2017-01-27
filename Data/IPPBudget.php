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
 * @xmlName IPPBudget
 * @var IPPBudget
 * @xmlDefinition Describes Budget specifications
 */
class IPPBudget
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
				if (property_exists('IPPBudget',$initPropName))
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
                                                                Product: QBO
                                                                Description: Name of the budget                                                             
                                                        
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName Name
	 * @var string
	 */
	public $Name;
	/**
	 * @Definition 
                                                                Product: QBO
                                                                Description: Starting date of the budget                                                                
                                                        
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName StartDate
	 * @var string
	 */
	public $StartDate;
	/**
	 * @Definition 
                                                                Product: QBO
                                                                Description: End date of the budget                                                            
                                                        
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName EndDate
	 * @var string
	 */
	public $EndDate;
	/**
	 * @Definition 
                                                                Product: QBO
                                                                Description: Budget Type                                                            
                                                        
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName BudgetType
	 * @var com\intuit\schema\finance\v3\IPPBudgetTypeEnum
	 */
	public $BudgetType;
	/**
	 * @Definition 
                                                                Product: QBO
                                                                Description: Budget Entry Type                                                            
                                                        
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName BudgetEntryType
	 * @var com\intuit\schema\finance\v3\IPPBudgetEntryTypeEnum
	 */
	public $BudgetEntryType;
	/**
	 * @Definition 
                                                                Product: QBO
                                                                Description: Active budget or inactive                                                            
                                                        
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName Active
	 * @var boolean
	 */
	public $Active;
	/**
	 * @Definition 
                                                                Product: QBO
                                                                Description: Budget details are here                                                                
                                                        
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName BudgetDetail
	 * @var com\intuit\schema\finance\v3\IPPBudgetDetail
	 */
	public $BudgetDetail;


} // end class IPPBudget
