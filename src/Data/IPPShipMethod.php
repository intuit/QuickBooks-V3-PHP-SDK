<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPShipMethod
 * @var IPPShipMethod
 * @xmlDefinition 
				Product: ALL
				Description: Describes a method of
				shipping for the company
			
 */
class IPPShipMethod
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
				if (property_exists('IPPShipMethod',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPShipMethod',$initPropName))
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
								Description: The name of the
								shipping method (i.e. FedEx 2-day)
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Name
	 * @var string
	 */
	public $Name;
	/**
	 * @Definition 
								Product: QBW
								Description: Indication of whether
								or not this shipping method is still used by the company.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName Active
	 * @var boolean
	 */
	public $Active;
	/**
	 * @Definition Internal use only: extension place holder for
								ShipMethod
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ShipMethodEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $ShipMethodEx;


} // end class IPPShipMethod
