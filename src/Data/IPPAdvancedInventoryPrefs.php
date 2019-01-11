<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPAdvancedInventoryPrefs
 * @var IPPAdvancedInventoryPrefs
 * @xmlDefinition QBW: only. Defines advance inventory Prefs details
			
 */
class IPPAdvancedInventoryPrefs
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
				if (property_exists('IPPAdvancedInventoryPrefs',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPAdvancedInventoryPrefs',$initPropName))
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
	 * @Definition QBW: ONLY. MLI available 
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MLIAvailable
	 * @var boolean
	 */
	public $MLIAvailable;
	/**
	 * @Definition QBW: ONLY. MLI enabled 
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MLIEnabled
	 * @var boolean
	 */
	public $MLIEnabled;
	/**
	 * @Definition QBW: Only QBW supported
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EnhancedInventoryReceivingEnabled
	 * @var boolean
	 */
	public $EnhancedInventoryReceivingEnabled;
	/**
	 * @Definition QBW: only
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TrackingSerialOrLotNumber
	 * @var boolean
	 */
	public $TrackingSerialOrLotNumber;
	/**
	 * @Definition QBW: only
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TrackingOnSalesTransactionsEnabled
	 * @var boolean
	 */
	public $TrackingOnSalesTransactionsEnabled;
	/**
	 * @Definition QBW: only
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TrackingOnPurchaseTransactionsEnabled
	 * @var boolean
	 */
	public $TrackingOnPurchaseTransactionsEnabled;
	/**
	 * @Definition QBW: only
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TrackingOnInventoryAdjustmentEnabled
	 * @var boolean
	 */
	public $TrackingOnInventoryAdjustmentEnabled;
	/**
	 * @Definition QBW: only
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TrackingOnBuildAssemblyEnabled
	 * @var boolean
	 */
	public $TrackingOnBuildAssemblyEnabled;
	/**
	 * @Definition QBW: ONLY. 
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName FIFOEnabled
	 * @var boolean
	 */
	public $FIFOEnabled;
	/**
	 * @Definition QBW: only
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName FIFOEffectiveDate
	 * @var string
	 */
	public $FIFOEffectiveDate;
	/**
	 * @Definition 
						Product: QBW
						Description: Indicates whether
						Row/Shelf/Bin location tracking is enabled
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RowShelfBinEnabled
	 * @var boolean
	 */
	public $RowShelfBinEnabled;
	/**
	 * @Definition 
						Product: QBW
						Description: Indicates whether
						barcoding is enabled
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BarcodeEnabled
	 * @var boolean
	 */
	public $BarcodeEnabled;


} // end class IPPAdvancedInventoryPrefs
