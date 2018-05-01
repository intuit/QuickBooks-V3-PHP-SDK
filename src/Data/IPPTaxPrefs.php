<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPTaxPrefs
 * @var IPPTaxPrefs
 */
class IPPTaxPrefs
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
            if (property_exists('IPPTaxPrefs', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTaxPrefs', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName UsingSalesTax
     * @var boolean
     */
    public $UsingSalesTax;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PartnerTaxEnabled
     * @var boolean
     */
    public $PartnerTaxEnabled;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName HideTaxManagement
     * @var boolean
     */
    public $HideTaxManagement;
    /**
     * @Definition
                            Product: QBW
                            Description: US only? reference to a
                            TaxCode entity where the group field of the referenced entity is
                            true, that is, a TaxCode representing a list of tax rates that
                            should apply by default.

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
                            Description: US-only? reference to a
                            TaxRate entity indicating the sales tax to apply by default.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxRateRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $TaxRateRef;
    /**
     * @Definition
                        Product: QBW
                        Description:

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PaySalesTax
     * @var com\intuit\schema\finance\v3\IPPPaySalesTaxEnum
     */
    public $PaySalesTax;
    /**
     * @Definition
                        Product: QBW
                        [b]QuickBooks Notes[/b][br /]
                        Max
                        Length: 3

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName NonTaxableSalesTaxCodeRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $NonTaxableSalesTaxCodeRef;
    /**
     * @Definition
                        Product: QBW
                        [b]QuickBooks Notes[/b][br /]
                        Max
                        Length: 3

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxableSalesTaxCodeRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $TaxableSalesTaxCodeRef;
} // end class IPPTaxPrefs
