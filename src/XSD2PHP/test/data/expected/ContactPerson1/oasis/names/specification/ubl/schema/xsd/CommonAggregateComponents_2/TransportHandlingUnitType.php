<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName TransportHandlingUnitType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransportHandlingUnitType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Transport Handling Unit. Details
 * @xmlDefinition A uniquely identifiable physical unit consisting of one or more packages (not necessarily containing the same articles) for enabling physical handling during the transport process.
 * @xmlObjectClass Transport Handling Unit
 * @xmlAlternativeBusinessTerms Logistics Unit, Handling Unit, THU
 */
class TransportHandlingUnitType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Handling Unit. Identifier
     * @Definition Identifies the transport handling unit.
     * @Cardinality 0..1
     * @ObjectClass Transport Handling Unit
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
     * @DictionaryEntryName Transport Handling Unit. Transport Handling Unit Type Code. Code
     * @Definition The type of transport handling unit, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Transport Handling Unit
     * @PropertyTerm Transport Handling Unit Type Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TransportHandlingUnitTypeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TransportHandlingUnitTypeCode
     */
    public $TransportHandlingUnitTypeCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Handling Unit. Handling Code. Code
     * @Definition The handling required for a shipment, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Transport Handling Unit
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
     * @DictionaryEntryName Transport Handling Unit. Handling_ Instructions. Text
     * @Definition Free-form text describing handling instructions for a shipment.
     * @Cardinality 0..1
     * @ObjectClass Transport Handling Unit
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
     * @DictionaryEntryName Transport Handling Unit. Hazardous Risk_ Indicator. Indicator
     * @Definition Indicates whether the shipment contains hazardous materials.
     * @Cardinality 0..1
     * @ObjectClass Transport Handling Unit
     * @PropertyTermQualifier Hazardous Risk
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @Examples Default is negative
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName HazardousRiskIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\HazardousRiskIndicator
     */
    public $HazardousRiskIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Handling Unit. Total_ Goods Item Quantity. Quantity
     * @Definition The total number of goods items in the transport handling unit.
     * @Cardinality 0..1
     * @ObjectClass Transport Handling Unit
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
     * @DictionaryEntryName Transport Handling Unit. Total_ Package Quantity. Quantity
     * @Definition The total number of packages in the transport handling unit.
     * @Cardinality 0..1
     * @ObjectClass Transport Handling Unit
     * @PropertyTermQualifier Total
     * @PropertyTerm Package Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TotalPackageQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TotalPackageQuantity
     */
    public $TotalPackageQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Handling Unit. Damage_ Remarks. Text
     * @Definition Description of a type of damage.
     * @Cardinality 0..n
     * @ObjectClass Transport Handling Unit
     * @PropertyTermQualifier Damage
     * @PropertyTerm Remarks
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName DamageRemarks
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DamageRemarks
     */
    public $DamageRemarks;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Handling Unit. Shipping_ Marks. Text
     * @Definition Free-form description of the marks and numbers on a transport unit or package.
     * @Cardinality 0..n
     * @ObjectClass Transport Handling Unit
     * @PropertyTermQualifier Shipping
     * @PropertyTerm Marks
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms Marks and Numbers, Shipping Marks
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ShippingMarks
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ShippingMarks
     */
    public $ShippingMarks;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Handling Unit. Handling Unit_ Despatch Line. Despatch Line
     * @Definition An association to Handling Unit Despatch Line.
     * @Cardinality 0..n
     * @ObjectClass Transport Handling Unit
     * @PropertyTermQualifier Handling Unit
     * @PropertyTerm Despatch Line
     * @AssociatedObjectClass Despatch Line
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName HandlingUnitDespatchLine
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\HandlingUnitDespatchLine
     */
    public $HandlingUnitDespatchLine;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Handling Unit. Actual_ Package. Package
     * @Definition An association to Actual Package.
     * @Cardinality 0..n
     * @ObjectClass Transport Handling Unit
     * @PropertyTermQualifier Actual
     * @PropertyTerm Package
     * @AssociatedObjectClass Package
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ActualPackage
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ActualPackage
     */
    public $ActualPackage;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Handling Unit. Received Handling Unit_ Receipt Line. Receipt Line
     * @Definition An association to Receipt Line.
     * @Cardinality 0..n
     * @ObjectClass Transport Handling Unit
     * @PropertyTermQualifier Received Handling Unit
     * @PropertyTerm Receipt Line
     * @AssociatedObjectClass Receipt Line
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ReceivedHandlingUnitReceiptLine
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ReceivedHandlingUnitReceiptLine
     */
    public $ReceivedHandlingUnitReceiptLine;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Handling Unit. Transport Equipment
     * @Definition An association to Transport Equipment.
     * @Cardinality 0..n
     * @ObjectClass Transport Handling Unit
     * @PropertyTerm Transport Equipment
     * @AssociatedObjectClass Transport Equipment
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName TransportEquipment
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransportEquipment
     */
    public $TransportEquipment;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Handling Unit. Hazardous Goods Transit
     * @Definition An association to information about the transportation of hazardous goods.
     * @Cardinality 0..n
     * @ObjectClass Transport Handling Unit
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
     * @DictionaryEntryName Transport Handling Unit. Measurement_ Dimension. Dimension
     * @Definition An association to Dimension.
     * @Cardinality 0..n
     * @ObjectClass Transport Handling Unit
     * @PropertyTermQualifier Measurement
     * @PropertyTerm Dimension
     * @AssociatedObjectClass Dimension
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName MeasurementDimension
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\MeasurementDimension
     */
    public $MeasurementDimension;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Handling Unit. Minimum_ Temperature. Temperature
     * @Definition The minimum required operating temperature.
     * @Cardinality 0..1
     * @ObjectClass Transport Handling Unit
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
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Handling Unit. Maximum_ Temperature. Temperature
     * @Definition The maximum required operating temperature.
     * @Cardinality 0..1
     * @ObjectClass Transport Handling Unit
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
} // end class TransportHandlingUnitType
