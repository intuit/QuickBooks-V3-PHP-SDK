<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName QuotationLineType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\QuotationLineType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Quotation Line. Details
 * @xmlDefinition Information about a Quotation Line.
 * @xmlObjectClass Quotation Line
 */
class QuotationLineType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Quotation Line. Identifier
     * @Definition Identifies the Quotation Line Item.
     * @Cardinality 0..1
     * @ObjectClass Quotation Line
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
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
     * @DictionaryEntryName Quotation Line. Note. Text
     * @Definition Free-form text applying to the Quotation Line. This element may contain notes or any other similar information that is not contained explicitly in another structure.
     * @Cardinality 0..1
     * @ObjectClass Quotation Line
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
     * @DictionaryEntryName Quotation Line. Quantity
     * @Definition The quantity of the item quoted.
     * @Cardinality 0..1
     * @ObjectClass Quotation Line
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
     * @DictionaryEntryName Quotation Line. Line Extension Amount. Amount
     * @Definition The total amount for the Quotation Line, including Allowance Charges but net of taxes.
     * @Cardinality 0..1
     * @ObjectClass Quotation Line
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
     * @DictionaryEntryName Quotation Line. Total_ Tax Amount. Amount
     * @Definition The total tax amount for the Quotation Line.
     * @Cardinality 0..1
     * @ObjectClass Quotation Line
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
     * @ComponentType ASBIE
     * @DictionaryEntryName Quotation Line. Document Reference
     * @Definition An association to Document Reference.
     * @Cardinality 0..n
     * @ObjectClass Quotation Line
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
     * @DictionaryEntryName Quotation Line. Line Item
     * @Definition An association to Line Item.
     * @Cardinality 1
     * @ObjectClass Quotation Line
     * @PropertyTerm Line Item
     * @AssociatedObjectClass Line Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName LineItem
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LineItem
     */
    public $LineItem;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Quotation Line. Seller Proposed Substitute_ Line Item. Line Item
     * @Definition An association to a proposed substitute Line Item.
     * @Cardinality 0..n
     * @ObjectClass Quotation Line
     * @PropertyTermQualifier Seller Proposed Substitute
     * @PropertyTerm Line Item
     * @AssociatedObjectClass Line Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName SellerProposedSubstituteLineItem
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\SellerProposedSubstituteLineItem
     */
    public $SellerProposedSubstituteLineItem;
} // end class QuotationLineType
