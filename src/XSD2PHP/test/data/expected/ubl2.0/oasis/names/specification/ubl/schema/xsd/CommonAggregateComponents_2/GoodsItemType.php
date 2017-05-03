<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName GoodsItemType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\GoodsItemType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Goods Item. Details
 * @xmlDefinition A separately identifiable quantity of products of a single product type.
 * @xmlObjectClass Goods Item
 */
class GoodsItemType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Identifier
     * @Definition An identifier for the goods item.
     * @Cardinality 1
     * @ObjectClass Goods Item
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
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
     * @DictionaryEntryName Goods Item. Sequence Number. Identifier
     * @Definition Sequence number differentiating a specific goods item within a consignment.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTerm Sequence Number
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms Customs item number (WCO ID 021), Sequence Position
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SequenceNumberID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SequenceNumberID
     */
    public $SequenceNumberID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Description. Text
     * @Definition Plain language description of a goods item sufficient to identify it for customs, statistical, or transport purposes.
     * @Cardinality 0..n
     * @ObjectClass Goods Item
     * @PropertyTerm Description
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms Description of goods (WCO ID 137)
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
     * @DictionaryEntryName Goods Item. Hazardous Risk_ Indicator. Indicator
     * @Definition Indicates whether the goods item includes hazardous items (dangerous goods).
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Hazardous Risk
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @Examples default is negative
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
     * @DictionaryEntryName Goods Item. Declared Customs_ Value. Amount
     * @Definition Amount declared for Customs purposes of those goods in a consignment which are subject to the same Customs procedure and have the same tariff/statistical heading, country information, and duty regime.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Declared Customs
     * @PropertyTerm Value
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @AlternativeBusinessTerms For Customs Value (WCO ID 108)
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DeclaredCustomsValueAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DeclaredCustomsValueAmount
     */
    public $DeclaredCustomsValueAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Declared For Carriage_ Value. Amount
     * @Definition Value declared by the shipper or his agent solely for the purpose of varying the carrier's level of liability from that provided in the contract of carriage in case of loss or damage to goods or delayed delivery.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Declared For Carriage
     * @PropertyTerm Value
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @AlternativeBusinessTerms Interest in delivery, declared value for carriage
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DeclaredForCarriageValueAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DeclaredForCarriageValueAmount
     */
    public $DeclaredForCarriageValueAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Declared Statistics_ Value. Amount
     * @Definition Value declared for statistical purposes of those goods in a consignment which have the same statistical heading.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Declared Statistics
     * @PropertyTerm Value
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @AlternativeBusinessTerms Statistical Value (WCO ID 114)
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DeclaredStatisticsValueAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DeclaredStatisticsValueAmount
     */
    public $DeclaredStatisticsValueAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Free On Board_ Value. Amount
     * @Definition Monetary amount that has to be or has been paid as calculated under the applicable trade delivery.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Free On Board
     * @PropertyTerm Value
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @AlternativeBusinessTerms FOB Value
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName FreeOnBoardValueAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\FreeOnBoardValueAmount
     */
    public $FreeOnBoardValueAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Insurance_ Value. Amount
     * @Definition The amount covered by an insurance for a particular goods item.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Insurance
     * @PropertyTerm Value
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @AlternativeBusinessTerms Value Insured
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName InsuranceValueAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\InsuranceValueAmount
     */
    public $InsuranceValueAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Value. Amount
     * @Definition Specifies the amount on which a duty, tax, or fee will be assessed.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTerm Value
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @AlternativeBusinessTerms Duty/tax/fee assessment basis in value (WCO ID 116)
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ValueAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ValueAmount
     */
    public $ValueAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Gross_ Weight. Measure
     * @Definition Weight (mass) of goods, including packaging but excluding the carrier's equipment.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Gross
     * @PropertyTerm Weight
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @AlternativeBusinessTerms Actual Gross Weight
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName GrossWeightMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\GrossWeightMeasure
     */
    public $GrossWeightMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Net_ Weight. Measure
     * @Definition Weight (mass) of goods item, excluding all packing but including any packaging that normally goes with the goods.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Net
     * @PropertyTerm Weight
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName NetWeightMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\NetWeightMeasure
     */
    public $NetWeightMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Net Net_ Weight. Measure
     * @Definition Weight (mass) of goods without any packaging.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Net Net
     * @PropertyTerm Weight
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @AlternativeBusinessTerms Customs Weight (WCO ID 128)
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName NetNetWeightMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\NetNetWeightMeasure
     */
    public $NetNetWeightMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Chargeable_ Weight. Measure
     * @Definition Gross weight (mass) on which a charge is to be based.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Chargeable
     * @PropertyTerm Weight
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ChargeableWeightMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ChargeableWeightMeasure
     */
    public $ChargeableWeightMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Gross_ Volume. Measure
     * @Definition Measurement normally arrived at by multiplying the maximum length, width, and height of the goods item.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Gross
     * @PropertyTerm Volume
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @AlternativeBusinessTerms Volume, Gross Measurement Cube (GMC), Cube (WCO ID 134)
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName GrossVolumeMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\GrossVolumeMeasure
     */
    public $GrossVolumeMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Net_ Volume. Measure
     * @Definition The volume contained by a goods item, excluding the volume of any packaging material.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Net
     * @PropertyTerm Volume
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName NetVolumeMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\NetVolumeMeasure
     */
    public $NetVolumeMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Quantity
     * @Definition Number of goods items.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
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
     * @DictionaryEntryName Goods Item. Preference Criterion. Code
     * @Definition Specifies the treatment preference for this good according to international trading agreements.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTerm Preference Criterion
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @Examples "Preference Criterion" is used in the following manner in the paper CO of another country (e.g.):
"A" - The good is "wholly obtained or produced entirely" in the territory of one or more of the NAFTA countries as reference in Article 415. Note: The purchase of a good in the territory does not necessarily render it "wholly obtained or produced".  If the good is an agricultural good, see also criterion F and Annex 703.2. (Reference: Article 401(a), 415).
"B" - ...
"C" - ...
"D" - ...
"E" - ...
"F" - The good is an originating agricultural good under preference criterion A,B, or C above and is not subjected to quantitative restriction in the importing NAFTA country because....
Thus, the column "Preference Criterion" will indicate either A, B, C,...
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PreferenceCriterionCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PreferenceCriterionCode
     */
    public $PreferenceCriterionCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Required_ Customs Identifier. Identifier
     * @Definition Additional tariff codes required to specify a type of goods for Customs, transport, statistical, or other regulatory purposes.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Required
     * @PropertyTerm Customs Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms Tariff code extensions (WCO ID 255)
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RequiredCustomsID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RequiredCustomsID
     */
    public $RequiredCustomsID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Customs Status Code. Code
     * @Definition Status of goods as identified by customs for regulation purposes.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTerm Customs Status Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms Customs status of goods (WCO ID 094)
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CustomsStatusCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CustomsStatusCode
     */
    public $CustomsStatusCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Customs Tariff Quantity. Quantity
     * @Definition Quantity of the goods in the unit as required by Customs for tariff, statistical, or fiscal purposes.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTerm Customs Tariff Quantity
     * @RepresentationTerm Quantity
     * @DataType Quantity. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CustomsTariffQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CustomsTariffQuantity
     */
    public $CustomsTariffQuantity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Goods Item. Customs Import_ Classified Indicator. Indicator
     * @Definition Indicates whether the goods have been customs classified for import.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Customs Import
     * @PropertyTerm Classified Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CustomsImportClassifiedIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CustomsImportClassifiedIndicator
     */
    public $CustomsImportClassifiedIndicator;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Goods Item. Item
     * @Definition Association to a description of the good or service.
     * @Cardinality 0..n
     * @ObjectClass Goods Item
     * @PropertyTerm Item
     * @AssociatedObjectClass Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Item
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Item
     */
    public $Item;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Goods Item. Goods Item Container
     * @Definition Association to describe the transporting of a goods item in a unit of transport equipment (e.g., container).
     * @Cardinality 0..n
     * @ObjectClass Goods Item
     * @PropertyTerm Goods Item Container
     * @AssociatedObjectClass Goods Item Container
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName GoodsItemContainer
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\GoodsItemContainer
     */
    public $GoodsItemContainer;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Goods Item. Freight_ Allowance Charge. Allowance Charge
     * @Definition Costs incurred by the shipper in moving goods, by whatever means, from one place to another under the terms of the contract of carriage. In addition to transport costs, this may include such elements as packing, documentation, loading, unloading, and insurance (to the extent that they relate to the freight costs).
     * @Cardinality 0..n
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Freight
     * @PropertyTerm Allowance Charge
     * @AssociatedObjectClass Allowance Charge
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName FreightAllowanceCharge
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\FreightAllowanceCharge
     */
    public $FreightAllowanceCharge;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Goods Item. Invoice Line
     * @Definition Association to information directly relating to a line item of an invoice.
     * @Cardinality 0..n
     * @ObjectClass Goods Item
     * @PropertyTerm Invoice Line
     * @AssociatedObjectClass Invoice Line
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName InvoiceLine
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\InvoiceLine
     */
    public $InvoiceLine;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Goods Item. Temperature
     * @Definition Any temperatures associated with the goods.
     * @Cardinality 0..n
     * @ObjectClass Goods Item
     * @PropertyTerm Temperature
     * @AssociatedObjectClass Temperature
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Temperature
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Temperature
     */
    public $Temperature;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Goods Item. Contained_ Goods Item. Goods Item
     * @Definition Associates with any other goods items contained in this goods item.
     * @Cardinality 0..n
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Contained
     * @PropertyTerm Goods Item
     * @AssociatedObjectClass Goods Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ContainedGoodsItem
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ContainedGoodsItem
     */
    public $ContainedGoodsItem;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Goods Item. Origin_ Address. Address
     * @Definition Region in which the goods have been produced or manufactured, according to criteria laid down for the purposes of application of the Customs tariff, or quantitative restrictions, or any other measure related to trade.
     * @Cardinality 0..1
     * @ObjectClass Goods Item
     * @PropertyTermQualifier Origin
     * @PropertyTerm Address
     * @AssociatedObjectClass Address
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OriginAddress
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OriginAddress
     */
    public $OriginAddress;
} // end class GoodsItemType
