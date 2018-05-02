<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPAccount
 * @var IPPAccount
 * @xmlDefinition Account is a component of a Chart Of Accounts, and
                is part of a Ledger. Used to record a total monetary amount
                allocated against a specific use.
                Accounts are one of five basic types: asset, liability, revenue (income),
                expenses, or equity.

 */
class IPPAccount extends IPPIntuitEntity
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
            if (property_exists('IPPAccount', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPAccount', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition User recognizable name for the Account.[br /]
                                Product: ALL
                                Required: ALL
                                Filterable: QBW
                                ValidRange: QBW: Max=31
                                ValidRange: QBO: Max=100

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Name
     * @var string
     */
    public $Name;
    /**
     * @Definition
                                Product: ALL
                                Description: Specifies the Account is a SubAccount or Not. True if
                                subaccount, false or null if it is top-level account

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SubAccount
     * @var boolean
     */
    public $SubAccount;
    /**
     * @Definition
                                Product: ALL
                                Description: Specifies the Parent AccountId if this
                                represents a SubAccount. Else null or empty

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ParentRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $ParentRef;
    /**
     * @Definition
                                Product: ALL
                                Description: User entered
                                description for the account, which may include user entered
                                information to guide bookkeepers/accountants in deciding what
                                journal entries to post to the account.
                                ValidRange: QBW: Max=200
                                ValidRange: QBO: Max=100

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Description
     * @var string
     */
    public $Description;
    /**
     * @Definition
                                Product: ALL
                                Description: Fully qualified name
                                of the entity. The fully qualified name prepends the topmost
                                parent, followed by each sub element separated by colons. Takes
                                the form of: [br /] Parent:Account1:SubAccount1:SubAccount2
                                InputType: ReadOnly

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FullyQualifiedName
     * @var string
     */
    public $FullyQualifiedName;
    /**
     * @Definition
                                Product: ALL
                                Description: Display Name of the
                                account that will be shown in Transaction Forms based on Account
                                Category
                                ValidRange: QBO: Max=100

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AccountAlias
     * @var string
     */
    public $AccountAlias;
    /**
     * @Definition
                                Product: ALL
                                Description: Location Type for the
                                Transaction.
                                ValidRange: QBO: Max=50

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TxnLocationType
     * @var string
     */
    public $TxnLocationType;
    /**
     * @Definition
                                Product: ALL
                                Description: Whether or not active
                                inactive accounts may be hidden from most display purposes and
                                may not be posted to.
                                Filterable: QBW

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Active
     * @var boolean
     */
    public $Active;
    /**
     * @Definition
                                Product: ALL
                                Description: 5 types of
                                classification an account classified. Suggested examples of
                                account type are Asset, Equity, Expense, Liability, Revenue
                                Filterable: QBW

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Classification
     * @var com\intuit\schema\finance\v3\IPPAccountClassificationEnum
     */
    public $Classification;
    /**
     * @Definition
                                Product: ALL
                                Description: Type is a detailed
                                account classification that specifies the use of this account.
                                16 type of account subtypes available in AccountTypeEnum
                                Filterable: QBW
                                Required: ALL

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AccountType
     * @var com\intuit\schema\finance\v3\IPPAccountTypeEnum
     */
    public $AccountType;
    /**
     * @Definition
                                Product: QBO
                                Description: AccountSubTypeEnum
                                specificies QBO on detail type. If not specified default value
                                are listed for each SubType

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AccountSubType
     * @var string
     */
    public $AccountSubType;
    /**
     * @br
     * @ul
                                    1000s: Assets
                                    2000s: Liabilities
                                    3000s: Equity
                                    4000s: Income
                                    5000s: Cost of Sales
                                    6000s, 7000s: Other operating expenses
                                    8000s: Other income
                                    9000s: Other expenses

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AcctNum
     * @var string
     */
    public $AcctNum;
    /**
     * @Definition
                                Product: QBO
                                Description: An extension to the base account number that can be added to
                                Customer A/R or Supplier A/P accounts.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AcctNumExtn
     * @var string
     */
    public $AcctNumExtn;
    /**
     * @Definition
                                Product: QBW
                                Description: Bank Account Number,
                                should include routing number whatever else depending upon the
                                context, this may be the credit card number or the checking
                                account number, etc.
                                ValidRange: QBW: max=25

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName BankNum
     * @var string
     */
    public $BankNum;
    /**
     * @Definition
                                Product: ALL
                                Description: Specifies the Opening
                                Balance amount when creating a new Balance Sheet account.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName OpeningBalance
     * @var float
     */
    public $OpeningBalance;
    /**
     * @Definition
                                Product: ALL
                                Description: Specifies the Date of
                                the Opening Balance amount when creating a new Balance Sheet
                                account.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName OpeningBalanceDate
     * @var string
     */
    public $OpeningBalanceDate;
    /**
     * @Definition
                                Product: ALL
                                Description: Specifies the balance
                                amount for the current Account. Valid for Balance Sheet
                                accounts.
                                InputType: QBW: ReadOnly

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CurrentBalance
     * @var float
     */
    public $CurrentBalance;
    /**
     * @Definition
                                Product: ALL
                                Description: Specifies the
                                cumulative balance amount for the current Account and all its
                                sub-accounts.
                                InputType: QBW: ReadOnly

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CurrentBalanceWithSubAccounts
     * @var float
     */
    public $CurrentBalanceWithSubAccounts;
    /**
     * @Definition
                                Product: ALL
                                Description: Reference to the
                                Currency that this account will hold the amounts in.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CurrencyRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $CurrencyRef;
    /**
     * @Definition
                                Product: ALL
                                Description: Describes if the
                                account is taxable

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxAccount
     * @var boolean
     */
    public $TaxAccount;
    /**
     * @Definition
                                Product: QBW
                                Description: If the account is
                                taxable, refers to taxcode reference if applicable
                                I18n: QBW:
                                GlobalOnly

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
                                Description: Indicates if the
                                Account is linked with Online Banking feature (automatically
                                download transactions) of QuickBooks Online or QuickBooks
                                Desktop. Null or false indicates not linked with online banking.
                                True if Online banking based download is enabled for this
                                account.
                                InputType: ALL: ReadOnly

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName OnlineBankingEnabled
     * @var boolean
     */
    public $OnlineBankingEnabled;
    /**
     * @Definition
                                Product: ALL
                                Description: Indicates the name of
                                financial institution name if Account is linked with Online
                                banking. Valid only if account is online banking enabled. This
                                is optional and read-only.
                                InputType: ALL: ReadOnly

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FIName
     * @var string
     */
    public $FIName;
    /**
     * @Definition
                                Product: QBO
                                Description: The Journal Code that is associated with the account. This is
                                required only for Bank accounts. This is applicable only in FR.
                                InputType: ALL: ReadOnly

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName JournalCodeRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $JournalCodeRef;
    /**
     * @Definition
                                Product: ALL
                                Description: extension place holder
                                for Account.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AccountEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $AccountEx;
} // end class IPPAccount
