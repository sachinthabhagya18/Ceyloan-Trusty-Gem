<?php
session_start();
require "connection.php";
if (isset($_GET["p"])) {
    $page = $_GET["p"];
} else {
    $page = 1;
}
$currency = Database::search("SELECT * FROM `currency`  WHERE `status_id`='1'");
$cryname = $currency->fetch_assoc();
//$page = $_GET["p"];
$offset = 12 * ($page - 1);

if (isset($_SESSION["u"])) {
    $email = $_SESSION["u"]["email"];
    $pass = $_SESSION["u"]["password"];
?>
    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ceylon TG || Auction </title>
        <meta name="robots" content="noindex, follow" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favico.svg">

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

    <body class="template-color-1" id="best">

        <div class="main-wrapper">

            <?php
            require "header.php";
            ?>

            <!-- Begin Hiraola's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <h2>Auction Products</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Auction Product View</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Hiraola's Breadcrumb Area End Here -->

            <!-- Begin Hiraola's Content Wrapper Area -->
            <div class="hiraola-content_wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 order-1 order-lg-2">
                            <div class="shop-toolbar">
                                <div class="product-view-mode">
                                    <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="fa fa-th"></i></a>
                                    <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List View"><i class="fa fa-th-list"></i></a>
                                </div>
                                <!-- <div class="product-item-selection_area">
                                    <div class="product-short">
                                        <label class="select-label">Short By:</label>
                                        <select class="nice-select">
                                            <option value="1">Relevance</option>
                                            <option value="2">Name, A to Z</option>
                                            <option value="3">Name, Z to A</option>
                                            <option value="4">Price, low to high</option>
                                            <option value="5">Price, high to low</option>
                                            <option value="5">Rating (Highest)</option>
                                            <option value="5">Rating (Lowest)</option>
                                            <option value="5">Model (A - Z)</option>
                                            <option value="5">Model (Z - A)</option>
                                        </select>
                                    </div>
                                </div> -->
                            </div>
                            <div class="shop-product-wrap grid gridview-3 row" >
                                <?php
                                $pdars = Database::search("SELECT `auction`.`id` AS `auction_id`,`auction_status_id`,`path1`,`path2`,`title`,`beginning_price`,`description` FROM `auction` 
                                 INNER JOIN `product_item` ON `auction`.`product_item_id`=`product_item`.`id` 
                                INNER JOIN `product` ON `product_item`.`product_id`=`product`.`id`
                                INNER JOIN `product_img` ON `product_img`.`product_item_id`=`product_item`.`id` WHERE `auction_status_id`='1' LIMIT 12 OFFSET " . $offset . "");
                                $n = $pdars->num_rows;

                                for ($i = 0; $i < $n; $i++) {
                                    $pdrdt = $pdars->fetch_assoc();

                                ?>

                                    <div class="col-lg-4" >
                                        <div class="slide-item">
                                            <div class="single_product">
                                                <div class="product-img">
                                                    <a href="auction.php?id=<?php echo $pdrdt["auction_id"] ?>">
                                                        <img class="primary-img" src="admin/<?php echo $pdrdt["path1"] ?>" width="100%" height="350px" alt="Hiraola's Product Image">
                                                        <img class="secondary-img" src="admin/<?php echo $pdrdt["path2"] ?>" width="100%" height="350px" alt="Hiraola's Product Image1">
                                                    </a>

                                                </div>
                                                <div class="hiraola-product_content">
                                                    <div class="product-desc_info">
                                                        <h6><a class="product-name" href="auction.php?id=<?php echo $pdrdt["auction_id"] ?>"><?php echo $pdrdt["title"] ?></a></h6>
                                                        <div class="price-box">

                                                            <?php $bidrs = Database::search("SELECT * FROM `bidding` WHERE `auction_id`='" . $pdrdt["auction_id"] . "'");
                                                            $bdns = $bidrs->num_rows;

                                                            $biddt = $bidrs->fetch_assoc();

                                                            if ($bdns == 1) {
                                                            ?>
                                                                <span class="new-price"><?php echo  $biddt["bidding_price"] ?> LKR</span>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <span class="new-price"><?php echo  $pdrdt["beginning_price"] ?> LKR</span>
                                                            <?php
                                                            }
                                                            ?>






                                                        </div>
                                                        <div class="additional-add_action">

                                                        </div>
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="fa fa-star-of-david"></i></li>
                                                                <li><i class="fa fa-star-of-david"></i></li>
                                                                <li><i class="fa fa-star-of-david"></i></li>
                                                                <li><i class="fa fa-star-of-david"></i></li>
                                                                <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-slide_item">
                                            <div class="single_product">
                                                <div class="product-img">
                                                    <a href="auction.php?id=<?php echo $pdrdt["auction_id"] ?>">
                                                        <img class="primary-img" src="<?php echo $pdrdt["path1"] ?>" width="100%" height="100%" alt="Hiraola's Product Image">
                                                        <img class="secondary-img" src="<?php echo $pdrdt["path1"] ?>" width="100%" height="100%" alt="Hiraola's Product Image">
                                                    </a>
                                                </div>
                                                <div class="hiraola-product_content">
                                                    <div class="product-desc_info">
                                                        <h6><a class="product-name" href="auction.php?id=<?php echo $pdrdt["auction_id"] ?>"><?php echo $pdrdt["title"] ?></a></h6>
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="fa fa-star-of-david"></i></li>
                                                                <li><i class="fa fa-star-of-david"></i></li>
                                                                <li><i class="fa fa-star-of-david"></i></li>
                                                                <li><i class="fa fa-star-of-david"></i></li>
                                                                <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">

                                                            <?php $bidrs = Database::search("SELECT * FROM `bidding` WHERE `auction_id`='" . $pdrdt["auction_id"] . "'");
                                                            $bdns = $bidrs->num_rows;

                                                            $biddt = $bidrs->fetch_assoc();

                                                            if ($bdns == 1) {
                                                            ?> <span class="new-price"><?php echo  $biddt["bidding_price"] ?> LKR</span> <?php
                                                                                                                                    } else {
                                                                                                                                        ?> <span class="new-price"><?php echo  $pdrdt["beginning_price"] ?> LKR</span><?php
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                        ?>






                                                        </div>
                                                        <div class="product-short_desc">
                                                            <p><?php echo $pdrdt["description"] ?>.</p>
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                <?php


                                } ?>

                                <?php
                                $resultset = Database::search("SELECT * FROM `auction` ;");
                                $n = $resultset->num_rows;
                                $t1 = $n / 12;
                                $t2 = intval($t1); //convert double to int
                                if ($n % 12 != 0) {
                                    $t2 = $t2 + 1;
                                }
                                ?>
                                <div class="row mt-5">
                                    <div class="col-lg-12">
                                        <div class="hiraola-paginatoin-area">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <ul class="hiraola-pagination-box">
                                                        <?php
                                                        if ($page != 1) {
                                                        ?>
                                                            <li> <a onclick="m2(<?php echo $page - 1; ?>)">Previouse</a></li>
                                                        <?php
                                                        }
                                                        ?>

                                                        <?php
                                                        for ($i = 1; $i <= $t2; $i++) {

                                                            if ($i == $page) {
                                                        ?>
                                                                <li><a class="about-us_btn" onclick="m2(<?php echo $i; ?>)"><?php echo $i; ?></a></li>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <li> <a class="about-us_btn" onclick="m2(<?php echo $i; ?>)"><?php echo $i; ?></a></li>

                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($page != $t2) {
                                                        ?>
                                                            <li> <a onclick="m2(<?php echo $page + 1; ?>)">Next</a></li>
                                                        <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="product-select-box">
                                                        <div class="product-short">
                                                            <?php
                                                            $count = Database::search("SELECT COUNT(`auction`.`id`) AS `auction_count` FROM `auction`");
                                                            $count_data = $count->fetch_assoc();
                                                            $max = $count_data["auction_count"];
                                                            ?>
                                                            <p>Showing 1–12 of <?php echo $max; ?> Products</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hiraola's Content Wrapper Area End Here -->

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
            <!-- <script src="assets/js/main.min.js"></script> -->

    </body>

    </html>

<?php
} else {
?>
    <script>
        window.location = "login-register.php";
    </script>
<?php
}
