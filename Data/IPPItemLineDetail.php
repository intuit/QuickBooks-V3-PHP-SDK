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
 * @xmlName IPPItemLineDetail
 * @var IPPItemLineDetail
 * @xmlDefinition 
				Product: ALL
				Description: Information about the goods sold: what is sold, how much/many and for what price.
			
 */
class IPPItemLineDetail
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
				if (property_exists('IPPItemLineDetail',$initPropName))
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
						Product: ALL
						Description: Reference to the Item. When a line lacks an ItemRef it will be treated as "documentation" and the Amount will be ignored.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ItemRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ItemRef;
	/**
	 * @Definition 
						Product: ALL
						Description: Reference to the Class for the line item.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ClassRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ClassRef;
	/**
	 * @Definition 
							Product: ALL
							Description: Unit price of the service or item for the line.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName UnitPrice
	 * @var float
	 */
	public $UnitPrice;
	/**
	 * @Definition 
							Product: ALL
							Description: The amount is expressed as a percent of charges already entered in the current transaction. To enter a rate of 10% use 10.0, not 0.01.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RatePercent
	 * @var float
	 */
	public $RatePercent;
	/**
	 * @Definition 
							Product: ALL
							Description: Reference to the PriceLevel of the service or item for the line.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PriceLevelRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $PriceLevelRef;
	/**
	 * @Definition 
						Product: ALL
						Description: Markup information for the Item wherever applicable.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MarkupInfo
	 * @var com\intuit\schema\finance\v3\IPPMarkupInfo
	 */
	public $MarkupInfo;
	/**
	 * @Definition 
						Product: ALL
						Description: Number of items for the line.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Qty
	 * @var float
	 */
	public $Qty;
	/**
	 * @Definition 
						Product: ALL
						Description: Reference to the UOMSetREf (unit of mesasure set) that applies to this item.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName UOMRef
	 * @var com\intuit\schema\finance\v3\IPPUOMRef
	 */
	public $UOMRef;
	/**
	 * @Definition 
						Product: ALL
						Description: An account different than the account associated with the Item in the current transaction line.  Cannot be updated or modified.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ItemAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ItemAccountRef;
	/**
	 * @Definition 
						Product: ALL
						Description: Reference to the InventorySite where this item is located.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName InventorySiteRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $InventorySiteRef;
	/**
	 * @Definition 
						Product: ALL
						Description: Reference to the SalesTaxCode for this item.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxCodeRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $TaxCodeRef;


} // end class IPPItemLineDetail
