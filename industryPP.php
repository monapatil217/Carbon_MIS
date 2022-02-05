<?php
require "php/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Industry-Process and Product</title>
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
    <style>
        /* #product {
        width: 300px;
        height: 300px;
    } */
    </style>
</head>

<body> <?php
        include 'header.php';
        ?>
    <!-- ======= Hero Section ======= -->
    <section id="subHero" class="d-flex  justify-content-center" style="height: auto ; min-height: 100vh;">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <!-- <input type="text" class="form-control" id="sectionType" value="product" hidden> -->
            <input type="text" id="basicId" class="form-control" value="<?php echo $_SESSION["basicId"]; ?>" hidden disabled>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12  mb-3" data-aos-delay="200">
                    <div class="in-sec">
                        <h6 class="text-center">Industrial Processes and Product Used</h6>
                        <marquee width="100%" direction="left" height="30px"> t - tons </marquee>
                        <form class="needs-validation" novalidate>
                            <!-- <div id="IndPPLand"></div> -->
                            <div id="faq_pp" class="faq section-bg_pp">
                                <div class="faq-list faq_list_e">
                                    <ul>
                                        <li data-aos="fade-up">
                                            <a data-bs-toggle="collapse" id="fa1" class="collapse" data-bs-target="#faq-list-1">Cement <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                            <div id="faq-list-1" class="collapse show extra" data-bs-parent=".faq-list">
                                                <!-- <h6 class="text-center">Quantity of Municipal Solid Waste </h6>  -->
                                                <div id="cementInput"></div>
                                            </div>
                                        </li>
                                        <li data-aos="fade-up" data-aos-delay="100">
                                            <a data-bs-toggle="collapse" id="fa2" data-bs-target="#faq-list-2" class="collapsed">Chemical <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                            <div id="faq-list-2" class="collapse extra" data-bs-parent=".faq-list">
                                                <!-- <h6 class="text-center">Quantity of Biomedical Waste </h6>  -->
                                                <div id="chemicalInput"></div>
                                            </div>
                                        </li>
                                        <li data-aos="fade-up" data-aos-delay="200">
                                            <a data-bs-toggle="collapse" id="fa3" data-bs-target="#faq-list-3" class="collapsed">Other<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                            <div id="faq-list-3" class="collapse extra" data-bs-parent=".faq-list">
                                                <!-- <h6 class="text-center">Quantity of Hazardous Waste </h6>  -->
                                                <div id="otherInput"></div>
                                            </div>
                                        </li>
                                </div>
                                </li>
                                </ul>
                            </div>

                            <!-- 
                            <div class="row ">
                                <div class="col-md-12 mb-3 text-center">
                                    <button class="btn btn-primary " type="button" onclick="saveIndPPData();">NEXT</button>
                                </div>
                            </div> -->

                            <div class="row align-items-center justify-content-center" id="moreInfo">
                                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                    <div class="fade-to-img" onclick="showPPInfo();">
                                        <img class="reggot" id="popup-btn" src="img/distributed.png" width="80" height="80">
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- <div class="col-md-12 col-lg-7  mb-3" data-aos-delay="200">
                    <div class="in-sec infoFont">
                        <h3 class="text-center">Carbon Emission from IPPU Sector</h3>
                        <ul style="margin-left: 10px;">
                            <li class="popupli"> Industries contribute approximately one-fourth of India’s total GHG emissions. The Industrial sector emissions have been developed using a systematic approach of assessing a wide range of fuel consumption, industrial process, and product use from more than two lacs industrial units.</li>
                        </ul>
                        <div class="row justify-content-center">
                            <div id="chartName">
                            </div>
                            <div id="product"></div>
                        </div>

                    </div>
                </div> -->
            </div>
        </div>
    </section><!-- End Hero -->
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
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/jspdf.min.js"></script>
    <script src="assets/js/html2canvas.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/vendor/jbox/jBox.all.min.js"></script>
    <script src="assets/js/bootstrap-show-modal.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <!-- Our js File  -->
    <script src="js/industryPPModel.js"></script>
    <script src="js/common.js"></script>
    <!-- <script src="js/induGraph.js"></script> -->
</body>

</html>