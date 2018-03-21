<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ExternalReferenceType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ExternalReferenceType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName External Reference. Details
 * @xmlDefinition Information directly relating to an external reference i.e. a document stored at a remote location.
 * @xmlObjectClass External Reference
 */
class ExternalReferenceType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName External Reference. URI. Identifier
     * @Definition The Uniform Resource Identifier (URI) that identifies where the external document is located.
     * @Cardinality 0..1
     * @ObjectClass External Reference
     * @PropertyTerm URI
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName URI
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\URI
     */
    public $URI;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName External Reference. Document Hash. Text
     * @Definition Specifies the hash code for the externally stored document.
     * @Cardinality 0..1
     * @ObjectClass External Reference
     * @PropertyTerm Document Hash
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DocumentHash
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DocumentHash
     */
    public $DocumentHash;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName External Reference. Expiry Date. Date
     * @Definition The date on which the document can no longer be found on the URI.
     * @Cardinality 0..1
     * @ObjectClass External Reference
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
     * @ComponentType BBIE
     * @DictionaryEntryName External Reference. Expiry Time. Time
     * @Definition The time on which the document can no longer be found on the URI.
     * @Cardinality 0..1
     * @ObjectClass External Reference
     * @PropertyTerm Expiry Time
     * @RepresentationTerm Time
     * @DataType Time. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExpiryTime
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ExpiryTime
     */
    public $ExpiryTime;
} // end class ExternalReferenceType
