<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType Transaction
 * @xmlName IPPInventoryAdjustment
 * @var IPPInventoryAdjustment
 * @xmlDefinition 
				Product: QBO
				Description: The Inventory Adjustment request element
			
 */
class IPPInventoryAdjustment
	extends IPPTransaction	{

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
				if (property_exists('IPPInventoryAdjustment',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPInventoryAdjustment',$initPropName))
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
								Description: When this property is set to true, the "Inventory Adjustment" is treated 
								as a notice-of-shipment or packing slip. This will cause the accounting engine to book 
								the revenue from the sale of the items. When this property is set, the SalesPrice property 
								must be provided. In order for correct accounting to occur SalesPrice (per item) amount 
								must match the sales amount on the sales transaction - but no validation of this occurs 
								within the accounting engine.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ShippingAdjustment
	 * @var boolean
	 */
	public $ShippingAdjustment;
	/**
	 * @Definition 
								Product: QBO
								Description: Reference to the
								Inventory Adjustment account used to adjust inventory.
								This is an expense or opening balance equity account.
								The inventory asset account is used from item's definition.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 1
	 * @xmlMaxOccurs 1
	 * @xmlName AdjustAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $AdjustAccountRef;
	/**
	 * @Definition 
							   Product: QBO
							   Description: Customer Reference
					       
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName CustomerRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $CustomerRef;


} // end class IPPInventoryAdjustment
