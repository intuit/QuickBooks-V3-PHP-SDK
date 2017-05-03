<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName EndorserPartyType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\EndorserPartyType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Endorser Party. Details
 * @xmlDefinition The party endorsing a document.
 * @xmlObjectClass Endorser Party
 */
class EndorserPartyType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Endorser Party. Role Code. Code
     * @Definition The role of the party providing the endorsement, e.g., Issuer, Embassy, Insurance, etc.
     * @Cardinality 1
     * @ObjectClass Endorser Party
     * @PropertyTerm Role Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName RoleCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RoleCode
     */
    public $RoleCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Endorser Party. Sequence. Numeric
     * @Definition The sequence in which the endorsements are to be applied.
     * @Cardinality 1
     * @ObjectClass Endorser Party
     * @PropertyTerm Sequence
     * @RepresentationTerm Numeric
     * @DataType Numeric. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName SequenceNumeric
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SequenceNumeric
     */
    public $SequenceNumeric;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Endorser Party. Party
     * @Definition Details of the party endorsing the application.
     * @Cardinality 1
     * @ObjectClass Endorser Party
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Party
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Party
     */
    public $Party;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Endorser Party. Signatory_ Contact. Contact
     * @Definition Details of the individual representing the exporter who signs the Certificate of Origin application before submitting it to the Issuer Party.
     * @Cardinality 1
     * @ObjectClass Endorser Party
     * @PropertyTermQualifier Signatory
     * @PropertyTerm Contact
     * @AssociatedObjectClass Contact
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName SignatoryContact
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\SignatoryContact
     */
    public $SignatoryContact;
} // end class EndorserPartyType
