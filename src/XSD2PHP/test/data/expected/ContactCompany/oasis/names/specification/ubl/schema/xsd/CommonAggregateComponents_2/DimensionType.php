<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName DimensionType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DimensionType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Dimension. Details
 * @xmlDefinition Information about a measurable dimension of an item.
 * @xmlObjectClass Dimension
 */
class DimensionType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Dimension. Attribute Identifier. Identifier
     * @Definition An identifier for the attribute to which the measure applies.
     * @Cardinality 1
     * @ObjectClass Dimension
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
     * @DictionaryEntryName Dimension. Measure
     * @Definition The measurement value.
     * @Cardinality 0..1
     * @ObjectClass Dimension
     * @PropertyTerm Measure
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Measure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Measure
     */
    public $Measure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Dimension. Description. Text
     * @Definition A description of the attribute or measurement of the attribute.
     * @Cardinality 0..n
     * @ObjectClass Dimension
     * @PropertyTerm Description
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Description
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Description
     */
    public $Description;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Dimension. Minimum_ Measure. Measure
     * @Definition The minimum value in a range of measurement.
     * @Cardinality 0..1
     * @ObjectClass Dimension
     * @PropertyTermQualifier Minimum
     * @PropertyTerm Measure
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MinimumMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MinimumMeasure
     */
    public $MinimumMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Dimension. Maximum_ Measure. Measure
     * @Definition The maximum value in a range of measurement.
     * @Cardinality 0..1
     * @ObjectClass Dimension
     * @PropertyTermQualifier Maximum
     * @PropertyTerm Measure
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MaximumMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MaximumMeasure
     */
    public $MaximumMeasure;
} // end class DimensionType
