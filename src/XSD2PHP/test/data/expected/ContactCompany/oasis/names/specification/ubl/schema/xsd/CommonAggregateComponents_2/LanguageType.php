<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName LanguageType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LanguageType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Language. Details
 * @xmlDefinition Information about Language.
 * @xmlObjectClass Language
 */
class LanguageType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Language. Identifier
     * @Definition An identifier for a language, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Language
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ID
     */
    public $ID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Language. Name
     * @Definition The name of the language.
     * @Cardinality 0..1
     * @ObjectClass Language
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Name
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Name
     */
    public $Name;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Language. Locale Code. Code
     * @Definition The locale where the language is used, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Language
     * @PropertyTerm Locale Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LocaleCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LocaleCode
     */
    public $LocaleCode;
} // end class LanguageType
