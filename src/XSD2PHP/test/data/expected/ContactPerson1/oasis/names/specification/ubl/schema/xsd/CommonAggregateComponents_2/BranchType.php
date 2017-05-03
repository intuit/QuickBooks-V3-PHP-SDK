<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName BranchType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\BranchType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Branch. Details
 * @xmlDefinition Information about a branch or division of an organization.
 * @xmlObjectClass Branch
 */
class BranchType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Branch. Identifier
     * @Definition An identifier for a branch or division of an organization.
     * @Cardinality 0..1
     * @ObjectClass Branch
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
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
     * @DictionaryEntryName Branch. Name
     * @Definition The name of a branch or division of an organization.
     * @Cardinality 0..1
     * @ObjectClass Branch
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
     * @ComponentType ASBIE
     * @DictionaryEntryName Branch. Financial Institution
     * @Definition An association to Financial Institution.
     * @Cardinality 0..1
     * @ObjectClass Branch
     * @PropertyTerm Financial Institution
     * @AssociatedObjectClass Financial Institution
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName FinancialInstitution
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\FinancialInstitution
     */
    public $FinancialInstitution;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Branch. Address
     * @Definition An association to Address.
     * @Cardinality 0..1
     * @ObjectClass Branch
     * @PropertyTerm Address
     * @AssociatedObjectClass Address
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Address
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Address
     */
    public $Address;
} // end class BranchType
