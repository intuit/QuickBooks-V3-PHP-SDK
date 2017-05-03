<?php
namespace un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2
 * @xmlType string
 * @xmlName TextType
 * @var un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2\TextType
 * @xmlUniqueID UDT0000019
 * @xmlCategoryCode UDT
 * @xmlDictionaryEntryName Text. Type
 * @xmlVersionID 1.0
 * @xmlDefinition A character string (i.e. a finite set of characters) generally in the form of words of a language.
 * @xmlRepresentationTermName Text
 * @xmlPrimitiveType string
 * @xmlBuiltinType string
 */
class TextType
{

        /**
         * @xmlType value
         * @var string
         */
        public $value;
    /**
     * @UniqueID UDT0000019-SC2
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
     * @var xsd:language
     */
    public $languageID;
} // end class TextType
