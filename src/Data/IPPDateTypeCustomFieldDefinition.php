<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType CustomFieldDefinition
 * @xmlName IPPDateTypeCustomFieldDefinition
 * @var IPPDateTypeCustomFieldDefinition
 * @xmlDefinition 
				Product: ALL
				Description: Provides for strong-typing of the DateType CustomField.
			
 */
class IPPDateTypeCustomFieldDefinition
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
				if (property_exists('IPPDateTypeCustomFieldDefinition',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPDateTypeCustomFieldDefinition',$initPropName))
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
								Description: Default date value for the DateType CustomField.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DefaultDate
	 * @var string
	 */
	public $DefaultDate;
	/**
	 * @Definition 
								Product: ALL
								Description: Minimum date value allowed when the DateType CustomField is created/updated.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MinDate
	 * @var string
	 */
	public $MinDate;
	/**
	 * @Definition 
								Product: ALL
								Description: Maximum date value allowed when the DateType CustomField is created/updated.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MaxDate
	 * @var string
	 */
	public $MaxDate;


} // end class IPPDateTypeCustomFieldDefinition
