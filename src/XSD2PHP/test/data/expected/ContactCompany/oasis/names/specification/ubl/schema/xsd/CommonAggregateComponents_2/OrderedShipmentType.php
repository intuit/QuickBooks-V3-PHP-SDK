<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName OrderedShipmentType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OrderedShipmentType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Ordered Shipment. Details
 * @xmlDefinition Information about an Ordered Shipment.
 * @xmlObjectClass Ordered Shipment
 */
class OrderedShipmentType
{

    
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Ordered Shipment. Shipment
     * @Definition An association to Shipment.
     * @Cardinality 1
     * @ObjectClass Ordered Shipment
     * @PropertyTerm Shipment
     * @AssociatedObjectClass Shipment
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Shipment
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Shipment
     */
    public $Shipment;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Ordered Shipment. Package
     * @Definition An association to Package.
     * @Cardinality 0..n
     * @ObjectClass Ordered Shipment
     * @PropertyTerm Package
     * @AssociatedObjectClass Package
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Package
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Package
     */
    public $Package;
} // end class OrderedShipmentType
