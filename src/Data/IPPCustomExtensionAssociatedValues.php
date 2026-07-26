<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPCustomExtensionAssociatedValues
 * @var IPPCustomExtensionAssociatedValues
 * @xmlDefinition 
				Product: IES
				Description: Custom Extensions Values associated with entities like transactions
			
 */
class IPPCustomExtensionAssociatedValues
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
				if (property_exists('IPPCustomExtensionAssociatedValues',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCustomExtensionAssociatedValues',$initPropName))
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
						Description: Holds the key of the associated custom extension value. This key is a reference to the custom extension defined in Custom Extensions Service
					
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
						Description: Holds the value of the associated custom extension value
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Value
	 * @var string
	 */
	public $Value;


} // end class IPPCustomExtensionAssociatedValues
