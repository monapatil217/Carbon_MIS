<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>
        Login
    </title>
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
</head>

<body>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center" style="height: 100vh">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-9 text-center">

                    <div class="loginup">

                        <h1 style="color:white;">Carbon MIS</h1>
                        <h2 style="color:white;">LOGIN</h2>
                    </div>
                    <div class="in-sec">

                    <!-- <div id="card">
                                <div id="card-content">
                                <div id="card-title">
                                    <h2>LOGIN</h2>
                                    <div class="underline-title"></div>
                                </div>
                                <form action="php/loginId.php" method="POST" class="form">
                                    <label for="user-email" style="padding-top:13px">
                                        &nbsp;Email
                                    </label>
                                    <input id="user-email" class="form-content" type="email" name="username" autocomplete="on" required />
                                    <div class="form-border"></div>
                                    <label for="user-password" style="padding-top:22px">&nbsp;Password
                                    </label>
                                    <input id="user-password" class="form-content" type="password" name="password" required />
                                    <div class="form-border"></div>
                                    <a href="#">
                                    <legend id="forgot-pass">Forgot password?</legend>
                                    </a>
                                    <input id="submit-btn" type="submit" name="submit" value="LOGIN" />
                                    <a href="#" id="signup">Don't have account yet?</a>
                                </form>
                                </div>
                            </div> -->
                        <form class="needs-validation" action="php/loginId.php" method="POST">

                        <div class="social d-flex text-center">
                            <a href="#" class="px-2 py-2 mr-md-1 rounded" id="user" onclick="showLoginDesign('user')"><span class="ion-logo-facebook mr-2"></span> User</a>
                            <a href="#" class="px-2 py-2 ml-md-1 rounded" id="admin" onclick="showLoginDesign('admin')"><span class="ion-logo-twitter mr-2"></span> Admin</a>
                        </div>

                         <form action="#" class="signin-form">

                             <div id="addUserDesign">

                            </div>
                            <div id="addAdminDesign">

                            </div>

                            <!-- <div class="form-group mt-3">
                                <input type="text" class="form-control" placeholder="Username" required>
                            </div>

                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" placeholder="Password" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                            </div> -->
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-md-left">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#" style="color: #000000">Forgot Password</a>
                                </div>
                            </div>
                    </form>

                            <!-- <div class="row mx-auto mt-5  justify-content-center">
                                <div class="col-md-6 mb-3">
                                    <label for="username" class="form-label">City</label>
                                    <select class="form-select" id="username" name="username" required>
                                        <option selected disabled value="">Choose City</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a City.
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-6 mb-3">
                                    <label for="Password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid data.
                                    </div>
                                </div>
                            </div>


                            <div class="row ">
                                <div class="col-md-12 mb-3 text-center">
                                    <button class="btn btn-primary btn-get-started scrollto " type="submit"> LOGIN </button>
                                </div>
                            </div> -->

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- End Hero -->
    <main id="main">
    </main><!-- End #main -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="js/login.js"></script>

</body>

</html>