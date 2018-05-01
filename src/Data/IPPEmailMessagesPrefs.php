<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPEmailMessagesPrefs
 * @var IPPEmailMessagesPrefs
 * @xmlDefinition Defines Messages Prefs details
 */
class IPPEmailMessagesPrefs
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
            if (property_exists('IPPEmailMessagesPrefs', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPEmailMessagesPrefs', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition  Specifies Preferences classified as email
                        messages are classified as Name-Value pair

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName NameValue
     * @var com\intuit\schema\finance\v3\IPPNameValue
     */
    public $NameValue;
    /**
     * @Definition
                        Product:QBO
                        Default email subject and message for
                        Invoice.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName InvoiceMessage
     * @var com\intuit\schema\finance\v3\IPPEmailMessage
     */
    public $InvoiceMessage;
    /**
     * @Definition
                        Product:QBO
                        Default email subject and message for
                        Estimate.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName EstimateMessage
     * @var com\intuit\schema\finance\v3\IPPEmailMessage
     */
    public $EstimateMessage;
    /**
     * @Definition
                        Product:QBO
                        Default email subject and message for
                        Sales receipt.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SalesReceiptMessage
     * @var com\intuit\schema\finance\v3\IPPEmailMessage
     */
    public $SalesReceiptMessage;
    /**
     * @Definition
                        Product:QBO
                        Default email subject and message for
                        Statement.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName StatementMessage
     * @var com\intuit\schema\finance\v3\IPPEmailMessage
     */
    public $StatementMessage;
} // end class IPPEmailMessagesPrefs
