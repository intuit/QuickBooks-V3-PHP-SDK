<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType Transaction
 * @xmlName IPPVendorPrepayment
 * @var IPPVendorPrepayment
 * @xmlDefinition 
				Product: QBO
				Description: An AP transaction representing a prepayment (advance
				payment) made to a vendor that is not yet applied against a Bill.
				This transaction has no lines; it records the vendor, the
				account the payment was drawn from, the payment amount and its
				unapplied balance.
			
 */
class IPPVendorPrepayment
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
				if (property_exists('IPPVendorPrepayment',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPVendorPrepayment',$initPropName))
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
								Description: Specifies the vendor to whom the prepayment was made.
								Required for the create operation.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName VendorRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $VendorRef;
	/**
	 * @Definition 
								Product: QBO
								Description: The account that the prepayment was drawn from.
								This is typically a bank account, but may be a credit card or
								other asset/liability account depending on how the prepayment
								was funded.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $AccountRef;
	/**
	 * @Definition 
								Product: QBO
								Description: The reference number for the payment (e.g. Check #
								for a check payment).
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PaymentRefNum
	 * @var string
	 */
	public $PaymentRefNum;
	/**
	 * @Definition 
								Product: QBO
								Description: The total amount of the prepayment made to the vendor.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TotalAmt
	 * @var float
	 */
	public $TotalAmt;
	/**
	 * @Definition 
								Product: QBO
								Description: The unapplied amount of the prepayment. When fully
								applied against bills, balance will be zero.
								[b]QuickBooks Notes[/b][br /]
								Non QB-writable.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Balance
	 * @var float
	 */
	public $Balance;
	/**
	 * @Definition 
								Product: QBO
								Description: The unapplied amount of the prepayment in home
								currency. Available only for companies where multicurrency is
								enabled. When fully applied, home balance will be zero.
								[b]QuickBooks Notes[/b][br /]
								Non QB-writable.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName HomeBalance
	 * @var float
	 */
	public $HomeBalance;
	/**
	 * @Definition 
								Product: QBO
								Description: Vendor Mailing Address.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName VendorAddr
	 * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
	 */
	public $VendorAddr;
	/**
	 * @Definition Internal use only: extension place holder for
								VendorPrepayment.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName VendorPrepaymentEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $VendorPrepaymentEx;


} // end class IPPVendorPrepayment
