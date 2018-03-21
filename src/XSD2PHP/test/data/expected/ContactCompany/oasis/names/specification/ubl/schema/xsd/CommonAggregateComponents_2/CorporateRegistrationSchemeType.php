<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName CorporateRegistrationSchemeType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CorporateRegistrationSchemeType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Corporate Registration Scheme. Details
 * @xmlDefinition Information directly relating a scheme for corporate registration of businesses.
 * @xmlObjectClass Corporate Registration Scheme
 */
class CorporateRegistrationSchemeType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Corporate Registration Scheme. Identifier
     * @Definition Identifies the scheme.
     * @Cardinality 0..1
     * @ObjectClass Corporate Registration Scheme
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "ASIC" in Australia
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
     * @DictionaryEntryName Corporate Registration Scheme. Name
     * @Definition Identifies the scheme by name.
     * @Cardinality 0..1
     * @ObjectClass Corporate Registration Scheme
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @Examples "Australian Securities and Investment Commission" in Australia
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Name
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Name
     */
    public $Name;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Corporate Registration Scheme. Corporate Registration Type Code. Code
     * @Definition Identifies the type of scheme.
     * @Cardinality 0..1
     * @ObjectClass Corporate Registration Scheme
     * @PropertyTerm Corporate Registration Type Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @Examples "ACN"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CorporateRegistrationTypeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CorporateRegistrationTypeCode
     */
    public $CorporateRegistrationTypeCode;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Corporate Registration Scheme. Jurisdiction Region_ Address. Address
     * @Definition Associates the registration scheme with particulars that identify and locate the geographic area to which the scheme applies.
     * @Cardinality 0..n
     * @ObjectClass Corporate Registration Scheme
     * @PropertyTermQualifier Jurisdiction Region
     * @PropertyTerm Address
     * @AssociatedObjectClass Address
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName JurisdictionRegionAddress
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\JurisdictionRegionAddress
     */
    public $JurisdictionRegionAddress;
} // end class CorporateRegistrationSchemeType
