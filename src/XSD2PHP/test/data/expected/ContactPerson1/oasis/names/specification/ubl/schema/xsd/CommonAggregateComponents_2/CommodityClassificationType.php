<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName CommodityClassificationType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CommodityClassificationType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Commodity Classification. Details
 * @xmlDefinition Information about Commodity Classification.
 * @xmlObjectClass Commodity Classification
 */
class CommodityClassificationType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Commodity Classification. Nature Code. Code
     * @Definition The high-level nature of the Classification issued by a specific maintenance agency, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Commodity Classification
     * @PropertyTerm Nature Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @Examples "wooden products"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName NatureCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\NatureCode
     */
    public $NatureCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Commodity Classification. Cargo Type Code. Code
     * @Definition The type of cargo, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Commodity Classification
     * @PropertyTerm Cargo Type Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @Examples "Refrigerated"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CargoTypeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CargoTypeCode
     */
    public $CargoTypeCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Commodity Classification. Commodity Code. Code
     * @Definition The harmonized international commodity code for regulatory (customs and trade statistics) purposes.
     * @Cardinality 0..1
     * @ObjectClass Commodity Classification
     * @PropertyTerm Commodity Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms Harmonized Code
     * @Examples "1102222883"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CommodityCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CommodityCode
     */
    public $CommodityCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Commodity Classification. Item Classification Code. Code
     * @Definition The trade commodity classification, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Commodity Classification
     * @PropertyTerm Item Classification Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms UN/SPSC Code
     * @Examples "3440234"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ItemClassificationCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ItemClassificationCode
     */
    public $ItemClassificationCode;
} // end class CommodityClassificationType
