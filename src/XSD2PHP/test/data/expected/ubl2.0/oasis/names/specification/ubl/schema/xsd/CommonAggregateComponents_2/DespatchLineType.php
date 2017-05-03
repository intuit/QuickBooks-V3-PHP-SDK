<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName DespatchLineType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DespatchLineType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Despatch Line. Details
 * @xmlDefinition Information about a Despatch Line.
 * @xmlObjectClass Despatch Line
 */
class DespatchLineType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Despatch Line. Identifier
     * @Definition Identifies the Despatch Line.
     * @Cardinality 1
     * @ObjectClass Despatch Line
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
     * @DictionaryEntryName Despatch Line. UUID. Identifier
     * @Definition A universally unique identifier for an instance of this ABIE.
     * @Cardinality 0..1
     * @ObjectClass Despatch Line
     * @PropertyTerm UUID
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName UUID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\UUID
     */
    public $UUID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Despatch Line. Note. Text
     * @Definition Free-form text applying to the Despatch Line. This element may contain notes or any other similar information that is not contained explicitly in another structure.
     * @Cardinality 0..1
     * @ObjectClass Despatch Line
     * @PropertyTerm Note
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Note
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Note
     */
    public $Note;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Despatch Line. Line Status Code. Code
     * @Definition Identifies the status of the Despatch Line with respect to its original state.
     * @Cardinality 0..1
     * @ObjectClass Despatch Line
     * @PropertyTerm Line Status Code
     * @RepresentationTerm Code
     * @DataType Line Status_ Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LineStatusCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LineStatusCode
     */
    public $LineStatusCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Despatch Line. Delivered_ Quantity. Quantity
     * @Definition The quantity despatched.
     * @Cardinality 0..1
     * @ObjectClass Despatch Line
     * @PropertyTermQualifier Delivered
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DeliveredQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DeliveredQuantity
     */
    public $DeliveredQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Despatch Line. Backorder_ Quantity. Quantity
     * @Definition The quantity on Back Order at the Supplier.
     * @Cardinality 0..1
     * @ObjectClass Despatch Line
     * @PropertyTermQualifier Backorder
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName BackorderQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\BackorderQuantity
     */
    public $BackorderQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Despatch Line. Backorder_ Reason. Text
     * @Definition The reason for the Back Order.
     * @Cardinality 0..1
     * @ObjectClass Despatch Line
     * @PropertyTermQualifier Backorder
     * @PropertyTerm Reason
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName BackorderReason
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\BackorderReason
     */
    public $BackorderReason;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Despatch Line. Outstanding_ Quantity. Quantity
     * @Definition The quantity outstanding (which will follow in a later despatch).
     * @Cardinality 0..1
     * @ObjectClass Despatch Line
     * @PropertyTermQualifier Outstanding
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OutstandingQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\OutstandingQuantity
     */
    public $OutstandingQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Despatch Line. Outstanding_ Reason. Text
     * @Definition The reason for the Outstanding Quantity.
     * @Cardinality 0..1
     * @ObjectClass Despatch Line
     * @PropertyTermQualifier Outstanding
     * @PropertyTerm Reason
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OutstandingReason
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\OutstandingReason
     */
    public $OutstandingReason;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Despatch Line. Oversupply_ Quantity. Quantity
     * @Definition The quantity over-supplied.
     * @Cardinality 0..1
     * @ObjectClass Despatch Line
     * @PropertyTermQualifier Oversupply
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OversupplyQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\OversupplyQuantity
     */
    public $OversupplyQuantity;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Despatch Line. Order Line Reference
     * @Definition An association to Order Line Reference.
     * @Cardinality 1..n
     * @ObjectClass Despatch Line
     * @PropertyTerm Order Line Reference
     * @AssociatedObjectClass Order Line Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs unbounded
     * @xmlName OrderLineReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OrderLineReference
     */
    public $OrderLineReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Despatch Line. Document Reference
     * @Definition An association to Document Reference.
     * @Cardinality 0..n
     * @ObjectClass Despatch Line
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
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Despatch Line. Item
     * @Definition An association to Item.
     * @Cardinality 1
     * @ObjectClass Despatch Line
     * @PropertyTerm Item
     * @AssociatedObjectClass Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Item
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Item
     */
    public $Item;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Despatch Line. Shipment
     * @Definition An association to Shipment.
     * @Cardinality 0..n
     * @ObjectClass Despatch Line
     * @PropertyTerm Shipment
     * @AssociatedObjectClass Shipment
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Shipment
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Shipment
     */
    public $Shipment;
} // end class DespatchLineType
