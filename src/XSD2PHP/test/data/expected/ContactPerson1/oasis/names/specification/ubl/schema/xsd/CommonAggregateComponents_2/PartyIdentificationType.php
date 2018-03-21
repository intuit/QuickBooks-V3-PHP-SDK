<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName PartyIdentificationType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PartyIdentificationType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Party Identification. Details
 * @xmlDefinition Information about a party's identification.
 * @xmlObjectClass Party Identification
 */
class PartyIdentificationType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Party Identification. Identifier
     * @Definition Identifies a party.
     * @Cardinality 1
     * @ObjectClass Party Identification
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName ID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ID
     */
    public $ID;
} // end class PartyIdentificationType
