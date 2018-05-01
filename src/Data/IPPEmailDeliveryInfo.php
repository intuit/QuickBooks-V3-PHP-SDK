<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPEmailDeliveryInfo
 * @var IPPEmailDeliveryInfo
 * @xmlDefinition
                Product: QBO
                Description: Specifies various fields
                required for emailing different transaction

 */
class IPPEmailDeliveryInfo extends IPPIntuitEntity
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
            if (property_exists('IPPEmailDeliveryInfo', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPEmailDeliveryInfo', $initPropName)) {
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
                                Description: Email address of
                                recipients. Multiple email address seperated with comma.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DeliveryAddress
     * @var com\intuit\schema\finance\v3\IPPEmailAddress
     */
    public $DeliveryAddress;
    /**
     * @Definition
                                Product: QBO
                                Description: Cc email address of
                                recipients. Multiple email address seperated with comma.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DeliveryAddressCc
     * @var com\intuit\schema\finance\v3\IPPEmailAddress
     */
    public $DeliveryAddressCc;
    /**
     * @Definition
                                Product: QBO
                                Description: Bcc email address of
                                recipients. Multiple email address seperated with comma.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DeliveryAddressBcc
     * @var com\intuit\schema\finance\v3\IPPEmailAddress
     */
    public $DeliveryAddressBcc;
    /**
     * @Definition
                                Product: QBO
                                Description: Custom Email subject
                                and message to be used for this email.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName EmailMessage
     * @var com\intuit\schema\finance\v3\IPPEmailMessage
     */
    public $EmailMessage;
    /**
     * @Definition
                                Product: QBO
                                Description: Specifies whether
                                online payment should be enabled for this transaction

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AllowOnlinePayment
     * @var boolean
     */
    public $AllowOnlinePayment;
    /**
     * @Definition
                                Product: QBO
                                Description: Specifies whether
                                customer is allowed to use eInvoicing(online payment -credit
                                card) to pay the Invoice

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AllowOnlineCreditCardPayment
     * @var boolean
     */
    public $AllowOnlineCreditCardPayment;
    /**
     * @Definition
                                Product: QBO
                                Description: Specifies whether
                                customer is allowed to use eInvoicing(online payment -bank or
                                ach) to pay the Invoice

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AllowOnlineACHPayment
     * @var boolean
     */
    public $AllowOnlineACHPayment;
    /**
     * @Definition
                                Product: QBO
                                Description: Delivery information
                                like DeliveryTime, DeliveryType and DeliveryErrorType (if
                                applicable)

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DeliveryInfo
     * @var com\intuit\schema\finance\v3\IPPTransactionDeliveryInfo
     */
    public $DeliveryInfo;
    /**
     * @Definition
                                Product: QBO
                                Description: Specifies ETransaction
                                status of this transaction. Applicable if ETransaction is
                                enabled and this transaction is a ETransaction.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ETransactionStatus
     * @var com\intuit\schema\finance\v3\IPPETransactionStatusEnum
     */
    public $ETransactionStatus;
} // end class IPPEmailDeliveryInfo
