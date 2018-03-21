<?php
namespace oasis\names\specification\ubl\schema\xsd\QualifiedDatatypes_2;

use un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:QualifiedDatatypes-2
 * @xmlType CodeType
 * @xmlName CountryIdentificationCodeType
 * @var oasis\names\specification\ubl\schema\xsd\QualifiedDatatypes_2\CountryIdentificationCodeType
 * @xmlDictionaryEntryName Country Identification_ Code. Type
 * @xmlVersion 2.0
 * @xmlDefinition The set of countries of the world.
 * @xmlRepresentationTerm Code
 * @xmlQualifierTerm Country Identification
 * @xmlUsageRule Derived from the ISO 3166-1-alpha-2 code elements used under the terms of the ISO policy stated at http://www.iso.org/iso/en/commcentre/pressreleases/2003/Ref871.html.
 */
class CountryIdentificationCodeType extends _2\CodeType
{

    
    /**
     * @Name Country Identification_ Code List. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listID
     * @var string
     */
    public $listID;
    /**
     * @Name Country Identification_ Code List. Agency. Identifier
     * @Definition Defaults to the UN/ECE rec 3 (Code for the Representation of Names of Countries)
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listAgencyID
     * @var string
     */
    public $listAgencyID;
    /**
     * @Name Country Identification_ Code List. Agency Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listAgencyName
     * @var string
     */
    public $listAgencyName;
    /**
     * @Name Country Identification_ Code List. Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listName
     * @var string
     */
    public $listName;
    /**
     * @Name Country Identification_ Code List. Version. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listVersionID
     * @var string
     */
    public $listVersionID;
    /**
     * @Name Country Identification_ Code. Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName name
     * @var string
     */
    public $name;
    /**
     * @Name Country Identification_ Language. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName languageID
     * @var string
     */
    public $languageID;
    /**
     * @Name Country Identification_ Code List. Uniform Resource. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listURI
     * @var string
     */
    public $listURI;
    /**
     * @Name Country Identification_ Code List Scheme. Uniform Resource. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listSchemeURI
     * @var string
     */
    public $listSchemeURI;
} // end class CountryIdentificationCodeType
