<?php
namespace oasis\names\specification\ubl\schema\xsd\QualifiedDatatypes_2;

use un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:QualifiedDatatypes-2
 * @xmlType CodeType
 * @xmlName UnitOfMeasureCodeType
 * @var oasis\names\specification\ubl\schema\xsd\QualifiedDatatypes_2\UnitOfMeasureCodeType
 * @xmlDictionaryEntryName Unit Of Measure_ Code. Type
 * @xmlVersion 2.0
 * @xmlDefinition The set of code values for Units of Measure Used in International Trade
 * @xmlRepresentationTerm Code
 * @xmlQualifierTerm Unit Of Measure
 */
class UnitOfMeasureCodeType extends _2\CodeType
{

    
    /**
     * @Name Unit Of Measure_ Code List. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listID
     * @var xsd:normalizedString
     */
    public $listID;
    /**
     * @Name Unit Of Measure_ Code List. Agency. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listAgencyID
     * @var xsd:normalizedString
     */
    public $listAgencyID;
    /**
     * @Name Unit Of Measure_ Code List. Agency Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listAgencyName
     * @var xsd:string
     */
    public $listAgencyName;
    /**
     * @Name Unit Of Measure_ Code List. Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listName
     * @var xsd:string
     */
    public $listName;
    /**
     * @Name Unit Of Measure_ Code List. Version. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listVersionID
     * @var xsd:normalizedString
     */
    public $listVersionID;
    /**
     * @Name Unit Of Measure_ Code. Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName name
     * @var xsd:string
     */
    public $name;
    /**
     * @Name Unit Of Measure_ Language. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName languageID
     * @var xsd:language
     */
    public $languageID;
    /**
     * @Name Unit Of Measure_ Code List. Uniform Resource. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listURI
     * @var xsd:anyURI
     */
    public $listURI;
    /**
     * @Name Unit Of Measure_ Code List Scheme. Uniform Resource. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listSchemeURI
     * @var xsd:anyURI
     */
    public $listSchemeURI;
} // end class UnitOfMeasureCodeType
