<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPDescriptionLineDetail
 * @var IPPDescriptionLineDetail
 * @xmlDefinition
                Product: ALL
                Description: Information about
                Description.

 */
class IPPDescriptionLineDetail
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
            if (property_exists('IPPDescriptionLineDetail', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPDescriptionLineDetail', $initPropName)) {
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
                        Product: ALL
                        Description: Date when the service is
                        performed.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ServiceDate
     * @var string
     */
    public $ServiceDate;
    /**
     * @Definition
                        Product: QBO
                        Description: Reference to the TaxCode
                        for description only line.
                        Though it appears that TaxCode is not
                        applicable to DescriptionOnlyLine as there is no amount associated
                        with it, UK and Canada model
                        seems to associate the notion of
                        TaxCode even for just a description line
                        Marking this as QBO only
                        at this time but it looks like applicable for QB in general

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxCodeRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $TaxCodeRef;
    /**
     * @Definition
                        Product: ALL
                        Description: Internal use only:
                        extension place holder for DescriptionLineDetail

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DescriptionLineDetailEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $DescriptionLineDetailEx;
} // end class IPPDescriptionLineDetail
