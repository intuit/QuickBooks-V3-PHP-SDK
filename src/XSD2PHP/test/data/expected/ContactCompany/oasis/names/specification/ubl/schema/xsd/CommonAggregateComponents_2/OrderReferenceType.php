<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName OrderReferenceType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OrderReferenceType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Order Reference. Details
 * @xmlDefinition Information about an Order Reference.
 * @xmlObjectClass Order Reference
 */
class OrderReferenceType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order Reference. Identifier
     * @Definition Identifies the referenced Order assigned by the buyer.
     * @Cardinality 1
     * @ObjectClass Order Reference
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "PO-001" "3333-44-123"
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
     * @DictionaryEntryName Order Reference. Sales Order Identifier. Identifier
     * @Definition Identifies the referenced Order assigned by the seller.
     * @Cardinality 0..1
     * @ObjectClass Order Reference
     * @PropertyTerm Sales Order Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SalesOrderID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SalesOrderID
     */
    public $SalesOrderID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order Reference. Copy_ Indicator. Indicator
     * @Definition Indicates whether the referenced Order is a copy (true) or the original (false).
     * @Cardinality 0..1
     * @ObjectClass Order Reference
     * @PropertyTermQualifier Copy
     * @PropertyTerm Indicator
     * @RepresentationTerm Indicator
     * @DataType Indicator. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CopyIndicator
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CopyIndicator
     */
    public $CopyIndicator;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order Reference. UUID. Identifier
     * @Definition A universally unique identifier for an instance of this ABIE.
     * @Cardinality 0..1
     * @ObjectClass Order Reference
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
     * @DictionaryEntryName Order Reference. Issue Date. Date
     * @Definition The date on which the referenced Order was issued.
     * @Cardinality 0..1
     * @ObjectClass Order Reference
     * @PropertyTerm Issue Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName IssueDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\IssueDate
     */
    public $IssueDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order Reference. Issue Time. Time
     * @Definition The time at which the referenced Order was issued.
     * @Cardinality 0..1
     * @ObjectClass Order Reference
     * @PropertyTerm Issue Time
     * @RepresentationTerm Time
     * @DataType Time. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName IssueTime
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\IssueTime
     */
    public $IssueTime;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Order Reference. Customer_ Reference. Text
     * @Definition A reference used (CRI) for tagging purchasing card transactions.
     * @Cardinality 0..1
     * @ObjectClass Order Reference
     * @PropertyTermQualifier Customer
     * @PropertyTerm Reference
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples Customer Reference Identifier (CRI) when using a puchasing card
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CustomerReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CustomerReference
     */
    public $CustomerReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Order Reference. Document Reference
     * @Definition An association to Document Reference.
     * @Cardinality 0..1
     * @ObjectClass Order Reference
     * @PropertyTerm Document Reference
     * @AssociatedObjectClass Document Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DocumentReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DocumentReference
     */
    public $DocumentReference;
} // end class OrderReferenceType
