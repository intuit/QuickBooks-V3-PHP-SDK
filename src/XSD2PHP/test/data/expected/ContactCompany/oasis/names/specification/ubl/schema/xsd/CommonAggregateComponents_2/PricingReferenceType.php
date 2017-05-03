<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName PricingReferenceType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PricingReferenceType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Pricing Reference. Details
 * @xmlDefinition A reference to Pricing Information.
 * @xmlObjectClass Pricing Reference
 */
class PricingReferenceType
{

    
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Pricing Reference. Original_ Item Location Quantity. Item Location Quantity
     * @Definition An association to the original Item Location Quantity.
     * @Cardinality 0..1
     * @ObjectClass Pricing Reference
     * @PropertyTermQualifier Original
     * @PropertyTerm Item Location Quantity
     * @AssociatedObjectClass Item Location Quantity
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OriginalItemLocationQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OriginalItemLocationQuantity
     */
    public $OriginalItemLocationQuantity;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Pricing Reference. Alternative Condition_ Price. Price
     * @Definition The price expressed in terms other than the actual price, e.g., the list price v. the contracted price, or the price in bags v. the price in kilos, or the list price in bags v. the contracted price in kilos.
     * @Cardinality 0..n
     * @ObjectClass Pricing Reference
     * @PropertyTermQualifier Alternative Condition
     * @PropertyTerm Price
     * @AssociatedObjectClass Price
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName AlternativeConditionPrice
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AlternativeConditionPrice
     */
    public $AlternativeConditionPrice;
} // end class PricingReferenceType
