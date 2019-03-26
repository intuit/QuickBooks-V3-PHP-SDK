<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPTDSLineDetail
 * @var IPPTDSLineDetail
 * @xmlDefinition 
				Product: QBO
				Description: TDS line detail for the
				transaction.
			
 */
class IPPTDSLineDetail
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
				if (property_exists('IPPTDSLineDetail',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTDSLineDetail',$initPropName))
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
						Description: Reference to TDS account
						associated with this transaction
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TDSAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $TDSAccountRef;
	/**
	 * @Definition 
						Product: QBO
						Description: TDS section type of the
						transaction.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TDSSectionTypeId
	 * @var integer
	 */
	public $TDSSectionTypeId;
	/**
	 * @Definition 
						Product: QBO
						Description: Extension place holder
						for TDSLineDetail
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TDSLineDetailEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $TDSLineDetailEx;


} // end class IPPTDSLineDetail
