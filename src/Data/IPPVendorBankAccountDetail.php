<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPVendorBankAccountDetail
 * @var IPPVendorBankAccountDetail
 * @xmlDefinition 
				Product: ALL
				Description: Contains Bank Account details to process the batch payment for Vendors. Applicable for AU region only..
			
 */
class IPPVendorBankAccountDetail
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
				if (property_exists('IPPVendorBankAccountDetail',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPVendorBankAccountDetail',$initPropName))
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
							Product: QBO only
							Description: Specifies the BankBranchIdentifier for ABA processing. Applicable for AU region only.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BankBranchIdentifier
	 * @var string
	 */
	public $BankBranchIdentifier;
	/**
	 * @Definition 
							Product: QBO only
							Description: Specifies the BankAccountNumber for ABA processing. Applicable for AU region only.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BankAccountNumber
	 * @var string
	 */
	public $BankAccountNumber;
	/**
	 * @Definition 
							Product: QBO only
							Description: Specifies the BankAccountName for ABA processing. Applicable for AU region only.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BankAccountName
	 * @var string
	 */
	public $BankAccountName;
	/**
	 * @Definition 
							Product: QBO only
							Description: Specifies the Statement text for ABA processing. Applicable for AU region only.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName StatementText
	 * @var string
	 */
	public $StatementText;


} // end class IPPVendorBankAccountDetail
