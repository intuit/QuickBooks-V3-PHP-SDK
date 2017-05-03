<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName PriceListType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PriceListType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Price List. Details
 * @xmlDefinition Information about a Price List.
 * @xmlObjectClass Price List
 */
class PriceListType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Price List. Identifier
     * @Definition Identifies the Price List.
     * @Cardinality 0..1
     * @ObjectClass Price List
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
     * @DictionaryEntryName Price List. Status Code. Code
     * @Definition Identifies whether the price list is an 'original', 'copy', 'revision', or 'cancellation'.
     * @Cardinality 0..1
     * @ObjectClass Price List
     * @PropertyTerm Status Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @Examples "new - announcement only", "new and available", "deleted - announcement only"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName StatusCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\StatusCode
     */
    public $StatusCode;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Price List. Validity_ Period. Period
     * @Definition An association to Validity Period.
     * @Cardinality 0..n
     * @ObjectClass Price List
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
     * @DictionaryEntryName Price List. Previous_ Price List. Price List
     * @Definition An association to Previous Price List.
     * @Cardinality 0..1
     * @ObjectClass Price List
     * @PropertyTermQualifier Previous
     * @PropertyTerm Price List
     * @AssociatedObjectClass Price List
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PreviousPriceList
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PreviousPriceList
     */
    public $PreviousPriceList;
} // end class PriceListType
