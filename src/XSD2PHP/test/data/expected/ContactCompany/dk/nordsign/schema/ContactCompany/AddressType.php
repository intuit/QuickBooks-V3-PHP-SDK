<?php
namespace dk\nordsign\schema\ContactCompany;

/**
 * @xmlNamespace urn:dk:nordsign:schema:ContactCompany
 * @xmlType
 * @xmlName AddressType
 * @var dk\nordsign\schema\ContactCompany\AddressType
 */
class AddressType
{

    
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactCompany
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Address
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AddressLineType
     */
    public $Address;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactCompany
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Address2
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AddressLineType
     */
    public $Address2;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactCompany
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName PostBox
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PostboxType
     */
    public $PostBox;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactCompany
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName PostalCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PostalZoneType
     */
    public $PostalCode;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactCompany
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName City
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CityNameType
     */
    public $City;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactCompany
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName State
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RegionType
     */
    public $State;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactCompany
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Country
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\NameType
     */
    public $Country;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactCompany
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName ContactPerson
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ContactType
     */
    public $ContactPerson;
} // end class AddressType
