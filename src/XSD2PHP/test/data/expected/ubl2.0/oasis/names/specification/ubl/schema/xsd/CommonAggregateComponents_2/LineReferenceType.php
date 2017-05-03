<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName LineReferenceType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LineReferenceType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Line Reference. Details
 * @xmlDefinition Reference to a Line on a document.
 * @xmlObjectClass Line Reference
 */
class LineReferenceType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Line Reference. Line Identifier. Identifier
     * @Definition Identifies the Line on the referenced document.
     * @Cardinality 1
     * @ObjectClass Line Reference
     * @PropertyTerm Line Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName LineID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LineID
     */
    public $LineID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Line Reference. UUID. Identifier
     * @Definition A universally unique identifier for an instance of this ABIE.
     * @Cardinality 0..1
     * @ObjectClass Line Reference
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
     * @DictionaryEntryName Line Reference. Line Status Code. Code
     * @Definition Identifies the status of the referenced Line with respect to its original state.
     * @Cardinality 0..1
     * @ObjectClass Line Reference
     * @PropertyTerm Line Status Code
     * @RepresentationTerm Code
     * @DataType Line Status_ Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LineStatusCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LineStatusCode
     */
    public $LineStatusCode;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Line Reference. Document Reference
     * @Definition An association to Document Reference.
     * @Cardinality 0..1
     * @ObjectClass Line Reference
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
} // end class LineReferenceType
