<?php
require 'C:/xampp2/php/vendor/autoload.php';
include('../google_data.php');
include('google_api.php');
session_start();

if (isset($_GET['action']) && $_GET['action'] == 'google') {
    unset($_SESSION['user_id']);

    // Generate a random hash and store in the session
    $_SESSION['state'] = bin2hex(random_bytes(16));

    $auth_url = get_auth_url();

    // Redirect the user to Google's authorization page
    header('Location: ' . $auth_url);
    die();
}

if (isset($_GET['code'])) {

    $_SESSION['auth_code'] = $_GET['code'];

    // Verify the state matches our stored state
    if (!isset($_GET['state']) || $_SESSION['state'] != $_GET['state']) {
        header('Location: ' . $baseURL . '?error=invalid_state');
        die();
    }

    $client_object = get_access_token($_GET['code']);
    $user_data = get_user_details($client_object);

    $_SESSION['user_id'] = $client_object->getClientId();
    $_SESSION['email'] = $user_data['email'];
    $_SESSION['picture'] = $user_data['picture'];
    $_SESSION['access_token'] = $client_object->getAccessToken()['access_token'];
    $_SESSION['id_token'] = $client_object->getAccessToken()['id_token'];
    $_SESSION['userinfo'] = $user_data;
    $_SESSION['logged_mode'] = 'google';

    header('Location: ../client/php/index.php');
    // print_r($client_object->getAccessToken()['id_token']);
    // print_r($client_object->getClientId());
    die();
}

if (isset($_GET['error'])) {
    echo $_GET['error'];
    // header('Location: ../client/php/error.php');
    die();
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {

    unset($_SESSION['user_id']);
    unset($_SESSION['email']);
    unset($_SESSION['picture']);
    unset($_SESSION['id_token']);
    unset($_SESSION['access_token']);
    unset($_SESSION['userinfo']);
    unset($_SESSION['logged_mode']);
    unset($_SESSION['names']);
    unset($_SESSION['ids']);
    unset($_SESSION['types']);
    unset($_SESSION['file_count']);

    header('Location: ../client/php/index.php');
    die();
}

?>