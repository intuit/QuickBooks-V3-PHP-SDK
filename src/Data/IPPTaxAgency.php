<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType Vendor
 * @xmlName IPPTaxAgency
 * @var IPPTaxAgency
 * @xmlDefinition
                Product: ALL
                Description: Represents a tax agency to whom sales/purchase/VAT taxes collected are paid

 */
class IPPTaxAgency extends IPPVendor
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
            if (property_exists('IPPTaxAgency', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTaxAgency', $initPropName)) {
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
     * @xmlName SalesTaxCodeRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $SalesTaxCodeRef;
    /**
     * @Definition We'll need an Enum for the usual countries
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SalesTaxCountry
     * @var string
     */
    public $SalesTaxCountry;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SalesTaxReturnRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $SalesTaxReturnRef;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxRegistrationNumber
     * @var string
     */
    public $TaxRegistrationNumber;
    /**
     * @Definition We'll need an Enum for the reporting periods
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ReportingPeriod
     * @var string
     */
    public $ReportingPeriod;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxTrackedOnPurchases
     * @var boolean
     */
    public $TaxTrackedOnPurchases;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxOnPurchasesAccountRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $TaxOnPurchasesAccountRef;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxTrackedOnSales
     * @var boolean
     */
    public $TaxTrackedOnSales;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxTrackedOnSalesAccountRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $TaxTrackedOnSalesAccountRef;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxOnTax
     * @var boolean
     */
    public $TaxOnTax;
    /**
     * @Definition
                                Product: QBO
                                Description: This specifies the last filing date for this tax agency.
                                InputType: QBO: ReadOnly

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName LastFileDate
     * @var string
     */
    public $LastFileDate;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxAgencyExt
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $TaxAgencyExt;
} // end class IPPTaxAgency
