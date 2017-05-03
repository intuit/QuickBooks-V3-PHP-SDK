<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName CustomerPartyType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CustomerPartyType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Customer Party. Details
 * @xmlDefinition Information about the Customer Party.
 * @xmlObjectClass Customer Party
 */
class CustomerPartyType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Customer Party. Customer Assigned_ Account Identifier. Identifier
     * @Definition An identifier for the Customer's account, assigned by the Customer itself.
     * @Cardinality 0..1
     * @ObjectClass Customer Party
     * @PropertyTermQualifier Customer Assigned
     * @PropertyTerm Account Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CustomerAssignedAccountID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CustomerAssignedAccountID
     */
    public $CustomerAssignedAccountID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Customer Party. Supplier Assigned_ Account Identifier. Identifier
     * @Definition An identifier for the Customer's account, assigned by the Supplier.
     * @Cardinality 0..1
     * @ObjectClass Customer Party
     * @PropertyTermQualifier Supplier Assigned
     * @PropertyTerm Account Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SupplierAssignedAccountID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SupplierAssignedAccountID
     */
    public $SupplierAssignedAccountID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Customer Party. Additional_ Account Identifier. Identifier
     * @Definition An identifier for the Customer's account, assigned by a third party.
     * @Cardinality 0..n
     * @ObjectClass Customer Party
     * @PropertyTermQualifier Additional
     * @PropertyTerm Account Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName AdditionalAccountID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AdditionalAccountID
     */
    public $AdditionalAccountID;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Customer Party. Party
     * @Definition An association to Party.
     * @Cardinality 0..1
     * @ObjectClass Customer Party
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Party
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Party
     */
    public $Party;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Customer Party. Delivery_ Contact. Contact
     * @Definition An association to Delivery Contact.
     * @Cardinality 0..1
     * @ObjectClass Customer Party
     * @PropertyTermQualifier Delivery
     * @PropertyTerm Contact
     * @AssociatedObjectClass Contact
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DeliveryContact
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\DeliveryContact
     */
    public $DeliveryContact;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Customer Party. Accounting_ Contact. Contact
     * @Definition An association to Accounting Contact (Customer).
     * @Cardinality 0..1
     * @ObjectClass Customer Party
     * @PropertyTermQualifier Accounting
     * @PropertyTerm Contact
     * @AssociatedObjectClass Contact
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AccountingContact
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AccountingContact
     */
    public $AccountingContact;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Customer Party. Buyer_ Contact. Contact
     * @Definition An association to Buyer Contact.
     * @Cardinality 0..1
     * @ObjectClass Customer Party
     * @PropertyTermQualifier Buyer
     * @PropertyTerm Contact
     * @AssociatedObjectClass Contact
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName BuyerContact
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\BuyerContact
     */
    public $BuyerContact;
} // end class CustomerPartyType
