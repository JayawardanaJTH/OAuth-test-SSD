<?php
error_reporting(E_ERROR | E_PARSE);

include('../../google_data.php');
$page_title = 'Upload Document';
include('helpers/header.php');
include('../../server/upload_service.php');

get_files_and_folders()
?>

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
        <a href='https://drive.google.com/file/d/$ids[$i]' class='text-decoration-none'><input type='button' value='Link' class='btn btn-primary'/> </a>";
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