<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Document</title>

    <link rel="shortcut icon" type="image/jpg" href="../images/tick_icon.svg.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>

    <link rel="stylesheet" href="../styles/index.css">
</head>
<body>
    <?php
include_once 'C:/xampp2/php/vendor/autoload.php';

$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

$client = new Google\Client();
$client->setAuthConfig('credentials.json');
$client->setRedirectUri($redirect_uri);
$client->addScope("https://www.googleapis.com/auth/drive");
$service = new Google\Service\Drive($client);

// We'll setup an empty 1MB file to upload.
DEFINE("TESTFILE", 'testfile-small.txt');
if (!file_exists(TESTFILE)) {
    $fh = fopen(TESTFILE, 'w');
    fseek($fh, 1024 * 1024);
    fwrite($fh, "!", 1);
    fclose($fh);
}

// This is uploading a file directly, with no metadata associated.
$file = new Google\Service\Drive\DriveFile();
$result = $service->files->create(
    $file,
    array(
    'data' => file_get_contents(TESTFILE),
    'mimeType' => 'application/octet-stream',
    'uploadType' => 'media'
)
);

// Now lets try and send the metadata as well using multipart!
$file = new Google\Service\Drive\DriveFile();
$file->setName("Hello World!");
$result2 = $service->files->create(
    $file,
    array(
    'data' => file_get_contents(TESTFILE),
    'mimeType' => 'application/octet-stream',
    'uploadType' => 'multipart'
)
);

?>
</body>
</html>