<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName RailTransportType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\RailTransportType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Rail Transport. Details
 * @xmlDefinition Describes a train.
 * @xmlObjectClass Rail Transport
 */
class RailTransportType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Rail Transport. Train Identifier. Identifier
     * @Definition Identifies a train.
     * @Cardinality 1
     * @ObjectClass Rail Transport
     * @PropertyTerm Train Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms Train Number (WCO ID 167)
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName TrainID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TrainID
     */
    public $TrainID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Rail Transport. Rail Car Identifier. Identifier
     * @Definition Identifies the rail car on the train used for the means of transport.
     * @Cardinality 0..1
     * @ObjectClass Rail Transport
     * @PropertyTerm Rail Car Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RailCarID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RailCarID
     */
    public $RailCarID;
} // end class RailTransportType
