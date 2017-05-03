<?php
namespace oasis\names\specification\ubl\schema\xsd\Order_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:Order-2
 * @xmlType
 * @xmlName OrderType
 * @var oasis\names\specification\ubl\schema\xsd\Order_2\OrderType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Order. Details
 * @xmlDefinition The document used to order goods and services.
 * @xmlObjectClass Order
 * @xmlAlternativeBusinessTerms Purchase Order
 */
class OrderType
{

    
    /**
     * @Definition A container for all extensions present in the document.
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName UBLExtensions
     * @var oasis\names\specification\ubl\schema\xsd\CommonExtensionComponents_2\UBLExtensions
     */
    public $UBLExtensions;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. UBL Version Identifier. Identifier
     * @Definition The earliest version of the UBL 2 schema for this document type that defines all of the elements that might be encountered in the current instance.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTerm UBL Version Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples 2.0.5
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName UBLVersionID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\UBLVersionID
     */
    public $UBLVersionID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. Customization Identifier. Identifier
     * @Definition Identifies a user-defined customization of UBL for a specific use.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTerm Customization Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples NES
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CustomizationID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CustomizationID
     */
    public $CustomizationID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. Profile Identifier. Identifier
     * @Definition Identifies a user-defined profile of the customization of UBL being used.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTerm Profile Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples BasicProcurementProcess
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ProfileID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ProfileID
     */
    public $ProfileID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. Identifier
     * @Definition An identifier for the Order assigned by the Buyer.
     * @Cardinality 1
     * @ObjectClass Order
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms Purchase Order Number, Order Number
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName ID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ID
     */
    public $ID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. Sales Order Identifier. Identifier
     * @Definition An identifier for the Order assigned by the Seller.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTerm Sales Order Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms Sales Order Number
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SalesOrderID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SalesOrderID
     */
    public $SalesOrderID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. Copy_ Indicator. Indicator
     * @Definition Indicates whether the Order is a copy (true) or not (false).
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTermQualifier Copy
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CopyIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CopyIndicator
     */
    public $CopyIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. UUID. Identifier
     * @Definition A universally unique identifier for an instance of this ABIE.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTerm UUID
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName UUID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\UUID
     */
    public $UUID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. Issue Date. Date
     * @Definition The date assigned by the Buyer on which the Order was issued.
     * @Cardinality 1
     * @ObjectClass Order
     * @PropertyTerm Issue Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @AlternativeBusinessTerms Order Date
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName IssueDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\IssueDate
     */
    public $IssueDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. Issue Time. Time
     * @Definition The time assigned by the Buyer on which the Order was issued.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTerm Issue Time
     * @RepresentationTerm Time
     * @DataType Time. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName IssueTime
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\IssueTime
     */
    public $IssueTime;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. Note. Text
     * @Definition Free-form text applying to the Order. This element may contain notes or any other similar information that is not contained explicitly in another structure.
     * @Cardinality 0..n
     * @ObjectClass Order
     * @PropertyTerm Note
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Note
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Note
     */
    public $Note;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. Requested Invoice_ Currency Code. Code
     * @Definition The currency requested for amount totals in Invoices related to this Order.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTermQualifier Requested Invoice
     * @PropertyTerm Currency Code
     * @RepresentationTerm Code
     * @DataType Currency_ Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RequestedInvoiceCurrencyCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RequestedInvoiceCurrencyCode
     */
    public $RequestedInvoiceCurrencyCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. Document_ Currency Code. Code
     * @Definition The default currency for the Order.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTermQualifier Document
     * @PropertyTerm Currency Code
     * @RepresentationTerm Code
     * @DataType Currency_ Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DocumentCurrencyCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DocumentCurrencyCode
     */
    public $DocumentCurrencyCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. Pricing_ Currency Code. Code
     * @Definition The currency that is used for all prices in the Order.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTermQualifier Pricing
     * @PropertyTerm Currency Code
     * @RepresentationTerm Code
     * @DataType Currency_ Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PricingCurrencyCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PricingCurrencyCode
     */
    public $PricingCurrencyCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. Tax_ Currency Code. Code
     * @Definition The currency requested for tax amounts in Invoices related to this Order.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTermQualifier Tax
     * @PropertyTerm Currency Code
     * @RepresentationTerm Code
     * @DataType Currency_ Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TaxCurrencyCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TaxCurrencyCode
     */
    public $TaxCurrencyCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. Customer Reference. Text
     * @Definition A supplementary reference for the Order.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTerm Customer Reference
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples CRI in a purchasing card transaction
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CustomerReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CustomerReference
     */
    public $CustomerReference;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. Accounting Cost Code. Code
     * @Definition The Buyer's accounting code applied to the Order as a whole.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTerm Accounting Cost Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AccountingCostCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AccountingCostCode
     */
    public $AccountingCostCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. Accounting Cost. Text
     * @Definition The Buyer's accounting code applied to the Order as a whole, expressed as text.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTerm Accounting Cost
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AccountingCost
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AccountingCost
     */
    public $AccountingCost;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order. Line Count. Numeric
     * @Definition The number of lines in the document.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTerm Line Count
     * @RepresentationTerm Numeric
     * @DataType Numeric. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LineCountNumeric
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LineCountNumeric
     */
    public $LineCountNumeric;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Validity_ Period. Period
     * @Definition The period for which the Order is valid.
     * @Cardinality 0..n
     * @ObjectClass Order
     * @PropertyTermQualifier Validity
     * @PropertyTerm Period
     * @AssociatedObjectClass Period
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ValidityPeriod
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ValidityPeriod
     */
    public $ValidityPeriod;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Quotation_ Document Reference. Document Reference
     * @Definition An associative reference to Quotation.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTermQualifier Quotation
     * @PropertyTerm Document Reference
     * @AssociatedObjectClass Document Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName QuotationDocumentReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\QuotationDocumentReference
     */
    public $QuotationDocumentReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Order_ Document Reference. Document Reference
     * @Definition An associative reference to [another] Order.
     * @Cardinality 0..n
     * @ObjectClass Order
     * @PropertyTermQualifier Order
     * @PropertyTerm Document Reference
     * @AssociatedObjectClass Document Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName OrderDocumentReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OrderDocumentReference
     */
    public $OrderDocumentReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Originator_ Document Reference. Document Reference
     * @Definition An associative reference to Originator Document.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTermQualifier Originator
     * @PropertyTerm Document Reference
     * @AssociatedObjectClass Document Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OriginatorDocumentReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OriginatorDocumentReference
     */
    public $OriginatorDocumentReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Additional_ Document Reference. Document Reference
     * @Definition An associative reference to Additional Document.
     * @Cardinality 0..n
     * @ObjectClass Order
     * @PropertyTermQualifier Additional
     * @PropertyTerm Document Reference
     * @AssociatedObjectClass Document Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName AdditionalDocumentReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AdditionalDocumentReference
     */
    public $AdditionalDocumentReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Contract
     * @Definition An association to Contract.
     * @Cardinality 0..n
     * @ObjectClass Order
     * @PropertyTerm Contract
     * @AssociatedObjectClass Contract
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Contract
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Contract
     */
    public $Contract;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Signature
     * @Definition An association to Signature.
     * @Cardinality 0..n
     * @ObjectClass Order
     * @PropertyTerm Signature
     * @AssociatedObjectClass Signature
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Signature
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Signature
     */
    public $Signature;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Buyer_ Customer Party. Customer Party
     * @Definition An association to the Buyer.
     * @Cardinality 1
     * @ObjectClass Order
     * @PropertyTermQualifier Buyer
     * @PropertyTerm Customer Party
     * @AssociatedObjectClass Customer Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName BuyerCustomerParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\BuyerCustomerParty
     */
    public $BuyerCustomerParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Seller_ Supplier Party. Supplier Party
     * @Definition An association to the Seller.
     * @Cardinality 1
     * @ObjectClass Order
     * @PropertyTermQualifier Seller
     * @PropertyTerm Supplier Party
     * @AssociatedObjectClass Supplier Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName SellerSupplierParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\SellerSupplierParty
     */
    public $SellerSupplierParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Originator_ Customer Party. Customer Party
     * @Definition An association to the Originator.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTermQualifier Originator
     * @PropertyTerm Customer Party
     * @AssociatedObjectClass Customer Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OriginatorCustomerParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OriginatorCustomerParty
     */
    public $OriginatorCustomerParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Freight Forwarder_ Party. Party
     * @Definition An association to a Freight Forwarder or Carrier.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTermQualifier Freight Forwarder
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName FreightForwarderParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\FreightForwarderParty
     */
    public $FreightForwarderParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Accounting_ Customer Party. Customer Party
     * @Definition An association to the Accounting Customer Party. The party that Invoice is expected to be sent to if not the buyer party.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTermQualifier Accounting
     * @PropertyTerm Customer Party
     * @AssociatedObjectClass Customer Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AccountingCustomerParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AccountingCustomerParty
     */
    public $AccountingCustomerParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Delivery
     * @Definition An association to Delivery.
     * @Cardinality 0..n
     * @ObjectClass Order
     * @PropertyTerm Delivery
     * @AssociatedObjectClass Delivery
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Delivery
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Delivery
     */
    public $Delivery;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Delivery Terms
     * @Definition An association to Delivery Terms.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTerm Delivery Terms
     * @AssociatedObjectClass Delivery Terms
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DeliveryTerms
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DeliveryTerms
     */
    public $DeliveryTerms;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Payment Means
     * @Definition An association to Payment Means.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTerm Payment Means
     * @AssociatedObjectClass Payment Means
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PaymentMeans
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PaymentMeans
     */
    public $PaymentMeans;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Transaction Conditions
     * @Definition An association with any purchasing or sales conditions applying to the whole order.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTerm Transaction Conditions
     * @AssociatedObjectClass Transaction Conditions
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TransactionConditions
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransactionConditions
     */
    public $TransactionConditions;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Allowance Charge
     * @Definition An association to Allowances and Charges that apply to the Order as a whole.
     * @Cardinality 0..n
     * @ObjectClass Order
     * @PropertyTerm Allowance Charge
     * @AssociatedObjectClass Allowance Charge
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName AllowanceCharge
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AllowanceCharge
     */
    public $AllowanceCharge;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Destination_ Country. Country
     * @Definition An association to the country of destination (for customs purposes).
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTermQualifier Destination
     * @PropertyTerm Country
     * @AssociatedObjectClass Country
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DestinationCountry
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DestinationCountry
     */
    public $DestinationCountry;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Tax Total
     * @Definition An association to the total tax amount of the Order (as calculated by the Buyer).
     * @Cardinality 0..n
     * @ObjectClass Order
     * @PropertyTerm Tax Total
     * @AssociatedObjectClass Tax Total
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName TaxTotal
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TaxTotal
     */
    public $TaxTotal;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Anticipated_ Monetary Total. Monetary Total
     * @Definition An association to the total amounts for the Order anticipated by the Buyer.
     * @Cardinality 0..1
     * @ObjectClass Order
     * @PropertyTermQualifier Anticipated
     * @PropertyTerm Monetary Total
     * @AssociatedObjectClass Monetary Total
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AnticipatedMonetaryTotal
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AnticipatedMonetaryTotal
     */
    public $AnticipatedMonetaryTotal;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order. Order Line
     * @Definition An association to one or more Order Lines.
     * @Cardinality 1..n
     * @ObjectClass Order
     * @PropertyTerm Order Line
     * @AssociatedObjectClass Order Line
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs unbounded
     * @xmlName OrderLine
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OrderLine
     */
    public $OrderLine;
} // end class OrderType
