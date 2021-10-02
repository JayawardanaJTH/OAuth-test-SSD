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

?>