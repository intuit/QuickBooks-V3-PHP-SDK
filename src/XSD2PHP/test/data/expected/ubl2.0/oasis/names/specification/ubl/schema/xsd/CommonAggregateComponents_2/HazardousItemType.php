<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName HazardousItemType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\HazardousItemType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Hazardous Item. Details
 * @xmlDefinition Information about a Hazardous Item.
 * @xmlObjectClass Hazardous Item
 */
class HazardousItemType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Item. Identifier
     * @Definition The identifier for a Hazardous Item.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "Round Up"
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
     * @DictionaryEntryName Hazardous Item. Placard Notation. Text
     * @Definition The placard notation corresponding to the hazard class of the hazardous commodity. Can also be the hazard identification number of the orange placard (upper part) required on the means of transport.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
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
     * @DictionaryEntryName Hazardous Item. Placard Endorsement. Text
     * @Definition The placard endorsement that is to be shown on the shipping papers for the hazardous commodity. Can also be used for the number of the orange placard (lower part) required on the means of transport.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
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
     * @DictionaryEntryName Hazardous Item. Additional_ Information. Text
     * @Definition Additional information about the hazardous substance. Can be used to specify information such as the type of regulatory requirements that apply to a description.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTermQualifier Additional
     * @PropertyTerm Information
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "Must be stored away from flammable materials" "N.O.S. or a Waste Characteristics Code in conjunction with an EPA Waste Stream code"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AdditionalInformation
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AdditionalInformation
     */
    public $AdditionalInformation;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Item. UNDG Code. Code
     * @Definition The identifier assigned to transportable hazardous goods by the United Nations, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTerm UNDG Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms UN Code
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName UNDGCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\UNDGCode
     */
    public $UNDGCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Item. Emergency Procedures Code. Code
     * @Definition The emergency procedures for the Hazardous Item, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
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
     * @DictionaryEntryName Hazardous Item. Medical First Aid Guide Code. Code
     * @Definition The identifier of a medical first aid guide that is relevant to specific hazardous goods, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTerm Medical First Aid Guide Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms MFAG page number
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MedicalFirstAidGuideCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MedicalFirstAidGuideCode
     */
    public $MedicalFirstAidGuideCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Item. Technical_ Name. Name
     * @Definition The full technical name of the specific hazardous substance.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTermQualifier Technical
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @Examples "Granular Sodium Chlorate WeedKiller"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TechnicalName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TechnicalName
     */
    public $TechnicalName;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Item. Category. Name
     * @Definition The name of the category of hazard that applies to the Item.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTerm Category
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CategoryName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CategoryName
     */
    public $CategoryName;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Item. Hazardous Category Code. Code
     * @Definition Code specifying a kind of hazard for a material.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTerm Hazardous Category Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms Hazardous material class code
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName HazardousCategoryCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\HazardousCategoryCode
     */
    public $HazardousCategoryCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Item. Upper_ Orange Hazard Placard Identifier. Identifier
     * @Definition Specifies the identity number for the upper part of the orange hazard placard required on the means of transport.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTermQualifier Upper
     * @PropertyTerm Orange Hazard Placard Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms Hazard identification number (upper part)
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName UpperOrangeHazardPlacardID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\UpperOrangeHazardPlacardID
     */
    public $UpperOrangeHazardPlacardID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Item. Lower_ Orange Hazard Placard Identifier. Identifier
     * @Definition Specifies the identity number for the lower part of the orange hazard placard required on the means of transport.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTermQualifier Lower
     * @PropertyTerm Orange Hazard Placard Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms Substance identification number (lower part)
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LowerOrangeHazardPlacardID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LowerOrangeHazardPlacardID
     */
    public $LowerOrangeHazardPlacardID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Item. Marking Identifier. Identifier
     * @Definition Identifies the marking of dangerous goods.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTerm Marking Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms Dangerous goods label marking
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MarkingID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MarkingID
     */
    public $MarkingID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Item. Hazard Class Identifier. Identifier
     * @Definition Identifies a hazard class applicable to dangerous goods as defined by the relevant regulation authority, such as the IMDG Class Number of the SOLAS Convention of IMO and the ADR/RID Class Number for the road/rail environment.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTerm Hazard Class Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms IMDG Class Number, ADR/RID Class Number
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName HazardClassID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\HazardClassID
     */
    public $HazardClassID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Item. Net_ Weight. Measure
     * @Definition The total net weight of hazardous goods; the weight of the goods plus packaging.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTermQualifier Net
     * @PropertyTerm Weight
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName NetWeightMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\NetWeightMeasure
     */
    public $NetWeightMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Item. Net_ Volume. Measure
     * @Definition The volume of hazardous goods net of packaging and transport equipment.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTermQualifier Net
     * @PropertyTerm Volume
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName NetVolumeMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\NetVolumeMeasure
     */
    public $NetVolumeMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Item. Quantity
     * @Definition The quantity of goods that are hazardous.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Quantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Quantity
     */
    public $Quantity;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Hazardous Item. Contact_ Party. Party
     * @Definition Associates the Hazardous Item with details of an individual, group, or body that is the contact in case of hazard incident.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTermQualifier Contact
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ContactParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ContactParty
     */
    public $ContactParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Hazardous Item. Secondary Hazard
     * @Definition Associates the Hazardous Item with information about secondary hazards.
     * @Cardinality 0..n
     * @ObjectClass Hazardous Item
     * @PropertyTerm Secondary Hazard
     * @AssociatedObjectClass Secondary Hazard
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName SecondaryHazard
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\SecondaryHazard
     */
    public $SecondaryHazard;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Hazardous Item. Hazardous Goods Transit
     * @Definition Associates the Hazardous Item with information about the transportation of hazardous goods.
     * @Cardinality 0..n
     * @ObjectClass Hazardous Item
     * @PropertyTerm Hazardous Goods Transit
     * @AssociatedObjectClass Hazardous Goods Transit
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName HazardousGoodsTransit
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\HazardousGoodsTransit
     */
    public $HazardousGoodsTransit;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Hazardous Item. Emergency_ Temperature. Temperature
     * @Definition Associates the Hazardous Item with the temperature at which emergency procedures apply during the handling of temperature-controlled hazardous goods.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTermQualifier Emergency
     * @PropertyTerm Temperature
     * @AssociatedObjectClass Temperature
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName EmergencyTemperature
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\EmergencyTemperature
     */
    public $EmergencyTemperature;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Hazardous Item. Flashpoint_ Temperature. Temperature
     * @Definition Associates the Hazardous Item with the lowest temperature at which the vapor of a combustible liquid can be made to ignite momentarily in air, known in hazardous goods procedures as the flashpoint.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Item
     * @PropertyTermQualifier Flashpoint
     * @PropertyTerm Temperature
     * @AssociatedObjectClass Temperature
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName FlashpointTemperature
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\FlashpointTemperature
     */
    public $FlashpointTemperature;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Hazardous Item. Additional_ Temperature. Temperature
     * @Definition Information providing details of temperatures relevant to the handling of hazardous goods.
     * @Cardinality 0..n
     * @ObjectClass Hazardous Item
     * @PropertyTermQualifier Additional
     * @PropertyTerm Temperature
     * @AssociatedObjectClass Temperature
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName AdditionalTemperature
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AdditionalTemperature
     */
    public $AdditionalTemperature;
} // end class HazardousItemType
