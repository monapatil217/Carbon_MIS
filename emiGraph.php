<?php
//require "php/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Emission Graph</title>
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
    <style>
        #allEmiChart,
        #allsecEmiChart,
        #secEmiChart,
        #polluEmi,
        #poluEmiChart {
            width: 100%;
            height: 500px;
        }
    </style>

</head>

<body>

    <?php
    include 'adminHeader.php';
    ?>

    <!-- ======= Hero Section ======= -->
    <section id="subHero" class="d-flex  justify-content-center" style="height: auto ; min-height: 100vh;">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

            <!-- <input type="text" class="form-control" id="sectionType" value="commChart" hidden> -->

            <div class="row">
                <div class="col-md-12 col-lg-12  mb-3 s " data-aos-delay="200">
                    <div class="in-sec">
                        <div id="chartName">
                            <h3> Carbon Contribution by Cities ( tCO2e/day )</h3>
                        </div>
                        <div id="allEmiChart"></div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12  mb-3 s " data-aos-delay="200">
                    <div class="in-sec">
                        <div id="chartName">
                            <h3> Carbon Contribution by Cities in Different Sector ( tCO2e/day )</h3>
                        </div>
                        <div id="allsecEmiChart"></div>

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-lg-12  mb-3 s " data-aos-delay="200">
                    <div class="in-sec">

                        <div class="row mt-3 text-center">
                            <h3> Sector-wise Carbon Emission by Cities ( tCO2e/day )</h3>
                        </div>
                        <div class="row mt-3 justify-content-center">

                            <div class="form-group col-md-2">
                                <label> Select Sector : </label>
                            </div>
                            <div class="form-group col-md-3">
                                <select class="form-control" id="sectionType" onchange="secEmiChart();">
                                    <option disabled selected>Select Sector</option>
                                    <option value="Electricity">Electricity</option>
                                    <option value="Transport">Transport</option>

                                    <option value="LiveStock">LiveStock</option>
                                    <option value="CropLand">CropLand</option>
                                    <option value="Forest">Forest</option>
                                    <option value="LandUse">LandUse</option>

                                    <option value="SolidWaste">SolidWaste</option>
                                    <option value="WasteWater">WasteWater</option>

                                    <option value="Energy">Industry Energy</option>
                                    <option value="Product">Industry Process & Product</option>

                                    <option value="CookingFuel">Cooking Fuel</option>
                                </select>
                            </div>
                        </div>

                        <div id="secChartDiv">
                            <div id="secEmiChart"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12  mb-3 s " data-aos-delay="200">
                    <div class="in-sec">
                        <div id="chartName">
                            <h3> Pollutant-wise Carbon Contribution by Cities ( tons/day )</h3>
                        </div>
                        <div id="polluEmi"></div>

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-lg-12  mb-3 s " data-aos-delay="200">
                    <div class="in-sec">

                        <div class="row mt-3 text-center">
                            <h3> Pollutants-wise Carbon Emission by Cities ( tons/day )</h3>
                        </div>
                        <div class="row mt-3 justify-content-center">

                            <div class="form-group col-md-2">
                                <label> Select Pollutants : </label>
                            </div>
                            <div class="form-group col-md-3">
                                <select class="form-control" id="pollutantType" onchange="poluEmiChart();">
                                    <option disabled selected>Select Pollutants</option>
                                    <option value="co2">CO2</option>
                                    <option value="ch4">CH4</option>
                                    <option value="n2o">N2O</option>
                                </select>
                            </div>
                        </div>

                        <div id="poluChartDiv">
                            <div id="poluEmiChart"></div>
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


    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap-show-modal.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="js/emiGraph.js"></script>
</body>

</html>