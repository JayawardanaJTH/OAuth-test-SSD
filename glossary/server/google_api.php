<?php
require 'C:/xampp2/php/vendor/autoload.php';

$client;

function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Glossary Store');
    $client->setScopes(Google_Service_Drive::DRIVE);
    $client->addScope("openid");
    $client->addScope("email");
    $client->setAuthConfig('C:\Users\User\Desktop\SSD\glossary\server\credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');
    $client->setState($_SESSION['state']);

    $tokenPath = 'C:\Users\User\Desktop\SSD\glossary\server\token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }
    return $client;
}

function get_auth_url()
{

    $client_object = getClient();
    $authUrl = $client_object->createAuthUrl();

    return $authUrl;
}

function get_access_token($authCode = null)
{
    $tokenPath = 'C:\Users\User\Desktop\SSD\glossary\server\token.json';
    $client_object = getClient();

    if ($client_object->isAccessTokenExpired()) {

        if ($client_object->getRefreshToken()) {
            $client_object->fetchAccessTokenWithRefreshToken($client_object->getRefreshToken());
        }
        else {
            // Exchange authorization code for an access token.            
            $accessToken = $client_object->fetchAccessTokenWithAuthCode($authCode);
            print_r($accessToken);
            $client_object->setAccessToken($accessToken);
            // Check to see if there was an error.            
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }


    }

    if (!file_exists(dirname($tokenPath))) {
        mkdir(dirname($tokenPath), 0700, true);
    }

    file_put_contents($tokenPath, json_encode($client_object->getAccessToken()));
    $GLOBALS['client'] = $client_object;

    return $client_object;
}

function get_user_details($client_object)
{
    $service = new Google_Service_Oauth2($client_object);

    //Get user profile data from google
    $data = $service->userinfo->get();

    return $data;
}
$client = get_access_token();
?>
