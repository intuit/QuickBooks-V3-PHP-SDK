<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ClassificationSchemeType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ClassificationSchemeType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Classification Scheme. Details
 * @xmlDefinition Information about Classification Scheme; a scheme that defines a taxonomy for classifying goods or services.
 * @xmlObjectClass Classification Scheme
 */
class ClassificationSchemeType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Classification Scheme. Identifier
     * @Definition An identifier for the classification scheme.
     * @Cardinality 1
     * @ObjectClass Classification Scheme
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
     * @DictionaryEntryName Classification Scheme. UUID. Identifier
     * @Definition A universally unique identifier for an instance of this ABIE.
     * @Cardinality 0..1
     * @ObjectClass Classification Scheme
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
     * @DictionaryEntryName Classification Scheme. Last_ Revision Date. Date
     * @Definition The date at which the classification scheme was last revised.
     * @Cardinality 0..1
     * @ObjectClass Classification Scheme
     * @PropertyTermQualifier Last
     * @PropertyTerm Revision Date
     * @RepresentationTerm Date
     * @DataType Date. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LastRevisionDate
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LastRevisionDate
     */
    public $LastRevisionDate;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Classification Scheme. Last_ Revision Time. Time
     * @Definition The time at which the classification scheme was last revised.
     * @Cardinality 0..1
     * @ObjectClass Classification Scheme
     * @PropertyTermQualifier Last
     * @PropertyTerm Revision Time
     * @RepresentationTerm Time
     * @DataType Time. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LastRevisionTime
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LastRevisionTime
     */
    public $LastRevisionTime;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Classification Scheme. Note. Text
     * @Definition Free-form text applying to the Classification Scheme. This element may contain notes or any other similar information that is not contained explicitly in another structure.
     * @Cardinality 0..1
     * @ObjectClass Classification Scheme
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
     * @ComponentType BBIE
     * @DictionaryEntryName Classification Scheme. Name
     * @Definition The name of the Classification Scheme.
     * @Cardinality 0..1
     * @ObjectClass Classification Scheme
     * @PropertyTerm Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @Examples "UNSPSC"
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
     * @DictionaryEntryName Classification Scheme. Description. Text
     * @Definition A description of the Classification Scheme.
     * @Cardinality 0..n
     * @ObjectClass Classification Scheme
     * @PropertyTerm Description
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "an open, global multi-sector standard for classification of products and services"
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
     * @DictionaryEntryName Classification Scheme. Agency Identifier. Identifier
     * @Definition Identifies the agency that maintains the Classification Scheme.
     * @Cardinality 0..1
     * @ObjectClass Classification Scheme
     * @PropertyTerm Agency Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples Defaults to the UN/EDIFACT data element 3055 code list.
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AgencyID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AgencyID
     */
    public $AgencyID;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Classification Scheme. Agency Name. Text
     * @Definition The name of the agency that maintains the Classification Scheme.
     * @Cardinality 0..1
     * @ObjectClass Classification Scheme
     * @PropertyTerm Agency Name
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AgencyName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AgencyName
     */
    public $AgencyName;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Classification Scheme. Version. Identifier
     * @Definition Identifies the version of the Classification Scheme.
     * @Cardinality 0..1
     * @ObjectClass Classification Scheme
     * @PropertyTerm Version
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
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
     * @DictionaryEntryName Classification Scheme. URI. Identifier
     * @Definition The Uniform Resource Identifier (URI) that identifies where the Classification is located.
     * @Cardinality 0..1
     * @ObjectClass Classification Scheme
     * @PropertyTerm URI
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName URI
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\URI
     */
    public $URI;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Classification Scheme. Scheme_ URI. Identifier
     * @Definition The Uniform Resource Identifier (URI) that identifies where the Classification Scheme is located.
     * @Cardinality 0..1
     * @ObjectClass Classification Scheme
     * @PropertyTermQualifier Scheme
     * @PropertyTerm URI
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SchemeURI
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\SchemeURI
     */
    public $SchemeURI;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Classification Scheme. Language. Identifier
     * @Definition Identifies the language of the Classification Scheme.
     * @Cardinality 0..1
     * @ObjectClass Classification Scheme
     * @PropertyTerm Language
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LanguageID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\LanguageID
     */
    public $LanguageID;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Classification Scheme. Classification Category
     * @Definition An association to Classification Category.
     * @Cardinality 1..n
     * @ObjectClass Classification Scheme
     * @PropertyTerm Classification Category
     * @AssociatedObjectClass Classification Category
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs unbounded
     * @xmlName ClassificationCategory
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ClassificationCategory
     */
    public $ClassificationCategory;
} // end class ClassificationSchemeType
