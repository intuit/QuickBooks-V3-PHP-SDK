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
require_once('IPPItemLineDetail.php');

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType ItemLineDetail
 * @xmlName IPPSalesItemLineDetail
 * @var IPPSalesItemLineDetail
 * @xmlDefinition 
				Product: ALL
				Description: SalesItem detail for a transaction line.
			
 */
class IPPSalesItemLineDetail
	extends IPPItemLineDetail	{

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
				if (property_exists('IPPSalesItemLineDetail',$initPropName))
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
								Description: Date when the service is performed.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ServiceDate
	 * @var string
	 */
	public $ServiceDate;
	/**
	 * @Definition 
								Product: QBO
								Description: Indicates the total amount of line item including tax.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxInclusiveAmt
	 * @var float
	 */
	public $TaxInclusiveAmt;
	/**
	 * @Definition 
                                Product: QBO
                                Description: Indicates the discount rate that is applied on this line.
                            
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DiscountRate
	 * @var float
	 */
	public $DiscountRate;
	/**
	 * @Definition 
                                Product: QBO
                                Description: Indicates the discount amount that is applied on this line.
                            
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DiscountAmt
	 * @var float
	 */
	public $DiscountAmt;
	/**
	 * @Definition 
								Product: ALL
								Description: Internal use only: extension place holder for SalesItemDetail
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SalesItemLineDetailEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $SalesItemLineDetailEx;


} // end class IPPSalesItemLineDetail
