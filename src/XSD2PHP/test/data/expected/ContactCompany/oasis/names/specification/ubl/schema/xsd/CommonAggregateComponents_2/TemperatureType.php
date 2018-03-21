<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName TemperatureType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TemperatureType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Temperature. Details
 * @xmlDefinition Information about temperature.
 * @xmlObjectClass Temperature
 */
class TemperatureType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Temperature. Attribute Identifier. Identifier
     * @Definition An identifier for temperature.
     * @Cardinality 1
     * @ObjectClass Temperature
     * @PropertyTerm Attribute Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName AttributeID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AttributeID
     */
    public $AttributeID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Temperature. Measure
     * @Definition The temperature measurement value.
     * @Cardinality 1
     * @ObjectClass Temperature
     * @PropertyTerm Measure
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Measure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Measure
     */
    public $Measure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Temperature. Description. Text
     * @Definition A description of the temperature measurement.
     * @Cardinality 0..n
     * @ObjectClass Temperature
     * @PropertyTerm Description
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "at sea level"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Description
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Description
     */
    public $Description;
} // end class TemperatureType
