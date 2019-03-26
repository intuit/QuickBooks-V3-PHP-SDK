<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPItemComponentLine
 * @var IPPItemComponentLine
 * @xmlDefinition 
				Product: ALL
				Description: Constituent line of a
				group item.
			
 */
class IPPItemComponentLine
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
				if (property_exists('IPPItemComponentLine',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPItemComponentLine',$initPropName))
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
						Description: Reference to an Item. For an Assembly item, this must be a
						reference to an Inventory Item needed in the assembly.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ItemRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ItemRef;
	/**
	 * @Definition 
						Product: ALL
						Description: Quantity of items.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Qty
	 * @var float
	 */
	public $Qty;
	/**
	 * @Definition 
						Product: ALL
						Description: Reference to the unit of measure (within UOMSetRef) for this line
						item. Examples: "each" or "box".
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName UOMRef
	 * @var com\intuit\schema\finance\v3\IPPUOMRef
	 */
	public $UOMRef;


} // end class IPPItemComponentLine
