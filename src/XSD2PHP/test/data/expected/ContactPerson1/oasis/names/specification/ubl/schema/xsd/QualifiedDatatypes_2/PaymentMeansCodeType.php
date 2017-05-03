<?php
namespace oasis\names\specification\ubl\schema\xsd\QualifiedDatatypes_2;

use un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:QualifiedDatatypes-2
 * @xmlType CodeType
 * @xmlName PaymentMeansCodeType
 * @var oasis\names\specification\ubl\schema\xsd\QualifiedDatatypes_2\PaymentMeansCodeType
 * @xmlDictionaryEntryName Payment Means_ Code. Type
 * @xmlVersion 2.0
 * @xmlDefinition The set of valid means of paying the debt incurred.
 * @xmlRepresentationTerm Code
 * @xmlQualifierTerm Payment Means
 * @xmlUsageRule Used under the terms of the UNECE  policy stated at http://www.unece.org/ece_legal.htm.
 */
class PaymentMeansCodeType extends _2\CodeType
{

    
    /**
     * @Name Payment Means_ Code List. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listID
     * @var xsd:normalizedString
     */
    public $listID;
    /**
     * @Name Payment Means_ Code List. Agency. Identifier
     * @Definition Defaults to the UN/EDIFACT data element 3055 code list.
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listAgencyID
     * @var xsd:normalizedString
     */
    public $listAgencyID;
    /**
     * @Name Payment Means_ Code List. Agency Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listAgencyName
     * @var xsd:string
     */
    public $listAgencyName;
    /**
     * @Name Payment Means_ Code List. Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listName
     * @var xsd:string
     */
    public $listName;
    /**
     * @Name Payment Means_ Code List. Version. Identifier
     * @Definition Identifies the Directory of the UN/EDIFACT code list.
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listVersionID
     * @var xsd:normalizedString
     */
    public $listVersionID;
    /**
     * @Name Payment Means_ Code. Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName name
     * @var xsd:string
     */
    public $name;
    /**
     * @Name Payment Means_ Language. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName languageID
     * @var xsd:language
     */
    public $languageID;
    /**
     * @Name Payment Means_ Code List. Uniform Resource. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listURI
     * @var xsd:anyURI
     */
    public $listURI;
    /**
     * @Name Payment Means_ Code List Scheme. Uniform Resource. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listSchemeURI
     * @var xsd:anyURI
     */
    public $listSchemeURI;
} // end class PaymentMeansCodeType
