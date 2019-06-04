<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType CustomFieldDefinition
 * @xmlName IPPBooleanTypeCustomFieldDefinition
 * @var IPPBooleanTypeCustomFieldDefinition
 * @xmlDefinition 
				Product: ALL
				Description: Provides for strong-typing of the BooleanType CustomField.
			
 */
class IPPBooleanTypeCustomFieldDefinition
	extends IPPCustomFieldDefinition	{

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
				if (property_exists('IPPBooleanTypeCustomFieldDefinition',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPBooleanTypeCustomFieldDefinition',$initPropName))
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
								Description: Default value of the BooleanType CustomField.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DefaultValue
	 * @var boolean
	 */
	public $DefaultValue;


} // end class IPPBooleanTypeCustomFieldDefinition
