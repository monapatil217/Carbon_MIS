<?php
require "php/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Electricity</title>
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
        /* #chartType {
            margin-top: 25vh;
            width: 100%;
            height: 300px;
        } */

        #electricity,
        #transport,
        #liveStock,
        #cropLand,
        #forest,
        #landUse,
        #energy,
        #product,
        #solidWaste,
        #wasteWater,
        #cookingFuel,
        #carbonGharph {
            width: 100%;
            height: 400px;
        }

        /* 
        #allEmiChart,
        #allsecEmiChart,
        #secEmiChart,
        #polluEmi,
        #poluEmiChart {
            width: 100%;
            height: 500px;
        } */

        /* * {
            box-sizing: border-box
        }

    
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: Arial;
        } */

        /* Style tab links */
        .tablink {
            background-color: #555;
            color: white;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 17px;
            width: 10%;
        }

        .tablink:hover {
            background-color: #777;
        }

        /* Style the tab content (and add height:100% for full page content) */
        .tabcontent {
            color: white;
            display: none;
            padding: 100px 20px;
            height: 100%;

             margin:auto;
            width:50%;
            padding:63px;
            text-align:center;
            /* // */
             
        }

        #t1 {
            background-color: #FFFF;
        }

        #t2 {
            background-color: #FFFF;
        }

        #t31 {
            background-color: #FFFF;
        }

        #t32 {
            background-color: #FFFF;
        }

        #t33 {
            background-color: #FFFF;
        }

        #t34 {
            background-color: #FFFF;
        }

        #t4 {
            background-color: #FFFF;
        }

        #t5 {
            background-color: #FFFF;
        }

        #t6 {
            background-color: #FFFF;
        }

        #t7 {
            background-color: #FFFF;
        }
    </style>

</head>

<body>

    <?php
    include 'header.php';
    ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex  justify-content-center" style="height: auto ; min-height: 100vh;">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

            <input type="text" id="basicId" class="form-control" value="<?php echo $_SESSION["basicId"]; ?>" hidden disabled>

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12  mb-3 s " data-aos-delay="200">
                    <div class="in-sec">
                        <h3><center>Carbon Emission </center></h3>
                        <div id="carbonGharph"></div>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12  mb-3 s " data-aos-delay="200">

                
                    <div class="in-sec">
                   

                        <button class="tablink" onclick="openPage('t1', this, '#888')" id="defaultOpen">Electricity</button>
                        <button class="tablink" onclick="openPage('t2', this, '#888')">Transport</button>
                        <button class="tablink" onclick="openPage('t31', this, '#888')">liveStock </button>
                        <button class="tablink" onclick="openPage('t32', this, '#888')">cropLand </button>
                        <button class="tablink" onclick="openPage('t33', this, '#888')">forest </button>
                        <button class="tablink" onclick="openPage('t34', this, '#888')">landUse </button>
                        <button class="tablink" onclick="openPage('t4', this, '#888')">SolidWaste</button>
                        <button class="tablink" onclick="openPage('t5', this, '#888')">WasteWater</button>
                        <button class="tablink" onclick="openPage('t6', this, '#888')">Industry</button>
                        <button class="tablink" onclick="openPage('t7', this, '#888')">cookingFuel</button>

                        <div id="t1"  class="tabcontent">
                            <div id="chartName" class="text-center col-md-4 col-md-offset-4">
                                    
                                <h3> Electricity Graph</h3>
                            </div>
                            <div id="electricity" ></div>
                        </div>
                        <div id="t2" class="tabcontent">
                            <div id="chartName">
                                <h3> Transport Graph</h3>
                            </div>
                            <div id="transport"></div>
                        </div>

                        <div id="t31" class="tabcontent">
                            <div id="chartName">
                                <h3> LiveStock Graph</h3>
                            </div>
                            <div id="liveStock"></div>
                        </div>
                        <div id="t32" class="tabcontent">
                            <div id="chartName">
                                <h3> CropLand Graph</h3>
                            </div>
                            <div id="cropLand"></div>
                        </div>
                        <div id="t33" class="tabcontent">
                            <div id="chartName">
                                <h3> Forest Graph</h3>
                            </div>
                            <div id="forest"></div>
                        </div>
                        <div id="t34" class="tabcontent">
                            <div id="chartName">
                                <h3> LandUse Graph</h3>
                            </div>
                            <div id="landUse"></div>
                        </div>

                        <div id="t4" class="tabcontent">
                            <div id="chartName">
                                <h3> SolidWaste Graph</h3>
                            </div>
                            <div id="solidWaste"></div>
                        </div>
                        <div id="t5" class="tabcontent">
                            <div id="chartName">
                                <h3> WasteWater Graph</h3>
                            </div>
                            <div id="wasteWater"></div>
                        </div>
                        <div id="t6" class="tabcontent">
                            <div id="chartName">
                                <h3> Industry Graph</h3>
                            </div>
                            <div id="energy"></div>
                        </div>
                        <div id="t6" class="tabcontent">
                            <div id="chartName">
                                <h3> Industry Graph</h3>
                            </div>
                            <div id="product"></div>
                        </div>
                        <div id="t7" class="tabcontent">
                            <div id="chartName">
                                <h3> cookingFuel Graph</h3>
                            </div>
                            <div id="cookingFuel"></div>
                        </div>
                    </div>

                </div>
            </div>


            <!-- <div class="row">
                <div class="col-md-12 col-lg-6  mb-3 s " data-aos-delay="200">
                    <div class="in-sec">
                        <div id="chartType">
                            <div class="row mt-3 text-center">
                                <h3> You Can View The Graph of Every Sector</h3>
                            </div>
                            <div class="row mt-3 justify-content-center">
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="sectionType" onchange="addChart();">
                                        <option disabled selected>Select Section</option>
                                        <option value="Energy">Electricity</option>
                                        <option value="Transport">Transport</option>
                                        <option value="AFOLU">AFOLU</option>
                                        <option value="SolidWaste">SolidWaste</option>
                                        <option value="WasteWater">WasteWater</option>
                                        <option value="Industry">Industry</option>
                                        <option value="FuelType">FuelType</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                </div> -->

            <!-- <div class="col-md-12 col-lg-6  mb-3 s " data-aos-delay="200">
                    <div class="in-sec text-center">
                        <div id="chartName">
                            <h3> Here you can see the Individual Graph</h3>
                        </div> 
                         <div id="chartDiv"></div>
                    </div>
                </div> -->

        </div>

        </div>
    </section><!-- End Hero -->

    <script>
        function openPage(pageName, elmnt, color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            document.getElementById(pageName).style.display = "block";
            elmnt.style.backgroundColor ="#2b2b2b";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
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

    <script src="assets/js/jquery.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="js/graph.js"></script>

</body>

</html>