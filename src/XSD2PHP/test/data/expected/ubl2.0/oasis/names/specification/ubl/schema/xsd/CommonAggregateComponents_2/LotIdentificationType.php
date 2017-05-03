<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName LotIdentificationType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LotIdentificationType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Lot Identification. Details
 * @xmlDefinition Information about a lot (of Item Instances).
 * @xmlObjectClass Lot Identification
 */
class LotIdentificationType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Lot Identification. Lot Number. Identifier
     * @Definition Identifies the lot.
     * @Cardinality 0..1
     * @ObjectClass Lot Identification
     * @PropertyTerm Lot Number
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LotNumberID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LotNumberID
     */
    public $LotNumberID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Lot Identification. Expiry Date. Date
     * @Definition The expiry date of the lot.
     * @Cardinality 0..1
     * @ObjectClass Lot Identification
     * @PropertyTerm Expiry Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExpiryDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ExpiryDate
     */
    public $ExpiryDate;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Lot Identification. Additional_ Item Property. Item Property
     * @Definition An association to Additional Item Property.
     * @Cardinality 0..n
     * @ObjectClass Lot Identification
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
} // end class LotIdentificationType
