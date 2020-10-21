<?php
declare(strict_types=1);
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Facades\Payment;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Data\IPPCreditCardPaymentTxn;
use QuickBooksOnline\API\Data\IPPReferenceType;

class DataServiceTest
{

    private $dataService;

    private function setUp()
    {
        $this->dataService = QuickBooksOnline\API\DataService\DataService::Configure(array(
          'auth_mode'       => 'oauth2',
          'ClientID'        => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
          'ClientSecret'    => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
          'accessTokenKey'  => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
          'refreshTokenKey' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
          'QBORealmID'      => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
          'baseUrl'         => "development"
        ));

        $OAuth2LoginHelper = $this->dataService->getOAuth2LoginHelper();

        $this->dataService->setLogLocation("/Users/*/Desktop/newFolderForLog");

        $accessToken = $OAuth2LoginHelper->refreshToken();
        $error = $OAuth2LoginHelper->getLastError();
        if ($error) {
            return false;
        }
        $this->dataService->updateOAuth2Token($accessToken);
    }

    private function testAdd()
    {
        $this->setUp();

        $ccp = new IPPCreditCardPaymentTxn();
        $ccp->TxnDate = "2020-10-15";

        $BankAccountRef = new IPPReferenceType();
        $BankAccountRef->value = "35";
        $BankAccountRef->name = "null";
        $ccp->BankAccountRef = $BankAccountRef;

        $CreditCardAccountRef = new IPPReferenceType();
        $CreditCardAccountRef->value = "41";
        $CreditCardAccountRef->name = "null";
        $ccp->CreditCardAccountRef = $CreditCardAccountRef;
        $ccp->Amount = 10;

        $result = $this->dataService->Add($ccp);

        $error = $this->dataService->getLastError();

        if ($error) {
            return false;
        } elseif ($result->Id != NULL) {
            return $result->Id;
        }
    }

    private function testUpdate($id)
    {
        $ccp = new IPPCreditCardPaymentTxn();
        $ccp->Id = $id;
        $ccpObj = $this->dataService->FindById($ccp, $id);

        $ccpObj->CreditCardAccountRef = 42;
        $result = $this->dataService->Update($ccpObj);

        $error = $this->dataService->getLastError();
        if ($error) {
            return false;
        } elseif ($result->Id != NULL) {
            return $result->Id;
        }
    }

    private function testFindById($id)
    {
        $result = $this->dataService->FindById("CreditCardPaymentTxn", $id);

        $error = $this->dataService->getLastError();
        if ($error) {
            return false;
        } elseif ($result->Id != NULL) {
            return $result->Id;
        }
    }

    private function testDelete($id)
    {
        $creditCardPaymentTxnObj = $this->dataService->FindById("CreditCardPaymentTxn", $id);

        $result = $this->dataService->Delete($creditCardPaymentTxnObj);

        $error = $this->dataService->getLastError();
        if ($error) {
            return false;
        } elseif ($result->Id != NULL) {
            return $result->Id;
        }
    }

    private function testPaymentVoid()
    {
        $payment = Payment::create([
            "SyncToken" => "1",
            "Id"        => "66",
            "sparse"    => true
        ]);

        $result = $this->dataService->void($payment);
        $error  = $this->dataService->getLastError();

        if ($error) {
            return false;
        } elseif ($result->Id != NULL) {
            return $result->Id;
        }
    }

    private function testQuery()
    {
        $result = $this->dataService->Query("Select count(*) from Invoice");
        $error  = $this->dataService->getLastError();

        if ($error) {
            return false;
        } elseif (count($result) > 0) {
            return true;
        }
    }

    public function executeScript()
    {
        $id = $this->testAdd();
        if ($id) {
            $this->testUpdate($id) ?: "\n Error Occurred Performing an Update\n";
            $this->testFindById($id) ?: "\n Error Occurred Performing an FindById\n";
            $this->testDelete($id) ?: "\n Error Occurred Performing an Delete\n";
            $this->testPaymentVoid() ?: "\n Error Occurred Performing a payment void\n";
            $this->testQuery() ?: "\n Error Occurred querying\n";
            echo "\n\n\t\t\t********************\n";
            echo "\t\t\tAll Tests Passed!!!\n";
            echo "\t\t\t********************\n\n\n";
        } else {
            echo "\n Error Occurred Performing an Add\n";
            die();
        }
    }
}

$test = new DataServiceTest();
$test->executeScript();