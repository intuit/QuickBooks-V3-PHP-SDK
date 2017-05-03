<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName PhysicalAttributeType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PhysicalAttributeType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Physical Attribute. Details
 * @xmlDefinition Information about physical attributes.
 * @xmlObjectClass Physical Attribute
 */
class PhysicalAttributeType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Physical Attribute. Attribute Identifier. Identifier
     * @Definition Identifies the physical attribute.
     * @Cardinality 1
     * @ObjectClass Physical Attribute
     * @PropertyTerm Attribute Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "colour" "style"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName AttributeID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AttributeID
     */
    public $AttributeID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Physical Attribute. Position Code. Code
     * @Definition The position of the physical attribute, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Physical Attribute
     * @PropertyTerm Position Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PositionCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PositionCode
     */
    public $PositionCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Physical Attribute. Description Code. Code
     * @Definition The description of the physical attribute, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Physical Attribute
     * @PropertyTerm Description Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @Examples "XXL","Small"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DescriptionCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DescriptionCode
     */
    public $DescriptionCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Physical Attribute. Description. Text
     * @Definition The description of the physical attribute, expressed as text.
     * @Cardinality 0..n
     * @ObjectClass Physical Attribute
     * @PropertyTerm Description
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Description
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Description
     */
    public $Description;
} // end class PhysicalAttributeType
