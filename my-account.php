<?php
session_start();
$_SESSION["u"];
require "connection.php";
$email = $_SESSION["u"]["email"];
$pass = $_SESSION["u"]["password"];
if (isset($_SESSION["u"])) {


?>
    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ceylon TG || My Account </title>
        <meta name="robots" content="noindex, follow" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

        <!-- CSS
	============================================ -->

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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

    </head>

    <body class="template-color-1">

        <div class="main-wrapper">

            <?php
            require "header.php";

            $resulset = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND PASSWORD='" . $pass . "';");

            $data = $resulset->fetch_assoc();
            $id = $data["id"];
            $fname = $data["fname"];
            $lname = $data["lname"];

            $resulset1 = Database::search("SELECT * FROM `profile_img` WHERE `user_id`='" . $id . "';");

            $nr = $resulset1->num_rows;


            ?>

            <!-- Begin Hiraola's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <h2>Other</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">My Account</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Hiraola's Breadcrumb Area End Here -->
            <!-- Begin Hiraola's Page Content Area -->
            <main class="page-content">
                <!-- Begin Hiraola's Account Page Area -->
                <div class="account-page-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                                <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="account-dashboard-tab" data-bs-toggle="tab" href="#account-dashboard" role="tab" aria-controls="account-dashboard" aria-selected="true">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-orders-tab" data-bs-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-address-tab" data-bs-toggle="tab" href="#account-address" role="tab" aria-controls="account-address" aria-selected="false">Addresses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-details-tab" data-bs-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Account Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-logout-tab" onclick="signout();" role="tab" aria-selected="false">Logout</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-9">
                                <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                                    <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
                                        <div class="myaccount-dashboard">
                                            <p>Hello <b><?php echo $fname; ?>&nbsp; <?php echo $lname; ?> </b> (not Your Account? <a href="login-register.php">Sign
                                                    out</a>)</p><?php if ($nr == 1) {
                                                                    $data1 = $resulset1->fetch_assoc();
                                                                ?> <p><img src="<?php echo $data1["img_path"]; ?>" alt="PNG" width="100px" height="100px"></p>
                                            <?php   } else { ?>
                                                <p><img src="img/profile.png" alt="PNG" width="100px" height="100px"></p>
                                            <?php

                                                                } ?>


                                            <p>From your account dashboard you can view your recent orders, manage your shipping and
                                                billing addresses and </p>
                                        </div>
                                    </div>
                                    <?php


                                    $selectedrs = Database::search("SELECT * FROM invoice INNER JOIN `user` ON invoice.user_id=user.id
                                    INNER JOIN product_item ON invoice.product_item_id=product_item.id
                                    INNER JOIN product ON product_item.product_id=product.id WHERE `user`.`id`='" . $id . "'  ORDER BY invoice.id DESC ");
                                    $srn = $selectedrs->num_rows;

                                    $c = 0;
                                    ?>
                                    <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
                                        <div class="myaccount-orders">
                                            <h4 class="small-title">MY ORDERS</h4>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <th>ORDER</th>
                                                            <th>DATE</th>
                                                            <th>PRODUCT NAME</th>
                                                            <th>TOTAL</th>

                                                        </tr>
                                                        <?php
                                                        while ($srow = $selectedrs->fetch_assoc()) {
                                                            $c = $c + 1;

                                                        ?>
                                                            <tr>
                                                                <td><a class="account-order-id" href="javascript:void(0)"><?php echo $srow["order_id"]; ?></a></td>
                                                                <td><?php echo $srow["datetime_added"]; ?></td>
                                                                <td><?php echo $srow["title"]; ?></td>
                                                                <td><?php echo $srow["total"]; ?></td>
                                                            </tr>

                                                        <?php
                                                        }
                                                        ?>

                                                    </tbody>
                                                </table>
                                            </div>



                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
                                        <div class="myaccount-address">
                                            <p>The following addresses will be used on the checkout page by default.</p>
                                            <div class="row">
                                                <div class="col">
                                                    <h4 class="small-title">SHIPPING ADDRESS</h4>

                                                    <?php

                                                    $usermail2 = $_SESSION["u"]["email"];
                                                    $address2 = Database::search("SELECT * FROM `address` INNER JOIN `country` 
                                                    ON `address`.`country_id`=country.id WHERE `user_id`= '" . $id . "' ");
                                                    $n2 = $address2->num_rows;

                                                    if ($n2 > 0) {
                                                        $d2 = $address2->fetch_assoc();

                                                    ?>
                                                        <address>
                                                            <?php echo $d2["line1"] . "</br> " . $d2["line2"] . "</br> " . $d2["postal_code"] . "</br> " . $d2["name"] ?>
                                                        </address>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <address>
                                                        <p class="text-danger">* Please Update Profile</p>
                                                        
                                                        </address>
                                                    <?php
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                                        <div class="myaccount-details">
                                            <form action="#" class="hiraola-form">
                                                <?php
                                                // $profile = Database::search("SELECT * FROM `user` INNER JOIN `address` ON `address`.`user_id`=user.id
                                                // INNER JOIN country ON address.country_id=country.id WHERE `user`.id='" . $id . "'");
                                                //   $pn = $profile->num_rows;
                                                //   $p = $profile->fetch_assoc();

                                                ?>
                                                <div class="col-md-12 ">
                                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                                        <?php
                                                        $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_id`='" . $id . "' ");
                                                        $pn = $profileimg->num_rows;
                                                        if ($pn == 1) {
                                                            $p2 = $profileimg->fetch_assoc();
                                                        ?>
                                                            <img class="rounded mt-5" width="150px" src="<?php echo $p2["img_path"] ?>" id="prevf" />
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <img class="rounded mt-5" width="150px" src="img/profile.png" id="prevf" />
                                                        <?php
                                                        }
                                                        ?>
                                                        <input class="d-none" type="file" id="profileimg" accept="img/*" />
                                                        <label class="btn btn-primary mt-3" for="profileimg" onclick="updateprofileimg();">Update Profile Image</label>
                                                    </div>
                                                </div>
                                                <div class="hiraola-form-inner">
                                                    <div class="single-input single-input-half">
                                                        <label for="account-details-firstname">First Name*</label>
                                                        <input type="text" value="<?php echo $_SESSION["u"]["fname"] ?>" id="fname">
                                                    </div>
                                                    <div class="single-input single-input-half">
                                                        <label for="account-details-lastname">Last Name*</label>
                                                        <input type="text" value="<?php echo $_SESSION["u"]["lname"] ?>" id="lname">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="account-details-email">Email*</label>
                                                        <input type="email" value="<?php echo $_SESSION["u"]["email"] ?>" id="email" disabled>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="account-details-oldpass">Mobile</label>
                                                        <input type="text" value="<?php echo $_SESSION["u"]["mobile"] ?>" id="mobile">
                                                    </div>
                                                    <?php

                                                    $usermail = $_SESSION["u"]["email"];
                                                    $address = Database::search("SELECT * FROM `address` INNER JOIN `country` ON `address`.`country_id`
                                                    =country.id WHERE `user_id`= '" . $id . "' ");
                                                    $n = $address->num_rows;

                                                    if ($n > 0) {
                                                        $d = $address->fetch_assoc();

                                                    ?>
                                                        <div class="single-input">
                                                            <label for="account-details-newpass">Address Line 01</label>
                                                            <input type="text" id="line1" placeholder="enter address line 01" value="<?php echo $d["line1"] ?>" />
                                                        </div>
                                                        <div class="single-input">
                                                            <label for="account-details-confpass">Address Line 02</label>
                                                            <input type="text" id="line2" placeholder="enter address line 02" value="<?php echo $d["line2"] ?>" />
                                                        </div>
                                                        <div class="single-input">
                                                            <label for="account-details-confpass">Postal Code</label>
                                                            <input type="text" id="pc" placeholder="Enter Postal Code" value="<?php echo $d["postal_code"] ?>" />
                                                        </div>
                                                        <div class="single-input">
                                                            <label class="form-label">Country</label>
                                                            <div class="col-12 mb-3">
                                                                <select id="country">
                                                                    <option value="<?php echo $d["country_id"] ?>"><?php echo $d["name"] ?></option>
                                                                    <?php

                                                                    $rs2 = Database::search("SELECT * FROM `country` WHERE `name` != '" . $d["name"] . "' ");
                                                                    $n2 = $rs2->num_rows;

                                                                    for ($i = 1; $i <= $n2; $i++) {
                                                                        $dis = $rs2->fetch_assoc();
                                                                    ?>
                                                                        <option value="<?php echo $dis["id"] ?>"><?php echo $dis["name"] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>

                                                        <div class="single-input">
                                                            <label for="account-details-newpass">Address Line 01</label>
                                                            <input type="text" id="line1" placeholder="enter address line 01" />
                                                        </div>
                                                        <div class="single-input">
                                                            <label for="account-details-confpass">Address Line 02</label>
                                                            <input type="text" id="line2" placeholder="enter address line 02" />
                                                        </div>
                                                        <div class="single-input">
                                                            <label for="account-details-confpass">Postal Code</label>
                                                            <input type="text" id="pc" placeholder="Enter Postal Code" />
                                                        </div>
                                                        <div class="single-input">
                                                            <label class="form-label">Country</label>
                                                            <div class="col-12 mb-3">
                                                                <select id="country">
                                                                    <option value="">Select Country</option>
                                                                    <?php

                                                                    $rs2 = Database::search("SELECT * FROM `country` ");
                                                                    $n2 = $rs2->num_rows;

                                                                    for ($i = 1; $i <= $n2; $i++) {
                                                                        $dis = $rs2->fetch_assoc();
                                                                    ?>
                                                                        <option value="<?php echo $dis["id"] ?>"><?php echo $dis["name"] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>


                                                    <?php
                                                    }
                                                    ?>
                                                    <div class="single-input">
                                                        <button class="hiraola-btn hiraola-btn_dark" onclick="updateProfile();"><span>SAVE
                                                                CHANGES</span></button>
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
                <!-- Hiraola's Account Page Area End Here -->
            </main>
            <!-- Hiraola's Page Content Area End Here -->
            <?php
            require "footer.php";
            ?>

        </div>

        <!-- JS
============================================ -->

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
        <script src="assets/js/myAccout.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- <script src="assets/js/main.min.js"></script> -->

    </body>

    </html>
<?php
} else {
?>
    <script>
        window.location = "login-register.php"
    </script>
<?php
}
?>