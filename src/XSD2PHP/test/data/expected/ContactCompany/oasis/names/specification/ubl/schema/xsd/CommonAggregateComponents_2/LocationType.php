<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName LocationType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LocationType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Location. Details
 * @xmlDefinition Information about a location.
 * @xmlObjectClass Location
 */
class LocationType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Location. Identifier
     * @Definition The unique identifier for the location, e.g., the EAN Location Number, GLN.
     * @Cardinality 0..1
     * @ObjectClass Location
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples 5790002221134
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
     * @DictionaryEntryName Location. Description. Text
     * @Definition The description or name of the location.
     * @Cardinality 0..1
     * @ObjectClass Location
     * @PropertyTerm Description
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Description
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Description
     */
    public $Description;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Location. Conditions. Text
     * @Definition Conditions describing the location.
     * @Cardinality 0..1
     * @ObjectClass Location
     * @PropertyTerm Conditions
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Conditions
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Conditions
     */
    public $Conditions;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Location. Country Subentity. Text
     * @Definition A territorial division of a country, such as a county or state.
     * @Cardinality 0..1
     * @ObjectClass Location
     * @PropertyTerm Country Subentity
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms AdministrativeArea, State, Country, Shire, Canton
     * @Examples "Florida","Tamilnadu"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CountrySubentity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CountrySubentity
     */
    public $CountrySubentity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Location. Country Subentity Code. Code
     * @Definition The territorial division of a country, such as a county or state, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Location
     * @PropertyTerm Country Subentity Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms AdministrativeAreaCode, State Code
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CountrySubentityCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CountrySubentityCode
     */
    public $CountrySubentityCode;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Location. Validity_ Period. Period
     * @Definition Period(s) in which the location can be used, e.g., for delivery.
     * @Cardinality 0..n
     * @ObjectClass Location
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
     * @DictionaryEntryName Location. Address
     * @Definition Association to the address of the location.
     * @Cardinality 0..1
     * @ObjectClass Location
     * @PropertyTerm Address
     * @AssociatedObjectClass Address
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Address
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Address
     */
    public $Address;
} // end class LocationType
