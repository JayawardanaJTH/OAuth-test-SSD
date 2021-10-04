<?php
require '../../fb_vendor/autoload.php';

function get_fb_client()
{
    $fb = new Facebook\Facebook([
        'app_id' => '4015107955262066',
        'app_secret' => '0689381e103f8e70444885fa3de6cfad',
        'graph_api_version' => 'v5.1.4'
    ]);
    return $fb;
}

function get_auth_url()
{
    $fb = get_fb_client();

    $helper = $fb->getRedirectLoginHelper();

    $auth_url = $helper->getLoginUrl('http://localhost:3000/glossary/server/facebook_login.php');

    return $auth_url . 'public_profile%20email';
}

function make_fb_token($data)
{
    $tokenPath = 'fb_token.json';
    if (!file_exists(dirname($tokenPath))) {
        mkdir(dirname($tokenPath), 0700, true);
    }
    file_put_contents($tokenPath, json_encode($data));

}
?>