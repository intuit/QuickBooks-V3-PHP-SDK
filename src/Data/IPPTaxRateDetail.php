<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPTaxRateDetail
 * @var IPPTaxRateDetail
 */
class IPPTaxRateDetail
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
				if (property_exists('IPPTaxRateDetail',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTaxRateDetail',$initPropName))
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
						Description: TaxRateRef
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxRateRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $TaxRateRef;
	/**
	 * @Definition 
						Product: ALL
						Description: Applicable TaxType enum
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxTypeApplicable
	 * @var com\intuit\schema\finance\v3\IPPTaxTypeApplicablityEnum
	 */
	public $TaxTypeApplicable;
	/**
	 * @Definition 
						Product: QBO
						Description: Applicable Tax Order
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxOrder
	 * @var integer
	 */
	public $TaxOrder;
	/**
	 * @Definition 
						Product: QBO
						Description: Applicable TaxOnTaxOrder
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxOnTaxOrder
	 * @var integer
	 */
	public $TaxOnTaxOrder;


} // end class IPPTaxRateDetail
