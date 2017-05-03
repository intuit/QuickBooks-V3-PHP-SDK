<?php
namespace un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2
 * @xmlType base64Binary
 * @xmlName BinaryObjectType
 * @var un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2\BinaryObjectType
 * @xmlUniqueID UDT000002
 * @xmlCategoryCode UDT
 * @xmlDictionaryEntryName Binary Object. Type
 * @xmlVersionID 1.0
 * @xmlDefinition A set of finite-length sequences of binary octets.
 * @xmlRepresentationTermName Binary Object
 * @xmlPrimitiveType binary
 * @xmlBuiltinType base64Binary
 */
class BinaryObjectType
{

        /**
         * @xmlType value
         * @var string
         */
        public $value;
    /**
     * @UniqueID UDT000002-SC2
     * @CategoryCode SC
     * @DictionaryEntryName Binary Object. Format. Text
     * @Definition The format of the binary content.
     * @ObjectClass Binary Object
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
     * @UniqueID UDT000002-SC3
     * @CategoryCode SC
     * @DictionaryEntryName Binary Object. Mime. Code
     * @Definition The mime type of the binary object.
     * @ObjectClass Binary Object
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
     * @UniqueID UDT000002-SC4
     * @CategoryCode SC
     * @DictionaryEntryName Binary Object. Encoding. Code
     * @Definition Specifies the decoding algorithm of the binary object.
     * @ObjectClass Binary Object
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
     * @UniqueID UDT000002-SC5
     * @CategoryCode SC
     * @DictionaryEntryName Binary Object. Character Set. Code
     * @Definition The character set of the binary object if the mime type is text.
     * @ObjectClass Binary Object
     * @PropertyTermName Character Set
     * @RepresentationTermName Code
     * @PrimitiveType string
     * @BuiltinType normalizedString
     * @xmlType attribute
     * @xmlName characterSetCode
     * @var string
     */
    public $characterSetCode;
    /**
     * @UniqueID UDT000002-SC6
     * @CategoryCode SC
     * @DictionaryEntryName Binary Object. Uniform Resource. Identifier
     * @Definition The Uniform Resource Identifier that identifies where the binary object is located.
     * @ObjectClass Binary Object
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
     * @UniqueID UDT000002-SC7
     * @CategoryCode SC
     * @DictionaryEntryName Binary Object. Filename.Text
     * @Definition The filename of the binary object.
     * @ObjectClass Binary Object
     * @PropertyTermName Filename
     * @RepresentationTermName Text
     * @PrimitiveType string
     * @BuiltinType string
     * @xmlType attribute
     * @xmlName filename
     * @var string
     */
    public $filename;
} // end class BinaryObjectType
