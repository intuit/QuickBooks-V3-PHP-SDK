<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ShipmentStageType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ShipmentStageType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Shipment Stage. Details
 * @xmlDefinition Information about a shipment stage.
 * @xmlObjectClass Shipment Stage
 */
class ShipmentStageType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment Stage. Identifier
     * @Definition Identifies a shipment stage.
     * @Cardinality 0..1
     * @ObjectClass Shipment Stage
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "1","2", etc..
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
     * @DictionaryEntryName Shipment Stage. Transport Mode Code. Code
     * @Definition The method of transport used for a shipment stage.
     * @Cardinality 0..1
     * @ObjectClass Shipment Stage
     * @PropertyTerm Transport Mode Code
     * @RepresentationTerm Code
     * @DataType Transport Mode_ Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TransportModeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TransportModeCode
     */
    public $TransportModeCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment Stage. Transport Means Type Code. Code
     * @Definition The type of vehicle used for a shipment stage.
     * @Cardinality 0..1
     * @ObjectClass Shipment Stage
     * @PropertyTerm Transport Means Type Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TransportMeansTypeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TransportMeansTypeCode
     */
    public $TransportMeansTypeCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment Stage. Transit_ Direction Code. Code
     * @Definition The direction of transit for a shipment stage.
     * @Cardinality 0..1
     * @ObjectClass Shipment Stage
     * @PropertyTermQualifier Transit
     * @PropertyTerm Direction Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TransitDirectionCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TransitDirectionCode
     */
    public $TransitDirectionCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment Stage. Pre Carriage_ Indicator. Indicator
     * @Definition Indicates whether the stage is before the main carriage of the shipment.
     * @Cardinality 1
     * @ObjectClass Shipment Stage
     * @PropertyTermQualifier Pre Carriage
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @Examples Truck delivery to wharf
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName PreCarriageIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PreCarriageIndicator
     */
    public $PreCarriageIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment Stage. On Carriage_ Indicator. Indicator
     * @Definition Indicates whether the stage is after the main carriage of the shipment.
     * @Cardinality 1
     * @ObjectClass Shipment Stage
     * @PropertyTermQualifier On Carriage
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @Examples Truck delivery from wharf
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName OnCarriageIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\OnCarriageIndicator
     */
    public $OnCarriageIndicator;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Shipment Stage. Transit_ Period. Period
     * @Definition An association to Transit Period.
     * @Cardinality 0..1
     * @ObjectClass Shipment Stage
     * @PropertyTermQualifier Transit
     * @PropertyTerm Period
     * @AssociatedObjectClass Period
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TransitPeriod
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransitPeriod
     */
    public $TransitPeriod;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Shipment Stage. Carrier_ Party. Party
     * @Definition An association to Carrier.
     * @Cardinality 0..n
     * @ObjectClass Shipment Stage
     * @PropertyTermQualifier Carrier
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName CarrierParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CarrierParty
     */
    public $CarrierParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Shipment Stage. Transport Means
     * @Definition An association to the means of transport.
     * @Cardinality 0..1
     * @ObjectClass Shipment Stage
     * @PropertyTerm Transport Means
     * @AssociatedObjectClass Transport Means
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TransportMeans
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransportMeans
     */
    public $TransportMeans;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Shipment Stage. Loading Port_ Location. Location
     * @Definition An association to the port location of loading.
     * @Cardinality 0..1
     * @ObjectClass Shipment Stage
     * @PropertyTermQualifier Loading Port
     * @PropertyTerm Location
     * @AssociatedObjectClass Location
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LoadingPortLocation
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LoadingPortLocation
     */
    public $LoadingPortLocation;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Shipment Stage. Unloading Port_ Location. Location
     * @Definition An association to the port location of unloading.
     * @Cardinality 0..1
     * @ObjectClass Shipment Stage
     * @PropertyTermQualifier Unloading Port
     * @PropertyTerm Location
     * @AssociatedObjectClass Location
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName UnloadingPortLocation
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\UnloadingPortLocation
     */
    public $UnloadingPortLocation;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Shipment Stage. Transship Port_ Location. Location
     * @Definition An association to the port location of transshipment.
     * @Cardinality 0..1
     * @ObjectClass Shipment Stage
     * @PropertyTermQualifier Transship Port
     * @PropertyTerm Location
     * @AssociatedObjectClass Location
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TransshipPortLocation
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransshipPortLocation
     */
    public $TransshipPortLocation;
} // end class ShipmentStageType
