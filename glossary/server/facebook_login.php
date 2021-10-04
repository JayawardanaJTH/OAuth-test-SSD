<?php

include 'facebook_api.php';
include 'facebook_data.php';
//start the session
session_start();

if (isset($_GET['action']) && $_GET['action'] == 'facebook') {
    unset($_SESSION['user_id']);

    $author_URL = get_auth_url();
    // Redirect the user to Google's authorization page
    header('Location: ' . $author_URL);
    die();
}

if (isset($_GET['code'])) {
    // Exchange the authorization code for an access token
    $ch = curl_init($tokenURL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'grant_type' => 'authorization_code',
        'client_id' => $facebookClientID,
        'client_secret' => $facebookClientSecret,
        'redirect_uri' => $baseURL,
        'code' => $_GET['code']
    ]));

    // $response = json_decode(curl_exec($ch), true);
    $response = curl_exec($ch);
    $data = json_decode($response, true);

    make_fb_token($data);

    $_SESSION['access_token'] = $data['access_token'];

    $ch = curl_init('https://graph.facebook.com/v2.8/me?fields=id,name,email');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        'Content-type: application/json',
        'Authorization: Bearer ' . $_SESSION['access_token']
    );

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // $response = json_decode(curl_exec($ch), true);
    $response = curl_exec($ch);
    $data = json_decode($response, true);

    print_r($data);

    $_SESSION['user_id'] = $data['id'];
    $_SESSION['email'] = $data['email'];

    header('Location: ../client/php/index.php');
    die();
}

if (isset($_GET['error'])) {
    header('Location: ../client/php/error.php');
    die();
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['user_id']);

    header('Location: ../client/php/index.php');
    die();
}

?>