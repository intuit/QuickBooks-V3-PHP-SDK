<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName DespatchType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DespatchType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Despatch. Details
 * @xmlDefinition Information about Despatch.
 * @xmlObjectClass Despatch
 */
class DespatchType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Despatch. Identifier
     * @Definition The identifier for the Delivery.
     * @Cardinality 0..1
     * @ObjectClass Despatch
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
     * @DictionaryEntryName Despatch. Requested_ Despatch Date. Date
     * @Definition The despatch (pick-up) date requested by the buyer.
     * @Cardinality 0..1
     * @ObjectClass Despatch
     * @PropertyTermQualifier Requested
     * @PropertyTerm Despatch Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RequestedDespatchDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RequestedDespatchDate
     */
    public $RequestedDespatchDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Despatch. Requested_ Despatch Time. Time
     * @Definition The despatch (pick-up) time requested by the buyer.
     * @Cardinality 0..1
     * @ObjectClass Despatch
     * @PropertyTermQualifier Requested
     * @PropertyTerm Despatch Time
     * @RepresentationTerm Time
     * @DataType Time. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RequestedDespatchTime
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RequestedDespatchTime
     */
    public $RequestedDespatchTime;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Despatch. Estimated_ Despatch Date. Date
     * @Definition The despatch (pick-up) date estimated by the seller or Despatch.
     * @Cardinality 0..1
     * @ObjectClass Despatch
     * @PropertyTermQualifier Estimated
     * @PropertyTerm Despatch Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName EstimatedDespatchDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\EstimatedDespatchDate
     */
    public $EstimatedDespatchDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Despatch. Estimated_ Despatch Time. Time
     * @Definition The despatch (pick-up) time estimated by the seller or Despatch.
     * @Cardinality 0..1
     * @ObjectClass Despatch
     * @PropertyTermQualifier Estimated
     * @PropertyTerm Despatch Time
     * @RepresentationTerm Time
     * @DataType Time. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName EstimatedDespatchTime
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\EstimatedDespatchTime
     */
    public $EstimatedDespatchTime;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Despatch. Actual_ Despatch Date. Date
     * @Definition The actual despatch (pick-up) date.
     * @Cardinality 0..1
     * @ObjectClass Despatch
     * @PropertyTermQualifier Actual
     * @PropertyTerm Despatch Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ActualDespatchDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ActualDespatchDate
     */
    public $ActualDespatchDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Despatch. Actual_ Despatch Time. Time
     * @Definition The actual despatch (pick-up) time.
     * @Cardinality 0..1
     * @ObjectClass Despatch
     * @PropertyTermQualifier Actual
     * @PropertyTerm Despatch Time
     * @RepresentationTerm Time
     * @DataType Time. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ActualDespatchTime
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ActualDespatchTime
     */
    public $ActualDespatchTime;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Despatch. Despatch_ Address. Address
     * @Definition An association to Despatch Address.
     * @Cardinality 0..1
     * @ObjectClass Despatch
     * @PropertyTermQualifier Despatch
     * @PropertyTerm Address
     * @AssociatedObjectClass Address
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DespatchAddress
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DespatchAddress
     */
    public $DespatchAddress;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Despatch. Despatch_ Party. Party
     * @Definition The party who despatched the delivery.
     * @Cardinality 0..1
     * @ObjectClass Despatch
     * @PropertyTermQualifier Despatch
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DespatchParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DespatchParty
     */
    public $DespatchParty;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Despatch. Contact
     * @Definition An association to Contact.
     * @Cardinality 0..1
     * @ObjectClass Despatch
     * @PropertyTerm Contact
     * @AssociatedObjectClass Contact
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Contact
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Contact
     */
    public $Contact;
} // end class DespatchType
