<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType Transaction
 * @xmlName IPPJournalEntry
 * @var IPPJournalEntry
 * @xmlDefinition Accounting transaction, consists of journal lines,
                each of which is either a debit or a credit. The total of the debits
                must equal the total of the credits.
 */
class IPPJournalEntry extends IPPTransaction
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
            if (property_exists('IPPJournalEntry', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPJournalEntry', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition Indicates that the Journal Entry is
                                after-the-fact entry to make changes to specific accounts.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Adjustment
     * @var boolean
     */
    public $Adjustment;
    /**
     * @Definition Valid only if the company file is set up to use
                                Multi-Currency feature.
                                [b]QuickBooks Notes[/b][br /]
                                At the end
                                of a reporting period, when financial reports need to reflect a
                                current home currency value of the foreign balances, enter a
                                home currency adjustment.
                                Until the home currency value of the foreign balances is recalculated
                                using current exchange rates, reports reflect the home currency
                                value based on the exchange rates used at the time of each
                                transaction.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName HomeCurrencyAdjustment
     * @var boolean
     */
    public $HomeCurrencyAdjustment;
    /**
     * @Definition Valid only if the company file is set up to use
                                Multi-Currency feature.
                                [b]QuickBooks Notes[/b][br /]
                                Amounts are
                                always entered in home currency for a HomeCurrencyAdjustment
                                JournalEntry.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName EnteredInHomeCurrency
     * @var boolean
     */
    public $EnteredInHomeCurrency;
    /**
     * @Definition
                                Product: All
                                Description: Indicates the total
                                amount of the transaction. This includes the total of all the
                                charges, allowances and taxes. By default, this is recalculated
                                based on sub items total and overridden.
                                Product: QBW
                                Description: Indicates the total amount of the transaction. This
                                includes the total of all the charges, allowances and taxes.[br
                                /]Calculated by QuickBooks business logic; cannot be written to
                                QuickBooks.
                                Filterable: QBW
                                Sortable: QBW

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TotalAmt
     * @var float
     */
    public $TotalAmt;
    /**
     * @Definition
                                Product: ALL
                                Description: Total amount of the
                                transaction in the home currency for multi-currency enabled
                                companies. Single currency companies will not have this field.
                                Includes the total of all the charges, allowances and taxes.
                                Calculated by QuickBooks business logic. Cannot be written to
                                QuickBooks.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName HomeTotalAmt
     * @var float
     */
    public $HomeTotalAmt;
    /**
     * @Definition Internal use only: extension place holder for
                                JournalEntry
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName JournalEntryEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $JournalEntryEx;
} // end class IPPJournalEntry
