<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPTaxRateDetails
 * @var IPPTaxRateDetails
 * @xmlDefinition 
                Product: QBO
                Description: TaxRate details                                                     
            
 */
class IPPTaxRateDetails
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
				if (property_exists('IPPTaxRateDetails',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTaxRateDetails',$initPropName))
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
                        Product: QBO
                        Description: TaxRate details                                                                    
                    
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName TaxRateName
	 * @var string
	 */
	public $TaxRateName;
	/**
	 * @Definition 
                        Product: QBO
                        Description: TaxRate details                                                                    
                    
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName TaxRateId
	 * @var string
	 */
	public $TaxRateId;
	/**
	 * @Definition 
                        Product: QBO
                        Description: TaxRate value                        
                    
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName RateValue
	 * @var float
	 */
	public $RateValue;
	/**
	 * @Definition 
                        Product: QBO
                        Description: TaxAgency details                                                                    
                    
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName TaxAgencyId
	 * @var string
	 */
	public $TaxAgencyId;
	/**
	 * @Definition 
                        Product: QBO
                        Description: Default is SalesTax                                                           
                    
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName TaxApplicableOn
	 * @var com\intuit\schema\finance\v3\IPPTaxRateApplicableOnEnum
	 */
	public $TaxApplicableOn;


} // end class IPPTaxRateDetails
