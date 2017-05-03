<?php
namespace dk\nordsign\schema\ContactCompany;

/**
 * @xmlNamespace urn:dk:nordsign:schema:ContactCompany
 * @xmlType
 * @xmlName ContactCompany
 * @var dk\nordsign\schema\ContactCompany\ContactCompany
 */
class ContactCompany
{

    
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactCompany
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName ID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\IDType
     */
    public $ID;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactCompany
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName ExtID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\IDType
     */
    public $ExtID;
    /**
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName CompanyID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CompanyID
     */
    public $CompanyID;
    /**
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Name
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Name
     */
    public $Name;
    /**
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Telephone
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Telephone
     */
    public $Telephone;
    /**
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Telefax
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Telefax
     */
    public $Telefax;
    /**
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Party
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Party
     */
    public $Party;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactCompany
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName BillingAddress
     * @var dk\nordsign\schema\ContactCompany\AddressType
     */
    public $BillingAddress;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactCompany
     * @xmlMinOccurs 1
     * @xmlMaxOccurs unbounded
     * @xmlName ShippingAddress
     * @var dk\nordsign\schema\ContactCompany\AddressType
     */
    public $ShippingAddress;
} // end class ContactCompany
