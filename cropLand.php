<?php
require "php/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Crop Land</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
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
        #cropLand {
            width: 300px;
            height: 300px;
        }
    </style>
</head>

<body> <?php
        include 'header.php';
        ?>
    <!-- ======= Hero Section ======= -->
    <section id="subHero" class="d-flex  justify-content-center textc" style="height: auto ; min-height: 100vh;">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <input type="text" class="form-control" id="sectionType" value="cropLand" hidden>
            <input type="text" id="basicId" class="form-control" value="<?php echo $_SESSION["basicId"]; ?>" hidden disabled>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-4  mb-3" data-aos-delay="200">
                    <div class="in-sec">
                        <form class="needs-validation" novalidate>
                            <marquee width="100%" direction="left" height="30px"> sq.km - square kilometer. </marquee>
                            <div id="cropInput"></div>
                            <div class="row ">
                                <div class="col-md-12 mb-3 text-center">
                                    <button class="btn btn-primary " type="button" onclick="saveCropData();">SAVE</button>
                                </div>
                            </div>
                        </form>
                        <!-- Start PopUp div -->
                        <div class="row align-items-center justify-content-center" id="moreInfo">
                            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                <div class="fade-to-img" onclick="showCropLInfo();">
                                    <img class="reggot" id="popup-btn" src="img/field.png" width="80" height="80">
                                </div>
                            </div>
                        </div>
                        <!-- End PopUp div -->
                    </div>
                </div>
                <div class="col-md-12 col-lg-8  mb-3" data-aos-delay="200">
                    <div class="in-sec infoFont">
                        <h3 class="text-center mb-2">Carbon Emissions from Crop Land</h3>
                        <ul style="margin-left: 10px;">
                            <li class="popupli">Stabilizing greenhouse gas (GHG) emissions from croplands as
                                agricultural demand grows is a critical component of climate change mitigation.</li>
                            <li class="popupli">Agricultural production is a major emitter of GHGs, currently accounting
                                for 18% of total GHG emissions in India . </li>
                        </ul>
                        <div class="row justify-content-center">
                            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                <div class="row justify-content-center">
                                    <div id="chartName"></div>
                                    <div id="cropLand"></div>
                                </div>
                            </div>
                            <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                <i i class="fa fa-download" style="font-size:24px;color:#67b7dc" class="btn btn-primary " value="download" onclick="CreatePDFfromHTML('cropLand')"></i>
                                <!-- <button id="cmd" class="btn btn-primary "
                                    onclick="CreatePDFfromHTML('cropLand')">Print</button> -->
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-center">
                            <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                <!-- <button type="button" class="btn btn-primary" onclick="redirect();">NEXT ➡</button> -->
                                <button type="button" class="btn btn-primary" onclick="redirect();">NEXT <i class="fa fa-angle-double-right" style='font-size:18px;color:gray'></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Sub Hero -->
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
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="assets/js/jspdf.min.js"></script>
    <script src="assets/js/html2canvas.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/vendor/jbox/jBox.all.min.js"></script>
    <script src="assets/js/bootstrap-show-modal.js"></script>
    <!-- Our js File  -->
    <script src="js/cropLandModel.js"></script>
    <script src="js/induGraph.js"></script>
    <script src="js/common.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>