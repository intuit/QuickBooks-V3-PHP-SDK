<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName TaxTotalType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TaxTotalType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Tax Total. Details
 * @xmlDefinition Information about a total amount of a particular type of tax.
 * @xmlObjectClass Tax Total
 */
class TaxTotalType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Tax Total. Tax Amount. Amount
     * @Definition The total tax amount for particular tax scheme e.g. VAT;  the sum of each of the tax subtotals for each tax category within the tax scheme.
     * @Cardinality 1
     * @ObjectClass Tax Total
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
     * @DictionaryEntryName Tax Total. Rounding Amount. Amount
     * @Definition The rounding amount (positive or negative) added to the calculated tax total to produce the rounded TotalTaxAmount.
     * @Cardinality 0..1
     * @ObjectClass Tax Total
     * @PropertyTerm Rounding Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RoundingAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RoundingAmount
     */
    public $RoundingAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Tax Total. Tax Evidence_ Indicator. Indicator
     * @Definition An indicator as to whether these totals are recognized as legal evidence for taxation purposes.
     * @Cardinality 0..1
     * @ObjectClass Tax Total
     * @PropertyTermQualifier Tax Evidence
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @Examples default is negative
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TaxEvidenceIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TaxEvidenceIndicator
     */
    public $TaxEvidenceIndicator;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Tax Total. Tax Subtotal
     * @Definition An association to Tax Subtotal.
     * @Cardinality 0..n
     * @ObjectClass Tax Total
     * @PropertyTerm Tax Subtotal
     * @AssociatedObjectClass Tax Subtotal
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName TaxSubtotal
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TaxSubtotal
     */
    public $TaxSubtotal;
} // end class TaxTotalType
