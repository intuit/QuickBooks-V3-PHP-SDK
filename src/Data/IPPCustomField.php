<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPCustomField
 * @var IPPCustomField
 * @xmlDefinition 
				Product: ALL
				Description: Custom field that can be added to an entity. This type is not extended from IntuitEntity as CustomField can not be manipulated as independent entity and will always be considered in association with another top level Intuit entity.
			
 */
class IPPCustomField
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
				if (property_exists('IPPCustomField',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCustomField',$initPropName))
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
						Description: Unique identifier of the CustomFieldDefinition that corresponds to this CustomField.  DefinitionId is required for every CustomField.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DefinitionId
	 * @var com\intuit\schema\finance\v3\IPPid
	 */
	public $DefinitionId;
	/**
	 * @Definition 
						Product: ALL
						Description: Name of the custom field.
					
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
						Description: Data type of custom field.[br /]
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 1
	 * @xmlMaxOccurs 1
	 * @xmlName Type
	 * @var com\intuit\schema\finance\v3\IPPCustomFieldTypeEnum
	 */
	public $Type;
	/**
	 * @Definition 
							Product: ALL
							Description: The value for a StringType custom field.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName StringValue
	 * @var string
	 */
	public $StringValue;
	/**
	 * @Definition 
							Product: ALL
							Description: The value for a BooleanType custom field.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName BooleanValue
	 * @var boolean
	 */
	public $BooleanValue;
	/**
	 * @Definition 
							Product: ALL
							Description: The value for a DateType custom field.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName DateValue
	 * @var string
	 */
	public $DateValue;
	/**
	 * @Definition 
							Product: ALL
							Description: The value for a NumberType custom field.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName NumberValue
	 * @var float
	 */
	public $NumberValue;


} // end class IPPCustomField
