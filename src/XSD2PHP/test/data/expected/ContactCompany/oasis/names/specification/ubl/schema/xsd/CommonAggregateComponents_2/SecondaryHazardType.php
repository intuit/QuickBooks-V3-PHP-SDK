<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName SecondaryHazardType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\SecondaryHazardType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Secondary Hazard. Details
 * @xmlDefinition Information about Secondary Hazard (related to a Hazardous Item).
 * @xmlObjectClass Secondary Hazard
 */
class SecondaryHazardType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Secondary Hazard. Identifier
     * @Definition Identifies the Secondary Hazard.
     * @Cardinality 0..1
     * @ObjectClass Secondary Hazard
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
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
     * @DictionaryEntryName Secondary Hazard. Placard Notation. Text
     * @Definition The placard notation corresponding to the hazard class of the hazardous commodity. Can also be the hazard identification number of the orange placard (upper part) required on the means of transport.
     * @Cardinality 0..1
     * @ObjectClass Secondary Hazard
     * @PropertyTerm Placard Notation
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "5.1"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PlacardNotation
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PlacardNotation
     */
    public $PlacardNotation;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Secondary Hazard. Placard Endorsement. Text
     * @Definition The placard endorsement that is to be shown on the shipping papers for the hazardous commodity. Can also be used for the number of the orange placard (lower part) required on the means of transport.
     * @Cardinality 0..1
     * @ObjectClass Secondary Hazard
     * @PropertyTerm Placard Endorsement
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "2"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PlacardEndorsement
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PlacardEndorsement
     */
    public $PlacardEndorsement;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Secondary Hazard. Emergency Procedures Code. Code
     * @Definition Emergency procedures for hazardous goods, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Secondary Hazard
     * @PropertyTerm Emergency Procedures Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms EMG code, EMS Page Number
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName EmergencyProceduresCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\EmergencyProceduresCode
     */
    public $EmergencyProceduresCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Secondary Hazard. Extension. Text
     * @Definition Additional information about the hazardous substance. Can be used to specify information such as the type of regulatory requirements that apply to a description.
     * @Cardinality 0..1
     * @ObjectClass Secondary Hazard
     * @PropertyTerm Extension
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "N.O.S. or a Waste Characteristics Code in conjunction with an EPA Waste Stream code"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Extension
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Extension
     */
    public $Extension;
} // end class SecondaryHazardType
