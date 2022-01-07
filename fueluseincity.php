<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Fuel use in city</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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

    <?php
    include 'header.php';
    ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex  justify-content-center" style="height: auto ; min-height: 100vh;">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

            <div class="row">

                <div class="col-md-12 col-lg-8  mb-3 s " data-aos-delay="200">
                    <div class="in-sec">
                        <h3>Fuel use in city</h3>
                        <div class="card">
                            <div class="card-body">
                                <h5>
                                    <p>454 grammes of carbon per liter of LPG. In order to combust this carbon to CO2,
                                        1211 grammes of oxygen is needed.
                                        The sum is then 454 + 1211 = 1665 grammes of CO2/liter of LPG</p>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-4  mb-3  s" data-aos-delay="200">
                    <div class="in-sec">
                        <h4 class="text-center mb-2">Fuel use in city</h4>
                        <form class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="popu">Fuel use </label>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>LPG</option>
                                        <option>MNGL</option>
                                        <option>Kerosene</option>
                                        <option>Wood</option>
                                    </select>
                                </div>
                            </div>


                            <!-- LPG -->
                            <div class="row">
                                <div class="form-floating col-6 mt-3 mb-3">
                                    <input type="text" class="form-control" id="lpginr" placeholder="Residential LPG"
                                        required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                    <label for="lpginr">Residential LPG</label>
                                </div>

                                <div class="form-floating col-6 mt-3 mb-3">
                                    <input type="text" class="form-control" id="lpginc" placeholder="Commercial LPG"
                                        required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                    <label for="lpginc">Commercial LPG</label>
                                </div>
                            </div>

                            <!-- MNGL -->
                            <div class="row">
                                <div class="form-floating col-6 mt-3 mb-3">
                                    <input type="text" class="form-control" id="mnglinr" placeholder="Residential MNGL"
                                        required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                    <label for="mnglinr">Residential MNGL</label>
                                </div>

                                <div class="form-floating col-6 mt-3 mb-3">
                                    <input type="text" class="form-control" id="mnglinc" placeholder="Commercial MNGL"
                                        required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                    <label for="mnglinc">Commercial MNGL</label>
                                </div>
                            </div>

                            <!-- kerosene -->
                            <div class="row">
                                <div class="form-floating col-6 mt-3 mb-3">
                                    <input type="text" class="form-control" id="keroseneinr"
                                        placeholder="Residential Kerosene" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                    <label for="keroseneinr">Residential Kerosene</label>
                                </div>

                                <div class="form-floating col-6 mt-3 mb-3">
                                    <input type="text" class="form-control" id="keroseneinc"
                                        placeholder="Commercial Kerosene" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                    <label for="keroseneinc">Commercial Kerosene</label>
                                </div>
                            </div>

                            <!-- Wood -->
                            <div class="row">
                                <div class="form-floating col-6 mt-3 mb-3">
                                    <input type="text" class="form-control" id="woodinr" placeholder="Residential Wood"
                                        required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                    <label for="woodinr">Residential Wood</label>
                                </div>

                                <div class="form-floating col-6 mt-3 mb-3">
                                    <input type="text" class="form-control" id="woodinc" placeholder="Commercial Wood"
                                        required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                    <label for="woodinc">Commercial wood</label>
                                </div>
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