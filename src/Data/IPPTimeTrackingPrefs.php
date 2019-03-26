<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPTimeTrackingPrefs
 * @var IPPTimeTrackingPrefs
 * @xmlDefinition Defines VendorAndPurchase Prefs details
			
 */
class IPPTimeTrackingPrefs
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
				if (property_exists('IPPTimeTrackingPrefs',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTimeTrackingPrefs',$initPropName))
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
						Product:QBO
						Enables services for time tracking
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName UseServices
	 * @var boolean
	 */
	public $UseServices;
	/**
	 * @Definition Product:QBO Default TimeItem Id
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DefaultTimeItem
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $DefaultTimeItem;
	/**
	 * @Definition 
						Product:QBO
						Enables billing customers for time
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BillCustomers
	 * @var boolean
	 */
	public $BillCustomers;
	/**
	 * @Definition 
						Product:QBO
						Enables billing rate to all employees
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ShowBillRateToAll
	 * @var boolean
	 */
	public $ShowBillRateToAll;
	/**
	 * @Definition 
						Product:All
						Work week starting day
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName WorkWeekStartDate
	 * @var com\intuit\schema\finance\v3\IPPWeekEnum
	 */
	public $WorkWeekStartDate;
	/**
	 * @Definition 
						Product:QBW
						Time Tracking preference from QB
						Desktop
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TimeTrackingEnabled
	 * @var boolean
	 */
	public $TimeTrackingEnabled;
	/**
	 * @Definition 
						Product:QBW
						MarkTimeEntriesBillable preference
						from QB Desktop
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MarkTimeEntriesBillable
	 * @var boolean
	 */
	public $MarkTimeEntriesBillable;
	/**
	 * @Definition 
						Product:QBW
						MarkExpensesAsBillable preference from
						QB Desktop
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MarkExpensesAsBillable
	 * @var boolean
	 */
	public $MarkExpensesAsBillable;


} // end class IPPTimeTrackingPrefs
