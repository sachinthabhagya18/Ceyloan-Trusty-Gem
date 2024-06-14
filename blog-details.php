<?php
session_start();
require "connection.php";


if (isset($_SESSION["u"])) {
    $userid = $_SESSION["u"]["id"];
}

if (isset($_GET["id"])) {
    $bid = $_GET["id"];

    $blog = Database::search("SELECT * FROM `blog` WHERE  `id`='" . $bid . "';");
    $blognr = $blog->num_rows;

    if ($blognr == 1) {
        $blogd = $blog->fetch_assoc();

        $img = Database::search("SELECT * FROM `blog_img` WHERE `blog_id`='" . $blogd["id"] . "';");
        $imgrow = $img->fetch_assoc();


?>


        <!doctype html>
        <html class="no-js" lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <title>Blog Details Left Sidebar || Hiraola - Jewellery eCommerce Bootstrap 5 Template</title>
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
                            <h2>Blog Details</h2>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="blog.php">Blog</a></li>
                                <li class="active">Blog Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Hiraola's Breadcrumb Area End Here -->

                <!-- Begin Hiraola's Blog Details Left Sidebar Area -->



                <div class="hiraola-blog_area hiraola-blog_area-2 hiraola-blog-details hiraola-banner_area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 order-lg-1 order-2">
                                <div class="hiraola-blog-sidebar-wrapper">
                                    <!-- A section of content was removed -->
                                    <div class="hiraola-blog-sidebar">
                                        <h4 class="hiraola-blog-sidebar-title">Categories</h4>
                                        <ul class="hiraola-blog-archive">
                                            <?php
                                            $category = Database::search("SELECT * FROM `category`;");
                                            $catenr = $category->num_rows;

                                            for ($c = 0; $c < $catenr; $c++) {
                                                $catefa = $category->fetch_assoc();
                                            ?>
                                                <li><a href="shop-left-sidebar.php"><?php echo $catefa["cname"]; ?></a></li>
                                            <?php

                                            }
                                            ?>


                                        </ul>
                                    </div>
                                    <div class="hiraola-blog-sidebar">
                                        <h4 class="hiraola-blog-sidebar-title">Blog Archives</h4>

                                        <ul class="hiraola-blog-archive">
                                            <?php
                                            $blogT = Database::search("SELECT * FROM `blog` ORDER BY `blogdate` DESC  LIMIT 12 OFFSET 0;");
                                            $blogTnr = $blogT->num_rows;
                                            for ($y = 0; $y < $blogTnr; $y++) {
                                                $blogdT = $blogT->fetch_assoc();

                                                $dateT = $blogdT["blogdate"];

                                            ?>
                                                <li><a href="<?php echo "blog-details.php?id=" . ($blogdT['id']); ?>"><?php echo DateTime::createFromFormat("Y-m-d", $dateT)->format('M'); ?> (<?php echo DateTime::createFromFormat("Y-m-d", $dateT)->format('d'); ?>)</a></li>
                                            <?php

                                            }
                                            ?>


                                        </ul>
                                    </div>
                                    <div class="hiraola-blog-sidebar mt-3">
                                        <h4 class="hiraola-blog-sidebar-title">Recent Post</h4>

                                        <?php
                                        $Rblog = Database::search("SELECT * FROM `blog` ORDER BY `blogdate` DESC  LIMIT 4 OFFSET 0;");
                                        $Rblognr = $Rblog->num_rows;
                                        for ($r = 0; $r < $Rblognr; $r++) {
                                            $RblogdT = $Rblog->fetch_assoc();
                                            $RdateT = $blogdT["blogdate"];

                                            $img2 = Database::search("SELECT * FROM `blog_img` WHERE `blog_id`='" . $RblogdT["id"] . "';");
                                            $img2row = $img2->fetch_assoc();
                                        ?>
                                            <div class="hiraola-recent-post">
                                                <div class="hiraola-recent-post-thumb">
                                                    <a href="<?php echo "blog-details.php?id=" . ($RblogdT['id']); ?>">
                                                        <img class="img-full" src="admin/<?php echo $img2row["img_path"]; ?>" alt="Hiraola's Product Image">
                                                    </a>
                                                </div>
                                                <div class="hiraola-recent-post-des">

                                                    <span class="hiraola-post-date"><?php echo $RblogdT["blogdate"]; ?></span>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>


                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-9 order-lg-2 order-1">
                                <div class="blog-item">
                                    <div class="blog-img img-hover_effect">
                                        <a href="">
                                            <img src="admin/<?php echo $imgrow["img_path"]; ?>" alt="Hiraola's Blog Image">
                                        </a>
                                        <div class="blog-meta-2">
                                            <div class="blog-time_schedule">
                                                <?php
                                                $date = $blogd["blogdate"];
                                                ?>
                                                <div class="blog-time_schedule">
                                                    <span class="day"><?php echo DateTime::createFromFormat("Y-m-d", $date)->format('d'); ?></span>
                                                    <span class="month"><?php echo DateTime::createFromFormat("Y-m-d", $date)->format('M'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="blog-content">
                                        <div class="blog-heading">

                                            <div class="row">
                                                <div class="col-12 col-lg-8">
                                                    <h5>
                                                        <a href="javascrip:void(0)"><?php echo $blogd["title"]; ?></a>
                                                    </h5>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <div class="row">
                                                        <div class="col-6 text-end">

                                                            <h5>
                                                                <a onclick="addlike(<?php echo $bid ?>);" href="javascrip:void(0)" style="color: red;"><img src="assets/images/blog/like.svg" alt="like" height="30px"></a>
                                                            </h5>
                                                        </div>

                                                        <div class="col-6 text-start">
                                                            <h5>
                                                                <a onclick="addunlike(<?php echo $bid ?>);" href="javascrip:void(0)"><img src="assets/images/blog/unlike.svg" alt="Unlike" height="30px" style="color: red;"></a>
                                                            </h5>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                        <div class="blog-short_desc">
                                            <p><?php echo $blogd["paragraph1"]; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- A section of content was removed -->
                                    <div class="blog-additional_information">
                                        <p><?php echo $blogd["paragraph2"]; ?>
                                        </p>
                                    </div>
                                    <!-- <div class="hiraola-tag-line">
                                        <h4>Tag:</h4>
                                        <a href="javascript:void(0)">Vegetables</a>,
                                        <a href="javascript:void(0)">Milk Fresh</a>,
                                        <a href="javascript:void(0)">Edible Oils</a>
                                    </div> -->
                                    <!-- <div class="hiraola-social_link">
                                        <ul>
                                            <li class="facebook">
                                                <a href="https://www.facebook.com" data-bs-toggle="tooltip" target="_blank" title="Facebook">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="twitter">
                                                <a href="https://twitter.com" data-bs-toggle="tooltip" target="_blank" title="Twitter">
                                                    <i class="fab fa-twitter-square"></i>
                                                </a>
                                            </li>
                                            <li class="google-plus">
                                                <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip" target="_blank" title="Google Plus">
                                                    <i class="fab fa-google-plus"></i>
                                                </a>
                                            </li>
                                            <li class="instagram">
                                                <a href="https://rss.com" data-bs-toggle="tooltip" target="_blank" title="Instagram">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hiraola's Blog Details Left Sidebar Area End Here -->

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

            <!-- blog -->
            <script src="assets/js/blog.js"></script>

        </body>

        </html>

    <?php


    } else {
    ?>
        <script>
            window.location = "404.php";
        </script>
    <?php
    }
} else {
    ?>
    <script>
        window.location = "index.php";
    </script>
<?php
}
?>