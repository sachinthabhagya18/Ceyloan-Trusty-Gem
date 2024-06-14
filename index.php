<?php
require "connection.php";
$currency = Database::search("SELECT * FROM `currency`  WHERE `status_id`='1'");
$cryname = $currency->fetch_assoc();
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ceylon TG || Home </title>
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

<body class="template-color-2">

    <div class="main-wrapper">

        <header class="header-main_area header-main_area-2">
            <div class="header-bottom_area header-bottom_area-2 header-sticky stick">
                <div class="container-fliud">
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-4">
                            <div class="header-logo">
                                <a href="index.php">
                                    <img class="" src="assets/images/l1.png" alt="Hiraola's Header Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 d-none d-lg-block position-static">
                            <div class="main-menu_area">
                                <nav>
                                    <ul>
                                        <li class="dropdown-holder"><a href="index.php">Home</a></li>
                                        <li class="megamenu-holder"><a href="shop-left-sidebar.php">Shop</a></li>
                                        <li><a href="Auctionview.php">Auction</a></li>
                                        <li><a href="blog.php">Blog</a></li>
                                        <li><a href="about-us.php">About Us</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                        <!-- <li><a href="faq.php">FAQ</a></li> -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-8 col-sm-8">
                            <div class="header-right_area">
                                <ul>
                                    <li>
                                        <a href="my-account.php" class="">
                                            <i class="bi bi-person"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color-white d-lg-none d-block">
                                            <i class="ion-navicon"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-search_wrapper" id="searchBar">
                <div class="offcanvas-menu-inner">
                    <div class="container">
                        <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                        <!-- Begin Offcanvas Search Area -->
                        <div class="offcanvas-search">
                            <form action="#" class="hm-searchbox">
                                <input type="text" placeholder="Search for item...">
                                <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                        <!-- Offcanvas Search Area End Here -->
                    </div>
                </div>
            </div>

            <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="offcanvas-menu-inner">
                    <div class="container">
                        <a href="#" class="btn-close"><i class="ion-android-close"></i></a>

                        <nav class="offcanvas-navigation">
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children active"><a href="index.php"><span class="mm-text">Home</span></a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="shop-left-sidebar.php">
                                        <span class="mm-text">Shop</span>
                                    </a>

                                </li>
                                <li class="menu-item-has-children">
                                    <a href="Auctionview.php">
                                        <span class="mm-text">Auction</span>
                                    </a>

                                </li>
                                <li class="menu-item-has-children">
                                    <a href="blog.php">
                                        <span class="mm-text">Blog</span>
                                    </a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="about-us.php">
                                        <span class="mm-text">About Us</span>
                                    </a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="contact.php">
                                        <span class="mm-text">Contact Us</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </header>

        <div class="hiraola-slider_area-2">
            <div class="main-slider">
                <!-- Begin Single Slide Area -->
                <div class="single-slide animation-style-01 bg-1">
                    <div class="container">
                        <?php

                        $resultset3 = Database::search("SELECT * FROM product_offers INNER JOIN product ON product_offers.product_id=product.id
                        INNER JOIN product_item ON product_item.product_id=product.id
                        WHERE product_offers.`status`='1' ORDER BY product_offers.product_id DESC  LIMIT 1 OFFSET 0  ");
                        $prod3 = $resultset3->fetch_assoc();
                        ?>
                        <div class="slider-content">
                            <h5><span>Big Sale</span> This Week</h5>
                            <h2><?php echo $prod3["title"]; ?></h2>
                            <h3>Ceyloan Trusty Gems</h3>
                            <h4>Starting at <span><?php echo $prod3["price"]; ?> <?php echo $cryname["name"]; ?></span></h4>
                            <div class="hiraola-btn-ps_center slide-btn">
                                <a class="hiraola-btn" href="shop-left-sidebar.php">Shopping Now</a>
                            </div>
                        </div>
                        <div class="slider-progress"></div>
                    </div>
                </div>
                <!-- Single Slide Area End Here -->
                <!-- Begin Single Slide Area -->
                <div class="single-slide animation-style-02 bg-2">
                    <div class="container">
                        <?php

                        $resultset4 = Database::search("SELECT * FROM product_offers INNER JOIN product ON product_offers.product_id=product.id
                        INNER JOIN product_item ON product_item.product_id=product.id
                        WHERE product_offers.`status`='1' ORDER BY product_offers.product_id DESC  LIMIT 1 OFFSET 0  ");
                        $prod4 = $resultset4->fetch_assoc();
                        ?>
                        <div class="slider-content">
                            <h5><span>-<?php echo $prod4["amount"]; ?> <?php echo $cryname["name"]; ?> Off</span> This Week</h5>
                            <h2><?php echo $prod4["title"]; ?></h2>
                            <h3><?php echo $prod4["price"]; ?> <?php echo $cryname["name"]; ?> - <?php echo $prod4["amount"]; ?> <?php echo $cryname["name"]; ?></h3>
                            <?php

                            $newprice =  $prod4["price"] - $prod4["amount"];

                            ?>
                            <h4>Starting at <span><?php echo $newprice; ?> <?php echo $cryname["name"]; ?></span></h4>
                            <div class="hiraola-btn-ps_center slide-btn">
                                <a class="hiraola-btn" href="shop-left-sidebar.php">Shopping Now</a>
                            </div>
                        </div>
                        <div class="slider-progress"></div>
                    </div>
                </div>
                <!-- Single Slide Area End Here -->
            </div>
        </div>

        <!-- Begin Hiraola's Shipping Area Two -->
        <div class="hiraola-shipping_area hiraola-shipping_area-2">
            <div class="container">
                <div class="shipping-nav">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="bi bi-truck"></i>

                                </div>
                                <div class="shipping-content">
                                    <h6> Standard delivery</h6>
                                    <p>Made for your day delivery</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="bi bi-credit-card-2-back"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>Checked</h6>
                                    <p>Made for your Item Checked</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="bi bi-shield-exclamation"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>Happy Customer</h6>
                                    <p>Reach Personal goals set</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="bi bi-award"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>Winner Of Awards</h6>
                                    <p>Best Gems in Sri Lanka</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Shipping Area Two End Here -->

        <!-- Begin Hiraola's Product Area -->
        <div class="hiraola-product_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hiraola-section_title">
                            <h4>New Arrival</h4>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="hiraola-product_slider">
                            <!-- Begin Hiraola's Slide Item Area -->
                            <?php

                            $resultset = Database::search("SELECT * FROM product INNER JOIN model_has_category ON product.model_has_category_id=model_has_category.id
                            INNER JOIN category ON model_has_category.category_id=category.id 
                            INNER JOIN model ON model_has_category.model_id=model.id
                            INNER JOIN product_item ON product_item.product_id=product.id 
                            INNER JOIN product_img ON product_img.product_item_id=product_item.id WHERE product.product_status_id='1'  ORDER BY `date` DESC  LIMIT 5 OFFSET 0  ");

                            ?>
                            <?php

                            $nr = $resultset->num_rows;
                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resultset->fetch_assoc();
                            ?>
                                <div class="slide-item">
                                    <div class="single_product">
                                        <div class="product-img">
                                            <a href="single-product-variable.php?id=<?php echo $prod["product_id"]; ?>">
                                                <img class="primary-img" src="admin/<?php echo $prod["path1"]; ?>" alt="Hiraola's Product Image">
                                                <img class="secondary-img" src="<?php echo $prod["path2"]; ?>" alt="Hiraola's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="hiraola-product_content">
                                            <div class="product-desc_info">
                                                <h6><a class="product-name"><?php echo $prod["title"]; ?></a></h6>
                                                <div class="price-box">
                                                    <span class="new-price"><?php echo $prod["price"]; ?> <?php echo $cryname["name"]; ?></span>
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
                            <?php
                            }
                            ?>

                            <!-- Hiraola's Slide Item Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Product Area End Here -->



        <div class="static-banner_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="static-banner-image">
                            <?php

                            $resultset2 = Database::search("SELECT * FROM product_offers INNER JOIN product ON product_offers.product_id=product.id
                            INNER JOIN product_item ON product_item.product_id=product.id
                            WHERE product_offers.`status`='1' ORDER BY product_offers.product_id DESC  LIMIT 5 OFFSET 0  ");

                            ?>

                            <div class="main-slider">

                                <?php

                                $nr2 = $resultset2->num_rows;
                                for ($y1 = 0; $y1 < $nr2; $y1++) {
                                    $prod2 = $resultset2->fetch_assoc();
                                ?>
                                    <!-- Begin Single Slide Area -->
                                    <div class="single-slide animation-style-02 static-banner-content">
                                        <div class="container">
                                            <div class="slider-content mt-5">
                                                <br><br><br><br><br>
                                                <div class="mt-5">
                                                    <p class=""><span>-<?php echo $prod2["amount"]; ?> <?php echo $cryname["name"]; ?> Off </span>This Week</p>
                                                    <h3 class=""><?php echo $prod2["title"]; ?></h3>
                                                    <?php

                                                    $newprice = $prod2["price"] - $prod2["amount"];

                                                    ?>
                                                    <p class="schedule">
                                                        Starting at
                                                        <span> <?php echo $newprice; ?> <?php echo $cryname["name"]; ?></span>
                                                    </p>
                                                    <div class="hiraola-btn-ps_left">
                                                        <a href="shop-left-sidebar.php" class="hiraola-btn">Shopping Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="hiraola-banner_area-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-left-sidebar.html">
                                <img class="img-full" src="assets/images/banner/b1.jpg" alt="Hiraola's Banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-left-sidebar.html">
                                <img class="img-full" src="assets/images/banner/b2.jpg" alt="Hiraola's Banner">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Begin Hiraola's Product Tab Area -->
        <div class="hiraola-product-tab_area-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-tab">
                            <div class="hiraola-tab_title">
                                <h4>New Products</h4>
                            </div>
                            <ul class="nav product-menu">
                                <li><a class="list active" data-filter="all"><span>All</span></a></li>
                                <?php
                                $rs2 = Database::search("SELECT * FROM `category`");
                                $n2 = $rs2->num_rows;

                                for ($x = 0; $x < $n2; $x++) {
                                    $c2 = $rs2->fetch_assoc();
                                ?>
                                    <li><a class="list" data-filter="<?php echo $c2["cname"]; ?>"><span><?php echo $c2["cname"] ?></span></a></li>
                                <?php
                                }
                                ?>

                            </ul>
                        </div>


                        <div class="tab-content hiraola-tab_content">

                            <div class="col-lg-12">
                                <div class="hiraola-product_slider">
                                    <!-- Begin Hiraola's Slide Item Area -->
                                    <?php

                                    $resultset2 = Database::search("SELECT * FROM product INNER JOIN model_has_category ON product.model_has_category_id=model_has_category.id
                            INNER JOIN category ON model_has_category.category_id=category.id 
                            INNER JOIN model ON model_has_category.model_id=model.id
                            INNER JOIN product_item ON product_item.product_id=product.id 
                            INNER JOIN product_img ON product_img.product_item_id=product_item.id WHERE product.product_status_id='1' ORDER BY `date` DESC  LIMIT 5 OFFSET 0  ");

                                    ?>
                                    <?php

                                    $nr2 = $resultset2->num_rows;
                                    for ($y = 0; $y < $nr2; $y++) {
                                        $prod2 = $resultset2->fetch_assoc();
                                    ?>
                                        <div class="itemBox  <?php echo $prod2["cname"] ?>">
                                            <div class="slide-item">
                                                <div class="single_product">
                                                    <div class="product-img">
                                                        <a href="single-product-variable.php?id=<?php echo $prod2["product_id"]; ?>">
                                                            <img class="primary-img" src="admin/<?php echo $prod2["path1"]; ?>" alt="Hiraola's Product Image">
                                                            <img class="secondary-img" src="admin/<?php echo $prod2["path2"]; ?>" alt="Hiraola's Product Image">
                                                        </a>
                                                        <span class="sticker">New</span>
                                                    </div>
                                                    <div class="hiraola-product_content">
                                                        <div class="product-desc_info">
                                                            <h6><a class="product-name"><?php echo $prod2["title"]; ?></a></h6>
                                                            <div class="price-box">
                                                                <span class="new-price"><?php echo $prod2["price"]; ?> <?php echo $cryname["name"]; ?></span>
                                                            </div>
                                                            <div class="additional-add_action">
                                                                <ul>

                                                                    </li>
                                                                </ul>
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
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <!-- Hiraola's Slide Item Area End Here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Product Tab Area End Here -->


    <!-- Begin Hiraola's Product Tab Area Two -->
    <div class="hiraola-product-tab_area-3">
        <!-- Hiraola's Product Tab Area TwoEnd Here -->

        <div class="hiraola-banner_area-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-left-sidebar.html">
                                <img class="img-full" src="assets/images/banner/b1.jpg" alt="Hiraola's Banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-left-sidebar.html">
                                <img class="img-full" src="assets/images/banner/b2.jpg" alt="Hiraola's Banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-left-sidebar.html">
                                <img class="img-full" src="assets/images/banner/b1.jpg" alt="Hiraola's Banner">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Begin Hiraola's Product Tab Area Three -->
        <div class="hiraola-product-tab_area-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-tab">
                            <div class="hiraola-tab_title">
                                <h4>Offer Products</h4>
                            </div>
                        </div>
                        <div class="tab-content hiraola-tab_content">
                            <div id="necklaces-2" class="tab-pane active show" role="tabpanel">
                                <div class="hiraola-product-tab_slider-2">
                                    <!-- Begin Hiraola's Slide Item Area -->
                                    <?php

                                    $resultset = Database::search("SELECT * FROM product_offers INNER JOIN product ON product_offers.product_id=product.id
                                    INNER JOIN model_has_category ON product.model_has_category_id=model_has_category.id
                                     INNER JOIN product_item ON product_item.product_id=product.id 
                                     INNER JOIN category ON model_has_category.category_id=category.id 
                                    INNER JOIN model ON model_has_category.model_id=model.id
                                    INNER JOIN product_img ON product_img.product_item_id=product_item.id WHERE product.product_status_id='1' ORDER BY `date` DESC  LIMIT 5 OFFSET 0   ");

                                    ?>
                                    <?php

                                    $nr = $resultset->num_rows;
                                    for ($y = 0; $y < $nr; $y++) {
                                        $prod = $resultset->fetch_assoc();
                                    ?>
                                        <div class="slide-item">
                                            <div class="single_product">
                                                <div class="product-img">
                                                    <a href="single-product-variable.php?id=<?php echo $prod["product_id"]; ?>">
                                                        <img class="primary-img" src="admin/<?php echo $prod["path1"]; ?>" alt="Hiraola's Product Image">
                                                        <img class="secondary-img" src="admin/<?php echo $prod["path2"]; ?>" alt="Hiraola's Product Image">
                                                    </a>
                                                    <span class="sticker">Offer</span>
                                                </div>
                                                <div class="hiraola-product_content">
                                                    <div class="product-desc_info">
                                                        <h6><a class="product-name"><?php echo $prod["title"]; ?></a></h6>
                                                        <div class="price-box">
                                                            <span class="new-price"><del><?php echo $prod["price"]; ?></del></span>
                                                            <?php

                                                            $newprice2 =  $prod["price"] - $prod["amount"];
                                                            ?> <span class="new-price"><?php echo $newprice2; ?> <?php echo $cryname["name"]; ?></span>
                                                        </div>
                                                        <div class="additional-add_action">
                                                            <ul>

                                                            </ul>
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
                                    <?php
                                    }
                                    ?>

                                    <!-- Hiraola's Slide Item Area End Here -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Product Tab Area Three End Here -->

        <?php
        require "footer.php";
        ?>



    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.list').click(function() {
                const value = $(this).attr('data-filter');
                if (value == 'all') {
                    $('.itemBox').show('1000');
                } else {
                    $('.itemBox').not('.' + value).hide('1000');
                    $('.itemBox').filter('.' + value).show('1000');

                }
            })

            $('.list').click(function() {
                $(this).addClass('active').siblings().removeClass('active');
            })
        })
    </script>
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