<?php
include('../google_data.php');
session_start();

if (isset($_GET['action']) && $_GET['action'] == 'google') {
    unset($_SESSION['user_id']);

    // Generate a random hash and store in the session
    $_SESSION['state'] = bin2hex(random_bytes(16));

    $params = array(
        'response_type' => 'code',
        'client_id' => $googleClientID,
        'redirect_uri' => $baseURL,
        'scope' => 'openid email',
        'state' => $_SESSION['state']
    );

    // Redirect the user to Google's authorization page
    header('Location: ' . $authorizeURL . '?' . http_build_query($params));
    die();
}

if (isset($_GET['code'])) {
    // Verify the state matches our stored state
    if (!isset($_GET['state']) || $_SESSION['state'] != $_GET['state']) {
        header('Location: ' . $baseURL . '?error=invalid_state');
        die();
    }

    // Exchange the authorization code for an access token
    $ch = curl_init($tokenURL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'grant_type' => 'authorization_code',
        'client_id' => $googleClientID,
        'client_secret' => $googleClientSecret,
        'redirect_uri' => $baseURL,
        'code' => $_GET['code']
    ]));

    // $response = json_decode(curl_exec($ch), true);
    $response = curl_exec($ch);
    $data = json_decode($response, true);

    // Split the JWT string into three parts
    $jwt = explode('.', $data['id_token']);

    // Extract the middle part, base64 decode, then json_decode it
    $userinfo = json_decode(base64_decode($jwt[1]), true);

    $_SESSION['user_id'] = $userinfo['sub'];
    $_SESSION['email'] = $userinfo['email'];
    $_SESSION['access_token'] = $data['access_token'];
    $_SESSION['id_token'] = $data['id_token'];
    $_SESSION['userinfo'] = $userinfo;

    header('Location: ../client/php/register.php');
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