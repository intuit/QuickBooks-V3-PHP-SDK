<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName TransportEventType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransportEventType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Transport Event. Details
 * @xmlDefinition A significant occurrence or happening related to the transportation of goods.
 * @xmlObjectClass Transport Event
 */
class TransportEventType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Event. Identification. Identifier
     * @Definition An identifier for the event.
     * @Cardinality 0..1
     * @ObjectClass Transport Event
     * @PropertyTerm Identification
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName IdentificationID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\IdentificationID
     */
    public $IdentificationID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Event. Occurrence Date. Date
     * @Definition The date of an occurrence of the event.
     * @Cardinality 0..1
     * @ObjectClass Transport Event
     * @PropertyTerm Occurrence Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OccurrenceDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\OccurrenceDate
     */
    public $OccurrenceDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Event. Occurrence Time. Time
     * @Definition The time of an occurrence of the event.
     * @Cardinality 0..1
     * @ObjectClass Transport Event
     * @PropertyTerm Occurrence Time
     * @RepresentationTerm Time
     * @DataType Time. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OccurrenceTime
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\OccurrenceTime
     */
    public $OccurrenceTime;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Event. Transport Event Type Code. Code
     * @Definition A code specifying the type of event.
     * @Cardinality 0..1
     * @ObjectClass Transport Event
     * @PropertyTerm Transport Event Type Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TransportEventTypeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TransportEventTypeCode
     */
    public $TransportEventTypeCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Event. Description. Text
     * @Definition A textual description of the event.
     * @Cardinality 0..1
     * @ObjectClass Transport Event
     * @PropertyTerm Description
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Description
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Description
     */
    public $Description;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Event. Completion_ Indicator. Indicator
     * @Definition Indicates if this event is completed.
     * @Cardinality 0..1
     * @ObjectClass Transport Event
     * @PropertyTermQualifier Completion
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CompletionIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CompletionIndicator
     */
    public $CompletionIndicator;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Event. Reported_ Shipment. Shipment
     * @Definition Information about the separately identifiable collection of goods items (available to be) transported from one consignor to one consignee via one or more modes of transport.
     * @Cardinality 0..1
     * @ObjectClass Transport Event
     * @PropertyTermQualifier Reported
     * @PropertyTerm Shipment
     * @AssociatedObjectClass Shipment
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ReportedShipment
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ReportedShipment
     */
    public $ReportedShipment;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Event. Current_ Status. Status
     * @Definition The status of the event.
     * @Cardinality 1..n
     * @ObjectClass Transport Event
     * @PropertyTermQualifier Current
     * @PropertyTerm Status
     * @AssociatedObjectClass Status
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs unbounded
     * @xmlName CurrentStatus
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CurrentStatus
     */
    public $CurrentStatus;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Event. Contact
     * @Definition Any contacts for the event.
     * @Cardinality 0..n
     * @ObjectClass Transport Event
     * @PropertyTerm Contact
     * @AssociatedObjectClass Contact
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Contact
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Contact
     */
    public $Contact;
} // end class TransportEventType
