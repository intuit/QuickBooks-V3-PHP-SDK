<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType Account
 * @xmlName IPPMasterAccount
 * @var IPPMasterAccount
 * @xmlDefinition Master Account is the list of accounts in the
				master list. The master list is the complete list of accounts
				prescribed by the French Government. These accounts can be created
				in the company on a need basis. The account create API needs to be
				used to create an account. 
 */
class IPPMasterAccount
	extends IPPAccount	{

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
				if (property_exists('IPPMasterAccount',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPMasterAccount',$initPropName))
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
								Description: Specifies whether the account has been created in the company.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AccountExistsInCompany
	 * @var boolean
	 */
	public $AccountExistsInCompany;


} // end class IPPMasterAccount
