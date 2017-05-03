<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ShipmentType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ShipmentType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Shipment. Details
 * @xmlDefinition Information about a shipment.
 * @xmlObjectClass Shipment
 * @xmlAlternativeBusinessTerms Consignment
 */
class ShipmentType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Identifier
     * @Definition Identifies a shipment.
     * @Cardinality 1
     * @ObjectClass Shipment
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms Waybill Number
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
     * @DictionaryEntryName Shipment. Shipping Priority Level. Code
     * @Definition The priority or level of service required for a shipment, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTerm Shipping Priority Level
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms Service Level, Service Priority
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ShippingPriorityLevelCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ShippingPriorityLevelCode
     */
    public $ShippingPriorityLevelCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Handling Code. Code
     * @Definition The handling required for a shipment, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTerm Handling Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms Special Handling
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName HandlingCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\HandlingCode
     */
    public $HandlingCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Handling_ Instructions. Text
     * @Definition Free-form text describing Handling Instructions for a shipment.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTermQualifier Handling
     * @PropertyTerm Instructions
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName HandlingInstructions
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\HandlingInstructions
     */
    public $HandlingInstructions;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Information. Text
     * @Definition Free-form text applying to a shipment. This element may contain notes or any other similar information that is not contained explicitly in another structure.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTerm Information
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Information
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Information
     */
    public $Information;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Gross_ Weight. Measure
     * @Definition The total gross weight of a shipment; the weight of the goods plus packaging plus transport equipment.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTermQualifier Gross
     * @PropertyTerm Weight
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName GrossWeightMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\GrossWeightMeasure
     */
    public $GrossWeightMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Net_ Weight. Measure
     * @Definition The total net weight of a shipment; the weight of the goods plus packaging.
     * @Cardinality 0..1
     * @ObjectClass Shipment
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
     * @DictionaryEntryName Shipment. Net Net_ Weight. Measure
     * @Definition The weight of the goods net of packaging and transport equipment.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTermQualifier Net Net
     * @PropertyTerm Weight
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName NetNetWeightMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\NetNetWeightMeasure
     */
    public $NetNetWeightMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Gross_ Volume. Measure
     * @Definition The total volume of the goods in a shipment plus packaging.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTermQualifier Gross
     * @PropertyTerm Volume
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName GrossVolumeMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\GrossVolumeMeasure
     */
    public $GrossVolumeMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Net_ Volume. Measure
     * @Definition The volume of a shipment net of packaging and transport equipment.
     * @Cardinality 0..1
     * @ObjectClass Shipment
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
     * @DictionaryEntryName Shipment. Total_ Goods Item Quantity. Quantity
     * @Definition Count of the total number of goods items within a shipment.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTermQualifier Total
     * @PropertyTerm Goods Item Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TotalGoodsItemQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TotalGoodsItemQuantity
     */
    public $TotalGoodsItemQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Total_ Transport Handling Unit Quantity. Quantity
     * @Definition Count of the number of pieces of transport handling equipment in a shipment, such as pallets, boxes, and cases.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTermQualifier Total
     * @PropertyTerm Transport Handling Unit Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @AlternativeBusinessTerms Number of THUs
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TotalTransportHandlingUnitQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TotalTransportHandlingUnitQuantity
     */
    public $TotalTransportHandlingUnitQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Insurance_ Value. Amount
     * @Definition The total sum covered by an insurance for the shipment.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTermQualifier Insurance
     * @PropertyTerm Value
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @AlternativeBusinessTerms Value Insured
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName InsuranceValueAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\InsuranceValueAmount
     */
    public $InsuranceValueAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Declared Customs_ Value. Amount
     * @Definition Amount declared for customs purposes of those goods in a shipment which are subject to the same customs procedure, and have the same tariff/statistical heading, country information, and duty regime.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTermQualifier Declared Customs
     * @PropertyTerm Value
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DeclaredCustomsValueAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DeclaredCustomsValueAmount
     */
    public $DeclaredCustomsValueAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Declared For Carriage_ Value. Amount
     * @Definition Value, declared by the shipper or his agent solely for the purpose of varying the carrier's level of liability from that provided in the contract of carriage, in case of loss or damage to goods or delayed delivery.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTermQualifier Declared For Carriage
     * @PropertyTerm Value
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @AlternativeBusinessTerms Declared value for carriage, Interest in delivery
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DeclaredForCarriageValueAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DeclaredForCarriageValueAmount
     */
    public $DeclaredForCarriageValueAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Declared Statistics_ Value. Amount
     * @Definition Value declared for statistical purposes of those goods in a consignment which have the same statistical heading.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTermQualifier Declared Statistics
     * @PropertyTerm Value
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @AlternativeBusinessTerms Statistical Value
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DeclaredStatisticsValueAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DeclaredStatisticsValueAmount
     */
    public $DeclaredStatisticsValueAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Free On Board_ Value. Amount
     * @Definition Monetary amount that has to be or has been paid as calculated under the applicable trade delivery.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTermQualifier Free On Board
     * @PropertyTerm Value
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @AlternativeBusinessTerms FOB Value
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName FreeOnBoardValueAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\FreeOnBoardValueAmount
     */
    public $FreeOnBoardValueAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Special_ Instructions. Text
     * @Definition Special instructions relating to a shipment.
     * @Cardinality 0..n
     * @ObjectClass Shipment
     * @PropertyTermQualifier Special
     * @PropertyTerm Instructions
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName SpecialInstructions
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SpecialInstructions
     */
    public $SpecialInstructions;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Delivery_ Instructions. Text
     * @Definition Delivery instructions relating to a shipment.
     * @Cardinality 0..n
     * @ObjectClass Shipment
     * @PropertyTermQualifier Delivery
     * @PropertyTerm Instructions
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName DeliveryInstructions
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DeliveryInstructions
     */
    public $DeliveryInstructions;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Shipment. Split Consignment_ Indicator. Indicator
     * @Definition Indicates whether the consignment has been split in transit.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTermQualifier Split Consignment
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SplitConsignmentIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SplitConsignmentIndicator
     */
    public $SplitConsignmentIndicator;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Shipment. Consignment
     * @Definition An association to Consignment covering the shipment.
     * @Cardinality 1
     * @ObjectClass Shipment
     * @PropertyTerm Consignment
     * @AssociatedObjectClass Consignment
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Consignment
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Consignment
     */
    public $Consignment;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Shipment. Goods Item
     * @Definition An association to Goods Item (for Bulk Goods).
     * @Cardinality 0..n
     * @ObjectClass Shipment
     * @PropertyTerm Goods Item
     * @AssociatedObjectClass Goods Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName GoodsItem
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\GoodsItem
     */
    public $GoodsItem;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Shipment. Shipment Stage
     * @Definition An association to Shipment Stage.
     * @Cardinality 0..n
     * @ObjectClass Shipment
     * @PropertyTerm Shipment Stage
     * @AssociatedObjectClass Shipment Stage
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ShipmentStage
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ShipmentStage
     */
    public $ShipmentStage;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Shipment. Delivery
     * @Definition An association to Delivery.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTerm Delivery
     * @AssociatedObjectClass Delivery
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Delivery
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Delivery
     */
    public $Delivery;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Shipment. Transport Handling Unit
     * @Definition An association to Transport Handling Unit used for loose and containerized goods.
     * @Cardinality 0..n
     * @ObjectClass Shipment
     * @PropertyTerm Transport Handling Unit
     * @AssociatedObjectClass Transport Handling Unit
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName TransportHandlingUnit
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransportHandlingUnit
     */
    public $TransportHandlingUnit;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Shipment. Origin_ Address. Address
     * @Definition An association to the region in which the goods have been produced or manufactured, according to criteria laid down for the purposes of application of the Customs tariff, or quantitative restrictions, or of any other measure related to trade.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTermQualifier Origin
     * @PropertyTerm Address
     * @AssociatedObjectClass Address
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OriginAddress
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OriginAddress
     */
    public $OriginAddress;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Shipment. First Arrival Port_ Location. Location
     * @Definition Identifies the first arrival location. This would be a port for sea, airport for air, and border post for land crossing.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTermQualifier First Arrival Port
     * @PropertyTerm Location
     * @AssociatedObjectClass Location
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName FirstArrivalPortLocation
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\FirstArrivalPortLocation
     */
    public $FirstArrivalPortLocation;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Shipment. Last Exit Port_ Location. Location
     * @Definition Identifies the final exporting location. This would be a port for sea, airport for air, and border post for land crossing.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTermQualifier Last Exit Port
     * @PropertyTerm Location
     * @AssociatedObjectClass Location
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LastExitPortLocation
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LastExitPortLocation
     */
    public $LastExitPortLocation;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Shipment. Export_ Country. Country
     * @Definition Identifies the country from which the goods are originally exported without any commercial transaction taking place in intermediate countries.
     * @Cardinality 0..1
     * @ObjectClass Shipment
     * @PropertyTermQualifier Export
     * @PropertyTerm Country
     * @AssociatedObjectClass Country
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExportCountry
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ExportCountry
     */
    public $ExportCountry;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Shipment. Freight_ Allowance Charge. Allowance Charge
     * @Definition Costs incurred by the shipper in moving goods, by whatever means, from one place to another under the terms of the contract of carriage. In addition to transport costs, this may include such elements as packing, documentation, loading, unloading, and insurance (to the extent that they relate to the freight costs).
     * @Cardinality 0..n
     * @ObjectClass Shipment
     * @PropertyTermQualifier Freight
     * @PropertyTerm Allowance Charge
     * @AssociatedObjectClass Allowance Charge
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName FreightAllowanceCharge
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\FreightAllowanceCharge
     */
    public $FreightAllowanceCharge;
} // end class ShipmentType
