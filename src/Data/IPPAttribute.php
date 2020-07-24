<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPAttribute
 * @var IPPAttribute
 */
class IPPAttribute
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
				if (property_exists('IPPAttribute',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPAttribute',$initPropName))
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
	 * @Definition Describes the Name
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName Type
	 * @var string
	 */
	public $Type;
	/**
	 * @Definition Describes the Value
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName Value
	 * @var string
	 */
	public $Value;


} // end class IPPAttribute
