<?php
namespace oasis\names\specification\ubl\schema\xsd\QualifiedDatatypes_2;

use un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:QualifiedDatatypes-2
 * @xmlType CodeType
 * @xmlName TransportEquipmentTypeCodeType
 * @var oasis\names\specification\ubl\schema\xsd\QualifiedDatatypes_2\TransportEquipmentTypeCodeType
 * @xmlDictionaryEntryName Transport Equipment Type_ Code. Type
 * @xmlVersion 2.0
 * @xmlDefinition The set of code values for qualifying a type of equipment used in the transportation of goods.
 * @xmlRepresentationTerm Code
 * @xmlQualifierTerm Transport Equipment Type
 */
class TransportEquipmentTypeCodeType extends _2\CodeType
{

    
    /**
     * @Name Transport Equipment Type_ Code List. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listID
     * @var xsd:normalizedString
     */
    public $listID;
    /**
     * @Name Transport Equipment Type_ Code List. Agency. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listAgencyID
     * @var xsd:normalizedString
     */
    public $listAgencyID;
    /**
     * @Name Transport Equipment Type_ Code List. Agency Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listAgencyName
     * @var xsd:string
     */
    public $listAgencyName;
    /**
     * @Name Transport Equipment Type_ Code List. Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listName
     * @var xsd:string
     */
    public $listName;
    /**
     * @Name Transport Equipment Type_ Code List. Version. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listVersionID
     * @var xsd:normalizedString
     */
    public $listVersionID;
    /**
     * @Name Transport Equipment Type_ Code. Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName name
     * @var xsd:string
     */
    public $name;
    /**
     * @Name Transport Equipment Type_ Language. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName languageID
     * @var xsd:language
     */
    public $languageID;
    /**
     * @Name Transport Equipment Type_ Code List. Uniform Resource. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listURI
     * @var xsd:anyURI
     */
    public $listURI;
    /**
     * @Name Transport Equipment Type_ Code List Scheme. Uniform Resource. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listSchemeURI
     * @var xsd:anyURI
     */
    public $listSchemeURI;
} // end class TransportEquipmentTypeCodeType
