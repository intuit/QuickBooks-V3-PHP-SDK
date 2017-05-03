<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName StatementLineType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\StatementLineType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Statement Line. Details
 * @xmlDefinition Information about a Line on a Statement of Account.
 * @xmlObjectClass Statement Line
 */
class StatementLineType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Statement Line. Identifier
     * @Definition Identifies the Statement Line.
     * @Cardinality 1
     * @ObjectClass Statement Line
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
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
     * @DictionaryEntryName Statement Line. Note. Text
     * @Definition Free-form text applying to the Statement Line. This element may contain notes or any other similar information that is not contained explicitly in another structure.
     * @Cardinality 0..1
     * @ObjectClass Statement Line
     * @PropertyTerm Note
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Note
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Note
     */
    public $Note;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Statement Line. UUID. Identifier
     * @Definition A universally unique identifier for an instance of this ABIE.
     * @Cardinality 0..1
     * @ObjectClass Statement Line
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
     * @DictionaryEntryName Statement Line. Balance Brought Forward_ Indicator. Indicator
     * @Definition If true, indicates that the Statement Line contains a balance brought forward.
     * @Cardinality 0..1
     * @ObjectClass Statement Line
     * @PropertyTermQualifier Balance Brought Forward
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName BalanceBroughtForwardIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\BalanceBroughtForwardIndicator
     */
    public $BalanceBroughtForwardIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Statement Line. Debit_ Line Amount. Amount
     * @Definition The amount debited on the Statement Line.
     * @Cardinality 0..1
     * @ObjectClass Statement Line
     * @PropertyTermQualifier Debit
     * @PropertyTerm Line Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DebitLineAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DebitLineAmount
     */
    public $DebitLineAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Statement Line. Credit_ Line Amount. Amount
     * @Definition The amount credited on the Statement Line.
     * @Cardinality 0..1
     * @ObjectClass Statement Line
     * @PropertyTermQualifier Credit
     * @PropertyTerm Line Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CreditLineAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CreditLineAmount
     */
    public $CreditLineAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Statement Line. Balance Amount. Amount
     * @Definition The balance amount on the Statement Line.
     * @Cardinality 0..1
     * @ObjectClass Statement Line
     * @PropertyTerm Balance Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName BalanceAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\BalanceAmount
     */
    public $BalanceAmount;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Statement Line. Payment Means
     * @Definition An association to Payment Means.
     * @Cardinality 0..1
     * @ObjectClass Statement Line
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
     * @DictionaryEntryName Statement Line. Payment Terms
     * @Definition An association to Payment Terms.
     * @Cardinality 0..n
     * @ObjectClass Statement Line
     * @PropertyTerm Payment Terms
     * @AssociatedObjectClass Payment Terms
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName PaymentTerms
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PaymentTerms
     */
    public $PaymentTerms;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Statement Line. Buyer_ Customer Party. Customer Party
     * @Definition An association to Buyer.
     * @Cardinality 0..1
     * @ObjectClass Statement Line
     * @PropertyTermQualifier Buyer
     * @PropertyTerm Customer Party
     * @AssociatedObjectClass Customer Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName BuyerCustomerParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\BuyerCustomerParty
     */
    public $BuyerCustomerParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Statement Line. Seller_ Supplier Party. Supplier Party
     * @Definition An association to Seller.
     * @Cardinality 0..1
     * @ObjectClass Statement Line
     * @PropertyTermQualifier Seller
     * @PropertyTerm Supplier Party
     * @AssociatedObjectClass Supplier Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SellerSupplierParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\SellerSupplierParty
     */
    public $SellerSupplierParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Statement Line. Originator_ Customer Party. Customer Party
     * @Definition An association to Originator.
     * @Cardinality 0..1
     * @ObjectClass Statement Line
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
     * @DictionaryEntryName Statement Line. Accounting_ Customer Party. Customer Party
     * @Definition An association to Accounting Customer Party.
     * @Cardinality 0..1
     * @ObjectClass Statement Line
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
     * @DictionaryEntryName Statement Line. Accounting_ Supplier Party. Supplier Party
     * @Definition An association to Accounting Supplier Party.
     * @Cardinality 0..1
     * @ObjectClass Statement Line
     * @PropertyTermQualifier Accounting
     * @PropertyTerm Supplier Party
     * @AssociatedObjectClass Supplier Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AccountingSupplierParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AccountingSupplierParty
     */
    public $AccountingSupplierParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Statement Line. Payee_ Party. Party
     * @Definition An association to Payee.
     * @Cardinality 0..1
     * @ObjectClass Statement Line
     * @PropertyTermQualifier Payee
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PayeeParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PayeeParty
     */
    public $PayeeParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Statement Line. Invoice_ Period. Period
     * @Definition An association to Invoice Period.
     * @Cardinality 0..n
     * @ObjectClass Statement Line
     * @PropertyTermQualifier Invoice
     * @PropertyTerm Period
     * @AssociatedObjectClass Period
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName InvoicePeriod
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\InvoicePeriod
     */
    public $InvoicePeriod;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Statement Line. Billing Reference
     * @Definition An association to Billing Reference.
     * @Cardinality 0..n
     * @ObjectClass Statement Line
     * @PropertyTerm Billing Reference
     * @AssociatedObjectClass Billing Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName BillingReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\BillingReference
     */
    public $BillingReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Statement Line. Document Reference
     * @Definition An association to Document Reference.
     * @Cardinality 0..n
     * @ObjectClass Statement Line
     * @PropertyTerm Document Reference
     * @AssociatedObjectClass Document Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName DocumentReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DocumentReference
     */
    public $DocumentReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Statement Line. Exchange Rate
     * @Definition An association to Exchange Rate (between the Statement Line currency and the Related Document Currency).
     * @Cardinality 0..1
     * @ObjectClass Statement Line
     * @PropertyTerm Exchange Rate
     * @AssociatedObjectClass Exchange Rate
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExchangeRate
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ExchangeRate
     */
    public $ExchangeRate;
} // end class StatementLineType
