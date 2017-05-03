<?php
namespace un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2
 * @xmlType base64Binary
 * @xmlName GraphicType
 * @var un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2\GraphicType
 * @xmlUniqueID UDT000003
 * @xmlCategoryCode UDT
 * @xmlDictionaryEntryName Graphic. Type
 * @xmlVersionID 1.0
 * @xmlDefinition A diagram, graph, mathematical curves, or similar representation.
 * @xmlRepresentationTermName Graphic
 * @xmlPrimitiveType binary
 * @xmlBuiltinType base64Binary
 */
class GraphicType
{

        /**
         * @xmlType value
         * @var base64Binary
         */
        public $value;
    /**
     * @UniqueID UDT000003-SC2
     * @CategoryCode SC
     * @DictionaryEntryName Graphic. Format. Text
     * @Definition The format of the graphic content.
     * @ObjectClass Graphic
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
     * @UniqueID UDT000003-SC3
     * @CategoryCode SC
     * @DictionaryEntryName Graphic. Mime. Code
     * @Definition The mime type of the graphic object.
     * @ObjectClass Graphic
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
     * @UniqueID UDT000003-SC4
     * @CategoryCode SC
     * @DictionaryEntryName Graphic. Encoding. Code
     * @Definition Specifies the decoding algorithm of the graphic object.
     * @ObjectClass Graphic
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
     * @UniqueID UDT000003-SC6
     * @CategoryCode SC
     * @DictionaryEntryName Graphic. Uniform Resource. Identifier
     * @Definition The Uniform Resource Identifier that identifies where the graphic object is located.
     * @ObjectClass Graphic
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
     * @UniqueID UDT000003-SC7
     * @CategoryCode SC
     * @DictionaryEntryName Graphic. Filename.Text
     * @Definition The filename of the graphic object.
     * @ObjectClass Graphic
     * @PropertyTermName Filename
     * @RepresentationTermName Text
     * @PrimitiveType string
     * @BuiltinType string
     * @xmlType attribute
     * @xmlName filename
     * @var xsd:string
     */
    public $filename;
} // end class GraphicType
