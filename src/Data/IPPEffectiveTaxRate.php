<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPEffectiveTaxRate
 * @var IPPEffectiveTaxRate
 * @xmlDefinition 
				Product: QBO
				Description: EffectiveTaxRate detail
			
 */
class IPPEffectiveTaxRate
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
				if (property_exists('IPPEffectiveTaxRate',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPEffectiveTaxRate',$initPropName))
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
						Description: Represents rate value.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RateValue
	 * @var float
	 */
	public $RateValue;
	/**
	 * @Definition 
						Product: QBO
						Description: Effective starting date
						for which this taxrate is applicable
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EffectiveDate
	 * @var string
	 */
	public $EffectiveDate;
	/**
	 * @Definition 
						Product: QBO
						Description: End date of this taxrate
						applicability
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EndDate
	 * @var string
	 */
	public $EndDate;
	/**
	 * @Definition 
						Product: ALL
						Description: Internal use only:
						extension place holder for TaxLine.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EffectiveTaxRateEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $EffectiveTaxRateEx;


} // end class IPPEffectiveTaxRate
