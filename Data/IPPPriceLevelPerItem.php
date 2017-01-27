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
 * @xmlName IPPPriceLevelPerItem
 * @var IPPPriceLevelPerItem
 * @xmlDefinition 
				Product: QBW
				Description: A custom price or percentage change from the item's base price for a specific price level 
			
 */
class IPPPriceLevelPerItem
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
				if (property_exists('IPPPriceLevelPerItem',$initPropName))
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
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ItemRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ItemRef;
	/**
	 * @Definition 
									Product: QBW
									Description: A specific price for the given item.
								
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CustomPrice
	 * @var float
	 */
	public $CustomPrice;
	/**
	 * @Definition 
									Product: QBW
									Description: Modifies the base selling price of the given item by the specified percentage.  A positive value increases the price, a negative value reduces the price.
								
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CustomPricePercent
	 * @var float
	 */
	public $CustomPricePercent;
	/**
	 * @Definition Internal use only: extension place holder for PriceLevelPerItem  
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PriceLevelPerItemEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $PriceLevelPerItemEx;


} // end class IPPPriceLevelPerItem
