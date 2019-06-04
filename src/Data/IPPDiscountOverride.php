<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPDiscountOverride
 * @var IPPDiscountOverride
 * @xmlDefinition 
					Product: ALL
					Description: Optional amount by which
					the amount due on the referenced transaction is being reduced.
				
 */
class IPPDiscountOverride
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
				if (property_exists('IPPDiscountOverride',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPDiscountOverride',$initPropName))
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
						Description: Discount used in
						calculating and applying the discount on the sales transaction
						paid.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DiscountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $DiscountRef;
	/**
	 * @Definition 
						Product: ALL
						Description: True if the discount is
						a percentage; null or false if discount based on amount.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PercentBased
	 * @var boolean
	 */
	public $PercentBased;
	/**
	 * @Definition 
						Product: ALL
						Description: Percentage by which the
						amount due is reduced, from 0% to 100%. To enter a discount of
						8.5% use 8.5, not 0.085.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DiscountPercent
	 * @var float
	 */
	public $DiscountPercent;
	/**
	 * @Definition 
						Product: ALL
						Description: Income account used to
						track discounts received from vendors on purchases.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DiscountAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $DiscountAccountRef;


} // end class IPPDiscountOverride
