<?php

//start the session
session_start();

//include autoload file from vendor folder
require '../../vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '612492623086513',
    'app_secret' => '13a71c4e33d467edcb6c354148541ab3',
    'default_graph_version' => 'v2.7'
]);

$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost/OAuth-test-SSD/glossary/client/php/");

try {
    header('Location:'.$login_url);
    $accessToken = $helper->getAccessToken();
    if(isset($accessToken )) {
        $_SESSION['access_token'] = (string)$accessToken;
        print_r($accessToken);
        //if session is set we can redirect to user to any page
        header("Location: http://localhost/OAuth-test-SSD/glossary/client/php/index.php");
    }
} catch (Exception $exc) {
    echo $exe->getTraceAsString();
}

if(isset($_SESSION['access_token'])) {
    try {
        $fb->setDefaultAccessToken($_SESSION['access_token']);
        $res->GET('/me?locale=en_US&fields=name,email');
        $user = $res->getGraphUser();
        echo 'Hello' ,$user->getField('name');
    } catch (Exception $exc) {
        echo $exe->getTraceAsString();
    }

} 
?>