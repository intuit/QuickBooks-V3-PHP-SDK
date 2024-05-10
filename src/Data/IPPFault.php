<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPFault
 * @var IPPFault
 * @xmlDefinition Fault entity describing the fault
 */
class IPPFault
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
				if (property_exists('IPPFault',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPFault',$initPropName))
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
	 * @Definition Error entity that describes the details of the error, if there are multiple errors, multiple occurrence of error object will be represented as multiple errors
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName Error
	 * @var com\intuit\schema\finance\v3\IPPError
	 */
	public $Error;
	/**
	 * @Definition Element that caused the error
	 * @xmlType attribute
	 * @xmlName type
	 * @var string
	 */
	public $type;


} // end class IPPFault
