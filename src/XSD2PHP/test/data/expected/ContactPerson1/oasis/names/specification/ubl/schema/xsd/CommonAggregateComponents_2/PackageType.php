<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName PackageType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PackageType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Package. Details
 * @xmlDefinition Information about a package.
 * @xmlObjectClass Package
 */
class PackageType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Package. Identifier
     * @Definition Identifies the package.
     * @Cardinality 0..1
     * @ObjectClass Package
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
     * @DictionaryEntryName Package. Quantity
     * @Definition The quantity (of items) contained in the package.
     * @Cardinality 0..1
     * @ObjectClass Package
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
     * @DictionaryEntryName Package. Returnable Material_ Indicator. Indicator
     * @Definition Indicates whether the packaging material is returnable (true) or not (false).
     * @Cardinality 0..1
     * @ObjectClass Package
     * @PropertyTermQualifier Returnable Material
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ReturnableMaterialIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ReturnableMaterialIndicator
     */
    public $ReturnableMaterialIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Package. Package Level Code. Code
     * @Definition Code specifying a level of packaging.
     * @Cardinality 0..1
     * @ObjectClass Package
     * @PropertyTerm Package Level Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PackageLevelCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PackageLevelCode
     */
    public $PackageLevelCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Package. Packaging Type Code. Code
     * @Definition Code specifying the type of packaging of an item.
     * @Cardinality 0..1
     * @ObjectClass Package
     * @PropertyTerm Packaging Type Code
     * @RepresentationTerm Code
     * @DataType Packaging Type_ Code. Type
     * @AlternativeBusinessTerms Package classification code
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PackagingTypeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PackagingTypeCode
     */
    public $PackagingTypeCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Package. Packing Material. Text
     * @Definition Description of the type of packaging of an item.
     * @Cardinality 0..n
     * @ObjectClass Package
     * @PropertyTerm Packing Material
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName PackingMaterial
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PackingMaterial
     */
    public $PackingMaterial;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Package. Contained_ Package. Package
     * @Definition An association to Contained Package; used to describe a package within a package.
     * @Cardinality 0..n
     * @ObjectClass Package
     * @PropertyTermQualifier Contained
     * @PropertyTerm Package
     * @AssociatedObjectClass Package
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ContainedPackage
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ContainedPackage
     */
    public $ContainedPackage;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Package. Goods Item
     * @Definition An association to Goods Item.
     * @Cardinality 0..n
     * @ObjectClass Package
     * @PropertyTerm Goods Item
     * @AssociatedObjectClass Goods Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName GoodsItem
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\GoodsItem
     */
    public $GoodsItem;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Package. Measurement_ Dimension. Dimension
     * @Definition An association to describe the measurement dimensions of the package.
     * @Cardinality 0..n
     * @ObjectClass Package
     * @PropertyTermQualifier Measurement
     * @PropertyTerm Dimension
     * @AssociatedObjectClass Dimension
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName MeasurementDimension
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\MeasurementDimension
     */
    public $MeasurementDimension;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Package. Delivery Unit
     * @Definition An association to Delivery Units in the package.
     * @Cardinality 0..n
     * @ObjectClass Package
     * @PropertyTerm Delivery Unit
     * @AssociatedObjectClass Delivery Unit
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName DeliveryUnit
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DeliveryUnit
     */
    public $DeliveryUnit;
} // end class PackageType
