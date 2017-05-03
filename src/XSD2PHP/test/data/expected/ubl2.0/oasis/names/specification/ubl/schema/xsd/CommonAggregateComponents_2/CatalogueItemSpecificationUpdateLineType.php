<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName CatalogueItemSpecificationUpdateLineType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CatalogueItemSpecificationUpdateLineType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Catalogue Item Specification Update Line. Details
 * @xmlDefinition Details of Catalogue Line Item Specification.
 * @xmlObjectClass Catalogue Item Specification Update Line
 */
class CatalogueItemSpecificationUpdateLineType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Item Specification Update Line. Identifier
     * @Definition A unique instance identifier for the line in this Catalogue document.
     * @Cardinality 1
     * @ObjectClass Catalogue Item Specification Update Line
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
     * @DictionaryEntryName Catalogue Item Specification Update Line. Contractor_ Customer Party. Customer Party
     * @Definition The Customer Party responsible for the contract to which the Catalogue relates.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Item Specification Update Line
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
     * @DictionaryEntryName Catalogue Item Specification Update Line. Seller_ Supplier Party. Supplier Party
     * @Definition An association to the Seller of the item.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Item Specification Update Line
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
     * @DictionaryEntryName Catalogue Item Specification Update Line. Item
     * @Definition An association to Item itself.
     * @Cardinality 1
     * @ObjectClass Catalogue Item Specification Update Line
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
} // end class CatalogueItemSpecificationUpdateLineType
