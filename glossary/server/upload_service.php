<?php
error_reporting(E_ERROR | E_PARSE);
require 'google_api.php';
session_start();

if (isset($_POST['submit'])) {

    if (empty($_FILES["document"]['tmp_name'])) {
        echo "Go back and Select file to upload.";
        exit;
    }

    $file_tmp = $_FILES["document"]["tmp_name"];
    $file_type = $_FILES["document"]["type"];
    $file_name = basename($_FILES["document"]["name"]);
    $path = "uploads/" . $file_name;

    move_uploaded_file($file_tmp, $path);

    $folder_id = create_folder("Glossary");

    $success = insert_file_to_drive($path, $file_name, $folder_id);

    if ($success) {
        $_SESSION['upload_details'] = true;
        header('Location: ../client/php/upload.php');
    }
    else {
        $_SESSION['upload_details'] = false;
        header('Location: ../client/php/upload.php');
    }
}

// This will create a folder and also sub folder when $parent_folder_id is given
function create_folder($folder_name, $parent_folder_id = null)
{

    $folder_list = check_folder_exists($folder_name);

    // if folder does not exists
    if (count($folder_list) == 0) {
        $service = new Google_Service_Drive($GLOBALS['client']);
        $folder = new Google_Service_Drive_DriveFile();

        $folder->setName($folder_name);
        $folder->setMimeType('application/vnd.google-apps.folder');
        if (!empty($parent_folder_id)) {
            $folder->setParents([$parent_folder_id]);
        }

        $result = $service->files->create($folder);

        $folder_id = null;

        if (isset($result['id']) && !empty($result['id'])) {
            $folder_id = $result['id'];
        }

        return $folder_id;
    }

    return $folder_list[0]['id'];


}

// This will check folders and sub folders by name
function check_folder_exists($folder_name)
{

    $service = new Google_Service_Drive($GLOBALS['client']);

    $parameters['q'] = "mimeType='application/vnd.google-apps.folder' and name='$folder_name' and trashed=false";
    $files = $service->files->listFiles($parameters);

    $op = [];
    foreach ($files as $k => $file) {
        $op[] = $file;
    }

    return $op;
}

// This will insert file into drive and returns boolean values.
function insert_file_to_drive($file_path, $file_name, $parent_file_id = null)
{
    $service = new Google_Service_Drive($GLOBALS['client']);
    $file = new Google_Service_Drive_DriveFile();

    $file->setName($file_name);

    if (!empty($parent_file_id)) {
        $file->setParents([$parent_file_id]);
    }

    $result = $service->files->create(
        $file,
        array(
        'data' => file_get_contents($file_path),
        'mimeType' => 'application/octet-stream',
    )
    );

    $is_success = false;

    if (isset($result['name']) && !empty($result['name'])) {
        $is_success = true;
    }

    return $is_success;
}

// This will display list of folders and direct child folders and files.
if (isset($_GET['list_files_and_folders'])) {
    echo "<h1>Retriving List all files and folders from Google Drive</h1>";
    get_files_and_folders();
}


function get_files_and_folders()
{
    if (!empty($_SESSION['user_id'])) {
        $service = new Google_Service_Drive($GLOBALS['client']);

        $parameters['q'] = "'1vkeWJhoQowQ2-JAbPj4yuMfwpsq0cScM' in parents";
        $files = $service->files->listFiles($parameters);

        $names = array();
        $ids = array();
        $types = array();
        $file_count = 0;

        foreach ($files as $k => $file) {

            $names[] = $file['name'];
            $ids[] = $file['id'];
            $types[] = $file['mimeType'];
            $file_count++;
        }

        $_SESSION['names'] = $names;
        $_SESSION['ids'] = $ids;
        $_SESSION['types'] = $types;
        $_SESSION['file_count'] = $file_count;

    }
    else {
        header('Location: ../php/register.php');
    }
}


?>