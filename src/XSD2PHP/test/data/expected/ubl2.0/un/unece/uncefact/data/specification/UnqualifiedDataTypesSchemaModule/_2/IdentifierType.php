<?php
namespace un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2
 * @xmlType normalizedString
 * @xmlName IdentifierType
 * @var un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2\IdentifierType
 * @xmlUniqueID UDT0000011
 * @xmlCategoryCode UDT
 * @xmlDictionaryEntryName Identifier. Type
 * @xmlVersionID 1.0
 * @xmlDefinition A character string to identify and distinguish uniquely, one instance of an object in an identification scheme from all other objects in the same scheme together with relevant supplementary information.
 * @xmlRepresentationTermName Identifier
 * @xmlPrimitiveType string
 * @xmlBuiltinType normalizedString
 * @xmlUsageRule Other supplementary components in the CCT are captured as part of the token and name for the schema module containing the identifer list and thus, are not declared as attributes.
 */
class IdentifierType
{

        /**
         * @xmlType value
         * @var string
         */
        public $value;
    /**
     * @UniqueID UDT000011-SC2
     * @CategoryCode SC
     * @DictionaryEntryName Identification Scheme. Identifier
     * @Definition The identification of the identification scheme.
     * @ObjectClass Identification Scheme
     * @PropertyTermName Identification
     * @RepresentationTermName Identifier
     * @PrimitiveType string
     * @xmlType attribute
     * @xmlName schemeID
     * @var string
     */
    public $schemeID;
    /**
     * @UniqueID UDT000011-SC3
     * @CategoryCode SC
     * @DictionaryEntryName Identification Scheme. Name. Text
     * @Definition The name of the identification scheme.
     * @ObjectClass Identification Scheme
     * @PropertyTermName Name
     * @RepresentationTermName Text
     * @PrimitiveType string
     * @xmlType attribute
     * @xmlName schemeName
     * @var string
     */
    public $schemeName;
    /**
     * @UniqueID UDT000011-SC4
     * @CategoryCode SC
     * @DictionaryEntryName Identification Scheme Agency. Identifier
     * @Definition The identification of the agency that maintains the identification scheme.
     * @ObjectClass Identification Scheme Agency
     * @PropertyTermName Identification
     * @RepresentationTermName Identifier
     * @PrimitiveType string
     * @UsageRule Defaults to the UN/EDIFACT data element 3055 code list.
     * @xmlType attribute
     * @xmlName schemeAgencyID
     * @var string
     */
    public $schemeAgencyID;
    /**
     * @UniqueID UDT000011-SC5
     * @CategoryCode SC
     * @DictionaryEntryName Identification Scheme Agency. Name. Text
     * @Definition The name of the agency that maintains the identification scheme.
     * @ObjectClass Identification Scheme Agency
     * @PropertyTermName Agency Name
     * @RepresentationTermName Text
     * @PrimitiveType string
     * @xmlType attribute
     * @xmlName schemeAgencyName
     * @var string
     */
    public $schemeAgencyName;
    /**
     * @UniqueID UDT000011-SC6
     * @CategoryCode SC
     * @DictionaryEntryName Identification Scheme. Version. Identifier
     * @Definition The version of the identification scheme.
     * @ObjectClass Identification Scheme
     * @PropertyTermName Version
     * @RepresentationTermName Identifier
     * @PrimitiveType string
     * @BuiltinType normalizedString
     * @xmlType attribute
     * @xmlName schemeVersionID
     * @var string
     */
    public $schemeVersionID;
    /**
     * @UniqueID UDT0000011-SC7
     * @CategoryCode SC
     * @DictionaryEntryName Identification Scheme Data. Uniform Resource. Identifier
     * @Definition The Uniform Resource Identifier that identifies where the identification scheme data is located.
     * @ObjectClass Identification Scheme Data
     * @PropertyTermName Uniform Resource Identifier
     * @RepresentationTermName Identifier
     * @PrimitiveType string
     * @BuiltinType anyURI
     * @xmlType attribute
     * @xmlName schemeDataURI
     * @var string
     */
    public $schemeDataURI;
    /**
     * @UniqueID UDT0000011-SC8
     * @CategoryCode SC
     * @DictionaryEntryName Identification Scheme. Uniform Resource. Identifier
     * @Definition The Uniform Resource Identifier that identifies where the identification scheme is located.
     * @ObjectClass Identification Scheme
     * @PropertyTermName Uniform Resource Identifier
     * @RepresentationTermName Identifier
     * @PrimitiveType string
     * @BuiltinType anyURI
     * @xmlType attribute
     * @xmlName schemeURI
     * @var string
     */
    public $schemeURI;
} // end class IdentifierType
