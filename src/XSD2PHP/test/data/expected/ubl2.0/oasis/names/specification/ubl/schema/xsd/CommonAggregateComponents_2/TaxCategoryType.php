<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName TaxCategoryType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TaxCategoryType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Tax Category. Details
 * @xmlDefinition Information about a tax category.
 * @xmlObjectClass Tax Category
 */
class TaxCategoryType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Tax Category. Identifier
     * @Definition Identifies the tax category.
     * @Cardinality 0..1
     * @ObjectClass Tax Category
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "ZeroRatedGoods" "NotTaxable" "Standard Rate"
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
     * @DictionaryEntryName Tax Category. Name
     * @Definition The name of the tax category.
     * @Cardinality 0..1
     * @ObjectClass Tax Category
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @Examples "Luxury Goods","Wine Equalization", "Exempt"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Name
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Name
     */
    public $Name;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Tax Category. Percent
     * @Definition The tax rate for the category, expressed as a percentage.
     * @Cardinality 0..1
     * @ObjectClass Tax Category
     * @PropertyTerm Percent
     * @RepresentationTerm Percent
     * @DataType Percent. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Percent
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Percent
     */
    public $Percent;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Tax Category. Base Unit Measure. Measure
     * @Definition Where a tax is applied at a certain rate per unit, the measure of units on which the tax calculation is based.
     * @Cardinality 0..1
     * @ObjectClass Tax Category
     * @PropertyTerm Base Unit Measure
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName BaseUnitMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\BaseUnitMeasure
     */
    public $BaseUnitMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Tax Category. Per Unit_ Amount. Amount
     * @Definition Where a tax is applied at a certain rate per unit, the rate per unit applied.
     * @Cardinality 0..1
     * @ObjectClass Tax Category
     * @PropertyTermQualifier Per Unit
     * @PropertyTerm Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PerUnitAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PerUnitAmount
     */
    public $PerUnitAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Tax Category. Tax Exemption Reason Code. Code
     * @Definition The reason for tax being exempted expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Tax Category
     * @PropertyTerm Tax Exemption Reason Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TaxExemptionReasonCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TaxExemptionReasonCode
     */
    public $TaxExemptionReasonCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Tax Category. Tax Exemption Reason. Text
     * @Definition The reason for tax being exempted.
     * @Cardinality 0..1
     * @ObjectClass Tax Category
     * @PropertyTerm Tax Exemption Reason
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TaxExemptionReason
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TaxExemptionReason
     */
    public $TaxExemptionReason;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Tax Category. Tier Range. Text
     * @Definition Where a tax is tiered, the range of tiers applied in the calculation of the tax subtotal for the tax category.
     * @Cardinality 0..1
     * @ObjectClass Tax Category
     * @PropertyTerm Tier Range
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TierRange
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TierRange
     */
    public $TierRange;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Tax Category. Tier Rate. Percent
     * @Definition Where a tax is tiered, the rate of tax applied to the range of tiers in the calculation of the tax subtotal for the tax category.
     * @Cardinality 0..1
     * @ObjectClass Tax Category
     * @PropertyTerm Tier Rate
     * @RepresentationTerm Percent
     * @DataType Percent. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TierRatePercent
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TierRatePercent
     */
    public $TierRatePercent;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Tax Category. Tax Scheme
     * @Definition An association to Tax Scheme.
     * @Cardinality 1
     * @ObjectClass Tax Category
     * @PropertyTerm Tax Scheme
     * @AssociatedObjectClass Tax Scheme
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName TaxScheme
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TaxScheme
     */
    public $TaxScheme;
} // end class TaxCategoryType
