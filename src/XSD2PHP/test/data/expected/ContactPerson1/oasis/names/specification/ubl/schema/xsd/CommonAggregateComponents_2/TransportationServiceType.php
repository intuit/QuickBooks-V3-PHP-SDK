<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName TransportationServiceType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TransportationServiceType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Transportation Service. Details
 * @xmlDefinition Transport service details.
 * @xmlObjectClass Transportation Service
 */
class TransportationServiceType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transportation Service. Transport Service Code. Code
     * @Definition A code which describes the general type of service required for the transportation of goods. Specifically, it identifies the extent of the transportation service, e.g., door-to-door, port-to-port.
     * @Cardinality 1
     * @ObjectClass Transportation Service
     * @PropertyTerm Transport Service Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName TransportServiceCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TransportServiceCode
     */
    public $TransportServiceCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transportation Service. Tariff Class Code. Code
     * @Definition Specification of a tariff class applicable to a transportation service.
     * @Cardinality 0..1
     * @ObjectClass Transportation Service
     * @PropertyTerm Tariff Class Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms Tariff Class Specifier
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TariffClassCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TariffClassCode
     */
    public $TariffClassCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transportation Service. Priority. Text
     * @Definition Statement indicating priority of requested transportation service.
     * @Cardinality 0..1
     * @ObjectClass Transportation Service
     * @PropertyTerm Priority
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Priority
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Priority
     */
    public $Priority;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Transportation Service. Freight Rate Class Code. Code
     * @Definition Code to indicate applicable rate class for freight.
     * @Cardinality 0..1
     * @ObjectClass Transportation Service
     * @PropertyTerm Freight Rate Class Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms Charge Basis
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName FreightRateClassCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\FreightRateClassCode
     */
    public $FreightRateClassCode;
} // end class TransportationServiceType
