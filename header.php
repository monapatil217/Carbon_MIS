<?php
// require "php/session.php";
?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <h4><a><b>Carbon Neutral Amrut Cities MIS</b></a></h4><br>
        <h5></h5>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
                <li class="dropdown"><a><span>Energy</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="eletricityEnergy.php">Electricity</a></li>
                        <li><a href="transport.php">Transport</a></li>
                    </ul>
                </li>
                <!-- <li><a class="nav-link scrollto" href="transport.php">Transport</a></li> -->
                <li class="dropdown"><a><span>AFOLU</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li class="dropdown"><a><span>Agriculture</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="cropLand.php">Crop Land</a></li>
                                <li><a href="livestock.php">Live Stock</a></li>
                            </ul>
                        </li>
                        <li><a href="forestLand.php">Forest</a></li>
                        <li><a href="landUSe.php">Landuse</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a><span>Waste </span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="solidWaste.php">SolidWaste</a></li>
                        <li><a href="wasteWater.php">WasteWater</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a><span>Industry</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="industryEnergy.php">Energy</a></li>
                        <li><a href="industryPP.php">Process & Product</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="fueluseincity.php">Cooking Fuel</a></li>
                <!-- <li class="dropdown"><a href="#"><span>Other</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </li> -->
                <!-- <li class="dropdown"><a href="#"><span>AFOLU</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li> -->
                  <li class="dropdown"><a><span>View</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a class="nav-link scrollto" href="graph.php">Graph</a></li>
                        <li><a class="nav-link scrollto" href="actionPlan.php">Action Plan</a></li>
                          <li><a class="nav-link scrollto" href="takeAction.php">Intervention Plan</a></li>
                    </ul>
                </li>
                <?php if (isset($_SESSION['cityName'])) { ?> <li><a class="getstarted scrollto"
                        href="php/logout.php">Logout</a></li>
                <li>
                    <a>
                        <div id="cityname">
                            <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                title="<?php echo $_SESSION["cityName"];?>"> <?php
                                        $string = $_SESSION["cityName"];
                                        echo $string[0].$string[1];
                                        ?> </button>
                        </div>
                    </a>
                </li> <?php } else { ?> <li><a class="getstarted scrollto" href="php/logout.php">Log In</a></li>
                <?php } ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->