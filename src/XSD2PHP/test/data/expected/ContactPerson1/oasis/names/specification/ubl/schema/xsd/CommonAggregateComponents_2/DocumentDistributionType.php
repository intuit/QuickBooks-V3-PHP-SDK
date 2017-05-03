<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName DocumentDistributionType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DocumentDistributionType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Document Distribution. Details
 * @xmlDefinition The details of the distribution of the document among business partners.
 * @xmlObjectClass Document Distribution
 */
class DocumentDistributionType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Document Distribution. Print_ Qualifier. Text
     * @Definition The access right for a Party to distribute the document.
     * @Cardinality 1
     * @ObjectClass Document Distribution
     * @PropertyTermQualifier Print
     * @PropertyTerm Qualifier
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName PrintQualifier
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PrintQualifier
     */
    public $PrintQualifier;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Document Distribution. Maximum_ Copies. Numeric
     * @Definition Specifies the maximum number of copies of the document that the user can print.
     * @Cardinality 1
     * @ObjectClass Document Distribution
     * @PropertyTermQualifier Maximum
     * @PropertyTerm Copies
     * @RepresentationTerm Numeric
     * @DataType Numeric. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName MaximumCopiesNumeric
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MaximumCopiesNumeric
     */
    public $MaximumCopiesNumeric;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Document Distribution. Party
     * @Definition Details of the Party who can access the document.
     * @Cardinality 1
     * @ObjectClass Document Distribution
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Party
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Party
     */
    public $Party;
} // end class DocumentDistributionType
