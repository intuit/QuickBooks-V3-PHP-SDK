<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPConvenienceFeeDetail
 * @var IPPConvenienceFeeDetail
 * @xmlDefinition 
				Product: QBO
				Description: Internal use only: Convenience Fee detail for the invoice
			
 */
class IPPConvenienceFeeDetail
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
				if (property_exists('IPPConvenienceFeeDetail',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPConvenienceFeeDetail',$initPropName))
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
								Description: Internal use only: Convenience fee type
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ConvenienceFeeType
	 * @var com\intuit\schema\finance\v3\IPPConvenienceFeeTypeEnum
	 */
	public $ConvenienceFeeType;
	/**
	 * @Definition 
								Product: QBO
								Description: Internal use only: Convenience fee rate percentage
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ConvenienceFeePercent
	 * @var float
	 */
	public $ConvenienceFeePercent;


} // end class IPPConvenienceFeeDetail
