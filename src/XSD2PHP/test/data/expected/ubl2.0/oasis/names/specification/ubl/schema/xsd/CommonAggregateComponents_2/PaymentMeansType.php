<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName PaymentMeansType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PaymentMeansType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Payment Means. Details
 * @xmlDefinition Information about Payment Means.
 * @xmlObjectClass Payment Means
 */
class PaymentMeansType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment Means. Identifier
     * @Definition Identifies the Payment Means.
     * @Cardinality 0..1
     * @ObjectClass Payment Means
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ID
     */
    public $ID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment Means. Payment Means Code. Code
     * @Definition The Payment Means expressed as a code
     * @Cardinality 1
     * @ObjectClass Payment Means
     * @PropertyTerm Payment Means Code
     * @RepresentationTerm Code
     * @DataType Payment Means_ Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName PaymentMeansCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PaymentMeansCode
     */
    public $PaymentMeansCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment Means. Payment Due Date. Date
     * @Definition The date on which payment is due for the Payment Means.
     * @Cardinality 0..1
     * @ObjectClass Payment Means
     * @PropertyTerm Payment Due Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PaymentDueDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PaymentDueDate
     */
    public $PaymentDueDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment Means. Payment Channel Code. Code
     * @Definition The Payment Channel, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Payment Means
     * @PropertyTerm Payment Channel Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PaymentChannelCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PaymentChannelCode
     */
    public $PaymentChannelCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment Means. Instruction Identifier. Identifier
     * @Definition Identifies the Payment Instruction.
     * @Cardinality 0..1
     * @ObjectClass Payment Means
     * @PropertyTerm Instruction Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName InstructionID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\InstructionID
     */
    public $InstructionID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment Means. Instruction_ Note. Text
     * @Definition Free-form text applying to the Payment.
     * @Cardinality 0..n
     * @ObjectClass Payment Means
     * @PropertyTermQualifier Instruction
     * @PropertyTerm Note
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName InstructionNote
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\InstructionNote
     */
    public $InstructionNote;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment Means. Payment Identifier. Identifier
     * @Definition Identifies the Payment(s).
     * @Cardinality 0..n
     * @ObjectClass Payment Means
     * @PropertyTerm Payment Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName PaymentID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PaymentID
     */
    public $PaymentID;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Payment Means. Card Account
     * @Definition An association to Card Account.
     * @Cardinality 0..1
     * @ObjectClass Payment Means
     * @PropertyTerm Card Account
     * @AssociatedObjectClass Card Account
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CardAccount
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CardAccount
     */
    public $CardAccount;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Payment Means. Payer_ Financial Account. Financial Account
     * @Definition An association to the payer's Financial Account.
     * @Cardinality 0..1
     * @ObjectClass Payment Means
     * @PropertyTermQualifier Payer
     * @PropertyTerm Financial Account
     * @AssociatedObjectClass Financial Account
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PayerFinancialAccount
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PayerFinancialAccount
     */
    public $PayerFinancialAccount;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Payment Means. Payee_ Financial Account. Financial Account
     * @Definition An association to the payee's Financial Account.
     * @Cardinality 0..1
     * @ObjectClass Payment Means
     * @PropertyTermQualifier Payee
     * @PropertyTerm Financial Account
     * @AssociatedObjectClass Financial Account
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PayeeFinancialAccount
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PayeeFinancialAccount
     */
    public $PayeeFinancialAccount;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Payment Means. Credit Account
     * @Definition An association to Credit Account.
     * @Cardinality 0..1
     * @ObjectClass Payment Means
     * @PropertyTerm Credit Account
     * @AssociatedObjectClass Credit Account
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CreditAccount
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CreditAccount
     */
    public $CreditAccount;
} // end class PaymentMeansType
