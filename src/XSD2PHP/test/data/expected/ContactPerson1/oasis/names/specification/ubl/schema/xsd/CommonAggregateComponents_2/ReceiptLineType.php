<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ReceiptLineType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ReceiptLineType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Receipt Line. Details
 * @xmlDefinition Information about a Receipt Line.
 * @xmlObjectClass Receipt Line
 */
class ReceiptLineType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Receipt Line. Identifier
     * @Definition Identifies the Receipt Line.
     * @Cardinality 1
     * @ObjectClass Receipt Line
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
     * @DictionaryEntryName Receipt Line. UUID. Identifier
     * @Definition A universally unique identifier for an instance of this ABIE.
     * @Cardinality 0..1
     * @ObjectClass Receipt Line
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
     * @DictionaryEntryName Receipt Line. Note. Text
     * @Definition Free-form text applying to the Receipt Line. This element may contain notes or any other similar information that is not contained explicitly in another structure.
     * @Cardinality 0..1
     * @ObjectClass Receipt Line
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
     * @DictionaryEntryName Receipt Line. Received_ Quantity. Quantity
     * @Definition The quantity received.
     * @Cardinality 0..1
     * @ObjectClass Receipt Line
     * @PropertyTermQualifier Received
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ReceivedQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ReceivedQuantity
     */
    public $ReceivedQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Receipt Line. Short_ Quantity. Quantity
     * @Definition The quantity received short; the difference between the quantity reported despatched and the quantity actually received.
     * @Cardinality 0..1
     * @ObjectClass Receipt Line
     * @PropertyTermQualifier Short
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ShortQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ShortQuantity
     */
    public $ShortQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Receipt Line. Shortage Action Code. Code
     * @Definition The action that the Delivery Party wishes the Despatch Party to take as a result of the shortage, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Receipt Line
     * @PropertyTerm Shortage Action Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ShortageActionCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ShortageActionCode
     */
    public $ShortageActionCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Receipt Line. Rejected_ Quantity. Quantity
     * @Definition The quantity rejected.
     * @Cardinality 0..1
     * @ObjectClass Receipt Line
     * @PropertyTermQualifier Rejected
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RejectedQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RejectedQuantity
     */
    public $RejectedQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Receipt Line. Reject Reason Code. Code
     * @Definition The reason for rejection, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Receipt Line
     * @PropertyTerm Reject Reason Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RejectReasonCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RejectReasonCode
     */
    public $RejectReasonCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Receipt Line. Reject_ Reason. Text
     * @Definition The reason for rejection.
     * @Cardinality 0..1
     * @ObjectClass Receipt Line
     * @PropertyTermQualifier Reject
     * @PropertyTerm Reason
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RejectReason
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RejectReason
     */
    public $RejectReason;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Receipt Line. Reject Action Code. Code
     * @Definition The action that the Delivery Party wishes the Despatch Party to take as a result of the rejection, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Receipt Line
     * @PropertyTerm Reject Action Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RejectActionCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RejectActionCode
     */
    public $RejectActionCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Receipt Line. Oversupply Quantity. Quantity
     * @Definition The quanitity over-supplied i.e. the quantity over and above that ordered.
     * @Cardinality 0..1
     * @ObjectClass Receipt Line
     * @PropertyTerm Oversupply Quantity
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
     * @ComponentType BBIE
     * @DictionaryEntryName Receipt Line. Received_ Date. Date
     * @Definition The date on which the good/services are received.
     * @Cardinality 0..1
     * @ObjectClass Receipt Line
     * @PropertyTermQualifier Received
     * @PropertyTerm Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ReceivedDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ReceivedDate
     */
    public $ReceivedDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Receipt Line. Timing Complaint Code. Code
     * @Definition A complaint about the timing of delivery, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Receipt Line
     * @PropertyTerm Timing Complaint Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TimingComplaintCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TimingComplaintCode
     */
    public $TimingComplaintCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Receipt Line. Timing Complaint. Text
     * @Definition A complaint about the timing of delivery.
     * @Cardinality 0..1
     * @ObjectClass Receipt Line
     * @PropertyTerm Timing Complaint
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TimingComplaint
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TimingComplaint
     */
    public $TimingComplaint;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Receipt Line. Order Line Reference
     * @Definition An association to Order Line Reference.
     * @Cardinality 0..1
     * @ObjectClass Receipt Line
     * @PropertyTerm Order Line Reference
     * @AssociatedObjectClass Order Line Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OrderLineReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OrderLineReference
     */
    public $OrderLineReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Receipt Line. Despatch_ Line Reference. Line Reference
     * @Definition An associative reference to Despatch Line.
     * @Cardinality 0..n
     * @ObjectClass Receipt Line
     * @PropertyTermQualifier Despatch
     * @PropertyTerm Line Reference
     * @AssociatedObjectClass Line Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName DespatchLineReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DespatchLineReference
     */
    public $DespatchLineReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Receipt Line. Document Reference
     * @Definition An association to Document Reference.
     * @Cardinality 0..n
     * @ObjectClass Receipt Line
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
     * @DictionaryEntryName Receipt Line. Item
     * @Definition An association to Item.
     * @Cardinality 0..n
     * @ObjectClass Receipt Line
     * @PropertyTerm Item
     * @AssociatedObjectClass Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Item
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Item
     */
    public $Item;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Receipt Line. Shipment
     * @Definition An association to Shipment.
     * @Cardinality 0..n
     * @ObjectClass Receipt Line
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
} // end class ReceiptLineType
