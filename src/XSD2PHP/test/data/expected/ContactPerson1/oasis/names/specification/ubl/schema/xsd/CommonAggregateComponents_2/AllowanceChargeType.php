<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName AllowanceChargeType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AllowanceChargeType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Allowance Charge. Details
 * @xmlDefinition Information about a charge or discount price component.
 * @xmlObjectClass Allowance Charge
 */
class AllowanceChargeType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Allowance Charge. Identifier
     * @Definition Identifies an Allowance Charge.
     * @Cardinality 0..1
     * @ObjectClass Allowance Charge
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
     * @DictionaryEntryName Allowance Charge. Charge_ Indicator. Indicator
     * @Definition Indicates whether the Allowance Charge is a charge (true) or a discount (false).
     * @Cardinality 1
     * @ObjectClass Allowance Charge
     * @PropertyTermQualifier Charge
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName ChargeIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ChargeIndicator
     */
    public $ChargeIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Allowance Charge. Allowance Charge Reason Code. Code
     * @Definition The reason for the Allowance Charge, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Allowance Charge
     * @PropertyTerm Allowance Charge Reason Code
     * @RepresentationTerm Code
     * @DataType Allowance Charge Reason_ Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AllowanceChargeReasonCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AllowanceChargeReasonCode
     */
    public $AllowanceChargeReasonCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Allowance Charge. Allowance Charge_ Reason. Text
     * @Definition The reason for the Allowance Charge, expressed as text.
     * @Cardinality 0..1
     * @ObjectClass Allowance Charge
     * @PropertyTermQualifier Allowance Charge
     * @PropertyTerm Reason
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AllowanceChargeReason
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AllowanceChargeReason
     */
    public $AllowanceChargeReason;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Allowance Charge. Multiplier_ Factor. Numeric
     * @Definition The factor applied to the Base Amount to calculate the Allowance Charge.
     * @Cardinality 0..1
     * @ObjectClass Allowance Charge
     * @PropertyTermQualifier Multiplier
     * @PropertyTerm Factor
     * @RepresentationTerm Numeric
     * @DataType Numeric. Type
     * @Examples 0.20
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MultiplierFactorNumeric
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MultiplierFactorNumeric
     */
    public $MultiplierFactorNumeric;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Allowance Charge. Prepaid_ Indicator. Indicator
     * @Definition Indicates whether the Allowance Charge is prepaid (true) or not (false).
     * @Cardinality 0..1
     * @ObjectClass Allowance Charge
     * @PropertyTermQualifier Prepaid
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PrepaidIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PrepaidIndicator
     */
    public $PrepaidIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Allowance Charge. Sequence. Numeric
     * @Definition Identifies the numerical order sequence in which Allowance Charges are calculated when multiple Allowance Charges apply. If all Allowance Charges apply to the same Base Amount, SequenceNumeric will be '1' for all Allowance Charges.
     * @Cardinality 0..1
     * @ObjectClass Allowance Charge
     * @PropertyTerm Sequence
     * @RepresentationTerm Numeric
     * @DataType Numeric. Type
     * @Examples 1, 2, 3, 4, etc.
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SequenceNumeric
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SequenceNumeric
     */
    public $SequenceNumeric;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Allowance Charge. Amount
     * @Definition The Allowance Charge amount.
     * @Cardinality 1
     * @ObjectClass Allowance Charge
     * @PropertyTerm Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @Examples 35,23
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Amount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Amount
     */
    public $Amount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Allowance Charge. Base_ Amount. Amount
     * @Definition The amount to which the MultiplierFactorNumeric is applied to calculate the Allowance Charge.
     * @Cardinality 0..1
     * @ObjectClass Allowance Charge
     * @PropertyTermQualifier Base
     * @PropertyTerm Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName BaseAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\BaseAmount
     */
    public $BaseAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Allowance Charge. Accounting Cost Code. Code
     * @Definition The buyer's accounting code as applied to the Allowance Charge.
     * @Cardinality 0..1
     * @ObjectClass Allowance Charge
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
     * @DictionaryEntryName Allowance Charge. Accounting Cost. Text
     * @Definition The buyer's accounting code as applied to the Allowance Charge expressed as text.
     * @Cardinality 0..1
     * @ObjectClass Allowance Charge
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
     * @ComponentType ASBIE
     * @DictionaryEntryName Allowance Charge. Tax Category
     * @Definition An association to Tax Category.
     * @Cardinality 0..n
     * @ObjectClass Allowance Charge
     * @PropertyTerm Tax Category
     * @AssociatedObjectClass Tax Category
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName TaxCategory
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TaxCategory
     */
    public $TaxCategory;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Allowance Charge. Tax Total
     * @Definition An association to Tax Total.
     * @Cardinality 0..1
     * @ObjectClass Allowance Charge
     * @PropertyTerm Tax Total
     * @AssociatedObjectClass Tax Total
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TaxTotal
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TaxTotal
     */
    public $TaxTotal;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Allowance Charge. Payment Means
     * @Definition An association to Payment Means.
     * @Cardinality 0..n
     * @ObjectClass Allowance Charge
     * @PropertyTerm Payment Means
     * @AssociatedObjectClass Payment Means
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName PaymentMeans
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PaymentMeans
     */
    public $PaymentMeans;
} // end class AllowanceChargeType
