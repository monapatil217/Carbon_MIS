<?php
// require "php/session.php";
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Carbon MIS</title>
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
    <!-- <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
#adminPie {
 width: 50%;
  height: 500px;
}
</style>

    <!-- =======================================================
  * Template Name: OnePage - v4.7.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>
<body>

    <?php
      include 'adminHeader.php';
    ?>

    <main id="main"> <!-- ***** Features Big Item Start ***** -->

     <!-- Image Slide Show Start -->
    <section id="image_slidshow" class="image_slidshow">
        <div class="container" id="admin_dash" data-aos="fade-up">
            <div class="row" data-aos="fade-up">
                <div class="col-3">
                    <div class="colData" style="background-color: #212529;">
                        <h6 class="text-center text-white colData">Amrut City <br> 43 </h6>
                    </div>
                </div>

                <div class="col-3">
                       <div class="colData" style="background-color: #212529;">
                            <h6 class="text-center text-white colData"> User <br> 43 </h6>
                        </div>  
                </div>

                <div class="col-3">
                    <div class="colData" style="background-color: #212529;">
                        <h6 class="text-center text-white colData">Sector<br> 11 </h6>
                    </div>
                </div>

                <div class="col-3">
                    <div class="colData" style="background-color: #212529;">
                        <h6 class="text-center text-white colData">Data<br> 43 </h6>
                    </div>
                </div>
                    
            </div>

            <div class="row" id="mapSection" data-aos="fade-up">
                <div class="col-6">

                     <table id="example" class="display">
                        <thead>
                            <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <!-- <th>Age</th> -->
                            </tr>
                        </thead>
                        <!-- <tfoot>
                            <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            </tr>
                        </tfoot> -->
                    </table>

                </div>
                <div class="col-md-6 col-lg-6" id="adminPie">
                
                </div>
            </div>
            
                    
        </div>
    </section>

   <!-- Image Slide Show Start -->
   
    

    </main><!-- End #main -->

    <?php
    include 'footer.php';
    ?>
  <!-- End Footer -->
  
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  -->
   <!-- <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>  -->
   <script src="assets/js/jquery.dataTables.min.js"></script>

    <script src="assets/js/jquery.easypiechart.min.js"></script>
    <script src="js/adminIndexGraph.js"></script>
    <script src="js/adminDashboard.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

        <script  type="text/javascript">

            // $(function() {
            //     $('.chart').easyPieChart({
            //     });
            // });

            $(document).ready(function() {
                $('#example').DataTable();
            });


    </script>


</body>

</html>