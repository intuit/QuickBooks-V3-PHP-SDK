<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName LocationCoordinateType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LocationCoordinateType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Location Coordinate. Details
 * @xmlDefinition Information about physical (geographical) location.
 * @xmlObjectClass Location Coordinate
 */
class LocationCoordinateType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Location Coordinate. Coordinate System Code. Code
     * @Definition An identifier for the location system used.
     * @Cardinality 0..1
     * @ObjectClass Location Coordinate
     * @PropertyTerm Coordinate System Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CoordinateSystemCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CoordinateSystemCode
     */
    public $CoordinateSystemCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Location Coordinate. Latitude_ Degrees. Measure
     * @Definition The measure of latitude in degrees.
     * @Cardinality 0..1
     * @ObjectClass Location Coordinate
     * @PropertyTermQualifier Latitude
     * @PropertyTerm Degrees
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LatitudeDegreesMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LatitudeDegreesMeasure
     */
    public $LatitudeDegreesMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Location Coordinate. Latitude_ Minutes. Measure
     * @Definition The measure of latitude in minutes.
     * @Cardinality 0..1
     * @ObjectClass Location Coordinate
     * @PropertyTermQualifier Latitude
     * @PropertyTerm Minutes
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LatitudeMinutesMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LatitudeMinutesMeasure
     */
    public $LatitudeMinutesMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Location Coordinate. Latitude Direction Code. Code
     * @Definition The direction of latitude measurement from the equator.
     * @Cardinality 0..1
     * @ObjectClass Location Coordinate
     * @PropertyTerm Latitude Direction Code
     * @RepresentationTerm Code
     * @DataType Latitude Direction_ Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LatitudeDirectionCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LatitudeDirectionCode
     */
    public $LatitudeDirectionCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Location Coordinate. Longitude_ Degrees. Measure
     * @Definition The measure of longitude in degrees.
     * @Cardinality 0..1
     * @ObjectClass Location Coordinate
     * @PropertyTermQualifier Longitude
     * @PropertyTerm Degrees
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LongitudeDegreesMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LongitudeDegreesMeasure
     */
    public $LongitudeDegreesMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Location Coordinate. Longitude_ Minutes. Measure
     * @Definition The measure of longitude in minutes.
     * @Cardinality 0..1
     * @ObjectClass Location Coordinate
     * @PropertyTermQualifier Longitude
     * @PropertyTerm Minutes
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LongitudeMinutesMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LongitudeMinutesMeasure
     */
    public $LongitudeMinutesMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Location Coordinate. Longitude Direction Code. Code
     * @Definition The direction of longitude measurement from the meridian.
     * @Cardinality 0..1
     * @ObjectClass Location Coordinate
     * @PropertyTerm Longitude Direction Code
     * @RepresentationTerm Code
     * @DataType Longitude Direction_ Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LongitudeDirectionCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LongitudeDirectionCode
     */
    public $LongitudeDirectionCode;
} // end class LocationCoordinateType
