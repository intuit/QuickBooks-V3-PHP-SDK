<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName TransportEquipmentSealType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransportEquipmentSealType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Transport Equipment Seal. Details
 * @xmlDefinition Information about a transport equipment seal (a security device attached to the doors of a shipping container).
 * @xmlObjectClass Transport Equipment Seal
 * @xmlAlternativeBusinessTerms Container Seal
 */
class TransportEquipmentSealType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Equipment Seal. Identifier
     * @Definition Identifies the seal.
     * @Cardinality 1
     * @ObjectClass Transport Equipment Seal
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "ACS1234"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName ID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ID
     */
    public $ID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Equipment Seal. Seal Issuer Type Code. Code
     * @Definition The type of party that issues and is responsible for a seal, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment Seal
     * @PropertyTerm Seal Issuer Type Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SealIssuerTypeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SealIssuerTypeCode
     */
    public $SealIssuerTypeCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Equipment Seal. Condition. Text
     * @Definition Information about the condition of a seal.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment Seal
     * @PropertyTerm Condition
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Condition
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Condition
     */
    public $Condition;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Equipment Seal. Seal Status Code. Code
     * @Definition The status of a seal, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment Seal
     * @PropertyTerm Seal Status Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SealStatusCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SealStatusCode
     */
    public $SealStatusCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Equipment Seal. Sealing Party Type. Text
     * @Definition Textual description of the role of a sealing party.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment Seal
     * @PropertyTerm Sealing Party Type
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms Sealing Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SealingPartyType
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SealingPartyType
     */
    public $SealingPartyType;
} // end class TransportEquipmentSealType
