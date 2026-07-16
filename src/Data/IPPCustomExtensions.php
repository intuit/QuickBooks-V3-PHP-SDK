<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPCustomExtensions
 * @var IPPCustomExtensions
 * @xmlDefinition 
				Product: IES
				Description: Custom extensions for user defined categories like dimensions
			
 */
class IPPCustomExtensions
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
				if (property_exists('IPPCustomExtensions',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCustomExtensions',$initPropName))
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
						Description: Holds type of the custom extension eg. DIMENSION
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 1
	 * @xmlName ExtensionType
	 * @var string
	 */
	public $ExtensionType;
	/**
	 * @Definition 
						Product: IES
						Description: Holds the key value pairs of the extension
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName AssociatedValues
	 * @var com\intuit\schema\finance\v3\IPPCustomExtensionAssociatedValues
	 */
	public $AssociatedValues;


} // end class IPPCustomExtensions
