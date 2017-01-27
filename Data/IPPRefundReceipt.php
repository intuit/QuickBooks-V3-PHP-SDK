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
require_once('IPPSalesTransaction.php');

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType SalesTransaction
 * @xmlName IPPRefundReceipt
 * @var IPPRefundReceipt
 * @xmlDefinition Financial transaction representing a refund (or credit) of payment or part of a payment for goods or services that have been sold.
 */
class IPPRefundReceipt
	extends IPPSalesTransaction	{

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
				if (property_exists('IPPRefundReceipt',$initPropName))
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
	 * @Definition Indicates the total credit amount still available to apply towards the payment.
								[b]QuickBooks Notes[/b][br /]
								Non QB-writable.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RemainingCredit
	 * @var float
	 */
	public $RemainingCredit;
	/**
	 * @Definition Internal use only: extension place holder for Refund  
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RefundReceiptEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $RefundReceiptEx;


} // end class IPPRefundReceipt
