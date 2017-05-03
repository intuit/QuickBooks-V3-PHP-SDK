<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName BillingReferenceLineType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\BillingReferenceLineType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Billing Reference Line. Details
 * @xmlDefinition Information about a Billing Line.
 * @xmlObjectClass Billing Reference Line
 */
class BillingReferenceLineType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Billing Reference Line. Identifier
     * @Definition An identifier for the Billing Line.
     * @Cardinality 1
     * @ObjectClass Billing Reference Line
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName ID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ID
     */
    public $ID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Billing Reference Line. Amount
     * @Definition The amount of the Billing Line, including Allowance Charges but net of taxes.
     * @Cardinality 0..1
     * @ObjectClass Billing Reference Line
     * @PropertyTerm Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Amount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Amount
     */
    public $Amount;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Billing Reference Line. Allowance Charge
     * @Definition An association to Allowance Charge.
     * @Cardinality 0..n
     * @ObjectClass Billing Reference Line
     * @PropertyTerm Allowance Charge
     * @AssociatedObjectClass Allowance Charge
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName AllowanceCharge
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AllowanceCharge
     */
    public $AllowanceCharge;
} // end class BillingReferenceLineType
