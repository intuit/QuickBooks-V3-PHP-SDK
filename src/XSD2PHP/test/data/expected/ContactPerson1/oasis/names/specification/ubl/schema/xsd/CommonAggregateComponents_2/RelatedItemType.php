<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName RelatedItemType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\RelatedItemType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Related Item. Details
 * @xmlDefinition Information about the relationship between two items.
 * @xmlObjectClass Related Item
 */
class RelatedItemType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Related Item. Identifier
     * @Definition An identifier for the related item.
     * @Cardinality 0..1
     * @ObjectClass Related Item
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "First", "Second"
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
     * @DictionaryEntryName Related Item. Quantity
     * @Definition The quantity that applies to the relationship.
     * @Cardinality 0..1
     * @ObjectClass Related Item
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @Examples "6", "10mg per Kilo"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Quantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Quantity
     */
    public $Quantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Related Item. Description. Text
     * @Definition A description for the relationship.
     * @Cardinality 0..n
     * @ObjectClass Related Item
     * @PropertyTerm Description
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "If used in wet conditions or extreme environments"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Description
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Description
     */
    public $Description;
} // end class RelatedItemType
