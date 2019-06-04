<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType Transaction
 * @xmlName IPPChargeCredit
 * @var IPPChargeCredit
 * @xmlDefinition Financial transaction representing a request for
				credit on payment for
				goods or services that have been sold.
			
 */
class IPPChargeCredit
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
				if (property_exists('IPPChargeCredit',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPChargeCredit',$initPropName))
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
	 * @Definition If Credit is Null or False, it is considered as
								Charge. If true, the ChargeCredit represents a Refund
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Credit
	 * @var boolean
	 */
	public $Credit;
	/**
	 * @Definition Represents Customer (or Job)Reference
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CustomerRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $CustomerRef;
	/**
	 * @Definition Identifies the party or location that the
								payment is
								to be remitted to or sent to. [b]QuickBooks
								Notes[/b][br /] Non
								QB-writable.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RemitToRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $RemitToRef;
	/**
	 * @Definition ARAccountReferenceGroup Identifies the AR
								Account to
								be used for this Credit Memo. [b]QuickBooks
								Notes[/b][br /] The AR
								Account should always be specified or a
								default will be used.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ARAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ARAccountRef;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ClassRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ClassRef;
	/**
	 * @Definition Date when the Charge is to be paid.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DueDate
	 * @var string
	 */
	public $DueDate;
	/**
	 * @Definition Date when the customer Statement was created
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BilledDate
	 * @var string
	 */
	public $BilledDate;
	/**
	 * @Definition Indicates the total amount of the entity
								associated.
								This includes the total of all the charges,
								allowances and taxes.
								[b]QuickBooks Notes[/b][br /] Non
								QB-writable.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TotalAmt
	 * @var float
	 */
	public $TotalAmt;
	/**
	 * @Definition Internal use only: extension place holder for
								ChargeCredit
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ChargeCreditEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $ChargeCreditEx;


} // end class IPPChargeCredit
