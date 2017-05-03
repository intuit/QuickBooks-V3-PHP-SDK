<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName PriceType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PriceType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Price. Details
 * @xmlDefinition Information about the price.
 * @xmlObjectClass Price
 */
class PriceType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Price. Price Amount. Amount
     * @Definition The price amount.
     * @Cardinality 1
     * @ObjectClass Price
     * @PropertyTerm Price Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @AlternativeBusinessTerms unit price
     * @Examples 23.45
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName PriceAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PriceAmount
     */
    public $PriceAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Price. Base_ Quantity. Quantity
     * @Definition The actual quantity to which the price applies.
     * @Cardinality 0..1
     * @ObjectClass Price
     * @PropertyTermQualifier Base
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName BaseQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\BaseQuantity
     */
    public $BaseQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Price. Price Change_ Reason. Text
     * @Definition The reason for the price change, expressed as text.
     * @Cardinality 0..n
     * @ObjectClass Price
     * @PropertyTermQualifier Price Change
     * @PropertyTerm Reason
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "Clearance of old stock", "New contract applies"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName PriceChangeReason
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PriceChangeReason
     */
    public $PriceChangeReason;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Price. Price Type Code. Code
     * @Definition The price type, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Price
     * @PropertyTerm Price Type Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PriceTypeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PriceTypeCode
     */
    public $PriceTypeCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Price. Price Type. Text
     * @Definition The price type, expressed as text.
     * @Cardinality 0..1
     * @ObjectClass Price
     * @PropertyTerm Price Type
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples retail, wholesale, discount, contract
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PriceType
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PriceType
     */
    public $PriceType;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Price. Orderable Unit Factor. Rate
     * @Definition The factor by which the base price unit can be converted to the orderable unit.
     * @Cardinality 0..1
     * @ObjectClass Price
     * @PropertyTerm Orderable Unit Factor
     * @RepresentationTerm Rate
     * @DataType Rate. Type
     * @Examples Nails are priced by weight but ordered by quantity.  So this would say how many nails per kilo
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OrderableUnitFactorRate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\OrderableUnitFactorRate
     */
    public $OrderableUnitFactorRate;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Price. Validity_ Period. Period
     * @Definition An association to Validity Period.
     * @Cardinality 0..n
     * @ObjectClass Price
     * @PropertyTermQualifier Validity
     * @PropertyTerm Period
     * @AssociatedObjectClass Period
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ValidityPeriod
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ValidityPeriod
     */
    public $ValidityPeriod;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Price. Price List
     * @Definition A reference to a Price List.
     * @Cardinality 0..1
     * @ObjectClass Price
     * @PropertyTerm Price List
     * @AssociatedObjectClass Price List
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PriceList
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PriceList
     */
    public $PriceList;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Price. Allowance Charge
     * @Definition An association to Allowance Charge.
     * @Cardinality 0..n
     * @ObjectClass Price
     * @PropertyTerm Allowance Charge
     * @AssociatedObjectClass Allowance Charge
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName AllowanceCharge
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AllowanceCharge
     */
    public $AllowanceCharge;
} // end class PriceType
