<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName PaymentType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PaymentType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Payment. Details
 * @xmlDefinition Information directly relating to a specific payment.
 * @xmlObjectClass Payment
 */
class PaymentType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment. Identifier
     * @Definition Identifies the payment.
     * @Cardinality 0..1
     * @ObjectClass Payment
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
     * @DictionaryEntryName Payment. Paid_ Amount. Amount
     * @Definition The amount paid.
     * @Cardinality 0..1
     * @ObjectClass Payment
     * @PropertyTermQualifier Paid
     * @PropertyTerm Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PaidAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PaidAmount
     */
    public $PaidAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment. Received_ Date. Date
     * @Definition The date on which the payment was received.
     * @Cardinality 0..1
     * @ObjectClass Payment
     * @PropertyTermQualifier Received
     * @PropertyTerm Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ReceivedDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ReceivedDate
     */
    public $ReceivedDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment. Paid_ Date. Date
     * @Definition The date at which the payment was made.
     * @Cardinality 0..1
     * @ObjectClass Payment
     * @PropertyTermQualifier Paid
     * @PropertyTerm Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PaidDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PaidDate
     */
    public $PaidDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment. Paid_ Time. Time
     * @Definition The time at which the payment was made.
     * @Cardinality 0..1
     * @ObjectClass Payment
     * @PropertyTermQualifier Paid
     * @PropertyTerm Time
     * @RepresentationTerm Time
     * @DataType Time. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PaidTime
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PaidTime
     */
    public $PaidTime;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment. Instruction Identifier. Identifier
     * @Definition Identifies the Payment Instruction.
     * @Cardinality 0..1
     * @ObjectClass Payment
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
} // end class PaymentType
