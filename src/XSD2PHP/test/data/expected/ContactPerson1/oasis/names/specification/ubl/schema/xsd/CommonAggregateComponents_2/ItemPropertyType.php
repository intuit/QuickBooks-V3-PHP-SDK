<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ItemPropertyType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ItemPropertyType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Item Property. Details
 * @xmlDefinition Information about specific Item Properties.
 * @xmlObjectClass Item Property
 */
class ItemPropertyType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item Property. Name
     * @Definition The name of the Item Property.
     * @Cardinality 1
     * @ObjectClass Item Property
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @Examples "Energy Rating", "Collar Size", "Fat Content"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Name
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Name
     */
    public $Name;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item Property. Value. Text
     * @Definition The Item Property value.
     * @Cardinality 1
     * @ObjectClass Item Property
     * @PropertyTerm Value
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "100 watts", "15 European", "20% +/- 5%"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Value
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Value
     */
    public $Value;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item Property. Usability_ Period. Period
     * @Definition The period for which the Item Property is valid.
     * @Cardinality 0..1
     * @ObjectClass Item Property
     * @PropertyTermQualifier Usability
     * @PropertyTerm Period
     * @AssociatedObjectClass Period
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName UsabilityPeriod
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\UsabilityPeriod
     */
    public $UsabilityPeriod;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item Property. Item Property Group
     * @Definition An association to Item Property Group.
     * @Cardinality 0..n
     * @ObjectClass Item Property
     * @PropertyTerm Item Property Group
     * @AssociatedObjectClass Item Property Group
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ItemPropertyGroup
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ItemPropertyGroup
     */
    public $ItemPropertyGroup;
} // end class ItemPropertyType
