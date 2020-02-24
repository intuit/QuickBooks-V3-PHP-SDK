<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType PurchaseByVendor
 * @xmlName IPPVendorCredit
 * @var IPPVendorCredit
 * @xmlDefinition Bill is an AP transaction representing a
				request-for-payment from a third party for goods/services rendered
				and/or received
 */
class IPPVendorCredit
	extends IPPPurchaseByVendor	{

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
				if (property_exists('IPPVendorCredit',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPVendorCredit',$initPropName))
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
								Description: Vendor Mailing Address
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName VendorAddr
	 * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
	 */
	public $VendorAddr;
	/**
	 * @Definition Internal use only: extension place holder for
								Bill extensible element to qualify account.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName VendorCreditEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $VendorCreditEx;
	/**
	 * @Definition 
								Product: ALL
								Description: The unpaid amount of the bill. When paid-in-full, balance will
								be zero.
								[b]QuickBooks Notes[/b][br /]
								Non QB-writable.
								Filterable: QBW
								Sortable: QBW
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Balance
	 * @var float
	 */
	public $Balance;
	/**
	 * @Definition 
								Product: QBO Only
								Description: True if the VendorCredit should be included in annual TPAR, specific to AU region.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName IncludeInAnnualTPAR
	 * @var boolean
	 */
	public $IncludeInAnnualTPAR;


} // end class IPPVendorCredit
