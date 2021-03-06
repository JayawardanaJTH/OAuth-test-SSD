<?php
include('../../google_data.php');
$page_title = 'Store';
include('helpers/header.php');

?>
    <!-- Content --> 
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-6 bg-dark text-white-50 align-self-center mt-5" >
                <form  action="#" method="POST" class="m-3 form" novalidate>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="User Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="name@provider.com" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="number" name="contact" id="contact" placeholder="xxxxxxxxxx" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                        <small class="text-muted form-text">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</small>
                    </div>
                    <div class="row justify-content-center">
                        <div>
                            <input type="button" value="Register" id="register" name="register" class="btn btn-primary">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                            <span class="mr-1 ml-1 "> or </span>
                    </div>
                    <div class="row justify-content-center">
                        <div>
                            <a href="../../server/google_login.php?action=google" class="text-decoration-none"><input class="btn btn-danger text-white" type="button" value="Sign in Google"></a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                            <span class="mr-1 ml-1 "> or </span>
                    </div>
                    <div class="row justify-content-center">
                        <div>
                        <a href="../../server/facebook_login.php?action=facebook" class="text-decoration-none"><input class="btn btn-info text-white" type="button" value="Sign in Facebook"></a>
                        </div>
                    </div>
                    
                    
                </form>
            </div>
    
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>