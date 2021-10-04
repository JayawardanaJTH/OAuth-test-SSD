<?php

$facebookClientID = '4015107955262066';
$facebookClientSecret = '0689381e103f8e70444885fa3de6cfad';

$authorizeURL = 'https://www.facebook.com/v2.5/dialog/oauth?';
$tokenURL = 'https://graph.facebook.com/oauth/access_token';
$baseURL = 'http://' . $_SERVER['SERVER_NAME'] . ':3000/glossary/server/facebook_login.php';
?>