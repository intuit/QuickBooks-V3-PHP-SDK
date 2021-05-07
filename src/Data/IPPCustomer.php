<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType NameBase
 * @xmlName IPPCustomer
 * @var IPPCustomer
 * @xmlDefinition 
				Product: ALL
				Description: QBO: The Customer entityrepresents the consumer of the service or the product that your business offers. QBO allows categorizing the customers in a way that is meaningful to the business. For example, you can set up a category of customers to indicate which industry a customer represents, the geographic location of a customer, or how a customer came to know about the business. The categorization can be then used for reports or mails.
				Description: QBW: The Customer entity is a consumer of the service or product that your business offers. While creating a customer, avoid entering  job data. If you enter a job data, the system can prevent you from adding   more jobs for that customer. You must first create the customer, and then create a job using that customer as a parent.
				Business Rules: [li]The customer name must be unique.[/li][li]The customer name must not contain a colon (:).[/li][li]The e-mail address of the customer must contain "@" and "." (dot).[/li][li]The customer address field is mandatory.[/li]
			
 */
class IPPCustomer
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
				if (property_exists('IPPCustomer',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCustomer',$initPropName))
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
								Product: QBO only
								Description: True if the customer is taxable.
							
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
								Product: QBW
								Description: Name of the Customer contact.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ContactName
	 * @var string
	 */
	public $ContactName;
	/**
	 * @Definition 
								Product: QBW
								Description: Name of the Alternate Customer contact.
							
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
								Description: Free form text describing the Customer.[br /]Max. length: 1024 characters.
							
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
								Description: If true, this is a Job or sub-customer. If false or null, this is a top level customer, not a Job or sub-customer.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Job
	 * @var boolean
	 */
	public $Job;
	/**
	 * @Definition 
								Product: ALL
								Description: If true, this Customer is billed with its parent. If false, or null the customer is not to be billed with its parent. This property is valid only if this entity is a Job or sub Customer.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BillWithParent
	 * @var boolean
	 */
	public $BillWithParent;
	/**
	 * @Definition 
								Product: QBO
								Description: The top level Customer in the hierarchy to which this Job or sub customer belongs.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RootCustomerRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $RootCustomerRef;
	/**
	 * @Definition 
								Product: ALL
								Description: The immediate parent of the Sub-Customer/Job in the hierarchical "Customer:Job" list.[br /]Required for the create operation if the Customer is a sub-customer or Job.
							
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
								Description: Specifies the level of the hirearchy in which the entity is located. Zero specifies the top level of the hierarchy; anything above will be level with respect to the parent.
							
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
								Description: Reference to a CustomerType associated with the Customer.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CustomerTypeRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $CustomerTypeRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to a SalesTerm associated with the Customer.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SalesTermRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $SalesTermRef;
	/**
	 * @Definition 
								Product: QBW
								Description: Reference to a SalesRep associated with the Customer.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SalesRepRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $SalesRepRef;
	/**
	 * @Definition 
									Product: QBW
									Description: US-only, reference to a TaxCode entity where the group field of the referenced entity is true, that is, a TaxCode representing a list of tax rates that apply for the customer.
								
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxGroupCodeRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $TaxGroupCodeRef;
	/**
	 * @Definition 
									Product: QBW
									Description: US-only, reference to a TaxRate entity indicating the sales tax to apply by default for the customer.
								
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxRateRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $TaxRateRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to a PaymentMethod associated with the Customer.
							
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
								Description: Credit-card information to request a credit card payment from a merchant account service.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName CCDetail
	 * @var com\intuit\schema\finance\v3\IPPCreditChargeInfo
	 */
	public $CCDetail;
	/**
	 * @Definition 
								Product: QBW
								Description: Reference to a PriceLevel associated with the Customer.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PriceLevelRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $PriceLevelRef;
	/**
	 * @Definition 
								Product: ALL
								Description: Specifies the open balance amount or the amount unpaid by the customer. For the create operation, this represents the opening balance for the customer. When returned in response to the query request it represents the current open balance (unpaid amount) for that customer.
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
								Product: ALL
								Description: Date of the Open Balance for the create operation.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName OpenBalanceDate
	 * @var string
	 */
	public $OpenBalanceDate;
	/**
	 * @Definition 
								Product: QBW
								Description: Cumulative open balance amount for the Customer (or Job) and all its sub-jobs. Cannot be written to QuickBooks.
								Product: QBO
								Description: Cumulative open balance amount for the Customer (or Job) and all its sub-jobs.
								Filterable: ALL
								Non-default: ALL
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BalanceWithJobs
	 * @var float
	 */
	public $BalanceWithJobs;
	/**
	 * @Definition 
								Product: QBW
								Description: Specifies the maximum amount of an unpaid customer balance.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CreditLimit
	 * @var float
	 */
	public $CreditLimit;
	/**
	 * @Definition 
								Product: QBW
								Description: Name or number of the account associated with this customer.[br /]Max. length: 99 characters.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AcctNum
	 * @var string
	 */
	public $AcctNum;
	/**
	 * @Definition 
								Product: ALL
								Description: Reference to the currency code for all the business transactions created for or received from the customer.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CurrencyRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $CurrencyRef;
	/**
	 * @Definition 
								Product: QBW
								Description: Over-due balance amount. Cannot be written to QuickBooks.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName OverDueBalance
	 * @var float
	 */
	public $OverDueBalance;
	/**
	 * @Definition 
								Product: QBW
								Description: The total revenue amount from the Customer. Cannot be written to QuickBooks.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TotalRevenue
	 * @var float
	 */
	public $TotalRevenue;
	/**
	 * @Definition 
								Product: QBW
								Description: The total expense amount for the Customer. Cannot be written to QuickBooks.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TotalExpense
	 * @var float
	 */
	public $TotalExpense;
	/**
	 * @Definition 
								Product: ALL
								Description: Preferred delivery method. Vales are Print, Email, or None.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PreferredDeliveryMethod
	 * @var string
	 */
	public $PreferredDeliveryMethod;
	/**
	 * @Definition 
								Product: ALL
								Description: Resale number or some additional info about the customer.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ResaleNum
	 * @var string
	 */
	public $ResaleNum;
	/**
	 * @Definition 
								Product: ALL
								Description: Information about the job. Relevant only if the Customer represents the actual task or project, not just a person or organization.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName JobInfo
	 * @var com\intuit\schema\finance\v3\IPPJobInfo
	 */
	public $JobInfo;
	/**
	 * @Definition 
								Product: QBO
								Description: True, if TDS (Tax Deducted at Source) is enabled for this customer.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TDSEnabled
	 * @var boolean
	 */
	public $TDSEnabled;
	/**
	 * @Definition 
								Product: ALL
								Description: Internal use only: extension place holder for Customer.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CustomerEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $CustomerEx;
	/**
	 * @Definition 
                                Product: QBO
                                Description: Specifies secondary Tax ID of the Person or Organization. Applicable for IN companies for CST Registration No. and in future can be extended to other regions.
                            
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SecondaryTaxIdentifier
	 * @var string
	 */
	public $SecondaryTaxIdentifier;
	/**
	 * @Definition 
                                Product: QBO
                                Description: The A/R account ID for the customer. This is applicable only in FR where each customer needs to have his own AR account.
                            
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ARAccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ARAccountRef;
	/**
	 * @Definition 
                                Product: QBO
                                Description:  Specifies primary Tax ID of the Person or Organization.
                            
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PrimaryTaxIdentifier
	 * @var string
	 */
	public $PrimaryTaxIdentifier;
	/**
	 * @Definition 
								Product: QBO
								Description: Specifies tax exemption reason to be associated with Customer
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName TaxExemptionReasonId
	 * @var string
	 */
	public $TaxExemptionReasonId;
	/**
	 * @Definition 
								Product: QBO
								Description: Specifies whether this customer is a project.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName IsProject
	 * @var boolean
	 */
	public $IsProject;
	/**
	 * @Definition 
								Business Number of the Customer.
								Applicable to CA/UK/IN versions of QuickBooks. Referred to as PAN in India.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BusinessNumber
	 * @var string
	 */
	public $BusinessNumber;
	/**
	 * @Definition 
								GST Identification Number of the Customer.
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
								GST registration type of the Customer.
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
								Description: True if the customer is CIS contractor
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName IsCISContractor
	 * @var boolean
	 */
	public $IsCISContractor;
	/**
	 * @Definition 
								Internal use only: Applicable only for Accountant companies, Not null represents associated QBO company id. (Readonly)
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ClientCompanyId
	 * @var string
	 */
	public $ClientCompanyId;
	/**
	 * @Definition 
								Internal use only: Applicable only for Accountant companies, External reference for Customer. (ReadOnly)
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ClientEntityId
	 * @var string
	 */
	public $ClientEntityId;
	/**
	 * @Definition 
								Product: QBO
								Description: Originating source of
								the Customer. Valid values are defined in SourceTypeEnum
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Source
	 * @var string
	 */
	public $Source;


} // end class IPPCustomer
