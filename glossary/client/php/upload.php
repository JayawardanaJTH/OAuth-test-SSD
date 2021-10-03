<?php
error_reporting(E_ERROR | E_PARSE);

include('../../google_data.php');
$page_title = 'Upload Document';
include('helpers/header.php');
include('../../server/upload_service.php');

get_files_and_folders()
?>

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
        echo '<p>' . $_SESSION['email'] . '</p>';
?>
                    <div class="input-group">
<?php
        echo '<a href="../../server/google_login.php?action=logout" class="text-decoration-none"><input class="btn btn-dark" type="button" value="Log Out"></a>';
    }
    else {
        echo '<a href="#" class="text-decoration-none"><input class="btn btn-dark" type="button" value="Login"></a>';
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
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#">Cart</a>
                    <a class="nav-item nav-link" href="#">Add Item</a>
                    
                </div>
            </div>
        </nav>
    </div>

    <div style="background:rgba(255,255,255,0.6)">
        <div class="row justify-content-center mt-5">
            <form action="../../server/upload_service.php" method="post" enctype="multipart/form-data">
            <div class="input-group"> 
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-image"></i></div>
                </div>
                <input type="file" name="document" id="document" class="form-control" />
                </div>
                <div class="row justify-content-center mt-5">
                    <input type="submit" name="submit" value="Upload" class="btn btn-primary"/>
                </div>
            </form> 
        </div>
        <div class="mt-5">
            <table class="table table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
if (isset($_SESSION['files'])) {

    $names = array();
    $ids = array();
    $types = array();
    $file_count = array();

    $names = $_SESSION['names'];
    $ids = $_SESSION['ids'];
    $types = $_SESSION['types'];
    $file_count = $_SESSION['file_count'];

    for ($i = 0; $i < $file_count; $i++) {

        echo "<tr>
        <td> " . $names[$i];
        echo "</td>
        <td>" . $types[$i];
        echo "</td>
        <td> 
        <a href='https://drive.google.com/file/d/$ids[$i]'>link </a>";
        echo "</td>
</tr>";


    
}
}

?>
                
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <?php
if (isset($_SESSION['upload_details'])) {
    if ($_SESSION['upload_details'] == true) {
        unset($_SESSION['upload_details']);

?>
        <script type="text/javascript">
            Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'File is uploaded',
                    showConfirmButton: false,
                    timer: 1500
                });
        </script>
<?php
    }
    elseif ($_SESSION['upload_details'] == false) {
        unset($_SESSION['upload_details']);
?>
        <script type="text/javascript">
            Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'File is not uploaded',
                    showConfirmButton: false,
                    timer: 1500
                });
        </script>
<?php
    }
}
?>
    
</body>
</html>