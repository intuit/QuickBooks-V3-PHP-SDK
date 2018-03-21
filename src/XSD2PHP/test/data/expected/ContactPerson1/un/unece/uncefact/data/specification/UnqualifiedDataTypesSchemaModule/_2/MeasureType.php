<?php
namespace un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2
 * @xmlType decimal
 * @xmlName MeasureType
 * @var un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2\MeasureType
 * @xmlUniqueID UDT0000013
 * @xmlCategoryCode UDT
 * @xmlDictionaryEntryName Measure. Type
 * @xmlVersionID 1.0
 * @xmlDefinition A numeric value determined by measuring an object along with the specified unit of measure.
 * @xmlRepresentationTermName Measure
 * @xmlPropertyTermName Type
 * @xmlPrimitiveType decimal
 * @xmlBuiltinType decimal
 */
class MeasureType
{

        /**
         * @xmlType value
         * @var decimal
         */
        public $value;
    /**
     * @UniqueID UDT0000013-SC2
     * @CategoryCode SC
     * @DictionaryEntryName Measure Unit. Code
     * @Definition The type of unit of measure.
     * @ObjectClass Measure Unit
     * @PropertyTermName Code
     * @RepresentationTermName Code
     * @PrimitiveType string
     * @BuiltinType normalizedString
     * @UsageRule Reference UN/ECE Rec 20 and X12 355.
     * @xmlType attribute
     * @xmlName unitCode
     * @var clm66411:UnitCodeContentType
     */
    public $unitCode;
} // end class MeasureType
