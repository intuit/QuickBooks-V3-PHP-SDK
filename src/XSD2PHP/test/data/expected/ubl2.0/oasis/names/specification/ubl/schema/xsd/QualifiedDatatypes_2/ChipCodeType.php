<?php
namespace oasis\names\specification\ubl\schema\xsd\QualifiedDatatypes_2;

use un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:QualifiedDatatypes-2
 * @xmlType CodeType
 * @xmlName ChipCodeType
 * @var oasis\names\specification\ubl\schema\xsd\QualifiedDatatypes_2\ChipCodeType
 * @xmlDictionaryEntryName Chip_ Code. Type
 * @xmlVersion 2.0
 * @xmlDefinition Distinction between CHIP and MAG STRIPE cards
 * @xmlRepresentationTerm Code
 * @xmlQualifierTerm Chip
 */
class ChipCodeType extends _2\CodeType
{

    
    /**
     * @Name Chip_ Code List. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listID
     * @var string
     */
    public $listID;
    /**
     * @Name Chip_ Code List. Agency. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listAgencyID
     * @var string
     */
    public $listAgencyID;
    /**
     * @Name Chip_ Code List. Agency Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listAgencyName
     * @var string
     */
    public $listAgencyName;
    /**
     * @Name Chip_ Code List. Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listName
     * @var string
     */
    public $listName;
    /**
     * @Name Chip_ Code List. Version. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listVersionID
     * @var string
     */
    public $listVersionID;
    /**
     * @Name Chip_ Code. Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName name
     * @var string
     */
    public $name;
    /**
     * @Name Chip_ Language. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName languageID
     * @var string
     */
    public $languageID;
    /**
     * @Name Chip_ Code List. Uniform Resource. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listURI
     * @var string
     */
    public $listURI;
    /**
     * @Name Chip_ Code List Scheme. Uniform Resource. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listSchemeURI
     * @var string
     */
    public $listSchemeURI;
} // end class ChipCodeType
