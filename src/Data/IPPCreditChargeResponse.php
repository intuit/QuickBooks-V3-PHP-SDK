<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPCreditChargeResponse
 * @var IPPCreditChargeResponse
 * @xmlDefinition
                Product: ALL
                Description: Holds credit-card transaction response information from a merchant account service, but not any credit card or payment request information - see CreditChargeInfo.

 */
class IPPCreditChargeResponse
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
            if (property_exists('IPPCreditChargeResponse', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCreditChargeResponse', $initPropName)) {
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
                        Product: Not used now
                        Description: Credit Card Processor Name for recording the payment processor

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CCProcessor
     * @var string
     */
    public $CCProcessor;
    /**
     * @Definition
                        Product: ALL
                        Description: Unique identifier of the payment transaction. It can be used to track the status of transactions, or to search transactions.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CCTransId
     * @var string
     */
    public $CCTransId;
    /**
     * @Definition
                        Product: ALL
                        Description: Indicates the status of the payment transaction. Possible values include Completed, Unknown.[br /]

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Status
     * @var com\intuit\schema\finance\v3\IPPCCPaymentStatusEnum
     */
    public $Status;
    /**
     * @Definition
                        Product: ALL
                        Description: Numeric code specifying the result of the transaction.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ResultCode
     * @var integer
     */
    public $ResultCode;
    /**
     * @Definition
                        Product: ALL
                        Description: Text specifying the result of the transaction.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ResultMsg
     * @var string
     */
    public $ResultMsg;
    /**
     * @Definition
                        Product: ALL
                        Description: Merchant account number associated with the credit card transaction.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName MerchantAcctNum
     * @var string
     */
    public $MerchantAcctNum;
    /**
     * @Definition
                        Product: ALL
                        Description: Result of comparing the security code supplied in the credit card transaction request with the code on file with the card issuer. Possible values are Pass, Fail, and NotAvailable.[br /]

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CardSecurityCodeMatch
     * @var com\intuit\schema\finance\v3\IPPCCSecurityCodeMatchEnum
     */
    public $CardSecurityCodeMatch;
    /**
     * @Definition
                        Product: ALL
                        Description: Code returned from the credit card processor to indicate that the charge will be paid by the card issuer.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AuthCode
     * @var string
     */
    public $AuthCode;
    /**
     * @Definition
                        Product: ALL
                        Description: The AVS (Address Verification Service) result for the street address supplied in the transaction. Possible values are Pass, if the information matches the information on file with the cardholder's account, Fail, or NotAvailable.[br /]

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AvsStreet
     * @var com\intuit\schema\finance\v3\IPPCCAVSMatchEnum
     */
    public $AvsStreet;
    /**
     * @Definition The AVS (Address Verification Service) result for the zip code supplied in the transaction.  Possible values are Pass, if the information matches the information on file with the cardholder's account, Fail, or NotAvailable.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AvsZip
     * @var com\intuit\schema\finance\v3\IPPCCAVSMatchEnum
     */
    public $AvsZip;
    /**
     * @Definition
                        Product: ALL
                        Description: CardCode or Card Id field that can be optionally provided to use additional security features of credit card authorization. It is typically a 3 digit number located on the back of most credit cards. For American Express, it is a 4 digit number on the front.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SecurityCode
     * @var string
     */
    public $SecurityCode;
    /**
     * @Definition
                        Product: ALL
                        Description: Indicates which deposit batch the transaction belongs to. Allows for integration with Intuit MAS Service and QBFS: enables reconciliation between what is charged on credit card and what is already deposited into bank.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ReconBatchId
     * @var string
     */
    public $ReconBatchId;
    /**
     * @Definition
                        Product: ALL
                        Description: Code that indicates membership in a group of card types that are normally deposited together.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PaymentGroupingCode
     * @var integer
     */
    public $PaymentGroupingCode;
    /**
     * @Definition
                        Product: ALL
                        Description: Timestamp indicating the time in which the card processor authorized the transaction.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TxnAuthorizationTime
     * @var string
     */
    public $TxnAuthorizationTime;
    /**
     * @Definition
                        Product: ALL
                        Description: This value is used to support the credit card transaction reconciliation.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TxnAuthorizationStamp
     * @var integer
     */
    public $TxnAuthorizationStamp;
    /**
     * @Definition
                        Product: ALL
                        Description: An identifier returned in settlement data used to support the credit card transaction reconciliation.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ClientTransID
     * @var string
     */
    public $ClientTransID;
    /**
     * @Definition
                        Product: ALL
                        Description: Internal use only: extension place holder for CreditChargeResponse

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CreditChargeResponseEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $CreditChargeResponseEx;
} // end class IPPCreditChargeResponse
