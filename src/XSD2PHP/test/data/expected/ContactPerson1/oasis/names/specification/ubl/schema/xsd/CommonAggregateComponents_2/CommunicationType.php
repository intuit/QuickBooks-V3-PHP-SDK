<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName CommunicationType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CommunicationType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Communication. Details
 * @xmlDefinition Information about a means of communication.
 * @xmlObjectClass Communication
 */
class CommunicationType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Communication. Channel Code. Code
     * @Definition The method of communication, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Communication
     * @PropertyTerm Channel Code
     * @RepresentationTerm Code
     * @DataType Channel_ Code. Type
     * @Examples Phone Fax Email
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ChannelCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ChannelCode
     */
    public $ChannelCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Communication. Channel. Text
     * @Definition The method of communication, expressed as text.
     * @Cardinality 0..1
     * @ObjectClass Communication
     * @PropertyTerm Channel
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples Skype
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Channel
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Channel
     */
    public $Channel;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Communication. Value. Text
     * @Definition The communication value, such as phone number or email address.
     * @Cardinality 0..1
     * @ObjectClass Communication
     * @PropertyTerm Value
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "+44 1 2345 6789" "president@whitehouse.com"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Value
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Value
     */
    public $Value;
} // end class CommunicationType
