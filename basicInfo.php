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

            <form class="needs-validation" novalidate>

                <div class="row">
                    <div class="col-md-3 col-lg-3  mb-3 s " data-aos-delay="200">
                        <div class="in-sec">

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label for="popu">Population </label>
                                    <input type="text" class="form-control" id="popu" placeholder="Population" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label for="rpopu">Rular Population</label>
                                    <input type="text" class="form-control" id="rpopu" placeholder="Rular Population" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class=" col-md-12">
                                    <label for="female">Female</label>
                                    <input type="text" class="form-control" id="female" placeholder=" Female " required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label for="gArea">Green Area</label>
                                    <input type="text" class="form-control" id="gArea" placeholder="Green Area " required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label for="lite">literacy</label>
                                    <input type="text" class="form-control" id="lite" placeholder="literacy" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label for="edu">Education</label>
                                    <input type="text" class="form-control" id="edu" placeholder="Education" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3 col-lg-3  mb-3  s" data-aos-delay="200">
                        <div class="in-sec">

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label for="city"> City </label>
                                    <input type="text" class="form-control" id="city" value=<?php echo $_SESSION["cityName"];?> disabled>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label for="upopu"> Urban Population </label>
                                    <input type="text" class="form-control" id="upopu" placeholder="Urban Population" required>

                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label for="male">Male</label>
                                    <input type="text" class="form-control" id="male" placeholder=" Male " required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label for="tArea">Total Area</label>
                                    <input type="text" class="form-control" id="tArea" placeholder="Total Area" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label for="gdp">GDP</label>
                                    <input type="text" class="form-control" id="gdp" placeholder="GDP" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label for="hospital">No of Hospital</label>
                                    <input type="text" class="form-control" id="hospital" placeholder="No of Hospital" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3  mb-3  s" id="map">
                        <!-- <iframe src='https://www.google.com/maps/d/embed?mid=140-hCtIBiMR1cPYqnNdAfshk9uBF58cW' width='620' height='480'>
                        </iframe>  -->
                        <iframe src="https://www.google.com/maps/d/embed?mid=1-FesHGQxUbyg_7qyS4yD4T0xZZf6tm66&ehbc=2E312F" width="640" height="480"></iframe>

                        <!-- <iframe src="https://www.google.com/maps/d/embed?mid=1dIcX1epifIboxYbkm9zmsqleYbZLDJGY&ehbc=2E312F" width="640" height="480"></iframe> -->
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-12  text-center">
                        <button class="btn btn-primary btn-get-started scrollto " onclick="saveBasic()" type="button"> Next </button>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12  text-center">
                        <button class="btn btn-primary btn-get-started scrollto " onclick="abc()" type="button"> add </button>
                    </div>
                </div>


            </form>
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