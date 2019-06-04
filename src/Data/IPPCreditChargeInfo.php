<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPCreditChargeInfo
 * @var IPPCreditChargeInfo
 * @xmlDefinition 
				Product: ALL
				Description: Holds credit-card information to request a credit card payment from a merchant account service, but NOT any response or authorization information from the merchant account service provider -- see CreditChargeResponse
			
 */
class IPPCreditChargeInfo
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
				if (property_exists('IPPCreditChargeInfo',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCreditChargeInfo',$initPropName))
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
						Description: Credit Card account number, as printed on the card. Must not have whitespace or formatting characters.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Number
	 * @var string
	 */
	public $Number;
	/**
	 * @Definition 
						Product: ALL
						Description: Type of credit card.[br /]
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Type
	 * @var string
	 */
	public $Type;
	/**
	 * @Definition 
						Product: ALL
						Description: Account holder name, as printed on the card.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName NameOnAcct
	 * @var string
	 */
	public $NameOnAcct;
	/**
	 * @Definition 
						Product: ALL
						Description: Expiration Month on card, expressed as a number: 1 = January, 2 = February, etc.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CcExpiryMonth
	 * @var integer
	 */
	public $CcExpiryMonth;
	/**
	 * @Definition 
						Product: ALL
						Description: Expiration Year on card, expressed as a 4 digit number 1999, 2003, etc.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CcExpiryYear
	 * @var integer
	 */
	public $CcExpiryYear;
	/**
	 * @Definition 
						Product: ALL
						Description: Credit card holder billing address of record: the street address to which credit card statements are sent.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BillAddrStreet
	 * @var string
	 */
	public $BillAddrStreet;
	/**
	 * @Definition 
						Product: ALL
						Description: Credit card holder billing postal code. Five digits in the USA.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PostalCode
	 * @var string
	 */
	public $PostalCode;
	/**
	 * @Definition 
						Product: ALL
						Description: Code associated with commercial cards: purchase, corporate, and business cards. Lower transaction fee rates apply when these cards are used and this field is provided.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CommercialCardCode
	 * @var string
	 */
	public $CommercialCardCode;
	/**
	 * @Definition 
						Product: ALL
						Description: Credit card transaction mode used in Credit Card payment transactions. Valid values: CardNotPresent (default) or CardPresent.[br /]
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CCTxnMode
	 * @var com\intuit\schema\finance\v3\IPPCCTxnModeEnum
	 */
	public $CCTxnMode;
	/**
	 * @Definition 
						Product: ALL
						Description: Type of credit card transaction. Valid values: Authorization, Capture, Charge, Refund, VoiceAuthorization.[br /]
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CCTxnType
	 * @var com\intuit\schema\finance\v3\IPPCCTxnTypeEnum
	 */
	public $CCTxnType;
	/**
	 * @Definition 
						Product: ALL
						Description: Unique identifier of the previous payment transaction. It can be used as an input to the Capture transaction type.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PrevCCTransId
	 * @var string
	 */
	public $PrevCCTransId;
	/**
	 * @Definition 
						Product: QBO
						Description: The Amount processed using the credit card.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Amount
	 * @var float
	 */
	public $Amount;
	/**
	 * @Definition 
						Product: QBO
						Description: If false or no value, QBO will not process the payment but just store Credit Card Information. If true, QBO will process the Credit Card Payment (Not supported currently).
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ProcessPayment
	 * @var boolean
	 */
	public $ProcessPayment;
	/**
	 * @Definition 
						Product: ALL
						Description: Internal use only: extension place holder for CreditCardChargeInfo
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName CreditCardChargeInfoEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $CreditCardChargeInfoEx;


} // end class IPPCreditChargeInfo
