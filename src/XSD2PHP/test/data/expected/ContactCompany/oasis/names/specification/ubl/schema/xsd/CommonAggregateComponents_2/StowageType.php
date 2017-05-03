<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName StowageType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\StowageType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Stowage. Details
 * @xmlDefinition A location on board a means of transport where specified goods or transport equipment have been or are to be stowed.
 * @xmlObjectClass Stowage
 */
class StowageType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Stowage. Location Identifier. Identifier
     * @Definition Identifies a location on board a means of transport where specified goods or transport equipment have been or are to be stowed.
     * @Cardinality 0..1
     * @ObjectClass Stowage
     * @PropertyTerm Location Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms Cell Location, coded
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LocationID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LocationID
     */
    public $LocationID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Stowage. Location. Text
     * @Definition Describes a location on board a means of transport where specified goods or transport equipment have been or are to be stowed.
     * @Cardinality 0..n
     * @ObjectClass Stowage
     * @PropertyTerm Location
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms Cell Location
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Location
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Location
     */
    public $Location;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Stowage. Measurement_ Dimension. Dimension
     * @Definition Associates any measurements (including lengths, mass, and volume) for this stowage.
     * @Cardinality 0..n
     * @ObjectClass Stowage
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
} // end class StowageType
