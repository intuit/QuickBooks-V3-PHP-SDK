<?php
namespace oasis\names\specification\ubl\schema\xsd\QualifiedDatatypes_2;

use un\unece\uncefact\data\specification\UnqualifiedDataTypesSchemaModule\_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:QualifiedDatatypes-2
 * @xmlType CodeType
 * @xmlName AllowanceChargeReasonCodeType
 * @var oasis\names\specification\ubl\schema\xsd\QualifiedDatatypes_2\AllowanceChargeReasonCodeType
 * @xmlDictionaryEntryName Allowance Charge Reason_ Code. Type
 * @xmlVersion 2.0
 * @xmlDefinition The set of possible reasons for an allowance or charge.
 * @xmlRepresentationTerm Code
 * @xmlQualifierTerm Allowance Charge Reason
 * @xmlUsageRule Used under the terms of the UNECE  policy stated at http://www.unece.org/ece_legal.htm.
 */
class AllowanceChargeReasonCodeType extends _2\CodeType
{

    
    /**
     * @Name Allowance Charge Reason_ Code List. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listID
     * @var string
     */
    public $listID;
    /**
     * @Name Allowance Charge Reason_ Code List. Agency. Identifier
     * @Definition Defaults to the UN/EDIFACT data element 3055 code list.
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listAgencyID
     * @var string
     */
    public $listAgencyID;
    /**
     * @Name Allowance Charge Reason_ Code List. Agency Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listAgencyName
     * @var string
     */
    public $listAgencyName;
    /**
     * @Name Allowance Charge Reason_ Code List. Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listName
     * @var string
     */
    public $listName;
    /**
     * @Name Allowance Charge Reason_ Code List. Version. Identifier
     * @Definition Identifies the Directory of the UN/EDIFACT code list.
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listVersionID
     * @var string
     */
    public $listVersionID;
    /**
     * @Name Allowance Charge Reason_ Code. Name. Text
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName name
     * @var string
     */
    public $name;
    /**
     * @Name Allowance Charge Reason_ Language. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName languageID
     * @var string
     */
    public $languageID;
    /**
     * @Name Allowance Charge Reason_ Code List. Uniform Resource. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listURI
     * @var string
     */
    public $listURI;
    /**
     * @Name Allowance Charge Reason_ Code List Scheme. Uniform Resource. Identifier
     * @Definition
     * @PrimitiveType String
     * @xmlType attribute
     * @xmlName listSchemeURI
     * @var string
     */
    public $listSchemeURI;
} // end class AllowanceChargeReasonCodeType
