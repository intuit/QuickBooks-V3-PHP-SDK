<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPTaxCode
 * @var IPPTaxCode
 * @xmlDefinition
                Product: ALL
                Description: A tax code is used to
                track the taxable or non-taxable status of products, services, and
                customers. You can assign a sales tax code to each of your products,
                services, and customers based on their taxable or non-taxable
                status. You can then use these codes to generate reports that
                provide information to the tax agencies about the taxable or
                non-taxable status of certain sales. [br]See [a
                href="http://ipp.developer.intuit.com/0010_Intuit_Partner_Platform/0060_Financial_Management_Services_(v3)/01100_Global_Tax_Model"]Global
                Tax Model[/a].

 */
class IPPTaxCode extends IPPIntuitEntity
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
            if (property_exists('IPPTaxCode', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTaxCode', $initPropName)) {
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
                                for the tax sales code.[br/]Max. Length: 3 characters.[br
                                /]Required for the Create request.
                                Product: QBO
                                Description: User
                                recognizable name for the tax sales code.[br/]Max. Length: 10
                                characters.
                                Required: ALL
                                Filterable: ALL
                                Sortable: ALL

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Name
     * @var string
     */
    public $Name;
    /**
     * @Definition
                                Product: ALL
                                Description: User entered
                                description for the sales tax code.[br/]Max Length: 31
                                characters.

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
                                Description: False if inactive.
                                Inactive sales tax codes may be hidden from display and may not
                                be used on financial transactions.
                                Filterable: ALL

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Active
     * @var boolean
     */
    public $Active;
    /**
     * @Definition
                                Product: QBW
                                Description: True if Taxcode needs to be hidden. Active tax codes can be hidden from the display using this.
                                Filterable: ALL

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Hidden
     * @var boolean
     */
    public $Hidden;
    /**
     * @Definition
                                Product: QBW
                                Description: False or null means
                                meaning non-taxable (default). True means taxable.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Taxable
     * @var boolean
     */
    public $Taxable;
    /**
     * @Definition
                                Product:QBW
                                Description: True if this tax code
                                represents a group of tax rates (a desktop TaxGroupItem), false
                                if it represents a QuickBooks US TaxCode.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxGroup
     * @var boolean
     */
    public $TaxGroup;
    /**
     * @Definition
                                Product: ALL
                                Description: List of references to
                                tax rates that apply for sales transactions when this tax code
                                is used.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SalesTaxRateList
     * @var com\intuit\schema\finance\v3\IPPTaxRateList
     */
    public $SalesTaxRateList;
    /**
     * @Definition
                                Product: ALL
                                Description: List of references to
                                tax rates that apply for purchase transactions when this tax
                                code is used.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PurchaseTaxRateList
     * @var com\intuit\schema\finance\v3\IPPTaxRateList
     */
    public $PurchaseTaxRateList;
    /**
     * @Definition
                                Product: QBO
                                Description: List of references to
                                adjustment tax rates that apply to the transaction.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AdjustmentTaxRateList
     * @var com\intuit\schema\finance\v3\IPPTaxRateList
     */
    public $AdjustmentTaxRateList;
    /**
     * @Definition
                                Product: ALL
                                Description: Internal use only:
                                extension place holder for TaxCode

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxCodeEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $TaxCodeEx;
} // end class IPPTaxCode
