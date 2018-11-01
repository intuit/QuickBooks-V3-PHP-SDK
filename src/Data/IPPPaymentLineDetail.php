<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPPaymentLineDetail
 * @var IPPPaymentLineDetail
 * @xmlDefinition
                Product: ALL
                Description: Payment detail for a
                transaction line.

 */
class IPPPaymentLineDetail
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
            if (property_exists('IPPPaymentLineDetail', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPPaymentLineDetail', $initPropName)) {
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
                        Description: Reference to the Item.
                        When a line lacks an ItemRef it will be treated as "documentation"
                        and the Amount will be ignored.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlName ItemRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $ItemRef;
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
                        Description: Reference to the Class
                        for the line item.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ClassRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $ClassRef;
    /**
     * @Definition
                        Product: ALL
                        Description: Indicates the unpaid
                        amount of the transaction after this payment is applied.[br
                        /]Cannot be written to QuickBooks.

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
                        Description: Indicates the unpaid
                        amount of the transaction after this payment is applied in home
                        currency. It is visible only for companies which have
                        multicurrency enabled[br /] Cannot be written to Quickbooks.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName HomeBalance
     * @var float
     */
    public $HomeBalance;
    /**
     * @Definition
                        Product: ALL
                        Description: Reference to a Discount
                        item and its properties that this line can overwrite.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Discount
     * @var com\intuit\schema\finance\v3\IPPDiscountOverride
     */
    public $Discount;
    /**
     * @Definition
                        Product: ALL
                        Description: Internal use only:
                        extension place holder for PaymentDetail

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PaymentLineEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $PaymentLineEx;
} // end class IPPPaymentLineDetail
