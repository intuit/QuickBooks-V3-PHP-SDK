<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName MonetaryTotalType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\MonetaryTotalType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Monetary Total. Details
 * @xmlDefinition Information about Monetary Totals.
 * @xmlObjectClass Monetary Total
 */
class MonetaryTotalType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Monetary Total. Line Extension Amount. Amount
     * @Definition The total of Line Extension Amounts net of tax and settlement discounts, but inclusive of any applicable rounding amount.
     * @Cardinality 0..1
     * @ObjectClass Monetary Total
     * @PropertyTerm Line Extension Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LineExtensionAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LineExtensionAmount
     */
    public $LineExtensionAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Monetary Total. Tax Exclusive Amount. Amount
     * @Definition The total amount exclusive of taxes.
     * @Cardinality 0..1
     * @ObjectClass Monetary Total
     * @PropertyTerm Tax Exclusive Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TaxExclusiveAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TaxExclusiveAmount
     */
    public $TaxExclusiveAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Monetary Total. Tax Inclusive Amount. Amount
     * @Definition The total amount inclusive of taxes.
     * @Cardinality 0..1
     * @ObjectClass Monetary Total
     * @PropertyTerm Tax Inclusive Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TaxInclusiveAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TaxInclusiveAmount
     */
    public $TaxInclusiveAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Monetary Total. Allowance Total Amount. Amount
     * @Definition The total amount of all allowances.
     * @Cardinality 0..1
     * @ObjectClass Monetary Total
     * @PropertyTerm Allowance Total Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AllowanceTotalAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AllowanceTotalAmount
     */
    public $AllowanceTotalAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Monetary Total. Charge Total Amount. Amount
     * @Definition The total amount of all charges.
     * @Cardinality 0..1
     * @ObjectClass Monetary Total
     * @PropertyTerm Charge Total Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ChargeTotalAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ChargeTotalAmount
     */
    public $ChargeTotalAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Monetary Total. Prepaid Amount. Amount
     * @Definition The total prepaid amount.
     * @Cardinality 0..1
     * @ObjectClass Monetary Total
     * @PropertyTerm Prepaid Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PrepaidAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PrepaidAmount
     */
    public $PrepaidAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Monetary Total. Payable_ Rounding Amount. Amount
     * @Definition The rounding amount (positive or negative) added to the calculated Line Extension Total Amount to produce the rounded Line Extension Total Amount.
     * @Cardinality 0..1
     * @ObjectClass Monetary Total
     * @PropertyTermQualifier Payable
     * @PropertyTerm Rounding Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PayableRoundingAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PayableRoundingAmount
     */
    public $PayableRoundingAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Monetary Total. Payable_ Amount. Amount
     * @Definition The total amount to be paid.
     * @Cardinality 1
     * @ObjectClass Monetary Total
     * @PropertyTermQualifier Payable
     * @PropertyTerm Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName PayableAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PayableAmount
     */
    public $PayableAmount;
} // end class MonetaryTotalType
