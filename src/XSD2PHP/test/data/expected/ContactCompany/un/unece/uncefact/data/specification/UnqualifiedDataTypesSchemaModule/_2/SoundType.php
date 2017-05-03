<?php
namespace un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2
 * @xmlType base64Binary
 * @xmlName SoundType
 * @var un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2\SoundType
 * @xmlUniqueID UDT000005
 * @xmlCategoryCode UDT
 * @xmlDictionaryEntryName Sound. Type
 * @xmlVersionID 1.0
 * @xmlDefinition A diagram, graph, mathematical curves, or similar representation.
 * @xmlRepresentationTermName Sound
 * @xmlPrimitiveType binary
 * @xmlBuiltinType base64Binary
 */
class SoundType
{

        /**
         * @xmlType value
         * @var string
         */
        public $value;
    /**
     * @UniqueID UDT000005-SC2
     * @CategoryCode SC
     * @DictionaryEntryName Sound. Format. Text
     * @Definition The format of the sound content.
     * @ObjectClass Sound
     * @PropertyTermName Format
     * @RepresentationTermName Text
     * @PrimitiveType string
     * @BuiltinType string
     * @xmlType attribute
     * @xmlName format
     * @var string
     */
    public $format;
    /**
     * @UniqueID UDT000005-SC3
     * @CategoryCode SC
     * @DictionaryEntryName Sound. Mime. Code
     * @Definition The mime type of the sound object.
     * @ObjectClass Sound
     * @PropertyTermName Mime
     * @RepresentationTermName Code
     * @PrimitiveType string
     * @BuiltinType normalizedString
     * @xmlType attribute
     * @xmlName mimeCode
     * @var un\unece\uncefact\codelist\specification\IANAMIMEMediaType\_2003\BinaryObjectMimeCodeContentType
     */
    public $mimeCode;
    /**
     * @UniqueID UDT000005-SC4
     * @CategoryCode SC
     * @DictionaryEntryName Sound. Encoding. Code
     * @Definition Specifies the decoding algorithm of the sound object.
     * @ObjectClass Sound
     * @PropertyTermName Encoding
     * @RepresentationTermName Code
     * @PrimitiveType string
     * @BuiltinType normalizedString
     * @xmlType attribute
     * @xmlName encodingCode
     * @var string
     */
    public $encodingCode;
    /**
     * @UniqueID UDT000005-SC6
     * @CategoryCode SC
     * @DictionaryEntryName Sound. Uniform Resource. Identifier
     * @Definition The Uniform Resource Identifier that identifies where the sound object is located.
     * @ObjectClass Sound
     * @PropertyTermName Uniform Resource Identifier
     * @RepresentationTermName Identifier
     * @PrimitiveType string
     * @BuiltinType anyURI
     * @xmlType attribute
     * @xmlName uri
     * @var string
     */
    public $uri;
    /**
     * @UniqueID UDT000005-SC7
     * @CategoryCode SC
     * @DictionaryEntryName Sound. Filename.Text
     * @Definition The filename of the sound object.
     * @ObjectClass Sound
     * @PropertyTermName Filename
     * @RepresentationTermName Text
     * @PrimitiveType string
     * @BuiltinType string
     * @xmlType attribute
     * @xmlName filename
     * @var string
     */
    public $filename;
} // end class SoundType
