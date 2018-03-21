<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName PersonType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PersonType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Person. Details
 * @xmlDefinition Information about a person.
 * @xmlObjectClass Person
 */
class PersonType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Person. First_ Name. Name
     * @Definition A person's forename or first name.
     * @Cardinality 0..1
     * @ObjectClass Person
     * @PropertyTermQualifier First
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName FirstName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\FirstName
     */
    public $FirstName;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Person. Family_ Name. Name
     * @Definition A person's surname or family name.
     * @Cardinality 0..1
     * @ObjectClass Person
     * @PropertyTermQualifier Family
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName FamilyName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\FamilyName
     */
    public $FamilyName;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Person. Title. Text
     * @Definition A person's title of address, e.g., Mr, Ms, Dr, Sir.
     * @Cardinality 0..1
     * @ObjectClass Person
     * @PropertyTerm Title
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Title
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Title
     */
    public $Title;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Person. Middle_ Name. Name
     * @Definition A person's middle name(s) and/or initial(s).
     * @Cardinality 0..1
     * @ObjectClass Person
     * @PropertyTermQualifier Middle
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MiddleName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MiddleName
     */
    public $MiddleName;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Person. Name Suffix. Text
     * @Definition A suffix to a person's name, e.g., PhD, OBE, Jnr.
     * @Cardinality 0..1
     * @ObjectClass Person
     * @PropertyTerm Name Suffix
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName NameSuffix
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\NameSuffix
     */
    public $NameSuffix;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Person. Job Title. Text
     * @Definition A person's job title within an organization (for a particular role).
     * @Cardinality 0..1
     * @ObjectClass Person
     * @PropertyTerm Job Title
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName JobTitle
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\JobTitle
     */
    public $JobTitle;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Person. Organization_ Department. Text
     * @Definition The department or subdivision of an organization that the person belongs to (for a particular role).
     * @Cardinality 0..1
     * @ObjectClass Person
     * @PropertyTermQualifier Organization
     * @PropertyTerm Department
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OrganizationDepartment
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\OrganizationDepartment
     */
    public $OrganizationDepartment;
} // end class PersonType
