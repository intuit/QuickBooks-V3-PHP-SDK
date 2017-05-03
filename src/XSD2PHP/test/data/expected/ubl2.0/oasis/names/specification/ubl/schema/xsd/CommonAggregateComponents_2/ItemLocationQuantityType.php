<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ItemLocationQuantityType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ItemLocationQuantityType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Item Location Quantity. Details
 * @xmlDefinition Information about the properties of an item as they relate to specific quantities and/or specific locations.
 * @xmlObjectClass Item Location Quantity
 */
class ItemLocationQuantityType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item Location Quantity. Lead Time. Measure
     * @Definition The time taken from the time of order to the time of delivery for an item.
     * @Cardinality 0..1
     * @ObjectClass Item Location Quantity
     * @PropertyTerm Lead Time
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @Examples "2 days", "24 hours"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LeadTimeMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LeadTimeMeasure
     */
    public $LeadTimeMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item Location Quantity. Minimum_ Quantity. Quantity
     * @Definition The minimum quantity that can be ordered to qualify for a specific price.
     * @Cardinality 0..1
     * @ObjectClass Item Location Quantity
     * @PropertyTermQualifier Minimum
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @Examples "10 boxes", "1 carton", "1000 sheets"
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
     * @DictionaryEntryName Item Location Quantity. Maximum_ Quantity. Quantity
     * @Definition The maximum quantity that can be ordered to qualify for a specific price.
     * @Cardinality 0..1
     * @ObjectClass Item Location Quantity
     * @PropertyTermQualifier Maximum
     * @PropertyTerm Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @Examples "10 boxes", "1 carton", "1000 sheets"
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
     * @DictionaryEntryName Item Location Quantity. Hazardous Risk_ Indicator. Indicator
     * @Definition Indicates whether the item as delivered, in the stated quantity to the stated location, is hazardous.
     * @Cardinality 0..1
     * @ObjectClass Item Location Quantity
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
     * @DictionaryEntryName Item Location Quantity. Trading Restrictions. Text
     * @Definition A description of trade restrictions that apply to the item or quantities of the item.
     * @Cardinality 0..n
     * @ObjectClass Item Location Quantity
     * @PropertyTerm Trading Restrictions
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "not for export"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName TradingRestrictions
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TradingRestrictions
     */
    public $TradingRestrictions;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item Location Quantity. Applicable Territory_ Address. Address
     * @Definition An association to Territory (Address).
     * @Cardinality 0..n
     * @ObjectClass Item Location Quantity
     * @PropertyTermQualifier Applicable Territory
     * @PropertyTerm Address
     * @AssociatedObjectClass Address
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ApplicableTerritoryAddress
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ApplicableTerritoryAddress
     */
    public $ApplicableTerritoryAddress;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item Location Quantity. Price
     * @Definition An association to Price.
     * @Cardinality 0..1
     * @ObjectClass Item Location Quantity
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
     * @DictionaryEntryName Item Location Quantity. Delivery Unit
     * @Definition An association to Delivery Unit.
     * @Cardinality 0..n
     * @ObjectClass Item Location Quantity
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
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item Location Quantity. Applicable_ Tax Category. Tax Category
     * @Definition An association to Tax Category.
     * @Cardinality 0..n
     * @ObjectClass Item Location Quantity
     * @PropertyTermQualifier Applicable
     * @PropertyTerm Tax Category
     * @AssociatedObjectClass Tax Category
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ApplicableTaxCategory
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ApplicableTaxCategory
     */
    public $ApplicableTaxCategory;
} // end class ItemLocationQuantityType
