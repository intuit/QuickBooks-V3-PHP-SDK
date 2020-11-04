<?php
namespace QuickBooksOnline\API\Facades;


class FacadeClassMapper
{

    public static function IPPReferenceTypeNameEntity(){
        return [
               //IPPItemLineDetail,IPPPaymentLineDetail,IPPDepositLineDetail
               'ItemRef', 'ClassRef', 'ItemAccountRef', 'InventorySiteRef', 'TaxCodeRef', 'Entity', 'PaymentMethodRef', 'IntuitObject',
               //IPPTaxLineDetail
               'TaxRateRef',
               //IPPDiscountOverride
               'DiscountRef', 'DiscountAccountRef',
               //IPPAccountBasedExpenseLineDetail
               'CustomerRef', 'AccountRef',
               //IPPItemLineDetail
               'PriceLevelRef','InventorySiteRef',
               //IPPJournalEntryLineDetail
               'DepartmentRef','JournalCodeRef',
               //IPPGroupLineDetail
               'GroupItemRef',
               //IPPTDSLineDetail
               'TDSAccountRef',
               //IPPSalesTransaction
               'RemitToRef','SalesTermRef','SalesRepRef','ShipMethodRef','TemplateRef','ARAccountRef','DepositToAccountRef',
               //IPPTransaction
               'CurrencyRef', 'RecurDataRef',
               //IPPTxnTaxDetail
               'DefaultTaxCodeRef','TxnTaxCodeRef',
               //IPPTransaction
               'CreatedByRef','LastModifiedByRef','EntityRef',
               //IPPBill
               'PayerRef','VendorRef','APAccountRef',
               //IPPAccount
               'ParentRef', 'VendorTypeRef','TermRef', 'PrefillAccountRef',
               //IPPCustomer
               'RootCustomerRef', 'CustomerTypeRef' ,'TaxGroupCodeRef', 'JobTypeRef',
               //IPPBillPayment
               'BankAccountRef','CCAccountRef','ReimbursableInfoRef','DropShipToEntity',
               //Employee
               'EmployeeRef','OtherNameRef','PayrollItemRef',
               //IPPTransfer
               'FromAccountRef','ToAccountRef',
               //IPPItem
               'UOMSetRef','IncomeAccountRef','ExpenseAccountRef','COGSAccountRef','AssetAccountRef','PrefVendorRef','SalesTaxCodeRef','PurchaseTaxCodeRef',
               //IPPCreditMemeo
               'InvoiceRef',
               //IPPCreditCardPaymentTxn
               'CreditCardAccountRef',
               //IPPTaxPayment
               'PaymentAccountRef'

        ];
    }

    public static function IPPIdNameEntity(){
        return [
               //IPPLinkedTxn
               'TxnId', 'TxnLineId',
               //IPPLine
               'Id',
               //IPPCustomField
               'DefinitionId',
               'LineInfo'
        ];
    }


    public static function IgnoredComplexTypeNameEntity(){
        return [
               //IPPItemLineDetail
               'UOMRef',
               //IPPSalesItemLineDetail
               'SalesItemLineDetailEx',
               //IPPTaxLineDetail
               'TaxLineDetailEx',
               //IPPPaymentLineDetail
               'PaymentLineEx',
               //IPPDiscountLineDetail
               'DiscountLineDetailEx',
               //IPPAccountBasedExpenseLineDetail
               'ExpenseDetailLineDetailEx',
               //IPPLine
               'LineEx',
               //IPPDescriptionLineDetail
               'DescriptionLineDetailEx', 'ItemBasedExpenseLineDetailEx', 'PurchaseOrderItemLineDetailEx','SalesItemLineDetailEx','ItemReceiptLineDetailEx',
               //IPPDepositLineDetail, Remove TxnType since it is information only.
               'TxnType',
               //IPPJournalEntryLineDetail
               'JournalEntryLineDetailEx',
               //IPPGroupLineDetail
               'GroupLineDetailEx',
               //IPPTDSLineDetail
               'TDSLineDetailEx',
               //IPPInvoice
               'InvoiceEx',
               //Delivery Info is escaped right now.
               'DeliveryInfo',
               //IPPPurchase
               'PurchaseEx'
        ];
    }
    /**
     * Map an FaceHelper method to corresponding list
     */
    public static function classMethodToList(){
      return [
          'getIPPReferenceTypeBasedOnArray' => FacadeClassMapper::IPPReferenceTypeNameEntity(),
          'getIPPId' => FacadeClassMapper::IPPIdNameEntity()
          //'getIPPDetailTypeEnum' => FacadeClassMapper::allowableEnumDetailTypeString(),
      ];
    }

    public static function EnumTypeMatch(){
       return [
        'DetailType'  =>  'LineDetailTypeEnum',
        'BillableStatus'  =>  'BillableStatusEnum',
        'TaxApplicableOn' =>  'TaxApplicableOnEnum',
        'PostingType' =>  'PostingTypeEnum',
        'EInvoiceStatus' =>  'ETransactionStatusEnum',
          //IPPMemoRef has two fields, however, the id is not used on QBO
        'CustomerMemo' =>  'MemoRef',
        'GlobalTaxCalculation' =>  'GlobalTaxCalculationEnum',
        'PrintStatus' =>  'PrintStatusEnum',
        'EmailStatus' =>  'EmailStatusEnum',
        'PaymentType' => 'PaymentTypeEnum',
        'CCTxnMode' =>  'CCTxnModeEnum',
        'CCTxnType' =>  'CCTxnTypeEnum',
        'CardSecurityCodeMatch' =>  'CCSecurityCodeMatchEnum',
        'AvsStreet' =>  'CCAVSMatchEnum',
        'AvsZip' =>  'CCAVSMatchEnum',
        //Since they are all enum. The Item is IPPItemTypeEnum
        'Type'  => 'CustomFieldTypeEnum',
        'Classification' => 'AccountClassificationEnum',
        'AccountType' => 'AccountTypeEnum',
        'status' => 'EntityStatusEnum',
        'PayType' => 'BillPaymentTypeEnum',
        'POStatus' => 'PurchaseOrderStatusEnum',
        'NameOf' => 'TimeActivityTypeEnum',
        //Gender is a special type of Enum
        'Gender' => 'gender',
        'UseTimeEntry' => 'TimeEntryUsedForPaychecksEnum',
        'SpecialItemType' => 'SpecialItemTypeEnum',
        'TaxTypeApplicable' => 'TaxTypeApplicablityEnum',
        'PostingType' => 'PostingTypeEnum',
        'JournalEntryType' => 'EntityTypeEnum'
       ];
    }

    public static function OtherAntiPatternNameEntity(){
       return [
         'TaxLine' => 'Line',
         'MetaData' => 'ModificationMetaData',
         'BillAddr' => 'PhysicalAddress',
         'ShipAddr' => 'PhysicalAddress',
         'OtherAddr' => 'PhysicalAddress',
         'RemitToAddr' => 'PhysicalAddress',
         'PayeeAddr' => 'PhysicalAddress',
         'VendorAddr' => 'PhysicalAddress',
         'PrimaryAddr' => 'PhysicalAddress',
         'ShipFromAddr' => 'PhysicalAddress',
         'BillEmail' => 'EmailAddress',
         'BillEmailCc' => 'EmailAddress',
         'BillEmailBcc' => 'EmailAddress',
         'ReplyEmail' => 'EmailAddress',
         'POEmail' => 'EmailAddress',
         'SalesEmailCc' => 'EmailAddress',
         //CCDetail was mapped to different entity on BillPaymentCreditCard
         'CCDetail' => 'CreditChargeInfo',
         'PrimaryPhone' => 'TelephoneNumber',
         'AlternatePhone' => 'TelephoneNumber',
         'Mobile' => 'TelephoneNumber',
         'Fax' => 'TelephoneNumber',
         'Telephone' => 'TelephoneNumber',
         'Email' => 'EmailAddress',
         'PrimaryEmailAddr' => 'EmailAddress',
         'WebAddr' => 'WebSiteAddress',
         'WebSite' => 'WebSiteAddress',
         'OtherContactInfo' => 'ContactInfo',
         'OtherContact' => 'GenericContactType',
         'CheckPayment' => 'BillPaymentCheck',
         'CheckDetail' => 'CheckPayment',
         'CreditCardPayment' => 'BillPaymentCreditCard',
         'CashBack' => 'CashBackInfo',
         'ItemGroupLine' => 'ItemComponentLine',
         'ItemAssemblyLine' => 'ItemComponentLine',
         'SalesTaxRateList' => 'TaxRateList',
         'PurchaseTaxRateList' => 'TaxRateList',
         'AdjustmentTaxRateList' => 'TaxRateList',
         //Use JournalEntryEntity to replace Entity
         'JournalEntryEntity' => 'EntityTypeRef',
         'ScheduleInfo' => 'RecurringScheduleInfo'
       ];
    }


    public static function allowableEnumDetailTypeString(){
       return [
                'PaymentLineDetail',
                'DiscountLineDetail',
                'TaxLineDetail',
                'SalesItemLineDetail',
                'DescriptionLineDetail',
                'ItemBasedExpenseLineDetail',
                'AccountBasedExpenseLineDetail',
                'DepositLineDetail',
                'PurchaseOrderItemLineDetail',
                'SalesOrderItemLineDetail',
                'ItemReceiptLineDetail',
                'JournalEntryLineDetail',
                'GroupLineDetail',
                'SubTotalLineDetail',
                'TDSLineDetail'
       ];
    }
}

?>
