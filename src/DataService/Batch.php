<?php
/*******************************************************************************
 * Copyright (c) 2017 Intuit
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *******************************************************************************/
namespace QuickBooksOnline\API\DataService;

use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Exception\IdsExceptionManager;
use QuickBooksOnline\API\Exception\IdsException;
use QuickBooksOnline\API\Exception\IdsError;
use QuickBooksOnline\API\Exception\ValidationException;
use QuickBooksOnline\API\Exception\ServiceException;
use QuickBooksOnline\API\Exception\SecurityException;
use QuickBooksOnline\API\Core\CoreHelper;
use QuickBooksOnline\API\Data\IPPBatchItemRequest;
use QuickBooksOnline\API\Data\IPPIntuitBatchRequest;
use QuickBooksOnline\API\Core\CoreConstants;
use QuickBooksOnline\API\Core\HttpClients\SyncRestHandler as RestServiceSyncRestHandler;
use QuickBooksOnline\API\Diagnostics\TraceLevel;
use QuickBooksOnline\API\Core\HttpClients\RequestParameters;
use QuickBooksOnline\API\Utility\UtilityConstants;

/**
 * This class contains code for Batch Processing.
 */
class Batch
{

    /**
     * batch requests
     * @var array batchRequests
     */
    private $batchRequests;

    /**
     * batch responses
     * @deprecated
     * @var array batchResponses
     */
    private $batchResponses;

    /**
     * Intuit batch item responses list.
     * @var array batchResponses
     */
    public $intuitBatchItemResponses;

    /**
     * service context object.
     * @var ServiceContext serviceContext
     */
    private $serviceContext;

    /**
     * rest handler object.
     * @var IRestHandler restHandler
     */
    private $restHandler;

    /**
     * serializer to be used.
     * @var IEntitySerializer responseSerializer
     */
    private $responseSerializer;

    /**
    * If not false, the request from last dataService did not return 2xx
    * @var FalutHandler
    */
    private $lastError = false;

    /**
    * Throw Exception on Error or not. Default is false.
    * @var boolean
    */
    private $isThrowExceptionOnError = false;

    /**
    * Get the error from last request
    * @return lastError
    */
    public function getLastError()
    {
        return $this->lastError;
    }

    /**
     * Initializes a new instance of the Batch class.
     * @param $serviceContext The service context.
     * @param $restHandler The rest handler.
     */
    public function __construct($serviceContext, $restHandler, $isThrowExceptionOnError)
    {
        $this->serviceContext = $serviceContext;
        $this->restHandler = $restHandler;
        $this->isThrowExceptionOnError = $isThrowExceptionOnError;
        $this->responseSerializer = CoreHelper::GetSerializer($this->serviceContext, false);
        $this->batchRequests = array();
        $this->batchResponses = array();
        $this->intuitBatchItemResponses = array();
    }

    /**
     * Gets the count.
     * @return int count
     */
    public function Count()
    {
        return count($this->batchRequests);
    }

    /**
     * Gets list of entites in case ResponseType is Report.
     */
    public function ReadOnlyCollection()
    {
        return $this->intuitBatchItemResponses;
    }

    /**
     * Gets the IntuitBatchResponse with the specified id.
     * @param string $id unique batchitem id
     */
    public function IntuitBatchResponse($id)
    {
        if(array_key_exists($id, $this->intuitBatchItemResponses)){
            return $this->intuitBatchItemResponses[$id];
        }else{
            return null;
        }
    }

    /**
     * Adds the specified query.
     * @param string $query IDS query.
     * @param string $id unique batchitem id.
     */
    public function AddQuery($query, $id)
    {
        if (!$query) {
            $exception = new IdsException('StringParameterNullOrEmpty: query');
            IdsExceptionManager::HandleException($exception);
        }

        if (!$id) {
            $exception = new IdsException('StringParameterNullOrEmpty: id');
            IdsExceptionManager::HandleException($exception);
        }

        if (count($this->batchRequests)>25) {
            $exception = new IdsException('BatchItemsExceededException');
            IdsExceptionManager::HandleException($exception);
        }

        $batchItem = new IPPBatchItemRequest();
        $batchItem->Query = $query;
        $batchItem->bId = $id;
        $batchItem->operationSpecified = true;
        //$batchItem->ItemElementName = ItemChoiceType6::Query;
        $this->batchRequests[] = $batchItem;
    }


    /**
     * Adds the specified query.
     * @param IEntity entity entitiy for the batch operation.
     * @param string id Unique batchitem id
     * @param OperationEnum operation operation to be performed for the entity.
     */
     public function AddEntity($entity, $id, $operation)
     {
         if (!$entity) {
             $exception = new IdsException('StringParameterNullOrEmpty: entity');
             IdsExceptionManager::HandleException($exception);
         }

         if (!$id) {
             $exception = new IdsException('StringParameterNullOrEmpty: id');
             IdsExceptionManager::HandleException($exception);
         }

         if (!$operation) {
             $exception = new IdsException('StringParameterNullOrEmpty: operation');
             IdsExceptionManager::HandleException($exception);
         }

         foreach ($this->batchRequests as $oneBatchRequest) {
             if ($oneBatchRequest->bId == $id) {
                 $exception = new IdsException('BatchIdAlreadyUsed');
                 IdsExceptionManager::HandleException($exception);
             }
         }

         $batchItem = new IPPBatchItemRequest();
         $batchItem->IntuitObject = $entity;
         $batchItem->bId = $id;
         $batchItem->operation = $operation;
         $batchItem->operationSpecified = true;

         $this->batchRequests[] = $batchItem;
     }


    /**
     * Removes batchitem with the specified batchitem id.
     * @param string id unique batchitem id
     */
    public function Remove($id)
    {
        if (!$id) {
            $exception = new IdsException('BatchItemIdNotFound: id');
            IdsExceptionManager::HandleException($exception);
        }

        $revisedBatchRequests = array();
        foreach ($this->batchRequests as $oneBatchRequest) {
            if ($oneBatchRequest->bId == $id) {
                // Exclude
            } else {
                $revisedBatchRequests[] = $oneBatchRequest;
            }
        }
        $this->batchRequests = $revisedBatchRequests;
    }

    /**
     * Remove all the batchitem requests.
     */
    public function RemoveAll()
    {
        $this->batchRequests = array();
    }


    /**
     * This method executes the batch request.
     */
    public function Execute()
    {
        $this->serviceContext->IppConfiguration->Logger->CustomLogger->Log(TraceLevel::Info, "Started Executing Method Execute for Batch");

        // Create Intuit Batch Request
        $intuitBatchRequest = new IPPIntuitBatchRequest();
        $intuitBatchRequest->BatchItemRequest = $this->batchRequests;

        $uri = "company/{1}/batch?requestid=" . rand() . rand();
        $uri = str_replace('{1}', $this->serviceContext->realmId, $uri);

        // Creates request parameters
        $requestParameters = new RequestParameters($uri, 'POST', CoreConstants::CONTENTTYPE_APPLICATIONXML, null);

        $restRequestHandler = $this->getRestHandler();
        try {
            // Get literal XML representation of IntuitBatchRequest into a DOMDocument
            $httpsPostBodyPreProcessed = XmlObjectSerializer::getPostXmlFromArbitraryEntity($intuitBatchRequest, $urlResource);
            $doc = new \DOMDocument();
            $domObj = $doc->loadXML($httpsPostBodyPreProcessed);
            $xpath = new \DOMXpath($doc);

            // Replace generically-named IntuitObject nodes with tags that describe contained objects
            $objectIndex = 0;
            while (1) {
                $matchingElementArray = $xpath->query("//IntuitObject");
                if (is_null($matchingElementArray)) {
                    break;
                }

                if ($objectIndex>=count($intuitBatchRequest->BatchItemRequest)) {
                    break;
                }

                foreach ($matchingElementArray as $oneNode) {

                    // Found a DOMNode currently named "IntuitObject".  Need to rename to
                    // entity that describes it's contents, like "ns0:Customer" (determine correct
                    // name by inspecting IntuitObject's class).
                    if ($intuitBatchRequest->BatchItemRequest[$objectIndex]->IntuitObject) {
                        // Determine entity name to use
                        $entityClassName = get_class($intuitBatchRequest->BatchItemRequest[$objectIndex]->IntuitObject);
                        $entityTransferName = XmlObjectSerializer::cleanPhpClassNameToIntuitEntityName($entityClassName);
                        $entityTransferName = 'ns0:'.$entityTransferName;

                        // Replace old-named DOMNode with new-named DOMNode
                        $newNode = $oneNode->ownerDocument->createElement($entityTransferName);
                        if ($oneNode->attributes->length) {
                            foreach ($oneNode->attributes as $attribute) {
                                $newNode->setAttribute($attribute->nodeName, $attribute->nodeValue);
                            }
                        }
                        while ($oneNode->firstChild) {
                            $newNode->appendChild($oneNode->firstChild);
                        }
                        $oneNode->parentNode->replaceChild($newNode, $oneNode);
                    }
                    break;
                }
                $objectIndex++;
            }
            $httpsPostBody = $doc->saveXML();
            list($responseCode, $responseBody) = $restRequestHandler->sendRequest($requestParameters, $httpsPostBody, null, $this->isThrowExceptionOnError);
            $faultHandler = $restRequestHandler->getFaultHandler();
            if ($faultHandler) {
                $this->lastError = $faultHandler;
                return null;
            }else{
                $this->lastError = false;
            }
        } catch (\Exception $e) {
            IdsExceptionManager::HandleException($e);
        }

        try {
            // No JSON support here yet
            // de serialize object
            $responseXmlObj = simplexml_load_string($responseBody);
            foreach ($responseXmlObj as $oneXmlObj) {
                // process batch item
                $intuitBatchItemResponse = $this->ProcessBatchItemResponse($oneXmlObj);
                $this->intuitBatchItemResponses[$intuitBatchItemResponse->batchItemId] = $intuitBatchItemResponse;
            }
        } catch (Exception $e) {
            var_dump($e->getMessage(), $e->getLine());
            return null;
        }

        $this->serviceContext->IppConfiguration->Logger->CustomLogger->Log(TraceLevel::Info, "Finished Execute method for batch.");
    }


    /**
     * Returns handler to communicate with service
     * @return RestHandler
     */
    protected function getRestHandler()
    {
        return $this->restHandler;
    }

    private function verifyFault($fault)
    {
        if ($fault == null) {
            return null;
        }
        if (empty($fault)) {
            return null;
        }
        if (!$fault instanceof \SimpleXMLElement) {
            return null;
        }
        if (!$fault->attributes() instanceof \SimpleXMLElement) {
            return null;
        }
        if (!isset($fault->attributes()->type)) {
            return null;
        }

        return true;
    }

    private function collectErrors($fault)
    {
        $errors = array();
        if (isset($fault->Error)
                && ($fault->Error instanceof \SimpleXMLElement)
                && $fault->Error->count()) {
            foreach ($fault->Error as $item) {
                if (!isset($item->Message)) {
                    continue;
                }
                if (!$item->Message instanceof \SimpleXMLElement) {
                    continue;
                }
                $error = new \stdClass();
                $error->message = (string)$item->Message;
                $error->code = null;
                if ($item->attributes() instanceof \SimpleXMLElement
                            && isset($item->attributes()->code)) {
                    $error->code = (string)$item->attributes()->code;
                }
                $errors[] =$error;
            }
        }
        return $errors;
    }

    /**
     * Helper function for store the error message and code from Fault returned from QuickBooks Online
     */
    private function arrayToMessageAndCode(array $array)
    {
        if (empty($array)) {
            return array(null,null);
        }
        if (1 == count($array)) {
            $item = array_pop($array);
            return array($item->message,$item->code);
        }

        $message = "";
        $code = "";
        foreach ($array as $item) {
            $message .= "Exception: ".$item->message . "\n";
            if (empty($code) && !empty($item->code)) {
                $code = $item->code;
            }
        }
        return array($message,$code);
    }

    /**
     * Prepare IdsException out of Fault object.
     * @param Fault fault Fault object.
     * @return IdsException IdsException object.
     */
     public function IterateFaultAndPrepareException($fault)
     {
         if (!$this->verifyFault($fault)) {
             return null;
         }
            // Collect information from XML entity
            $type = (string)$fault->attributes()->type;
         list($message, $code) = $this->arrayToMessageAndCode($this->collectErrors($fault));
         if (is_null($message)) {
             return new IdsException("Fault Exception of type: " . $type . " has been generated.");
         }
         $idsException = null;


            // Fault types can be of Validation, Service, Authentication and Authorization. Run them through the switch case.
            switch ($type) {
                // If Validation errors iterate the Errors and add them to the list of exceptions.
                case "Validation":
                case "ValidationFault":
                        // Throw specific exception like ValidationException.
                        $idsException = new ValidationException($message, $code);
                    break;
                // If Validation errors iterate the Errors and add them to the list of exceptions.
                case "Service":
                case "ServiceFault":
                        // Throw specific exception like ServiceException.
                        $idsException = new ServiceException($message, $code);
                    break;
                // If Validation errors iterate the Errors and add them to the list of exceptions.
                case "Authentication":
                case "AuthenticationFault":
                case "Authorization":
                case "AuthorizationFault":
                        $idsException = new SecurityException($message, $code);
                    break;
                // Use this as default if there was some other type of Fault
                default:
                        $idsException = new IdsException($message, $code);

            }


        // Return idsException which will be of type Validation, Service or Security.
        return $idsException;
     }

    /**
     * process batch item response
     * @param BatchItemResponse oneXmlObj The batchitem response.
     * @return IntuitBatchResponse IntuitBatchResponse object.
     */
    private function ProcessBatchItemResponse($oneXmlObj)
    {
        $result = new IntuitBatchResponse();
        if (null==$oneXmlObj) {
            return $result;
        }

        if(isset($oneXmlObj["bId"])){
            $bid = (String)$oneXmlObj["bId"];
            $result->batchItemId = $bid;
        }else{
            throw new \Exception("No bid Found on the Batch Response.");
        }

        $firstChild = null;
        foreach ($oneXmlObj->children() as $oneChild) {
            $firstChild = $oneChild;
            break;
        }
        if (!$firstChild) {
            return $result;
        }

        $firstChildName = (string)$firstChild->getName();

        switch ($firstChildName) {
              //For batch query result
              case "QueryResponse":
                  $result->responseType = UtilityConstants::Query;
                  $queryResult = array();
                  foreach ($oneXmlObj->QueryResponse->children() as $oneResponse) {
                      $oneEntity = $this->responseSerializer->Deserialize('<RestResponse>'.$oneResponse->asXML().'</RestResponse>');
                      $queryResult = array_merge($queryResult, $oneEntity);
                  }
                  $result->setEntities($queryResult);
                  $result->successFlagOn();
                  break;
              //For batch failure result
              case "Fault":
                  $result->responseType = UtilityConstants::Exception;
                  $idsException = $this->IterateFaultAndPrepareException($firstChild);
                  $result->exception = $idsException;
                  break;
              //For batch Entity Result
              default:
                  $result->responseType = UtilityConstants::Entity;
                  $oneEntityArray = $this->responseSerializer->Deserialize('<RestResponse>'.$firstChild->asXML().'</RestResponse>');
                  $oneEntity = $oneEntityArray[0];
                  $result->entity = $oneEntity;
                  $result->successFlagOn();
                  break;
        }

        return $result;
    }
}
