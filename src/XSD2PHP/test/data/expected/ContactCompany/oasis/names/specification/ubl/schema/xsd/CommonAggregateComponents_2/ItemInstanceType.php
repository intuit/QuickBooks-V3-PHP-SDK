<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ItemInstanceType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ItemInstanceType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Item Instance. Details
 * @xmlDefinition Information about a specific instance of an item.
 * @xmlObjectClass Item Instance
 */
class ItemInstanceType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item Instance. Product Trace_ Identifier. Identifier
     * @Definition An identifier used for tracing the item, such as the EPC number used in RFID.
     * @Cardinality 0..1
     * @ObjectClass Item Instance
     * @PropertyTermQualifier Product Trace
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ProductTraceID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ProductTraceID
     */
    public $ProductTraceID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item Instance. Manufacture Date. Date
     * @Definition The date of manufacture of the Item Instance.
     * @Cardinality 0..1
     * @ObjectClass Item Instance
     * @PropertyTerm Manufacture Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ManufactureDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ManufactureDate
     */
    public $ManufactureDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item Instance. Manufacture Time. Time
     * @Definition The time of manufacture of the Item Instance.
     * @Cardinality 0..1
     * @ObjectClass Item Instance
     * @PropertyTerm Manufacture Time
     * @RepresentationTerm Time
     * @DataType Time. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ManufactureTime
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ManufactureTime
     */
    public $ManufactureTime;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item Instance. Registration Identifier. Identifier
     * @Definition The registration identifier of the Item Instance.
     * @Cardinality 0..1
     * @ObjectClass Item Instance
     * @PropertyTerm Registration Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples car registration or licensing number
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RegistrationID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RegistrationID
     */
    public $RegistrationID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item Instance. Serial Identifier. Identifier
     * @Definition The serial number of the Item Instance.
     * @Cardinality 0..1
     * @ObjectClass Item Instance
     * @PropertyTerm Serial Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples chassis number of a car
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SerialID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SerialID
     */
    public $SerialID;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item Instance. Additional_ Item Property. Item Property
     * @Definition An association to Additional Item Property.
     * @Cardinality 0..n
     * @ObjectClass Item Instance
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
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item Instance. Lot Identification
     * @Definition Associates the item instance with its lot identification (the identification that allows recall of the item if necessary).
     * @Cardinality 0..1
     * @ObjectClass Item Instance
     * @PropertyTerm Lot Identification
     * @AssociatedObjectClass Lot Identification
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LotIdentification
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LotIdentification
     */
    public $LotIdentification;
} // end class ItemInstanceType
