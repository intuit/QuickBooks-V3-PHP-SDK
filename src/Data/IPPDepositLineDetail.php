<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPDepositLineDetail
 * @var IPPDepositLineDetail
 * @xmlDefinition 
				Product: ALL
				Description: Deposit detail for a
				transaction line.
			
 */
class IPPDepositLineDetail
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
				if (property_exists('IPPDepositLineDetail',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPDepositLineDetail',$initPropName))
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
						Description: Information about the
						Customer or Job associated with the deposit.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Entity
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $Entity;
	/**
	 * @Definition 
						Product: ALL
						Description: Reference to the Class
						for the deposit.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ClassRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ClassRef;
	/**
	 * @Definition 
						Product: ALL
						Description: Reference to an Expense
						account associated with the service/non-sellable item billing.
					
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
						PaymentMethod for the deposit.
					
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
						Description: Check number for the
						desposit.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CheckNum
	 * @var string
	 */
	public $CheckNum;
	/**
	 * @Definition 
						Product: ALL
						Description: Type of the payment
						transaction. For information purposes only.[br /]
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TxnType
	 * @var com\intuit\schema\finance\v3\IPPTxnTypeEnum
	 */
	public $TxnType;
	/**
	 * @Definition 
						Product: QBO
						Description: Sales/Purchase tax code.
						For Non US/CA Companies
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxCodeRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $TaxCodeRef;
	/**
	 * @Definition 
						Product: QBO
						Description: Indicates whether the
						tax applicable on the line is sales or purchase
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxApplicableOn
	 * @var com\intuit\schema\finance\v3\IPPTaxApplicableOnEnum
	 */
	public $TaxApplicableOn;
	/**
	 * @Definition 
						Product: ALL
						Description: Internal use only:
						extension place holder for DepositDetail
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DepositLineDetailEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $DepositLineDetailEx;


} // end class IPPDepositLineDetail
