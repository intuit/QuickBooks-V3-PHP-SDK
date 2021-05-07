<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType NameBase
 * @xmlName IPPVendor
 * @var IPPVendor
 * @xmlDefinition  Describes the Party as a Vendor Role view 
 */
class IPPVendor
	extends IPPNameBase	{

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
				if (property_exists('IPPVendor',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPVendor',$initPropName))
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
	 * @Definition  Name of the contact within the vendor. Used by QBD only
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ContactName
	 * @var string
	 */
	public $ContactName;
	/**
	 * @Definition  Name of the Alternate contact within the vendor. Used by QBD only
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AltContactName
	 * @var string
	 */
	public $AltContactName;
	/**
	 * @Definition 
								Product: ALL
								Description: Free form text describing the Vendor.[br /]Max. length: 1024 characters.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName Notes
	 * @var string
	 */
	public $Notes;
	/**
	 * @Definition 
								Product: ALL
								Description: Default billing address.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName BillAddr
	 * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
	 */
	public $BillAddr;
	/**
	 * @Definition 
								Product: ALL
								Description: Default shipping address.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName ShipAddr
	 * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
	 */
	public $ShipAddr;
	/**
	 * @Definition 
								Product: QBW only.
								Description: An address other than default billing  or shipping.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName OtherAddr
	 * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
	 */
	public $OtherAddr;
	/**
	 * @Definition 
								Product: QBW.
								Description: Country of Vendor.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxCountry
	 * @var string
	 */
	public $TaxCountry;
	/**
	 * @Definition Specifies the Tax ID of the Person or Organization 
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxIdentifier
	 * @var string
	 */
	public $TaxIdentifier;
	/**
	 * @Definition 
                                Product: QBO
                                Description: Specifies the date of registeration of Supplier. Applicable for IN Region and in future can be extended to other regions.
                            
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxIdEffectiveDate
	 * @var string
	 */
	public $TaxIdEffectiveDate;
	/**
	 * @Definition 
								Product: QBW.
								Description: Business Number of the Vendor. Applicable for CA/UK versions of QuickBooks.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BusinessNumber
	 * @var string
	 */
	public $BusinessNumber;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ParentRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ParentRef;
	/**
	 * @Definition 
								Product: QBW.
								Description: Reference to the VendorType.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName VendorTypeRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $VendorTypeRef;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TermRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $TermRef;
	/**
	 * @Definition 
								Product: QBW.
								Description: Reference to the PrefillAccount.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PrefillAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $PrefillAccountRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Specifies the open balance amount or the amount unpaid by the vendor. For the create operation, this represents the opening balance for the vendor. When returned in response to the query request it represents the current open balance (unpaid amount) for that vendor.
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
								 BillRate can be set to specify this vendor's hourly billing rate.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BillRate
	 * @var float
	 */
	public $BillRate;
	/**
	 * @Definition Specifies the date of the Open Balance.
								Non QB-writable.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName OpenBalanceDate
	 * @var string
	 */
	public $OpenBalanceDate;
	/**
	 * @Definition Specifies the maximum amount of an unpaid vendor balance.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CreditLimit
	 * @var float
	 */
	public $CreditLimit;
	/**
	 * @Definition Name or number of the account associated with this vendor.
								Length Restriction:
								QBO: 15
								QBD: 1024
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AcctNum
	 * @var string
	 */
	public $AcctNum;
	/**
	 * @Definition The Vendor is an independent contractor, someone who is given a 1099-MISC form at the end of the year. The "1099 Vendor" is paid with regular checks, and taxes are not withhold on their behalf.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Vendor1099
	 * @var boolean
	 */
	public $Vendor1099;
	/**
	 * @Definition 
								Product: QBW
								Description: True if vendor is T4A eligible. Applicable for CA/UK versions of quickbooks.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName T4AEligible
	 * @var boolean
	 */
	public $T4AEligible;
	/**
	 * @Definition 
								Product: QBW
								Description: True if vendor is T5018 eligible. Applicable for CA/UK versions of quickbooks.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName T5018Eligible
	 * @var boolean
	 */
	public $T5018Eligible;
	/**
	 * @Definition Reference to the currency all the business transactions created for or received from that vendor are created in.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CurrencyRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $CurrencyRef;
	/**
	 * @Definition 
								Product: QBO
								Description: True, if TDS (Tax Deducted at Source) is enabled for this Vendor.
								If enabled, TDS metadata needs to be passsed in VendorEx field.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TDSEnabled
	 * @var boolean
	 */
	public $TDSEnabled;
	/**
	 * @Definition 
								Product: QBO
								Description: Entity Type of the Vendor.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TDSEntityTypeId
	 * @var integer
	 */
	public $TDSEntityTypeId;
	/**
	 * @Definition 
								Product: QBO
								Description: Default TDS section type for the vendor to be used in transaction.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TDSSectionTypeId
	 * @var integer
	 */
	public $TDSSectionTypeId;
	/**
	 * @Definition 
								Product: QBO
								Description: True, if TDS threshold calculation should be overriden.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TDSOverrideThreshold
	 * @var boolean
	 */
	public $TDSOverrideThreshold;
	/**
	 * @Definition 
                                Product: QBO
                                Description: The tax reporting basis for the supplier. The applicable values are those exposed through the TaxReportBasisTypeEnum.  This is applicable only in FR.
                            
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxReportingBasis
	 * @var string
	 */
	public $TaxReportingBasis;
	/**
	 * @Definition 
                                Product: QBO
                                Description: The A/P account ID for the supplier. This is applicable only in FR where each supplier needs to have his own AP account.
                            
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName APAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $APAccountRef;
	/**
	 * @Definition Internal use only: extension place holder for Vendor.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName VendorEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $VendorEx;
	/**
	 * @Definition 
								GST Identification Number of the Vendor.
								Applicable for IN region only.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName GSTIN
	 * @var string
	 */
	public $GSTIN;
	/**
	 * @Definition 
								GST registration type of the Vendor.
								Applicable for IN region only.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName GSTRegistrationType
	 * @var string
	 */
	public $GSTRegistrationType;
	/**
	 * @Definition 
								Product: QBO only
								Description: True if the vendor is subcontractor
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName IsSubContractor
	 * @var boolean
	 */
	public $IsSubContractor;
	/**
	 * @Definition Specifies the Subcontractor type. Applicable only for UK region, values are defined in the SubcontractorTypeEnum.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SubcontractorType
	 * @var string
	 */
	public $SubcontractorType;
	/**
	 * @Definition Specifies the CIS Rate. Applicable only for UK region, values are defined in the CISRateEnum.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CISRate
	 * @var string
	 */
	public $CISRate;
	/**
	 * @Definition 
								Product: QBO Only
								Description: True if the Vendor has TPAR. Applicable for AU region only.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName HasTPAR
	 * @var boolean
	 */
	public $HasTPAR;
	/**
	 * @Definition 
								Product: QBO Only
								Description: Contains Bank Account details to enable Vendor Batch Payment. Applicable for AU region only.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName VendorPaymentBankDetail
	 * @var com\intuit\schema\finance\v3\IPPVendorBankAccountDetail
	 */
	public $VendorPaymentBankDetail;
	/**
	 * @Definition 
								Product: QBO
								Description: Originating source of
								the Vendor. Valid values are defined in SourceTypeEnum
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Source
	 * @var string
	 */
	public $Source;


} // end class IPPVendor
