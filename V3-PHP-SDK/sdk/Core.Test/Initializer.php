<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');

class Initializer
{
    public static function InitializeServiceContextQbd()
    {
		$accessToken = ConfigurationManager::AppSettings('AccessTokenQBD');
		$accessTokenSecret = ConfigurationManager::AppSettings('AccessTokenSecretQBD');
		$consumerKey = ConfigurationManager::AppSettings('ConsumerKeyQBD');
		$consumerSecret = ConfigurationManager::AppSettings('ConsumerSecretQBD');
		$realmIA = ConfigurationManager::AppSettings('RealmIAQBD');

	    $target = new OAuthRequestValidator($accessToken, $accessTokenSecret, $consumerKey, $consumerSecret);
		$serviceContext = new ServiceContext($realmIA, IntuitServicesType::QBD, $target);
		return $serviceContext;
    }

    public static function InitializeServiceContextQbo()
    {
		$accessToken = ConfigurationManager::AppSettings('AccessTokenQBO');
		$accessTokenSecret = ConfigurationManager::AppSettings('AccessTokenSecretQBO');
		$consumerKey = ConfigurationManager::AppSettings('ConsumerKeyQBO');
		$consumerSecret = ConfigurationManager::AppSettings('ConsumerSecretQBO');
		$realmIA = ConfigurationManager::AppSettings('RealmIAQBO');

                $target = new OAuthRequestValidator($accessToken, $accessTokenSecret, $consumerKey, $consumerSecret);
		$serviceContext = new ServiceContext($realmIA, IntuitServicesType::QBO, $target);
                $serviceContext->IppConfiguration->BaseUrl->Qbo = ConfigurationManager::BaseURLSettings(strtolower(IntuitServicesType::QBO));
                $serviceContext->baseserviceURL = $serviceContext->GetBaseURL();
		return $serviceContext;
    }

}

?>
