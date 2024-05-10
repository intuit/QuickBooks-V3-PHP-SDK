<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPTaxPayment
 * @var IPPTaxPayment
 * @xmlDefinition 
				Product: QBO
				Description: Tax Payment/Refund made against filed taxReturn.
			
 */
class IPPTaxPayment
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
				if (property_exists('IPPTaxPayment',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTaxPayment',$initPropName))
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
								Description: The tax payment date
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PaymentDate
	 * @var string
	 */
	public $PaymentDate;
	/**
	 * @Definition 
								Product: QBO
								Description: Account ID from which the payment was made (or refund was moved to)
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PaymentAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $PaymentAccountRef;
	/**
	 * @Definition 
								Product: QBO
								Description: Specifies the tax payment amount paid towards a filed tax return.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PaymentAmount
	 * @var float
	 */
	public $PaymentAmount;
	/**
	 * @Definition 
								Product: QBO
								Description: Memo/Description added for this payment.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Description
	 * @var string
	 */
	public $Description;
	/**
	 * @Definition 
								Product: QBO
								Description: Indicate if this transaction is a refund. Returns false for the tax payment.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Refund
	 * @var boolean
	 */
	public $Refund;


} // end class IPPTaxPayment
