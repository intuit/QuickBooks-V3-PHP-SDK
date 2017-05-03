<?php
namespace un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2
 * @xmlType base64Binary
 * @xmlName PictureType
 * @var un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2\PictureType
 * @xmlUniqueID UDT000004
 * @xmlCategoryCode UDT
 * @xmlDictionaryEntryName Picture. Type
 * @xmlVersionID 1.0
 * @xmlDefinition A diagram, graph, mathematical curves, or similar representation.
 * @xmlRepresentationTermName Picture
 * @xmlPrimitiveType binary
 * @xmlBuiltinType base64Binary
 */
class PictureType
{

        /**
         * @xmlType value
         * @var base64Binary
         */
        public $value;
    /**
     * @UniqueID UDT000004-SC2
     * @CategoryCode SC
     * @DictionaryEntryName Picture. Format. Text
     * @Definition The format of the picture content.
     * @ObjectClass Picture
     * @PropertyTermName Format
     * @RepresentationTermName Text
     * @PrimitiveType string
     * @BuiltinType string
     * @xmlType attribute
     * @xmlName format
     * @var xsd:string
     */
    public $format;
    /**
     * @UniqueID UDT000004-SC3
     * @CategoryCode SC
     * @DictionaryEntryName Picture. Mime. Code
     * @Definition The mime type of the picture object.
     * @ObjectClass Picture
     * @PropertyTermName Mime
     * @RepresentationTermName Code
     * @PrimitiveType string
     * @BuiltinType normalizedString
     * @xmlType attribute
     * @xmlName mimeCode
     * @var clmIANAMIMEMediaType:BinaryObjectMimeCodeContentType
     */
    public $mimeCode;
    /**
     * @UniqueID UDT000004-SC4
     * @CategoryCode SC
     * @DictionaryEntryName Picture. Encoding. Code
     * @Definition Specifies the decoding algorithm of the picture object.
     * @ObjectClass Picture
     * @PropertyTermName Encoding
     * @RepresentationTermName Code
     * @PrimitiveType string
     * @BuiltinType normalizedString
     * @xmlType attribute
     * @xmlName encodingCode
     * @var xsd:normalizedString
     */
    public $encodingCode;
    /**
     * @UniqueID UDT000004-SC6
     * @CategoryCode SC
     * @DictionaryEntryName Picture. Uniform Resource. Identifier
     * @Definition The Uniform Resource Identifier that identifies where the picture object is located.
     * @ObjectClass Picture
     * @PropertyTermName Uniform Resource Identifier
     * @RepresentationTermName Identifier
     * @PrimitiveType string
     * @BuiltinType anyURI
     * @xmlType attribute
     * @xmlName uri
     * @var xsd:anyURI
     */
    public $uri;
    /**
     * @UniqueID UDT000004-SC7
     * @CategoryCode SC
     * @DictionaryEntryName Picture. Filename.Text
     * @Definition The filename of the picture object.
     * @ObjectClass Picture
     * @PropertyTermName Filename
     * @RepresentationTermName Text
     * @PrimitiveType string
     * @BuiltinType string
     * @xmlType attribute
     * @xmlName filename
     * @var xsd:string
     */
    public $filename;
} // end class PictureType
