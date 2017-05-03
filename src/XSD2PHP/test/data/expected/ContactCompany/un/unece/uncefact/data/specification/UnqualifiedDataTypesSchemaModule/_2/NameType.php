<?php
namespace un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2
 * @xmlType string
 * @xmlName NameType
 * @var un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2\NameType
 * @xmlUniqueID UDT0000020
 * @xmlCategoryCode UDT
 * @xmlDictionaryEntryName Name. Type
 * @xmlVersionID 1.0
 * @xmlDefinition A character string that consititues the distinctive designation of a person, place, thing or concept.
 * @xmlRepresentationTermName Name
 * @xmlPrimitiveType string
 * @xmlBuiltinType string
 */
class NameType
{

        /**
         * @xmlType value
         * @var string
         */
        public $value;
    /**
     * @UniqueID UDT0000020-SC2
     * @CategoryCode SC
     * @DictionaryEntryName Language. Identifier
     * @Definition The identifier of the language used in the content component.
     * @ObjectClass Language
     * @PropertyTermName Identification
     * @RepresentationTermName Identifier
     * @PrimitiveType string
     * @BuiltinType language
     * @xmlType attribute
     * @xmlName languageID
     * @var string
     */
    public $languageID;
} // end class NameType
