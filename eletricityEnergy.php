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
</head>

<body>

    <?php
    include 'header.php';
    ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex  justify-content-center" style="height: auto ; min-height: 100vh;">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

            <div class="row">

                <div class="col-md-12 col-lg-8  mb-3 s " data-aos-delay="200">
                    <div class="in-sec">
                        <h3>Electricity</h3>
                        <!-- <div class="card">
                            <div class="card-body"> -->
                                <h5>

                                <ul style="margin-left: 10px;"> 
                                <li class="popupli"> 1 unit of electricity is equal to 1000 watts. which means 1 unit = 1 kwatt electricity.</li>
                                <li class="popupli">Burning 1 kg of bituminous coal will produce 2.42 kg of carbon dioxide.</li>
                                <li class="popupli">The emissions per unit of electricity are estimated to be in the range of 0.91 to 0.95 kg/kWh for CO2 </li> 
                                <!-- <li class="popupli">Around 37.9% installed generation capacity is due to renewable energy sources.</li> 
                                <li class="popupli">Around 1.7% installed generation capacity is due to Nuclear Fuel.</li> -->
                                </ul>
                                </h5>
                            <!-- </div>
                        </div> -->
                    </div>
                </div>

                <div class="col-md-12 col-lg-4 mb-3" data-aos-delay="200">
                    <div class="in-sec">
                        <h4 class="text-center mb-2">Electricity</h4>
                        <marquee width="100%" direction="left" height="30px">
                            ELEC - Electricity / MW - megawatt / m - month.
                        </marquee>
                        <form class="needs-validation" novalidate>

                            <div class="input-group mb-3 m-lg-4">
                                <span class="form-floating">
                                    <input type="text" class="form-control" id="eleResi"
                                        aria-describedby="basic-addon-1" ... />
                                    <label for="eleResi">Residential ELEC use</label>
                                </span>
                                <span class="input-group-text" id="basic-addon-1">MW/m</span>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                            </div>

                            <div class="input-group mb-3 ">
                                <span class="form-floating">
                                    <input type="text" class="form-control" id="eleCom" aria-describedby="basic-addon-1"
                                        ... />
                                    <label for="eleCom">Commercial ELEC use</label>
                                </span>
                                <span class="input-group-text" id="basic-addon-1">MW/m</span>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                            </div>

                            <div class="input-group mb-3 ">
                                <span class="form-floating">
                                    <input type="text" class="form-control" id="eleSum" aria-describedby="basic-addon-1"
                                        ... />
                                    <label for="eleSum">Slum area ELEC use</label>
                                </span>
                                <span class="input-group-text" id="basic-addon-1">MW/m</span>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                            </div>

                            <div class="input-group mb-3 ">
                                <span class="form-floating">
                                    <input type="text" class="form-control" id="eleSL" aria-describedby="basic-addon-1"
                                        ... />
                                    <label for="eleSL">Street light ELEC use</label>
                                </span>
                                <span class="input-group-text" id="basic-addon-1">MW/m</span>
                                <div class="invalid-feedback">
                                    Please provide a valid data.
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-12 mb-3 text-center">
                                    <button class="btn btn-primary " type="submit">Submit form</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- <div class="fade-to-img"  onclick="showEleInfo();">
                <a href="#" class="electricity" id="electricity"></a><img src="img/idea.png" alt="save-energy" width="80" height="80"> 
            </div> -->

            <div class="row align-items-center justify-content-center" id="moreInfo">

                <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">

                    <div class="popup-flex fade-to-img" onclick="showEleInfo();">
                        <img class="reggot" id="popup-btn" src="img/idea.png" width="80" height="80">
                    </div>

                    <div id="popup-wrapper" class="popup-container">
                        <div class="popup-content">

                            <div class="row align-items-center justify-content-center">
                                <div id="popUpData" class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <!-- <p>1 unit of electricity is equal to 1000 watts. which means 1 unit = 1 kwatt
                                        electricity</p>
                                    <p>Burning 1 kg of bituminous coal will produce 2.42 kg of carbon dioxide</p>
                                    <p>The emissions per unit of electricity are estimated to be in the range of 0.91
                                        to 0.95 kg/kWh for CO2</p> -->
                                </div>
                                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="btn-container">
                                        <a href="#" id="close" class="btn-gotit">Got It</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Hero -->


    <script>
    var popup = document.getElementById('popup-wrapper');
    var btn = document.getElementById("popup-btn");
    var span = document.getElementById("close");
    btn.onclick = function() {
        popup.classList.add('show');
    }
    span.onclick = function() {
        popup.classList.remove('show');
    }

    window.onclick = function(event) {
        if (event.target == popup) {
            popup.classList.remove('show');
        }
    }

    // var div = document.getElementById("moreInfo");
    // div.style.display = "none";

    function showEleInfo() {
        var div = document.getElementById("moreInfo");
        div.style.display = "block";

        $("#popUpData").empty();
        var html1 = '<div class="row" >'

            +'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto "><center><h5 class="mt-4">Electricity </h5></center>'

            +'<div class="row mt-2 mb-3">'
            +'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">' 
            +'<ul style="margin-left: 10px;">' 
            +'<li class="popupli"> Electricity Act 2003 has been enacted and came into force from 15.06.2003.</li>'
            +'<li class="popupli"> The objective is to introduce competition, protect consumer’s interests and provide power for all.</li>'
            +'<li class="popupli">Around 60.9% installed generation capacity is due to fossil fuel. </li>' 
            +'<li class="popupli">Around 37.9% installed generation capacity is due to renewable energy sources.</li>' 
            +'<li class="popupli">Around 1.7% installed generation capacity is due to Nuclear Fuel.</li>'
            +'</ul>'
            // +'<br>Despite its soaring energy needs, India has one of the lowest per capita rates of consumption of power in the world - 734 units as compared to a world average of 2,429 units. </b></p>'
            +'<center> <a class="my-3" href="http://www.ghgplatform-india.org/emissionestimates-phase2" target="_blank" rel="noopener noreferrer">Reference</a></center>' 
            +'<center><a class="my-3" href="http://www.technogreen.co.in/Survey/files/Estimates-Energy-National.xlsx" target="_blank" rel="noopener noreferrer">Reference</a></center>'

            +'</div> '
            +'</div>'
            +'</div></div>';
        $("#popUpData").append(html1);
    }

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

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- <script src="assets/js/popper.js"></script> -->
    <!-- <script src="assets/js/bootstrap.min.js"></script> -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap-show-modal.js"></script>






    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>