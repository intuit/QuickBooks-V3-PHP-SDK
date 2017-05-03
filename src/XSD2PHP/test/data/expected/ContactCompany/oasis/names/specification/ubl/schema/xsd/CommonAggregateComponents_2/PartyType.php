<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName PartyType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PartyType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Party. Details
 * @xmlDefinition Information about an organization, sub-organization, or individual fulfilling a role in a business process.
 * @xmlObjectClass Party
 */
class PartyType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Party. Mark Care_ Indicator. Indicator
     * @Definition Indicates whether a party is C/O (care of).
     * @Cardinality 0..1
     * @ObjectClass Party
     * @PropertyTermQualifier Mark Care
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MarkCareIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MarkCareIndicator
     */
    public $MarkCareIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Party. Mark Attention_ Indicator. Indicator
     * @Definition Indicates whether a party is 'FAO' (for the attention of).
     * @Cardinality 0..1
     * @ObjectClass Party
     * @PropertyTermQualifier Mark Attention
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MarkAttentionIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MarkAttentionIndicator
     */
    public $MarkAttentionIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Party. Website_ URI. Identifier
     * @Definition The Uniform Resource Identifier (URI) of the party.
     * @Cardinality 0..1
     * @ObjectClass Party
     * @PropertyTermQualifier Website
     * @PropertyTerm URI
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName WebsiteURI
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\WebsiteURI
     */
    public $WebsiteURI;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Party. Logo Reference. Identifier
     * @Definition A party's logo.
     * @Cardinality 0..1
     * @ObjectClass Party
     * @PropertyTerm Logo Reference
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples http://www2.coca-cola.com/images/logo.gif
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LogoReferenceID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LogoReferenceID
     */
    public $LogoReferenceID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Party. Endpoint Identifier. Identifier
     * @Definition Identifies the end point of the routing service, e.g., EAN Location Number, GLN.
     * @Cardinality 0..1
     * @ObjectClass Party
     * @PropertyTerm Endpoint Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples 5790002221134
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName EndpointID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\EndpointID
     */
    public $EndpointID;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Party. Party Identification
     * @Definition An association to Party Identification.
     * @Cardinality 0..n
     * @ObjectClass Party
     * @PropertyTerm Party Identification
     * @AssociatedObjectClass Party Identification
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName PartyIdentification
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PartyIdentification
     */
    public $PartyIdentification;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Party. Party Name
     * @Definition An association to Party Name.
     * @Cardinality 0..n
     * @ObjectClass Party
     * @PropertyTerm Party Name
     * @AssociatedObjectClass Party Name
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName PartyName
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PartyName
     */
    public $PartyName;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Party. Language
     * @Definition An association to Language.
     * @Cardinality 0..1
     * @ObjectClass Party
     * @PropertyTerm Language
     * @AssociatedObjectClass Language
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Language
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Language
     */
    public $Language;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Party. Postal_ Address. Address
     * @Definition The party's postal address.
     * @Cardinality 0..1
     * @ObjectClass Party
     * @PropertyTermQualifier Postal
     * @PropertyTerm Address
     * @AssociatedObjectClass Address
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PostalAddress
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PostalAddress
     */
    public $PostalAddress;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Party. Physical_ Location. Location
     * @Definition The party's physical location.
     * @Cardinality 0..1
     * @ObjectClass Party
     * @PropertyTermQualifier Physical
     * @PropertyTerm Location
     * @AssociatedObjectClass Location
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PhysicalLocation
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PhysicalLocation
     */
    public $PhysicalLocation;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Party. Party Tax Scheme
     * @Definition An association to Party Tax Scheme.
     * @Cardinality 0..n
     * @ObjectClass Party
     * @PropertyTerm Party Tax Scheme
     * @AssociatedObjectClass Party Tax Scheme
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName PartyTaxScheme
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PartyTaxScheme
     */
    public $PartyTaxScheme;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Party. Party Legal Entity
     * @Definition An association to Party Legal Entity.
     * @Cardinality 0..n
     * @ObjectClass Party
     * @PropertyTerm Party Legal Entity
     * @AssociatedObjectClass Party Legal Entity
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName PartyLegalEntity
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PartyLegalEntity
     */
    public $PartyLegalEntity;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Party. Contact
     * @Definition An association to Contact.
     * @Cardinality 0..1
     * @ObjectClass Party
     * @PropertyTerm Contact
     * @AssociatedObjectClass Contact
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Contact
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Contact
     */
    public $Contact;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Party. Person
     * @Definition An association to a person.
     * @Cardinality 0..1
     * @ObjectClass Party
     * @PropertyTerm Person
     * @AssociatedObjectClass Person
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Person
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Person
     */
    public $Person;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Party. Agent_ Party. Party
     * @Definition An association to another party who acts as an agent for this party.
     * @Cardinality 0..1
     * @ObjectClass Party
     * @PropertyTermQualifier Agent
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AgentParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AgentParty
     */
    public $AgentParty;
} // end class PartyType
