<?php
namespace dk\nordsign\schema\ContactPerson;

/**
 * @xmlNamespace urn:dk:nordsign:schema:ContactPerson
 * @xmlType
 * @xmlName ContactPersonType
 * @var dk\nordsign\schema\ContactPerson\ContactPersonType
 */
class ContactPersonType
{

    
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactPerson
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName ID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\IDType
     */
    public $ID;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactPerson
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName ExtID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\IDType
     */
    public $ExtID;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactPerson
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Name
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\NameType
     */
    public $Name;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactPerson
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Telephone
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TelephoneType
     */
    public $Telephone;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactPerson
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ElectronicMail
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ElectronicMailType
     */
    public $ElectronicMail;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactPerson
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Username
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ElectronicMailType
     */
    public $Username;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactPerson
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Password
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TextType
     */
    public $Password;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactPerson
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Created
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\DateType
     */
    public $Created;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactPerson
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Role
     * @var integer
     */
    public $Role;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactPerson
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Title
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TitleType
     */
    public $Title;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactPerson
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Company_No
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CompanyIDType
     */
    public $Company_No;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactPerson
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName BillingAddress
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AddressType
     */
    public $BillingAddress;
    /**
     * @xmlType element
     * @xmlNamespace urn:dk:nordsign:schema:ContactPerson
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName ShippingAddress
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AddressType
     */
    public $ShippingAddress;
} // end class ContactPersonType
