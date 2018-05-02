<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPTaxRate
 * @var IPPTaxRate
 * @xmlDefinition
                Product: ALL
                Description: A sales tax rate specifies
                the tax rate for the specific TaxCode.[br]See [a
                href="http://ipp.developer.intuit.com/0010_Intuit_Partner_Platform/0060_Financial_Management_Services_(v3)/01100_Global_Tax_Model"]Global
                Tax Model[/a].

 */
class IPPTaxRate extends IPPIntuitEntity
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
    public function __construct($keyValInitializers = array(), $verbose = false)
    {
        foreach ($keyValInitializers as $initPropName => $initPropVal) {
            if (property_exists('IPPTaxRate', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTaxRate', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition
                                Product: QBW
                                Description: User recognizable name
                                for the tax rate.[br /]Max. Length: 31 characters.[br /]Required
                                for the Create request.
                                Required: QBW
                                ValidRange: QBW: Max=31
                                Filterable: QBW

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Name
     * @var string
     */
    public $Name;
    /**
     * @Definition
                                Product: QBW
                                Description: User entered
                                description for the tax rate.[br /]Max Length: 4000 characters.
                                ValidRange: QBW: Max=4000

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
                                Description: False or null if
                                inactive. Inactive sales rate codes may be hidden from display
                                and may not be used on financial transactions.
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
                                Description: Represents rate value.
                                Filterable: QBW

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName RateValue
     * @var float
     */
    public $RateValue;
    /**
     * @Definition
                                Product: ALL
                                Description: Represents Agency
                                Reference, Vendor Reference in case of QBW, Agency in case of
                                QBO.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AgencyRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $AgencyRef;
    /**
     * @Definition
                                Product: ALL
                                Description: TaxReturnLine is
                                representative of SalesTaxReturnLine reference

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxReturnLineRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $TaxReturnLineRef;
    /**
     * @Definition
                                Product: QBO
                                Description: Effective list rates
                                for different date ranges

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName EffectiveTaxRate
     * @var com\intuit\schema\finance\v3\IPPEffectiveTaxRate
     */
    public $EffectiveTaxRate;
    /**
     * @Definition
                                Product: QBO
                                Description: Used for Zero rates
                                for EC VAT.
                                How it is used: VAT registered Businesses who receive
                                goods/services (acquisitions) from other EU countries,
                                will need to calculate the VAT due, but not paid, on these
                                acquisitions. The rate of VAT payable is the same that would
                                have been paid if the goods had been supplied by a UK supplier.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SpecialTaxType
     * @var com\intuit\schema\finance\v3\IPPSpecialTaxTypeEnum
     */
    public $SpecialTaxType;
    /**
     * @Definition
                                Product: QBO
                                Description: DisplayType of a tax
                                rate, configuration of editability and display on forms

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DisplayType
     * @var com\intuit\schema\finance\v3\IPPTaxRateDisplayTypeEnum
     */
    public $DisplayType;
    /**
     * @Definition
                                Product: ALL
                                Description: Internal use only:
                                extension place holder for TaxRate

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxRateEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $TaxRateEx;
} // end class IPPTaxRate
