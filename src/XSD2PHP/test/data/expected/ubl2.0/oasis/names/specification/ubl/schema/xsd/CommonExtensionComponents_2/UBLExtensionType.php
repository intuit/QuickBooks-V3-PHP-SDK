<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonExtensionComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2
 * @xmlType
 * @xmlName UBLExtensionType
 * @var oasis\names\specification\ubl\schema\xsd\CommonExtensionComponents_2\UBLExtensionType
 * @xmlDefinition
        A single extension for private use.

 */
class UBLExtensionType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Extension. Identifier
     * @Version
     * @Definition An identifier for the Extension assigned by the creator of the extension.
     * @Cardinality 0..1
     * @ObjectClass Extension
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
     * @DictionaryEntryName Extension. Name
     * @Version
     * @Definition A name for the Extension assigned by the creator of the extension.
     * @Cardinality 0..1
     * @ObjectClass Extension
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
     * @Definition
            An agency that maintains one or more Extensions.

     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExtensionAgencyID
     * @var oasis\names\specification\ubl\schema\xsd\CommonExtensionComponents_2\ExtensionAgencyID
     */
    public $ExtensionAgencyID;
    /**
     * @Definition
            The name of the agency that maintains the Extension.

     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExtensionAgencyName
     * @var oasis\names\specification\ubl\schema\xsd\CommonExtensionComponents_2\ExtensionAgencyName
     */
    public $ExtensionAgencyName;
    /**
     * @Definition
            The version of the Extension.

     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExtensionVersionID
     * @var oasis\names\specification\ubl\schema\xsd\CommonExtensionComponents_2\ExtensionVersionID
     */
    public $ExtensionVersionID;
    /**
     * @Definition
            A URI for the Agency that maintains the Extension.

     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExtensionAgencyURI
     * @var oasis\names\specification\ubl\schema\xsd\CommonExtensionComponents_2\ExtensionAgencyURI
     */
    public $ExtensionAgencyURI;
    /**
     * @Definition
            A URI for the Extension.

     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExtensionURI
     * @var oasis\names\specification\ubl\schema\xsd\CommonExtensionComponents_2\ExtensionURI
     */
    public $ExtensionURI;
    /**
     * @Definition
            A code for reason the Extension is being included.

     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExtensionReasonCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonExtensionComponents_2\ExtensionReasonCode
     */
    public $ExtensionReasonCode;
    /**
     * @Definition
            A description of the reason for the Extension.

     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExtensionReason
     * @var oasis\names\specification\ubl\schema\xsd\CommonExtensionComponents_2\ExtensionReason
     */
    public $ExtensionReason;
    /**
     * @Definition
            The definition of the extension content.

     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName ExtensionContent
     * @var oasis\names\specification\ubl\schema\xsd\CommonExtensionComponents_2\ExtensionContent
     */
    public $ExtensionContent;
} // end class UBLExtensionType
