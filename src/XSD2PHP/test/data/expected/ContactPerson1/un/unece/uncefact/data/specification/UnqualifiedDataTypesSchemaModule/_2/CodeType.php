<?php
namespace un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2
 * @xmlType normalizedString
 * @xmlName CodeType
 * @var un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2\CodeType
 * @xmlUniqueID UDT000007
 * @xmlCategoryCode UDT
 * @xmlDictionaryEntryName Code. Type
 * @xmlVersionID 1.0
 * @xmlDefinition A character string (letters, figures, or symbols) that for brevity and/or languange independence may be used to represent or replace a definitive value or text of an attribute together with relevant supplementary information.
 * @xmlRepresentationTermName Code
 * @xmlPrimitiveType string
 * @xmlBuiltinType normalizedString
 * @xmlUsageRule Other supplementary components in the CCT are captured as part of the token and name for the schema module containing the code list and thus, are not declared as attributes.
 */
class CodeType
{

        /**
         * @xmlType value
         * @var normalizedString
         */
        public $value;
    /**
     * @UniqueID UDT000007-SC2
     * @CategoryCode SC
     * @DictionaryEntryName Code List. Identifier
     * @Definition The identification of a list of codes.
     * @ObjectClass Code List
     * @PropertyTermName Identification
     * @RepresentationTermName Identifier
     * @PrimitiveType string
     * @xmlType attribute
     * @xmlName listID
     * @var xsd:normalizedString
     */
    public $listID;
    /**
     * @UniqueID UDT000007-SC3
     * @CategoryCode SC
     * @DictionaryEntryName Code List. Agency. Identifier
     * @Definition An agency that maintains one or more lists of codes.
     * @ObjectClass Code List
     * @PropertyTermName Agency
     * @RepresentationTermName Identifier
     * @PrimitiveType string
     * @UsageRule Defaults to the UN/EDIFACT data element 3055 code list.
     * @xmlType attribute
     * @xmlName listAgencyID
     * @var xsd:normalizedString
     */
    public $listAgencyID;
    /**
     * @UniqueID UDT000007-SC4
     * @CategoryCode SC
     * @DictionaryEntryName Code List. Agency Name. Text
     * @Definition The name of the agency that maintains the list of codes.
     * @ObjectClass Code List
     * @PropertyTermName Agency Name
     * @RepresentationTermName Text
     * @PrimitiveType string
     * @xmlType attribute
     * @xmlName listAgencyName
     * @var xsd:string
     */
    public $listAgencyName;
    /**
     * @UniqueID UDT000007-SC5
     * @CategoryCode SC
     * @DictionaryEntryName Code List. Name. Text
     * @Definition The name of a list of codes.
     * @ObjectClass Code List
     * @PropertyTermName Name
     * @RepresentationTermName Text
     * @PrimitiveType string
     * @xmlType attribute
     * @xmlName listName
     * @var xsd:string
     */
    public $listName;
    /**
     * @UniqueID UDT000007-SC6
     * @CategoryCode SC
     * @DictionaryEntryName Code List. Identifier
     * @Definition The identification of a list of codes.
     * @ObjectClass Code List
     * @PropertyTermName Identification
     * @RepresentationTermName Identifier
     * @PrimitiveType string
     * @BuiltinType string
     * @xmlType attribute
     * @xmlName listVersionID
     * @var xsd:normalizedString
     */
    public $listVersionID;
    /**
     * @UniqueID UDT000007-SC7
     * @CategoryCode SC
     * @DictionaryEntryName Code. Name. Text
     * @Definition The textual equivalent of the code content component.
     * @ObjectClass Code
     * @PropertyTermName Name
     * @RepresentationTermName Text
     * @PrimitiveType string
     * @BuiltinType string
     * @xmlType attribute
     * @xmlName name
     * @var xsd:string
     */
    public $name;
    /**
     * @UniqueID UDT000007-SC8
     * @CategoryCode SC
     * @DictionaryEntryName Language. Identifier
     * @Definition The identifier of the language used in the code name.
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
    /**
     * @UniqueID UDT000007-SC9
     * @CategoryCode SC
     * @DictionaryEntryName Code List. Uniform Resource. Identifier
     * @Definition The Uniform Resource Identifier that identifies where the code list is located.
     * @ObjectClass Code List
     * @PropertyTermName Uniform Resource Identifier
     * @RepresentationTermName Identifier
     * @PrimitiveType string
     * @BuiltinType anyURI
     * @xmlType attribute
     * @xmlName listURI
     * @var xsd:anyURI
     */
    public $listURI;
    /**
     * @UniqueID UDT000007-SC10
     * @CategoryCode SC
     * @DictionaryEntryName Code List Scheme. Uniform Resource. Identifier
     * @Definition The Uniform Resource Identifier that identifies where the code list scheme is located.
     * @ObjectClass Code List Scheme
     * @PropertyTermName Uniform Resource Identifier
     * @RepresentationTermName Identifier
     * @PrimitiveType string
     * @BuiltinType anyURI
     * @xmlType attribute
     * @xmlName listSchemeURI
     * @var xsd:anyURI
     */
    public $listSchemeURI;
} // end class CodeType
