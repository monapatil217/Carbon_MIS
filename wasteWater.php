<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Waste Water</title>
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
                        <h3>Waste Water</h3>
                        <div class="card">
                            <div class="card-body">
                                <h5>
                                    <!-- <p>Currently, India has the capacity to treat approximately 37% of its wastewater,
                                        or 22,963 million litres per day (MLD), against a daily</p>
                                    <p>sewage generation of approximately 61,754 MLD according to the 2015 report of the
                                        Central Pollution Control Board.</p> -->
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-4  mb-3  s" data-aos-delay="200">
                    <div class="in-sec">
                        <h4 class="text-center mb-2">Waste Water</h4>
                        <form class="needs-validation" novalidate>

                            <div class="input-group mb-3">
                                <div class="col-1"></div>
                                <span class="form-floating">
                                    <div class="form-floating labelFont">
                                        <input type="text" class="form-control" id="waterConsumption" placeholder="Water Consumption">
                                        <label for="waterConsumption">Water Consumption</label>
                                    </div>
                                </span>
                                <span class="input-group-text" id="basic-addon-1">CMD</span>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="col-1"></div>
                                <span class="form-floating">
                                    <div class="form-floating labelFont">
                                        <input type="text" class="form-control" id="waterGenration" placeholder="Waste water generated">
                                        <label for="waterGenration">Waste water generated</label>
                                    </div>
                                </span>
                                <span class="input-group-text" id="basic-addon-1">CMD</span>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="col-1"></div>
                                <span class="form-floating">
                                    <div class="form-floating labelFont">
                                        <input type="text" class="form-control" id="waterCollection" placeholder="Waste water collection">
                                        <label for="waterCollection">Waste water collection</label>
                                    </div>
                                </span>
                                <span class="input-group-text" id="basic-addon-1">CMD</span>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="col-1"></div>
                                <span class="form-floating">
                                    <div class="form-floating labelFont">
                                        <input type="text" class="form-control" id="waterTreat" placeholder="Qty of treat from WW">
                                        <label for="waterTreat">Qty of treat from waste water</label>
                                    </div>
                                </span>
                                <span class="input-group-text" id="basic-addon-1">CMD</span>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="col-1"></div>
                                <span class="form-floating">
                                    <div class="form-floating labelFont">
                                        <input type="text" class="form-control" id="noSTP" placeholder="No of STP">
                                        <label for="noSTP">No of STP</label>
                                    </div>
                                </span>
                                <span class="input-group-text" id="basic-addon-1">CMD</span>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                            </div>

                            <!-- The below section will open after adding js -->

                            <!-- <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="capacity" placeholder="Capacity" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="capacity">Capacity</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="latitude" placeholder="Latitude" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="latitude">Latitude</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="logitude" placeholder="Logitude" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="logitude">Logitude</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="technology" placeholder="Technology" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="technology">Technology</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="waterRecycle" placeholder="Recycling Water" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="waterRecycle">Recycling Water</label>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="waterDisposal" placeholder="Disposal of Waste" required>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                                <label for="waterDisposal">Disposal of Waste</label>
                            </div> -->


                            <div class="row ">
                                <div class="col-md-12 mb-3 text-center">
                                    <button class="btn btn-primary " type="submit">Submit form</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="row align-items-center justify-content-center" id="moreInfo">

                <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">

                    <div class="popup-flex fade-to-img" onclick="showWaterInfo();">
                        <img class="reggot" id="popup-btn" src="img/water-drop.png" width="80" height="80">
                    </div>

                    <div id="popup-wrapper" class="popup-container">
                        <div class="popup-content">

                            <div class="row align-items-center justify-content-center">
                                <div id="popUpData" class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                </div>
                                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="btn-container">
                                        <a href="#" id="close" class="btn-gotit">Got It</a>
                                    </div>
                                </div>
                            </div>

                        </div>
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
    <script src="js/wasteWaterModel.js"></script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap-show-modal.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>