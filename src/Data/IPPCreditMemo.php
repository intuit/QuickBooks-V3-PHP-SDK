<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType SalesTransaction
 * @xmlName IPPCreditMemo
 * @var IPPCreditMemo
 * @xmlDefinition Financial transaction representing a refund (or
				credit) of payment or part of a payment for goods or services that
				have been sold.
 */
class IPPCreditMemo
	extends IPPSalesTransaction	{

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
				if (property_exists('IPPCreditMemo',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCreditMemo',$initPropName))
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
	 * @Definition Indicates the total credit amount still
								available to apply towards the payment.
								[b]QuickBooks
								Notes[/b][br /]
								Non QB-writable.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RemainingCredit
	 * @var float
	 */
	public $RemainingCredit;
	/**
	 * @Definition 
								Product: ALL
								Description: A credit memo needs to have an invoice number to save successfully
								Applicable for IN Region.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName InvoiceRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $InvoiceRef;
	/**
	 * @Definition Internal use only: extension place holder for
								CreditMemo  
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CreditMemoEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $CreditMemoEx;


} // end class IPPCreditMemo
