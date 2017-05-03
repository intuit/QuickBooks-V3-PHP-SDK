<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName PartyTaxSchemeType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PartyTaxSchemeType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Party Tax Scheme. Details
 * @xmlDefinition Information about a party's Tax Scheme.
 * @xmlObjectClass Party Tax Scheme
 */
class PartyTaxSchemeType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Party Tax Scheme. Registration_ Name. Name
     * @Definition The official name of the party as registered with the relevant fiscal authority.
     * @Cardinality 0..1
     * @ObjectClass Party Tax Scheme
     * @PropertyTermQualifier Registration
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @Examples "Microsoft Corporation"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RegistrationName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RegistrationName
     */
    public $RegistrationName;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Party Tax Scheme. Company Identifier. Identifier
     * @Definition The identifier assigned for tax purposes to a party by the taxation authority.
     * @Cardinality 0..1
     * @ObjectClass Party Tax Scheme
     * @PropertyTerm Company Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms VAT Number
     * @Examples "3556625"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CompanyID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CompanyID
     */
    public $CompanyID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Party Tax Scheme. Tax Level Code. Code
     * @Definition The section or role within the tax scheme that applies to the party.
     * @Cardinality 0..1
     * @ObjectClass Party Tax Scheme
     * @PropertyTerm Tax Level Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TaxLevelCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TaxLevelCode
     */
    public $TaxLevelCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Party Tax Scheme. Exemption Reason Code. Code
     * @Definition A reason for a party's exemption from tax, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Party Tax Scheme
     * @PropertyTerm Exemption Reason Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExemptionReasonCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ExemptionReasonCode
     */
    public $ExemptionReasonCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Party Tax Scheme. Exemption_ Reason. Text
     * @Definition A reason for a party's exemption from tax, expressed as text.
     * @Cardinality 0..1
     * @ObjectClass Party Tax Scheme
     * @PropertyTermQualifier Exemption
     * @PropertyTerm Reason
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExemptionReason
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ExemptionReason
     */
    public $ExemptionReason;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Party Tax Scheme. Registration_ Address. Address
     * @Definition An association to Registered Address (for tax purposes).
     * @Cardinality 0..1
     * @ObjectClass Party Tax Scheme
     * @PropertyTermQualifier Registration
     * @PropertyTerm Address
     * @AssociatedObjectClass Address
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RegistrationAddress
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\RegistrationAddress
     */
    public $RegistrationAddress;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Party Tax Scheme. Tax Scheme
     * @Definition An association to Tax Scheme.
     * @Cardinality 1
     * @ObjectClass Party Tax Scheme
     * @PropertyTerm Tax Scheme
     * @AssociatedObjectClass Tax Scheme
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName TaxScheme
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TaxScheme
     */
    public $TaxScheme;
} // end class PartyTaxSchemeType
