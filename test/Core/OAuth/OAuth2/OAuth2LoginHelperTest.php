<?php

namespace Core\OAuth\OAuth2;

use phpmock\phpunit\PHPMock;
use PHPUnit\Framework\TestCase;
use QuickBooksOnline\API\Core\CoreConstants;
use QuickBooksOnline\API\Core\OAuth\OAuth2\OAuth2AccessToken;
use QuickBooksOnline\API\Core\OAuth\OAuth2\OAuth2LoginHelper;
use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\Exception\SdkException;

class OAuth2LoginHelperTest extends TestCase {

    use PHPMock;

    /**
     * @param $redirectUrl
     * @testWith ["redirectURL"]
     *           [null]
     */
    public function testGetRedirectURL($redirectUrl) {
        $clientId = 'clientId';
        $clientSecret = 'secret';

        if ($redirectUrl == null) {
            $this->expectException(SdkException::class);
        }

        $oauth2LoginHelper = new OAuth2LoginHelper($clientId, $clientSecret, $redirectUrl);

        static::assertEquals($redirectUrl, $oauth2LoginHelper->getRedirectURL());
    }

    public function testGetClientSecret() {
        $clientId = 'clientId';
        $clientSecret = 'secret';
        $oauth2LoginHelper = new OAuth2LoginHelper($clientId, $clientSecret);

        static::assertEquals($clientSecret, $oauth2LoginHelper->getClientSecret());
    }

    public function testGetLastError() {
        $clientId = 'clientId';
        $clientSecret = 'secret';
        $oauth2LoginHelper = new OAuth2LoginHelper($clientId, $clientSecret);

        static::assertFalse($oauth2LoginHelper->getLastError());
    }

    public function testValidateIDToken() {
        $clientId = 'clientId';
        $clientSecret = 'secret';
        $oauth2LoginHelper = new OAuth2LoginHelper($clientId, $clientSecret);

        // TODO: add additional cases to test TRUE path
        static::assertFalse($oauth2LoginHelper->validateIDToken('a.a.a'));
    }

    /**
     * @param $valueSet
     * @testWith [true]
     *           [false]
     */
    public function testGetAccessToken($valueSet) {
        $clientId = 'clientId';
        $clientSecret = 'secret';
        $fakeOAuth2AccessToken = $this->getMockBuilder(OAuth2AccessToken::class)
            ->disableOriginalConstructor()
            ->getMock();
        $fakeOAuth2AccessToken
            ->method('getClientId')
            ->willReturn($clientId);
        $fakeOAuth2AccessToken
            ->method('getClientSecret')
            ->willReturn($clientSecret);

        $fakeServiceContext = $this->getMockBuilder(ServiceContext::class)
            ->disableOriginalConstructor()
            ->getMock();
        $fakeServiceContext->requestValidator = $fakeOAuth2AccessToken;

        if(!$valueSet) {
            $fakeServiceContext= null;
            $this->expectException(SdkException::class);
        }

        $oauth2LoginHelper = new OAuth2LoginHelper($clientId, $clientSecret, null, null, null, $fakeServiceContext);

        static::assertEquals($fakeOAuth2AccessToken, $oauth2LoginHelper->getAccessToken());

    }

    /**
     * @param $scope
     * @testWith ["scope"]
     *           [null]
     */
    public function testGetScope($scope) {
        $clientId = 'clientId';
        $clientSecret = 'secret';

        if ($scope == null) {
            $this->expectException(SdkException::class);
        }

        $oauth2LoginHelper = new OAuth2LoginHelper($clientId, $clientSecret, null, $scope);

        static::assertEquals($scope, $oauth2LoginHelper->getScope());
    }

    public function testGetAuthorizationCodeURL() {
        $clientSecret = 'secret';

        $params = [
            'client_id' => 'clientId',
            'scope' => 'scope',
            'redirect_uri' => 'redirectURI',
            'response_type' => 'code',
            'state' => 'state',
            ];

        $expectedURL = CoreConstants::OAUTH2_AUTHORIZATION_REQUEST_URL . "?" . http_build_query($params , "", '&', PHP_QUERY_RFC1738);

        $oauth2LoginHelper = new OAuth2LoginHelper($params['client_id'], $clientSecret, $params['redirect_uri'], $params['scope'], $params['state'], null);
        $authorizationCodeUrl = $oauth2LoginHelper->getAuthorizationCodeURL();

        static::assertEquals($expectedURL, $authorizationCodeUrl);
    }

    public function testGetClientID() {
        $clientId = 'clientId';
        $clientSecret = 'secret';
        $oauth2LoginHelper = new OAuth2LoginHelper($clientId, $clientSecret);

        static::assertEquals($clientId, $oauth2LoginHelper->getClientID());
    }

    /**
     * @param $state
     * @testWith ["state"]
     *           [null]
     */
    public function testGetState($state) {
        $clientId = 'clientId';
        $clientSecret = 'secret';

        $oauth2LoginHelper = new OAuth2LoginHelper($clientId, $clientSecret, null, null, $state);

        if ($state == null) {
            static::assertNotEmpty($oauth2LoginHelper->getState());
        } else {
            static::assertEquals($state, $oauth2LoginHelper->getState());
        }
    }
}
