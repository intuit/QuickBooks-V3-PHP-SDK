<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType Transaction
 * @xmlName IPPCreditCardPaymentTxn
 * @var IPPCreditCardPaymentTxn
 * @xmlDefinition Financial transaction representing recording of a Credit Card balance payment.
			
 */
class IPPCreditCardPaymentTxn
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
				if (property_exists('IPPCreditCardPaymentTxn',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCreditCardPaymentTxn',$initPropName))
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
	 * @Definition Credit Card account for which a payment is being entered.
								Must be a Credit Card account.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CreditCardAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $CreditCardAccountRef;
	/**
	 * @Definition Bank account used to pay the Credit Card balance.
								Must be a Bank account.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BankAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $BankAccountRef;
	/**
	 * @Definition Total amount of the payment. Denominated in the currency of the credit card account.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Amount
	 * @var float
	 */
	public $Amount;
	/**
	 * @Definition Internal use only: extension place holder for
								CreditCardPayment
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName CreditCardPaymentEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $CreditCardPaymentEx;


} // end class IPPCreditCardPaymentTxn
