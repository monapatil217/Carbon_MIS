 <?php
    require "php/session.php";
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta content="width=device-width, initial-scale=1.0" name="viewport">
     <title>Cooking Fuel</title>
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
     <!-- =======================================================
  * Template Name: OnePage - v4.7.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
     <style>
     #cookingFuel {
         width: 500px;
         height: 360px;
     }
        /* .blink {
  animation: blink 3s infinite;
    }

@keyframes blink {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    color: blue;
  }
} */

     </style>
 </head>

 <body> <?php
        include 'header.php';
        ?>
     <!-- ======= Hero Section ======= -->
     <section id="subHero" class="d-flex  justify-content-center textc" style="height: auto ; min-height: 100vh;">
         <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
             <input type="text" class="form-control" id="sectionType" value="cookingFuel" hidden>
             <input type="text" id="basicId" class="form-control" value="<?php echo $_SESSION["basicId"]; ?>" hidden
                 disabled>
            <input type="text" id="cityName" class="form-control" value="<?php echo $_SESSION["cityName"]; ?>" hidden
                disabled>
             <div class="row justify-content-center">
                 <div class="col-md-12 col-lg-5  mb-3  s" data-aos-delay="200">
                     <div class="in-sec">
                         <form class="needs-validation" novalidate>
                             <!-- <h6 class="text-center"> Cooking Fuel</h6> -->
                             <marquee width="100%" direction="left" height="30px" scrollamount="2"> SCM - Standard Cubic
                                 Meter / MNGL - Maharashtra Natural Gas Ltd.</marquee>
                             <div id="cookingFuelInput"></div>
                             <div class="row ">
                                 <div class="col-md-12 mb-3 text-center">
                                     <button class="btn btn-primary " type="button"
                                         onclick="saveCookingData();">SAVE</button>
                                 </div>
                             </div>
                         </form>
                         </div>
                         <!-- Start PopUp div -->
                         <div class="row align-items-center justify-content-center" id="moreInfo">
                             <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 containern"
                                 data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                 <div class="fade-to-img" onclick="showCookingFuelInfo();">
                                     <img class="blink" id="popup-btn" src="img/cookingfuel.png" width="80"
                                         height="80"><br><br>
                                       <div class="overlay">
                                           <div class="text">Click Here!</div>      
                                         </div>
                                 </div>
                             </div>
                         </div>
                           <div class="row align-items-center justify-content-center" >                          
                               <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" id="mypop"
                                        data-scroll-reveal="enter right move 30px over 0.6s after 0.4s" >                                                         
                                            <div style="text-align:left;" onclick="pop();">
                                                <a href="#" id="popup-btn1"><u>Computations</u></a>                                      
                                            </div>
                                    </div>
                            </div>  
                         <!-- End PopUp div -->
                     <!-- </div> -->
                 </div>
                 <div class="col-md-12 col-lg-7 mb-3 s " data-aos-delay="200">
                     <div class="in-sec">
                         <h3 class="text-center">Carbon Emission from Cooking Fuel</h3>
                         <ul style="margin-left: 10px;">
                             <li class="popupli">We know GHG emissions from home cooking can be reduced by choosing
                                 which foods we eat and minimising cooking time and appliance use. Even combining a more
                                 environmentally friendly cooking method, such as using a microwave to part-cook food
                                 then roasting to finish in the oven, can cut our GHG emissions substantially.</li>
                             <!-- <li class="popupli">The sum is then 454 + 1211 = 1665 grammes of CO2/liter of LPG.</li> -->
                         </ul>
                         <!-- next button and print bitton -->
                         <div class="row justify-content-center">
                             <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"
                                 data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                  <div class="row justify-content-center"> 
                                 <div id="chartName">
                                     <!-- <h3>Carbon emission of Electricity</h3> -->
                                 </div>
                                 <div id="cookingFuel"></div>
                                 </div>
                             </div>
                              <div class=" col-lg-1 col-md-1 col-sm-1 col-xs-1"
                                 data-scroll-reveal="enter right move 30px over 0.6s after 0.4s"></div>

                             <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2"
                                 data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                 <!-- <button id="cmd" class="btn btn-primary "
                                     onclick="CreatePDFfromHTML('cookingFuel')">Print</button> -->
                                 <i class="bi bi-download" style="font-size:24px;color:#FFFFFF"
                                     class="btn btn-primary " value="download"
                                     onclick="CreatePDFfromHTML('cookingFuel')"></i>
                             </div>
                         </div>
                         <div class="row align-items-center justify-content-center">
                             <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2"
                                 data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                 <button type="button" class="btn btn-primary" onclick="redirect();">NEXT <i class=" "
                                         style='font-size:18px;color:gray'></i></button> </div>
                         </div>
                     </div>
                 </div>
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
     <div id="popup-wrapper1" class="popup-container">
        <div class="popup-content">
            <div class="row align-items-center justify-content-center">
                <div id="popUpData1" class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                </div>                   
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="btn-container">
                        <a href="#" id="close1" class="btn-gotit">Got It</a>
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
     <script src="js/common.js"></script>
     <script src="js/fuelUseInCityModel.js"></script>
      <script src="js/compareGraph.js"></script>
     <!-- <script src="js/induGraph.js"></script> -->
 </body>

 </html>