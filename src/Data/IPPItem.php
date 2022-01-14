<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPItem
 * @var IPPItem
 * @xmlDefinition 
				Product: QBO
				Description: The Item resource
				represents any product or service that is sold or purchased.
				Inventory items are not currently supported.
				Product: QBW
				Description: An item is a thing that your company buys, sells,
				or re-sells, such as products, shipping and handling charges,
				discounts, and sales tax (if applicable). An item is shown as a line
				on an invoice or other sales form. The Item.Type property, which
				specifies how the item is used, may have one of the following
				values: [li]Assembly: The Assembly item allows you combine inventory
				part items and other assembly items (subassemblies) into a single
				item by defining a Bill of Materials, that lists the component parts
				of the assembly item. You can also include the cost of building the
				assembly item by adding the non-inventory part items, service items,
				and other charge items to the Bill of Materials. [/li][li] Fixed
				Asset: The Fixed Asset item represents those business assets that
				you do not convert to cash one year of normal operation. A fixed
				asset is usually something that is integral to your business
				operations. For example, a truck or computer. [/li][li]Group: The
				Group item helps you to quickly enter a group of individual items
				that you often purchase or sell together. [li]Inventory: The
				Inventory item is used to track merchandise which your business
				purchases, stocks as inventory, and re-sells. QuickBooks tracks the
				current number of inventory items in stock and the average value of
				the inventory after the purchase and sale of every item.
				[/li][li]Other Charge: The Other Charge item is used to charge
				customers for the mileage expense.[/li] [li]Product The Product item
				is used to record the sales information of a product.
				[/li][li]Payment: The Payment item subtracts the amount of a
				customer payment from the total amount of an invoice or statement.
				You must create a payment item if you receive payment for an invoice
				or statement in parts. If you receive full payment at the time of
				sale, use a sales receipt form instead of an invoice with a payment
				item.[/li] [li]Service: The Service item is used for the services
				that you charge on the purchase. For example, including specialized
				labor, consulting hours, and professional fees. [/li][li]Subtotal:
				The Subtotal item is used when you want the total of all the items.
				You can use this item to apply a percentage discount or
				surcharge.[/li]
				Business Rules: [li]The item name must be unique.
				[/li][li]The item type must not be NULL. [/li][li]The item cannot
				define both unit price and unit price percent simultaneously.
				[/li][li]For the Service, Product, and Other Charge items, you must
				specify the ID or name of the expense account or both. [/li][li]If
				the purchase order cost is specified for the Service, Product, and
				Other Charge items, you must specify the ID or name of the expense
				account or both.[/li] For the Inventory and Assembly items, you must
				specify: [li]the ID or name of the income account or both
				[/li][li]the ID or name of the cogs account or both [/li][li]the ID
				or name of the asset account or both [/li][li]For the Group item,
				you must specify the tax ID or tax name or both.[/li] For the Fixed
				Asset item, you must: [li]set the asset account type to Asset[/li]
				[li]specify the purchase date [/li][li]specify the ID or name of the
				income account or both[/li]
			
 */
class IPPItem
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
				if (property_exists('IPPItem',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPItem',$initPropName))
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
								Product: QBW
								Description: User recognizable name
								for the Item.[br /]Max. length: 31 characters.
								Product: QBO
								Description: User recognizable name for the Item.[br /]Max.
								length: 100 characters.
								Filterable: ALL
								Sortable: ALL
								Required: QBW
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Name
	 * @var string
	 */
	public $Name;
	/**
	 * @Definition 
								Product: QBO
								Description: Stock Keeping Unit -
								User entered item identifier that identifies an item uniquely
								[br /]Max. length: 100 characters.
								Filterable: ALL
								Sortable: ALL
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Sku
	 * @var string
	 */
	public $Sku;
	/**
	 * @Definition 
								Product: QBW
								Description: User entered
								description for the item that describes the details of the
								service or product.[br /]Max. length: 4000 characters.
								Product:
								QBO
								Description: User entered description for the item that
								describes the details of the service or product.[br /]Max.
								length: 4000 characters.
								Filterable: QBO
								Sortable: QBO
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Description
	 * @var string
	 */
	public $Description;
	/**
	 * @Definition 
								Product: QBW
								Description: True if active.
								Inactive items may be hidden from display and may not be used in
								financial transactions.
								Filterable: QBW
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Active
	 * @var boolean
	 */
	public $Active;
	/**
	 * @Definition 
								Product: ALL
								Description: True if the item is a
								subitem; false or null indicates a top-level item.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SubItem
	 * @var boolean
	 */
	public $SubItem;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to the
								item's parent entity.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ParentRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ParentRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Specifies the level of
								the item, 0 if top level parent, otherwise specifies the depth
								from the top parent.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Level
	 * @var integer
	 */
	public $Level;
	/**
	 * @Definition 
								Product: ALL
								Description: Fully qualified name
								of the entity. The fully qualified name prepends the topmost
								parent, followed by each sub element separated by colons. Takes
								the form of: [br /] Parent:Customer:Job:Sub-job [br /] Limited
								to 5 levels. Max. length: 41 characters (single name) or 209
								characters (fully qualified name).
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName FullyQualifiedName
	 * @var string
	 */
	public $FullyQualifiedName;
	/**
	 * @Definition 
								Product: ALL
								Description: True if the item is
								subject to tax.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Taxable
	 * @var boolean
	 */
	public $Taxable;
	/**
	 * @Definition 
								Product: ALL
								Description: True if the sales tax
								is included in the item amount, and therefore is not calculated
								for the transaction.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SalesTaxIncluded
	 * @var boolean
	 */
	public $SalesTaxIncluded;
	/**
	 * @Definition 
								Product: ALL
								Description: True if the tax amount
								is percentage based.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName PercentBased
	 * @var boolean
	 */
	public $PercentBased;
	/**
	 * @Definition 
								Product: ALL
								Description: Monetary value of the
								service or product, as expressed in the home currency.
								Filterable: QBW
								Sortable: QBW
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName UnitPrice
	 * @var float
	 */
	public $UnitPrice;
	/**
	 * @Definition 
								Product: ALL
								Description: The tax amount
								expressed as a percent of charges entered in the current
								transaction. To enter a rate of 10% use 10.0, not 0.01.[br
								/]Applicable to the Service, OtherCharge or Part (Non-Inventory)
								item types only, and only if the Purchase part of the item does
								not exist, that is, the item is not used as a reimbursable item,
								or as a part in assemblies.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RatePercent
	 * @var float
	 */
	public $RatePercent;
	/**
	 * @Definition 
								Product: ALL
								Description: Classification that
								specifies the use of this item. See the description at the top
								of the Item entity page for details. [br /]
								Filterable: ALL
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Type
	 * @var com\intuit\schema\finance\v3\IPPItemTypeEnum
	 */
	public $Type;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to a
								PaymentMethod for an item of type Payment.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PaymentMethodRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $PaymentMethodRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to the unit
								of measure set (UOM) entity used by this item.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName UOMSetRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $UOMSetRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to the
								posting account, that is, the account that records the proceeds
								from the sale of this item.[br /]Required for the the following
								types: Assembly, Inventory, Other Charge, Product, Service.
								Required: ALL
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName IncomeAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $IncomeAccountRef;
	/**
	 * @Definition 
								Product: ALL
								Description: User entered purchase
								description for the item.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PurchaseDesc
	 * @var string
	 */
	public $PurchaseDesc;
	/**
	 * @Definition 
								Product: ALL
								Description: True if the purchase
								tax is included in the item amount, and therefore is not
								calculated for the transaction.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PurchaseTaxIncluded
	 * @var boolean
	 */
	public $PurchaseTaxIncluded;
	/**
	 * @Definition 
								Product: ALL
								Description: Amount paid when
								buying or ordering the item, as expressed in the home currency.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PurchaseCost
	 * @var float
	 */
	public $PurchaseCost;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to the
								expense account used to pay the vendor for this item.[br /]Note:
								for a service item, this may also be an equity account to record
								a draw against the company equity to pay for the service.[br
								/]If the Purchase information (PurchaseDesc,
								PurchaseTaxIncluded, PurchaseCost, etc.) is provided, this
								account is required for the the following item types: Other
								Charge, Product, Service.
								Required: ALL
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ExpenseAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ExpenseAccountRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to the Cost
								of Goods Sold account for the inventory item.[br /]Required for
								the the following item types: Assembly, Inventory.
								Required: ALL
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName COGSAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $COGSAccountRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to the
								Inventory Asset account that tracks the current value of the
								inventory. If the same account is used for all inventory items,
								the current balance of this account will represent the current
								total value of the inventory.[br /]Required for the the
								following item types: Assembly, Inventory.
								Required: ALL
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AssetAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $AssetAccountRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to the
								preferred vendor of this item.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PrefVendorRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $PrefVendorRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Average cost of the
								item, expressed in the home currency.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AvgCost
	 * @var float
	 */
	public $AvgCost;
	/**
	 * @Definition 
								Product: QBO
								Description: Quantity on hand to be
								tracked.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TrackQtyOnHand
	 * @var boolean
	 */
	public $TrackQtyOnHand;
	/**
	 * @Definition 
								Product: ALL
								Description: Current quantity of
								the inventory items available for sale.
								Sortable: QBW
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName QtyOnHand
	 * @var float
	 */
	public $QtyOnHand;
	/**
	 * @Definition 
								Product: ALL
								Description: Quantity of the
								inventory item being ordered, for which there is a purchase
								order issued.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName QtyOnPurchaseOrder
	 * @var float
	 */
	public $QtyOnPurchaseOrder;
	/**
	 * @Definition 
								Product: ALL
								Description: Quantity of the
								inventory item that is placed on sales orders.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName QtyOnSalesOrder
	 * @var float
	 */
	public $QtyOnSalesOrder;
	/**
	 * @Definition 
								Product: ALL
								Description: Quantity on hand
								threshold below which a purchase order against this inventory
								item should be issued. When the QtyOnHand is less than the
								ReorderPoint, the QuickBooks purchase order system will prompt
								the user to reorder.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ReorderPoint
	 * @var float
	 */
	public $ReorderPoint;
	/**
	 * @Definition 
								Product: ALL
								Description: Identifier provided by
								manufacturer for the Item, for example, the model number.[br
								/]Applicable for the the following item types: Inventory,
								Product.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ManPartNum
	 * @var string
	 */
	public $ManPartNum;
	/**
	 * @Definition 
								Product: ALL
								Description: Optional reference to
								the account in which the payment money is deposited.[br /]If not
								specified, the Undeposited Funds account will be used.
								Applicable to the Payment item type only.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DepositToAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $DepositToAccountRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to the sales tax code for the item.[br /]Applicable
								to the Service, Other Charge, Part (Non-Inventory), Inventory
								and Assembly item types only.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SalesTaxCodeRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $SalesTaxCodeRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to the
								purchase tax code for the item.[br /]Applicable to the Service,
								Other Charge, and Part (Non-Inventory) item types.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PurchaseTaxCodeRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $PurchaseTaxCodeRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Date of the opening
								balance for the inventory transaction. QuickBooks creates the
								Opening Balance inventory transaction as of the given date, and
								calculates the total value by multiplying the cost by the
								quantity on hand.[br /]Applies to the Quantity On Hand and Total
								Value.[br /]Applicable to the Inventory and Assembly item types
								only.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName InvStartDate
	 * @var string
	 */
	public $InvStartDate;
	/**
	 * @Definition 
								Product: ALL
								Description: Assembly item
								QuantityOnHand threshold below which more assemblies should be
								built.[br /]Applicable to the Assembly Item type only.[br /]When
								he quantity of the assembly item gets below the BuildPoint
								number, QuickBooks will remind the user to build more.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BuildPoint
	 * @var float
	 */
	public $BuildPoint;
	/**
	 * @Definition 
								Product: QBW
								Description: Lets us know if the user wants to display the subitems as a
								group. Applicable to items of Group type only.
								Filterable: QBW
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PrintGroupedItems
	 * @var boolean
	 */
	public $PrintGroupedItems;
	/**
	 * @Definition 
								Product: ALL
								Description: True if this is a
								special item used by QuickBooks in certain accounting functions,
								including miscellaneous charges that do not fall into the
								categories of service, labor, materials, or parts. Examples
								include delivery charges, setup fees, and service charges.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SpecialItem
	 * @var boolean
	 */
	public $SpecialItem;
	/**
	 * @Definition 
								Product: ALL
								Description Type of special item,
								if SpecialItem is true.[br /]
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SpecialItemType
	 * @var com\intuit\schema\finance\v3\IPPSpecialItemTypeEnum
	 */
	public $SpecialItemType;
	/**
	 * @Definition 
								Product: ALL
								Description: Contains the detailed
								components of the group. Applicable to a group item only.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ItemGroupDetail
	 * @var com\intuit\schema\finance\v3\IPPItemGroupDetail
	 */
	public $ItemGroupDetail;
	/**
	 * @Definition 
								Product: ALL
								Description: Contains the detailed
								inventory parts used when the assembly is built. Applicable to
								an inventory assembly item only.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ItemAssemblyDetail
	 * @var com\intuit\schema\finance\v3\IPPItemAssemblyDetail
	 */
	public $ItemAssemblyDetail;
	/**
	 * @Definition 
								Product: QBO
								Description: India sales tax
								abatement rate.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AbatementRate
	 * @var float
	 */
	public $AbatementRate;
	/**
	 * @Definition 
								Product: QBO
								Description: India sales tax
								reverse charge rate.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ReverseChargeRate
	 * @var float
	 */
	public $ReverseChargeRate;
	/**
	 * @Definition 
								Product: QBO
								Description: India sales tax
								service type, see ServiceTypeEnum for values.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ServiceType
	 * @var string
	 */
	public $ServiceType;
	/**
	 * @Definition 
								Product: QBO
								Description: Categorizes the given item as a product or a service. The
								applicable values are those exposed through the
								ItemCategoryTypeEnum. This is currently applicable only in FR
								region.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ItemCategoryType
	 * @var string
	 */
	public $ItemCategoryType;
	/**
	 * @Definition Internal use only: extension place holder for
								Item
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ItemEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $ItemEx;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to the
								SalesTaxCode for this item.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxClassificationRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $TaxClassificationRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Unit of measure (UQC) text to be displayed for this line item in Invoice/Sales forms.
								Applicable for IN Region.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName UQCDisplayText
	 * @var string
	 */
	public $UQCDisplayText;
	/**
	 * @Definition 
								Product: ALL
								Description: Unit of measure for this line item as per the standard unit (UQC) defined under the GST rule. Example: KGS- kilograms, MTR- metres, SQF-  square feet. It will be shown in GSTR1 report.
								Applicable for IN Region.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName UQCId
	 * @var string
	 */
	public $UQCId;
	/**
	 * @Definition 
								Product: QBO
								Description: Reference to the Class
								for this item.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ClassRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ClassRef;
	/**
	 * @Definition 
								Product: QBO
								Description: Originating source of
								the Item. Valid values are defined in SourceTypeEnum
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Source
	 * @var string
	 */
	public $Source;


} // end class IPPItem
