<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType Transaction
 * @xmlName IPPReimburseCharge
 * @var IPPReimburseCharge
 * @xmlDefinition  Product: QBO Description: Reimburse charge object
				for QBO
			
 */
class IPPReimburseCharge
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
				if (property_exists('IPPReimburseCharge',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPReimburseCharge',$initPropName))
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
	 * @Definition  Product: QBO Description: Customer Reference
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName CustomerRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $CustomerRef;
	/**
	 * @Definition  Product: QBO Description: Indicates whether the Charge
							has been invoiced
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName HasBeenInvoiced
	 * @var boolean
	 */
	public $HasBeenInvoiced;
	/**
	 * @Definition Total amount of the reimburse charge.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Amount
	 * @var float
	 */
	public $Amount;
	/**
	 * @Definition 
								Product: ALL
								Description: QBW: Total amount of
								the transaction in the home currency for multi-currency enabled
								companies. Single currency companies will not have this field.
								Includes the total of all the charges, allowances and taxes.
								Calculated by QuickBooks business logic. Cannot be written to
								QuickBooks.
								InputType: QBW: ReadOnly
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName HomeTotalAmt
	 * @var float
	 */
	public $HomeTotalAmt;


} // end class IPPReimburseCharge
