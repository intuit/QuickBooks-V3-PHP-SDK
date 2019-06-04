<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPTelephoneNumber
 * @var IPPTelephoneNumber
 * @xmlDefinition 
				Product: ALL
				Description: Telephone number type definition. This entity is always manipulated in the context of another parent entity like Person, Organization etc.
			
 */
class IPPTelephoneNumber
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
				if (property_exists('IPPTelephoneNumber',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTelephoneNumber',$initPropName))
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
						Product: QBW
						Description: Unique identifier for an Intuit entity.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Id
	 * @var com\intuit\schema\finance\v3\IPPid
	 */
	public $Id;
	/**
	 * @Definition 
						Product: ALL
						Description: Phone device type. Valid values are LandLine, Mobile, Fax, and Pager, as defined in the TelephoneDevice.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DeviceType
	 * @var string
	 */
	public $DeviceType;
	/**
	 * @Definition 
						Product: ALL
						Description: Telephone country code.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CountryCode
	 * @var string
	 */
	public $CountryCode;
	/**
	 * @Definition 
						Product: ALL
						Description: Telephone area code.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AreaCode
	 * @var string
	 */
	public $AreaCode;
	/**
	 * @Definition 
						Product: ALL
						Description: Telephone exchange code.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ExchangeCode
	 * @var string
	 */
	public $ExchangeCode;
	/**
	 * @Definition 
						Product: ALL
						Description: Telephone extension code.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Extension
	 * @var string
	 */
	public $Extension;
	/**
	 * @Definition 
						Product: ALL
						Description: Specifies the telephone number in free form.  FreeFormNumber takes precedence over CountryCode, AreaCode, ExchangeCode, and Extension.[br /]Max length: 21 characters.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName FreeFormNumber
	 * @var string
	 */
	public $FreeFormNumber;
	/**
	 * @Definition 
						Product: ALL
						Description: True if this is the default telephone number.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Default
	 * @var boolean
	 */
	public $Default;
	/**
	 * @Definition 
						Product: ALL
						Description: Descriptive tag (or label) associated with the telephone number. Valid values are Business, Fax, Home, Mobile, Pager, Primary, Secondary, and Other, as defined in the TelephoneNumberLabelType.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Tag
	 * @var string
	 */
	public $Tag;


} // end class IPPTelephoneNumber
