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
    <link href="assets/css/template-rangebar.css" rel="stylesheet">
    <link href="assets/css/rangebar.css" rel="stylesheet">
    <!-- sectors icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/mobile/1.4.1/jquery.mobile-1.4.1.min.css">

    <link rel="stylesheet" type="text/css" href="slideControl.css" />

    <!-- <style>
        #actionchart {
            width: auto;
            height: 500px;
        }       
        /* #actionGraphdiv {
        position: fixed;
        
        } */

 
    </style> -->
    <style>
        #actionchart {
            width: 100%;
            height: 500px;
        }
    </style>
</head>

<body> <?php
        include 'header.php';
        ?>


    <!-- ======= subHero Section ======= -->
    <section id="subHero" class="d-flex  justify-content-center textc" style=" height: auto ; min-height: 100vh;">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <input type="text" id="basicId" class="form-control" value="<?php echo $_SESSION["basicId"]; ?>" hidden disabled>
            <h3 class="text-center mt-5">Take Action</h3>
            <div class="row actionPlanText">



                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ml-3" id="actionGraphdiv">

                    <div class="row">

                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 mt-3" data-aos-delay="200">
                            <div class="card">
                                <div class="card-header p-3 pt-2">
                                    <div class="rounded mt-n4 position-absolute iconAdmin">
                                        <center><i class="fa fa-bolt mt-2 " aria-hidden="true" style="font-size:26px;color:#e9ecef"></i></center>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Electricity</p>
                                        <h6 class="mb-0">10200 tons/year</h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6 mt-3" data-aos-delay="200">
                            <div class="card">
                                <div class="card-header p-3 pt-2">
                                    <div class="rounded mt-n4 position-absolute iconAdmin">
                                        <center><i class="fa fa-automobile mt-2 " style="font-size:26px;color:#e9ecef"></i></center>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Transport</p>
                                        <h6 class="mb-0">10200 tons/year</h6>
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
                                        <center><i class="fa fa-tree mt-2 " aria-hidden="true" style="font-size:26px;color:#e9ecef"></i></center>

                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">AFOLU</p>
                                        <h6 class="mb-0">10200 tons/year</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4  mt-3">
                            <div class="card">
                                <div class="card-header p-3 pt-2">
                                    <div class="rounded mt-n4 position-absolute iconAdmin">
                                        <center><i class="bi-trash mt-2 " style="font-size:26px;color:#e9ecef"></i></center>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Waste</p>
                                        <h6 class="mb-0">10200 tons/year</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mt-3">
                            <div class="card">
                                <div class="card-header p-3 pt-2">
                                    <div class="rounded mt-n4 position-absolute iconAdmin">
                                        <center><i class="fa fa-industry mt-2 mb-2" aria-hidden="true" style="font-size:26px;color:#e9ecef"></i></center>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">Industry</p>
                                        <h6 class="mb-0">10200 tons/year</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" data-aos-delay="200">

                            <div id="actionchart">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 ">
                </div>

                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 container vertical-scrollable">
                    <div class="card example-1 scrollbar-ripe-malinka">
                        <div class="card-header p-3 pt-2">

                            <div class="row">
                                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" data-aos-delay="200">
                                    <center>
                                        <h4 class="text-center mt-3">Electricity</h4>
                                    </center>

                                    <div id="democontainer">
                                        <p>
                                            Application of Policies in Percentage(%)
                                        </p>
                                        <p>
                                            1. Renewable Energy.
                                             <input class="range-slider__range range-slider__rangeE1" type="range" id="ele1" value="100" min="0" max="100">
                                                 <span class="range-slider__value range-slider__valueE1"></span>
                                        <p>
                                            2. Carbon Capture in TPP.
                                             <input class="range-slider__range range-slider__rangeE2" type="range" id="ele2" value="100" min="0" max="100">
                                                 <span class="range-slider__value range-slider__valueE2"></span>
                                        </p>
                                        <p>
                                            3. Smart homes & utilities.
                                            <input class="range-slider__range range-slider__rangeE3" type="range" id="ele3" value="100" min="0" max="100">
                                                 <span class="range-slider__value range-slider__valueE3"></span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" data-aos-delay="200">
                                    <center>
                                        <h4 class="text-center mb-2">Transport</h4>
                                    </center>

                                    <div id="democontainer">
                                        <p>
                                            Application of Policies in Percentage(%)
                                        </p>
                                        <p>
                                            1. EV Policy.
                                            <input class="range-slider__range range-slider__rangeT1" type="range" id="trans1" value="100" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT1"></span>
                                        </p>
                                        <p>
                                            2. Strengthening and Shared Public Transport.
                                            <input class="range-slider__range range-slider__rangeT2" type="range" id="trans2" value="100" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT2"></span>
                                        </p>
                                        <p>
                                            3. Subsidisation of Public Transport.
                                            <input class="range-slider__range range-slider__rangeT3" type="range" id="trans3" value="100" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT3"></span>
                                        </p>
                                        <p>
                                            4. Non-Motorised Transport.
                                            <input class="range-slider__range range-slider__rangeT4" type="range" id="trans4" value="100" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT4"></span>
                                        </p> 
                                        <p>
                                            5. Introduction of Congestion tax.
                                            <input class="range-slider__range range-slider__rangeT5" type="range" id="trans5" value="100" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT5"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" data-aos-delay="200">
                                    <center>
                                        <h4 class="text-center mb-2">AFOLU</h4>
                                    </center>
                                    <div id="democontainer">
                                        <p>
                                            Application of Policies in Percentage(%)
                                        </p>
                                        <p>
                                            1. Adopting Sustainable Agricultural Practices .
                                            <input class="range-slider__range range-slider__range2" type="range" id="ele3" value="100" min="0" max="100">
                                            <span class="range-slider__value2">0</span>
                                        </p>

                                        <p>
                                            2. Livestock Management .
                                            <input class="range-slider__range range-slider__range2" type="range" id="ele3" value="100" min="0" max="100">
                                            <span class="range-slider__value2">0</span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" data-aos-delay="200">
                                    <center>
                                        <h4 class="text-center mb-2">Waste Sector</h4>
                                    </center>
                                    <div id="democontainer">
                                        <p>
                                            Application of Policies in Percentage(%)
                                        </p>
                                        <p>
                                                1. Reducing the amount of waste sent to landfill.
                                                <input class="range-slider__range range-slider__range2" type="range" id="ele3" value="100" min="0" max="100">
                                                <span class="range-slider__value2">0</span>
                                        </p>
                                        <p>
                                                2. Increasing the amount of waste composted.
                                                <input class="range-slider__range range-slider__range2" type="range" id="ele3" value="100" min="0" max="100">
                                                 <span class="range-slider__value2">0</span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" data-aos-delay="200">
                                    <center>
                                        <h4 class="text-center mb-2">Industry Sector</h4>
                                    </center>
                                    <div id="democontainer">
                                        <p>
                                            Application of Policies in Percentage(%)
                                        </p>
                                        <p>
                                                1. Coal Policy.
                                                <input class="range-slider__range range-slider__range2" type="range" id="ele3" value="100" min="0" max="100">
                                                <span class="range-slider__value2">0</span>
                                        </p>
                                        <p>
                                                2.FO Policy.
                                                <input class="range-slider__range range-slider__range2" type="range" id="ele3" value="100" min="0" max="100">
                                                <span class="range-slider__value2">0</span>
                                        </p>
                                        <p>
                                                3.Eradication of Wood .
                                                <input class="range-slider__range range-slider__range2" type="range" id="ele3" value="100" min="0" max="100">
                                                <span class="range-slider__value2">0</span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- End Hero -->

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
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>

<script>
    function updateTextInput(val) {
          document.getElementById('textInput').value=val; 
        }
    </script>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery.slideControl.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$('.slideControl').slideControl();
});
</script>

<!-- Range Bar -->
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