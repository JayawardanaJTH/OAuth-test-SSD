<?php
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

    // $_SESSION['user_id'] = $userinfo['sub'];
    // $_SESSION['email'] = $userinfo['email'];
    // $_SESSION['access_token'] = $data['access_token'];
    // $_SESSION['id_token'] = $data['id_token'];
    // $_SESSION['userinfo'] = $userinfo;

    header('Location: ../client/php/register.php');
    die();
}

if (isset($_GET['error'])) {
    echo $_GET['error'];
    // header('Location: ../client/php/error.php');
    die();
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['user_id']);

    header('Location: ../client/php/index.php');
    die();
}

?>