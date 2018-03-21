<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName CatalogueLineType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CatalogueLineType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Catalogue Line. Details
 * @xmlDefinition The basic element of Catalogue; something that can be bought.
 * @xmlObjectClass Catalogue Line
 */
class CatalogueLineType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Line. Identifier
     * @Definition A unique instance identifier for the line in this Catalogue document.
     * @Cardinality 1
     * @ObjectClass Catalogue Line
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
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Line. Action Code. Code
     * @Definition Code indicating the action required for this item to synchronize with external repositories.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Line
     * @PropertyTerm Action Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @Examples "Replace", "Update", "Delete","Add"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ActionCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ActionCode
     */
    public $ActionCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Line. Life Cycle Status Code. Code
     * @Definition Code indicating availability of this line.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Line
     * @PropertyTerm Life Cycle Status Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @Examples "new - announcement only", "new and available", "deleted - announcement only"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LifeCycleStatusCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LifeCycleStatusCode
     */
    public $LifeCycleStatusCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Line. Contract Subdivision. Text
     * @Definition Identifies a subdivision of a contract or tender.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Line
     * @PropertyTerm Contract Subdivision
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "Installation", "Phase One", Support and Maintenance"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ContractSubdivision
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ContractSubdivision
     */
    public $ContractSubdivision;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Line. Note. Text
     * @Definition Free-text note used for non-structured information about the line in the specific Catalogue document (intended to be human readable).
     * @Cardinality 0..n
     * @ObjectClass Catalogue Line
     * @PropertyTerm Note
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Note
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Note
     */
    public $Note;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Line. Orderable_ Indicator. Indicator
     * @Definition Indicates whether the line is orderable (that is, not just for information only).
     * @Cardinality 0..1
     * @ObjectClass Catalogue Line
     * @PropertyTermQualifier Orderable
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @Examples TRUE means orderable, FALSE means not orderable
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OrderableIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\OrderableIndicator
     */
    public $OrderableIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Line. Orderable_ Unit. Text
     * @Definition The unit that can be ordered.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Line
     * @PropertyTermQualifier Orderable
     * @PropertyTerm Unit
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OrderableUnit
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\OrderableUnit
     */
    public $OrderableUnit;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Line. Content Unit. Quantity
     * @Definition The quantity of the order unit of measure of the line.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Line
     * @PropertyTerm Content Unit
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @Examples If order unit measure identifier is "each", then content unit quantity is "1".
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ContentUnitQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ContentUnitQuantity
     */
    public $ContentUnitQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Line. Order Quantity Increment. Numeric
     * @Definition The number of items that can set the order quantity increments.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Line
     * @PropertyTerm Order Quantity Increment
     * @RepresentationTerm Numeric
     * @DataType Numeric. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OrderQuantityIncrementNumeric
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\OrderQuantityIncrementNumeric
     */
    public $OrderQuantityIncrementNumeric;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Line. Minimum_ Order Quantity. Quantity
     * @Definition The minimum amount of items that can be ordered.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Line
     * @PropertyTermQualifier Minimum
     * @PropertyTerm Order Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @Examples "10 boxes"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MinimumOrderQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MinimumOrderQuantity
     */
    public $MinimumOrderQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Line. Maximum_ Order Quantity. Quantity
     * @Definition The maximum amount of items that can be ordered.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Line
     * @PropertyTermQualifier Maximum
     * @PropertyTerm Order Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @Examples "1 tonne"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MaximumOrderQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MaximumOrderQuantity
     */
    public $MaximumOrderQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Line. Warranty_ Information. Text
     * @Definition Information regarding the warranty for the good or service.  Warranty may be provided by any Party (can be described in the assiciation to Warranty Party).
     * @Cardinality 0..n
     * @ObjectClass Catalogue Line
     * @PropertyTermQualifier Warranty
     * @PropertyTerm Information
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "Unless specified otherwise and in addition to any rights the Customer may have under statute, Dell warrants to the Customer that Dell branded Products (excluding third party products and software), will be free from defects in materials and workmanship affecting normal use for a period of one year from invoice date ('Standard Warranty')."
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName WarrantyInformation
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\WarrantyInformation
     */
    public $WarrantyInformation;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Line. Pack Level Code. Code
     * @Definition The level of packaging involved.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Line
     * @PropertyTerm Pack Level Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms Consumer Unit, Trading Unit
     * @Examples "level 2", "Group 4"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PackLevelCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PackLevelCode
     */
    public $PackLevelCode;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Line. Contractor_ Customer Party. Customer Party
     * @Definition The Customer Party responsible for the contract to which the Catalogue relates.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Line
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
     * @DictionaryEntryName Catalogue Line. Seller_ Supplier Party. Supplier Party
     * @Definition An association to Seller of the item.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Line
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
     * @DictionaryEntryName Catalogue Line. Warranty_ Party. Party
     * @Definition The party responsible for the Warranty.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Line
     * @PropertyTermQualifier Warranty
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName WarrantyParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\WarrantyParty
     */
    public $WarrantyParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Line. Warranty Validity_ Period. Period
     * @Definition The period for which the Warranty is valid.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Line
     * @PropertyTermQualifier Warranty Validity
     * @PropertyTerm Period
     * @AssociatedObjectClass Period
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName WarrantyValidityPeriod
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\WarrantyValidityPeriod
     */
    public $WarrantyValidityPeriod;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Line. Line Validity_ Period. Period
     * @Definition The period for which the Catalogue Line is valid.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Line
     * @PropertyTermQualifier Line Validity
     * @PropertyTerm Period
     * @AssociatedObjectClass Period
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LineValidityPeriod
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LineValidityPeriod
     */
    public $LineValidityPeriod;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Line. Item Comparison
     * @Definition An association to comparative details for this Item.
     * @Cardinality 0..n
     * @ObjectClass Catalogue Line
     * @PropertyTerm Item Comparison
     * @AssociatedObjectClass Item Comparison
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ItemComparison
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ItemComparison
     */
    public $ItemComparison;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Line. Component_ Related Item. Related Item
     * @Definition An association that describes any catalogue items that may be components of this Item.
     * @Cardinality 0..n
     * @ObjectClass Catalogue Line
     * @PropertyTermQualifier Component
     * @PropertyTerm Related Item
     * @AssociatedObjectClass Related Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ComponentRelatedItem
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ComponentRelatedItem
     */
    public $ComponentRelatedItem;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Line. Accessory_ Related Item. Related Item
     * @Definition An association that describes any catalogue items that may be optional accessories to this Item.
     * @Cardinality 0..n
     * @ObjectClass Catalogue Line
     * @PropertyTermQualifier Accessory
     * @PropertyTerm Related Item
     * @AssociatedObjectClass Related Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName AccessoryRelatedItem
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AccessoryRelatedItem
     */
    public $AccessoryRelatedItem;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Line. Required_ Related Item. Related Item
     * @Definition An association that describes any catalogue items that may be required for this Item.
     * @Cardinality 0..n
     * @ObjectClass Catalogue Line
     * @PropertyTermQualifier Required
     * @PropertyTerm Related Item
     * @AssociatedObjectClass Related Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName RequiredRelatedItem
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\RequiredRelatedItem
     */
    public $RequiredRelatedItem;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Line. Replacement_ Related Item. Related Item
     * @Definition An association that describes any catalogue items that may be replacements for this Item.
     * @Cardinality 0..n
     * @ObjectClass Catalogue Line
     * @PropertyTermQualifier Replacement
     * @PropertyTerm Related Item
     * @AssociatedObjectClass Related Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ReplacementRelatedItem
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ReplacementRelatedItem
     */
    public $ReplacementRelatedItem;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Line. Complementary_ Related Item. Related Item
     * @Definition An association that describes any catalogue items that may complement this Item.
     * @Cardinality 0..n
     * @ObjectClass Catalogue Line
     * @PropertyTermQualifier Complementary
     * @PropertyTerm Related Item
     * @AssociatedObjectClass Related Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ComplementaryRelatedItem
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ComplementaryRelatedItem
     */
    public $ComplementaryRelatedItem;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Line. Required_ Item Location Quantity. Item Location Quantity
     * @Definition An association to the description of properties related to locations and quantities of the Item.
     * @Cardinality 0..n
     * @ObjectClass Catalogue Line
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
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Line. Document Reference
     * @Definition An association to Document Reference.
     * @Cardinality 0..n
     * @ObjectClass Catalogue Line
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
     * @DictionaryEntryName Catalogue Line. Item
     * @Definition An association to the Item itself.
     * @Cardinality 1
     * @ObjectClass Catalogue Line
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
} // end class CatalogueLineType
