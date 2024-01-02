<?php

namespace Core\HttpClients;

use QuickBooksOnline\API\Core\Configuration\IppConfiguration;
use QuickBooksOnline\API\Core\CoreConstants;
use QuickBooksOnline\API\Core\Http\Message;
use QuickBooksOnline\API\Core\Http\Request;
use QuickBooksOnline\API\Core\Http\Response;
use QuickBooksOnline\API\Core\HttpClients\CurlHttpClient;
use QuickBooksOnline\API\Core\HttpClients\IntuitResponse;
use QuickBooksOnline\API\Core\HttpClients\RequestParameters;
use QuickBooksOnline\API\Core\HttpClients\SyncRestHandler;
use PHPUnit\Framework\TestCase;
use QuickBooksOnline\API\Core\OAuth\OAuth2\OAuth2AccessToken;
use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\Diagnostics\Logger;

class SyncRestHandlerTest extends TestCase {

    public function testSendRequest() {
        $statusCode = 200;
        $body = 'body';

        $fakeIntuitResponse = $this->getMockBuilder(IntuitResponse::class)
            ->disableOriginalConstructor()
            ->getMock();
        $fakeIntuitResponse->method('getHeaders')->willReturn(['content-type' => 'json']);
        $fakeIntuitResponse->method('getFaultHandler')->willReturn(null);
        $fakeIntuitResponse->method('getStatusCode')->willReturn($statusCode);
        $fakeIntuitResponse->method('getBody')->willReturn($body);

        $fakeHttpClientInterface = $this->getMockBuilder(CurlHttpClient::class)
            ->disableOriginalConstructor()
            ->getMock();
        $fakeHttpClientInterface->method('makeAPICall')->willReturn($fakeIntuitResponse);

        $fakeOAuth2AccessToken = $this->getMockBuilder(OAuth2AccessToken::class)
            ->disableOriginalConstructor()
            ->getMock();

        $fakeIppConfiguration = $this->getMockBuilder(IppConfiguration::class)
            ->disableOriginalConstructor()
            ->getMock();
        $fakeIppConfiguration->Message = new Message(new Request(), new Response());
        $fakeIppConfiguration->Logger = new Logger();
        $fakeIppConfiguration->OAuthMode = CoreConstants::OAUTH2;

        $fakeServiceContext = $this->getMockBuilder(ServiceContext::class)
            ->disableOriginalConstructor()
            ->getMock();
        $fakeServiceContext->IppConfiguration = $fakeIppConfiguration;
        $fakeServiceContext->requestValidator = $fakeOAuth2AccessToken;
        $fakeServiceContext->serviceType = CoreConstants::IntuitServicesTypeQBO;

        $requestParameters = new RequestParameters('', 'GET', CoreConstants::CONTENTTYPE_APPLICATIONJSON, null);
        $requestBody = '';
        $specifiedRequestURI = CoreConstants::IPP_BASEURL . "?a=b";
        $throwExceptionOnError = false;

        $syncRestHandler = new SyncRestHandler($fakeServiceContext, $fakeHttpClientInterface);

        $result = $syncRestHandler->sendRequest($requestParameters, $requestBody, $specifiedRequestURI, $throwExceptionOnError);
        static::assertEquals([$statusCode, $body], $result);

    }
}
