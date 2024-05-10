<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPError
 * @var IPPError
 * @xmlDefinition Error Type detailing error 
 */
class IPPError
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
				if (property_exists('IPPError',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPError',$initPropName))
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
	 * @Definition Localized standard message associated with the error code
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Message
	 * @var string
	 */
	public $Message;
	/**
	 * @Definition Detailed error localized or unlocalized error that is thrown by the business logic backend that caused the error
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Detail
	 * @var string
	 */
	public $Detail;
	/**
	 * @Definition Link to get more details about error like common cause, remedy etc
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DetailLink
	 * @var string
	 */
	public $DetailLink;
	/**
	 * @Definition Error code number, this is a required field 
	 * @xmlType attribute
	 * @xmlName code
	 * @var string
	 */
	public $code;
	/**
	 * @Definition Element that caused the error
	 * @xmlType attribute
	 * @xmlName element
	 * @var string
	 */
	public $element;


} // end class IPPError
