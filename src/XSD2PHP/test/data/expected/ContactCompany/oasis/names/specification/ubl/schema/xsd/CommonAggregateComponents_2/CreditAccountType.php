<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName CreditAccountType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CreditAccountType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Credit Account. Details
 * @xmlDefinition Information about a Credit Account (for sales on account).
 * @xmlObjectClass Credit Account
 */
class CreditAccountType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Credit Account. Account Identifier. Identifier
     * @Definition Identifies the Credit Account.
     * @Cardinality 1
     * @ObjectClass Credit Account
     * @PropertyTerm Account Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "Customer Code 29"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName AccountID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AccountID
     */
    public $AccountID;
} // end class CreditAccountType
