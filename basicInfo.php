<?php
require "php/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Information</title>
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
    <link href="assets/vendor/jbox/jBox.all.min.css" rel="stylesheet">

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

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex  justify-content-center" style="height: auto ; min-height: 100vh;">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100" style="padding-top: 0px;">

            <div class="row text-center">
                <div class="col-md-12 col-lg-12" data-aos-delay="200">
                    <h1> Information</h1>
                </div>
            </div>

            <div class="col-md-12 col-lg-6  mb-3" data-aos-delay="200">
                <div class="in-sec">
                    <form class="needs-validation" novalidate>

                        <div class="row justify-content-center">
                            <div class="col-md-6 col-lg-10 col-xl-6 col-10">
                                <label for="popu" class="form-label">City</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="city" class="form-control" value="<?php echo $_SESSION["cityName"]; ?>" aria-label="City" aria-describedby="basic-addon2" disabled>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-10 col-xl-6 col-10">
                                <label for="hospital" class="form-label">No of Hospital</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="hospital" class="form-control" placeholder="Hospital" aria-label="Hospital" aria-describedby="basic-addon2">
                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6 col-lg-10 col-xl-6 col-10">
                                <label for="popu" class="form-label"> Population</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="popu" class="form-control" placeholder="Population" aria-label="Population" aria-describedby="basic-addon2">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-10 col-xl-6 col-10">
                                <label for="gdp" class="form-label">GDP</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="gdp" class="form-control" placeholder="GDP" aria-label="GDP" aria-describedby="basic-addon2">
                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6 col-lg-10 col-xl-6 col-10">
                                <label for="male" class="form-label"> Male</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="male" class="form-control" placeholder="Male" aria-label="Male" aria-describedby="basic-addon2">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-10 col-xl-6 col-10">
                                <label for="tArea" class="form-label">Total Area</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="tArea" class="form-control" placeholder="Total Area" aria-label="Total Area" aria-describedby="basic-addon2">
                                    <span class="input-group-text" id="basic-addon2">sq.km</span>
                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6 col-lg-10 col-xl-6 col-10">
                                <label for="female" class="form-label">Female</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="female" class="form-control" placeholder="Female" aria-label="Female" aria-describedby="basic-addon2">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-10 col-xl-6 col-10">
                                <label for="gArea" class="form-label">Green Area</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="gArea" class="form-control" placeholder="Green Area" aria-label="Green Area" aria-describedby="basic-addon2">
                                    <span class="input-group-text" id="basic-addon2">sq.km</span>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-12  text-center">
                                <button class="btn btn-primary btn-get-started scrollto " onclick="saveBasic()" type="button">
                                    Next </button>
                            </div>
                        </div>
                    </form>
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/vendor/jbox/jBox.all.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="js/common.js"></script>
    <script src="js/basicInfoJs.js"></script>

</body>

</html>