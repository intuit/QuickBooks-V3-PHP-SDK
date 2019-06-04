<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType id
 * @xmlName IPPReferenceType
 * @var IPPReferenceType
 * @xmlDefinition 
				Product: ALL
				Description: Reference type of all IDs that are taken as input or output.
			
 */
class IPPReferenceType
	extends IPPid	{

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
				if (property_exists('IPPReferenceType',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPReferenceType',$initPropName))
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
	 * @xmlType attribute
	 * @xmlName name
	 * @var string
	 */
	public $name;
	/**
	 * @xmlType attribute
	 * @xmlName type
	 * @var string
	 */
	public $type;


} // end class IPPReferenceType
