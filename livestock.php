<?php
//require "php/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Live Stock</title>
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
                        <h3>Live Stock</h3>

                        <div class="card">
                            <div class="card-body">
                                <h5>
                                    <p>the average annual population of animals was taken from the Census of Livestock,
                                        which is conducted every five years. </p>
                                    <p>Categorization was done as per available
                                        categories in the census viz. dairy and non-dairy for cattle</P>
                                    <p>It has been estimated that over 200 million tonnes of CO2 equivalents are
                                        released by Indian livestock each year.</p>
                                    <p>The total GHGs emission from Indian livestock is estimated at 247.2 Mt in terms
                                        of CO2 equivalent emissions.</p>
                                    <p>Although the Indian livestock contributes substantially to the methane budget,
                                        the per capita emission is only 24.23 kgCH4/animal/year.</p>
                                    <p>categorisation are: Mature dairy cows, Non-dairy cattle, Goats, Sheep, Camels,
                                        Horses and ponies, Pigs</p>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-4  mb-3  s" data-aos-delay="200">
                    <div class="in-sec">
                        <h4 class="text-center mb-2">Live Stock</h4>
                        <form class="needs-validation" novalidate>

                            <div class="form-floating mt-5">
                                <input type="text" class="form-control" id="indigenouscattle"
                                    placeholder="Indigenous Cattle" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="indigenouscattle">Indigenous Cattle</label>
                            </div>

                            <div class="form-floating mt-3">
                                <input type="text" class="form-control" id="crossbredcattle"
                                    placeholder="Cross-bred cattle" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="crossbredcattle">Cross-bred cattle</label>
                            </div>

                            <div class="form-floating mt-3">
                                <input type="text" class="form-control" id="buffalo" placeholder="Buffalo" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="buffalo">Buffalo</label>
                            </div>

                            <div class="form-floating mt-3">
                                <input type="text" class="form-control" id="sheep" placeholder="Sheep" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="sheep ">Sheep</label>
                            </div>

                            <div class="form-floating mt-3">
                                <input type="text" class="form-control" id="goat" placeholder="Goat" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="goat">Goat</label>
                            </div>

                            <div class="form-floating mt-3">
                                <input type="text" class="form-control" id="horsesandponies"
                                    placeholder="Horses & Ponies" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="horsesandponies">Horses & Ponies</label>
                            </div>

                            <div class="form-floating mt-3">
                                <input type="text" class="form-control" id="donkeys" placeholder="Donkeys" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="donkeys">Donkeys</label>
                            </div>

                            <div class="form-floating mt-3 mb-2">
                                <input type="text" class="form-control" id="camels" placeholder="Camels" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="camels">Camels</label>
                            </div>

                            <div class="form-floating mt-3 mb-2">
                                <input type="text" class="form-control" id="pig" placeholder="Pig" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="pig">Pig</label>
                            </div>



                            <div class="form-floating mt-3 mb-2">
                                <input type="text" class="form-control" id="poultry" placeholder="Poultry" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="poultry">Poultry</label>
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
    <script src="assets/js/jquery.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>