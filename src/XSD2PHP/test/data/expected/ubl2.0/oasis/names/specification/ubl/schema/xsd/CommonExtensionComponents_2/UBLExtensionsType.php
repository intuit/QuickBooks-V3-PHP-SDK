<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonExtensionComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2
 * @xmlType
 * @xmlName UBLExtensionsType
 * @var oasis\names\specification\ubl\schema\xsd\CommonExtensionComponents_2\UBLExtensionsType
 * @xmlDefinition
        A container for all extensions present in the document.

 */
class UBLExtensionsType
{

    
    /**
     * @Definition
            A single extension for private use.

     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs unbounded
     * @xmlName UBLExtension
     * @var oasis\names\specification\ubl\schema\xsd\CommonExtensionComponents_2\UBLExtension
     */
    public $UBLExtension;
} // end class UBLExtensionsType
