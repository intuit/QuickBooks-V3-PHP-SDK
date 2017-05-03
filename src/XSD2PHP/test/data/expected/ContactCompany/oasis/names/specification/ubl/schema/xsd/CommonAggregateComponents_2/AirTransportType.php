<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName AirTransportType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AirTransportType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Air Transport. Details
 * @xmlDefinition Information related to an aircraft.
 * @xmlObjectClass Air Transport
 */
class AirTransportType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Air Transport. Aircraft Identifier. Identifier
     * @Definition Identifies a specific aircraft.
     * @Cardinality 1
     * @ObjectClass Air Transport
     * @PropertyTerm Aircraft Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName AircraftID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AircraftID
     */
    public $AircraftID;
} // end class AirTransportType
