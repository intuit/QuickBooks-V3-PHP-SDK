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
require_once('IPPTransaction.php');

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType Transaction
 * @xmlName IPPBillPayment
 * @var IPPBillPayment
 * @xmlDefinition Financial transaction representing a Payment by check issued to pay one or more bills received from 3rd party (vendor) for purchased goods or services. 
 */
class IPPBillPayment
	extends IPPTransaction	{

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
				if (property_exists('IPPBillPayment',$initPropName))
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
	 * @Definition Identifies the party or organization that originated the purchase of the goods, services or BillPayment.
								[b]QuickBooks Notes[/b][br /]
								Valid Vendor Name or Id is required for the create operation for Bill Payment transactions.[br /]
								Required for the create operation.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName VendorRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $VendorRef;
	/**
	 * @Definition Optional AP account specification for bill payment transactions.  Most small businesses have a single AP account, so the account is implied.   When specified, the account must be a liability account - and further, must be of the sub-type "Payables".
								[b]QuickBooks Notes[/b][br /]
								The AP Account should always be specified or a default will be used.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName APAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $APAccountRef;
	/**
	 * @Definition 
								Filterable: QBW
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PayType
	 * @var com\intuit\schema\finance\v3\IPPBillPaymentTypeEnum
	 */
	public $PayType;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CheckPayment
	 * @var com\intuit\schema\finance\v3\IPPBillPaymentCheck
	 */
	public $CheckPayment;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CreditCardPayment
	 * @var com\intuit\schema\finance\v3\IPPBillPaymentCreditCard
	 */
	public $CreditCardPayment;
	/**
	 * @Definition 
								Product: ALL
								Description: The total amount paid, determined by taking the sum of all lines associated.
								InputType: QBW: ReadOnly
								Filterable: QBW
								Sortable: QBW
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TotalAmt
	 * @var float
	 */
	public $TotalAmt;
	/**
	 * @Definition Internal use only: extension place holder for BillPay 
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BillPaymentEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $BillPaymentEx;


} // end class IPPBillPayment
