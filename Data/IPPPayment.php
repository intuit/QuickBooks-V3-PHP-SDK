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
 * @xmlName IPPPayment
 * @var IPPPayment
 * @xmlDefinition Financial transaction representing a payment from a customer applied to one or more sales transactions 
 */
class IPPPayment
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
				if (property_exists('IPPPayment',$initPropName))
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
								Description: Represents Customer (or Job)Reference
								Filterable: QBW
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CustomerRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $CustomerRef;
	/**
	 * @Definition Identifies the party or location that the payment is to be remitted to or sent to.
								[b]QuickBooks Notes[/b][br /]
								Non QB-writable.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RemitToRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $RemitToRef;
	/**
	 * @Definition ARAccountReferenceGroup Identifies the AR Account to be used for this Payment.
								[b]QuickBooks Notes[/b][br /]
								The AR Account should always be specified or a default will be used.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ARAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ARAccountRef;
	/**
	 * @Definition Optional asset account specification to designate the account the payment money needs to be deposited to.
								[b]QuickBooks Notes[/b][br /]
								If not specified, the Undeposited Funds account will be used.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DepositToAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $DepositToAccountRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to the PaymentMethod.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PaymentMethodRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $PaymentMethodRef;
	/**
	 * @Definition 
								Product: ALL
								Description: The reference number for the payment received (I.e. Check # for a check, envelope # for a cash donation, CreditCardTransactionID for a credit card payment)
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PaymentRefNum
	 * @var string
	 */
	public $PaymentRefNum;
	/**
	 * @Definition  
								Product: ALL
								Description: Valid values are Cash, Check, CreditCard, or Other. No defaults. Cash based expense is not supported by QuickBooks Windows. Not applicable to Estimate and SalesOrder.[br /]
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PaymentType
	 * @var com\intuit\schema\finance\v3\IPPPaymentTypeEnum
	 */
	public $PaymentType;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CheckPayment
	 * @var com\intuit\schema\finance\v3\IPPCheckPayment
	 */
	public $CheckPayment;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CreditCardPayment
	 * @var com\intuit\schema\finance\v3\IPPCreditCardPayment
	 */
	public $CreditCardPayment;
	/**
	 * @Definition 
								Product: ALL
								Description: Indicates the total amount of the entity associated. This includes the total of all the payments from the Payment Details.
								[b]QuickBooks Notes[/b][br /]
								Non QB-writable.
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
	 * @Definition Indicates the amount that has not been applied to pay amounts owed for sales transactions.
								[b]QuickBooks Notes[/b][br /]
								Non QB-writable.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName UnappliedAmt
	 * @var float
	 */
	public $UnappliedAmt;
	/**
	 * @Definition Indicates that the payment should be processed by merchant account service. Valid for QBO companies with credit card processing.
								QBO only field.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ProcessPayment
	 * @var boolean
	 */
	public $ProcessPayment;
	/**
	 * @Definition Internal use only: extension place holder for Payment 
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PaymentEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $PaymentEx;


} // end class IPPPayment
