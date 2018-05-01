<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType Transaction
 * @xmlName IPPSalesTransaction
 * @var IPPSalesTransaction
 * @xmlDefinition
                Product: ALL
                Description: Base class of all Sales
                transaction entities.

 */
class IPPSalesTransaction extends IPPTransaction
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
            if (property_exists('IPPSalesTransaction', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPSalesTransaction', $initPropName)) {
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
                                Description: If AutoDocNumber is true, DocNumber is generated automatically.
                                If false or null, the DocNumber is generated based on preference
                                of the user.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AutoDocNumber
     * @var boolean
     */
    public $AutoDocNumber;
    /**
     * @Definition
                                Product: ALL
                                Description: Reference to a Customer or job.
                                Filterable: QBW
                                InputType: ReadWrite
                                BusinessRules: QBW: CustomerRef is mandatory for some SalesTransactions like
                                Invoice

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
                                Description: QBO: For an Invoice, this is the user-entered message to the
                                customer that does appear in the invoice, and does appear in the
                                printed invoice. The maximum length for Invoice Msg is 1000
                                characters.[br /]For a Bill, this is the memo of the transaction
                                to provide more detail, and does not appear in the printed
                                message of the bill. The maximum length for Bill Msg is 4000
                                characters.[br /]For a CreditCardCharge, this message appears in
                                the printed record; maximum length is 4000 characters.[br /]Not
                                supported for BillPayment, JournalEntry or Payment.
                                Description: QBW: User-entered message to the customer; this message will be
                                visible to end user on their transactions.
                                InputType: ReadWrite

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CustomerMemo
     * @var com\intuit\schema\finance\v3\IPPMemoRef
     */
    public $CustomerMemo;
    /**
     * @Definition
                                Product: ALL
                                Description: QBO: Bill-to address
                                of the Invoice.[br]See [a
                                href="http://ipp.developer.intuit.com/0010_Intuit_Partner_Platform/0060_Financial_Management_Services_(v3)/01000_Using_Data_Service_Entities#Addresses"]Addresses[/a]
                                Description: QBW: The physical (postal) address where the bill
                                or invoice is sent.[br]See [a
                                href="http://ipp.developer.intuit.com/0010_Intuit_Partner_Platform/0060_Financial_Management_Services_(v3)/01000_Using_Data_Service_Entities#Addresses"]Addresses[/a]
                                InputType: ReadWrite

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName BillAddr
     * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
     */
    public $BillAddr;
    /**
     * @Definition
                                Product: ALL
                                Description: QBO: Shipping address
                                of the Invoice.[br]See [a
                                href="http://ipp.developer.intuit.com/0010_Intuit_Partner_Platform/0060_Financial_Management_Services_(v3)/01000_Using_Data_Service_Entities#Addresses"]Addresses[/a]
                                Description: QBW: Identifies the address where the goods must be
                                shipped. [br /]QuickBooks Note: If ShipAddr is not specified,
                                and a default ship-to address is specified in QuickBooks for
                                this customer, the default ship-to address will be used by
                                QuickBooks.[br]See [a
                                href="http://ipp.developer.intuit.com/0010_Intuit_Partner_Platform/0060_Financial_Management_Services_(v3)/01000_Using_Data_Service_Entities#Addresses"]Addresses[/a]

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ShipAddr
     * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
     */
    public $ShipAddr;
    /**
     * @Definition
                                                                Product: QBO
                                                                Description: Specifies whether
                                                                shipping address is in free-form or structured-form (city/state etc.)

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FreeFormAddress
     * @var boolean
     */
    public $FreeFormAddress;
    /**
     * @Definition
                                Product: QBW
                                Description: Reference to the party
                                receiving payment.
                                InputType: ReadOnly

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName RemitToRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $RemitToRef;
    /**
     * @Definition
                                Product: QBW
                                Description: Reference to the Class
                                associated with the transaction.
                                InputType: ReadWrite

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ClassRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $ClassRef;
    /**
     * @Definition
                                Product: QBW
                                Description: Reference to the
                                SalesTerm associated with the transaction.
                                InputType: ReadWrite

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SalesTermRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $SalesTermRef;
    /**
     * @br
     * @ul
                                    If DueDate is not included when creating an invoice,
                                        QuickBooks may determine the due date according to the terms
                                        set for this customer.
                                    If the Terms are not provided, the Due Date is set to the
                                        transaction date.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DueDate
     * @var string
     */
    public $DueDate;
    /**
     * @Definition
                                Product: QBW
                                Description: Reference to the
                                SalesRep associated with the transaction.
                                InputType: ReadWrite

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SalesRepRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $SalesRepRef;
    /**
     * @Definition
                                Product: ALL
                                Description: Purchase Order number.
                                ValidRange: QBW: max=25
                                ValidRange: QBO: max=15

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PONumber
     * @var string
     */
    public $PONumber;
    /**
     * @Definition
                                Product: ALL
                                Description: "Free On Board", the
                                terms between buyer and seller regarding transportation costs;
                                does not have any bookkeeping implications.
                                Description: "Free On
                                Board", the terms between buyer and seller regarding
                                transportation costs; does not have any bookkeeping
                                implications.
                                ValidRange: QBW: max=13
                                ValidRange: QBO: max=15

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FOB
     * @var string
     */
    public $FOB;
    /**
     * @Definition
                                Product: QBW
                                Description: Reference to the ShipMethod associated with the transaction.
                                InputType: ReadWrite

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ShipMethodRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $ShipMethodRef;
    /**
     * @Definition
                                Product: QBW
                                Description: Date for delivery of
                                goods or services.
                                InputType: ReadWrite

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ShipDate
     * @var string
     */
    public $ShipDate;
    /**
     * @Definition
                                Product: QBW
                                Description: Shipping provider's
                                tracking number for the delivery of the goods associated with
                                the transaction.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TrackingNum
     * @var string
     */
    public $TrackingNum;
    /**
     * @Definition
                                Product: QBO
                                Description: Indicates the
                                GlobalTax model if the model inclusive of tax, exclusive of
                                taxes or not applicable

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName GlobalTaxCalculation
     * @var com\intuit\schema\finance\v3\IPPGlobalTaxCalculationEnum
     */
    public $GlobalTaxCalculation;
    /**
     * @Definition
                                Product: All
                                Description: QBO: Indicates the
                                total amount of the transaction. This includes the total of all
                                the charges, allowances and taxes. By default, this is
                                recalculated based on sub items total and overridden.
                                Description: QBW: Indicates the total amount of the transaction.
                                This includes the total of all the charges, allowances and
                                taxes.[br /]Calculated by QuickBooks business logic; cannot be
                                written to QuickBooks.
                                Filterable: QBW
                                Sortable: QBW
                                InputType: QBW: OverrideOnSync

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TotalAmt
     * @var float
     */
    public $TotalAmt;
    /**
     * @Definition
                                Product: ALL
                                Description: QBW: Total amount of
                                the transaction in the home currency for multi-currency enabled
                                companies. Single currency companies will not have this field.
                                Includes the total of all the charges, allowances and taxes.
                                Calculated by QuickBooks business logic. Cannot be written to
                                QuickBooks.
                                InputType: QBW: ReadOnly

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName HomeTotalAmt
     * @var float
     */
    public $HomeTotalAmt;
    /**
     * @Definition
                                Product: QBO
                                Description: If false or null,
                                calculate the sales tax first, and then apply the discount. If
                                true, subtract the discount first and then calculate the sales
                                tax.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ApplyTaxAfterDiscount
     * @var boolean
     */
    public $ApplyTaxAfterDiscount;
    /**
     * @Definition
                                Product: QBW
                                Description: Reference to the
                                Template for the invoice form.
                                InputType: ReadWrite

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TemplateRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $TemplateRef;
    /**
     * @Definition
                                Product: ALL
                                Description: Printing status of the
                                invoice.[br /]
                                InputType: ReadWrite

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PrintStatus
     * @var com\intuit\schema\finance\v3\IPPPrintStatusEnum
     */
    public $PrintStatus;
    /**
     * @Definition
                                Product: ALL
                                Description: Email status of the
                                invoice.[br /]
                                InputType: ReadWrite

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName EmailStatus
     * @var com\intuit\schema\finance\v3\IPPEmailStatusEnum
     */
    public $EmailStatus;
    /**
     * @Definition
                                Product: QBO
                                Description: Identifies the e-mail
                                address where the invoice is sent. At present, you can provide
                                only one e-mail address.[br /]If the ToBeEmailed attribute is
                                true and the BillEmail attribute contains an e-mail address, the
                                user can send an e-mail message to the e-mail address that is
                                specified in the BillEmail attribute.[br /]If the BillEmail
                                attribute contains an invalid e-mail address, QBO does not send
                                the e-mail message to the invalid e-mail address. QBO also does
                                not return any error message to indicate that the e-mail address
                                is invalid.[br /]The maximum length for BillEmail is 100
                                characters.
                                Product: QBW
                                Description: Identifies the email address
                                where the bill or invoice is sent. [br /]UNSUPPORTED FIELD.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName BillEmail
     * @var com\intuit\schema\finance\v3\IPPEmailAddress
     */
    public $BillEmail;
    /**
     * @Definition
                                Product: QBO
                                Description: Identifies the cc
                                e-mail address where the invoice is sent. If the ToBeEmailed
                                attribute is true and the BillEmailCc attribute contains an
                                e-mail address, the user can send an e-mail message to the
                                e-mail address that is specified in the BillEmailCc
                                attribute.[br /] If the BillEmailCc attribute contains an
                                invalid e-mail address, QBO does not send the e-mail message to
                                the invalid cc e-mail address. [br /]The maximum length for
                                BillEmailCc is 200 characters.
                                Product: QBW
                                Description:
                                Identifies the cc email address where the bill or invoice is
                                sent. [br /]

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName BillEmailCc
     * @var com\intuit\schema\finance\v3\IPPEmailAddress
     */
    public $BillEmailCc;
    /**
     * @Definition
                                Product: QBO
                                Description: Identifies the bcc
                                e-mail address where the invoice is sent. If the ToBeEmailed
                                attribute is true and the BillEmailBcc attribute contains an
                                e-mail address, the user can send an e-mail message to the
                                e-mail address that is specified in the BillEmailBcc
                                attribute.[br /] If the BillEmailCc attribute contains an
                                invalid bcc e-mail address, QBO does not send the e-mail message
                                to the invalid bcc e-mail address. [br /]The maximum length for
                                BillEmailBcc is 200 characters.
                                Product: QBW
                                Description:
                                Identifies the bcc email address where the bill or invoice is
                                sent as bcc. [br /]

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName BillEmailBcc
     * @var com\intuit\schema\finance\v3\IPPEmailAddress
     */
    public $BillEmailBcc;
    /**
     * @Definition
                                Product: QBW
                                Description: Reference to the
                                ARAccount (accounts receivable account) associated with the
                                transaction.
                                InputType: ReadWrite

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ARAccountRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $ARAccountRef;
    /**
     * @Definition
                                Product: QBO
                                Description: The balance reflecting
                                any payments made against the transaction. Initially this will
                                be equal to the TotalAmt.
                                Product: QBW
                                Description: Indicates the
                                unpaid amount of the transaction.
                                Filterable: ALL
                                Sortable: QBW
                                InputType: ReadOnly

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Balance
     * @var float
     */
    public $Balance;
    /**
     * @Definition
                                Product: QBO
                                Description: The balance reflecting
                                any payments made against the transaction in home currency.
                                Initially this will be equal to the HomeTotalAmt.[br /]Read-only
                                field.
                                Product: QBW
                                Description: Indicates the unpaid amount of
                                the transaction in home currency.[br /]Cannot be written to
                                QuickBooks.
                                Filterable: ALL
                                Sortable: QBW

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
                                Description: Indicates whether the
                                transaction is a finance charge.
                                InputType: ReadWrite

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FinanceCharge
     * @var boolean
     */
    public $FinanceCharge;
    /**
     * @Definition
                                Product: ALL
                                Description: Reference to the
                                PaymentMethod.
                                InputType: ReadWrite

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PaymentMethodRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $PaymentMethodRef;
    /**
     * @Definition
                                Product: QBO
                                Description: The reference number
                                for the payment received (I.e. Check # for a check, envelope #
                                for a cash donation, CreditCardTransactionID for a credit card
                                payment)

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PaymentRefNum
     * @var string
     */
    public $PaymentRefNum;
    /**
     * @Definition
                                Product: QBO
                                Description: Valid values are Cash, Check, CreditCard, or
                                Other. No defaults. Cash based expense is not supported by
                                QuickBooks Windows.
                                NotApplicableTo: Estimate, SalesOrder

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PaymentType
     * @var com\intuit\schema\finance\v3\IPPPaymentTypeEnum
     */
    public $PaymentType;
    /**
     * @Definition
                                    Product: ALL
                                    Description Information about a check payment for the
                                    Invoice.
                                    NotApplicableTo: Estimate, SalesOrder

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CheckPayment
     * @var com\intuit\schema\finance\v3\IPPCheckPayment
     */
    public $CheckPayment;
    /**
     * @Definition
                                    Product: ALL
                                    Description Information about a credit card payment for the
                                    Invoice.
                                    NotApplicableTo: Estimate, SalesOrder

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CreditCardPayment
     * @var com\intuit\schema\finance\v3\IPPCreditCardPayment
     */
    public $CreditCardPayment;
    /**
     * @Definition
                                Product: ALL
                                Description: QBW: Reference to the
                                DepositToAccount entity. If not specified, the Undeposited Funds
                                account will be used.
                                Description: QBO: Asset account where the payment money is deposited. If you
                                do not specify this account, QBO uses the Undeposited Funds
                                account. Supported for Payment and SalesReceipt only.
                                NotApplicableTo: QBW: Estimate, SalesOrder

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DepositToAccountRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $DepositToAccountRef;
    /**
     * @Definition
                                Product: QBO
                                Description: Last delivery info of this transaction.

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
                                Description: Indicates the discount
                                rate that is applied on the transaction as a whole. This will be
                                pro-rated through item lines for tax calculation.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DiscountRate
     * @var float
     */
    public $DiscountRate;
    /**
     * @Definition
                                Product: QBO
                                Description: Indicates the discount
                                amount that is applied on the transaction as a whole. This will
                                be pro-rated through item lines for tax calculation.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DiscountAmt
     * @var float
     */
    public $DiscountAmt;
    /**
     * @Definition
                                Product: QBO
                                Description: this is the reference
                                to the NotaFiscal created for the salesTransaction.
                                ValidRange:
                                QBO: max=30

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName GovtTxnRefIdentifier
     * @var string
     */
    public $GovtTxnRefIdentifier;
    /**
     * @Definition
                                Product: ALL
                                Description: Reference to the
                                TaxExemptionId and TaxExemptionReason for this customer.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxExemptionRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $TaxExemptionRef;
} // end class IPPSalesTransaction
