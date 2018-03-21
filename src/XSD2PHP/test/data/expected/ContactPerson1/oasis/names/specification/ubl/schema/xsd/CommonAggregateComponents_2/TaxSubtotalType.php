<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName TaxSubtotalType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TaxSubtotalType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Tax Subtotal. Details
 * @xmlDefinition Information about the subtotal for a particular tax category within a tax scheme, such as standard rate within VAT.
 * @xmlObjectClass Tax Subtotal
 */
class TaxSubtotalType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Tax Subtotal. Taxable_ Amount. Amount
     * @Definition The net amount to which the tax percent (rate) is applied to calculate the tax amount.
     * @Cardinality 0..1
     * @ObjectClass Tax Subtotal
     * @PropertyTermQualifier Taxable
     * @PropertyTerm Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TaxableAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TaxableAmount
     */
    public $TaxableAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Tax Subtotal. Tax Amount. Amount
     * @Definition The amount of tax stated explicitly.
     * @Cardinality 1
     * @ObjectClass Tax Subtotal
     * @PropertyTerm Tax Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName TaxAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TaxAmount
     */
    public $TaxAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Tax Subtotal. Calculation Sequence. Numeric
     * @Definition Identifies the numerical order sequence in which taxes are applied when multiple taxes are attracted. If all taxes apply to the same taxable amount, CalculationSequenceNumeric will be '1' for all taxes.
     * @Cardinality 0..1
     * @ObjectClass Tax Subtotal
     * @PropertyTerm Calculation Sequence
     * @RepresentationTerm Numeric
     * @DataType Numeric. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CalculationSequenceNumeric
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CalculationSequenceNumeric
     */
    public $CalculationSequenceNumeric;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Tax Subtotal. Transaction Currency_ Tax Amount. Amount
     * @Definition The tax amount, expressed in the currency used for invoicing.
     * @Cardinality 0..1
     * @ObjectClass Tax Subtotal
     * @PropertyTermQualifier Transaction Currency
     * @PropertyTerm Tax Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TransactionCurrencyTaxAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TransactionCurrencyTaxAmount
     */
    public $TransactionCurrencyTaxAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Tax Subtotal. Percent
     * @Definition The tax rate for the category, expressed as a percentage.
     * @Cardinality 0..1
     * @ObjectClass Tax Subtotal
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
     * @DictionaryEntryName Tax Subtotal. Base Unit Measure. Measure
     * @Definition Where a tax is applied at a certain rate per unit, the measure of units on which the tax calculation is based.
     * @Cardinality 0..1
     * @ObjectClass Tax Subtotal
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
     * @DictionaryEntryName Tax Subtotal. Per Unit_ Amount. Amount
     * @Definition Where a tax is applied at a certain rate per unit, the rate per unit applied.
     * @Cardinality 0..1
     * @ObjectClass Tax Subtotal
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
     * @DictionaryEntryName Tax Subtotal. Tier Range. Text
     * @Definition Where a tax is tiered, the range of tiers applied in the calculation of the tax subtotal for the tax category.
     * @Cardinality 0..1
     * @ObjectClass Tax Subtotal
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
     * @DictionaryEntryName Tax Subtotal. Tier Rate. Percent
     * @Definition Where a tax is tiered, the rate of tax applied to the range of tiers in the calculation of the tax subtotal for the tax category.
     * @Cardinality 0..1
     * @ObjectClass Tax Subtotal
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
     * @DictionaryEntryName Tax Subtotal. Tax Category
     * @Definition An association to Tax Category.
     * @Cardinality 1
     * @ObjectClass Tax Subtotal
     * @PropertyTerm Tax Category
     * @AssociatedObjectClass Tax Category
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName TaxCategory
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TaxCategory
     */
    public $TaxCategory;
} // end class TaxSubtotalType
