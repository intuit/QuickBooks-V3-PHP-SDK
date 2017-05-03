<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName RemittanceAdviceLineType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\RemittanceAdviceLineType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Remittance Advice Line. Details
 * @xmlDefinition Information about a Line on a Remittance Advice.
 * @xmlObjectClass Remittance Advice Line
 */
class RemittanceAdviceLineType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Remittance Advice Line. Identifier
     * @Definition Identifies the Remittance Advice Line.
     * @Cardinality 1
     * @ObjectClass Remittance Advice Line
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
     * @DictionaryEntryName Remittance Advice Line. Note. Text
     * @Definition Free-form text applying to the Remittance Advice Line. This element may contain notes or any other similar information that is not contained explicitly in another structure.
     * @Cardinality 0..1
     * @ObjectClass Remittance Advice Line
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
     * @DictionaryEntryName Remittance Advice Line. UUID. Identifier
     * @Definition A universally unique identifier for an instance of this ABIE.
     * @Cardinality 0..1
     * @ObjectClass Remittance Advice Line
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
     * @DictionaryEntryName Remittance Advice Line. Debit_ Line Amount. Amount
     * @Definition The amount debited on the Remittance Advice Line.
     * @Cardinality 0..1
     * @ObjectClass Remittance Advice Line
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
     * @DictionaryEntryName Remittance Advice Line. Credit_ Line Amount. Amount
     * @Definition The amount credited on the Remittance Advice Line.
     * @Cardinality 0..1
     * @ObjectClass Remittance Advice Line
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
     * @DictionaryEntryName Remittance Advice Line. Balance Amount. Amount
     * @Definition The balance amount on the Remittance Advice Line.
     * @Cardinality 0..1
     * @ObjectClass Remittance Advice Line
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
     * @DictionaryEntryName Remittance Advice Line. Accounting_ Supplier Party. Supplier Party
     * @Definition An association to Supplier Accounting Party.
     * @Cardinality 0..1
     * @ObjectClass Remittance Advice Line
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
     * @DictionaryEntryName Remittance Advice Line. Accounting_ Customer Party. Customer Party
     * @Definition An association to Customer Accounting Party.
     * @Cardinality 0..1
     * @ObjectClass Remittance Advice Line
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
     * @DictionaryEntryName Remittance Advice Line. Buyer_ Customer Party. Customer Party
     * @Definition An association to Buyer.
     * @Cardinality 0..1
     * @ObjectClass Remittance Advice Line
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
     * @DictionaryEntryName Remittance Advice Line. Seller_ Supplier Party. Supplier Party
     * @Definition An association to Seller.
     * @Cardinality 0..1
     * @ObjectClass Remittance Advice Line
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
     * @DictionaryEntryName Remittance Advice Line. Originator_ Customer Party. Customer Party
     * @Definition An association to Originator.
     * @Cardinality 0..1
     * @ObjectClass Remittance Advice Line
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
     * @DictionaryEntryName Remittance Advice Line. Payee_ Party. Party
     * @Definition An association to Payee.
     * @Cardinality 0..1
     * @ObjectClass Remittance Advice Line
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
     * @DictionaryEntryName Remittance Advice Line. Invoice_ Period. Period
     * @Definition An association to Invoice Period.
     * @Cardinality 0..n
     * @ObjectClass Remittance Advice Line
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
     * @DictionaryEntryName Remittance Advice Line. Billing Reference
     * @Definition An association to Billing Reference.
     * @Cardinality 0..n
     * @ObjectClass Remittance Advice Line
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
     * @DictionaryEntryName Remittance Advice Line. Document Reference
     * @Definition An association to Document Reference.
     * @Cardinality 0..n
     * @ObjectClass Remittance Advice Line
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
     * @DictionaryEntryName Remittance Advice Line. Exchange Rate
     * @Definition An association to Exchange Rate (between the Remittance Advice Line currency and the Related Document currency).
     * @Cardinality 0..1
     * @ObjectClass Remittance Advice Line
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
} // end class RemittanceAdviceLineType
