<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ResponseType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ResponseType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Response. Details
 * @xmlDefinition Information about responses to a document (at the application level).
 * @xmlObjectClass Response
 */
class ResponseType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Response. Reference. Identifier
     * @Definition Identifies the section (or line) of the document to which the response applies.
     * @Cardinality 1
     * @ObjectClass Response
     * @PropertyTerm Reference
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName ReferenceID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ReferenceID
     */
    public $ReferenceID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Response. Response Code. Code
     * @Definition A code for the description of the response to the transaction document.
     * @Cardinality 0..1
     * @ObjectClass Response
     * @PropertyTerm Response Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ResponseCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ResponseCode
     */
    public $ResponseCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Response. Description. Text
     * @Definition The description of the response to the transaction document.
     * @Cardinality 0..n
     * @ObjectClass Response
     * @PropertyTerm Description
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Description
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Description
     */
    public $Description;
} // end class ResponseType
