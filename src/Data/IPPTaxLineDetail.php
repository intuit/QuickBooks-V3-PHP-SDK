<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPTaxLineDetail
 * @var IPPTaxLineDetail
 * @xmlDefinition 
				Product: ALL
				Description: Tax detail for a
				transaction line.
			
 */
class IPPTaxLineDetail
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
				if (property_exists('IPPTaxLineDetail',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTaxLineDetail',$initPropName))
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
						Description: Reference to a TaxRate.
						For all editions of QuickBooks, for TaxLineDetail line types that
						apply a specific TaxRate to the preceding line of the transaction,
						this
						is a reference to that TaxRate. For a TaxLineDetail in a
						TxnTaxDetail, where the TxnTaxCodeRef is set, the TaxRate
						referenced here MUST also be
						one of the rates in the referenced tax code's rate list (either the
						SalesTaxRateList or the PurchaseTaxRateList) that applies to the
						transaction type.[br /]
						For international editions of QuickBooks,
						for a TaxLineDetail in a TxnTaxDetail, the rate referenced here
						must be referenced by a TaxCode used on a transaction
						line. Any given rate may only be listed once.[br]See [a
						href="http://ipp.developer.intuit.com/0010_Intuit_Partner_Platform/0060_Financial_Management_Services_(v3)/01100_Global_Tax_Model"]Global
						Tax Model[/a].
						Product: QBO
						Description: For US editions of
						QuickBooks Online, and in TxnTaxDetail only, this references the
						TaxRate applied to the entire transaction.[br /]
						For international
						editions of QuickBooks Online, for a TaxLineDetail in a
						TxnTaxDetail, where the TxnTaxCodeRef is set, the TaxRate
						referenced
						here MUST also be one of the rates in the referenced tax code's rate
						list (either the SalesTaxRateList or the PurchaseTaxRateList) that
						applies to the
						transaction type. Any given rate may only be listed once.[br /]Does not apply
						to a TaxLineDetail apart from a TxnTaxDetail.[br]See [a
						href="http://ipp.developer.intuit.com/0010_Intuit_Partner_Platform/0060_Financial_Management_Services_(v3)/01100_Global_Tax_Model"]Global
						Tax Model[/a].
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName TaxRateRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $TaxRateRef;
	/**
	 * @Definition 
						Product: ALL
						Description: True if the sales tax is
						expressed as a percentage; false if expressed as a number amount.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PercentBased
	 * @var boolean
	 */
	public $PercentBased;
	/**
	 * @Definition 
						Product: ALL
						Description: Numerical expression of
						the sales tax percent. For example, use "8.5" not "0.085".
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxPercent
	 * @var float
	 */
	public $TaxPercent;
	/**
	 * @Definition 
						Product: QBO
						Description: This is taxable amount
						on the total of the applicable tax rates
						If TaxRate is applicable
						on two lines, the taxableamount represents total of the two lines
						for which this rate is applied
						This is different from the
						Line.Amount which represent the final tax amount after the tax has
						been applied
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName NetAmountTaxable
	 * @var float
	 */
	public $NetAmountTaxable;
	/**
	 * @Definition 
						Product: QBO
						Description: This is the amount which
						also includes tax.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName TaxInclusiveAmount
	 * @var float
	 */
	public $TaxInclusiveAmount;
	/**
	 * @Definition 
						Product: QBO
						Description: This holds the
						difference between the actual tax and overridden amount supplied
						by the user.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName OverrideDeltaAmount
	 * @var float
	 */
	public $OverrideDeltaAmount;
	/**
	 * @Definition 
						Product: ALL
						Description: Date when the service is
						performed.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ServiceDate
	 * @var string
	 */
	public $ServiceDate;
	/**
	 * @Definition 
						Product: ALL
						Description: Internal use only:
						extension place holder for TaxLine.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxLineDetailEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $TaxLineDetailEx;


} // end class IPPTaxLineDetail
