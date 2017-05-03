<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName OrderLineType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OrderLineType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Order Line. Details
 * @xmlDefinition Information about an Order Line.
 * @xmlObjectClass Order Line
 */
class OrderLineType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order Line. Substitution Status Code. Code
     * @Definition A code indicating the substitution status of the Order Line. Order Line may indicate that a substitute is proposed by the buyer or by the seller (in Order Response) or that a substitution has been made by the seller (in Order Response).
     * @Cardinality 0..1
     * @ObjectClass Order Line
     * @PropertyTerm Substitution Status Code
     * @RepresentationTerm Code
     * @DataType Substitution Status_ Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SubstitutionStatusCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SubstitutionStatusCode
     */
    public $SubstitutionStatusCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order Line. Note. Text
     * @Definition Free-form text applying to the Order Line. This element may contain notes or any other similar information that is not contained explicitly in another structure.
     * @Cardinality 0..1
     * @ObjectClass Order Line
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
     * @ComponentType ASBIE
     * @DictionaryEntryName Order Line. Line Item
     * @Definition An association to Line Item.
     * @Cardinality 1
     * @ObjectClass Order Line
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
     * @DictionaryEntryName Order Line. Seller Proposed Substitute_ Line Item. Line Item
     * @Definition Substitute Line Items proposed by the seller (in Order Response).
     * @Cardinality 0..n
     * @ObjectClass Order Line
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
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order Line. Seller Substituted_ Line Item. Line Item
     * @Definition Item(s) replaced by the seller.  The original ordered quantity and pricing may be different from the substituted item. However, when an item is substituted by the seller, it is assumed that other information, such as shipment details, will be the same.
     * @Cardinality 0..n
     * @ObjectClass Order Line
     * @PropertyTermQualifier Seller Substituted
     * @PropertyTerm Line Item
     * @AssociatedObjectClass Line Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName SellerSubstitutedLineItem
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\SellerSubstitutedLineItem
     */
    public $SellerSubstitutedLineItem;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order Line. Buyer Proposed Substitute_ Line Item. Line Item
     * @Definition Possible alternatives, proposed by the buyer, to the Line Item.
     * @Cardinality 0..n
     * @ObjectClass Order Line
     * @PropertyTermQualifier Buyer Proposed Substitute
     * @PropertyTerm Line Item
     * @AssociatedObjectClass Line Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName BuyerProposedSubstituteLineItem
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\BuyerProposedSubstituteLineItem
     */
    public $BuyerProposedSubstituteLineItem;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order Line. Catalogue_ Line Reference. Line Reference
     * @Definition An associative reference to Catalogue Line.
     * @Cardinality 0..1
     * @ObjectClass Order Line
     * @PropertyTermQualifier Catalogue
     * @PropertyTerm Line Reference
     * @AssociatedObjectClass Line Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CatalogueLineReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CatalogueLineReference
     */
    public $CatalogueLineReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order Line. Quotation_ Line Reference. Line Reference
     * @Definition an associative reference to Quotation Line.
     * @Cardinality 0..1
     * @ObjectClass Order Line
     * @PropertyTermQualifier Quotation
     * @PropertyTerm Line Reference
     * @AssociatedObjectClass Line Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName QuotationLineReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\QuotationLineReference
     */
    public $QuotationLineReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order Line. Document Reference
     * @Definition An association to Document Reference.
     * @Cardinality 0..n
     * @ObjectClass Order Line
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
} // end class OrderLineType
