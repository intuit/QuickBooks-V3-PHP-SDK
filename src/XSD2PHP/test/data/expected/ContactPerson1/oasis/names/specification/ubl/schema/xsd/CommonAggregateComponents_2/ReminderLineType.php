<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ReminderLineType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ReminderLineType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Reminder Line. Details
 * @xmlDefinition Information about a Line on a Reminder document.
 * @xmlObjectClass Reminder Line
 */
class ReminderLineType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Reminder Line. Identifier
     * @Definition Identifies the Reminder Line.
     * @Cardinality 1
     * @ObjectClass Reminder Line
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
     * @DictionaryEntryName Reminder Line. Note. Text
     * @Definition Free-form text applying to the Reminder Line. This element may contain notes or any other similar information that is not contained explicitly in another structure.
     * @Cardinality 0..1
     * @ObjectClass Reminder Line
     * @PropertyTerm Note
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Note
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Note
     */
    public $Note;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Reminder Line. UUID. Identifier
     * @Definition A universally unique identifier for an instance of this ABIE.
     * @Cardinality 0..1
     * @ObjectClass Reminder Line
     * @PropertyTerm UUID
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName UUID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\UUID
     */
    public $UUID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Reminder Line. Balance Brought Forward_ Indicator. Indicator
     * @Definition If true, indicates that the Remonder Line contains a balance brought forward.
     * @Cardinality 0..1
     * @ObjectClass Reminder Line
     * @PropertyTermQualifier Balance Brought Forward
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName BalanceBroughtForwardIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\BalanceBroughtForwardIndicator
     */
    public $BalanceBroughtForwardIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Reminder Line. Debit_ Line Amount. Amount
     * @Definition The amount debited on the Reminder Line.
     * @Cardinality 0..1
     * @ObjectClass Reminder Line
     * @PropertyTermQualifier Debit
     * @PropertyTerm Line Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DebitLineAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DebitLineAmount
     */
    public $DebitLineAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Reminder Line. Credit_ Line Amount. Amount
     * @Definition The amount credited on the Reminder Line.
     * @Cardinality 0..1
     * @ObjectClass Reminder Line
     * @PropertyTermQualifier Credit
     * @PropertyTerm Line Amount
     * @RepresentationTerm Amount
     * @DataType Amount. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CreditLineAmount
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CreditLineAmount
     */
    public $CreditLineAmount;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Reminder Line. Accounting Cost Code. Code
     * @Definition The buyer's accounting code applied to the Reminder Line.
     * @Cardinality 0..1
     * @ObjectClass Reminder Line
     * @PropertyTerm Accounting Cost Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AccountingCostCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AccountingCostCode
     */
    public $AccountingCostCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Reminder Line. Accounting Cost. Text
     * @Definition The buyer's accounting code applied to the Reminder Line, expressed as text.
     * @Cardinality 0..1
     * @ObjectClass Reminder Line
     * @PropertyTerm Accounting Cost
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AccountingCost
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AccountingCost
     */
    public $AccountingCost;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Reminder Line. Reminder_ Period. Period
     * @Definition An association to Period.
     * @Cardinality 0..n
     * @ObjectClass Reminder Line
     * @PropertyTermQualifier Reminder
     * @PropertyTerm Period
     * @AssociatedObjectClass Period
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ReminderPeriod
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ReminderPeriod
     */
    public $ReminderPeriod;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Reminder Line. Billing Reference
     * @Definition An association to Billing Reference
     * @Cardinality 0..n
     * @ObjectClass Reminder Line
     * @PropertyTerm Billing Reference
     * @AssociatedObjectClass Billing Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName BillingReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\BillingReference
     */
    public $BillingReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Reminder Line. Exchange Rate
     * @Definition An association to Exchange Rate (between the Reminder Line Currency and the Related Document currency).
     * @Cardinality 0..1
     * @ObjectClass Reminder Line
     * @PropertyTerm Exchange Rate
     * @AssociatedObjectClass Exchange Rate
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExchangeRate
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ExchangeRate
     */
    public $ExchangeRate;
} // end class ReminderLineType
