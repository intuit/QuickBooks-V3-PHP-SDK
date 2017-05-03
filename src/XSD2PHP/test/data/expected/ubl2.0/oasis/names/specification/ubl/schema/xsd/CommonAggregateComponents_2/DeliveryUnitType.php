<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName DeliveryUnitType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DeliveryUnitType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Delivery Unit. Details
 * @xmlDefinition Information about a Delivery Unit.
 * @xmlObjectClass Delivery Unit
 */
class DeliveryUnitType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Delivery Unit. Batch Quantity. Quantity
     * @Definition The quantity of ordered Items that constitutes a batch for delivery purposes.
     * @Cardinality 1
     * @ObjectClass Delivery Unit
     * @PropertyTerm Batch Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @Examples "100 units", "by the dozen"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName BatchQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\BatchQuantity
     */
    public $BatchQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Delivery Unit. Consumer_ Unit. Quantity
     * @Definition The quantity of consumer units in the Delivery Unit.
     * @Cardinality 0..1
     * @ObjectClass Delivery Unit
     * @PropertyTermQualifier Consumer
     * @PropertyTerm Unit
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @Examples "packs of 10"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ConsumerUnitQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ConsumerUnitQuantity
     */
    public $ConsumerUnitQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Delivery Unit. Hazardous Risk_ Indicator. Indicator
     * @Definition Indicates whether the Item as delivered is hazardous.
     * @Cardinality 0..1
     * @ObjectClass Delivery Unit
     * @PropertyTermQualifier Hazardous Risk
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @Examples Default is negative
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName HazardousRiskIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\HazardousRiskIndicator
     */
    public $HazardousRiskIndicator;
} // end class DeliveryUnitType
