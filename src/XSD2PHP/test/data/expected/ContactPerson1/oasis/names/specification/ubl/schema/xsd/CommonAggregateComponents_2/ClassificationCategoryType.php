<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ClassificationCategoryType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ClassificationCategoryType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Classification Category. Details
 * @xmlDefinition Information about a Classification Category; a subdivision of a Classification Scheme.
 * @xmlObjectClass Classification Category
 */
class ClassificationCategoryType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Classification Category. Name
     * @Definition The name of the Classification Category.
     * @Cardinality 0..1
     * @ObjectClass Classification Category
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @AlternativeBusinessTerms Code List Name
     * @Examples "UNSPSC Class", "UNSPSC Segment", "UNSPSC Family"
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
     * @DictionaryEntryName Classification Category. Code Value. Text
     * @Definition The Classification Category value.
     * @Cardinality 0..1
     * @ObjectClass Classification Category
     * @PropertyTerm Code Value
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms Code Value
     * @Examples 3420001, 3273666, HSJJD-213
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CodeValue
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CodeValue
     */
    public $CodeValue;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Classification Category. Description. Text
     * @Definition The description of the Classification Category.
     * @Cardinality 0..n
     * @ObjectClass Classification Category
     * @PropertyTerm Description
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms Code Name
     * @Examples "Electrical Goods", "Wooden Toys"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Description
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Description
     */
    public $Description;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Classification Category. Categorizes_ Classification Category. Classification Category
     * @Definition An association to subcategories within the Category.
     * @Cardinality 0..n
     * @ObjectClass Classification Category
     * @PropertyTermQualifier Categorizes
     * @PropertyTerm Classification Category
     * @AssociatedObjectClass Classification Category
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName CategorizesClassificationCategory
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CategorizesClassificationCategory
     */
    public $CategorizesClassificationCategory;
} // end class ClassificationCategoryType
