<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName DeliveryTermsType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DeliveryTermsType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Delivery Terms. Details
 * @xmlDefinition Information about Delivery Terms.
 * @xmlObjectClass Delivery Terms
 */
class DeliveryTermsType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Delivery Terms. Identifier
     * @Definition Identifies the Delivery Terms.
     * @Cardinality 0..1
     * @ObjectClass Delivery Terms
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples CIF, FOB, or EXW from the INCOTERMS Terms of Delivery. (2000 version preferred.)
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
     * @DictionaryEntryName Delivery Terms. Special_ Terms. Text
     * @Definition A description of special conditions relating to the Delivery Terms.
     * @Cardinality 0..1
     * @ObjectClass Delivery Terms
     * @PropertyTermQualifier Special
     * @PropertyTerm Terms
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SpecialTerms
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SpecialTerms
     */
    public $SpecialTerms;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Delivery Terms. Loss Risk Responsibility Code. Code
     * @Definition An identifier for the responsibility for loss risk in the context of the Delivery Terms, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Delivery Terms
     * @PropertyTerm Loss Risk Responsibility Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LossRiskResponsibilityCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LossRiskResponsibilityCode
     */
    public $LossRiskResponsibilityCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Delivery Terms. Loss Risk. Text
     * @Definition A description of the loss risk in the context of the Delivery Terms.
     * @Cardinality 0..1
     * @ObjectClass Delivery Terms
     * @PropertyTerm Loss Risk
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LossRisk
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LossRisk
     */
    public $LossRisk;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Delivery Terms. Delivery_ Location. Location
     * @Definition An association to Location, e.g., a port.
     * @Cardinality 0..1
     * @ObjectClass Delivery Terms
     * @PropertyTermQualifier Delivery
     * @PropertyTerm Location
     * @AssociatedObjectClass Location
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DeliveryLocation
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DeliveryLocation
     */
    public $DeliveryLocation;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Delivery Terms. Allowance Charge
     * @Definition An association to Allowance Charge.
     * @Cardinality 0..1
     * @ObjectClass Delivery Terms
     * @PropertyTerm Allowance Charge
     * @AssociatedObjectClass Allowance Charge
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AllowanceCharge
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AllowanceCharge
     */
    public $AllowanceCharge;
} // end class DeliveryTermsType
