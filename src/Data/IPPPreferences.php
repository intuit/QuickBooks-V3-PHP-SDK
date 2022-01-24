<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPPreferences
 * @var IPPPreferences
 * @xmlDefinition Defines Preference strongly typed object with
				extensions 
 */
class IPPPreferences
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
				if (property_exists('IPPPreferences',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPPreferences',$initPropName))
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
	 * @Definition Accounting info Preferences
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AccountingInfoPrefs
	 * @var IPPCompanyAccountingPrefs
	 */
	public $AccountingInfoPrefs;
	/**
	 * @Definition Accounting info Preferences
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AdvancedInventoryPrefs
	 * @var IPPAdvancedInventoryPrefs
	 */
	public $AdvancedInventoryPrefs;
	/**
	 * @Definition Product and Service Preferences
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ProductAndServicesPrefs
	 * @var IPPProductAndServicesPrefs
	 */
	public $ProductAndServicesPrefs;
	/**
	 * @Definition Sales Form Preferences
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SalesFormsPrefs
	 * @var IPPSalesFormsPrefs
	 */
	public $SalesFormsPrefs;
	/**
	 * @Definition Email messages Preferences
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EmailMessagesPrefs
	 * @var IPPEmailMessagesPrefs
	 */
	public $EmailMessagesPrefs;
	/**
	 * @Definition Printable document preferences
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PrintDocumentPrefs
	 * @var IPPPrintDocumentPrefs
	 */
	public $PrintDocumentPrefs;
	/**
	 * @Definition Vendor and purchases Preferences
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName VendorAndPurchasesPrefs
	 * @var IPPVendorAndPurchasesPrefs
	 */
	public $VendorAndPurchasesPrefs;
	/**
	 * @Definition Vendor and purchases Preferences
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TimeTrackingPrefs
	 * @var IPPTimeTrackingPrefs
	 */
	public $TimeTrackingPrefs;
	/**
	 * @Definition Tax Preferences
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxPrefs
	 * @var IPPTaxPrefs
	 */
	public $TaxPrefs;
	/**
	 * @Definition FinanceCharges Preferences
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName FinanceChargesPrefs
	 * @var IPPFinanceChargePrefs
	 */
	public $FinanceChargesPrefs;
	/**
	 * @Definition Currency Preferences
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CurrencyPrefs
	 * @var IPPCurrencyPrefs
	 */
	public $CurrencyPrefs;
	/**
	 * @Definition Report Preferences
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ReportPrefs
	 * @var IPPReportPrefs
	 */
	public $ReportPrefs;
	/**
	 * @Definition  Specifies extension of Preference entity to
								allow extension of Name-Value pair based extension at the top
								level
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName OtherPrefs
	 * @var IPPOtherPrefs
	 */
	public $OtherPrefs;


} // end class IPPPreferences
