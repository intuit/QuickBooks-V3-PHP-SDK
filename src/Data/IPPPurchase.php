<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType Transaction
 * @xmlName IPPPurchase
 * @var IPPPurchase
 * @xmlDefinition The reference to the purchase transaction which
								is being paid by this check.
								[b]QuickBooks Notes[/b][br /]
								[i]Unsupported field.[/i]
							
 */
class IPPPurchase
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
				if (property_exists('IPPPurchase',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPPurchase',$initPropName))
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
	 * @Definition Specifies the account reference. Check should
								have bank account, CreditCard should specify credit card account
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $AccountRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to the
								PaymentMethod.
							
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
								Description: The reference number
								for the payment received (I.e. Check # for a check, envelope #
								for a cash donation, CreditCardTransactionID for a credit card
								payment)
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PaymentRefNum
	 * @var string
	 */
	public $PaymentRefNum;
	/**
	 * @Definition  Required element. No defaults. Expense Type
								can be Cash, Check or CreditCard
								Cash based expense is not
								supported by QBW.
								Filterable: QBW
							
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
	 * @Definition Specifies the party to whom a expense is
								associated with. Can be Customer, Vendor, Employee (or OtherName
								in case of QBW)
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EntityRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $EntityRef;
	/**
	 * @Definition If Credit is Null or False, it is considered as
								Charge. If true, the CreditCard represents a Refund. Valid only
								for CreditCard transaction
								Filterable: QBW
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Credit
	 * @var boolean
	 */
	public $Credit;
	/**
	 * @Definition Address to which the payment should be
								sent.Output only.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RemitToAddr
	 * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
	 */
	public $RemitToAddr;
	/**
	 * @Definition The total amount due, determined by taking the
								sum of all lines associated. This includes all charges,
								allowances, taxes, discounts, etc...
								[b]QuickBooks Notes[/b][br
								/]
								Non QB-writable.
								Output only field in case of QBO
								Filterable:
								QBW
								Sortable: QBW
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TotalAmt
	 * @var float
	 */
	public $TotalAmt;
	/**
	 * @Definition Memo that will be printed in check in case of
								Check purchase, Memo appears on the expense report for
								CreditCard, Memo for CashPurchase
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Memo
	 * @var string
	 */
	public $Memo;
	/**
	 * @Definition PrintStatus if to be printed or already printed
								information
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PrintStatus
	 * @var com\intuit\schema\finance\v3\IPPPrintStatusEnum
	 */
	public $PrintStatus;
	/**
	 * @Definition 
								Product: QBO
								Description: Indicates the
								GlobalTax model if the model inclusive of tax, exclusive of
								taxes or not applicable
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName GlobalTaxCalculation
	 * @var com\intuit\schema\finance\v3\IPPGlobalTaxCalculationEnum
	 */
	public $GlobalTaxCalculation;
	/**
	 * @Definition Internal use only: extension place holder for
								Purchase.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PurchaseEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $PurchaseEx;
	/**
	 * @Definition 
								Product: All
								Description: QBO: Indicates the
								less cis amount of the transaction, specific to UK region companies
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName LessCIS
	 * @var float
	 */
	public $LessCIS;
	/**
	 * @Definition 
								Product: QBO Only
								Description: True if the Purchase should be included in annual TPAR, specific to AU region.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName IncludeInAnnualTPAR
	 * @var boolean
	 */
	public $IncludeInAnnualTPAR;


} // end class IPPPurchase
