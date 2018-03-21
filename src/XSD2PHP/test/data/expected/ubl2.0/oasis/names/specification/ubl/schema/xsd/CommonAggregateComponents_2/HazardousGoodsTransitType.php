<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName HazardousGoodsTransitType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\HazardousGoodsTransitType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Hazardous Goods Transit. Details
 * @xmlDefinition Information about Hazardous Goods Transit.
 * @xmlObjectClass Hazardous Goods Transit
 */
class HazardousGoodsTransitType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Goods Transit. Transport Emergency Card Code. Code
     * @Definition The identifier for a transport emergency card, describing the actions to be taken in an emergency in transporting the Hazardous Goods. May be the identity number of a hazardous emergency response plan assigned by the appropriate authority.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Goods Transit
     * @PropertyTerm Transport Emergency Card Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms TREM card
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TransportEmergencyCardCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TransportEmergencyCardCode
     */
    public $TransportEmergencyCardCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Goods Transit. Packing Criteria Code. Code
     * @Definition A code identifying the packaging requirement for the transportation of the Hazardous Goods as assigned by IATA/IMDB/ADR/RID etc.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Goods Transit
     * @PropertyTerm Packing Criteria Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms Packing Group
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PackingCriteriaCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PackingCriteriaCode
     */
    public $PackingCriteriaCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Goods Transit. Hazardous Regulation Code. Code
     * @Definition The identifier for a set of legal regulations that govern the transportation of the Hazardous Goods, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Goods Transit
     * @PropertyTerm Hazardous Regulation Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName HazardousRegulationCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\HazardousRegulationCode
     */
    public $HazardousRegulationCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Goods Transit. Inhalation Toxicity Zone Code. Code
     * @Definition An identifier for the Inhalation Toxicity Hazard Zone for the Hazardous Goods, as defined by the US Department of Transportation, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Goods Transit
     * @PropertyTerm Inhalation Toxicity Zone Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName InhalationToxicityZoneCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\InhalationToxicityZoneCode
     */
    public $InhalationToxicityZoneCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Hazardous Goods Transit. Transport Authorization Code. Code
     * @Definition Code specifying the authorization for the transportation of hazardous cargo.
     * @Cardinality 0..1
     * @ObjectClass Hazardous Goods Transit
     * @PropertyTerm Transport Authorization Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms Permission for Transport
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TransportAuthorizationCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TransportAuthorizationCode
     */
    public $TransportAuthorizationCode;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Hazardous Goods Transit. Maximum_ Temperature. Temperature
     * @Definition An association to Maximum Temperature (at which the Hazardous Goods can be safely transported).
     * @Cardinality 0..1
     * @ObjectClass Hazardous Goods Transit
     * @PropertyTermQualifier Maximum
     * @PropertyTerm Temperature
     * @AssociatedObjectClass Temperature
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MaximumTemperature
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\MaximumTemperature
     */
    public $MaximumTemperature;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Hazardous Goods Transit. Minimum_ Temperature. Temperature
     * @Definition An association to Minimum Temperature (at which the Hazardous Goods can be safely transported).
     * @Cardinality 0..1
     * @ObjectClass Hazardous Goods Transit
     * @PropertyTermQualifier Minimum
     * @PropertyTerm Temperature
     * @AssociatedObjectClass Temperature
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MinimumTemperature
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\MinimumTemperature
     */
    public $MinimumTemperature;
} // end class HazardousGoodsTransitType
