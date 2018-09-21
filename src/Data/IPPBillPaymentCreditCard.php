<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPBillPaymentCreditCard
 * @var IPPBillPaymentCreditCard
 */
class IPPBillPaymentCreditCard
	{

		/**                                                                       
		* Initializes this object, optionally with pre-defined property values    
		*                                                                         
		* Initializes this object and it's property members, using the dictionary
		* of key/value pairs passed as an optional argument.                      
		*                                                                         
		* @param array $keyValInitializers key/value pairs to be populated into object's properties 
		* @param boolean $verbose specifies whether object should echo warnings   
		*/                                                                        
		public function __construct($keyValInitializers=array(), $verbose=FALSE)
		{
			foreach($keyValInitializers as $initPropName => $initPropVal)
			{
				if (property_exists('IPPBillPaymentCreditCard',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPBillPaymentCreditCard',$initPropName))
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
	 * @xmlType element
	 * @xmlNamespace 
	 * @xmlMinOccurs 0
	 * @xmlName CCAccountRef
	 * @var IPPReferenceType
	 */
	public $CCAccountRef;
	/**
	 * @xmlType element
	 * @xmlNamespace 
	 * @xmlMinOccurs 0
	 * @xmlName CCDetail
	 * @var IPPCreditCardPayment
	 */
	public $CCDetail;
	/**
	 * @Definition Internal use only: extension place holder for
						BillPayTypeCreditCard  
	 * @xmlType element
	 * @xmlNamespace 
	 * @xmlMinOccurs 0
	 * @xmlName BillPaymentCreditCardEx
	 * @var IPPIntuitAnyType
	 */
	public $BillPaymentCreditCardEx;


} // end class IPPBillPaymentCreditCard
