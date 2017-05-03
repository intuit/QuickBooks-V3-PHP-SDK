<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName PartyLegalEntityType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PartyLegalEntityType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Party Legal Entity. Details
 * @xmlDefinition Information directly relating to the legal registration that is applicable to a party.
 * @xmlObjectClass Party Legal Entity
 */
class PartyLegalEntityType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Party Legal Entity. Registration_ Name. Name
     * @Definition The name of a party as registered with the legal authority.
     * @Cardinality 0..1
     * @ObjectClass Party Legal Entity
     * @PropertyTermQualifier Registration
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @Examples "Microsoft Corporation"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RegistrationName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RegistrationName
     */
    public $RegistrationName;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Party Legal Entity. Company Identifier. Identifier
     * @Definition Identifies a company as registered with the company registration scheme.
     * @Cardinality 0..1
     * @ObjectClass Party Legal Entity
     * @PropertyTerm Company Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms Business Registration Number, Company Number
     * @Examples "3556625"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CompanyID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CompanyID
     */
    public $CompanyID;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Party Legal Entity. Registration_ Address. Address
     * @Definition Associates with the registered address of the party within a Corporate Registration Scheme.
     * @Cardinality 0..1
     * @ObjectClass Party Legal Entity
     * @PropertyTermQualifier Registration
     * @PropertyTerm Address
     * @AssociatedObjectClass Address
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RegistrationAddress
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\RegistrationAddress
     */
    public $RegistrationAddress;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Party Legal Entity. Corporate Registration Scheme
     * @Definition Associates the party with a Corporate Registration Scheme.
     * @Cardinality 0..1
     * @ObjectClass Party Legal Entity
     * @PropertyTerm Corporate Registration Scheme
     * @AssociatedObjectClass Corporate Registration Scheme
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CorporateRegistrationScheme
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CorporateRegistrationScheme
     */
    public $CorporateRegistrationScheme;
} // end class PartyLegalEntityType
