<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Electricity</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: OnePage - v4.7.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html"><b>MIS</b></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>

                    <li class="dropdown"><a href="#"><span>Energy</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="energy.php">Electricity</a></li>
                        </ul>
                    </li>

                    <li><a class="nav-link scrollto">Transport</a></li>

                    <li class="dropdown"><a href="#"><span>AFOLU</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Agriculture</a></li>
                            <li><a href="#">Forest</a></li>
                            <li><a href="#">Landuse</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto">SolidWaste</a></li>
                    <li><a class="nav-link scrollto">WasteWater</a></li>
                    <li class="dropdown"><a href="#"><span>Industry</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Energy</a></li>
                            <li><a href="#">Process & Product</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>FuelType</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Residential</a></li>
                            <li><a href="#">Commercial</a></li>
                        </ul>
                    </li>
                    <!-- <li class="dropdown"><a href="#"><span>Other</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="dropdown"><a href="#"><span>AFOLU</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li> -->

                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    <li><a class="getstarted scrollto" href="login.php">Logout</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->


    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex  justify-content-center" style="height: auto ; min-height: 100vh;">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

            <div class="row">

                <div class="col-md-12 col-lg-8  mb-3 s " data-aos-delay="200">
                    <div class="in-sec">
                        <h3>Electricity</h3>
                    </div>
                </div>

                <div class="col-md-12 col-lg-4  mb-3  s" data-aos-delay="200">
                    <div class="in-sec">
                        <h4 class="text-center mb-2">Electricity</h4>
                        <form class="needs-validation" novalidate>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="eleResi" placeholder="Electricity uses in residential area" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="eleResi">Electricity uses in residential area</label>
                            </div>

                            <div class="form-floating">
                                <input type="text" class="form-control" id="eleCom" placeholder="Electricity uses in commercial area" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="eleCom">Electricity uses in commercial area</label>
                            </div>



                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="eleSum" placeholder="Electricity uses in slum area" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="eleSum">Electricity uses in slum area</label>
                            </div>

                            <div class="form-floating">
                                <input type="text" class="form-control" id="eleSL" placeholder="Electricty uses for Street light" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="eleSL">Electricty uses for Street light</label>
                            </div>



                            <div class="row ">
                                <div class="col-md-12 mb-3 text-center">
                                    <button class="btn btn-primary " type="submit">Submit form</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Hero -->


    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>