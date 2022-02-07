<?php
require "php/session.php";
?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <h3><a><b>Carbon Neutral Amrut Cities MIS</b></a></h3><br>
        <h5></h5>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <!-- <nav id="navbar" class="navbar"> -->
        <nav id="navbar" class="navbar">
            <!-- <nav id="navbar" class="navbar-form navbar-right"> -->
            <ul>
                <!-- <li><a class="nav-link scrollto active" href="#hero">Home</a></li> -->
                <li><a class="nav-link scrollto" href="adminDb.php"> Home</a></li>
                <li><a class="nav-link scrollto" href="rawData.php"> Raw Data </a></li>
                <li><a class="nav-link scrollto" href="emiGraph.php">Carbon Emission</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                <li><a class="getstarted scrollto" href="php/logout.php">Logout</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->