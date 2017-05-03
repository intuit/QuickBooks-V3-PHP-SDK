<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ItemPropertyGroupType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ItemPropertyGroupType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Item Property Group. Details
 * @xmlDefinition Information about sets of classifications (or groups) of Item Properties.
 * @xmlObjectClass Item Property Group
 */
class ItemPropertyGroupType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item Property Group. Identifier
     * @Definition An identifier for the Item Property Group.
     * @Cardinality 1
     * @ObjectClass Item Property Group
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "233-004"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName ID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ID
     */
    public $ID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item Property Group. Name
     * @Definition The name of the Item Property Group.
     * @Cardinality 0..1
     * @ObjectClass Item Property Group
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @Examples "Electrical Specifications", "Dietary Content"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Name
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Name
     */
    public $Name;
} // end class ItemPropertyGroupType
