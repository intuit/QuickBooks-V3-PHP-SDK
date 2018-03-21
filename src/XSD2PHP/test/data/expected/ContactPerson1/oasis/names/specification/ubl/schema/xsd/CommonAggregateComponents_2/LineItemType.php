<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName LineItemType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LineItemType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Line Item. Details
 * @xmlDefinition Information about a Line Item.
 * @xmlObjectClass Line Item
 */
class LineItemType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Line Item. Identifier
     * @Definition Identifies the Line Item assigned by the buyer.
     * @Cardinality 1
     * @ObjectClass Line Item
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
     * @DictionaryEntryName Line Item. Sales_ Order Identifier. Identifier
     * @Definition The identification given to a Line by the seller.
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTermQualifier Sales
     * @PropertyTerm Order Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SalesOrderID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SalesOrderID
     */
    public $SalesOrderID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Line Item. UUID. Identifier
     * @Definition A universally unique identifier for an instance of this ABIE.
     * @Cardinality 0..1
     * @ObjectClass Line Item
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
     * @DictionaryEntryName Line Item. Note. Text
     * @Definition Free-form text applying to the Line Item. This element may contain notes or any other similar information that is not contained explicitly in another structure.
     * @Cardinality 0..1
     * @ObjectClass Line Item
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
     * @DictionaryEntryName Line Item. Line Status Code. Code
     * @Definition Identifies the status of the Line with respect to its original state.
     * @Cardinality 0..1
     * @ObjectClass Line Item
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
     * @DictionaryEntryName Line Item. Quantity
     * @Definition The quantity of Items for the Line Item.
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Quantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Quantity
     */
    public $Quantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Line Item. Line Extension Amount. Amount
     * @Definition The total amount for the Line Item, including Allowance Charges but net of taxes.
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTerm Line Extension Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LineExtensionAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LineExtensionAmount
     */
    public $LineExtensionAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Line Item. Total_ Tax Amount. Amount
     * @Definition The total tax amount for the Line Item.
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTermQualifier Total
     * @PropertyTerm Tax Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TotalTaxAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TotalTaxAmount
     */
    public $TotalTaxAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Line Item. Minimum_ Quantity. Quantity
     * @Definition The minimum quantity for the Item on the Line.
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTermQualifier Minimum
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MinimumQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MinimumQuantity
     */
    public $MinimumQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Line Item. Maximum_ Quantity. Quantity
     * @Definition The maximum quantity for the Item on the Line.
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTermQualifier Maximum
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MaximumQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MaximumQuantity
     */
    public $MaximumQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Line Item. Minimum_ Backorder. Quantity
     * @Definition The minimum back order quantity (where back order is allowed).
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTermQualifier Minimum
     * @PropertyTerm Backorder
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MinimumBackorderQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MinimumBackorderQuantity
     */
    public $MinimumBackorderQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Line Item. Maximum_ Backorder. Quantity
     * @Definition The maximum back order quantity (where back order is allowed).
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTermQualifier Maximum
     * @PropertyTerm Backorder
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MaximumBackorderQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MaximumBackorderQuantity
     */
    public $MaximumBackorderQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Line Item. Inspection Method. Code
     * @Definition Inspection requirements for a Line Item, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTerm Inspection Method
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName InspectionMethodCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\InspectionMethodCode
     */
    public $InspectionMethodCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Line Item. Partial Delivery Indicator. Indicator
     * @Definition Indicates whether a partial delivery is allowed.
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTerm Partial Delivery Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PartialDeliveryIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PartialDeliveryIndicator
     */
    public $PartialDeliveryIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Line Item. Back Order Allowed Indicator. Indicator
     * @Definition Indicates whether back order is allowed.
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTerm Back Order Allowed Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName BackOrderAllowedIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\BackOrderAllowedIndicator
     */
    public $BackOrderAllowedIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Line Item. Accounting Cost Code. Code
     * @Definition The buyer's accounting code applied to the Line Item.
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTerm Accounting Cost Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AccountingCostCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AccountingCostCode
     */
    public $AccountingCostCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Line Item. Accounting Cost. Text
     * @Definition The buyer's accounting code applied to the Line Item, expressed as text.
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTerm Accounting Cost
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AccountingCost
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AccountingCost
     */
    public $AccountingCost;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Line Item. Delivery
     * @Definition An association to Delivery.
     * @Cardinality 0..n
     * @ObjectClass Line Item
     * @PropertyTerm Delivery
     * @AssociatedObjectClass Delivery
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Delivery
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Delivery
     */
    public $Delivery;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Line Item. Delivery Terms
     * @Definition An association to Delivery Terms.
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTerm Delivery Terms
     * @AssociatedObjectClass Delivery Terms
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DeliveryTerms
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DeliveryTerms
     */
    public $DeliveryTerms;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Line Item. Originator_ Party. Party
     * @Definition The party who originated Order.
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTermQualifier Originator
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OriginatorParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OriginatorParty
     */
    public $OriginatorParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Line Item. Ordered Shipment
     * @Definition An association to Ordered Shipment.
     * @Cardinality 0..n
     * @ObjectClass Line Item
     * @PropertyTerm Ordered Shipment
     * @AssociatedObjectClass Ordered Shipment
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName OrderedShipment
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OrderedShipment
     */
    public $OrderedShipment;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Line Item. Pricing Reference
     * @Definition An association to Pricing Reference.
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTerm Pricing Reference
     * @AssociatedObjectClass Pricing Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PricingReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PricingReference
     */
    public $PricingReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Line Item. Allowance Charge
     * @Definition An association to Allowance Charge.
     * @Cardinality 0..n
     * @ObjectClass Line Item
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
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Line Item. Price
     * @Definition An association to Price.
     * @Cardinality 0..1
     * @ObjectClass Line Item
     * @PropertyTerm Price
     * @AssociatedObjectClass Price
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Price
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Price
     */
    public $Price;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Line Item. Item
     * @Definition An association to Item.
     * @Cardinality 1
     * @ObjectClass Line Item
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
} // end class LineItemType
