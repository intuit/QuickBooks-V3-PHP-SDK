<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPGenericContactType
 * @var IPPGenericContactType
 * @xmlDefinition 
				Product: ALL
				Description: Contact type other than email, phone, address. Examples: "Chat", "SkypeId", "FaceBook" etc.
			
 */
class IPPGenericContactType
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
				if (property_exists('IPPGenericContactType',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPGenericContactType',$initPropName))
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
						Description: Name of the generic contact type. For example, "GoogleChat" related contact info can have the Name, "ChatId".
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Name
	 * @var string
	 */
	public $Name;
	/**
	 * @Definition 
						Product: ALL
						Description: Value of the contact type. For example, for a "GoogleChat" contact info, the Value may be the chat ID.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Value
	 * @var string
	 */
	public $Value;
	/**
	 * @Definition 
						Product: ALL
						Description: Type of contact. For example, "GoogleChat" or "Skype".
					
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
						Description: True if this is the default contact information.
					
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
						Description: Descriptive tag associated with the contact information.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Tag
	 * @var string
	 */
	public $Tag;


} // end class IPPGenericContactType
