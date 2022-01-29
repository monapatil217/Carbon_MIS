<?php
// require "php/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>City Raw Data</title>
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
    <style>
    #secChart {
        width: 100%;
        height: 500px;
    }
    </style>
    <style>
    * {
        box-sizing: border-box;
    }

    /* Create two equal columns that floats next to each other */
    .column {
        float: left;
        width: 50%;
        padding: 10px;
        height: 300px;
        /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    </style>
     <style>
        #commChart {
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

            <!-- <input type="text" class="form-control" id="sectionType" value="secChart" hidden> -->
            <input type="text" id="basicId" class="form-control" value="<?php echo $_SESSION["basicId"]; ?>" hidden
                disabled>

            <div class="row">
                <div class="col-md-12 col-lg-12  mb-3 s " data-aos-delay="200">
                    <div class="in-sec">
                        <div id="chartName">
                            <h3>City-wise Data Analytics </h3>
                        </div>
                        <div id="commChart"></div>

                    </div>
                </div>
            </div>

            <div class="row">


                <div class="col-md-12 col-lg-10 " data-aos-delay="200">

                    <!--Google map-->
                    <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 400px">
                        <iframe
                            src="https://www.google.com/maps/d/embed?mid=18zd1wuy9DmrOb4KkXpY0quUUY1Pkjv1p&ehbc=2E312F"
                            width="1200" height="500"></iframe>
                    </div>

                    <!--Google Maps-->
                </div>

                <!-- <div id="sectorInfo"> </div> -->
                <div class="col-md-12 col-lg-4 " data-aos-delay="200">
                    <div class="in-sec">
                       

                    </div>

                </div>
                <!-- <div id="sectorInfo"> </div> -->
            </div>
        </div>

        <div class="balance-summary">
            <section id="balance-title" class="text-center">
                <h2></h2>
                <p></p>
            </section>
            <div id="dataDownload">
                <div class="row align-items-center justify-content-center">
                    <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <h6> Click here to download Data - </h6>
                    </div>
                    <div class=" col-lg-1 col-md-1 col-sm-1 col-xs-1">

                        <input type="button" class="btn btn-primary " value="download"
                            onclick="convertTableToPDF( 'Balance_Report1','balance-title',
        ['ele-table','trans-table','crop-table','live-table','forest-table','land-table','solid-table','yard-table','bio-table','haz-table','ww-table'
        ,'stp-table','ie-table','cpp-table','chpp-table','alu-table','ld-table','zg-table','ck-table'],
        ['ele-header','trans-header','crop-header','live-header','forest-header','land-header','solid-header','yard-header','bio-header','haz-header','ww-header'
        ,'stp-header' ,'ie-header' ,'cpp-header' ,'chpp-header' ,'alu-header','ld-header','zg-header','ck-header'] );" />

                    </div>
                </div>
            </div>
            <section class="balance-report">
                <article>
                    <div id="sectorInfo"> </div>
                </article>
            </section>

        </div>



        </div>
    </section><!-- End Hero -->
    <!-- Adding Javascripts -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.4.1/jspdf.plugin.autotable.min.js"></script>
    <script type="text/javascript" src="js/jsTABLE.js"></script>





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

    <script src="js/commGraphDemo.js"></script>

    <script src="js/rawData.js"></script>
    <script src="js/sectorGraph.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>