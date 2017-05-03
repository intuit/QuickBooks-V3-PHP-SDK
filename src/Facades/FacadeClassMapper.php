<?php
namespace QuickBooksOnline\API\Facades;


class FacadeClassMapper
{

    public static function IPPReferenceTypeNameEntity(){
        return [
               //IPPItemLineDetail,IPPPaymentLineDetail,IPPDepositLineDetail
               'ItemRef', 'ClassRef', 'ItemAccountRef', 'InventorySiteRef', 'TaxCodeRef', 'Entity', 'PaymentMethodRef',
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
               'CurrencyRef',
               //IPPTxnTaxDetail
               'DefaultTaxCodeRef','TxnTaxCodeRef',
               //IPPTransaction
               'CreatedByRef','LastModifiedByRef','EntityRef',
               //IPPBill
               'PayerRef','VendorRef','APAccountRef'

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
               'DeliveryInfo'
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
          'Type'  => 'CustomFieldTypeEnum'
       ];
    }

    public static function OtherAntiPatternNameEntity(){
       return [
         'TaxLine' => 'Line',
         'MetaData' => 'ModificationMetaData',
         'BillAddr' => 'PhysicalAddress',
         'ShipAddr' => 'PhysicalAddress',
         'RemitToAddr' => 'PhysicalAddress',
         'BillEmail' => 'EmailAddress',
         'ReplyEmail' => 'EmailAddress'
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
