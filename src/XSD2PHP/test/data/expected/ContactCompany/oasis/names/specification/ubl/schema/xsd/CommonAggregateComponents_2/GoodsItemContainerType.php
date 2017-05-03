<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName GoodsItemContainerType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\GoodsItemContainerType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Goods Item Container. Details
 * @xmlDefinition How goods items are split across transport equipment.
 * @xmlObjectClass Goods Item Container
 */
class GoodsItemContainerType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item Container. Identifier
     * @Definition Identifies goods items split across transport equipment.
     * @Cardinality 1
     * @ObjectClass Goods Item Container
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
     * @DictionaryEntryName Goods Item Container. Quantity
     * @Definition Number of goods items loaded into or onto one piece of transport equipment as a total consignment or part of a consignment.
     * @Cardinality 0..1
     * @ObjectClass Goods Item Container
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @AlternativeBusinessTerms Number of packages stuffed
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Quantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Quantity
     */
    public $Quantity;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Goods Item Container. Transport Equipment
     * @Definition Associates the containers for a single goods item.
     * @Cardinality 0..n
     * @ObjectClass Goods Item Container
     * @PropertyTerm Transport Equipment
     * @AssociatedObjectClass Transport Equipment
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName TransportEquipment
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransportEquipment
     */
    public $TransportEquipment;
} // end class GoodsItemContainerType
