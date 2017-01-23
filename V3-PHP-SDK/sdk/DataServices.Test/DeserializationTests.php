<?php
/**
 * This file contains test cases for deserialization
 */
 
require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'Security/OAuthRequestValidator.php');
require_once(PATH_SDK_ROOT . 'Security/RequestValidator.php');
require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/InvalidTokenException.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'Data/IPPPayment.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');

date_default_timezone_set('America/Chicago');

/**
* Tests for Deserialization library
*/
class DeserializationTests extends PHPUnit_Framework_TestCase
{
	/**
	 * test case
	 */
	public function testlinedeserialization()
	{
		try
		{
			$serviceType = IntuitServicesType::QBO;

			$accessToken = ConfigurationManager::AppSettings('AccessToken' . $serviceType);
			$accessTokenSecret = ConfigurationManager::AppSettings('AccessTokenSecret' . $serviceType);
			$consumerKey = ConfigurationManager::AppSettings('ConsumerKey' . $serviceType);
			$consumerSecret = ConfigurationManager::AppSettings('ConsumerSecret' . $serviceType);
			$realmIAQBO = ConfigurationManager::AppSettings('RealmIA' . $serviceType);

		    $oauthValidator = new OAuthRequestValidator($accessToken, $accessTokenSecret, $consumerKey, $consumerSecret);
			$serviceContext = new ServiceContext($realmIAQBO, $serviceType, $oauthValidator);
			$dataServices = new DataService($serviceContext);
				
			// Query to find an expense account to attribute this expense to
			$AccountArray=array();
			$AccountArray['Expense'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Expense'", 1,10);
			if (!$AccountArray['Expense'])
				return NULL;
			$expenseAccountId = $AccountArray['Expense'][0]->Id;
		
			// Query to find an Vendor to attribute this bill to
			$VendorArray = $dataServices->Query("SELECT * FROM Vendor", 1,10);
			if (!$VendorArray)
				return NULL;
			$vendorId = $VendorArray[0]->Id;
						
			// Create lines					
			$PaymentLine = new IPPLine(array('Description'=>'some line item',
											 'Amount'     =>'7.50',
											 'DetailType' =>'AccountBasedExpenseLineDetail',
											 'AccountBasedExpenseLineDetail'=>
												new IPPAccountBasedExpenseLineDetail(
													array('AccountRef'=>
														new IPPReferenceType(array('value'=>$expenseAccountId))
													 )
												),
											 )
									  );	
		
			// Create Bill Obj
			$billObj = new IPPBill();
			$billObj->Name = 'Bill' . rand();
			$billObj->VendorRef = new IPPReferenceType(array('value'=>$vendorId));
			$billObj->TotalAmt = '15.00';
			$billObj->Line = array($PaymentLine,$PaymentLine);
			
			$billObj = $dataServices->Add($billObj);
			
			$this->assertFalse(is_null($billObj));
			$this->assertTrue(is_array($billObj->Line));
			$this->assertTrue(count($billObj->Line) > 1);
			
		}
		catch (Exception $e)
		{
			// should not land here
			echo $e->getMessage();		
		    $this->assertTrue(FALSE);
		}	
	
	}
        
    /**
     * SDK-82 verifies that no exception or error occures 
     * Also LineEx should no be present in the output as object for internal usage only
     */   
    public function testFilterOnIntuitAnyType() {
        $d = new XmlObjectSerializer();
        $input = "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?><IntuitResponse xmlns=\"http://schema.intuit.com/finance/v3\" time=\"2020-01-01T02:03:04.000-00:00\">"
                . "<Payment domain=\"QBO\" sparse=\"false\">"
                . "<Id>65428</Id><SyncToken>0</SyncToken><MetaData><CreateTime>2015-04-15T16:14:55-07:00</CreateTime>"
                . "<LastUpdatedTime>2015-04-15T16:14:55-07:00</LastUpdatedTime></MetaData><TxnDate>2015-04-15</TxnDate><PrivateNote>Test Created</PrivateNote>"
                . "<Line><Amount>5.00</Amount><LinkedTxn><TxnId>65423</TxnId><TxnType>Invoice</TxnType></LinkedTxn>"
                . "<LineEx><NameValue><Name>txnId</Name><Value>65423</Value></NameValue><NameValue><Name>txnOpenBalance</Name><Value>5.00</Value></NameValue>"
                . "<NameValue><Name>txnReferenceNumber</Name><Value>8936</Value></NameValue></LineEx>"
                . "</Line><CustomerRef name=\"$%^(&amp;\">264</CustomerRef><DepositToAccountRef>71</DepositToAccountRef><PaymentMethodRef>1</PaymentMethodRef><TotalAmt>5.00</TotalAmt>"
                . "<UnappliedAmt>0</UnappliedAmt><ProcessPayment>false</ProcessPayment></Payment></IntuitResponse>";
        $r = $d->Deserialize($input);
        //we can avoid it in next php versions
        $object = $r[0];
        
        // Assert what LineEx, which has number of child returns empty objects
        $this->assertThat($object, $this->isInstanceOf("IPPPayment"));
        $this->assertThat($object->Line, $this->isInstanceOf("IPPLine"));
        $this->assertThat($object->Line->LineEx, $this->isInstanceOf("IPPIntuitAnyType"));
        $this->assertEmpty((array)$object->Line->LineEx);

    }
    
    /**
     * This test works as is. Current XML desirializer flattens reference objects 
     * (IPPReferenceType -> becomes string with ID only in response 
     */
    public function testDesirializeReferencesObjects()
    {
        $content = '<IntuitResponse xmlns="http://schema.intuit.com/finance/v3" time="2015-04-22T15:26:24.793-07:00">'
                . '<Transfer domain="QBO" sparse="false"><Id>72054</Id><SyncToken>0</SyncToken>'
                . '<MetaData>'
                . '<CreateTime>2015-04-22T15:26:33-07:00</CreateTime>'
                . '<LastUpdatedTime>2015-04-22T15:26:33-07:00</LastUpdatedTime>'
                . '</MetaData>'
                . '<TxnDate>2015-04-22</TxnDate>'
                . '<FromAccountRef name="Random Bank 2088329469">35</FromAccountRef>'
                . '<ToAccountRef name="Random Bank 147203516">36</ToAccountRef>'
                . '<Amount>10.00</Amount>'
                . '</Transfer>'
                . '</IntuitResponse>';
        
        $d = new XmlObjectSerializer();
        $r = $d->Deserialize($content);
        $object = $r[0];
         // Assert what LineEx, which has number of child returns empty objects
        $this->assertThat($object, $this->isInstanceOf("IPPTransfer"));
        $this->assertEquals(35, $object->FromAccountRef);
        $this->assertEquals(36, $object->ToAccountRef);
        $this->markTestIncomplete("Test itself is correct, but we should confirm this is ok");
    }
		
}