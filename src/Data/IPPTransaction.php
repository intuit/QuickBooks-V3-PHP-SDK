<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPTransaction
 * @var IPPTransaction
 * @xmlDefinition 
				Product: ALL
				Description: Transaction is the base
				class of all transactions.
			
 */
class IPPTransaction
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
				if (property_exists('IPPTransaction',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTransaction',$initPropName))
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
								Description: QBO: Reference number
								for the transaction. If DocNumber is not provided, and the
								Custom Transaction Number is set to "Off", QBO assigns a
								document number using the next-in-sequence algorithm for Sales
								transactions. Otherwise the value will remaing null.
								Alternatively, you can also pass in "AUTO_GENERATE" in this
								field to force QBO to auto-sequence the document number for
								Invoices, Estimates and Sales Receipt.[br /]The maximum length
								for DocNumber is 21 characters. The default value is an empty
								String. Filter support not provided for Payment.
								Description:
								QBW: The primary document number for this transaction. DocNumber
								is exposed to end users.[br /]If it is not provided, QuickBooks
								business logic will assign the document number using the "next
								in sequence" algorithm.[br /]Max. length is 11 characters for
								Payment, Bill, ItemReceipt and VendorCredit. Max. length is 20
								characters for other entities.
								Filterable: QBO
								InputType: ReadWrite
								ValidRange: QBW: max=11
								ValidRange: QBO: max=21
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DocNumber
	 * @var string
	 */
	public $DocNumber;
	/**
	 * @Definition 
								Product: ALL
								Description: QBO: The date entered
								by the user when this transaction occurred. [br /]Often, it is
								the date when the transaction is created in the system. [br
								/]For "posting" transactions, this is the posting date that
								affects the financial statements. If the date is not supplied,
								the current date on the server is used.
								Description: QBW: The
								nominal, user entered, date of the transaction. [br /]Often, but
								not required to be, the date the transaction was created in the
								system. [br /]For "posting" transactions, this is the posting
								date that affects financial statements.
								Filterable: ALL
								Sortable:
								ALL
								InputType: ReadWrite
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TxnDate
	 * @var string
	 */
	public $TxnDate;
	/**
	 * @Definition 
								Product: QBO
								Description: Location of the
								transaction, as defined using location tracking in QuickBooks
								Online.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DepartmentRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $DepartmentRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to the
								Currency in which all amounts on the associated transaction are
								expressed.[br /]
								InputType: ReadWrite
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CurrencyRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $CurrencyRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Currency exchange
								rate. Valid only if the company file is set up to use
								Multi-Currency feature. In QuickBooks, exchange rates are always
								recorded as the number of home currency units it takes to equal
								one foreign currency unit. The foreign unit is always 1 and the
								amount of home units that equal that 1 foreign unit is what
								QuickBooks uses as the exchange rate.
								InputType: ReadWrite
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ExchangeRate
	 * @var float
	 */
	public $ExchangeRate;
	/**
	 * @Definition 
								Product: ALL
								Description: User entered,
								organization-private note about the transaction. This note will
								not appear on the transaction records by default.
								InputType: ReadWrite
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PrivateNote
	 * @var string
	 */
	public $PrivateNote;
	/**
	 * @Definition 
								Product: ALL
								Description: QBW: The status of the
								transaction. Depending on the transaction type it may have
								different values.[br /]For Sales Transactions acceptable values
								are defined in PaymentStatusEnum. For Estimate, the values
								accepted are defined in EstimateStatusEnum.
								Description: QBO: The
								status of the transaction. Depending on the transaction type it
								may have different values.[br /]For Sales Transactions
								acceptable values are defined in PaymentStatusEnum. For
								Estimate, the values accepted are defined in
								QboEstimateStatusEnum.
								Filterable:QBW
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TxnStatus
	 * @var string
	 */
	public $TxnStatus;
	/**
	 * @Definition 
								Product: ALL
								Description: A linked (related)
								transaction. More than one transaction can be linked.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName LinkedTxn
	 * @var com\intuit\schema\finance\v3\IPPLinkedTxn
	 */
	public $LinkedTxn;
	/**
	 * @Definition 
								Product: QBW
								Description: A line item of a
								transaction.
								Product: QBO
								Description: A line item of a
								transaction. QuickBooks Online does not support tax lines in the
								main transaction body, only in the TxnTaxDetail section.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName Line
	 * @var com\intuit\schema\finance\v3\IPPLine
	 */
	public $Line;
	/**
	 * @Definition 
								Product: ALL
								Description: Details of taxes
								charged on the transaction as a whole. For US versions of
								QuickBooks, tax rates used in the detail section must not be
								used in any tax line appearing in the main transaction body. For
								international versions of QuickBooks, the TxnTaxDetail should
								provide the details of all taxes (sales or purchase) calculated
								for the transaction based on the tax codes referenced by the
								transaction. This can be calculated by QuickBooks business logic
								or you may supply it when adding a transaction. For US versions
								of QuickBooks you need only supply the tax code for the customer
								and the tax code (in the case of multiple rates) or tax rate
								(for a single rate) to apply for the transaction as a
								whole.[br]See [a
								href="http://ipp.developer.intuit.com/0010_Intuit_Partner_Platform/0060_Financial_Management_Services_(v3)/01100_Global_Tax_Model"]Global
								Tax Model[/a].
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TxnTaxDetail
	 * @var com\intuit\schema\finance\v3\IPPTxnTaxDetail
	 */
	public $TxnTaxDetail;
	/**
	 * @Definition 
								Product: QBO
								Description: Originating source of
								the Transaction. Valid values are defined in TxnSourceEnum:
								QBMobile.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TxnSource
	 * @var string
	 */
	public $TxnSource;
	/**
	 * @Definition 
								Description: refer TaxFormTypeEnum. Tax Form Type holds data related to Tax
								Information, values based on
								regional compliance laws. Applicable for IN Region and can be extended
								for other Regions.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxFormType
	 * @var string
	 */
	public $TaxFormType;
	/**
	 * @Definition 
								Description: Tax Form Num holds data related to Tax Information based on
								Regional compliance laws.This is applicable for IN region and
								can be extended to other regions in future.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxFormNum
	 * @var string
	 */
	public $TaxFormNum;
	/**
	 * @Definition 
								Product: QBO
								Description: Location of the purchase or sale transaction. The applicable
								values are those exposed through the
								TransactionLocationTypeEnum. This is currently applicable only
								for the FR region.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TransactionLocationType
	 * @var string
	 */
	public $TransactionLocationType;
	/**
	 * @Definition 
								Product: QBO
								Descripton: List of tags used to identify the transaction.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName Tag
	 * @var com\intuit\schema\finance\v3\IPPTag
	 */
	public $Tag;
	/**
	 * @Definition 
                                    Product: QBO
                                    Description: Details of the Approval Status for current transaction in QBO workflows.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TxnApprovalInfo
	 * @var com\intuit\schema\finance\v3\IPPTxnApprovalInfo
	 */
	public $TxnApprovalInfo;
	/**
	 * @Definition 
								Product: QBO
								Description: Reference to the
								RecurTemplate which was used to create the Transaction
								InputType: Read
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RecurDataRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $RecurDataRef;
	/**
	 * @Definition 
								Product: QBO
								Description: The Recurring Schedule information for the Transaction
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RecurringInfo
	 * @var com\intuit\schema\finance\v3\IPPRecurringInfo
	 */
	public $RecurringInfo;


} // end class IPPTransaction
