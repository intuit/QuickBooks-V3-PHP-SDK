<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName StatusType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\StatusType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Status. Details
 * @xmlDefinition The information relevant to a condition or a position of an object.
 * @xmlObjectClass Status
 */
class StatusType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Status. Condition Code. Code
     * @Definition A code specifying the status condition of the related object.
     * @Cardinality 0..1
     * @ObjectClass Status
     * @PropertyTerm Condition Code
     * @RepresentationTerm Code
     * @DataType Transportation Status_ Code. Type
     * @Examples UN/ECE Rec 24
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ConditionCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ConditionCode
     */
    public $ConditionCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Status. Reference_ Date. Date
     * @Definition A reference date value for this status.
     * @Cardinality 0..1
     * @ObjectClass Status
     * @PropertyTermQualifier Reference
     * @PropertyTerm Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ReferenceDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ReferenceDate
     */
    public $ReferenceDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Status. Reference_ Time. Time
     * @Definition A reference time value for this status.
     * @Cardinality 0..1
     * @ObjectClass Status
     * @PropertyTermQualifier Reference
     * @PropertyTerm Time
     * @RepresentationTerm Time
     * @DataType Time. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ReferenceTime
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ReferenceTime
     */
    public $ReferenceTime;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Status. Description. Text
     * @Definition A textual description of this status.
     * @Cardinality 0..1
     * @ObjectClass Status
     * @PropertyTerm Description
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Description
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Description
     */
    public $Description;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Status. Status Reason Code. Code
     * @Definition A code specifying a reason for a status condition.
     * @Cardinality 0..1
     * @ObjectClass Status
     * @PropertyTerm Status Reason Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName StatusReasonCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\StatusReasonCode
     */
    public $StatusReasonCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Status. Status_ Reason. Text
     * @Definition The reason, expressed as text, for this status condition or position.
     * @Cardinality 0..1
     * @ObjectClass Status
     * @PropertyTermQualifier Status
     * @PropertyTerm Reason
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName StatusReason
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\StatusReason
     */
    public $StatusReason;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Status. Sequence. Identifier
     * @Definition A unique identifier of the sequence of this status.
     * @Cardinality 0..1
     * @ObjectClass Status
     * @PropertyTerm Sequence
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SequenceID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SequenceID
     */
    public $SequenceID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Status. Text
     * @Definition Provides any textual information related to this status.
     * @Cardinality 0..1
     * @ObjectClass Status
     * @PropertyTerm Text
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Text
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Text
     */
    public $Text;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Status. Indication_ Indicator. Indicator
     * @Definition Specifies an indicator relevant to a specific status.
     * @Cardinality 0..1
     * @ObjectClass Status
     * @PropertyTermQualifier Indication
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName IndicationIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\IndicationIndicator
     */
    public $IndicationIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Status. Percent
     * @Definition Specifies a percentage relevant to a specific status.
     * @Cardinality 0..1
     * @ObjectClass Status
     * @PropertyTerm Percent
     * @RepresentationTerm Percent
     * @DataType Percent. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Percent
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Percent
     */
    public $Percent;
} // end class StatusType
