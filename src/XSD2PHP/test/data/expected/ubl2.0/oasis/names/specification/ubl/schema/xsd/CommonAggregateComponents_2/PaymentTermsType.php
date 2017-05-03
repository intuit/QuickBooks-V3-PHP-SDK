<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName PaymentTermsType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PaymentTermsType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Payment Terms. Details
 * @xmlDefinition Information about Payment Terms.
 * @xmlObjectClass Payment Terms
 */
class PaymentTermsType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment Terms. Identifier
     * @Definition Identifies the Payment Terms.
     * @Cardinality 0..1
     * @ObjectClass Payment Terms
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
     * @DictionaryEntryName Payment Terms. Payment Means Identifier. Identifier
     * @Definition Identifies the applicable Payment Means.
     * @Cardinality 0..1
     * @ObjectClass Payment Terms
     * @PropertyTerm Payment Means Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PaymentMeansID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PaymentMeansID
     */
    public $PaymentMeansID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment Terms. Prepaid Payment Reference Identifier. Identifier
     * @Definition Identifies prepaid payment.
     * @Cardinality 0..1
     * @ObjectClass Payment Terms
     * @PropertyTerm Prepaid Payment Reference Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PrepaidPaymentReferenceID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PrepaidPaymentReferenceID
     */
    public $PrepaidPaymentReferenceID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment Terms. Note. Text
     * @Definition Free-form text applying to the Payment Terms. This element may contain notes or any other similar information that is not contained explicitly in another structure.
     * @Cardinality 0..n
     * @ObjectClass Payment Terms
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
     * @DictionaryEntryName Payment Terms. Reference_ Event Code. Code
     * @Definition The event from which terms are offered for a length of time, identified by a standard code.
     * @Cardinality 0..1
     * @ObjectClass Payment Terms
     * @PropertyTermQualifier Reference
     * @PropertyTerm Event Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ReferenceEventCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ReferenceEventCode
     */
    public $ReferenceEventCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment Terms. Settlement_ Discount Percent. Percent
     * @Definition The settlement discount rate (percentage) offered for payment within the settlement period.
     * @Cardinality 0..1
     * @ObjectClass Payment Terms
     * @PropertyTermQualifier Settlement
     * @PropertyTerm Discount Percent
     * @RepresentationTerm Percent
     * @DataType Percent. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SettlementDiscountPercent
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SettlementDiscountPercent
     */
    public $SettlementDiscountPercent;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment Terms. Penalty_ Surcharge Percent. Percent
     * @Definition The penalty rate (percentage) charged for late payment.
     * @Cardinality 0..1
     * @ObjectClass Payment Terms
     * @PropertyTermQualifier Penalty
     * @PropertyTerm Surcharge Percent
     * @RepresentationTerm Percent
     * @DataType Percent. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PenaltySurchargePercent
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PenaltySurchargePercent
     */
    public $PenaltySurchargePercent;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Payment Terms. Amount
     * @Definition The payment amount for the Payment Terms.
     * @Cardinality 0..1
     * @ObjectClass Payment Terms
     * @PropertyTerm Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Amount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Amount
     */
    public $Amount;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Payment Terms. Settlement_ Period. Period
     * @Definition An association to Settlement Period.
     * @Cardinality 0..1
     * @ObjectClass Payment Terms
     * @PropertyTermQualifier Settlement
     * @PropertyTerm Period
     * @AssociatedObjectClass Period
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SettlementPeriod
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\SettlementPeriod
     */
    public $SettlementPeriod;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Payment Terms. Penalty_ Period. Period
     * @Definition An association to Penalty Period.
     * @Cardinality 0..1
     * @ObjectClass Payment Terms
     * @PropertyTermQualifier Penalty
     * @PropertyTerm Period
     * @AssociatedObjectClass Period
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PenaltyPeriod
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PenaltyPeriod
     */
    public $PenaltyPeriod;
} // end class PaymentTermsType
