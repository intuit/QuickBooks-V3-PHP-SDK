<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName AddressLineType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AddressLineType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Address Line. Details
 * @xmlDefinition Information about a line of address expressed as unstructured text.
 * @xmlObjectClass Address Line
 */
class AddressLineType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address Line. Line. Text
     * @Definition A line of address expressed as unstructured text.
     * @Cardinality 1
     * @ObjectClass Address Line
     * @PropertyTerm Line
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "123 Standard Chartered Tower"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Line
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Line
     */
    public $Line;
} // end class AddressLineType
