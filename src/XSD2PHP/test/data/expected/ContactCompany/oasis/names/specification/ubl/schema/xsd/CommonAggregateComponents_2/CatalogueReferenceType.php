<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName CatalogueReferenceType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CatalogueReferenceType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Catalogue Reference. Details
 * @xmlDefinition A reference to a Catalogue.
 * @xmlObjectClass Catalogue Reference
 */
class CatalogueReferenceType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Reference. Identifier
     * @Definition An identifier for the Catalogue document.
     * @Cardinality 1
     * @ObjectClass Catalogue Reference
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName ID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ID
     */
    public $ID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Reference. UUID. Identifier
     * @Definition A universally unique identifier for an instance of this ABIE.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Reference
     * @PropertyTerm UUID
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName UUID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\UUID
     */
    public $UUID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Reference. Issue Date. Date
     * @Definition The date when the Catalogue was issued.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Reference
     * @PropertyTerm Issue Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName IssueDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\IssueDate
     */
    public $IssueDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Reference. Issue Time. Time
     * @Definition The time when the Catalogue was issued.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Reference
     * @PropertyTerm Issue Time
     * @RepresentationTerm Time
     * @DataType Time. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName IssueTime
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\IssueTime
     */
    public $IssueTime;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Reference. Revision Date. Date
     * @Definition The date on which the information in the Catalogue was revised.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Reference
     * @PropertyTerm Revision Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RevisionDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RevisionDate
     */
    public $RevisionDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Reference. Revision Time. Time
     * @Definition The time at which the information in the Catalogue was revised.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Reference
     * @PropertyTerm Revision Time
     * @RepresentationTerm Time
     * @DataType Time. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName RevisionTime
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\RevisionTime
     */
    public $RevisionTime;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Reference. Note. Text
     * @Definition A free-text note about the Catalogue. This is used for information which is only human readable.
     * @Cardinality 0..n
     * @ObjectClass Catalogue Reference
     * @PropertyTerm Note
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Note
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Note
     */
    public $Note;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Reference. Description. Text
     * @Definition A description of the Catalogue.
     * @Cardinality 0..n
     * @ObjectClass Catalogue Reference
     * @PropertyTerm Description
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "computer accessories for laptops"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Description
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Description
     */
    public $Description;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Reference. Version. Identifier
     * @Definition Indicates the current version of the Catalogue.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Reference
     * @PropertyTerm Version
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "1.1"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName VersionID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\VersionID
     */
    public $VersionID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Reference. Previous_ Version. Identifier
     * @Definition Indicates the previous version (the version superseded by this Catalogue).
     * @Cardinality 0..1
     * @ObjectClass Catalogue Reference
     * @PropertyTermQualifier Previous
     * @PropertyTerm Version
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "1.0"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PreviousVersionID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PreviousVersionID
     */
    public $PreviousVersionID;
} // end class CatalogueReferenceType
