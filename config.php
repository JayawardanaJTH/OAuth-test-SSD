<?php
require_once(__DIR__.'/Facebook/autoload.php');
/*
| Developed by: Tauseef Ahmad
| Last Upate: 13-12-2020 04:46 PM
| Facebook: www.facebook.com/ahmadlogs
| Twitter: www.twitter.com/ahmadlogs
| YouTube: https://www.youtube.com/channel/UCOXYfOHgu-C-UfGyDcu5sYw/
| Blog: https://ahmadlogs.wordpress.com/
 */
/*
// Include the autoloader provided in the SDK
require_once(__DIR__.'/Facebook/autoload.php');

define('APP_ID', '612492623086513');
define('APP_SECRET', '13a71c4e33d467edcb6c354148541ab3');
define('API_VERSION', 'v2.5');
define('FB_BASE_URL', 'https://localhost/redirect/');

define('BASE_URL', 'YOUR_WEBSITE_URL');

if(!session_id()){
    session_start();
}

*/
// Call Facebook API
$fb = new Facebook\Facebook([
    'app_id' => '4303755113034608',
    'app_secret' => 'dd763f654292a0d6a4d8bfb46fc840b5',
    'default_graph_version' => 'v2.5'
]);


// Get redirect login helper
$handler = $fb -> getRedirectLoginHelper();

?>