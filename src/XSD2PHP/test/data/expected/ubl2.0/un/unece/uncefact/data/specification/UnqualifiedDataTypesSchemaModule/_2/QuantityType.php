<?php
namespace un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2
 * @xmlType decimal
 * @xmlName QuantityType
 * @var un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2\QuantityType
 * @xmlUniqueID UDT0000018
 * @xmlCategoryCode UDT
 * @xmlDictionaryEntryName Quantity. Type
 * @xmlVersionID 1.0
 * @xmlDefinition A counted number of non-monetary units possibly including fractions.
 * @xmlRepresentationTermName Quantity
 * @xmlPrimitiveType decimal
 * @xmlBuiltinType decimal
 */
class QuantityType
{

        /**
         * @xmlType value
         * @var float
         */
        public $value;
    /**
     * @UniqueID UDT0000018-SC2
     * @CategoryCode SC
     * @DictionaryEntryName Quantity. Unit. Code
     * @Definition The unit of the quantity
     * @ObjectClass Quantity
     * @PropertyTermName Unit Code
     * @RepresentationTermName Code
     * @PrimitiveType string
     * @BuiltinType normalizedString
     * @xmlType attribute
     * @xmlName unitCode
     * @var un\unece\uncefact\codelist\specification\_66411\_2001\UnitCodeContentType
     */
    public $unitCode;
} // end class QuantityType
