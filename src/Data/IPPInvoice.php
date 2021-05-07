<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType SalesTransaction
 * @xmlName IPPInvoice
 * @var IPPInvoice
 * @xmlDefinition 
				Product: QBO
				Description: The Invoice entity
				represents an invoice to a customer. Invoice could be based on
				salesterm with invoice and due dates for payment. Invoice supports
				sales tax, and shipping charges as a special line item. Invoice can
				be printed and emailed to a customer.
				Business Rules: [li] An invoice
				must have at least one line that describes the item and an
				amount.[/li][li] An invoice must have a reference to a customer in
				the header.[/li]
				Product: QBW
				Description: An Invoice is a financial transaction representing
				a request for payment for goods or services that have been sold. An
				invoice is a form that records the details of a customer's purchase,
				such as quantity and price of the goods or services. An invoice
				records the amount owed by a customer who does not pay in full at
				the time of purchase. If full payment is received at the time of
				purchase, the sale may be recorded as a sales receipt, not an
				invoice. An invoice must contain a valid customer reference in the
				CustomerId field and at least one line item. The referenced customer
				must already exist in the QuickBooks company at the desktop and any
				line items must also already exists in the QuickBooks company, or
				the attempt to sync will fail.[br /]In general, it is a good
				practice to specify all the header fields if you have the data. You
				should always specify the ARAccountId; otherwise a default AR
				account will be used and this may give you unexpected results.[/br]
				If you want to apply one tax to all the transaction line items, use
				the TaxId or TaxGroupId field. If you want to use more than one tax,
				you need to use Tax Line items instead.
				Business Rules: [li] An
				invoice must have at least one line that describes the item.
				[/li][li] If an account is specified in the header, the account must
				be of the Accounts Receivable (AR) type. [/li][li] An invoice must
				have a reference to a customer in the header.[/li]
			
 */
class IPPInvoice
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
				if (property_exists('IPPInvoice',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPInvoice',$initPropName))
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
								Description: Amount in deposit
								against the Invoice. Supported for Invoice only.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName Deposit
	 * @var float
	 */
	public $Deposit;
	/**
	 * @Definition 
								Product: QBO
								Description: Specifies whether
								customer is allowed to use IPN to pay the Invoice
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AllowIPNPayment
	 * @var boolean
	 */
	public $AllowIPNPayment;
	/**
	 * @Definition 
								Product: QBO
								Description: Specifies whether
								customer is allowed to use eInvoicing(online payment) to pay the
								Invoice
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AllowOnlinePayment
	 * @var boolean
	 */
	public $AllowOnlinePayment;
	/**
	 * @Definition 
								Product: QBO
								Description: Specifies whether
								customer is allowed to use eInvoicing(online payment -credit
								card) to pay the Invoice
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AllowOnlineCreditCardPayment
	 * @var boolean
	 */
	public $AllowOnlineCreditCardPayment;
	/**
	 * @Definition 
								Product: QBO
								Description: Specifies whether
								customer is allowed to use eInvoicing(online payment -bank or
								ach) to pay the Invoice
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AllowOnlineACHPayment
	 * @var boolean
	 */
	public $AllowOnlineACHPayment;
	/**
	 * @Definition 
								Product: QBO
								Description: Specifies the eInvoice
								Status(SENT, VIEWED, PAID) for the invoice
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EInvoiceStatus
	 * @var com\intuit\schema\finance\v3\IPPETransactionStatusEnum
	 */
	public $EInvoiceStatus;
	/**
	 * @Definition 
								Product: QBO
								Description: Specifies the
								eCloudStatus timeStamp(last Viewed/Sent/paid) for the invoice
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ECloudStatusTimeStamp
	 * @var string
	 */
	public $ECloudStatusTimeStamp;
	/**
	 * @Definition 
								Product: QBO
								Description: provides invoice statuses :
								MULTIPLE_ERRORS, DEPOSIT_ON_HOLD, DISPUTED, DEPOSIT_FAILED, PAYMENT_FAILED,
								OVERDUE_VIEWED, OVERDUE_NOT_SENT, OVERDUE_SENT,
								DUE_VIEWED, DUE_NOT_SENT, DUE_SENT,
								PAID_NOT_DEPOSITED, PARTIALLY_PAID, DEPOSITED, VOIDED, REVERSED
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName invoiceStatus
	 * @var string
	 */
	public $invoiceStatus;
	/**
	 * @Definition 
								Product: QBO
								Description: call to action for this status
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName callToAction
	 * @var string
	 */
	public $callToAction;
	/**
	 * @Definition 
								Product: QBO
								Description: invoice status log
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName invoiceStatusLog
	 * @var com\intuit\schema\finance\v3\IPPStatusInfo
	 */
	public $invoiceStatusLog;
	/**
	 * @Definition 
								Product: ALL
								Description: Extension entity for
								Invoice.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName InvoiceEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $InvoiceEx;
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
								Product: All
								Description: QBO:  Sharable link of the invoice for external users
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName InvoiceLink
	 * @var string
	 */
	public $InvoiceLink;
	/**
	 * @Definition 
								Product: QBO
								Description: QBO:  Message displayed to customer about payment Instructions. eg: bank account info.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PaymentDetailsMessage
	 * @var string
	 */
	public $PaymentDetailsMessage;
	/**
	 * @Definition 
								Product: QBO
								Description: Internal use only: Convenience Fee detail for the invoice
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ConvenienceFeeDetail
	 * @var com\intuit\schema\finance\v3\IPPConvenienceFeeDetail
	 */
	public $ConvenienceFeeDetail;
	/**
	 * @Definition 
								Product: All
								Description: QBO:  Security code associated with Sharable link of the invoice for external users
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName InvoiceLinkSecurityCode
	 * @var string
	 */
	public $InvoiceLinkSecurityCode;
	/**
	 * @Definition 
								Product: All
								Description: QBO:  Expiry date for Sharable link of the invoice for external users
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName InvoiceLinkExpiryDate
	 * @var string
	 */
	public $InvoiceLinkExpiryDate;
	/**
	 * @Definition 
								Product: QBO
								Description: Indicates whether the Recurring Invoice eligible for auto payment.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AutoPayEligible
	 * @var boolean
	 */
	public $AutoPayEligible;
	/**
	 * @Definition 
								Product: QBO
								Description: Indicates whether the Non-Recurring Invoice eligible for scheduled payment.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SchedulePayEligible
	 * @var boolean
	 */
	public $SchedulePayEligible;


} // end class IPPInvoice
