<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName TransportEquipmentType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransportEquipmentType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Transport Equipment. Details
 * @xmlDefinition Information about Transport Equipment; a piece of equipment used to transport goods.
 * @xmlObjectClass Transport Equipment
 * @xmlAlternativeBusinessTerms Shipping Container, Sea Container, Rail Wagon, Pallet, Trailer, Unit Load Device, ULD
 */
class TransportEquipmentType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Equipment. Identifier
     * @Definition Identifies the transport equipment.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "OCLU 1234567"
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
     * @DictionaryEntryName Transport Equipment. Transport Equipment Type Code. Code
     * @Definition Identifies the type of provider of the transport equipment.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment
     * @PropertyTerm Transport Equipment Type Code
     * @RepresentationTerm Code
     * @DataType Transport Equipment Type_ Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TransportEquipmentTypeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TransportEquipmentTypeCode
     */
    public $TransportEquipmentTypeCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Equipment. Provider Type Code. Code
     * @Definition Identifies the type of provider of the transport equipment.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment
     * @PropertyTerm Provider Type Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ProviderTypeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ProviderTypeCode
     */
    public $ProviderTypeCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Equipment. Owner Type Code. Code
     * @Definition Identifies the type of owner of a piece of transport equipment.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment
     * @PropertyTerm Owner Type Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OwnerTypeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\OwnerTypeCode
     */
    public $OwnerTypeCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Equipment. Size Type Code. Code
     * @Definition The size and type of a piece of transport equipment, expressed as a code. When the transport equipment is a shipping container, it is recommended to use ContainerSizeTypeCode for validation.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment
     * @PropertyTerm Size Type Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms Container Size Type Code
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SizeTypeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SizeTypeCode
     */
    public $SizeTypeCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Equipment. Disposition Code. Code
     * @Definition The current disposition of the transport equipment, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment
     * @PropertyTerm Disposition Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms Status
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DispositionCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DispositionCode
     */
    public $DispositionCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Equipment. Fullness Indication Code. Code
     * @Definition A code indicating whether a piece of transport equipment is full, partially full, or empty.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment
     * @PropertyTerm Fullness Indication Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName FullnessIndicationCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\FullnessIndicationCode
     */
    public $FullnessIndicationCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Equipment. Refrigeration On_ Indicator. Indicator
     * @Definition Indicates whether the transport equipment's refrigeration is on (true) or off (false).
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment
     * @PropertyTermQualifier Refrigeration On
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RefrigerationOnIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RefrigerationOnIndicator
     */
    public $RefrigerationOnIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Equipment. Information. Text
     * @Definition Additional information about the transport equipment.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment
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
     * @DictionaryEntryName Transport Equipment. Returnability_ Indicator. Indicator
     * @Definition Indicates whether a particular item of transport equipment is returnable.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment
     * @PropertyTermQualifier Returnability
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ReturnabilityIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ReturnabilityIndicator
     */
    public $ReturnabilityIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transport Equipment. Legal Status_ Indicator. Indicator
     * @Definition Legal status of the transport equipment with respect to the Container Convention code.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment
     * @PropertyTermQualifier Legal Status
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LegalStatusIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LegalStatusIndicator
     */
    public $LegalStatusIndicator;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Equipment. Measurement_ Dimension. Dimension
     * @Definition An association to Dimension.
     * @Cardinality 0..n
     * @ObjectClass Transport Equipment
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
     * @DictionaryEntryName Transport Equipment. Transport Equipment Seal
     * @Definition An association to Transport Equipment Seal.
     * @Cardinality 0..n
     * @ObjectClass Transport Equipment
     * @PropertyTerm Transport Equipment Seal
     * @AssociatedObjectClass Transport Equipment Seal
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName TransportEquipmentSeal
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransportEquipmentSeal
     */
    public $TransportEquipmentSeal;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Equipment. Minimum_ Temperature. Temperature
     * @Definition The minimum required operating temperature for the container (reefer).
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment
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
     * @DictionaryEntryName Transport Equipment. Maximum_ Temperature. Temperature
     * @Definition The maximum required operating temperature for the container (reefer).
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment
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
     * @DictionaryEntryName Transport Equipment. Provider_ Party. Party
     * @Definition The party that provides the transport equipment.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment
     * @PropertyTermQualifier Provider
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ProviderParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ProviderParty
     */
    public $ProviderParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Equipment. Loading Proof_ Party. Party
     * @Definition The authorized party responsible for certifying that the goods were loaded into the transport equipment.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment
     * @PropertyTermQualifier Loading Proof
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LoadingProofParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LoadingProofParty
     */
    public $LoadingProofParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transport Equipment. Loading_ Location. Location
     * @Definition Identifies the location where the goods are loaded into the transport equipment.
     * @Cardinality 0..1
     * @ObjectClass Transport Equipment
     * @PropertyTermQualifier Loading
     * @PropertyTerm Location
     * @AssociatedObjectClass Location
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LoadingLocation
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LoadingLocation
     */
    public $LoadingLocation;
} // end class TransportEquipmentType
