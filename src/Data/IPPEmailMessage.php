<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPEmailMessage
 * @var IPPEmailMessage
 * @xmlDefinition
                Product: QBO
                Description: Base type holding default subject and message for transaction emails.

 */
class IPPEmailMessage
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
            if (property_exists('IPPEmailMessage', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPEmailMessage', $initPropName)) {
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
                        Description: Subject for the email

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Subject
     * @var string
     */
    public $Subject;
    /**
     * @Definition
                        Product: QBO
                        Description: Message body for the email

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Message
     * @var string
     */
    public $Message;
} // end class IPPEmailMessage
