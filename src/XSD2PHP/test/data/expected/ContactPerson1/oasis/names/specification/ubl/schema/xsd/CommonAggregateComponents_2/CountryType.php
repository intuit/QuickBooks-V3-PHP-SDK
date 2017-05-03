<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName CountryType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CountryType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Country. Details
 * @xmlDefinition Information about a geopolitical country.
 * @xmlObjectClass Country
 */
class CountryType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Country. Identification Code. Code
     * @Definition An identifier for the Country.
     * @Cardinality 0..1
     * @ObjectClass Country
     * @PropertyTerm Identification Code
     * @RepresentationTerm Code
     * @DataType Country Identification_ Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName IdentificationCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\IdentificationCode
     */
    public $IdentificationCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Country. Name
     * @Definition The name of the Country.
     * @Cardinality 0..1
     * @ObjectClass Country
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @Examples “SOUTH AFRICA”
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Name
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Name
     */
    public $Name;
} // end class CountryType
