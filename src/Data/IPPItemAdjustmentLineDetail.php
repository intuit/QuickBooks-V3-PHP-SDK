<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPItemAdjustmentLineDetail
 * @var IPPItemAdjustmentLineDetail
 * @xmlDefinition 
				Product: QBO
				Description: Contains the line details of an inventory adjustment transaction.
			
 */
class IPPItemAdjustmentLineDetail
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
				if (property_exists('IPPItemAdjustmentLineDetail',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPItemAdjustmentLineDetail',$initPropName))
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
						Description: Reference to an inventory item.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 1
	 * @xmlMaxOccurs 1
	 * @xmlName ItemRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ItemRef;
	/**
	 * @Definition 
						Product: QBO
						Description: Specifies the Sales Price (per item) for which the items being disbursed were sold.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SalesPrice
	 * @var float
	 */
	public $SalesPrice;
	/**
	 * @Definition 
							Product: QBO
							Description: Difference in quantity
							it will have negative value for reducing quantity
							positive value for increasing quantity.
					    
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName QtyDiff
	 * @var float
	 */
	public $QtyDiff;
	/**
	 * @Definition 
							Product: QBO
							Description: New quantity as of provided
							transaction date.
					    
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName NewQty
	 * @var float
	 */
	public $NewQty;
	/**
	 * @Definition 
						Product: QBO
						Description: Class Reference
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName ClassRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ClassRef;


} // end class IPPItemAdjustmentLineDetail
