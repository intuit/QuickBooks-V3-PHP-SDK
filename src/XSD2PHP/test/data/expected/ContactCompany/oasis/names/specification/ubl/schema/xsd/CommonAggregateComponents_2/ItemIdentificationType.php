<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName ItemIdentificationType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\ItemIdentificationType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Item Identification. Details
 * @xmlDefinition Information about item identification.
 * @xmlObjectClass Item Identification
 */
class ItemIdentificationType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Item Identification. Identifier
     * @Definition An identifier for an item.
     * @Cardinality 1
     * @ObjectClass Item Identification
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @Examples "CUST001" "3333-44-123"
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
     * @DictionaryEntryName Item Identification. Extended_ Identifier. Identifier
     * @Definition An extended identifier for the item that identifies the item with specific properties, e.g., Item 123 = Chair / Item 123 Ext 45 = brown chair.
     * @Cardinality 0..1
     * @ObjectClass Item Identification
     * @PropertyTermQualifier Extended
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ExtendedID
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\ExtendedID
     */
    public $ExtendedID;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item Identification. Physical Attribute
     * @Definition An association to Physical Attribute.
     * @Cardinality 0..n
     * @ObjectClass Item Identification
     * @PropertyTerm Physical Attribute
     * @AssociatedObjectClass Physical Attribute
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName PhysicalAttribute
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\PhysicalAttribute
     */
    public $PhysicalAttribute;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item Identification. Measurement_ Dimension. Dimension
     * @Definition An association to Measurement Dimension.
     * @Cardinality 0..n
     * @ObjectClass Item Identification
     * @PropertyTermQualifier Measurement
     * @PropertyTerm Dimension
     * @AssociatedObjectClass Dimension
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName MeasurementDimension
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\MeasurementDimension
     */
    public $MeasurementDimension;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Item Identification. Issuer_ Party. Party
     * @Definition An association to Issuer Party i.e. the Party that issued the Item Identification.
     * @Cardinality 0..1
     * @ObjectClass Item Identification
     * @PropertyTermQualifier Issuer
     * @PropertyTerm Party
     * @AssociatedObjectClass Party
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName IssuerParty
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\IssuerParty
     */
    public $IssuerParty;
} // end class ItemIdentificationType
