<?php
require "php/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Take Action</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
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
    <link href="assets/css/template-rangebar.css" rel="stylesheet">
    <link href="assets/css/rangebar.css" rel="stylesheet">
     <link href="assets/css/datepeaker.css" rel="stylesheet">
    <!-- sectors icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css"> -->


    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/mobile/1.4.1/jquery.mobile-1.4.1.min.css">

    <link rel="stylesheet" type="text/css" href="slideControl.css" />
    <style>
    /* #actionchart {
            width: auto;
            height: 500px;
        }  */
    /* #actionchart {
        width: 100%;
        height: 500px;
    } */
    #actionchart {
        width: auto;
        height: 500px;
    }


    /* #electricity,
    #transport,
    #carbonGharph {
        width: 100%;
        height: 400px;
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

        margin: auto;
        width: auto;
        padding: 63px;
        text-align: center;
    }

    #t1 {
        /* background-color: #FFFF; */
    }

    #t2 {
        /* background-color: #FFFF; */
    }
    
    #datepicker {
         background-color:#D3D3D3;
         width:100px;
       /* background-color:#E0E0E0; */
        /* background-color:#CCCCCC; */
    }
   .bgcl{
      background-color:#D3D3D3; 
   }
    </style>
</head>

<body> <?php
        include 'header.php';
        ?>


    <!-- ======= subHero Section ======= -->
    <section id="subHero" class="d-flex  justify-content-center textc" style=" height: auto ; min-height: 100vh;">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <input type="text" id="basicId" class="form-control" value="<?php echo $_SESSION["basicId"]; ?>" hidden
                disabled>
                    <div class="row">
                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3" data-aos-delay="200">
                            <button class="tablink" onclick="openPage('t1', this, '#888')">2030</button><br>
                            <button class="tablink" onclick="openPage('t2', this, '#888')">2050 </button>
                        </div>  
                    </div>  
            <h3 class="text-center mt-5">Take Action</h3>
            <div class="row actionPlanText1">



                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ml-3" id="actionGraphdiv">
                    <div class="row actionPlanText">
                         <div class="row">

                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 mt-3" data-aos-delay="200">
                            <div class="card">
                                <div class="card-header p-3 pt-2">
                                    <div class="rounded mt-n4 position-absolute iconAdmin">
                                        <center><i class="fa fa-bolt mt-2 " aria-hidden="true"
                                                style="font-size:26px;color:#e9ecef"></i></center>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Electricity</p>
                                        <h6 class="mb-0" id="Eletricity"></h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 mt-3" data-aos-delay="200">
                            <div class="card">
                                <div class="card-header p-3 pt-2">
                                    <div class="rounded mt-n4 position-absolute iconAdmin">
                                        <center><i class="fa fa-automobile mt-2 "
                                                style="font-size:26px;color:#e9ecef"></i></center>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Transport</p>
                                        <h6 class="mb-0" id="Transport"></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 mt-3" data-aos-delay="200">
                            <div class="card">
                                <div class="card-header p-3 pt-2">
                                    <div class="rounded mt-n4 position-absolute iconAdmin">
                                        <center><i class="fa fa-tree mt-2 " aria-hidden="true"
                                                style="font-size:26px;color:#e9ecef"></i></center>

                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">AFOLU</p>
                                        <h6 class="mb-0" id="AFOLU"></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4  mt-3">
                            <div class="card">
                                <div class="card-header p-3 pt-2">
                                    <div class="rounded mt-n4 position-absolute iconAdmin">
                                        <center><i class="bi-trash mt-2 " style="font-size:26px;color:#e9ecef"></i>
                                        </center>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Waste</p>
                                        <h6 class="mb-0" id="Wastewater"> </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mt-3">
                            <div class="card">
                                <div class="card-header p-3 pt-2">
                                    <div class="rounded mt-n4 position-absolute iconAdmin">
                                        <center><i class="fa fa-industry mt-2 mb-2" aria-hidden="true"
                                                style="font-size:26px;color:#e9ecef"></i></center>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Industry</p>
                                        <h6 class="mb-0" id="Industry"> </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" data-aos-delay="200">

                            <!-- <div id="actionchart">
                            </div> -->
                            <button class="tablink" onclick="openPage('t1', this, '#888')">2030</button>
                            <button class="tablink" onclick="openPage('t2', this, '#888')">2050 </button>

                            <div id="t1" class="tabcontent">
                                <div id="chartName" class="text-center col-md-4 col-md-offset-4">
                                </div>
                                <div id="actionchart">
                                </div>

                            </div>
                            <div id="t2" class="tabcontent">
                                <div id="chartName" class="text-center col-md-4 col-md-offset-4">
                                </div>
                                <div id="actionchart">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-1 ">
                </div> -->

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                    <!-- <div class="card example-1 scrollbar-ripe-malinka"> -->
                        <div class="card-header p-3 pt-2">

                            <div class="row ">
                                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 " data-aos-delay="200">
                                    <!-- //// -->
                                    <div class="accordion " id="accordionExample">
                                    <div class="accordion-item bgcl">
                                    <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                       Electricity
                                    </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                         <p>
                                            1.Renewable power generation capacity (MMW)
                                            <input type="text" id="datepicker" placeholder="select year" size="5"  />
                                            <input class="range-slider__range range-slider__rangeE1" type="range"
                                                id="ele1" value="100" valueE1="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueE1"></span>
                                            <span class="range-slider__value range-slider__valueEE1"></span>

                                        <p>
                                            2.Nuclear power generation capacity (MMW)			

                                            <input type="text" id="datepicker" placeholder="select year" size="5" />
                                        <input class="range-slider__range range-slider__rangeE2" type="range" id="ele2"
                                            value="100" valueE2="0" min="0" max="100">
                                        <span class="range-slider__value range-slider__valueE2"></span>
                                        <span class="range-slider__value range-slider__valueEE2"></span>
                                        </p>
                                        <p>
                                            3.Implementation of Street Light Control systems			
.
                                            <input type="text" id="datepicker" placeholder="select year"  size="5"/>
                                        <input class="range-slider__range range-slider__rangeE3" type="range" id="ele3"
                                            value="100" valueE3="0" min="0" max="100">
                                        <span class="range-slider__value range-slider__valueE3"></span>
                                        <span class="range-slider__value range-slider__valueEE3"></span>
                                        </p>
                                        4.Implementation of Sustainable/Energy Efficient buildins.
                                            <input type="text" id="datepicker" placeholder="select year" size="5" />
                                        <input class="range-slider__range range-slider__rangeE3" type="range" id="ele3"
                                            value="100" valueE3="0" min="0" max="100">
                                        <span class="range-slider__value range-slider__valueE3"></span>
                                        <span class="range-slider__value range-slider__valueEE3"></span>
                                        </p>
                                        5.% of carbon to be captured at TPP.
                                            <input type="text" id="datepicker" placeholder="select year" size="5" />
                                        <input class="range-slider__range range-slider__rangeE3" type="range" id="ele3"
                                            value="100" valueE3="0" min="0" max="100">
                                        <span class="range-slider__value range-slider__valueE3"></span>
                                        <span class="range-slider__value range-slider__valueEE3"></span>
                                        </p>
                                    </div>
                                    </div>
                                </div>
                                 <div class="accordion-item bgcl">
                                <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Transport
                                </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                     <p>

                                            1.Number of new buses to be added<br>
                                            1.1 Expected Modal Shift (in %) for 2W, 4W

                                          

                                            <input class="range-slider__range range-slider__rangeT1" type="range"
                                                id="trans1" value="100" valueT1="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT1"></span>
                                            <span class="range-slider__value range-slider__valueTT1"></span>

                                        </p>
                                        <p>
                                            2. Number of metro trains to be added<br>
                                            1.2 Expected Modal Shift (in %) for 2W, 4W

                                            <input class="range-slider__range range-slider__rangeT2" type="range"
                                                id="trans2" value="100" valueT="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT2"></span>
                                            <span class="range-slider__value range-slider__valueTT2"></span>
                                        </p>
                                        <p>
                                            3. Will the city implement BRT systen<br>
                                            1.3 Expected Modal Shift (in %) for 2W, 4W

                                            <input class="range-slider__range range-slider__rangeT3" type="range"
                                                id="trans3" value="100" valueT="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT3"></span>
                                            <span class="range-slider__value range-slider__valueTT3"></span>
                                        </p>
                                        <p>
                                            4. Subsidisation of Public Transport<br>
                                           1.4 Expected Modal Shift (in %) for 2W, 4W

                                            <input class="range-slider__range range-slider__rangeT4" type="range"
                                                id="trans4" value="100" valueT="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT4"></span>
                                            <span class="range-slider__value range-slider__valueTT4"></span>
                                        </p>
                                        <p>
                                            5.Subsidisation of Public Transport<br>
                                            <input class="range-slider__range range-slider__rangeT5" type="range"
                                                id="trans5" value="100" valueT="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT5"></span>
                                            <span class="range-slider__value range-slider__valueTT5"></span>
                                        </p>
                                        <p>
                                            6.Implementation of congestion tax<br>
                                            <input class="range-slider__range range-slider__rangeT5" type="range"
                                                id="trans5" value="100" valueT="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT5"></span>
                                            <span class="range-slider__value range-slider__valueTT5"></span>
                                        </p>
                                        <p>
                                            7.Building special tracks for walking and cycling<br>
                                            <input class="range-slider__range range-slider__rangeT5" type="range"
                                                id="trans5" value="100" valueT="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT5"></span>
                                            <span class="range-slider__value range-slider__valueTT5"></span>
                                        </p>
                                        
                                </div>
                                </div>
                            </div>
                             <div class="accordion-item bgcl">
                            <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                AFOLU
                            </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                            1.Sustainable Agricultural Practices<br>
                                            <input type="radio" id="alf" name="afolu" value="afo" >
                                                <label for="alf">Yes</label>
                                                <input type="radio" id="alf1" name="afolu" value="afo" >
                                                <label for="alf1">No</label><br>
                                            <input class="range-slider__range range-slider__rangeAF1" type="range"
                                                id="AFOLU1" value="100" valueAF="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAF1"></span>
                                            <span class="range-slider__value range-slider__valueAFF1"></span>

                                        </p>

                                        <p>
                                            2. Livestock Management Practices<br>
                                            <input class="range-slider__range range-slider__rangeAF2" type="range"
                                                id="AFOLU2" value="100" valueAF="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAF2"></span>
                                            <span class="range-slider__value range-slider__valueAFF2"></span>

                                        </p>
                                    </div>
                                    </div>
                                </div>
                                 <div class="accordion-item bgcl">
                                <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Waste
                                </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                     <p>
                                            1. Reducing the amount of waste to landfill<br>
                                            <input class="range-slider__range range-slider__rangew1" type="range"
                                                id="W1" value="100" valueW="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valuew1"></span>
                                            <span class="range-slider__value range-slider__valueww1"></span>

                                        </p>
                                </div>
                                </div>
                            </div>
                             <div class="accordion-item bgcl">
                                <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Industry
                                </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                      <p>
                                            1. Coal replaced by PNG <br>
                                            <input class="range-slider__range range-slider__rangei1" type="range"
                                                id="indu1" value="100" valueI="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valuei1"></span>
                                            <span class="range-slider__value range-slider__valueii1"></span>
                                        </p>
                                        <p>
                                            2.FO replaced by PNG<br>
                                            <input class="range-slider__range range-slider__rangei2" type="range"
                                                id="indu2" value="100" valueI="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valuei2"></span>
                                            <span class="range-slider__value range-slider__valueii2"></span>

                                        </p>
                                        <p>
                                            3.Briquettes replaced by PNG<br>
                                            <input class="range-slider__range range-slider__rangei3" type="range"
                                                id="indu3" value="100" valueI="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valuei3"></span>
                                            <span class="range-slider__value range-slider__valueii3"></span>
                                        </p>
                                        <p>
                                            4.HSD replaced by PNG<br>
                                            <input class="range-slider__range range-slider__rangei4" type="range"
                                                id="indu3" value="100" valueI="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valuei3"></span>
                                            <span class="range-slider__value range-slider__valueii3"></span>
                                        </p>
                                        <p>
                                           5. LDO replaced by PNG
                                        <input class="range-slider__range range-slider__rangei5" type="range"
                                                id="indu3" value="100" valueI="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valuei3"></span>
                                            <span class="range-slider__value range-slider__valueii3"></span>
                                        </p>
                                </div>
                                </div>
                            </div>
                                </div>
                                    <!-- ///// -->
                                    <hr>
                               
                                           
                <!-- </div> -->
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
        elmnt.style.backgroundColor = "#2b2b2b";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>

    <!-- ***** Footer Start ***** --> <?php
                                        include 'footer.php';
                                        ?>
    <!-- End Footer -->
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    </script>
    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>


    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->
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
    <!-- <script async src="//jsfiddle.net/RiteshG09/csd9qey0/5/embed/"></script> -->
    <!-- <script async src="//jsfiddle.net/vW8zc/307embed/"></script> -->
     <script src="assets/js/jquery.ui.js"></script>
     <!-- <script async src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script> -->
    <!-- <script type='text/javascript' src="http://code.jquery.com/mobile/1.4.1/jquery.mobile-1.4.1.min.js"></script> -->
    <!-- <script src="js/colored.slider.js"></script> -->
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <!-- Our JS Files -->
    <!-- <script src="js/energyElectricityModel.js"></script> -->
    <script src="js/actionPlan.js"></script>

    <script src="js/common.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
            '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

    //         $(function () {
    //         $('[data-toggle="tooltip"]').tooltip()

    // }
    </script>
    <script type="text/javascript">
    $(function() {
        $('#datepicker,#datepicker1').datepicker({
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'yy',
            onClose: function(dateText, inst) {
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, 1));
            }
        });
        $(".date-picker-year").focus(function() {
            $(".ui-datepicker-month").hide();
        });
    });
    </script>

    <script>
    function updateTextInput(val) {
        document.getElementById('textInput').value = val;
    }
    </script>


    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script> -->
    <script type="text/javascript" src="jquery.slideControl.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.slideControl').slideControl();
    });
    </script>

    <!-- Range Bar -->
    <!-- <script>
 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
 </script>-->
    <script>
    //     var rangeSlider = function(){
    //   var slider = $('.range-slider'),
    //       range = $('.range-slider__range'),
    //       value = $('.range-slider__value');

    //   slider.each(function(){

    //     value.each(function(){
    //       var value = $(this).prev().attr('value');
    //       $(this).html(value);
    //     });

    //     range.on('input', function(){
    //       $(this).next(value).html(this.value);
    //     });
    //   });
    // };

    // rangeSlider();
    </script>


</body>

</html>