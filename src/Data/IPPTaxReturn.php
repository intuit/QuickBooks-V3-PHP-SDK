<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPTaxReturn
 * @var IPPTaxReturn
 * @xmlDefinition
                Product: QBO
                Description: Represents a Tax Return
                that is filed with a Tax Agency.

 */
class IPPTaxReturn extends IPPIntuitEntity
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
            if (property_exists('IPPTaxReturn', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTaxReturn', $initPropName)) {
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
                                Product: QBO
                                Description: True when this filing
                                is an upcoming Filing for a currently Open Filing Period. False
                                otherwise.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName UpcomingFiling
     * @var boolean
     */
    public $UpcomingFiling;
    /**
     * @Definition
                                Product: QBO
                                Description: Start date of the
                                Filing.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName StartDate
     * @var string
     */
    public $StartDate;
    /**
     * @Definition
                                Product: QBO
                                Description: End date of the
                                Filing.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName EndDate
     * @var string
     */
    public $EndDate;
    /**
     * @Definition
                                Product: QBO
                                Description: Date of the Filing.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FileDate
     * @var string
     */
    public $FileDate;
    /**
     * @Definition Specifies the final Tax Amount due to the Tax
                                Agency for a Filing
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName NetTaxAmountDue
     * @var float
     */
    public $NetTaxAmountDue;
    /**
     * @Definition Specifies the FRS Amount due to the Tax Agency
                                for a Filing Period. Applicable for UK only.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FlatRateSavingsAmountDue
     * @var float
     */
    public $FlatRateSavingsAmountDue;
    /**
     * @Definition Specifies the PayGWithheld Amount due to the
                                Tax Agency for a Filing Period. Applicable for AU only.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PayGWithheldAmount
     * @var float
     */
    public $PayGWithheldAmount;
    /**
     * @Definition
                                Product: QBO
                                Description: Represents the Agency
                                of which this TaxReturn is a part.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AgencyRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $AgencyRef;
    /**
     * @Definition
                                Product: QBO
                                Description: Represents the status of the filing of the tax return

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxReturnStatus
     * @var com\intuit\schema\finance\v3\IPPTaxReturnStatusEnum
     */
    public $TaxReturnStatus;
    /**
     * @Definition
                                Product: QBO
                                Description: Represents the tax return code with the partner

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxReturnCode
     * @var string
     */
    public $TaxReturnCode;
} // end class IPPTaxReturn
