<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPOLBAccount
 * @var IPPOLBAccount
 * @xmlDefinition Describes OLBAccount details
 */
class IPPOLBAccount
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
				if (property_exists('IPPOLBAccount',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPOLBAccount',$initPropName))
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
						Description: AccountId to be enabled or disabled
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AccountId
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $AccountId;
	/**
	 * @Definition Account details that contains possibly credit
						card number, last 5 digits 
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AccountDetails
	 * @var string
	 */
	public $AccountDetails;
	/**
	 * @Definition True when the AccountId is linked to an IPP app
						and false when the AccountId is delinked from the IPP app
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SubscribedToApp
	 * @var boolean
	 */
	public $SubscribedToApp;
	/**
	 * @Definition Specifies which version is being used (such as v1
						or v2). This field is optional.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AppVersion
	 * @var string
	 */
	public $AppVersion;
	/**
	 * @Definition The last bank balance. This field is optional.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName LastBankBalance
	 * @var float
	 */
	public $LastBankBalance;


} // end class IPPOLBAccount
