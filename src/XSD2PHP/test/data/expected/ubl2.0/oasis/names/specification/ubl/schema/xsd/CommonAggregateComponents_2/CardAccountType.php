<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName CardAccountType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CardAccountType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Card Account. Details
 * @xmlDefinition Information about a credit card, debit card, or charge card.
 * @xmlObjectClass Card Account
 */
class CardAccountType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Card Account. Primary_ Account Number. Identifier
     * @Definition The card number; the Primary Account Number (PAN).
     * @Cardinality 1
     * @ObjectClass Card Account
     * @PropertyTermQualifier Primary
     * @PropertyTerm Account Number
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples 4558 XXXX XXXX XXXX (a real card number)
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName PrimaryAccountNumberID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PrimaryAccountNumberID
     */
    public $PrimaryAccountNumberID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Card Account. Network. Identifier
     * @Definition The card network provider.
     * @Cardinality 1
     * @ObjectClass Card Account
     * @PropertyTerm Network
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples “VISA”, “MasterCard”, “American Express”
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName NetworkID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\NetworkID
     */
    public $NetworkID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Card Account. Card Type Code. Code
     * @Definition The type of card.
     * @Cardinality 0..1
     * @ObjectClass Card Account
     * @PropertyTerm Card Type Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @Examples “Debit Card”, “Credit Card”, “Procurement Card”
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CardTypeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CardTypeCode
     */
    public $CardTypeCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Card Account. Validity Start Date. Date
     * @Definition The date from which the card is valid.
     * @Cardinality 0..1
     * @ObjectClass Card Account
     * @PropertyTerm Validity Start Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ValidityStartDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ValidityStartDate
     */
    public $ValidityStartDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Card Account. Expiry Date. Date
     * @Definition The date up to which the card is valid.
     * @Cardinality 0..1
     * @ObjectClass Card Account
     * @PropertyTerm Expiry Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExpiryDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ExpiryDate
     */
    public $ExpiryDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Card Account. Issuer. Identifier
     * @Definition The identifier for the card issuer.
     * @Cardinality 0..1
     * @ObjectClass Card Account
     * @PropertyTerm Issuer
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName IssuerID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\IssuerID
     */
    public $IssuerID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Card Account. Issue Number. Identifier
     * @Definition The card issue number.
     * @Cardinality 0..1
     * @ObjectClass Card Account
     * @PropertyTerm Issue Number
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName IssueNumberID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\IssueNumberID
     */
    public $IssueNumberID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Card Account. CV2. Identifier
     * @Definition The Card Verification Value.
     * @Cardinality 0..1
     * @ObjectClass Card Account
     * @PropertyTerm CV2
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CV2ID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CV2ID
     */
    public $CV2ID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Card Account. Card Chip Code. Code
     * @Definition The distinction between CHIP and MAG STRIPE cards.
     * @Cardinality 0..1
     * @ObjectClass Card Account
     * @PropertyTerm Card Chip Code
     * @RepresentationTerm Code
     * @DataType Chip_ Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CardChipCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CardChipCode
     */
    public $CardChipCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Card Account. Chip_ Application. Identifier
     * @Definition An identifier for the application (AID) on a chip card that provides the information quoted.
     * @Cardinality 0..1
     * @ObjectClass Card Account
     * @PropertyTermQualifier Chip
     * @PropertyTerm Application
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ChipApplicationID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ChipApplicationID
     */
    public $ChipApplicationID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Card Account. Holder. Name
     * @Definition The name of the cardholder.
     * @Cardinality 0..1
     * @ObjectClass Card Account
     * @PropertyTerm Holder
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName HolderName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\HolderName
     */
    public $HolderName;
} // end class CardAccountType
