<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPFinanceChargePrefs
 * @var IPPFinanceChargePrefs
 */
class IPPFinanceChargePrefs
	{

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
				if (property_exists('IPPFinanceChargePrefs',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPFinanceChargePrefs',$initPropName))
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
						Product:QBW
						Annual Interest Rate in percent
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AnnualInterestRate
	 * @var float
	 */
	public $AnnualInterestRate;
	/**
	 * @Definition 
						Product:QBW
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MinFinChrg
	 * @var float
	 */
	public $MinFinChrg;
	/**
	 * @Definition 
						Product:QBW
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName GracePeriod
	 * @var integer
	 */
	public $GracePeriod;
	/**
	 * @Definition 
						Product:QBW
						If true, the Finance Charges are
						calculated from the transaction date (Invoice, or Bill).[br /]
						If
						false, the Finance Charges are calculated from the due date.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CalcFinChrgFromTxnDate
	 * @var boolean
	 */
	public $CalcFinChrgFromTxnDate;
	/**
	 * @Definition 
						Product:QBW
						true if finance charges should apply
						to overdue charges, in which case the charges will be applied to
						the account referenced in FinChrgAccountRef
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AssessFinChrgForOverdueCharges
	 * @var boolean
	 */
	public $AssessFinChrgForOverdueCharges;
	/**
	 * @Definition 
						Product:QBW
						[b]QuickBooks Notes[/b][br /]
						Max
						Length: 31 or 159 (for a fully qualified name)
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName FinChrgAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $FinChrgAccountRef;


} // end class IPPFinanceChargePrefs
