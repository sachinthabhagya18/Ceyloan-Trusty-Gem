<?php

session_start();
require "connection.php";

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ceylon TG || Login & Register</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- css loader -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="loader.css"> -->
    <!-- css loader -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Fontawesome Star -->
    <link rel="stylesheet" href="assets/css/fontawesome-stars.css">
    <!-- Ion Icon -->
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <!-- Timecircles -->
    <link rel="stylesheet" href="assets/css/timecircles.min.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->

    <!-- sign up with google -->
    <meta name="google-signin-client_id" content="509573424078-3pujo5frpa3m05ohlcgvvbb7garcni6c.apps.googleusercontent.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">




</head>

<body class="template-color-1">

    <div class="main-wrapper">

        <?php
        require "header.php";
        ?>

        <!-- Begin Hiraola's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Other</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Login & Register</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Hiraola's Breadcrumb Area End Here -->
        <!-- Begin Hiraola's Login Register Area -->
        <div class="hiraola-login-register_area">
            <div class="container">
                <div class="row login-form">
                    <div class="col-12 col-lg-6" id="signInBox">
                        <!-- Login Form s-->

                        <div class="">
                            <h4 class="login-title">Login</h4>

                            <?php

                            $e = "";
                            $p = "";

                            if (isset($_COOKIE["e"])) {
                                $e = $_COOKIE["e"];
                            }

                            if (isset($_COOKIE["p"])) {
                                $p = $_COOKIE["p"];
                            }

                            ?>

                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <label>Email Address*</label>
                                    <input type="email" value="<?php echo $e ?>" placeholder="Email Address" id="email">
                                </div>
                                <div class="col-12 mb--20">
                                    <label>Password</label>
                                    <input type="password" value="<?php echo $p ?>" placeholder="Password" id="password">
                                </div>
                                <div class="col-md-8">
                                    <div class="check-box">
                                        <input type="checkbox" id="remember_me">
                                        <label for="remember_me">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="forgotton-password_info">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter2"> Forgot password? </a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button onclick="signIn();" class="hiraola-login_btn">Login</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-6 mt-5 pt-5 mb-5 " id="vBox">

                        <div class="row ">
                            <div class="col-6 offset-3 d-grid">
                                <button class="g-signin2" style="width: 240px;" data-theme="dark" onclick="gotoproduct();"></button>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <span>OR</span>
                            </div>
                            <div class="col-6 offset-3 text-center">
                                <button id="changeB" class="hiraola-register_btn" style="width: 240px;" onclick="changeBox();">Create a new account</button>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-lg-6 d-none rb" id="signUpBox">

                        <div class="">
                            <h4 class="login-title">Register</h4>
                            <div class="row">
                                <div class="col-md-6 col-12 mb--20">
                                    <label>First Name</label>
                                    <input type="text" placeholder="First Name" id="fn">
                                </div>
                                <div class="col-md-6 col-12 mb--20">
                                    <label>Last Name</label>
                                    <input type="text" placeholder="Last Name" id="ln">
                                </div>
                                <div class="col-md-12">
                                    <label>Email Address*</label>
                                    <input type="email" placeholder="Email Address" id="e">
                                </div>
                                <div class="col-md-12">
                                    <label>Mobile*</label>
                                    <input type="email" placeholder="Mobile" id="m">
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input type="password" placeholder="Password" id="p">
                                </div>
                                <div class="col-md-6">
                                    <label>Confirm Password</label>
                                    <input type="password" placeholder="Confirm Password" id="cp">
                                </div>
                                <div class="col-12">
                                    <button class="hiraola-register_btn" onclick="signUp();">Register</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Login Register Area  End Here -->
        <?php
        require "footer.php";
        ?>

        <!-- Start Forgot password modal -->

        <div class="modal fade modal-wrapper" id="exampleModalCenter2">
            <div class="modal-dialog modal-dialog-centered col-lg-6 col-12" role="document" >
                <div class="modal-content" >
                    <div class="modal-body">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area sp-area row border border-0">

                            <div class="col-xl-7 col-lg-6 col-md-6">

                                <div class="sp-content">
                                    <div class="sp-heading">
                                        <h5><a href="#">Reset Password</a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-3">
                                        <hr class="text-danger" id="step1" style="height: 5px;" />
                                    </div>
                                    <div class="col-3">
                                        <hr id="step2" />
                                    </div>
                                    <div class="col-3">
                                        <hr id="step3" />
                                    </div>
                                    <div class="col-3">
                                        <hr id="step4" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12" id="b1">
                            <div class="col-12 mt-2">
                                <input class="form-control" type="email" placeholder="Type your recovery Email" id="rec_Email" />
                            </div>
                            <div class="col-12 mt-2 text-end">
                                <span class="form-label text-danger ms-1" id="displayError"></span>
                            </div>
                            <div class="col-4 offset-5">
                                <button class="hiraola-login_btn" id="sendCodeButton" onclick="verifyUser();">Send Code</button>
                                <img id="loader" class="d-none" src="loading.gif" />
                            </div>
                        </div>
                        <div class="col-12 d-none" id="b2">
                            <div class="col-12 mt-2">
                                <span class="form-label text-warning ms-1" id="displayError1"></span>
                            </div>
                            <div class="col-12 mt-3">
                                <input class="form-control" type="text" placeholder="Enter your verification code here" id="vc" />
                            </div>
                            <div class="col-12 mt-1 text-end">
                                <span class="form-label text-danger ms-1" id="displayError2"></span>
                            </div>
                            <div class="col-4 offset-8">
                                <button class="hiraola-login_btn" id="vcb" onclick="checkVerificationCode();">Submit</button>
                                <img id="loader1" class="d-none" src="loading.gif" />
                            </div>
                        </div>
                        <div class="col-12 d-none" id="b3">
                            <div class="col-12 mt-4">
                                <input class="form-control" type="password" placeholder="New Password" id="np" />
                            </div>
                            <div class="col-12 mt-1 text-end">
                                <span class="form-label text-danger ms-1" id="displayError3"></span>
                            </div>
                            <div class="col-4 offset-8">
                                <button class="hiraola-login_btn" id="rpb" onclick="resetPassword();">Reset Password</button>
                                <img id="loader2" class="d-none" src="loading.gif" />
                            </div>
                        </div>
                        <div class="col-12 d-none" id="b4">
                            <div class="col-12 mt-3 text-center">
                                <span class="form-label text-secondary fs-2">Password reset Successful!!</span>
                            </div>
                            <div class="col-4 offset-8">
                                <button class="hiraola-login_btn" data-bs-dismiss="modal" aria-label="Close">Go to Sign In</button>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>

        <!-- End forgot password modal -->

    </div>

    <!-- JS
============================================ -->
    <script src="assets/js/script.js"></script>

    <!-- sign up with google -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="assets/js/plugins/countdown.min.js"></script>
    <!-- Barrating JS -->
    <script src="assets/js/plugins/jquery.barrating.min.js"></script>
    <!-- Counterup JS -->
    <script src="assets/js/plugins/jquery.counterup.min.js"></script>
    <!-- Waypoints -->
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <!-- Sticky Sidebar JS -->
    <script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Jquery-ui JS -->
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <!-- Scroll Top JS -->
    <script src="assets/js/plugins/scroll-top.min.js"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="assets/js/plugins/theia-sticky-sidebar.min.js"></script>
    <!-- ElevateZoom JS -->
    <script src="assets/js/plugins/jquery.elevateZoom-3.0.8.min.js"></script>
    <!-- Timecircles JS -->
    <script src="assets/js/plugins/timecircles.min.js"></script>
    <!-- Mailchimp Ajax JS -->
    <script src="assets/js/plugins/mailchimp-ajax.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <!-- <script src="assets/js/main.min.js"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>

</html>