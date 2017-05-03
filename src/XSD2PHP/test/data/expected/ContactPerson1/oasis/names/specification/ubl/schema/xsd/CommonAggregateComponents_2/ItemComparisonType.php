<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ItemComparisonType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ItemComparisonType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Item Comparison. Details
 * @xmlDefinition Used to compare different items based on cost, quantity, or measurements.
 * @xmlObjectClass Item Comparison
 */
class ItemComparisonType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item Comparison. Price. Amount
     * @Definition The price for the comparison quantity of the item.
     * @Cardinality 0..1
     * @ObjectClass Item Comparison
     * @PropertyTerm Price
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PriceAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PriceAmount
     */
    public $PriceAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item Comparison. Quantity
     * @Definition The quantity used for price comparison with other items.
     * @Cardinality 0..1
     * @ObjectClass Item Comparison
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @Examples "per unit"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Quantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Quantity
     */
    public $Quantity;
} // end class ItemComparisonType
