<!-- //This is Sample page -->
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
    <!-- /////// -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
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
            height: 400px;
        }
       .policy {
      padding-left : 100px;}

    </style>
</head>

<body> <?php
        include 'header.php';
        ?>


    <!-- ======= subHero Section ======= -->
    <section id="subHero" class="d-flex  justify-content-center textc" style=" height: auto ; min-height: 100vh;">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <input type="text" id="basicId" class="form-control" value="<?php echo $_SESSION["basicId"]; ?>" hidden disabled>
            <h3 class="text-center mt-4">Take Action</h3>
                     <div class="row align-items-center justify-content-center">

                                                   <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2 mt-3" data-aos-delay="200">
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
                        <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2 mt-2" data-aos-delay="200">
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
                          <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2 mt-3" data-aos-delay="200">
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
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2  mt-3">
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
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mt-3">
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
                  <div class="row  align-items-center justify-content-center">
                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3" data-aos-delay="200">
                 <!-- //carosual code start here -->

                        <div id="demo" class="carousel slide" data-bs-ride="carousel">

                          <!-- Indicators/dots -->
                          <div class="carousel-indicators">
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                          </div>
                          
                          <!-- The slideshow/carousel -->
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img src="assets/img/nev.jpg" alt="EV Policy" class="d-block" width="100%" height="300">
                              <div class="carousel-caption">
                                <h5>Use electric vehicle reduce carbon emission</h5>
                              </div>
                            </div>
                            <div class="carousel-item">
                              <img src="assets/img/solar2.jpg" alt="Solar energy Policy" class="d-block" width="100%" height="300">
                              <div class="carousel-caption">
                                <h5>Use solar energy reduce carbon emission</h5>
                              </div> 
                            </div>
                            <div class="carousel-item">
                              <img src="assets/img/coalpolicy.jpg" alt="Coal Policy" class="d-block" width="100%" height="300">
                               <!-- <img src="assets/img/carboncap.jpg" alt="Solar energy Policy" class="d-block" width="100%" height="300"> -->
                              <div class="carousel-caption">
                                <h5>Use Carbon capture reduce carbon emission</h5>
                                </div>  
                            </div>
                          </div>
                          
                          <!-- Left and right controls/icons -->
                          <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                          </button>
                        </div>

                        <div class="container-fluid mt-3">
                          <!-- <h5>Use Thise Policies and Reduce Emission</h5> -->

                        </div>

                         <!-- //carosual code end here -->

                  </div>
                  </div>

            <div class="row actionPlanText">                       
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 container vertical-scrollable">
                    <div class="row">
                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3" data-aos-delay="200">
                        <p class="text-sm mb-0 text-capitalize"><center><h3>2030 Year Policy</h3></center></p>
                        </div>
                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3 " data-aos-delay="200"container vertical-scrollable>
                            <div class="card example-1 scrollbar-ripe-malinka policy">

                                     <h3 class="text-center mt-3"><B>Take Action for 2030 </B></h3>

                                       <h4> Electricity</h4>
                                        <p><img src="assets/img/solarpol.png"  width="50px" height="40">
                                       Renewable policy applied 25%</br>
                                       <br></br>
                                      <img src="assets/img/indu.png"  width="50px" height="40"> 
                                       Carbon capture Applied 25%</br>
                                       <br></br>
                                       <img src="assets/img/smarthm.png"  width="50px" height="40"> 
                                        Smart homes 20%</p>
                                        <h4 class="text-danger fw-bold">10 KT/YEAR</h4>

                                        <h4>Transport</h4>
                                        <p><img src="assets/img/evvehic1.png"  width="50px" height="40">
                                        Proposed EV policy </br>                                                                                    
                                            2w 30%</br>
                                            3w 25%</br>
                                            4w 10%</br>
                                            Fleet operators 50%</br></p>
                                            <p><img src="assets/img/bus4.png"  width="50px" height="40">
                                            Buses</br>
                                            City bus 50%</br>
                                            msrtc 25%</br>                                          
                                             Govt Vehicles 100%</br></p>
                                            <p><img src="assets/img/scrap.png"  width="50px" height="40">
                                            Scrappage Policy (15 years older veh scrapped)</p>
                                        <h4 class="text-danger fw-bold">10 KT/YEAR</h4>

                                        <h4>AFOLU</h4>
                                        <p><img src="assets/img/land2.png"  width="50px" height="40">Cropland 10%</br> 
                                        <br></br>
                                        <img src="assets/img/livestock.png"  width="50px" height="40">Livestock 5%</P>

                                        <h4 class="text-danger fw-bold">10 KT/YEAR</h4>
                                        <p><img src="assets/img/waste.png"  width="50px" height="40">  Waste Sector
                                      
                                        <h6>45% od waste reaches landfill</h6>
                                        <h6>18% of wate reaches lanfill (All inert waste included)</h6></p>
                                        <h4 class="text-danger fw-bold">10KT/YEAR</h4>
                                        <p><img src="assets/img/industry.png"  width="50px" height="40">
                                        Industry Sector
                                        <h6> 25% of coal demand to be met with PNG</h6>
                                        <h6>100% replacement of FO with PNG</h6>
                                        <h6>100% replacement of wood with PNG</h6></p>
                                        <h4 class="text-danger fw-bold">10 KT/YEAR</h4>
                                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3" data-aos-delay="200">
                            <div id="actionchart">
                            </div>
                       
                            </div>
                              </div>
                          </div>

                        <!-- <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3" data-aos-delay="200">
                            <div id="actionchart">
                            </div>
                        </div> -->
                    </div>                  
                </div>


                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 container vertical-scrollable">
                    <div class="row">
                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3" data-aos-delay="200">
                        <p class="text-sm mb-0 text-capitalize"><center><h3>2050 Year Policy</h3></center></p>
                        </div>

                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3" data-aos-delay="200"container vertical-scrollable>
                           <div class="card example-1 scrollbar-ripe-malinka policy">
                          <h3 class="text-center mt-3">Take Action for 2050 </h3>
                        <h4>Electricity</h4>
                        <h6> Renewable policy applied 75%</h6>
                        <h6>Carbon capture Applied 75%</h6>
                        <h6>Smart homes 50%</h6>
                        <h4 class="text-danger fw-bold">10 KT/YEAR</h4>

                                  <h4>Transport</h4>
                                        <p> Proposed EV policy </br>
                                            2w 60%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3w 50%</br>
                                            4w 40%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fleet operators 75%</br></p>
                                            <p>
                                            Buses  </br>
                                            City bus 100%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; msrtc 50%</br>                                          
                                            Govt Vehicles 100%</br></p>
                                            <p>Scrappage Policy (15 years older veh scrapped)</p>
                                            <p> Congestion tax (4% cumulative reduction on 2W and 4 W)</P>
                                            <P>Non Motorised (5% cumulative reduction on 2W and 4 W)</p>
                                            <p>Subsidization (5% cumulative reduction on 2W and 4 W)</P>
                                            <P>Shared transport (5% cumulative reduction on 2W and 4 W)</p>
                                            <p> Introduction of BS VII </br>
                                            3w 60%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4w 35%</br>
                                            LMVS 60%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HCVs 75%</br>
                                            Buses 50%
                                            </p>
                                        <h4 class="text-danger fw-bold">10 KT/YEAR</h4>
           
                           <h4>AFOLU</h4>
                           <h6>Cropland 60%</h6>
                           <h6>Livestock 60%</h6>
                           <h4 class="text-danger fw-bold">10 KT/YEAR</h4>

                        <h4>Waste Sector</h4>
                         <h6>20% of waste is treated by composting</h6>
                           <h6>51% of waste is treated by composting (All biodegradable waste included)</h6>
                           <h4 class="text-danger fw-bold">10 KT/YEAR</h4>
    
                        <h4>Industry Sector</h4>
                        <h6> 75% of coal demand to be met with PNG</h6>
                        <h6>100% replacement of FO with PNG</h6>
                        <h6>100% replacement of wood with PNG</h6>
                        <h6>100% replacement of Briquettes with PNG</h6>
                        <h6>50% of LDO demand to be met with PNG</h6>
                        <h6>50% of HSD demand to be met with PNG</h6>


                        <h4 class="text-danger fw-bold">
                            10 KT/YEAR</h4>                      
                              </div> 

                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3" data-aos-delay="200">
                        <p class="text-sm mb-0 text-capitalize">Graph</p>
                        </div>
                    </div>
                    
                </div>
           
            </div>

        </div>

    </section><!-- End Hero -->

    <!-- ***** Footer Start ***** --> <?php
                                        include 'footer.php';
                                        ?>

<!-- /////// -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
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
    <!-- <script type='text/javascript' src="http://code.jquery.com/mobile/1.4.1/jquery.mobile-1.4.1.min.js"></script> -->
    <!-- <script src="js/colored.slider.js"></script> -->
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <!-- Our JS Files -->
    <!-- <script src="js/energyElectricityModel.js"></script> -->
    <script src="js/takeAction.js"></script>

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

//         $(function () {
//         $('[data-toggle="tooltip"]').tooltip()

// })
    </script>

<script>
    function updateTextInput(val) {
          document.getElementById('textInput').value=val; 
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