<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName CatalogueRequestLineType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\CatalogueRequestLineType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Catalogue Request Line. Details
 * @xmlDefinition The basic element of Catalogue; something that can be bought.
 * @xmlObjectClass Catalogue Request Line
 */
class CatalogueRequestLineType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Request Line. Identifier
     * @Definition A unique instance identifier for the line in this Catalogue document.
     * @Cardinality 1
     * @ObjectClass Catalogue Request Line
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "1"
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
     * @DictionaryEntryName Catalogue Request Line. Contract Subdivision. Text
     * @Definition Identifies a subdivision of a contract or tender.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Request Line
     * @PropertyTerm Contract Subdivision
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "Installation", "Phase One", Support and Maintenance"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ContractSubdivision
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ContractSubdivision
     */
    public $ContractSubdivision;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Catalogue Request Line. Note. Text
     * @Definition Free-text note used for non-structured information about the line in the specific Catalogue document (intended to be human readable).
     * @Cardinality 0..n
     * @ObjectClass Catalogue Request Line
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
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Request Line. Line Validity_ Period. Period
     * @Definition The period for which the Catalogue Line is valid.
     * @Cardinality 0..1
     * @ObjectClass Catalogue Request Line
     * @PropertyTermQualifier Line Validity
     * @PropertyTerm Period
     * @AssociatedObjectClass Period
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LineValidityPeriod
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LineValidityPeriod
     */
    public $LineValidityPeriod;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Request Line. Required_ Item Location Quantity. Item Location Quantity
     * @Definition An association to the description of properties related to locations and quantities of the item.
     * @Cardinality 0..n
     * @ObjectClass Catalogue Request Line
     * @PropertyTermQualifier Required
     * @PropertyTerm Item Location Quantity
     * @AssociatedObjectClass Item Location Quantity
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName RequiredItemLocationQuantity
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\RequiredItemLocationQuantity
     */
    public $RequiredItemLocationQuantity;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Catalogue Request Line. Item
     * @Definition An association to the Item itself.
     * @Cardinality 1
     * @ObjectClass Catalogue Request Line
     * @PropertyTerm Item
     * @AssociatedObjectClass Item
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName Item
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Item
     */
    public $Item;
} // end class CatalogueRequestLineType
