<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType PurchaseByVendor
 * @xmlName IPPPurchaseOrder
 * @var IPPPurchaseOrder
 * @xmlDefinition PurchaseOrder is a non-posting transaction
                representing a request to purchase goods or services from a third
                party.
 */
class IPPPurchaseOrder extends IPPPurchaseByVendor
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
            if (property_exists('IPPPurchaseOrder', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPPurchaseOrder', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition Represents the TaxCode Reference with respect
                                to the purchase[br /]

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxCodeRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $TaxCodeRef;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ClassRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $ClassRef;
    /**
     * @Definition Information about the Customer and actual Job
                                or Project the expense must be reimbursed for.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ReimbursableInfoRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $ReimbursableInfoRef;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SalesTermRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $SalesTermRef;
    /**
     * @Definition The nominal date by which the bill must be
                                paid, not including any early-payment discount incentives, or
                                late payment penalties.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DueDate
     * @var string
     */
    public $DueDate;
    /**
     * @Definition The date when the delivery of the product is
                                expected.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ExpectedDate
     * @var string
     */
    public $ExpectedDate;
    /**
     * @Definition Address to which the payment should be sent.
                                [b]QuickBooks Notes[/b][br /]
                                Non QB-writable.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName VendorAddr
     * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
     */
    public $VendorAddr;
    /**
     * @Definition DropShip to Entity Reference

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DropShipToEntity
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $DropShipToEntity;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName InventorySiteRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $InventorySiteRef;
    /**
     * @Definition Address to which the vendor shipped or will
                                ship any goods associated with the purchase.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ShipAddr
     * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
     */
    public $ShipAddr;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ShipMethodRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $ShipMethodRef;
    /**
     * @Definition "Free On Board", specifies the terms between
                                buyer and seller regarding transportation costs; does not have
                                any bookkeeping implications.
                                Length Restriction:
                                QBO: 15
                                QBW: 1024

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FOB
     * @var string
     */
    public $FOB;
    /**
     * @Definition The email address to which this purchase order
                                is/was sent.
                                Length Restriction:
                                QBO: 15
                                QBW: 1024

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName POEmail
     * @var com\intuit\schema\finance\v3\IPPEmailAddress
     */
    public $POEmail;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TemplateRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $TemplateRef;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PrintStatus
     * @var com\intuit\schema\finance\v3\IPPPrintStatusEnum
     */
    public $PrintStatus;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName EmailStatus
     * @var com\intuit\schema\finance\v3\IPPEmailStatusEnum
     */
    public $EmailStatus;
    /**
     * @Definition The entire transaction, or individual items are
                                manually closed, i.e. they may not be received.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ManuallyClosed
     * @var boolean
     */
    public $ManuallyClosed;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName POStatus
     * @var com\intuit\schema\finance\v3\IPPPurchaseOrderStatusEnum
     */
    public $POStatus;
    /**
     * @Definition Internal use only: extension place holder for
                                PurchaseOrder
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PurchaseOrderEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $PurchaseOrderEx;
} // end class IPPPurchaseOrder
