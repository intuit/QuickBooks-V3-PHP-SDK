<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType Transaction
 * @xmlName IPPDeposit
 * @var IPPDeposit
 * @xmlDefinition Transaction recording a payment from the customer
				held in the Undeposited Funds account into the Bank account.
			
 */
class IPPDeposit
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
				if (property_exists('IPPDeposit',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPDeposit',$initPropName))
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
	 * @Definition DepositToAccountReferenceGroup Identifies the
								Asset Account (bank account) to be used for this Deposit.
								[b]QuickBooks Notes[/b][br /]
								Required for the create operation.
								[br /]
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DepositToAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $DepositToAccountRef;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CashBack
	 * @var com\intuit\schema\finance\v3\IPPCashBackInfo
	 */
	public $CashBack;
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
	 * @Definition Total amount of Deposit.
								[b]QuickBooks
								Notes[/b][br /]
								Non QB-writable.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TotalAmt
	 * @var float
	 */
	public $TotalAmt;
	/**
	 * @Definition 
								Product: ALL
								Description: Total amount of the
								transaction in the home currency for multi-currency enabled
								companies. Single currency companies will not have this field.
								Includes the total of all the charges, allowances and taxes.
								Calculated by QuickBooks business logic. Cannot be written to
								QuickBooks.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName HomeTotalAmt
	 * @var float
	 */
	public $HomeTotalAmt;
	/**
	 * @Definition Internal use only: extension place holder for
								Deposit  
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DepositEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $DepositEx;


} // end class IPPDeposit
