<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPUOM
 * @var IPPUOM
 * @xmlDefinition The UOM type defines the data used to represent a
				set of equivalent units and the conversion rates to other related
				units. It allows showing what quantities, prices, rates, and costs
				are based on.	
 */
class IPPUOM
	extends IPPIntuitEntity	{

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
				if (property_exists('IPPUOM',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPUOM',$initPropName))
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
	 * @Definition User recognizable name of the Unit of
								Measure.[br /]
								[br /]
								Required for the create operation. [br /]
								Max Length: 31
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Name
	 * @var string
	 */
	public $Name;
	/**
	 * @Definition Abbreviation of the Unit of Measure.[br /]
								[br /]
								Required for the create operation. [br /]
								Max Length: 31
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Abbrv
	 * @var string
	 */
	public $Abbrv;
	/**
	 * @Definition 
								[br /]
								Required for the create operation. [br /]
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BaseType
	 * @var com\intuit\schema\finance\v3\IPPUOMBaseTypeEnum
	 */
	public $BaseType;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName ConvUnit
	 * @var com\intuit\schema\finance\v3\IPPUOMConvUnit
	 */
	public $ConvUnit;


} // end class IPPUOM
