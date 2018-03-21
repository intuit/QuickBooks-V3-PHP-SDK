<?php
namespace oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;

/**
 * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
 * @xmlType
 * @xmlName AddressType
 * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AddressType
 * @xmlComponentType ABIE
 * @xmlDictionaryEntryName Address. Details
 * @xmlDefinition Information about a structured address.
 * @xmlObjectClass Address
 */
class AddressType
{

    
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Identifier
     * @Definition An identifier for a specific address within a scheme of registered addresses.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Identifier
     * @RepresentationTerm Identifier
     * @DataType Identifier. Type
     * @AlternativeBusinessTerms DetailsKey
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
     * @DictionaryEntryName Address. Address Type Code. Code
     * @Definition A code specifying the type of this address, such as business address or home address.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Address Type Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AddressTypeCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AddressTypeCode
     */
    public $AddressTypeCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Address Format Code. Code
     * @Definition A code specifying the format of this address.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Address Format Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AddressFormatCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AddressFormatCode
     */
    public $AddressFormatCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Postbox. Text
     * @Definition A post office box number.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Postbox
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms PostBox, PO Box
     * @Examples "123"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Postbox
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Postbox
     */
    public $Postbox;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Floor. Text
     * @Definition An addressable floor of a building.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Floor
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms SubPremiseNumber
     * @Examples "30"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Floor
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Floor
     */
    public $Floor;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Room. Text
     * @Definition A room, suite, or apartment of a building.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Room
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms SubPremiseNumber
     * @Examples "Reception"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Room
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Room
     */
    public $Room;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Street Name. Name
     * @Definition The name of a street.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Street Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @AlternativeBusinessTerms Thoroughfare
     * @Examples "Kwun Tong Road"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName StreetName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\StreetName
     */
    public $StreetName;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Additional_ Street Name. Name
     * @Definition An additional name of a street used to further specify the street name.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTermQualifier Additional
     * @PropertyTerm Street Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @AlternativeBusinessTerms Thoroughfare
     * @Examples "Cnr Aberdeen Road"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AdditionalStreetName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\AdditionalStreetName
     */
    public $AdditionalStreetName;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Block Name. Name
     * @Definition The block name, expressed as text, for an area surrounded by streets and usually containing several buildings for this address.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Block Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @Examples Seabird
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName BlockName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\BlockName
     */
    public $BlockName;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Building Name. Name
     * @Definition The name of a building.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Building Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @AlternativeBusinessTerms BuildingName
     * @Examples "Plot 421"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName BuildingName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\BuildingName
     */
    public $BuildingName;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Building Number. Text
     * @Definition The number of a building.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Building Number
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms PremiseNumber
     * @Examples "388"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName BuildingNumber
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\BuildingNumber
     */
    public $BuildingNumber;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Inhouse_ Mail. Text
     * @Definition A specific location within a building.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTermQualifier Inhouse
     * @PropertyTerm Mail
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms MailStop
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName InhouseMail
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\InhouseMail
     */
    public $InhouseMail;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Department. Text
     * @Definition An addressable department of an organization.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Department
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms Department
     * @Examples "Accounts Payable"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Department
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Department
     */
    public $Department;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Mark Attention. Text
     * @Definition The name, expressed as text, of a person or department in the organization to whom incoming mail is marked with words such as 'for the attention of' or 'FAO' or 'ATTN' for this address.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Mark Attention
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MarkAttention
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MarkAttention
     */
    public $MarkAttention;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Mark Care. Text
     * @Definition The name, expressed as text, of a person or organization at this address to whom incoming mail is marked with words such as 'care of' or 'C/O'.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Mark Care
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName MarkCare
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\MarkCare
     */
    public $MarkCare;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Plot Identification. Text
     * @Definition The textual expression of the unique identifier for the piece of land on which this address is located such as a plot number.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Plot Identification
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PlotIdentification
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PlotIdentification
     */
    public $PlotIdentification;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. City Subdivision Name. Name
     * @Definition A name, expressed as text, of a subdivision of a city for this address, for example, a district or borough.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm City Subdivision Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CitySubdivisionName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CitySubdivisionName
     */
    public $CitySubdivisionName;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. City Name. Name
     * @Definition The name of a city, town, or village.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm City Name
     * @RepresentationTerm Name
     * @DataType Name. Type
     * @AlternativeBusinessTerms LocalityName
     * @Examples "Hong Kong"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CityName
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CityName
     */
    public $CityName;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Postal_ Zone. Text
     * @Definition The identifier for an addressable group of properties according to the relevant national postal service, such as a ZIP code or Post Code.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTermQualifier Postal
     * @PropertyTerm Zone
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms PostalCodeNumber
     * @Examples "SW11 4EW" "2500 GG"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PostalZone
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\PostalZone
     */
    public $PostalZone;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Country Subentity. Text
     * @Definition A territorial division of a country, such as a county or state.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Country Subentity
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms AdministrativeArea, State, Country, Shire, Canton
     * @Examples "Florida","Tamilnadu"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CountrySubentity
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CountrySubentity
     */
    public $CountrySubentity;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Country Subentity Code. Code
     * @Definition A territorial division of a country, such as a county or state, expressed as a code.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Country Subentity Code
     * @RepresentationTerm Code
     * @DataType Code. Type
     * @AlternativeBusinessTerms AdministrativeAreaCode, State Code
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CountrySubentityCode
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\CountrySubentityCode
     */
    public $CountrySubentityCode;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Region. Text
     * @Definition An addressable region or group of countries.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Region
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms LocalityName, Economic Zone
     * @Examples "European Union"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Region
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\Region
     */
    public $Region;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. District. Text
     * @Definition A geographical division of a country.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm District
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @AlternativeBusinessTerms LocalityName, Area
     * @Examples "East Coast"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName District
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\District
     */
    public $District;
    /**
     * @ComponentType BBIE
     * @DictionaryEntryName Address. Timezone Offset. Text
     * @Definition For the time zone in which the address is situated, the measure of time offset from Universal Coordinated Time (UTC).
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Timezone Offset
     * @RepresentationTerm Text
     * @DataType Text. Type
     * @Examples "+8:00" "-3:00"
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TimezoneOffset
     * @var oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2\TimezoneOffset
     */
    public $TimezoneOffset;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Address. Address Line
     * @Definition An association to Address Line.
     * @Cardinality 0..n
     * @ObjectClass Address
     * @PropertyTerm Address Line
     * @AssociatedObjectClass Address Line
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName AddressLine
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\AddressLine
     */
    public $AddressLine;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Address. Country
     * @Definition An association to Country.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Country
     * @AssociatedObjectClass Country
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Country
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\Country
     */
    public $Country;
    /**
     * @ComponentType ASBIE
     * @DictionaryEntryName Address. Location Coordinate
     * @Definition An association to Location Coordinate.
     * @Cardinality 0..1
     * @ObjectClass Address
     * @PropertyTerm Location Coordinate
     * @AssociatedObjectClass Location Coordinate
     * @xmlType element
     * @xmlNamespace urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LocationCoordinate
     * @var oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2\LocationCoordinate
     */
    public $LocationCoordinate;
} // end class AddressType
