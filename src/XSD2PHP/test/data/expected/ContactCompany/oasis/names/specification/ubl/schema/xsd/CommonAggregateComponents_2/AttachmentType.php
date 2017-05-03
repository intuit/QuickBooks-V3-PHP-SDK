<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName AttachmentType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AttachmentType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Attachment. Details
 * @xmlDefinition Information about an attached document. An attachment can be referred to externally (with the URI element) or internally (with the MIME reference element) or contained within the document itself (with the EmbeddedDocument element).
 * @xmlObjectClass Attachment
 */
class AttachmentType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Attachment. Embedded_ Document. Binary Object
     * @Definition Contains an embedded document as a BLOB (binary large object).
     * @Cardinality 0..1
     * @ObjectClass Attachment
     * @PropertyTermQualifier Embedded
     * @PropertyTerm Document
     * @RepresentationTerm Binary Object
     * @DataType Binary Object. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName EmbeddedDocumentBinaryObject
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\EmbeddedDocumentBinaryObject
     */
    public $EmbeddedDocumentBinaryObject;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Attachment. External Reference
     * @Definition An attached document, externally referred to, referred to in the MIME location, or embedded.
     * @Cardinality 0..1
     * @ObjectClass Attachment
     * @PropertyTerm External Reference
     * @AssociatedObjectClass External Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExternalReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ExternalReference
     */
    public $ExternalReference;
} // end class AttachmentType
