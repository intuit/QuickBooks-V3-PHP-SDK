<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName EndorsementType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\EndorsementType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Endorsement. Details
 * @xmlDefinition Details of an endorsement on the document.
 * @xmlObjectClass Endorsement
 */
class EndorsementType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Endorsement. Document. Identifier
     * @Definition Identifies the endorsement.
     * @Cardinality 1
     * @ObjectClass Endorsement
     * @PropertyTerm Document
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName DocumentID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DocumentID
     */
    public $DocumentID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Endorsement. Approval Status. Text
     * @Definition Specifies the status of the endorsement.
     * @Cardinality 1
     * @ObjectClass Endorsement
     * @PropertyTerm Approval Status
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms Authentication Code
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName ApprovalStatus
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ApprovalStatus
     */
    public $ApprovalStatus;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Endorsement. Remarks. Text
     * @Definition Remarks by the endorsing party.
     * @Cardinality 0..n
     * @ObjectClass Endorsement
     * @PropertyTerm Remarks
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Remarks
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Remarks
     */
    public $Remarks;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Endorsement. Endorser Party
     * @Definition The type of party providing the endorsement.
     * @Cardinality 1
     * @ObjectClass Endorsement
     * @PropertyTerm Endorser Party
     * @AssociatedObjectClass Endorser Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName EndorserParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\EndorserParty
     */
    public $EndorserParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Endorsement. Signature
     * @Definition One or more signatures applied to the endorsement.
     * @Cardinality 0..n
     * @ObjectClass Endorsement
     * @PropertyTerm Signature
     * @AssociatedObjectClass Signature
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Signature
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Signature
     */
    public $Signature;
} // end class EndorsementType
