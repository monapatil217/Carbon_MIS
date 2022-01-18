<?php
// require "php/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Raw Data</title>
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
        #secChart {
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

            <div class="row">

                <div class="col-md-12 col-lg-12  mb-3 s " data-aos-delay="200">
                    <div class="in-sec">
                        <div id="chartName">
                            <h3>Amrut City all Sectors Graph</h3>
                        </div>
                        <div class="row mt-3 justify-content-center">
                            <div class="form-group col-md-2">
                                <h5>Select City :</h5>
                            </div>
                            <div class="form-group col-md-2">
                                <select class="form-control" id="cityList" name="cityList" onchange="addCityChart();">
                                    <option selected disabled value="">Choose City</option>
                                    <!-- <option disabled selected>Select City</option>
                                    <option value="Akola">Akola</option>
                                    <option value="Achalpur">Achalpur</option>
                                    <option value="Amravati">Amravati</option>
                                    <option value="Yavatmal">Yavatmal</option>
                                    <option value="Aurangabad">Aurangabad</option>
                                    <option value="Beed">Beed</option>
                                    <option value="Jalna">Jalna</option> -->
                                </select>
                            </div>
                        </div>

                        <div id="secChart"></div>

                    </div>
                    <div id="sectorInfo">
                        <div class="row mt-3">

                            <!-- electricity -->
                            <div class="col-md-12 col-lg-12 mb-3" data-aos-delay="200">
                                <div class="in-sec">
                                    <h4 class="text-center mb-2 col-12">Electricity</h4>
                                    <marquee width="100%" direction="left" height="30px">
                                        ELEC - Electricity / MW - megawatt / m - month.
                                    </marquee>
                                    <form class="needs-validation" novalidate>



                                        <div class="row justify-content-center">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3">
                                                    <div class="col-1"></div>
                                                    <span class="form-floating">
                                                        <div class="form-floating">
                                                            <input type="email" class="form-control" id="resElec" placeholder="name@example.com" value="24" disabled>
                                                            <label for="resElec">Residential ELEC use</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">MW/m</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <div class="col-1"></div>
                                                    <span class="form-floating">
                                                        <div class="form-floating">
                                                            <input type="email" class="form-control" id="comElec" placeholder="name@example.com" value="77" disabled>
                                                            <label for="comElec">Commercial ELEC use</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">MW/m</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <div class="col-1"></div>
                                                    <span class="form-floating">
                                                        <div class="form-floating">
                                                            <input type="email" class="form-control" id="slumEle" placeholder="name@example.com" value="54" disabled>
                                                            <label for="slumEle">Slum area ELEC use</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">MW/m</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <div class="col-1"></div>
                                                    <span class="form-floating">
                                                        <div class="form-floating">
                                                            <input type="email" class="form-control" id="streetEle" placeholder="name@example.com" value="32" disabled>
                                                            <label for="streetEle">Street light ELEC use</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">MW/m</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <!-- transport -->
                            <div class="col-md-12 col-lg-12  mb-3  s" data-aos-delay="200">
                                <div class="in-sec">
                                    <h4 class="text-center mb-2">Transport</h4>
                                    <form class="needs-validation" novalidate>


                                        <div class="row justify-content-center">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-floating mt-3">
                                                    <input type="text" class="form-control" id="2Wheeler" placeholder="Two wheeler" value="37" required disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="2Wheeler">Two Wheeler</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-floating mt-3">
                                                    <input type="text" class="form-control" id="3Wheeler" placeholder="Three wheeler" value="54" required disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="3Wheeler">Three Wheeler</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-floating mt-3">
                                                    <input type="text" class="form-control" id="4Wheeler" placeholder="Four wheeler" value="32" required disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="4Wheeler">Four Wheeler</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-floating mt-3">
                                                    <input type="text" class="form-control" id="bus" placeholder="Bus" value="65" required disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="bus">Bus</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-floating mt-3">
                                                    <input type="text" class="form-control" id="tempo" placeholder="Tempo" value="34" required disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="tempo">Tempo</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-floating mt-3">
                                                    <input type="text" class="form-control" id="truck" placeholder="Truck" required value="23" disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="truck">Truck</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-floating mt-3">
                                                    <input type="text" class="form-control" id="train" placeholder="Train" required value="72" disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="train">Train</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-floating mt-3 mb-2">
                                                    <input type="text" class="form-control" id="flight" placeholder="Flight" required value="24" disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="flight">Flight</label>
                                                </div>
                                            </div>
                                        </div>


                                    </form>

                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12  mb-3  s" data-aos-delay="200">
                                <div class="row">
                                    <!-- Cropland -->
                                    <div class="col-md-12 col-lg-12  mb-3  s" data-aos-delay="200">
                                        <div class="in-sec">
                                            <h4 class="text-center mb-2">Crop Land</h4>
                                            <marquee width="100%" direction="left" height="30px">
                                                sq.km - Square Kilometre.
                                            </marquee>
                                            <form class="needs-validation" novalidate>


                                                <div class="row justify-content-center">
                                                    <div class="col-md-4 col-lg-4">

                                                        <div class="input-group mb-3 ">
                                                            <span class="form-floating">
                                                                <div class="form-floating">
                                                                    <input type="Text" class="form-control" id="areaCrop" placeholder="name@example.com" value="72" disabled>
                                                                    <label for="areaCrop">Area under Crop Land</label>
                                                                </div>
                                                            </span>
                                                            <span class="input-group-text" id="basic-addon-1">sq.Km</span>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid data.
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- forest -->
                            <div class="col-md-12 col-lg-12  mb-3  s" data-aos-delay="200">
                                <div class="in-sec">
                                    <h4 class="text-center mb-2">Forest Land</h4>
                                    <marquee width="100%" direction="left" height="30px">
                                        sq.km - Square Kilometre.
                                    </marquee>
                                    <form class="needs-validation" novalidate>

                                        <div class="row justify-content-center">
                                            <div class="col-md-4 col-lg-4">

                                                <div class="input-group mb-3">
                                                    <span class="form-floating">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="areaForest" placeholder="name@example.com" value="43" disabled>
                                                            <label for="areaForest">Area under Forest Land</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">sqKM</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>


                            <!--  live Stock-->
                            <div class="col-md-12 col-lg-12  mb-3  s" data-aos-delay="200">
                                <div class="in-sec">
                                    <h4 class="text-center mb-2">Live Stock</h4>
                                    <form class="needs-validation" novalidate>

                                        <!-- <div class="row">
                                            <div class="col-md-6 col-lg-6"> -->



                                        <div class="row justify-content-center">
                                            <div class="col-md-4 col-lg-4">

                                                <div class="form-floating mt-3">
                                                    <input type="text" class="form-control" id="indigenouscattle" placeholder="Indigenous Cattle" value="51" required disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="indigenouscattle">Indigenous Cattle</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">

                                                <div class="form-floating mt-3">
                                                    <input type="text" class="form-control" id="crossbredcattle" placeholder="Cross-bred cattle" value="34" required disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="crossbredcattle">Cross-bred cattle</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">

                                                <div class="form-floating mt-3">
                                                    <input type="text" class="form-control" id="buffalo" placeholder="Buffalo" value="52" required disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="buffalo">Buffalo</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-floating mt-3">
                                                    <input type="text" class="form-control" id="sheep" placeholder="Sheep" value="23" required disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="sheep ">Sheep</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-floating mt-3">
                                                    <input type="text" class="form-control" id="goat" placeholder="Goat" value="63" required disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="goat">Goat</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-floating mt-3">
                                                    <input type="text" class="form-control" id="horsesandponies" placeholder="Horses & Ponies" value="72" required disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="horsesandponies">Horses & Ponies</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-md-4 col-lg-4">

                                                <div class="form-floating mt-3">
                                                    <input type="text" class="form-control" id="donkeys" placeholder="Donkeys" value="36" required disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="donkeys">Donkeys</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-floating mt-3 mb-2">
                                                    <input type="text" class="form-control" id="camels" placeholder="Camels" value="34" required disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="camels">Camels</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-floating mt-3 mb-2">
                                                    <input type="text" class="form-control" id="pig" placeholder="Pig" value="45" required disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="pig">Pig</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="form-floating mt-3 mb-2">
                                                    <input type="text" class="form-control" id="poultry" placeholder="Poultry" value="24" required disabled>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                    <label for="poultry">Poultry</label>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>


                            <!-- land use -->
                            <div class="col-md-12 col-lg-12  mb-3  s" data-aos-delay="200">
                                <div class="in-sec">
                                    <h4 class="text-center mb-2">Land Use</h4>
                                    <marquee width="100%" direction="left" height="30px">
                                        sq.km - Square Kilometre.
                                    </marquee>

                                    <form class="needs-validation" novalidate>

                                        <div class="row justify-content-center">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="residential" placeholder="Total area under Residential (sq. km)" value="67" disabled>
                                                            <label for="residential">Residential area</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">sq. Km</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="commercial" placeholder="Total area under Commercial (sq. km)" value="65" disabled>
                                                            <label for="commercial">Commercial area</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">sq. Km</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="waterBodies" placeholder="Total area under Commercial (sq. km)" value="54" disabled>
                                                            <label for="waterBodies">Water Bodiea area</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">sq. Km</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row justify-content-center">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="defence" placeholder="Total area under Defence (sq. km)" value="23" disabled>
                                                            <label for="defence">Defence area</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">sq. Km</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="agriculture" placeholder="Total area under Agriculture (sq. km)" value="67" disabled>
                                                            <label for="agriculture">Agriculture area</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">sq. Km</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="vacentLand" placeholder="Total area under Vacant Land (sq. km)" value="85" disabled>
                                                            <label for="vacentLand">Vacant Land area</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">sq. Km</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="roadArea" placeholder="Total area under Road Area (sq. km)" value="45" disabled>
                                                            <label for="roadArea">Under Road area</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">sq. Km</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="greenArea" placeholder="Total area under Green Area (sq. km)" value="44" disabled>
                                                            <label for="greenArea">Under Green area</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">sq. Km</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="industrial" placeholder="Total area under Industrial (sq. km)" value="54" disabled>
                                                            <label for="industrial">Industrial area</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">sq. Km</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="slum" placeholder="Total area under Slum (sq. km)" value="54" disabled>
                                                            <label for="slum">Slum area</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">sq. Km</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12  mb-3  s" data-aos-delay="200">
                                <!-- solid waste -->
                                <div class="row">
                                    <div class="col-md-12 col-lg-12  mb-3  s" data-aos-delay="200">
                                        <div class="in-sec">
                                            <h4 class="text-center mb-2">Solid Waste</h4>
                                            <form class="needs-validation" novalidate>

                                                <div class="row justify-content-center">
                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="input-group mb-3">
                                                            <span class="form-floating">
                                                                <div class="form-floating labelFont">
                                                                    <input type="text" class="form-control" id="solidGen" placeholder="Solid waste Generation" value="63" disabled>
                                                                    <label for="solidGen">Solid waste Generation</label>
                                                                </div>
                                                            </span>
                                                            <span class="input-group-text" id="basic-addon-1">tonne</span>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid data.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="input-group mb-3">
                                                            <span class="form-floating">
                                                                <div class="form-floating labelFont">
                                                                    <input type="text" class="form-control" id="solidColl" placeholder="Solid Waste Collection" value="12" disabled>
                                                                    <label for="solidColl">Solid Waste Collection</label>
                                                                </div>
                                                            </span>
                                                            <span class="input-group-text" id="basic-addon-1">tonne</span>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid data.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="input-group mb-3">
                                                            <span class="form-floating">
                                                                <div class="form-floating labelFont">
                                                                    <input type="text" class="form-control" id="solidTreat" placeholder="Solid Waste Treatement" value="36" disabled>
                                                                    <label for="solidTreat">Solid Waste Treatement</label>
                                                                </div>
                                                            </span>
                                                            <span class="input-group-text" id="basic-addon-1">tonne</span>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid data.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="input-group mb-3">
                                                            <span class="form-floating">
                                                                <div class="form-floating labelFont">
                                                                    <input type="text" class="form-control" id="dumpingYard" placeholder="No. of Dumping yard present" value="82" disabled>
                                                                    <label for="dumpingYard">No. of Dumping yard present</label>
                                                                </div>
                                                            </span>
                                                            <span class="input-group-text" id="basic-addon-1">tonne</span>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid data.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- waste water  -->
                                <div class="row">
                                    <div class="col-md-12 col-lg-12  mb-3  s" data-aos-delay="200">
                                        <div class="in-sec">
                                            <h4 class="text-center mb-2">Waste Water</h4>
                                            <form class="needs-validation" novalidate>

                                                <div class="row justify-content-center">
                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="input-group mb-3">
                                                            <span class="form-floating">
                                                                <div class="form-floating labelFont">
                                                                    <input type="text" class="form-control" id="waterConsumption" placeholder="Water Consumption" value="82" disabled>
                                                                    <label for="waterConsumption">Water Consumption</label>
                                                                </div>
                                                            </span>
                                                            <span class="input-group-text" id="basic-addon-1">CMD</span>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid data.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="input-group mb-3">
                                                            <span class="form-floating">
                                                                <div class="form-floating labelFont">
                                                                    <input type="text" class="form-control" id="waterGenration" placeholder="Waste water generated" value="48" disabled>
                                                                    <label for="waterGenration">Waste water generated</label>
                                                                </div>
                                                            </span>
                                                            <span class="input-group-text" id="basic-addon-1">CMD</span>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid data.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-center">

                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="input-group mb-3">
                                                            <span class="form-floating">
                                                                <div class="form-floating labelFont">
                                                                    <input type="text" class="form-control" id="waterCollection" placeholder="Waste water collection" value="45" disabled>
                                                                    <label for="waterCollection">Waste water collection</label>
                                                                </div>
                                                            </span>
                                                            <span class="input-group-text" id="basic-addon-1">CMD</span>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid data.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="input-group mb-3">
                                                            <span class="form-floating">
                                                                <div class="form-floating labelFont">
                                                                    <input type="text" class="form-control" id="waterTreat" placeholder="Qty of treat from WW" value="84" disabled>
                                                                    <label for="waterTreat">Qty of treat from waste
                                                                        water</label>
                                                                </div>
                                                            </span>
                                                            <span class="input-group-text" id="basic-addon-1">CMD</span>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid data.
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row justify-content-center">

                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="input-group mb-3">
                                                            <span class="form-floating">
                                                                <div class="form-floating labelFont">
                                                                    <input type="text" class="form-control" id="noSTP" placeholder="No of STP" value="38" disabled>
                                                                    <label for="noSTP">No of STP</label>
                                                                </div>
                                                            </span>
                                                            <span class="input-group-text" id="basic-addon-1">CMD</span>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid data.
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--  Indusrty Energy-->
                            <div class="col-md-12 col-lg-12  mb-3  s" data-aos-delay="200">
                                <div class="in-sec">
                                    <!-- <h4 class="text-center mb-2">Industry</h4> -->
                                    <form class="needs-validation" novalidate>

                                        <div>
                                            <h4> Industry Energy</h4>

                                            <marquee width="100%" direction="left" height="30px">
                                                t - tonne / d - day / FO - Fuel Oil / LDO - Light Diesel Oil / HSD -
                                                High Speed Diesel / PNG - Piped Natural gas / NG - Natural Gas
                                            </marquee>

                                            <h6 class="text-center">Type of fuel mix used by industry</h6>
                                        </div>

                                        <div class="row justify-content-center">

                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating labelFont">
                                                            <input type="text" class="form-control" id="amtCoal" placeholder="Amount of Coal used" value="17" disabled>
                                                            <label for="amtCoal">Amount of Coal used</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">t/day</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating labelFont">
                                                            <input type="text" class="form-control" id="amtFO" placeholder="Amount of FO used" value="61" disabled>
                                                            <label for="amtFO">Amount of FO used</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">t/day</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating labelFont">
                                                            <input type="text" class="form-control" id="amtLDO" placeholder="Amount of LDO used" value="34" disabled>
                                                            <label for="amtLDO">Amount of LDO used</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">t/day</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating labelFont">
                                                            <input type="text" class="form-control" id="amtHSD" placeholder="Amount of HSD used" value="45" disabled>
                                                            <label for="amtHSD">Amount of HSD used</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">t/day</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating labelFont">
                                                            <input type="text" class="form-control" id="amtPNG" placeholder="Amount of PNG used" value="23" disabled>
                                                            <label for="amtPNG">Amount of PNG used</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">t/day</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating labelFont">
                                                            <input type="text" class="form-control" id="amtNG" placeholder="Amount of NG used" value="34" disabled>
                                                            <label for="amtNG">Amount of NG used</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">t/day</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating labelFont">
                                                            <input type="text" class="form-control" id="amtBriquette" placeholder="Amount of Briquette used" value="34" disabled>
                                                            <label for="amtBriquette">Amount of Briquette used</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">t/day</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3 ">
                                                    <span class="form-floating">
                                                        <div class="form-floating labelFont">
                                                            <input type="text" class="form-control" id="amtWood" placeholder="Amount of Wood used" value="44" disabled>
                                                            <label for="amtWood">Amount of Wood used</label>
                                                        </div>
                                                    </span>
                                                    <span class="input-group-text" id="basic-addon-1">t/day</span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid data.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>


                            <div class="col-md-12 col-lg-12  mb-3  s" data-aos-delay="200">
                                <!-- Industry PP -->
                                <div class="row">
                                    <div class="col-md-12 col-lg-12  mb-3  s" data-aos-delay="200">
                                        <div class="in-sec">
                                            <!-- <h4 class="text-center mb-2">Industry</h4> -->
                                            <form class="needs-validation" novalidate>

                                                <div>
                                                    <h4>Industrial Process and Product</h4>
                                                    <marquee width="100%" direction="left" height="30px">
                                                        t - tonne
                                                    </marquee>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="col-md-4 col-lg-4">

                                                        <div class="input-group mb-3 ">
                                                            <div class="col-1"></div>
                                                            <span class="form-floating">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="amtProd" placeholder="Amount of product" value="23" disabled>
                                                                    <label for="amtProd">Amount of product</label>
                                                                </div>
                                                            </span>
                                                            <span class="input-group-text" id="basic-addon-1">t/year</span>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid data.
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- fuel use -->
                                <div class="row">
                                    <div class="col-md-12 col-lg-12  mb-3  s" data-aos-delay="200">
                                        <div class="in-sec">
                                            <h4 class="text-center mb-2">Fuel use in city</h4>
                                            <form class="needs-validation" novalidate>

                                                <!-- LPG -->
                                                <div class="row justify-content-center">
                                                    <div class="form-floating col-3 mt-3 mb-3">
                                                        <input type="text" class="form-control" id="lpginr" placeholder="Residential LPG" value="76" required disabled>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid data.
                                                        </div>
                                                        <label for="lpginr">Residential LPG</label>
                                                    </div>

                                                    <div class="form-floating col-3 mt-3 mb-3">
                                                        <input type="text" class="form-control" id="lpginc" placeholder="Commercial LPG" value="35" required disabled>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid data.
                                                        </div>
                                                        <label for="lpginc">Commercial LPG</label>
                                                    </div>
                                                </div>

                                                <!-- MNGL -->
                                                <div class="row justify-content-center">
                                                    <div class="form-floating col-3 mt-3 mb-3">
                                                        <input type="text" class="form-control" id="mnglinr" placeholder="Residential MNGL" value="54" required disabled>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid data.
                                                        </div>
                                                        <label for="mnglinr">Residential MNGL</label>
                                                    </div>

                                                    <div class="form-floating col-3 mt-3 mb-3">
                                                        <input type="text" class="form-control" id="mnglinc" placeholder="Commercial MNGL" value="53" required disabled>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid data.
                                                        </div>
                                                        <label for="mnglinc">Commercial MNGL</label>
                                                    </div>
                                                </div>

                                                <!-- kerosene -->
                                                <div class="row justify-content-center">
                                                    <div class="form-floating col-3 mt-3 mb-3">
                                                        <input type="text" class="form-control" id="keroseneinr" placeholder="Residential Kerosene" value="28" required disabled>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid data.
                                                        </div>
                                                        <label for="keroseneinr">Residential Kerosene</label>
                                                    </div>

                                                    <div class="form-floating col-3 mt-3 mb-3">
                                                        <input type="text" class="form-control" id="keroseneinc" placeholder="Commercial Kerosene" value="43" required disabled>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid data.
                                                        </div>
                                                        <label for="keroseneinc">Commercial Kerosene</label>
                                                    </div>
                                                </div>

                                                <!-- Wood -->
                                                <div class="row justify-content-center">
                                                    <div class="form-floating col-3 mt-3 mb-3">
                                                        <input type="text" class="form-control" id="woodinr" placeholder="Residential Wood" value="56" required disabled>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid data.
                                                        </div>
                                                        <label for="woodinr">Residential Wood</label>
                                                    </div>

                                                    <div class="form-floating col-3 mt-3 mb-3">
                                                        <input type="text" class="form-control" id="woodinc" placeholder="Commercial Wood" value="23" required disabled>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid data.
                                                        </div>
                                                        <label for="woodinc">Commercial wood</label>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
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

    <script src="js/cropLandModel.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap-show-modal.js"></script>

    <script src="js/sectorGraph.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>