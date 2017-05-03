<?php
namespace un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2
 * @xmlType base64Binary
 * @xmlName VideoType
 * @var un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2\VideoType
 * @xmlUniqueID UDT000006
 * @xmlCategoryCode UDT
 * @xmlDictionaryEntryName Video. Type
 * @xmlVersionID 1.0
 * @xmlDefinition A diagram, graph, mathematical curves, or similar representation.
 * @xmlRepresentationTermName Graphic
 * @xmlPrimitiveType binary
 * @xmlBuiltinType bas64Binary
 */
class VideoType
{

        /**
         * @xmlType value
         * @var base64Binary
         */
        public $value;
    /**
     * @UniqueID UDT000006-SC2
     * @CategoryCode SC
     * @DictionaryEntryName Video. Format. Text
     * @Definition The format of the video content.
     * @ObjectClass Video
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
     * @UniqueID UDT000006-SC3
     * @CategoryCode SC
     * @DictionaryEntryName Video. Mime. Code
     * @Definition The mime type of the video object.
     * @ObjectClass Video
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
     * @UniqueID UDT000006-SC4
     * @CategoryCode SC
     * @DictionaryEntryName Video. Encoding. Code
     * @Definition Specifies the decoding algorithm of the video object.
     * @ObjectClass Video
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
     * @UniqueID UDT000006-SC6
     * @CategoryCode SC
     * @DictionaryEntryName Video. Uniform Resource. Identifier
     * @Definition The Uniform Resource Identifier that identifies where the video object is located.
     * @ObjectClass Video
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
     * @UniqueID UDT000006-SC7
     * @CategoryCode SC
     * @DictionaryEntryName Video. Filename.Text
     * @Definition The filename of the video object.
     * @ObjectClass Video
     * @PropertyTermName Filename
     * @RepresentationTermName Text
     * @PrimitiveType string
     * @BuiltinType string
     * @xmlType attribute
     * @xmlName filename
     * @var xsd:string
     */
    public $filename;
} // end class VideoType
