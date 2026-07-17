<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPBudgetCustomExtensionAssociatedValue
 * @var IPPBudgetCustomExtensionAssociatedValue
 * @xmlDefinition 
				Product: IES
				Description: Key/value pair associated with a budget custom extension
			
 */
class IPPBudgetCustomExtensionAssociatedValue
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
				if (property_exists('IPPBudgetCustomExtensionAssociatedValue',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPBudgetCustomExtensionAssociatedValue',$initPropName))
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
						Product: IES
						Description: Dimension definition id for DIMENSION extension type
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Key
	 * @var string
	 */
	public $Key;
	/**
	 * @Definition 
						Product: IES
						Description: Dimension value id for DIMENSION extension type
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Value
	 * @var string
	 */
	public $Value;


} // end class IPPBudgetCustomExtensionAssociatedValue
