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
    <!-- /////toggal purpose -->.
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css"> -->


    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/mobile/1.4.1/jquery.mobile-1.4.1.min.css">

    <link rel="stylesheet" type="text/css" href="slideControl.css" />
    <style>
    
    #actionchart {
        width: auto;
        height: 500px;
    }
   
    #datepicker {
         background-color:#D3D3D3;
         width:100px;
    }

   .bgcl{
      background-color:#F0F0F0;	
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
                   
            <h3 class="text-center mt-4">Take Action</h3>
             <div class="row">
                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2" data-aos-delay="200">
                        <!-- <input type="checkbox" checked data-toggle="toggle" data-style="android" data-onstyle="info"> -->
                            <!-- <button class="tablink" onclick="openPage('t1', this, '#888')">2030</button><br>
                            <button class="tablink" onclick="openPage('t2', this, '#888')">2050 </button> -->    
                          <p> <h4>Switching Here                   
                            <input type="checkbox" id="data-toggle" data-width="150" data-height="50" checked data-toggle="toggle" data-on="2030" data-onstyle="success"  data-off="2050"  data-onstyle="warning" data-offstyle="info">
                           </h4> </p> 
                        </div>  
                    </div>  
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
                                        <h6 class="mb-0 mt-2" id="Electricity"></h6>
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
                                        <h6 class="mb-0 mt-2" id="Transport"></h6>
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
                                        <h6 class="mb-0 mt-3" id="AFOLU"></h6>
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
                                        <h6 class="mb-0 mt-3" id="WasteWater"> </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mt-3">
                            <div class="card">
                                <div class="card-header p-3 pt-2">
                                    <div class="rounded mt-n4 position-absolute iconAdmin">
                                        <center><i class="fa fa-industry mt-2 mb-3" aria-hidden="true"
                                                style="font-size:26px;color:#e9ecef"></i></center>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize">energy</p>
                                        <h6 class="mb-0 mt-3" id="energy"> </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" data-aos-delay="200">

                                <div id="chartName">                             
                                <div id="actionchart"> </div> 
                                                        
                                 </div>
                            
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-1 ">
                </div> -->

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                    <!-- <div class="card example-1 scrollbar-ripe-malinka"> -->
                        <!-- <div class="card-header p-3 pt-2"> -->

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
                                     <!-- subaccordian-->
                                    <div class="row ">
                                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 " data-aos-delay="200">
                                    <!-- //// -->
                                    <div class="accordion " id="subaccordionExample">
                                    <div class="accordion-item bgcl">
                                    <h2 class="accordion-header" id="headingsubOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesubOne" aria-expanded="true" aria-controls="collapseOne">
                                       Residential
                                    </button>
                                    </h2>
                                    <div id="collapsesubOne" class="accordion-collapse collapse show" aria-labelledby="headingsubOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">


                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>1.Solar Rooftop on all Residential buildings </p>
                                          <input class="range-slider__range range-slider__rangeRE1" type="range"
                                                id="RE1" value="100" valueRE1="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueRE1"></span>
                                            <span class="range-slider__value range-slider__valueREE1"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="redtP1" placeholder="select year" />
                                           
                                        </div>
                                        </div>
                              
                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>2.Augmentation of Solar Rooftop</p>
                                          <input class="range-slider__range range-slider__rangeRE2" type="range"
                                                id="RE2" value="100" valueRE2="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueRE2"></span>
                                            <span class="range-slider__value range-slider__valueREE2"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="redtP2" placeholder="select year" />
                                           
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>3. Star rated electrical appliances (Refrigrator, TV, Light, AC, Washing Machine)</p>
                                          <input class="range-slider__range range-slider__rangeRE3" type="range"
                                                id="RE3" value="100" valueRE3="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueRE3"></span>
                                            <span class="range-slider__value range-slider__valueREE3"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="redtP3" placeholder="select year" />
                                           
                                        </div>
                                        </div>

                                        

                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>4. Green Buildings</p>
                                          <input class="range-slider__range range-slider__rangeRE4" type="range"
                                                id="RE4" value="100" valueRE4="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueRE4"></span>
                                            <span class="range-slider__value range-slider__valueREE4"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="redtP4" placeholder="select year" />
                                           
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>5. Smart Grid</p>
                                          <input class="range-slider__range range-slider__rangeRE5" type="range"
                                                id="RE5" value="100" valueRE5="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueRE5"></span>
                                            <span class="range-slider__value range-slider__valueREE5"></span>  
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="redtP5" placeholder="select year" />
                                           
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>6. Building Management System</p>
                                          <input class="range-slider__range range-slider__rangeRE6" type="range"
                                                id="RE6" value="100" valueRE6="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueRE6"></span>
                                            <span class="range-slider__value range-slider__valueREE6"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="redtP6" placeholder="select year" />
                                           
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>7. Solar Geyser</p>
                                          <input class="range-slider__range range-slider__rangeRE7" type="range"
                                                id="RE7" value="100" valueRE7="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueRE7"></span>
                                            <span class="range-slider__value range-slider__valueREE7"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="redtP7" placeholder="select year" />
                                           
                                        </div>
                                        </div>
                                        </div> </div> </div>
                                    <!-- </div>  -->
                               
                                        <!-- <div class="accordion " id="subaccordionsubExample"> -->
                                    <div class="accordion-item bgcl">
                                    <h2 class="accordion-header" id="headingsubTwo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesubTwo" aria-expanded="true" aria-controls="collapseTwo">
                                       Commercial
                                    </button>
                                    </h2>
                                    <div id="collapsesubTwo" class="accordion-collapse collapse " aria-labelledby="headingsubTwo" data-bs-parent="#subaccordionExample">
                                    <div class="accordion-body">

                                 <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                     <p>
                                            1. Solar Rooftop on all Commercial buildings </p>
                                            <input class="range-slider__range range-slider__rangeC1" type="range"
                                                id="ec1" value="100" valueC1="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueC1"></span>
                                            <span class="range-slider__value range-slider__valueCC1"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="ecdtP2" placeholder="select year"/>
                                         </div>                                          
                                   </div>
                                
                                   <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                     <p>
                                            2. Augmentation of Solar Rooftop </p>
                                            <input class="range-slider__range range-slider__rangeC2" type="range"
                                                id="ec2" value="100" valueC2="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueC2"></span>
                                            <span class="range-slider__value range-slider__valueCC2"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="ecdtP2" placeholder="select year"/>
                                         </div>                                          
                                   </div>

                                   <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                     <p>
                                            3. 5 Star rated electrical appliances (Refrigrator, TV, Light, AC, Washing Machine)</p>
                                            <input class="range-slider__range range-slider__rangeC3" type="range"
                                                id="ec3" value="100" valueC3="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueC3"></span>
                                            <span class="range-slider__value range-slider__valueCC3"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="ecdtP3" placeholder="select year"/>
                                         </div>                                          
                                   </div>
                                   

                                   <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                     <p>
                                            4. Green Buildings</p>
                                            <input class="range-slider__range range-slider__rangeC4" type="range"
                                                id="ec4" value="100" valueC4="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueC4"></span>
                                            <span class="range-slider__value range-slider__valueCC4"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="ecdtP4" placeholder="select year"/>
                                         </div>                                          
                                   </div>

                                   <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                          <p>
                                            5. Sensor based lighting</p>
                                            <input class="range-slider__range range-slider__rangeC5" type="range"
                                                id="ec5" value="100" valueC5="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueC5"></span>
                                            <span class="range-slider__value range-slider__valueCC5"></span>
                                        </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="ecdtP5" placeholder="select year"/>
                                         </div>                                          
                                   </div>
                                <!-- </div> -->
                                </div>
                            </div>
                            </div>

                            <!-- <div class="accordion " id="subaccordionsubExample"> -->
                                    <div class="accordion-item bgcl">
                                    <h2 class="accordion-header" id="headingsubThree">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesubThree" aria-expanded="true" aria-controls="collapseThree">
                                       Agriculture
                                    </button>
                                    </h2>
                                    <div id="collapsesubThree" class="accordion-collapse collapse " aria-labelledby="headingsubThree" data-bs-parent="#subaccordionExample">
                                    <div class="accordion-body">

                                 <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                            <p>
                                                    1. Promote energy efficient water pumps (provided by EESL), and solar pumps, wherever possible (through PM-KUSUM)</p>
                                                <input class="range-slider__range range-slider__rangeA1" type="range"
                                                        id="agri1" value="100" valueA1="0" min="0" max="100">
                                                    <span class="range-slider__value range-slider__valueA1"></span>
                                                    <span class="range-slider__value range-slider__valueAA1"></span>
                                        </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="wastedtP2" placeholder="select year"/>
                                         </div>  
                                 </div> 
                                         
                                         <div class="row ">
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                                    <p>
                                                    2. Solar Pumps</p>
                                                    <input class="range-slider__range range-slider__rangeA2" type="range"
                                                        id="agri2" value="100" valueA2="0" min="0" max="100">
                                                    <span class="range-slider__value range-slider__valueA2"></span>
                                                    <span class="range-slider__value range-slider__valueAA2"></span>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                                <input type="text" id="datepicker" name="wastedt33" placeholder="select year"/>
                                            </div>                                                                              
                                        </div>
                                </div>
                            </div>                              
                            </div>  


                                    <!-- <div class="accordion " id="subaccordionsubExample"> -->
                                    <div class="accordion-item bgcl">
                                    <h2 class="accordion-header" id="headingsubFour">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesubFour" aria-expanded="true" aria-controls="collapseFour">
                                       Industrial
                                    </button>
                                    </h2>
                                    <div id="collapsesubFour" class="accordion-collapse collapse " aria-labelledby="headingsubFour" data-bs-parent="#subaccordionExample">
                                    <div class="accordion-body">

                                <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                           <p>
                                            1. Solar Power Plant for every Industry</p>
                                            <input class="range-slider__range range-slider__rangeM1" type="range"
                                                id="M1" value="100" valueM1="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueM1"></span>
                                            <span class="range-slider__value range-slider__valueMM1"></span>
                                        </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="eledtei1" placeholder="select year"/>
                                         </div>                                          
                                </div>
                                
                                <!-- </div> -->
                                </div>
                            </div>
                            </div>

                                
                           <!-- <div class="accordion " id="subaccordionsubExample"> -->
                                    <div class="accordion-item bgcl">
                                    <h2 class="accordion-header" id="headingsubFive">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesubFive" aria-expanded="true" aria-controls="collapseFive">
                                       Muncipal Utilities
                                    </button>
                                    </h2>
                                    <div id="collapsesubFive" class="accordion-collapse collapse " aria-labelledby="headingsubFive" data-bs-parent="#subaccordionExample">
                                    <div class="accordion-body">

                                    <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                     <p>
                                            1. Solar Rooftop on all Government buildings </p>
                                            <input class="range-slider__range range-slider__rangeMU1" type="range"
                                                id="MU1" value="100" valueMU1="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueMU1"></span>
                                            <span class="range-slider__value range-slider__valueMMU1"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="mutidte1" placeholder="select year"/>
                                         </div>
                                </div>
                                <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                     <p>
                                    2. Augmentation of Solar Rooftop </p>
                                            <input class="range-slider__range range-slider__rangeMU2" type="range"
                                                id="MU2" value="100" valueMU2="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueMU2"></span>
                                            <span class="range-slider__value range-slider__valueMMU2"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="mutidte2" placeholder="select year"/>
                                         </div>
                                </div>
                                <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                     <p>
                                            3. Solar Street Light in all Roads, Parks and Hoardings </p>
                                            <input class="range-slider__range range-slider__rangeMU3" type="range"
                                                id="MU3" value="100" valueMU3="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueMU3"></span>
                                            <span class="range-slider__value range-slider__valueMMU3"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="mutidte3" placeholder="select year"/>
                                         </div>
                                </div>
                                <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                     <p>
                                            4. 5 Star rated electrical appliances (Refrigrator, TV, Light, AC, Washing Machine) </p>
                                            <input class="range-slider__range range-slider__rangeMU4" type="range"
                                                id="MU4" value="100" valueMU4="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueMU4"></span>
                                            <span class="range-slider__value range-slider__valueMMU4"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="mutidte4" placeholder="select year"/>
                                         </div>
                                </div>

                                <!-- </div> -->
                                </div>
                            </div>                              
                        </div>  


                        </div> </div> </div>
                                     <!---  <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>1.Power generation capacity (MMW) </p>
                                            <div class="row ">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                                    <p>I.Renewable:
                                                        <input class="form-control" type="text" id="rew1"  style="width: 100px; height: 30px;"></p>
                                                </div>   
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">                                              
                                                    <p> II.Nuclear:
                                                    <input class="form-control" type="text" id="nucl1" style="width: 100px; height: 30px;"></p>
                                                </div>
                                            </div>    
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="eledtP1" placeholder="select year" />
                                            <!-- <input class="range-slider__range range-slider__rangeE1" type="range"
                                                id="ele1" value="100" valueE1="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueE1"></span>
                                            <span class="range-slider__value range-slider__valueEE1"></span> -->
                                     <!--   </div>
                                        </div>
                                        <div class="row ">
                                         <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                        <p>
                                              2.Implementation of Street Light Control systems</P>
                                        <div class="row ">
                                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                               <input type="radio" id="ele" name="elecc" value="electricity">
                                                                <label for="ele">Yes</label>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                                <input type="radio" id="ele" name="elecc" value="electricity">
                                                                <label for="ele">No</label><br>

                                                </div> 
                                                 <input class="range-slider__range range-slider__rangeE1" type="range" id="ele1"
                                                 value="100" valueE1="0" min="0" max="100">
                                                <span class="range-slider__value range-slider__valueE1"></span>
                                                <span id="e1" class="range-slider__value range-slider__valueEE1"></span>		
                                            </div>
                                            </div>
                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="eledtP2" placeholder="select year"  />
                                       
                                        </p>
                                    </div>
                                        </div>
                                       
                                    <div class="row ">
                                         <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                           <p> 3.Implementation of Sustainable/Energy Efficient buildings.</p>	
                                            <div class="row ">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                                    <input type="radio" id="eleEf" name="eleccef" value="electricity">
                                                                <label for="eleEf">Yes</label>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">

                                                        <input type="radio" id="eleEf" name="eleccef" value="electricity">
                                                                <label for="eleEf">No</label>
                                                    </div>
                                                    <!-- </div> -->
                                           <!-- </div>	
                                                <input class="range-slider__range range-slider__rangeE2" type="range" id="ele2"
                                                value="100" valueE2="0" min="0" max="100">
                                                <span class="range-slider__value range-slider__valueE2"></span>
                                                <span class="range-slider__value range-slider__valueEE2"></span>	
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="eledtP3" placeholder="select year" />                                                                           
                                        </div>

                                    </div>
                                     <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                            <p>4.% of carbon to be captured at TPP.</p>
                                            <input class="range-slider__range range-slider__rangeE3" type="range" id="ele3"
                                            value="100" valueE3="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueE3"></span>
                                            <span class="range-slider__value range-slider__valueEE3"></span>
                                       </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="eledtP4" placeholder="select year" />
                                       </div>
                                       </div>-->
                                      
                                      <br>
                                       <!-- change by monali -->
                                        <div class="row ">                               
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  mb-3 text-center">
                                            <button class="btn btn-primary " type="button"
                                                onclick="eleAction();">SAVE</button>
                                        </div>
                                     </div>       
                                    </div>
                                    </div>
                                </div>
                                <!-- <hr> -->
                                 <div class="accordion-item bgcl">
                                <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Transport
                                </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                <div class="row ">
                                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 " data-aos-delay="200">
                                    <!--  Transport Subaccordian1 --> 
                                    <div class="accordion " id="subaccordionEx">
                                    <div class="accordion-item bgcl">
                                    <h2 class="accordion-header" id="headingtw">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetw" aria-expanded="true" aria-controls="collapsetw">
                                      2W
                                    </button>
                                    </h2>
                                    <div id="collapsetw" class="accordion-collapse collapse show" aria-labelledby="headingtw" data-bs-parent="#subaccordionEx">
                                    <div class="accordion-body">
                                        <!-- /// -->
                                   
                                            <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>1.Bicycle on Rent </p>
                                          <input class="range-slider__range range-slider__rangeT1" type="range"
                                                id="Transp1" value="100" valueT1="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT1"></span>
                                            <span class="range-slider__value range-slider__valueTT1"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="transdtP1" placeholder="select year" />
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>2.Electric Bikes / Scooters</p>
                                          <input class="range-slider__range range-slider__rangeT2" type="range"
                                                id="Transp2" value="100" valueT2="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT2"></span>
                                            <span class="range-slider__value range-slider__valueTT2"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="transdtP2" placeholder="select year" />
                                        </div>
                                    </div>

                                        </div></div>
                                      </div>
                                    <!-- </div></div> -->
                                    <!-- </div> -->

                                      <!-- // -->
                            <div class="accordion-item bgcl">
                            <h2 class="accordion-header" id="headingTw">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTw" aria-expanded="true" aria-controls="collapseTw">
                            3W
                            </button>
                            </h2>
                            <div id="collapseTw" class="accordion-collapse collapse" aria-labelledby="headingTw" data-bs-parent="#subaccordionEx">
                            <div class="accordion-body">
                             <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">  
                                        <p>
                                             1.E-Rikshaw</p>     
                                                <input class="range-slider__range range-slider__rangeT3" type="range"
                                                id="Transp3" value="100" valueT3="0" min="0" max="100">
                                                <span class="range-slider__value range-slider__valueT3"></span>
                                                <span class="range-slider__value range-slider__valueTT3"></span>
                                        </div>
                                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="transdtP3" placeholder="select year"/>
                                         </div>
                                   </div>
                                </div>
                            </div>
                    </div>
             
                    <!-- // -->
                                 <div class="accordion-item bgcl">
                                    <h2 class="accordion-header" id="headingfw">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseheadingfw" aria-expanded="true" aria-controls="collapseheadingfw">
                                    4 W
                                    </button>
                                    </h2>
                                    <div id="collapseheadingfw" class="accordion-collapse collapse " aria-labelledby="headingfw" data-bs-parent="#subaccordionEx">
                                    <div class="accordion-body">

                                    <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                     <p>
                                            1. Electric Taxis / Cabs </p>
                                            <input class="range-slider__range range-slider__rangeT4" type="range"
                                                id="Transp4" value="100" valueT4="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT4"></span>
                                            <span class="range-slider__value range-slider__valueTT4"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="transdtP4" placeholder="select year"/>
                                         </div>
                                </div>


                                    <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                     <p>
                                            2. Car Pooling </p>
                                            <input class="range-slider__range range-slider__rangeT5" type="range"
                                                id="Transp5" value="100" valueT5="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT5"></span>
                                            <span class="range-slider__value range-slider__valueTT5"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="transdtP5" placeholder="select year"/>
                                         </div>
                                </div>
  
                                <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                     <p>
                                            3. Electric Cars </p>
                                            <input class="range-slider__range range-slider__rangeT6" type="range"
                                                id="Transp6" value="100" valueT6="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT6"></span>
                                            <span class="range-slider__value range-slider__valueTT6"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="transdtP6" placeholder="select year"/>
                                         </div>
                                </div>

                                    <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                     <p>
                                            4. Promoting Hybrid Vehicles </p>
                                            <input class="range-slider__range range-slider__rangeT7" type="range"
                                                id="Transp7" value="100" valueT7="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT7"></span>
                                            <span class="range-slider__value range-slider__valueTT7"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="transdtP7" placeholder="select year"/>
                                         </div>
                                </div>
                            </div>
                            </div></div>
               
                    <!-- // -->
                         <div class="accordion-item bgcl">
                            <h2 class="accordion-header" id="headingb">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseheadingb" aria-expanded="true" aria-controls="collapseheadingb">
                            Bus
                            </button>
                            </h2>
                            <div id="collapseheadingb" class="accordion-collapse collapse" aria-labelledby="headingb" data-bs-parent="#subaccordionEx">
                            <div class="accordion-body">

                                    <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">  
                                        <p>
                                        1. Electric Buses</p>
                                            <input class="range-slider__range range-slider__rangeT8" type="range"
                                                id="Transp8" value="100" valueT8="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT8"></span>
                                            <span class="range-slider__value range-slider__valueTT8"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="transdtP8" placeholder="select year"/>
                                         </div>  
                                      </div>
                                        <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                     <p>
                                            2. Bus Rapid Transition System (BRTS)</p>
                                            <input class="range-slider__range range-slider__rangeT9" type="range"
                                                id="Transp9" value="100" valueT9="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT9"></span>
                                            <span class="range-slider__value range-slider__valueTT9"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="transdtP9" placeholder="select year"/>
                                         </div>   
                                    </div>
                                    </div>
                    </div></div>
             
                    <!-- // -->
                
                           <div class="accordion-item bgcl">
                            <h2 class="accordion-header" id="headingsSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTrans5" aria-expanded="true" aria-controls="collapseTrans5">
                            Other
                            </button>
                            </h2>
                            <div id="collapseTrans5" class="accordion-collapse collapse" aria-labelledby="headingsSix" data-bs-parent="#subaccordionEx">
                               <div class="accordion-body">
                                  <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">  
                                        <p>
                                        1. Metro</p>
                                            <input class="range-slider__range range-slider__rangeT10" type="range"
                                                id="Transp10" value="100" valueT10="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT10"></span>
                                            <span class="range-slider__value range-slider__valueTT10"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="transdtP10" placeholder="select year"/>
                                         </div>  
                                    </div>
                                 <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                     <p>
                                        2. Ethanol Blending</p>
                                            <input class="range-slider__range range-slider__rangeT11" type="range"
                                                id="Transp11" value="100" valueT11="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT11"></span>
                                            <span class="range-slider__value range-slider__valueTT11"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="transdtP11" placeholder="select year"/>
                                         </div>   
                                  </div>
                                <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                     <p>
                                            3. Smart Traffic Signals</p>
                                            <input class="range-slider__range range-slider__rangeT12" type="range"
                                                id="Transp12" value="100" valueT12="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT12"></span>
                                            <span class="range-slider__value range-slider__valueTT12"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="transdtP12" placeholder="select year"/>
                                         </div>   
                                     </div>
                               <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                     <p>
                                            4.Efficient public transport, intergration of data and AI</p>
                                            <input class="range-slider__range range-slider__rangeT13" type="range"
                                                id="Transp13" value="100" valueT13="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueT13"></span>
                                            <span class="range-slider__value range-slider__valueTT13"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="transdtP13" placeholder="select year"/>
                                         </div>   
                                      </div></div></div></div>
                                      </div></div></div>
                                       <br>
                                       <div class="row ">                               
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  mb-3 text-center">
                                            <button class="btn btn-primary " type="button"
                                                onclick="transAction();">SAVE</button>
                                        </div>
                                     </div>    
                                </div>
                                </div>
                            </div>

                            <!-- change by monali -->
                             <div class="accordion-item bgcl">
                            <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                AFOLU
                            </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <div class="row ">
                                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 " data-aos-delay="200">
                                    <!-- //// -->
                                    <div class="accordion " id="subaccordionExample1">
                                    <div class="accordion-item bgcl">
                                    <h2 class="accordion-header" id="headingsubafOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesubafOne" aria-expanded="true" aria-controls="collapsesubafOne">
                                      Agriculture
                                    </button>
                                    </h2>
                                    <div id="collapsesubafOne" class="accordion-collapse collapse show" aria-labelledby="headingsubafOne" data-bs-parent="#subaccordionExample1">
                                    <div class="accordion-body">


                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>1.Integrated Pest Management </p>
                                          <input class="range-slider__range range-slider__rangeAF01" type="range"
                                                id="AF01" value="100" valueAF01="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAF01"></span>
                                            <span class="range-slider__value range-slider__valueAFF01"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="AAFdtP1" placeholder="select year" />
                                           
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>2.Reduce Emissions from Fertilizers by Increasing Nitrogen Use Efficiency </p>
                                          <input class="range-slider__range range-slider__rangeAF02" type="range"
                                                id="AF02" value="100" valueAF02="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAF02"></span>
                                            <span class="range-slider__value range-slider__valueAFF02"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="AAFdtP2" placeholder="select year" />
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>3.Crop Diversification </p>
                                          <input class="range-slider__range range-slider__rangeAF3" type="range"
                                                id="AF3" value="100" valueAF3="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAF3"></span>
                                            <span class="range-slider__value range-slider__valueAFF3"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="AAFdtP3" placeholder="select year" />
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>4.Crop Rotation </p>
                                          <input class="range-slider__range range-slider__rangeAF4" type="range"
                                                id="AF4" value="100" valueAF4="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAF4"></span>
                                            <span class="range-slider__value range-slider__valueAFF4"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="AAFdtP4" placeholder="select year" />
                                        </div>
                                        </div>       

                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>5.No till Agriculture </p>
                                          <input class="range-slider__range range-slider__rangeAF5" type="range"
                                                id="AF5" value="100" valueAF5="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAF5"></span>
                                            <span class="range-slider__value range-slider__valueAFF5"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="AAFdtP5" placeholder="select year" />
                                        </div>
                                        </div>             

                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>6.Organic Farming </p>
                                          <input class="range-slider__range range-slider__rangeAF6" type="range"
                                                id="AF6" value="100" valueAF6="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAF6"></span>
                                            <span class="range-slider__value range-slider__valueAFF6"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="AAFdtP6" placeholder="select year" />
                                        </div>
                                        </div>    
                                        
                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>7.Agroforestry </p>
                                          <input class="range-slider__range range-slider__rangeAF7" type="range"
                                                id="AF7" value="100" valueAF7="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAF7"></span>
                                            <span class="range-slider__value range-slider__valueAFF7"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="AAFdtP7" placeholder="select year" />
                                        </div>
                                        </div>  
                                        
                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>8.Participatory Irrigation Management (PIM) </p>
                                          <input class="range-slider__range range-slider__rangeAF8" type="range"
                                                id="AF8" value="100" valueAF8="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAF8"></span>
                                            <span class="range-slider__value range-slider__valueAFF8"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="AAFdtP8" placeholder="select year" />
                                        </div>
                                        </div>  

                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>9.Sprinkler and drip irrigation
                                             </p>
                                          <input class="range-slider__range range-slider__rangeAF9" type="range"
                                                id="AF9" value="100" valueAF9="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAF9"></span>
                                            <span class="range-slider__value range-slider__valueAFF9"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="AAFdtP9" placeholder="select year" />
                                        </div>
                                        </div>  

                                        
                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>10.Watershed development for water use efficiency
                                             </p>
                                          <input class="range-slider__range range-slider__rangeAF10" type="range"
                                                id="AF10" value="100" valueAF10="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAF10"></span>
                                            <span class="range-slider__value range-slider__valueAFF10"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="AAFdtP10" placeholder="select year" />
                                        </div>
                                        </div>  

                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>11.Increase awareness to increase water use efficiency
                                             </p>
                                          <input class="range-slider__range range-slider__rangeAF11" type="range"
                                                id="AF11" value="100" valueAF11="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAF11"></span>
                                            <span class="range-slider__value range-slider__valueAFF11"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="AAFdtP11" placeholder="select year" />
                                        </div>
                                        </div>  

                                            </div></div></div>

                                            <div class="accordion-item bgcl">
                                    <h2 class="accordion-header" id="headingsubafTwo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesubafTwo" aria-expanded="true" aria-controls="collapsesubafTwo">
                                    Forest
                                    </button>
                                    </h2>
                                    <div id="collapsesubafTwo" class="accordion-collapse collapse" aria-labelledby="headingsubafTwo" data-bs-parent="#subaccordionExample1">
                                    <div class="accordion-body">


                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>1.Increase Green Cover </p>
                                          <input class="range-slider__range range-slider__rangeFF1" type="range"
                                                id="FF1" value="100" valueFF1="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueFF1"></span>
                                            <span class="range-slider__value range-slider__valueFFF1"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="AFFdtP1" placeholder="select year" />
                                           
                                        </div>
                                        </div>
                                        
                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>2.Replenishment of Timber Harvesting </p>
                                          <input class="range-slider__range range-slider__rangeFF2" type="range"
                                                id="FF2" value="100" valueFF2="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueFF2"></span>
                                            <span class="range-slider__value range-slider__valueFFF2"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="AFFdtP2" placeholder="select year" />
                                           
                                        </div>
                                        </div>

                                        </div></div></div>
                
                                    <div class="accordion-item bgcl">
                                    <h2 class="accordion-header" id="headingsubafThree">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesubafThree" aria-expanded="true" aria-controls="collapsesubafThree">
                                    Land Use
                                    </button>
                                    </h2>
                                    <div id="collapsesubafThree" class="accordion-collapse collapse" aria-labelledby="headingsubafThree" data-bs-parent="#subaccordionExample1">
                                    <div class="accordion-body">

                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>1.Increasing Cycling Track and walking trail </p>
                                          <input class="range-slider__range range-slider__rangeLU1" type="range"
                                                id="LU1" value="100" valueLU1="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueLU1"></span>
                                            <span class="range-slider__value range-slider__valueLLU1"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="LUdtP1" placeholder="select year" />
                                           
                                        </div>
                                        </div>
                                        
                                        <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
                                          <p>2.Increasing green pavements </p>
                                          <input class="range-slider__range range-slider__rangeLU2" type="range"
                                                id="LU2" value="100" valueLU2="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueLU2"></span>
                                            <span class="range-slider__value range-slider__valueLLU2"></span> 
                                        </div>
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                                            <input type="text" id="datepicker" name="LUdtP2" placeholder="select year" />
                                           
                                        </div>
                                        </div>

                                        </div></div></div>

                                            </div></div></div>
                                        
                                        
                             <!-- <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">  
                                        <p>
                                             1.Sustainable Agricultural Practices</p>
                                        <div class="row ">
                                               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                                <input type="radio" id="alf" name="afolu" value="afo" >
                                                <label for="alf">Yes</label>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                                <input type="radio" id="alf1" name="afolu" value="afo" >
                                                <label for="alf1">No</label><br>
                                                </div>  
                                                </div>     
                                                <input class="range-slider__range range-slider__rangeAF1" type="range"
                                                id="AFOLU1" value="100" valueAF="0" min="0" max="100">
                                                <span class="range-slider__value range-slider__valueAF1"></span>
                                                <span class="range-slider__value range-slider__valueAFF1"></span>
                                        </div>
                                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="afoludtP1" placeholder="select year"/>
                                         </div>
                                        </div>
                                        <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">  
                                        <p>
                                            2. Livestock Management Practices </p>
                                            <div class="row ">
                                               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                                <input type="radio" id="alf" name="afolu" value="afo" >
                                                <label for="alf">Yes</label>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                                <input type="radio" id="alf1" name="afolu" value="afo" >
                                                <label for="alf1">No</label><br>
                                                </div>  
                                                </div>  
                                            <input class="range-slider__range range-slider__rangeAF2" type="range"
                                                id="AFOLU2" value="100" valueAF="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAF2"></span>
                                            <span class="range-slider__value range-slider__valueAFF2"></span>
                                            </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="afoludtP2" placeholder="select year"/>
                                         </div>                                     
                                        </div> -->
                                        <br>
                                        <div class="row ">                               
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  mb-3 text-center">
                                            <button class="btn btn-primary " type="button"
                                                onclick="afoluAction();">SAVE</button>
                                        </div>
                                     </div>  
                                    </div>
                                    </div>
                                </div>
                                 
                                <div class="accordion-item bgcl">
                                <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Municipal Solid Waste
                                </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                 <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                     <p>
                                            1. Composting </p>
                                            <input class="range-slider__range range-slider__rangemsw1" type="range"
                                                id="msw1" value="100" valuemsw1="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valuemsw1"></span>
                                            <span class="range-slider__value range-slider__valuemssw1"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="mswdtP1" placeholder="select year"/>
                                         </div>                                          
                                </div>
                                <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                     <p>
                                            2. Bio Methanation </p>
                                            <input class="range-slider__range range-slider__rangemsw2" type="range"
                                                id="msw2" value="100" valuemsw2="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valuemsw2"></span>
                                            <span class="range-slider__value range-slider__valuemssw2"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="mswdtP2" placeholder="select year"/>
                                         </div>                                          
                                </div>

                                <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                     <p>
                                            3. Incineration </p>
                                            <input class="range-slider__range range-slider__rangemsw3" type="range"
                                                id="msw3" value="100" valuemsw3="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valuemsw3"></span>
                                            <span class="range-slider__value range-slider__valuemssw3"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="mswdtP3" placeholder="select year"/>
                                         </div>                                          
                                </div>
                                <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                     <p>
                                            4. Waste to Energy</p>
                                            <input class="range-slider__range range-slider__rangemsw4" type="range"
                                                id="msw4" value="100" valuemsw4="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valuemsw4"></span>
                                            <span class="range-slider__value range-slider__valuemssw4"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="mswdtP4" placeholder="select year"/>
                                         </div>                                          
                                </div>
                                <br>
                                <div class="row ">                               
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  mb-3 text-center">
                                            <button class="btn btn-primary " type="button"
                                                onclick="wasteAction();">SAVE</button>
                                        </div>
                                </div>  
                                </div>
                                </div>
                            </div>


                                 <div class="accordion-item bgcl">
                                <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                    Waste Water
                                </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                 <div class="row ">
                                 <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 " data-aos-delay="200">
                                 <div class="accordion " id="subaccordionExampleant1">
                                    <div class="accordion-item bgcl">
                                    <h2 class="accordion-header" id="headingsubafOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesubantOne" aria-expanded="true" aria-controls="collapsesubantOne">
                                    Aerobic Treatment
                                    </button>
                                    </h2>
                                    <div id="collapsesubantOne" class="accordion-collapse collapse show" aria-labelledby="headingsubantOne" data-bs-parent="#subaccordionExampleant1">
                                    <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                     <p>
                                            1. Reducing the amount of waste to landfill</p>
                                            <input class="range-slider__range range-slider__rangeAT1" type="range"
                                                id="AT1" value="100" valueAT1="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAT1"></span>
                                            <span class="range-slider__value range-slider__valueATT1"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="ATdtP1" placeholder="select year"/>
                                         </div>                                          
                                </div>

                                <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                     <p>
                                     2. Augmentation of treatment of Waste Water</p>
                                            <input class="range-slider__range range-slider__rangeAT2" type="range"
                                                id="AT2" value="100" valueAT2="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAT2"></span>
                                            <span class="range-slider__value range-slider__valueATT2"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="ATdtP2" placeholder="select year"/>
                                         </div>                                          
                                </div>

                                <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                     <p>
                                     3. Bio Tower</p>
                                            <input class="range-slider__range range-slider__rangeAT3" type="range"
                                                id="AT3" value="100" valueAT3="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAT3"></span>
                                            <span class="range-slider__value range-slider__valueATT3"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="ATdtP3" placeholder="select year"/>
                                         </div>                                          
                                </div>

                                <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                     <p>
                                     4. Activated Sludge Process (ASP)</p>
                                            <input class="range-slider__range range-slider__rangeAT4" type="range"
                                                id="AT4" value="100" valueAT4="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAT4"></span>
                                            <span class="range-slider__value range-slider__valueATT4"></span>
                                             </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="ATdtP4" placeholder="select year"/>
                                         </div>                                          
                                </div>
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                      <p>
                                       5. Moving Bed Biological Reactor (MBBR)</p>
                                            <input class="range-slider__range range-slider__rangeAT5" type="range"
                                                id="AT5" value="100" valueAT5="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAT5"></span>
                                            <span class="range-slider__value range-slider__valueATT5"></span>
                                    </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="ATdtP5" placeholder="select year"/>
                                         </div>                                          
                                </div>
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                      <p>
                                       6. Rotating Biological Contractor (RBC)</p>
                                            <input class="range-slider__range range-slider__rangeAT6" type="range"
                                                id="AT6" value="100" valueAT6="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAT6"></span>
                                            <span class="range-slider__value range-slider__valueATT6"></span>
                                    </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="ATdtP6" placeholder="select year"/>
                                         </div>                                          
                                </div>
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                      <p>
                                       7. Membrane Bio Reactor (MBR)</p>
                                            <input class="range-slider__range range-slider__rangeAT7" type="range"
                                                id="AT7" value="100" valueAT7="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAT7"></span>
                                            <span class="range-slider__value range-slider__valueATT7"></span>
                                    </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="ATdtP7" placeholder="select year"/>
                                         </div>                                          
                                </div>
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                      <p>
                                       8. Sequential Bio Reactor (SBR)</p>
                                            <input class="range-slider__range range-slider__rangeAT8" type="range"
                                                id="AT8" value="100" valueAT8="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAT8"></span>
                                            <span class="range-slider__value range-slider__valueATT8"></span>
                                    </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="ATdtP8" placeholder="select year"/>
                                         </div>                                          
                                </div>
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                      <p>
                                       9. Extended Aeration </p>
                                            <input class="range-slider__range range-slider__rangeAT9" type="range"
                                                id="AT9" value="100" valueAT9="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAT9"></span>
                                            <span class="range-slider__value range-slider__valueATT9"></span>
                                    </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="ATdtP9" placeholder="select year"/>
                                         </div>                                          
                                </div>
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                      <p>
                                       10. Plant Based Process </p>
                                            <input class="range-slider__range range-slider__rangeAT10" type="range"
                                                id="AT10" value="100" valueAT10="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAT10"></span>
                                            <span class="range-slider__value range-slider__valueATT10"></span>
                                    </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="ATdtP10" placeholder="select year"/>
                                         </div>                                          
                                </div>

                                            </div></div></div>
                                 <div class="accordion-item bgcl">
                                    <h2 class="accordion-header" id="headingsubantTwo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesubantTwo" aria-expanded="true" aria-controls="collapsesubantTwo">
                                    Anaerobic Treatment
                                    </button>
                                    </h2>
                                    <div id="collapsesubantTwo" class="accordion-collapse collapse" aria-labelledby="headingsubantTwo" data-bs-parent="#subaccordionExampleant1">
                                    <div class="accordion-body">
                                    <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                      <p>
                                       1. DWATS </p>
                                            <input class="range-slider__range range-slider__rangeAnt1" type="range"
                                                id="Ant1" value="100" valueAnt1="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAnt1"></span>
                                            <span class="range-slider__value range-slider__valueAnnt1"></span>
                                    </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="AnTdtP1" placeholder="select year"/>
                                         </div>                                          
                                </div>
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                      <p>
                                       2. Upflow Anerobic Sludge Blanket </p>
                                            <input class="range-slider__range range-slider__rangeAnt2" type="range"
                                                id="Ant2" value="100" valueAnt2="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAnt2"></span>
                                            <span class="range-slider__value range-slider__valueAnnt2"></span>
                                    </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="AnTdtP2" placeholder="select year"/>
                                         </div>                                          
                                </div>
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                      <p>
                                       3. UASB Variants </p>
                                            <input class="range-slider__range range-slider__rangeAnt3" type="range"
                                                id="Ant3" value="100" valueAnt3="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueAnt3"></span>
                                            <span class="range-slider__value range-slider__valueAnnt3"></span>
                                    </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="AnTdtP3" placeholder="select year"/>
                                         </div>                                          
                                </div>

                                </div></div></div>
                                        </div></div></div>
                                <br>
                                <div class="row ">                               
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  mb-3 text-center">
                                            <button class="btn btn-primary " type="button"
                                                onclick="wasteAction();">SAVE</button>
                                        </div>
                                </div>  
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
                                 <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                      <p>
                                            1. Replacing Coal with Natural Gas 
                                            <input class="range-slider__range range-slider__rangeIn1" type="range"
                                                id="In1" value="100" valueIn1="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueIn1"></span>
                                            <span class="range-slider__value range-slider__valueInn1"></span>
                                        </p>
                                        </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker" name="IndtP1" placeholder="select year"/>
                                         </div>   
                                        </div>

                                         <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                        <p>
                                            2.Carbon Capture and Storage
                                            <input class="range-slider__range range-slider__rangeIn2" type="range"
                                                id="In2" value="100" valueIn2="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueIn2"></span>
                                            <span class="range-slider__value range-slider__valueInn2"></span> </p>
                                            </div> 
                                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker"  name="IndtP2" placeholder="select year"/>
                                         </div>   
                                        </div>        
                                       
                                        <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 "> 
                                        <p>
                                            3.Using Recyled Scrap <br>
                                            <input class="range-slider__range range-slider__rangeIn3" type="range"
                                                id="In3" value="100" valueIn3="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueIn3"></span>
                                            <span class="range-slider__value range-slider__valueInn3"></span>
                                        </p>
                                         </div> 
                                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker"  name="IndtP3" placeholder="select year"/>
                                         </div>   
                                        </div>
                                        <div class="row ">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">  
                                        <p>
                                            4.Using Low Sulphur Fuels<br>
                                            <input class="range-slider__range range-slider__rangeIn4" type="range"
                                                id="In4" value="100" valueIn4="0" min="0" max="100">
                                            <span class="range-slider__value range-slider__valueIn4"></span>
                                            <span class="range-slider__value range-slider__valueInn4"></span>
                                        </p>
                                        </div>
                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 "> 
                                            <input type="text" id="datepicker"  name="IndtP4" placeholder="select year"/>
                                         </div> 
                                         </div>
                                         
                                         <br>
                                        <div class="row ">                               
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  mb-3 text-center">
                                            <button class="btn btn-primary " type="button"
                                                onclick="induAction();">SAVE</button>
                                        </div>
                                     </div>  
                                </div>
                                </div>
                            <!-- </div> -->
                                </div> 
                                <!-- <br>
                                <div class="row ">                               
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  mb-3 text-center">
                                            <button class="btn btn-primary " type="button"
                                                onclick="postAction();">SAVE</button>
                                        </div>
                                        -->
                                     </div>   
                                    <!-- ///// -->                                       
                <!-- </div> -->
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/jspdf.min.js"></script>
    <script src="assets/js/html2canvas.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <!-- <script src="assets/vendor/jbox/jBox.all.min.js"></script> -->
    <script src="assets/js/bootstrap-show-modal.js"></script>
   
    <!-- ///datatimepeaker -->
     <script src="assets/js/jquery.ui.js"></script>
<!-- toggle btn -->
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
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
  
    </script>
</body> 
</html>

<!--testing purpose--monaliPatil--->