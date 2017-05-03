<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName TradingTermsType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\TradingTermsType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Trading Terms. Details
 * @xmlDefinition Information about the terms of a trade agreement.
 * @xmlObjectClass Trading Terms
 */
class TradingTermsType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Trading Terms. Information. Text
     * @Definition The terms in text.
     * @Cardinality 0..n
     * @ObjectClass Trading Terms
     * @PropertyTerm Information
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "Unless credit terms have been expressly agreed by Dell, payment for the products or services shall be made in full before physical delivery of products or services. Customer shall pay for all shipping and handling charges."
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Information
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Information
     */
    public $Information;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Trading Terms. Reference. Text
     * @Definition A reference to the terms.
     * @Cardinality 0..1
     * @ObjectClass Trading Terms
     * @PropertyTerm Reference
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples http://www1.ap.dell.com/content/topics/topic.aspx/ap/policy/en/au/sales_terms_au?c=au&l=en&s=gen
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Reference
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Reference
     */
    public $Reference;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Trading Terms. Applicable_ Address. Address
     * @Definition An association to Address.
     * @Cardinality 0..1
     * @ObjectClass Trading Terms
     * @PropertyTermQualifier Applicable
     * @PropertyTerm Address
     * @AssociatedObjectClass Address
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ApplicableAddress
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ApplicableAddress
     */
    public $ApplicableAddress;
} // end class TradingTermsType
