<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName PartyNameType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PartyNameType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Party Name. Details
 * @xmlDefinition Information about a party's name.
 * @xmlObjectClass Party Name
 */
class PartyNameType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Party Name. Name
     * @Definition The name of the party.
     * @Cardinality 1
     * @ObjectClass Party Name
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @Examples "Microsoft"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Name
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Name
     */
    public $Name;
} // end class PartyNameType
