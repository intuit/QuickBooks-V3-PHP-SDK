<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ItemType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ItemType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Item. Details
 * @xmlDefinition Information directly relating to an item.
 * @xmlObjectClass Item
 * @xmlAlternativeBusinessTerms article, product, goods item
 */
class ItemType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item. Description. Text
     * @Definition Free-form field that can be used to give a text description of the item.
     * @Cardinality 0..n
     * @ObjectClass Item
     * @PropertyTerm Description
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Description
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Description
     */
    public $Description;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item. Pack Quantity. Quantity
     * @Definition The unit packaging quantity.
     * @Cardinality 0..1
     * @ObjectClass Item
     * @PropertyTerm Pack Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PackQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PackQuantity
     */
    public $PackQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item. Pack Size. Numeric
     * @Definition The number of items in a pack.
     * @Cardinality 0..1
     * @ObjectClass Item
     * @PropertyTerm Pack Size
     * @RepresentationTerm Numeric
     * @DataType Numeric. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PackSizeNumeric
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PackSizeNumeric
     */
    public $PackSizeNumeric;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item. Catalogue_ Indicator. Indicator
     * @Definition Indicates whether the item was ordered from a Catalogue (true) or not (false).
     * @Cardinality 0..1
     * @ObjectClass Item
     * @PropertyTermQualifier Catalogue
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CatalogueIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CatalogueIndicator
     */
    public $CatalogueIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item. Name
     * @Definition A short name optionally given to an item, such as a name from a Catalogue, as distinct from a description.
     * @Cardinality 0..1
     * @ObjectClass Item
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Name
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Name
     */
    public $Name;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item. Hazardous Risk_ Indicator. Indicator
     * @Definition Indicates whether the item as delivered is hazardous.
     * @Cardinality 0..1
     * @ObjectClass Item
     * @PropertyTermQualifier Hazardous Risk
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @Examples Default is negative
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName HazardousRiskIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\HazardousRiskIndicator
     */
    public $HazardousRiskIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item. Additional_ Information. Text
     * @Definition Provides more details of the item (e.g., the URL of a relevant web page).
     * @Cardinality 0..1
     * @ObjectClass Item
     * @PropertyTermQualifier Additional
     * @PropertyTerm Information
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AdditionalInformation
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AdditionalInformation
     */
    public $AdditionalInformation;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item. Keyword. Text
     * @Definition A Seller Party-defined search string for the item. Also could be synonyms for identifying the item.
     * @Cardinality 0..n
     * @ObjectClass Item
     * @PropertyTerm Keyword
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Keyword
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Keyword
     */
    public $Keyword;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item. Brand Name. Name
     * @Definition Brand name for the item.
     * @Cardinality 0..n
     * @ObjectClass Item
     * @PropertyTerm Brand Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @Examples Coca-Cola
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName BrandName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\BrandName
     */
    public $BrandName;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item. Model Name. Name
     * @Definition Model name for the item.
     * @Cardinality 0..n
     * @ObjectClass Item
     * @PropertyTerm Model Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @Examples "VW Beetle"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ModelName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ModelName
     */
    public $ModelName;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Buyers_ Item Identification. Item Identification
     * @Definition Associates the item with its identification according to the buyer's system.
     * @Cardinality 0..1
     * @ObjectClass Item
     * @PropertyTermQualifier Buyers
     * @PropertyTerm Item Identification
     * @AssociatedObjectClass Item Identification
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName BuyersItemIdentification
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\BuyersItemIdentification
     */
    public $BuyersItemIdentification;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Sellers_ Item Identification. Item Identification
     * @Definition Associates the item with its identification according to the seller's system.
     * @Cardinality 0..1
     * @ObjectClass Item
     * @PropertyTermQualifier Sellers
     * @PropertyTerm Item Identification
     * @AssociatedObjectClass Item Identification
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SellersItemIdentification
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\SellersItemIdentification
     */
    public $SellersItemIdentification;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Manufacturers_ Item Identification. Item Identification
     * @Definition Associates the item with its identification according to the manufacturer's system.
     * @Cardinality 0..n
     * @ObjectClass Item
     * @PropertyTermQualifier Manufacturers
     * @PropertyTerm Item Identification
     * @AssociatedObjectClass Item Identification
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ManufacturersItemIdentification
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ManufacturersItemIdentification
     */
    public $ManufacturersItemIdentification;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Standard_ Item Identification. Item Identification
     * @Definition Associates the item with its identification according to a standard system.
     * @Cardinality 0..1
     * @ObjectClass Item
     * @PropertyTermQualifier Standard
     * @PropertyTerm Item Identification
     * @AssociatedObjectClass Item Identification
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName StandardItemIdentification
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\StandardItemIdentification
     */
    public $StandardItemIdentification;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Catalogue_ Item Identification. Item Identification
     * @Definition Associates the item with its identification according to a cataloguing system.
     * @Cardinality 0..1
     * @ObjectClass Item
     * @PropertyTermQualifier Catalogue
     * @PropertyTerm Item Identification
     * @AssociatedObjectClass Item Identification
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CatalogueItemIdentification
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CatalogueItemIdentification
     */
    public $CatalogueItemIdentification;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Additional_ Item Identification. Item Identification
     * @Definition Associates the item with other identification means.
     * @Cardinality 0..n
     * @ObjectClass Item
     * @PropertyTermQualifier Additional
     * @PropertyTerm Item Identification
     * @AssociatedObjectClass Item Identification
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName AdditionalItemIdentification
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AdditionalItemIdentification
     */
    public $AdditionalItemIdentification;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Catalogue_ Document Reference. Document Reference
     * @Definition An associative reference to Catalogue.
     * @Cardinality 0..1
     * @ObjectClass Item
     * @PropertyTermQualifier Catalogue
     * @PropertyTerm Document Reference
     * @AssociatedObjectClass Document Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CatalogueDocumentReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CatalogueDocumentReference
     */
    public $CatalogueDocumentReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Item Specification_ Document Reference. Document Reference
     * @Definition An associative reference to a document providing Item specification.
     * @Cardinality 0..n
     * @ObjectClass Item
     * @PropertyTermQualifier Item Specification
     * @PropertyTerm Document Reference
     * @AssociatedObjectClass Document Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ItemSpecificationDocumentReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ItemSpecificationDocumentReference
     */
    public $ItemSpecificationDocumentReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Origin_ Country. Country
     * @Definition Associates the item with its country of origin.
     * @Cardinality 0..1
     * @ObjectClass Item
     * @PropertyTermQualifier Origin
     * @PropertyTerm Country
     * @AssociatedObjectClass Country
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OriginCountry
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OriginCountry
     */
    public $OriginCountry;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Commodity Classification
     * @Definition Associates the item with its classification(s) according to a commodity classifying system.
     * @Cardinality 0..n
     * @ObjectClass Item
     * @PropertyTerm Commodity Classification
     * @AssociatedObjectClass Commodity Classification
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName CommodityClassification
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CommodityClassification
     */
    public $CommodityClassification;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Transaction Conditions
     * @Definition Associates the item with sales conditions appertaining to it.
     * @Cardinality 0..n
     * @ObjectClass Item
     * @PropertyTerm Transaction Conditions
     * @AssociatedObjectClass Transaction Conditions
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName TransactionConditions
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransactionConditions
     */
    public $TransactionConditions;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Hazardous Item
     * @Definition Associates the item with its hazardous item information.
     * @Cardinality 0..n
     * @ObjectClass Item
     * @PropertyTerm Hazardous Item
     * @AssociatedObjectClass Hazardous Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName HazardousItem
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\HazardousItem
     */
    public $HazardousItem;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Classified_ Tax Category. Tax Category
     * @Definition Classifies the item using one or more categories of taxes.
     * @Cardinality 0..n
     * @ObjectClass Item
     * @PropertyTermQualifier Classified
     * @PropertyTerm Tax Category
     * @AssociatedObjectClass Tax Category
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ClassifiedTaxCategory
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ClassifiedTaxCategory
     */
    public $ClassifiedTaxCategory;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Additional_ Item Property. Item Property
     * @Definition Associates the item with a set of additional properties.
     * @Cardinality 0..n
     * @ObjectClass Item
     * @PropertyTermQualifier Additional
     * @PropertyTerm Item Property
     * @AssociatedObjectClass Item Property
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName AdditionalItemProperty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AdditionalItemProperty
     */
    public $AdditionalItemProperty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Manufacturer_ Party. Party
     * @Definition Associates the item with its manufacturer.
     * @Cardinality 0..n
     * @ObjectClass Item
     * @PropertyTermQualifier Manufacturer
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ManufacturerParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ManufacturerParty
     */
    public $ManufacturerParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Information Content Provider_ Party. Party
     * @Definition Associates the item with the party responsible for the its specification.
     * @Cardinality 0..1
     * @ObjectClass Item
     * @PropertyTermQualifier Information Content Provider
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName InformationContentProviderParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\InformationContentProviderParty
     */
    public $InformationContentProviderParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Origin_ Address. Address
     * @Definition Associates the item with the region of origin (not the country).
     * @Cardinality 0..n
     * @ObjectClass Item
     * @PropertyTermQualifier Origin
     * @PropertyTerm Address
     * @AssociatedObjectClass Address
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName OriginAddress
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OriginAddress
     */
    public $OriginAddress;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item. Item Instance
     * @Definition An association to Item Instance.
     * @Cardinality 0..n
     * @ObjectClass Item
     * @PropertyTerm Item Instance
     * @AssociatedObjectClass Item Instance
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ItemInstance
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ItemInstance
     */
    public $ItemInstance;
} // end class ItemType
