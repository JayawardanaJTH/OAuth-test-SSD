<?php
include('../../google_data.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $page_title ?></title>
    <link rel="shortcut icon" type="image/jpg" href="../images/tick_icon.svg.png" />

    <!-- Bootstrap Urls -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="../styles/index.css">
</head>

<body style="background-image: url(../images/back1.jpg); background-size: 1480px;">
    <!-- Header and navigation -->
    <div>
        <!-- Header -->
        <div class="header text-white p-5 ">
            <header class="row text-center">
                <div class="header-logo ">
                    <span class="h3">Online Store</span>
                </div>
                <div class="header-description">
<?php
if (!isset($_GET['action'])) {

    if (!empty($_SESSION['user_id'])) {

        echo '<image src="' . $_SESSION['picture'] . '" style="border-radius: 50%;" />';
        echo '<p>' . $_SESSION['email'] . '</p>';

?>
                    <div class="input-group">
<?php
        echo '<a href="../../server/google_login.php?action=logout" class="text-decoration-none"><input class="btn btn-dark" type="button" value="Log Out"></a>';
    }
    else {
        echo '<a href="register.php" class="text-decoration-none"><input class="btn btn-dark" type="button" value="Login"></a>';
    }
}
?>
                        
                    </div>
                </div>
            </header>
        </div>

        <!-- Navigation bar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <?php
                        if(isset($_SESSION['logged_mode'])){
                            if($_SESSION['logged_mode'] == 'google'){

                    ?>  
                    <a class="nav-item nav-link" href="upload.php">Upload Document</a>
                    <a class="nav-item nav-link" href="#">Add Event</a>
                    <?php
                        }
                    }
                    ?>
                    
                </div>
            </div>
        </nav>
    </div>