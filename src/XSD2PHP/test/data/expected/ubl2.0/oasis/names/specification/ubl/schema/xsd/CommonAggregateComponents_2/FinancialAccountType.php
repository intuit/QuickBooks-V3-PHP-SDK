<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName FinancialAccountType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\FinancialAccountType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Financial Account. Details
 * @xmlDefinition Information about a Financial Account.
 * @xmlObjectClass Financial Account
 */
class FinancialAccountType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Financial Account. Identifier
     * @Definition The identifier for the Financial Account; the Bank Account Number.
     * @Cardinality 0..1
     * @ObjectClass Financial Account
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples SWIFT(BIC) and IBAN are defined in ISO 9362 and ISO 13616.
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ID
     */
    public $ID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Financial Account. Name
     * @Definition The name of the Financial Account.
     * @Cardinality 0..1
     * @ObjectClass Financial Account
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Name
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Name
     */
    public $Name;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Financial Account. Account Type Code. Code
     * @Definition The type of Financial Account, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Financial Account
     * @PropertyTerm Account Type Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AccountTypeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AccountTypeCode
     */
    public $AccountTypeCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Financial Account. Currency Code. Code
     * @Definition The currency in which the Financial Account is held, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Financial Account
     * @PropertyTerm Currency Code
     * @RepresentationTerm Code
     * @DataType Currency_ Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CurrencyCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CurrencyCode
     */
    public $CurrencyCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Financial Account. Payment_ Note. Text
     * @Definition Free-form text applying to the Payment to the owner of this account.
     * @Cardinality 0..n
     * @ObjectClass Financial Account
     * @PropertyTermQualifier Payment
     * @PropertyTerm Note
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName PaymentNote
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PaymentNote
     */
    public $PaymentNote;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Financial Account. Financial Institution_ Branch. Branch
     * @Definition An association to Financial Institution Branch.
     * @Cardinality 0..1
     * @ObjectClass Financial Account
     * @PropertyTermQualifier Financial Institution
     * @PropertyTerm Branch
     * @AssociatedObjectClass Branch
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName FinancialInstitutionBranch
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\FinancialInstitutionBranch
     */
    public $FinancialInstitutionBranch;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Financial Account. Country
     * @Definition An association to Country.
     * @Cardinality 0..1
     * @ObjectClass Financial Account
     * @PropertyTerm Country
     * @AssociatedObjectClass Country
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Country
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Country
     */
    public $Country;
} // end class FinancialAccountType
