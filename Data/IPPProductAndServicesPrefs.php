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
 * @xmlName IPPProductAndServicesPrefs
 * @var IPPProductAndServicesPrefs
 * @xmlDefinition Defines Product and Services Prefs details 
 */
class IPPProductAndServicesPrefs
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
				if (property_exists('IPPProductAndServicesPrefs',$initPropName))
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
						Product:QBO
						ProductAndServices for Sales enabled
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ForSales
	 * @var boolean
	 */
	public $ForSales;
	/**
	 * @Definition 
						Product:QBO
						ProductAndServices for purchases enabled
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ForPurchase
	 * @var boolean
	 */
	public $ForPurchase;
	/**
	 * @Definition 
						Product:QBW
						Inventory and PO are active
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName InventoryAndPurchaseOrder
	 * @var boolean
	 */
	public $InventoryAndPurchaseOrder;
	/**
	 * @Definition 
						Product:QBO
						Enable quantity with price and rate enabled
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName QuantityWithPriceAndRate
	 * @var boolean
	 */
	public $QuantityWithPriceAndRate;
	/**
	 * @Definition 
						Product:QBO
						Enable QuantityOnHand enabled
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName QuantityOnHand
	 * @var boolean
	 */
	public $QuantityOnHand;
	/**
	 * @Definition Product:QBW. Possible values are Disabled,SinglePerItem and MultiplePerItem
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName UOM
	 * @var com\intuit\schema\finance\v3\IPPUOMFeatureTypeEnum
	 */
	public $UOM;


} // end class IPPProductAndServicesPrefs
