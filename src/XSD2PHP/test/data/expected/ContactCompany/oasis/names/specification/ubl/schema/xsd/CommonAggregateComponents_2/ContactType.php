<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ContactType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ContactType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Contact. Details
 * @xmlDefinition Information about a contactable person or organization department.
 * @xmlObjectClass Contact
 */
class ContactType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Contact. Identifier
     * @Definition An identifier for the Contact.
     * @Cardinality 0..1
     * @ObjectClass Contact
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "Receivals Clerk"
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
     * @DictionaryEntryName Contact. Name
     * @Definition The name of the Contact.
     * @Cardinality 0..1
     * @ObjectClass Contact
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @Examples "Delivery Dock"
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
     * @DictionaryEntryName Contact. Telephone. Text
     * @Definition The telephone number of the Contact.
     * @Cardinality 0..1
     * @ObjectClass Contact
     * @PropertyTerm Telephone
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Telephone
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Telephone
     */
    public $Telephone;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Contact. Telefax. Text
     * @Definition The fax number of the Contact.
     * @Cardinality 0..1
     * @ObjectClass Contact
     * @PropertyTerm Telefax
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Telefax
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Telefax
     */
    public $Telefax;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Contact. Electronic_ Mail. Text
     * @Definition The email address of the Contact.
     * @Cardinality 0..1
     * @ObjectClass Contact
     * @PropertyTermQualifier Electronic
     * @PropertyTerm Mail
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ElectronicMail
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ElectronicMail
     */
    public $ElectronicMail;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Contact. Note. Text
     * @Definition A note such as 'Emergency' or 'After Hours' describing the circumstances in which the Contact can be used.
     * @Cardinality 0..1
     * @ObjectClass Contact
     * @PropertyTerm Note
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Note
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Note
     */
    public $Note;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Contact. Other_ Communication. Communication
     * @Definition An association to Other Communication.
     * @Cardinality 0..n
     * @ObjectClass Contact
     * @PropertyTermQualifier Other
     * @PropertyTerm Communication
     * @AssociatedObjectClass Communication
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName OtherCommunication
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\OtherCommunication
     */
    public $OtherCommunication;
} // end class ContactType
