<?php

namespace Core\HttpClients;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ResponseException;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use QuickBooksOnline\API\Core\HttpClients\GuzzleHttpClient;
use QuickBooksOnline\API\Exception\SdkException;
use function class_exists;

class GuzzleHttpClientTest extends TestCase
{
    public function testMakeAPICallWithResponseException()
    {
        if (class_exists('\GuzzleHttp\Exception\ResponseException')) {
            $exception = new ResponseException(
                'There was a server error',
                $this->createStub(RequestInterface::class),
                new Response(500, ['content-type' => 'text/plain'], '500 Internal Server Error')
            );
        } else {
            $exception = new RequestException(
                'There was a server error',
                $this->createStub(RequestInterface::class),
                new Response(500, ['content-type' => 'text/plain'], '500 Internal Server Error')
            );
        }

        $client = $this->createStub(Client::class);
        $client->method('request')->willThrowException($exception);

        $intuitGuzzleClient = new GuzzleHttpClient($client);

        $this->expectException(SdkException::class);
        $this->expectExceptionMessageMatches('/500 Internal Server Error/');
        $intuitGuzzleClient->makeAPICall('https://quickbooks.api.intuit.com/v3/api-call', 'POST', [], '', 5, true);
    }

    public function testMakeAPICallWithRequestException()
    {
        $exception = new RequestException(
            'There was a network communication error',
            $this->createStub(RequestInterface::class)
        );

        $client = $this->createStub(Client::class);
        $client->method('request')->willThrowException($exception);

        $intuitGuzzleClient = new GuzzleHttpClient($client);

        $this->expectException(SdkException::class);
        $this->expectExceptionMessage('Network Error:There was a network communication error');
        $intuitGuzzleClient->makeAPICall('https://quickbooks.api.intuit.com/v3/api-call', 'POST', [], '', 5, true);
    }
}