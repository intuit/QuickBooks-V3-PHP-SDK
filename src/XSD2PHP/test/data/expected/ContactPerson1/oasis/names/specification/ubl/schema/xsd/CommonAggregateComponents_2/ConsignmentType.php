<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ConsignmentType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ConsignmentType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Consignment. Details
 * @xmlDefinition A separately identifiable collection of goods items (available to be) transported from one consignor to one consignee via one or more modes of transport.
 * @xmlObjectClass Consignment
 */
class ConsignmentType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Consignment. Identifier
     * @Definition Unique number assigned to goods, both for import and export.
     * @Cardinality 1
     * @ObjectClass Consignment
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms Unique consignment reference number (UCR)
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
     * @DictionaryEntryName Consignment. Summary_ Description. Text
     * @Definition General descriptive text that is not part of any remarks.
     * @Cardinality 0..n
     * @ObjectClass Consignment
     * @PropertyTermQualifier Summary
     * @PropertyTerm Description
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName SummaryDescription
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SummaryDescription
     */
    public $SummaryDescription;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Consignment. Total_ Invoice Amount. Amount
     * @Definition Total of all invoice amounts declared in a single consignment.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Total
     * @PropertyTerm Invoice Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TotalInvoiceAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TotalInvoiceAmount
     */
    public $TotalInvoiceAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Consignment. Declared Customs_ Value. Amount
     * @Definition Amount declared for customs purposes of those goods in a consignment, whether or not they are subject to the same customs procedure, tariff/statistical heading, country information, and duty regime.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Declared Customs
     * @PropertyTerm Value
     * @RepresentationTerm Amount
     * @DataType Amount. Type
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
     * @DictionaryEntryName Consignment. Tariff Description. Text
     * @Definition A description of the tariff applied to a consignment.
     * @Cardinality 0..n
     * @ObjectClass Consignment
     * @PropertyTerm Tariff Description
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName TariffDescription
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TariffDescription
     */
    public $TariffDescription;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Consignment. Tariff Code. Code
     * @Definition Code specifying a tariff applied to a consignment.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTerm Tariff Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms Tariff code number (WCO ID 145)
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TariffCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TariffCode
     */
    public $TariffCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Consignment. Insurance Premium Amount. Amount
     * @Definition Amount of premium payable to the insurance company for insuring the goods.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTerm Insurance Premium Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @AlternativeBusinessTerms Insurance Cost
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName InsurancePremiumAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\InsurancePremiumAmount
     */
    public $InsurancePremiumAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Consignment. Gross_ Weight. Measure
     * @Definition Total weight (mass) of goods for a declaration, including packaging but excluding the carrier's equipment.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Gross
     * @PropertyTerm Weight
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @AlternativeBusinessTerms Total gross weight (WCO ID 131)
     * @Examples Total cube of all goods items referred to as one consignment.
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
     * @DictionaryEntryName Consignment. Net_ Weight. Measure
     * @Definition Total net weight (mass) of all the goods items referred to as one consignment.
     * @Cardinality 0..1
     * @ObjectClass Consignment
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
     * @DictionaryEntryName Consignment. Net Net_ Weight. Measure
     * @Definition Weight (mass) of the goods themselves without any packing.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Net Net
     * @PropertyTerm Weight
     * @RepresentationTerm Measure
     * @DataType Measure. Type
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
     * @DictionaryEntryName Consignment. Chargeable_ Weight. Measure
     * @Definition Gross weight (mass) on which a charge is to be based.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Chargeable
     * @PropertyTerm Weight
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @AlternativeBusinessTerms Chargeable Weight. Basis.Measure
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
     * @DictionaryEntryName Consignment. Gross_ Volume. Measure
     * @Definition Total volume of all goods items referred to as one consignment.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Gross
     * @PropertyTerm Volume
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @AlternativeBusinessTerms Cube
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
     * @DictionaryEntryName Consignment. Net_ Volume. Measure
     * @Definition Net volume of all goods items referred to as one consignment.
     * @Cardinality 0..1
     * @ObjectClass Consignment
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
     * @DictionaryEntryName Consignment. Loading_ Length. Measure
     * @Definition Total length in a means of transport or a piece of transport equipment whereby the complete width and height over that length is needed for loading all the consignments referred to as one consolidation.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Loading
     * @PropertyTerm Length
     * @RepresentationTerm Measure
     * @DataType Measure. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LoadingLengthMeasure
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LoadingLengthMeasure
     */
    public $LoadingLengthMeasure;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Consignment. Remarks. Text
     * @Definition Remarks concerning the complete consignment to be printed on the transport document.
     * @Cardinality 0..n
     * @ObjectClass Consignment
     * @PropertyTerm Remarks
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Remarks
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Remarks
     */
    public $Remarks;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Consignment. Hazardous Risk_ Indicator. Indicator
     * @Definition Indication that the transport is or is not subject to an international regulation concerning the carriage of dangerous goods.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Hazardous Risk
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @AlternativeBusinessTerms Dangerous Goods RID Indicator
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
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Consignee_ Party. Party
     * @Definition Party to which goods are consigned.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Consignee
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ConsigneeParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ConsigneeParty
     */
    public $ConsigneeParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Exporter_ Party. Party
     * @Definition The party who makes the export declaration, or on whose behalf the export declaration is made, and who is the owner of the goods or has similar right of disposal over them at the time when the declaration is accepted.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Exporter
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExporterParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ExporterParty
     */
    public $ExporterParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Consignor_ Party. Party
     * @Definition The party consigning goods, as stipulated in the transport contract by the party ordering transport.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Consignor
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ConsignorParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ConsignorParty
     */
    public $ConsignorParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Importer_ Party. Party
     * @Definition The party who makes an import declaration, or on whose behalf a Customs clearing agent or other authorized person makes an import declaration. This may include a person who has possession of the goods or to whom the goods are consigned.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Importer
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ImporterParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ImporterParty
     */
    public $ImporterParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Carrier_ Party. Party
     * @Definition The party providing the transport of goods between named points.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Carrier
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CarrierParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CarrierParty
     */
    public $CarrierParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Freight Forwarder_ Party. Party
     * @Definition The party combining individual smaller consignments into a single larger shipment (so called consolidated shipment) that is sent to a counterpart who mirrors the consolidator's activity by dividing the consolidated consignment into its original components.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Freight Forwarder
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName FreightForwarderParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\FreightForwarderParty
     */
    public $FreightForwarderParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Notify_ Party. Party
     * @Definition The party to be notified.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Notify
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName NotifyParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\NotifyParty
     */
    public $NotifyParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Original Despatch_ Party. Party
     * @Definition The original despatch party.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Original Despatch
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OriginalDespatchParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OriginalDespatchParty
     */
    public $OriginalDespatchParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Final Delivery_ Party. Party
     * @Definition The final delivery party.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Final Delivery
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName FinalDeliveryParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\FinalDeliveryParty
     */
    public $FinalDeliveryParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Original Departure_ Country. Country
     * @Definition The country from which the goods are originally exported, without any commercial transaction taking place in intermediate countries.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Original Departure
     * @PropertyTerm Country
     * @AssociatedObjectClass Country
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OriginalDepartureCountry
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OriginalDepartureCountry
     */
    public $OriginalDepartureCountry;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Final Destination_ Country. Country
     * @Definition Name of the country to which the goods are to be delivered to the final consignee or buyer.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Final Destination
     * @PropertyTerm Country
     * @AssociatedObjectClass Country
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName FinalDestinationCountry
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\FinalDestinationCountry
     */
    public $FinalDestinationCountry;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Transit_ Country. Country
     * @Definition The countries through which goods or passengers are routed between the country of original departure and the country of final destination.
     * @Cardinality 0..n
     * @ObjectClass Consignment
     * @PropertyTermQualifier Transit
     * @PropertyTerm Country
     * @AssociatedObjectClass Country
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName TransitCountry
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransitCountry
     */
    public $TransitCountry;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Transport_ Contract. Contract
     * @Definition An association to Transport Contact.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Transport
     * @PropertyTerm Contract
     * @AssociatedObjectClass Contract
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TransportContract
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransportContract
     */
    public $TransportContract;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Original Despatch_ Transportation Service. Transportation Service
     * @Definition The service for pick-up from the consignor under the transport contract.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Original Despatch
     * @PropertyTerm Transportation Service
     * @AssociatedObjectClass Transportation Service
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OriginalDespatchTransportationService
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OriginalDespatchTransportationService
     */
    public $OriginalDespatchTransportationService;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Final Delivery_ Transportation Service. Transportation Service
     * @Definition The service for delivery to the consignee under the transport contract.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTermQualifier Final Delivery
     * @PropertyTerm Transportation Service
     * @AssociatedObjectClass Transportation Service
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName FinalDeliveryTransportationService
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\FinalDeliveryTransportationService
     */
    public $FinalDeliveryTransportationService;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Delivery Terms
     * @Definition All the conditions agreed upon between a seller and a buyer with regard to the delivery of goods and/or services, e.g., CIF, FOB, or EXW from the INCOTERMS Terms of Delivery.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTerm Delivery Terms
     * @AssociatedObjectClass Delivery Terms
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DeliveryTerms
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DeliveryTerms
     */
    public $DeliveryTerms;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Payment Terms
     * @Definition The conditions of payment between the parties in a transaction.
     * @Cardinality 0..1
     * @ObjectClass Consignment
     * @PropertyTerm Payment Terms
     * @AssociatedObjectClass Payment Terms
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PaymentTerms
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PaymentTerms
     */
    public $PaymentTerms;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Consignment. Freight_ Allowance Charge. Allowance Charge
     * @Definition Costs incurred by the shipper in moving goods, by whatever means, from one place to another under the terms of the contract of carriage. In addition to transport costs, this may include such elements as packing, documentation, loading, unloading, and insurance (to the extent that they relate to the freight costs).
     * @Cardinality 0..n
     * @ObjectClass Consignment
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
} // end class ConsignmentType
