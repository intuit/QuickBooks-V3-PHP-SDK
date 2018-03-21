<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName DocumentReferenceType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DocumentReferenceType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Document Reference. Details
 * @xmlDefinition Information about a document referred to in another document.
 * @xmlObjectClass Document Reference
 */
class DocumentReferenceType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Document Reference. Identifier
     * @Definition Identifies the document being referred to.
     * @Cardinality 1
     * @ObjectClass Document Reference
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
     * @DictionaryEntryName Document Reference. Copy_ Indicator. Indicator
     * @Definition Indicates whether the referenced document is a copy (true) or the original (false).
     * @Cardinality 0..1
     * @ObjectClass Document Reference
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
     * @DictionaryEntryName Document Reference. UUID. Identifier
     * @Definition A universally unique identifier for an instance of this ABIE.
     * @Cardinality 0..1
     * @ObjectClass Document Reference
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
     * @DictionaryEntryName Document Reference. Issue Date. Date
     * @Definition The date, assigned by the sender of the referenced document, on which the referenced document was issued.
     * @Cardinality 0..1
     * @ObjectClass Document Reference
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
     * @DictionaryEntryName Document Reference. Document Type Code. Code
     * @Definition The document type, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Document Reference
     * @PropertyTerm Document Type Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DocumentTypeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DocumentTypeCode
     */
    public $DocumentTypeCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Document Reference. Document Type. Text
     * @Definition The document type, expressed as text.
     * @Cardinality 0..1
     * @ObjectClass Document Reference
     * @PropertyTerm Document Type
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DocumentType
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DocumentType
     */
    public $DocumentType;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Document Reference. XPath. Text
     * @Definition Refers to another part of the same document instance.
     * @Cardinality 0..n
     * @ObjectClass Document Reference
     * @PropertyTerm XPath
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName XPath
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\XPath
     */
    public $XPath;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Document Reference. Attachment
     * @Definition An attached document, externally referred to, referred to in the MIME location, or embedded.
     * @Cardinality 0..1
     * @ObjectClass Document Reference
     * @PropertyTerm Attachment
     * @AssociatedObjectClass Attachment
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Attachment
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Attachment
     */
    public $Attachment;
} // end class DocumentReferenceType
