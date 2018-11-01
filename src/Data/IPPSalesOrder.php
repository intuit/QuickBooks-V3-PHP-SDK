<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType SalesTransaction
 * @xmlName IPPSalesOrder
 * @var IPPSalesOrder
 * @xmlDefinition
                Product: QBW
                Description: A sales order is a
                financial transaction that represents a request received from a
                customer to purchase products or services. Sales orders help you
                manage the sale of products and services your customers order. For
                example, a sales order tracks inventory that is on back order for a
                customer. Sales Orders are supported only in QuickBooks Premier
                (desktop) and above. However, if you are accessing a company file
                created in Premier and above from a lesser edition of QuickBooks
                (such as Pro), you can do queries against SalesOrders. Using sales
                orders is optional.
                Endpoint: services.intuit.com
                Business Rules:
                [li]A sales order must have at least one line that describes the
                item. [/li][li]A sales order must have a reference to a customer in
                the [/li][li]If you submit a query with the filter
                IncludeDiscountLineDetails, the system retrieves either
                DiscountAmount or DiscountRatePercent with associated values[/li]

 */
class IPPSalesOrder extends IPPSalesTransaction
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
            if (property_exists('IPPSalesOrder', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPSalesOrder', $initPropName)) {
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
                                Description: The entire
                                transaction, or individual items are maually closed, i.e. not
                                invoiced.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ManuallyClosed
     * @var boolean
     */
    public $ManuallyClosed;
    /**
     * @Definition Internal use only: extension place holder for
                                SalesOrder
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SalesOrderEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $SalesOrderEx;
} // end class IPPSalesOrder
