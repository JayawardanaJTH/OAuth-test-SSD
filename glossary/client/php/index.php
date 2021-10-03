<?php
$page_title = 'Home';
include('helpers/header.php');
?>
    <!-- content -->
    <div class="container">
        <hr>
        <!-- carousel -->
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators ">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>

            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../images/brass-items.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../images/modern-door-locks.jpg" alt="Second slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <hr>
        <!-- item list -->
        <div class="items">
            <div>
                <h4 class="h5 text-uppercase text-white">Category</h4>
            </div>
            <div class="row row-cols-3 row-cols-lg-6 no-gutters justify-content-center">
                <a href="category.html" class="col-3 card m-2 text-decoration-none overflow-hidden">
                    <div>
                        <img src="../images/brass-items.jpeg" alt="items" class="card-img-top overflow-hidden">
                        <div class="card-body">
                            <p class="card-text">This is a Category</p>
                        </div>
                    </div>
                </a>
                <a href="category.html" class="col-3 card m-2 text-decoration-none overflow-hidden">
                    <div>
                        <img src="../images/brass-items.jpeg" alt="items" class="card-img-top overflow-hidden">
                        <div class="card-body">
                            <p class="card-text">This is a Category</p>
                        </div>
                    </div>
                </a>
                <a href="category.html" class="col-3 card m-2 text-decoration-none overflow-hidden">
                    <div>
                        <img src="../images/brass-items.jpeg" alt="items" class="card-img-top ">
                        <div class="card-body">
                            <p class="card-text">This is a Category</p>
                        </div>
                    </div>
                </a>
                <a href="category.html" class="col-3 card m-2 text-decoration-none overflow-hidden">
                    <div>
                        <img src="../images/brass-items.jpeg" alt="items" class="card-img-top overflow-hidden">
                        <div class="card-body">
                            <p class="card-text">This is a Category</p>
                        </div>
                    </div>
                </a>
                <a href="category.html" class="col-3 card m-2 text-decoration-none overflow-hidden">
                    <div>
                        <img src="../images/brass-items.jpeg" alt="items" class="card-img-top overflow-hidden">
                        <div class="card-body">
                            <p class="card-text">This is a Category</p>
                        </div>
                    </div>
                </a>

            </div>

        </div>
        <div class="items">
            <div>
                <h4 class="h5 text-uppercase text-white">Category</h4>
            </div>
            <div class="row row-cols-3 row-cols-lg-6 no-gutters justify-content-center">
                <a href="category.html" class="col-3 card m-2 text-decoration-none overflow-hidden">
                    <div>
                        <img src="../images/modern-door-locks.jpg" alt="items" class="card-img-top overflow-hidden">
                        <div class="card-body">
                            <p class="card-text">This is a Category</p>
                        </div>
                    </div>
                </a>
                <a href="category.html" class="col-3 card m-2 text-decoration-none overflow-hidden">
                    <div>
                        <img src="../images/modern-door-locks.jpg" alt="items" class="card-img-top overflow-hidden">
                        <div class="card-body">
                            <p class="card-text">This is a Category</p>
                        </div>
                    </div>
                </a>
                <a href="category.html" class="col-3 card m-2 text-decoration-none overflow-hidden">
                    <div>
                        <img src="../images/modern-door-locks.jpg" alt="items" class="card-img-top ">
                        <div class="card-body">
                            <p class="card-text">This is a Category</p>
                        </div>
                    </div>
                </a>
                <a href="category.html" class="col-3 card m-2 text-decoration-none overflow-hidden">
                    <div>
                        <img src="../images/modern-door-locks.jpg" alt="items" class="card-img-top overflow-hidden">
                        <div class="card-body">
                            <p class="card-text">This is a Category</p>
                        </div>
                    </div>
                </a>
                <a href="category.html" class="col-3 card m-2 text-decoration-none overflow-hidden">
                    <div>
                        <img src="../images/modern-door-locks.jpg" alt="items" class="card-img-top overflow-hidden">
                        <div class="card-body">
                            <p class="card-text">This is a Category</p>
                        </div>
                    </div>
                </a>

            </div>

        </div>
    </div>

    <!-- footer -->
    <div class="bg-dark text-white-50">
        <footer class="container py-5">
            <div class="row">
                <div class="col-12 col-md">

                    <small class="d-block mb-3 text-muted">© 2021</small>
                </div>
                <div class="col-6 col-md">
                    <h5>Features</h5>

                </div>

                <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Locations</a></li>
                        <li><a class="text-muted" href="#">Privacy</a></li>
                        <li><a class="text-muted" href="#">Terms</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    <!-- JS Urls -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

</body>

</html>