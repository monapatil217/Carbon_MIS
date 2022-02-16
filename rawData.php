<?php
require "php/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title> Raw Data</title>
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
    <link href="assets/vendor/jbox/jBox.all.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- =======================================================
  * Template Name: OnePage - v4.7.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    #secChart {
        width: 100%;
        height: 500px;
    }

    .demo {
        font-family: "Lato", sans-serif;
    }

    .tablink {
        background-color: #555;
        color: white;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 16px 16px;
        font-size: 16px;
        width: 14.28%;
    }

    .tablink:hover {
        background-color: #777;
    }

    /* Style the tab content */
    .tabcontent {
        color: white;
        display: none;
        padding: 40px;
        text-align: center;
    }

    #Electricity {
        background-color: #A8E6CE;
    }

    #Transport {
        background-color: #DCEDC2;
    }

    #AFOLU {
        background-color: #FFD3B5;
    }

    /* #CropLand {
            background-color: #FFD3B5;
        }

        #LiveStock {
            background-color: #FFD3B5;
        }

        #Forest {
            background-color: #FFD3B5;
        }

        #LandUse {
            background-color: #FFD3B5;
        } */
    #Solidwaste {
        background-color: #FFAAA6;
    }

    /* 
        #MSW {
            background-color: #FFAAA6;
        }

        #Yard {
            background-color: #FFAAA6;
        }

        #BIOW {
            background-color: #FFAAA6;
        }

        #HAZW {
            background-color: #FFAAA6;
        } */
    #WasteWater {
        background-color: #FF8C94;
    }

    #STP {
        background-color: #FF8C94;
    }

    #Industry {
        background-color: #9DE0AD;
    }

    /* 
        #IndustryPPc {
            background-color: #9DE0AD;
        }

        #IndustryPPch {
            background-color: #9DE0AD;
        }

        #IndustryPPal {
            background-color: #9DE0AD;
        } */
    #CookingFuel {
        background-color: #83AF9B;
    }

    .tabs-left {
        border-bottom: none;
        border-right: 1px solid #ddd;
    }

    .tabs-left>li {
        float: none;
        margin: 0px;
    }

    .tabs-left>li.active>a,
    .tabs-left>li.active>a:hover,
    .tabs-left>li.active>a:focus {
        border-bottom-color: #ddd;
        border-right-color: transparent;
        background: #f90;
        border: none;
        border-radius: 0px;
        margin: 0px;
    }

    .nav-tabs>li>a:hover {
        /* margin-right: 2px; */
        line-height: 1.42857143;
        border: 1px solid transparent;
        /* border-radius: 4px 4px 0 0; */
    }

    .tabs-left>li.active>a::after {
        content: "";
        position: absolute;
        top: 10px;
        right: -10px;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 10px solid #f90;
        display: block;
        width: 0;
    }
    </style>
</head>

<body> <?php
    include 'adminHeader.php';
    ?>
    <!-- ======= Hero Section ======= -->
    <section id="subHero" class="d-flex  justify-content-center" style="height: auto ; min-height: 100vh;">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <input type="text" class="form-control" id="sectionType" value="cropLand" hidden>
            <!-- <input type="text" class="form-control" id="sectionType" value="secChart" hidden> -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-10 s mb-3" data-aos-delay="200">
                    <!-- <div class="in-sec"> -->
                    <div class="row mt-3 justify-content-center">
                        <div class="form-group col-md-2 ">
                            <h5 style="color:white;">Select City :</h5>
                        </div>
                        <div class="form-group col-md-3">
                            <select class="form-control" id="cityList" name="cityList" onchange="addCityChart();">
                                <option selected disabled value="">Choose City</option>
                            </select>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
            <div id="addImg">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-10 s " data-aos-delay="200">
                        <div class="in-sec">
                            <img class="bg-img" src="assets/img/dashboard111.png" style="height: 460px; width:100%">
                        </div>
                    </div>
                </div>
            </div>
            <div id="addModel">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-10 s " data-aos-delay="200">
                        <div class="in-sec">
                            <div class="row mt-3 justify-content-center">
                                <h3 style="color:white;">Amrut City all Sectors Graph</h3>
                            </div>
                            <div id="chartDiv">
                                <div id="secChart"></div>
                            </div>
                        </div>
                        <!-- <div id="sectorInfo"> </div> -->
                    </div>
                </div>
                <!-- <div class="balance-summary">
                    <section id="balance-title" class="text-center">
                        <h2></h2>
                        <p></p>
                    </section> -->
                <!-- <div id="dataDownload"> -->
                <!-- <div class="row align-items-end justify-content-end">
                                <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <h6> Click here to download Data - </h6>
                                </div> -->
                <!-- <div class=" col-lg-1 col-md-1 col-sm-1 col-xs-1"> -->
                <!-- <input type="button" class="btn btn-primary " value="download" onclick="convertTableToPDF( 'Balance_Report','balance-title',
                                ['ele-table','trans-table','crop-table','live-table','forest-table','land-table','solid-table','yard-table','bio-table','haz-table','ww-table'
                                 ,'stp-table','ie-table','cpp-table','chpp-table','alu-table','ld-table','zg-table','ck-table'],
                                ['ele-header','trans-header','crop-header','live-header','forest-header','land-header','solid-header','yard-header','bio-header','haz-header','ww-header'
                                ,'stp-header' ,'ie-header' ,'cpp-header' ,'chpp-header' ,'alu-header','ld-header','zg-header','ck-header'] );" /> -->
                <!-- </div>
                    </div> -->
                <!-- </div> -->
                <section class="balance-report">
                    <article>
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-10 mt-1  mb-1" data-aos-delay="200">
                                <div class="in-sec demo">
                                    <div class="row">
                                        <div class="col-sm col-lg-11">
                                            <p style="color:white;">Click on the buttons inside the tabbed menu to see
                                                Tables :</p>
                                        </div>
                                        <div class="col-sm col-lg-1">
                                            <i class="bi bi-box-arrow-in-down" style="font-size:36px;color:#67b7dc"
                                                class="btn btn-primary " value="download"
                                                onclick="convertTableToPDF( 'Balance_Report','balance-title',
                                ['ele-table','trans-table','crop-table','live-table','forest-table','land-table','solid-table','yard-table','bio-table','haz-table','ww-table'
                                 ,'stp-table','ie-table','cpp-table','chpp-table','alu-table','ld-table','zg-table','ck-table'],
                                ['ele-header','trans-header','crop-header','live-header','forest-header','land-header','solid-header','yard-header','bio-header','haz-header','ww-header'
                                ,'stp-header' ,'ie-header' ,'cpp-header' ,'chpp-header' ,'alu-header','ld-header','zg-header','ck-header'] );"></i>
                                            <!-- <input type="button" class="btn btn-primary " value="download"
                                                onclick="convertTableToPDF( 'Balance_Report','balance-title',
                                ['ele-table','trans-table','crop-table','live-table','forest-table','land-table','solid-table','yard-table','bio-table','haz-table','ww-table'
                                 ,'stp-table','ie-table','cpp-table','chpp-table','alu-table','ld-table','zg-table','ck-table'],
                                ['ele-header','trans-header','crop-header','live-header','forest-header','land-header','solid-header','yard-header','bio-header','haz-header','ww-header'
                                ,'stp-header' ,'ie-header' ,'cpp-header' ,'chpp-header' ,'alu-header','ld-header','zg-header','ck-header'] );" /> -->
                                        </div>
                                    </div>
                                    <!-- <p>Click on the buttons inside the tabbed menu to see Tables :</p> -->
                                    <div id="sectorInfo"></div>
                                    <button class="tablink"
                                        onclick="openCity('Electricity', this, '#A8E6CE')">Electricity</button>
                                    <button class="tablink"
                                        onclick="openCity('Transport', this, '#DCEDC2')">Transport</button>
                                    <button class="tablink" onclick="openCity('AFOLU', this, '#FFD3B5')">AFOLU</button>
                                    <button class="tablink"
                                        onclick="openCity('Solidwaste', this, '#FFAAA6')">Solidwaste</button>
                                    <button class="tablink"
                                        onclick="openCity('WasteWater', this, '#FF8C94')">WasteWater</button>
                                    <button class="tablink"
                                        onclick="openCity('Industry', this, '#9DE0AD')">Industry</button>
                                    <button class="tablink"
                                        onclick="openCity('CookingFuel', this, '#83AF9B')">CookingFuel</button>
                                </div>
                            </div>
                        </div>
                    </article>
                </section>
            </div>
        </div>
        </div>
    </section><!-- End Sub Hero -->
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
    <script src="js/rawData.js"></script>
    <script src="js/sectorGraph.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>