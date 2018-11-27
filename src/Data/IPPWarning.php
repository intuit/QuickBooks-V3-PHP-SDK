<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPWarning
 * @var IPPWarning
 * @xmlDefinition Detailed data about a warning condition that occurred when a request was processed
 */
class IPPWarning
{

        /**
         * Initializes this object, optionally with pre-defined property values
         *
         * Initializes this object and it's property members, using the dictionary
         * of key/value pairs passed as an optional argument.
         *
         * @param dictionary $keyValInitializers key/value pairs to be populated into object's properties
         * @param boolean    $verbose            specifies whether object should echo warnings
         */
    public function __construct($keyValInitializers = array(), $verbose = false)
    {
        foreach ($keyValInitializers as $initPropName => $initPropVal) {
            if (property_exists('IPPWarning', $initPropName)|| property_exists('QuickBooksOnline\API\Data\IPPWarning', $initPropName)) {
                    $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                        echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }


    /**
     * @Definition Localized standard message associated with the warning
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlName Message
     * @var string
     */
    public $Message;
    /**
     * @Definition Detailed message regarding the warning condition with specifics
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Detail
     * @var string
     */
    public $Detail;
    /**
     * @Definition Warning code, this is a required field
     * @xmlType attribute
     * @xmlName code
     * @var string
     */
    public $code;
    /**
     * @Definition The element (if any) directly involved in the warning (i.e. an ignored element)
     * @xmlType attribute
     * @xmlName element
     * @var string
     */
    public $element;
} // end class IPPWarning
