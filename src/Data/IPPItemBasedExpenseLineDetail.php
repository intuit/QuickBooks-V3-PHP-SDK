<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType ItemLineDetail
 * @xmlName IPPItemBasedExpenseLineDetail
 * @var IPPItemBasedExpenseLineDetail
 * @xmlDefinition
                Product: ALL
                Description: Item based expense detail
                for a transaction line.

 */
class IPPItemBasedExpenseLineDetail extends IPPItemLineDetail
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
            if (property_exists('IPPItemBasedExpenseLineDetail', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPItemBasedExpenseLineDetail', $initPropName)) {
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
                                Product: ALL
                                Description: Reference to the
                                Customer associated with the expense.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CustomerRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $CustomerRef;
    /**
     * @Definition
                                Product: ALL
                                Description: The billable status of
                                the expense.[br /]

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName BillableStatus
     * @var com\intuit\schema\finance\v3\IPPBillableStatusEnum
     */
    public $BillableStatus;
    /**
     * @Definition
                                Product: QBO
                                Description: Indicates the total
                                amount of line item including tax.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxInclusiveAmt
     * @var float
     */
    public $TaxInclusiveAmt;
    /**
     * @Definition
                                Product: ALL
                                Description: Internal use only:
                                extension place holder for ExpenseItemDetail

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ItemBasedExpenseLineDetailEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $ItemBasedExpenseLineDetailEx;
} // end class IPPItemBasedExpenseLineDetail
