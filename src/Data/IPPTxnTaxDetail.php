<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPTxnTaxDetail
 * @var IPPTxnTaxDetail
 * @xmlDefinition 
				Product: ALL
				Description: Details of taxes charged
				on the transaction as a whole. For US versions of QuickBooks, tax
				rates used in the detail section must not be used in any tax line
				appearing in the main transaction body. For international versions
				of QuickBooks, the TxnTaxDetail should provide the details of all
				taxes (sales or purchase) calculated for the transaction based on
				the tax codes referenced by the transaction. This can be calculated
				by QuickBooks business logic or you may supply it when adding a
				transaction. For US versions of QuickBooks you need only supply the
				tax code for the customer and the tax code (in the case of multiple
				rates) or tax rate (for a single rate) to apply for the transaction
				as a whole.[br]See [a
				href="http://ipp.developer.intuit.com/0010_Intuit_Partner_Platform/0060_Financial_Management_Services_(v3)/01100_Global_Tax_Model"]Global
				Tax Model[/a].
			
 */
class IPPTxnTaxDetail
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
				if (property_exists('IPPTxnTaxDetail',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTxnTaxDetail',$initPropName))
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
						Description: Reference to the default tax code that applies to the transaction
						as a whole.
						In Quickbooks desktop, this maps to CustomerTaxCode in Invoice and
						VendorTaxCode in Bill.
						[span style="display: none"] I18n: US [/span]
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DefaultTaxCodeRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $DefaultTaxCodeRef;
	/**
	 * @Definition 
						Product: All
						Description: Reference to the
						transaction tax code. For US editions only.
						Note that the US tax model can have just a single tax code for the
						entire transaction.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TxnTaxCodeRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $TxnTaxCodeRef;
	/**
	 * @Definition 
						Product: ALL
						Description: Total tax calculated for the transaction, excluding any embedded
						tax lines.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TotalTax
	 * @var float
	 */
	public $TotalTax;
	/**
	 * @Definition 
						Product: ALL
						Description: Enumerated reasons to review Taxes on the Transaction.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxReviewStatus
	 * @var com\intuit\schema\finance\v3\IPPTaxReviewStatusEnum
	 */
	public $TaxReviewStatus;
	/**
	 * @Definition 
						Product: ALL
						Description: This must be a Line whose LineDetailType is TaxLineDetail.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName TaxLine
	 * @var com\intuit\schema\finance\v3\IPPLine
	 */
	public $TaxLine;
	/**
	 * @Definition 
						Product: All
						Description: This is a boolean which defines if developer intends to use
						Automated Sales Tax or tax code that they have provided in the payload.
						If the v3 developer sets this to true, then txn going in QBO will always
						have AST rates. In case this flag is set to false, then it will depend on the
						QBO user pref - AllowPartnerTaxOverride, which tells if QBO user wants to allow
						v3 app to override AST rates or not. If user allows v3 apps to override AST,
						then the txn will get saved with v3 app specified rates.
						[span style="display: none"] I18n: US [/span]
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName UseAutomatedSalesTax
	 * @var boolean
	 */
	public $UseAutomatedSalesTax;


} // end class IPPTxnTaxDetail
