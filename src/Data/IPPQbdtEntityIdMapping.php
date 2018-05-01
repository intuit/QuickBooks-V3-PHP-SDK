<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPQbdtEntityIdMapping
 * @var IPPQbdtEntityIdMapping
 * @xmlDefinition Provides the mapping between ListId and TxnId in
                Desktop to the same Entity Id in QBO. These mappings are available
                for only companies that have migrated from Desktop to QBO

 */
class IPPQbdtEntityIdMapping extends IPPIntuitEntity
{

        /**
        * Initializes this object, optionally with pre-defined property values
        *
        * Initializes this object and it's property members, using the dictionary
        * of key/value pairs passed as an optional argument.
        *
        * @param dictionary $keyValInitializers key/value pairs to be populated into object's properties
        * @param boolean $verbose specifies whether object should echo warnings
        */
    public function __construct($keyValInitializers = array(), $verbose = false)
    {
        foreach ($keyValInitializers as $initPropName => $initPropVal) {
            if (property_exists('IPPQbdtEntityIdMapping', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPQbdtEntityIdMapping', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition
                                Product: QBO
                                Description: The Id of the QBO Entity. This id is accepted by V3 APIs. They
                                uniquely identify the entity in QBO for that company.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName QboEntityId
     * @var string
     */
    public $QboEntityId;
    /**
     * @Definition
                                Product: QBO
                                Description: The ListId or TxnId of the QB Desktop Entity. They uniquely
                                identify the entity in QB Desktop for that company.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName QbdtExportableId
     * @var string
     */
    public $QbdtExportableId;
    /**
     * @Definition
                                Product: QBO
                                Description: The entity type name of the entity in QBO. Refer
                                QboEntityTypeEnum for all the values.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName QboEntityType
     * @var string
     */
    public $QboEntityType;
    /**
     * @Definition
                                Product: QBO
                                Description: The entity type name of the entity in QBO. Refer
                                QbdtEntityTypeEnum for all the values.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 1
     * @xmlMaxOccurs 1
     * @xmlName QbdtEntityType
     * @var string
     */
    public $QbdtEntityType;
} // end class IPPQbdtEntityIdMapping
