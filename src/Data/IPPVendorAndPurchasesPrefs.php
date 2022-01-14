<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPVendorAndPurchasesPrefs
 * @var IPPVendorAndPurchasesPrefs
 * @xmlDefinition Defines VendorAndPurchase Prefs details
			
 */
class IPPVendorAndPurchasesPrefs
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
				if (property_exists('IPPVendorAndPurchasesPrefs',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPVendorAndPurchasesPrefs',$initPropName))
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
						Product:All
						Enables manage bills
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EnableBills
	 * @var boolean
	 */
	public $EnableBills;
	/**
	 * @Definition 
						Product:All
						Enables tracking by customers
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TrackingByCustomer
	 * @var boolean
	 */
	public $TrackingByCustomer;
	/**
	 * @Definition 
						Product:All
						Enable BillableExpense tracking
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BillableExpenseTracking
	 * @var boolean
	 */
	public $BillableExpenseTracking;
	/**
	 * @Definition 
						Product:All
						Default Terms
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DefaultTerms
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $DefaultTerms;
	/**
	 * @Definition 
						Product:All
						Default markup rate used to calculate
						the markup amount on the transactions. To enter a markup rate of
						8.5%, enter 8.5, not 0.085.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DefaultMarkup
	 * @var float
	 */
	public $DefaultMarkup;
	/**
	 * @Definition 
						Product:All
						Default markup Account used to
						calculate the markup amount on the transactions.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DefaultMarkupAccount
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $DefaultMarkupAccount;
	/**
	 * @Definition 
						Product:All
						Apply automatic bill payment
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AutomaticBillPayment
	 * @var boolean
	 */
	public $AutomaticBillPayment;
	/**
	 * @Definition 
						Product:All
						Enables TPAR by vendors
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TPAREnabled
	 * @var boolean
	 */
	public $TPAREnabled;
	/**
	 * @Definition 
						Product:QBW
						Defines the CustomField definitions
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName POCustomField
	 * @var com\intuit\schema\finance\v3\IPPCustomFieldDefinition
	 */
	public $POCustomField;
	/**
	 * @Definition 
						Product:All
						Message to vendors
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MsgToVendors
	 * @var string
	 */
	public $MsgToVendors;
	/**
	 * @Definition 
						Product:QBO
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName UsingInventory
	 * @var boolean
	 */
	public $UsingInventory;
	/**
	 * @Definition 
						Product:QBW
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName UsingMultiLocationInventory
	 * @var boolean
	 */
	public $UsingMultiLocationInventory;
	/**
	 * @Definition 
						Product:QBW
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DaysBillsAreDue
	 * @var integer
	 */
	public $DaysBillsAreDue;
	/**
	 * @Definition 
						Cloud Max Length: 4000
						[b]QuickBooks Notes[/b][br
						/]
						Max Length: 31 or 159 (for a fully qualified name)
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DiscountAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $DiscountAccountRef;


} // end class IPPVendorAndPurchasesPrefs
