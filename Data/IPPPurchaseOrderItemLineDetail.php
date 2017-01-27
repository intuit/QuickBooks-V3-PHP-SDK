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
require_once('IPPSalesItemLineDetail.php');

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType SalesItemLineDetail
 * @xmlName IPPPurchaseOrderItemLineDetail
 * @var IPPPurchaseOrderItemLineDetail
 * @xmlDefinition 
				Product: ALL
				Description: PurchaseOrder item detail for a transaction line.
			
 */
class IPPPurchaseOrderItemLineDetail
	extends IPPSalesItemLineDetail	{

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
				if (property_exists('IPPPurchaseOrderItemLineDetail',$initPropName))
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
								Description: The identifier provided by manufacturer for the Item. For example, the model number.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ManPartNum
	 * @var string
	 */
	public $ManPartNum;
	/**
	 * @Definition 
								Product: ALL
								Description: The item on the line is marked as if fully receiveded, but it is closed as no longer available.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ManuallyClosed
	 * @var boolean
	 */
	public $ManuallyClosed;
	/**
	 * @Definition 
								Product: ALL
								Description: Represents the difference between the quantity ordered and actually received.[br /]Cannot be written to QuickBooks.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName OpenQty
	 * @var float
	 */
	public $OpenQty;
	/**
	 * @Definition 
								Product: ALL
								Description: Internal use only: extension place holder for PurchaseOrderItemDetail
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PurchaseOrderItemLineDetailEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $PurchaseOrderItemLineDetailEx;


} // end class IPPPurchaseOrderItemLineDetail
