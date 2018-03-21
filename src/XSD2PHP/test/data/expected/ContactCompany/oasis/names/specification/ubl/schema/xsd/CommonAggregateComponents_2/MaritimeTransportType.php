<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName MaritimeTransportType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\MaritimeTransportType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Maritime Transport. Details
 * @xmlDefinition Describes a water (including sea, river, and canal) transport vessel.
 * @xmlObjectClass Maritime Transport
 */
class MaritimeTransportType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Maritime Transport. Vessel Identifier. Identifier
     * @Definition Identifies a specific vessel.
     * @Cardinality 0..1
     * @ObjectClass Maritime Transport
     * @PropertyTerm Vessel Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms Lloyds Number, Registration Number (WCO ID 167)
     * @Examples International Maritime Organisation number of a vessel
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName VesselID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\VesselID
     */
    public $VesselID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Maritime Transport. Vessel Name. Name
     * @Definition The name of the vessel.
     * @Cardinality 0..1
     * @ObjectClass Maritime Transport
     * @PropertyTerm Vessel Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @AlternativeBusinessTerms Ships Name
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName VesselName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\VesselName
     */
    public $VesselName;
} // end class MaritimeTransportType
