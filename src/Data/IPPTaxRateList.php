<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPTaxRateList
 * @var IPPTaxRateList
 */
class IPPTaxRateList
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
				if (property_exists('IPPTaxRateList',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTaxRateList',$initPropName))
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
						Product: All
						Description: TaxRateDetail that
						specifies qualified detail of TaxRate
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName TaxRateDetail
	 * @var com\intuit\schema\finance\v3\IPPTaxRateDetail
	 */
	public $TaxRateDetail;
	/**
	 * @Definition 
					Product: QBW
					Description: opaque internal string
					used to correlate the rate list with a QBW TaxGroup item to support
					mod of TaxCodes in global tax
				
	 * @xmlType attribute
	 * @xmlName originatingGroupId
	 * @var string
	 */
	public $originatingGroupId;


} // end class IPPTaxRateList
