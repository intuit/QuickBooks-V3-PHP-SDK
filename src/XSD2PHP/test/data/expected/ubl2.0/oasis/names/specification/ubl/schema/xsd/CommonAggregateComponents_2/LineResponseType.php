<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName LineResponseType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LineResponseType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Line Response. Details
 * @xmlDefinition A response to a Line in a Document.
 * @xmlObjectClass Line Response
 */
class LineResponseType
{

    
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Line Response. Line Reference
     * @Definition An association to Line Reference.
     * @Cardinality 1
     * @ObjectClass Line Response
     * @PropertyTerm Line Reference
     * @AssociatedObjectClass Line Reference
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName LineReference
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LineReference
     */
    public $LineReference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Line Response. Response
     * @Definition An association to Response.
     * @Cardinality 1..n
     * @ObjectClass Line Response
     * @PropertyTerm Response
     * @AssociatedObjectClass Response
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs unbounded
     * @xmlName Response
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Response
     */
    public $Response;
} // end class LineResponseType
