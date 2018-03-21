<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName CataloguePricingUpdateLineType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CataloguePricingUpdateLineType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Catalogue Pricing Update Line. Details
 * @xmlDefinition Details of Catalogue Line Pricing.
 * @xmlObjectClass Catalogue Pricing Update Line
 */
class CataloguePricingUpdateLineType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Pricing Update Line. Identifier
     * @Definition A unique instance identifier for the line in this Catalogue document.
     * @Cardinality 1
     * @ObjectClass Catalogue Pricing Update Line
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "1"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName ID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ID
     */
    public $ID;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Pricing Update Line. Contractor_ Customer Party. Customer Party
     * @Definition The Customer Party responsible for the contract to which the Catalogue relates.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Pricing Update Line
     * @PropertyTermQualifier Contractor
     * @PropertyTerm Customer Party
     * @AssociatedObjectClass Customer Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ContractorCustomerParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ContractorCustomerParty
     */
    public $ContractorCustomerParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Pricing Update Line. Seller_ Supplier Party. Supplier Party
     * @Definition An association to the Seller of the Item.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Pricing Update Line
     * @PropertyTermQualifier Seller
     * @PropertyTerm Supplier Party
     * @AssociatedObjectClass Supplier Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SellerSupplierParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\SellerSupplierParty
     */
    public $SellerSupplierParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Pricing Update Line. Required_ Item Location Quantity. Item Location Quantity
     * @Definition An association to the description of properties related to locations and quantities of the item.
     * @Cardinality 0..n
     * @ObjectClass Catalogue Pricing Update Line
     * @PropertyTermQualifier Required
     * @PropertyTerm Item Location Quantity
     * @AssociatedObjectClass Item Location Quantity
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName RequiredItemLocationQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\RequiredItemLocationQuantity
     */
    public $RequiredItemLocationQuantity;
} // end class CataloguePricingUpdateLineType
