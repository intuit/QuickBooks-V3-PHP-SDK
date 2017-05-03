<?php
namespace un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2
 * @xmlType decimal
 * @xmlName AmountType
 * @var un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2\AmountType
 * @xmlUniqueID UDT000001
 * @xmlCategoryCode UDT
 * @xmlDictionaryEntryName Amount. Type
 * @xmlVersionID 1.0
 * @xmlDefinition A number of monetary units specified in a currency where the unit of the currency is explicit or implied.
 * @xmlRepresentationTermName Amount
 * @xmlPrimitiveType decimal
 * @xmlBuiltinType decimal
 */
class AmountType
{

        /**
         * @xmlType value
         * @var decimal
         */
        public $value;
    /**
     * @UniqueID UDT000001-SC2
     * @CategoryCode SC
     * @DictionaryEntryName Amount Currency. Identifier
     * @Definition The currency of the amount.
     * @ObjectClass Amount Currency
     * @PropertyTermName Identification
     * @RepresentationTermName Identifier
     * @PrimitiveType string
     * @BuiltinType normalisedString
     * @xmlType attribute
     * @xmlName currencyID
     * @var clm54217:CurrencyCodeContentType
     */
    public $currencyID;
} // end class AmountType
