<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName TransportMeansType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransportMeansType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Transport Means. Details
 * @xmlDefinition The particular vehicle used for the transport of goods or persons.
 * @xmlObjectClass Transport Means
 * @xmlAlternativeBusinessTerms Conveyance
 */
class TransportMeansType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Means. Journey Identifier. Identifier
     * @Definition An identifier assigned to a regularly scheduled service of a means of transport.
     * @Cardinality 0..1
     * @ObjectClass Transport Means
     * @PropertyTerm Journey Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms Voyage Number, Scheduled Conveyance Identifier (WCO ID 205), Flight Number
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName JourneyID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\JourneyID
     */
    public $JourneyID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Means. Registration_ Nationality Identifier. Identifier
     * @Definition Formal identification of the country in which a means of transport is registered.
     * @Cardinality 0..1
     * @ObjectClass Transport Means
     * @PropertyTermQualifier Registration
     * @PropertyTerm Nationality Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms Nationality of Means of Transport (WCO 175, 178 and 179)
     * @Examples "LIB"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RegistrationNationalityID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RegistrationNationalityID
     */
    public $RegistrationNationalityID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Means. Registration_ Nationality. Text
     * @Definition Name of the country in which a means of transport is registered.
     * @Cardinality 0..n
     * @ObjectClass Transport Means
     * @PropertyTermQualifier Registration
     * @PropertyTerm Nationality
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms Flag of Vessel, Nationality of Ship
     * @Examples Liberia
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName RegistrationNationality
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RegistrationNationality
     */
    public $RegistrationNationality;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Means. Direction Code. Code
     * @Definition The direction of the transport means.
     * @Cardinality 0..1
     * @ObjectClass Transport Means
     * @PropertyTerm Direction Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms Transit Direction
     * @Examples "North","East"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DirectionCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DirectionCode
     */
    public $DirectionCode;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Means. Stowage
     * @Definition Association to a location on board a means of transport where specified goods or transport equipment have been or are to be stowed.
     * @Cardinality 0..1
     * @ObjectClass Transport Means
     * @PropertyTerm Stowage
     * @AssociatedObjectClass Stowage
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Stowage
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Stowage
     */
    public $Stowage;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Means. Air Transport
     * @Definition Association to identify an aircraft.
     * @Cardinality 0..1
     * @ObjectClass Transport Means
     * @PropertyTerm Air Transport
     * @AssociatedObjectClass Air Transport
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AirTransport
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AirTransport
     */
    public $AirTransport;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Means. Road Transport
     * @Definition Association to identify a road vehicle.
     * @Cardinality 0..1
     * @ObjectClass Transport Means
     * @PropertyTerm Road Transport
     * @AssociatedObjectClass Road Transport
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RoadTransport
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\RoadTransport
     */
    public $RoadTransport;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Means. Rail Transport
     * @Definition Association to identify a train.
     * @Cardinality 0..1
     * @ObjectClass Transport Means
     * @PropertyTerm Rail Transport
     * @AssociatedObjectClass Rail Transport
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RailTransport
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\RailTransport
     */
    public $RailTransport;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Means. Maritime Transport
     * @Definition Association to identify a ship.
     * @Cardinality 0..1
     * @ObjectClass Transport Means
     * @PropertyTerm Maritime Transport
     * @AssociatedObjectClass Maritime Transport
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MaritimeTransport
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\MaritimeTransport
     */
    public $MaritimeTransport;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Means. Owner_ Party. Party
     * @Definition Association to the party owning the means of transport.
     * @Cardinality 0..1
     * @ObjectClass Transport Means
     * @PropertyTermQualifier Owner
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OwnerParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OwnerParty
     */
    public $OwnerParty;
} // end class TransportMeansType
