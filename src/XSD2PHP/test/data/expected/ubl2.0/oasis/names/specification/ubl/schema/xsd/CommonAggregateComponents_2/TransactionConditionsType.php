<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName TransactionConditionsType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransactionConditionsType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Transaction Conditions. Details
 * @xmlDefinition Information about purchasing, sales, or payment conditions.
 * @xmlObjectClass Transaction Conditions
 * @xmlAlternativeBusinessTerms Payment Conditions, Sales Conditions
 */
class TransactionConditionsType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transaction Conditions. Identifier
     * @Definition Identifies conditions of the transaction, typically Purchase/Sales Conditions.
     * @Cardinality 0..1
     * @ObjectClass Transaction Conditions
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
     * @DictionaryEntryName Transaction Conditions. Action Code. Code
     * @Definition An action relating to sales or payment conditions, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Transaction Conditions
     * @PropertyTerm Action Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ActionCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ActionCode
     */
    public $ActionCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transaction Conditions. Description. Text
     * @Definition The description of the transaction conditions.
     * @Cardinality 0..n
     * @ObjectClass Transaction Conditions
     * @PropertyTerm Description
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Description
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Description
     */
    public $Description;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Transaction Conditions. Document Reference
     * @Definition An association to Document Reference.
     * @Cardinality 0..n
     * @ObjectClass Transaction Conditions
     * @PropertyTerm Document Reference
     * @AssociatedObjectClass Document Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName DocumentReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DocumentReference
     */
    public $DocumentReference;
} // end class TransactionConditionsType
