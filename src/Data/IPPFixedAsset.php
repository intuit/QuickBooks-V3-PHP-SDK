<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPFixedAsset
 * @var IPPFixedAsset
 * @xmlDefinition An asset you do not expect to convert to cash
				during one year of normal operations.
				A fixed asset is usually
				something that is necessary for the operation of your business, such
				as a truck, cash register, or computer.
			
 */
class IPPFixedAsset
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
				if (property_exists('IPPFixedAsset',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPFixedAsset',$initPropName))
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
	 * @Definition User recognizable name for the Fixed Asset
								Item.[br /]
								Length Restriction:
								QBO: 15
								QBW: 1024
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Name
	 * @var string
	 */
	public $Name;
	/**
	 * @Definition Whether or not active inactive fixed assets may
								be hidden from most display purposes and may not be used on
								financial transactions.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Active
	 * @var boolean
	 */
	public $Active;
	/**
	 * @Definition Specifies whether the asset is new or used.
								This will aid in calculating depreciation.[br /]
								Length
								Restriction:
								QBO: 15
								QBW: 1024
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AcquiredAs
	 * @var com\intuit\schema\finance\v3\IPPAcquiredAsEnum
	 */
	public $AcquiredAs;
	/**
	 * @Definition User entered purchase description for the fixed
								asset which may include user entered information to further
								describe the details of the purchase.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PurchaseDesc
	 * @var string
	 */
	public $PurchaseDesc;
	/**
	 * @Definition Specifies the date the asset was purchased or
								acquired.[br /]
								Length Restriction:
								QBO: 15
								QBW: 1024
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PurchaseDate
	 * @var string
	 */
	public $PurchaseDate;
	/**
	 * @Definition Specifies the asset's purchase price.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PurchaseCost
	 * @var float
	 */
	public $PurchaseCost;
	/**
	 * @Definition Specifies the name of the vendor or payee from
								whom the asset was purchased.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Vendor
	 * @var string
	 */
	public $Vendor;
	/**
	 * @Definition Indicates the Fixed Asset account that tracks
								the current value of the asset. If the same account is used for
								all fixed assets, the current balance of this account will
								represent the current total value of the fixed assets.[br /]
								[br /]
								Required for the create operation. [br /]
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AssetAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $AssetAccountRef;
	/**
	 * @Definition User entered sales description for the fixed
								asset which may include user entered information to further
								describe the details of the sales.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SalesDesc
	 * @var string
	 */
	public $SalesDesc;
	/**
	 * @Definition Specifies the date the asset was sold.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SalesDate
	 * @var string
	 */
	public $SalesDate;
	/**
	 * @Definition Specifies the amount for which the asset was
								sold.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SalesPrice
	 * @var float
	 */
	public $SalesPrice;
	/**
	 * @Definition Additional expenses incurred during the sale of
								the asset.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SalesExpense
	 * @var float
	 */
	public $SalesExpense;
	/**
	 * @Definition Information about where the asset is located or
								has been placed into service.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Location
	 * @var string
	 */
	public $Location;
	/**
	 * @Definition The purchase order number if a purchase order
								was used to buy the asset.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PONumber
	 * @var string
	 */
	public $PONumber;
	/**
	 * @Definition The serial number of the asset. For a vehicle,
								it can be the VIN.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SerialNumber
	 * @var string
	 */
	public $SerialNumber;
	/**
	 * @Definition The date the warranty for the asset expires.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName WarrantyExpDate
	 * @var string
	 */
	public $WarrantyExpDate;
	/**
	 * @Definition Any description of the asset, like maker,
								brand, and so on.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Description
	 * @var string
	 */
	public $Description;
	/**
	 * @Definition Notes about the asset that might help to track
								it properly, such as notes about repairs or upkeep.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Notes
	 * @var string
	 */
	public $Notes;
	/**
	 * @Definition QBW only: asset number. Maintained by the QB
								Fixed Asset Manager.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AssetNum
	 * @var integer
	 */
	public $AssetNum;
	/**
	 * @Definition QBW only: The total cost of the fixed asset.
								This can include the cost of improvements or repairs. This
								amount is used to calculate depreciation. Maintained by the QB
								Fixed Asset Manager.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CostBasis
	 * @var float
	 */
	public $CostBasis;
	/**
	 * @Definition QBW only: the total amount of depreciation
								expense since the fixed asset was acquired as of the end of the
								year. Maintained by the QB Fixed Asset Manager.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Depreciation
	 * @var float
	 */
	public $Depreciation;
	/**
	 * @Definition QBW only: the asset's cost or basis less
								accumulated depreciation as of the end of the year. Maintained
								by the QB Fixed Asset Manager.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BookValue
	 * @var float
	 */
	public $BookValue;
	/**
	 * @Definition Internal use only: extension place holder for
								FixedAsset  
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName FixedAssetEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $FixedAssetEx;


} // end class IPPFixedAsset
