<?php
namespace QuickBooksOnline\API\DataService;

use QuickBooksOnline\API\Core\CoreHelper;
use QuickBooksOnline\API\Core\Http\Serialization\IEntitySerializer;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Core\HttpClients\FaultHandler;
use QuickBooksOnline\API\Core\HttpClients\RestHandler;
use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\Data\IPPRecurringTransaction;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPRecurringTransaction
 * @var IPPRecurringTransaction
 * @xmlDefinition The Recurrence Transaction Object
 */


/**
 * AdapterClass for recurring transaction
 */
class RecurringTransactionAdapter
{

    /**
     * service context object.
     * @var ServiceContext serviceContext
     */
    private $serviceContext;

    /**
     * rest handler object.
     * @var RestHandler restHandler
     */
    private $restHandler;

    /**
     * serializer to be used.
     * @var IEntitySerializer responseSerializer
     */
    private $responseSerializer;

    /**
     * Throw Exception on Error or not. Default is false.
     * @var boolean
     */
    private $isThrowExceptionOnError = false;

    /**
     * Initializes a new instance of the RecurringTransactionAdapter class.
     * @param $serviceContext The service context.
     * @param $restHandler The rest handler.
     */
    public function __construct($serviceContext, $restHandler, $isThrowExceptionOnError)
    {
        $this->serviceContext = $serviceContext;
        $this->restHandler = $restHandler;
        $this->isThrowExceptionOnError = $isThrowExceptionOnError;
        $this->responseSerializer = CoreHelper::GetSerializer($this->serviceContext, false);
    }

    public static function createRecurringTransactionObject($entity)
    {
        $recurringtxn = new IPPRecurringTransaction();
        $recurringtxn->IntuitObject = $entity;
        return $recurringtxn;
    }

    public static function getRecurringTxnBody($entity)
    {
        $httpsPostBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($entity, $urlResource);
        $entityName = self::getEntityName($entity);
        $httpsPostBody = str_replace('IntuitObject','ns0:'.$entityName,$httpsPostBody);
        return $httpsPostBody;
    }

    public static function getEntityName($entity)
    {
        $xmlEntityName = XmlObjectSerializer::cleanPhpClassNameToIntuitEntityName(get_class($entity->IntuitObject));
        return $xmlEntityName;
    }
}
