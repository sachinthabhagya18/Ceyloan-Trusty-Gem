<?php
session_start();
require "connection.php";
// $pid = $_SESSION["pid"];
$pid = $_GET["id"];

$currency = Database::search("SELECT * FROM `currency`  WHERE `status_id`='1'");
$cryname = $currency->fetch_assoc();


?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ceylon TG || Single Product</title>
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
                    <h2>Single Product Type</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Single Product View</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Hiraola's Breadcrumb Area End Here -->
        <?php
        $product_rs = Database::search("SELECT * FROM `product` INNER JOIN `model_has_category` ON `product`.`model_has_category_id`=`model_has_category`.`id` INNER JOIN `model` ON `model_has_category`.`model_id`=`model`.`id` INNER JOIN `category` ON `model_has_category`.`category_id`=`category`.`id` INNER JOIN `product_status` ON `product`.`product_status_id`=`product_status`.`id` INNER JOIN `product_item` ON `product`.`id`=`product_item`.`product_id` INNER JOIN `product_img` ON `product_item`.`id`=`product_img`.`product_item_id` WHERE `product`.`id`='" . $pid . "'");
        $product_n = $product_rs->num_rows;

        if ($product_n != null) {
            $product_data = $product_rs->fetch_assoc();
        ?>
            <!-- Begin Hiraola's Single Product Variable Area -->
            <div class="sp-area">
                <div class="container">
                    <div class="sp-nav">
                        <div class="row" id="printContent">
                            <div class="col-lg-5 col-md-5">
                                <div class="sp-img_area">
                                    <div class="sp-img_slider-2 slick-img-slider hiraola-slick-slider arrow-type-two" data-slick-options='{
                                                        "slidesToShow": 1,
                                                        "arrows": false,
                                                        "fade": true,
                                                        "draggable": false,
                                                        "swipe": false,
                                                        "asNavFor": ".sp-img_slider-nav"
                                                        }'>
                                        <div class="single-slide red">
                                            <img src="admin/<?php echo $product_data["path1"]; ?>" alt="Hiraola's Product Image">
                                        </div>
                                        <div class="single-slide orange">
                                            <img src="admin/<?php echo $product_data["path2"]; ?>" alt="Hiraola's Product Image">
                                        </div>
                                        <div class="single-slide brown">
                                            <img src="admin/<?php echo $product_data["path3"]; ?>" alt="Hiraola's Product Image">
                                        </div>
                                        <div class="single-slide umber">
                                            <img src="admin/<?php echo $product_data["path4"]; ?>" alt="Hiraola's Product Image">
                                        </div>
                                    </div>
                                    <div class="sp-img_slider-nav slick-slider-nav hiraola-slick-slider arrow-type-two" data-slick-options='{
                                                        "slidesToShow": 4,
                                                        "asNavFor": ".sp-img_slider-2",
                                                        "focusOnSelect": true
                                                        }'>
                                        <div class="single-slide red">
                                            <img src="admin/<?php echo $product_data["path1"]; ?>" alt="Hiraola's Product Thumnail">
                                        </div>
                                        <div class="single-slide orange">
                                            <img src="admin/<?php echo $product_data["path2"]; ?>" alt="Hiraola's Product Thumnail">
                                        </div>
                                        <div class="single-slide brown">
                                            <img src="admin/<?php echo $product_data["path3"]; ?>" alt="Hiraola's Product Thumnail">
                                        </div>
                                        <div class="single-slide umber">
                                            <img src="admin/<?php echo $product_data["path4"]; ?>" alt="Hiraola's Product Thumnail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <div class="sp-content">
                                    <div class="sp-heading">
                                        <h5><a href="#"><?php echo $product_data["title"]; ?></a></h5>
                                    </div>
                                    <span class="reference"><?php echo $product_data["description"]; ?></span>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="fa fa-star-of-david"></i></li>
                                            <li><i class="fa fa-star-of-david"></i></li>
                                            <li><i class="fa fa-star-of-david"></i></li>
                                            <li><i class="fa fa-star-of-david"></i></li>
                                            <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                        </ul>
                                    </div>
                                    <div class="sp-essential_stuff">
                                        <ul>
                                            <li>Price: <span class="ic"><?php echo $product_data["price"]; ?> <?php echo $cryname["name"]; ?></span></li>
                                            <li>Model: <span class="ic"><?php echo $product_data["mname"]; ?> </span></li>
                                            <li>Category: <span class="ic"><?php echo $product_data["cname"]; ?> </span></li>
                                            <li>Product code: <span class="ic"><?php echo $product_data["uniq_id"]; ?> </span></li>
                                            <li>Availbility: <span class="ic"><?php echo $product_data["status"]; ?></span></li>
                                        </ul>
                                    </div>
                                    <!-- <div class="product-size_box">
                                        <span>Size</span>
                                        <select class="myniceselect nice-select">
                                            <option value="1">S</option>
                                            <option value="2">M</option>
                                            <option value="3">L</option>
                                            <option value="4">XL</option>
                                        </select>
                                    </div> -->
                                    <div class="color-list_area">
                                        <div class="color-list_heading">
                                            <h3>Legal documents</h3>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-6 col-lg-3">
                                                <label class="hiraola-btn_limerick" data-bs-toggle="modal" data-bs-target="#exampleModalCenter2"><i class="fa fa-eye"></i> View </label>
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <label class="hiraola-btn_limerick" data-bs-toggle="modal" data-bs-target="#exampleModalCenter3"><i class="bi bi-youtube"></i> Video</label>
                                            </div>
                                            <div class="col-12">
                                                <span class="qt"><i class="fa fa-info"></i> You can find related registered info of this item by scaning QR code in this certificate</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="0" max="10" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                    <div class="qty-btn_area">
                                        <ul>
                                            <li> <a href="https://api.whatsapp.com/send?phone=94759153103" style="display: inline-block; padding:16px; border-radius: 8px; background-color: #25D366; color: #fff; text-decoration: none; font-family: sans-serif; font-size: 16px;">Contact us on whatsapp</a></li>
                                            <!-- <li><a class="qty-compare_btn" href="compare.php" data-bs-toggle="tooltip" title="Compare This Product"><i class="ion-ios-shuffle-strong"></i></a></li> -->
                                        </ul>
                                    </div>
                                    <div class="hiraola-tag-line">
                                        <h6>Tags:</h6>
                                        <a href="javascript:void(0)">Ring</a>,
                                        <a href="javascript:void(0)">Necklaces</a>,
                                        <a href="javascript:void(0)">Ornaments</a>
                                    </div>
                                    <div class="hiraola-social_link">
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
                                            <li class="youtube">
                                                <a href="https://www.youtube.com" data-bs-toggle="tooltip" target="_blank" title="Youtube">
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li class="instagram">
                                                <a href="https://rss.com" data-bs-toggle="tooltip" target="_blank" title="Instagram">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hiraola's Single Product Variable Area End Here -->
            <?php
            // Review count here
            $re_crs = Database::search("SELECT COUNT(`id`) AS `re_count` FROM `product_reviews` WHERE `product_id`='" . $pid . "'");
            $re_cdata = $re_crs->fetch_assoc();
            // Item specs
            $item_spec_rs = Database::search("SELECT * FROM `product_specs` WHERE `product_id`='" . $pid . "'");
            $item_spec_n = $item_spec_rs->num_rows;
            // Product reviews
            $re_rs = Database::search("SELECT * FROM `product_reviews` WHERE `product_id`='" . $pid . "'");
            $re_n = $re_rs->num_rows;
            ?>
            <!-- Begin Hiraola's Single Product Tab Area -->
            <div class="hiraola-product-tab_area-2 sp-product-tab_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sp-product-tab_nav ">
                                <div class="product-tab">
                                    <ul class="nav product-menu">
                                        <li><a class="active" data-bs-toggle="tab" href="#description"><span>Description</span></a>
                                        </li>
                                        <li><a data-bs-toggle="tab" href="#specification"><span>Specification</span></a></li>
                                        <li><a data-bs-toggle="tab" href="#reviews"><span>Reviews (<?php echo $re_cdata["re_count"]; ?>)</span></a></li>
                                    </ul>
                                </div>
                                <div class="tab-content hiraola-tab_content">
                                    <div id="description" class="tab-pane active show" role="tabpanel">
                                        <div class="product-description">
                                            <ul>
                                                <li>
                                                    <strong>Karat Gold</strong>
                                                    <span>24K gold is called pure gold or fine gold. (99.99% pure) The color of fine
                                                        gold is a bright yellow with a bit of orange. Some say it is too soft for
                                                        jewelry application, but high karat gold is commonly worn in some parts of
                                                        the world, and it is growing in popularity in designer jewelry. Most will
                                                        prefer karat golds for their engagement rings, because of the needed
                                                        hardness to hold a gemstone.</span>
                                                </li>
                                                <li>
                                                    <strong>Gold Colors</strong>
                                                    <span>The most popular color is yellow which is made by adding silver and some
                                                        copper. The metals are melted together to form an alloy of the desired color
                                                        and karat. It is very important that all the ingredients are pure and that
                                                        the amounts of each are weighed very accurately to prevent porosity, which
                                                        weakens the alloy.</span>
                                                </li>
                                                <li>
                                                    <strong>White alloys</strong>
                                                    <span>There are two kinds of White Gold: Nickel based and Palladium based. Some
                                                        people are allergic to Nickel, so Palladium white gold is a good
                                                        alternative. Palladium white gold is the only legal alloy in Europe. It also
                                                        self burnishes and keeps a polish.</span>
                                                </li>
                                                <li>
                                                    <strong>The Most Expensive Diamond Color</strong>
                                                    <span>D colored diamonds are the rarest and most expensive of diamonds within
                                                        the D-Z scale. Certain fancy colored diamonds will command the highest
                                                        prices overall, and these will be discussed in separate tutorial. Many
                                                        people enjoy diamonds in the near colorless range G-J, as they find a
                                                        balance of size, clarity, and price to meet their needs.</span>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div id="specification" class="tab-pane" role="tabpanel">
                                        <div class="row">
                                            <div class="col-12 ">
                                                <?php
                                                if ($item_spec_n != null) {
                                                    $item_spec_data = $item_spec_rs->fetch_assoc();

                                                    $condition = $item_spec_data["condition"];
                                                    $quantity = $item_spec_data["quantity"];
                                                    $shape = $item_spec_data["shape"];
                                                    $color = $item_spec_data["color"];
                                                    $upc = $item_spec_data["upc"];
                                                    $brand = $item_spec_data["brand"];
                                                    $size = $item_spec_data["size"];
                                                    $country_mf = $item_spec_data["country_mf"];
                                                    $mpn = $item_spec_data["mpn"];
                                                ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <ul>
                                                                <li class="fw-bold d-inline-block">Condition :</li><span> <?php echo $condition ?></span><br />
                                                                <li class="fw-bold d-inline-block">Quantity :</li><span> <?php echo $quantity ?></span><br />
                                                                <li class="fw-bold d-inline-block">Shape :</li><span> <?php echo $shape ?></span><br />
                                                                <li class="fw-bold d-inline-block">Color :</li><span> <?php echo $color ?></span><br />
                                                                <li class="fw-bold d-inline-block">UPC :</li><span> <?php echo $upc ?></span><br />
                                                            </ul>
                                                        </div>
                                                        <div class="col-6">
                                                            <ul>
                                                                <li class="fw-bold d-inline-block">Brand :</li><span> <?php echo $brand ?></span><br />
                                                                <li class="fw-bold d-inline-block">Size :</li><span> <?php echo $size ?></span><br />
                                                                <li class="fw-bold d-inline-block">Country of manufacture :</li><span> <?php echo $country_mf ?></span><br />
                                                                <li class="fw-bold d-inline-block">MPN :</li><span> <?php echo $mpn ?></span><br />
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php
                                                } else {
                                                    require "404.php";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="reviews" class="tab-pane" role="tabpanel">
                                        <div class="tab-pane active" id="tab-review">
                                            <form class="form-horizontal" id="form-review">
                                                <div id="review">
                                                    <?php
                                                    for ($x = 0; $x < $re_n; $x++) {
                                                        $re_data = $re_rs->fetch_assoc();
                                                    ?>
                                                        <table class="table table-striped table-bordered">
                                                            <tbody>

                                                                <tr>
                                                                    <td style="width: 50%;"><strong><?php echo $re_data["username"] ?></strong></td>
                                                                    <td class="text-right"><?php echo $re_data["date"] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <p><?php echo $re_data["content"] ?></p>
                                                                        <div class="rating-box">
                                                                            <ul>
                                                                                <?php
                                                                                for ($i = 0; $i < $re_data["rating"]; $i++) {
                                                                                ?>
                                                                                    <li><i class="fa fa-star-of-david"></i></li>

                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <h2>Write a review</h2>
                                                <div class="form-group required">
                                                    <div class="col-sm-12 p-0">
                                                        <label>Your email <span class="required">*</span></label>
                                                        <input class="review-input" required id="re_email">
                                                    </div>
                                                </div>
                                                <div class="form-group required second-child">
                                                    <div class="col-sm-12 p-0">
                                                        <label class="control-label">Share your opinion</label>
                                                        <textarea class="review-textarea" name="con_message" id="re_content"></textarea>
                                                        <div class="help-block"><span class="text-danger">Note:</span> Language is not
                                                            translated! Please comment your review in English</div>
                                                    </div>
                                                </div>
                                                <div class="form-group last-child required">
                                                    <div class="col-sm-12 p-0">
                                                        <div class="your-opinion">
                                                            <label>Your Rating</label>
                                                            <span>
                                                                <select class="star-rating" id="re_value">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                </select>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="hiraola-btn-ps_right">
                                                        <a class="hiraola-btn hiraola-btn_dark" style="cursor: pointer;" onclick="re_submit(<?php echo $pid ?>);">Continue</a>
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
            <!-- Hiraola's Single Product Tab Area End Here -->
        <?php
        } else {
            require "404.php";
        }
        ?>


        <!-- Begin Hiraola's Product Area Two -->
        <div class="hiraola-product_area hiraola-product_area-2 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="hiraola-section_title">
                            <h4>Special Offer</h4>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <div class="hiraola-product_slider-3">
                            <?php
                            $offer_rs = Database::search("SELECT * FROM `product_offers` INNER JOIN `product` ON `product_offers`.`product_id`=`product`.`id` INNER JOIN `product_item` ON `product`.`id`=`product_item`.`product_id`  INNER JOIN `product_img` ON `product_item`.`id`=`product_img`.`product_item_id`");
                            $offer_n = $offer_rs->num_rows;

                            if ($offer_n != null) {

                                for ($x = 0; $x < $offer_n; $x++) {
                                    $offer_data = $offer_rs->fetch_assoc();
                            ?>

                                    <div class="slide-item">
                                        <div class="single_product">
                                            <div class="product-img">
                                                <a href="single-product-variable.php?id=<?php echo $offer_data["product_id"]; ?>">
                                                    <img class="primary-img" src="admin/<?php echo $offer_data["path1"] ?>" alt="Hiraola's Product Image">
                                                    <img class="secondary-img" src="admin/<?php echo $offer_data["path2"] ?>" alt="Hiraola's Product Image">
                                                </a>
                                                <span class="sticker"><?php echo $offer_data["title"] ?></span>
                                            </div>
                                            <div class="hiraola-product_content">
                                                <div class="product-desc_info">
                                                    <h6><a class="product-name" href="single-product-variable.php?id=<?php echo $offer_data["product_id"]; ?>"><?php echo $offer_data["title"] ?></a></h6>
                                                    <p><?php echo $offer_data["description"] ?></p>
                                                    <div class="price-box">
                                                        <span class="new-price">
                                                            <?php
                                                            $oldprice = $offer_data["price"];
                                                            $newprice = $oldprice - $offer_data["amount"];
                                                            ?>
                                                            <del><?php echo $oldprice ?> <?php echo $cryname["name"]; ?></del> <?php echo $newprice ?> <?php echo $cryname["name"]; ?>
                                                        </span>
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
                            } else {
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Product Area Two End Here -->

        <!-- Begin Hiraola's Product Area Two -->
        <div class="hiraola-product_area hiraola-product_area-2 section-space_add">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="hiraola-section_title">
                            <h4>Related Products</h4>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <div class="hiraola-product_slider-3">
                            <?php
                            $related_rs = Database::search("SELECT * FROM `product`  INNER JOIN `product_item` ON `product`.`id`=`product_item`.`product_id` INNER JOIN `product_img` ON `product_item`.`id`=`product_img`.`product_item_id` ");
                            $related_n = $related_rs->num_rows;

                            if ($related_n != null) {

                                for ($x = 0; $x < $related_n; $x++) {
                                    $related_data = $related_rs->fetch_assoc();
                            ?>

                                    <div class="slide-item">
                                        <div class="single_product">
                                            <div class="product-img">
                                                <a href="single-product-variable.php?id=<?php echo $related_data["product_id"]; ?>">
                                                    <img class="primary-img" src="admin/<?php echo $related_data["path1"] ?>" alt="Hiraola's Product Image">
                                                    <img class="secondary-img" src="admin/<?php echo $related_data["path2"] ?>" alt="Hiraola's Product Image">
                                                </a>
                                                <!-- <span class="sticker"><?php echo $offer_data["discription"] ?></span> -->
                                            </div>
                                            <div class="hiraola-product_content">
                                                <div class="product-desc_info">
                                                    <h6><a class="product-name" href="single-product-variable.php?id=<?php echo $related_data["product_id"]; ?>"><?php echo $related_data["title"] ?></a></h6>
                                                    <div class="price-box">
                                                        <span class="new-price">
                                                            <?php echo $newprice ?> <?php echo $cryname["name"]; ?>
                                                        </span>
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
                            } else {
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Product Area Two End Here -->

        <?php
        require "footer.php";
        ?>
        <!-- Begin Hiraola's Modal Area -->
        <div class="modal fade modal-wrapper" id="exampleModalCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area sp-area row">
                            <div class="col-lg-5 col-md-5">
                                <div class="sp-img_area">
                                    <div class="sp-img_slider-2 slick-img-slider hiraola-slick-slider arrow-type-two" data-slick-options='{
                                    "slidesToShow": 1,
                                    "arrows": false,
                                    "fade": true,
                                    "draggable": false,
                                    "swipe": false,
                                    "asNavFor": ".sp-img_slider-nav"
                                }'>
                                        <div class="single-slide red">
                                            <img src="assets/images/single-product/large-size/1.jpg" alt="Hiraola's Product Image">
                                        </div>
                                        <div class="single-slide orange">
                                            <img src="assets/images/single-product/large-size/2.jpg" alt="Hiraola's Product Image">
                                        </div>
                                        <div class="single-slide brown">
                                            <img src="assets/images/single-product/large-size/3.jpg" alt="Hiraola's Product Image">
                                        </div>
                                        <div class="single-slide umber">
                                            <img src="assets/images/single-product/large-size/4.jpg" alt="Hiraola's Product Image">
                                        </div>
                                    </div>
                                    <div class="sp-img_slider-nav slick-slider-nav hiraola-slick-slider arrow-type-two" data-slick-options='{
                                   "slidesToShow": 4,
                                    "asNavFor": ".sp-img_slider-2",
                                   "focusOnSelect": true
                                  }' data-slick-responsive='[
                                        {"breakpoint":1201, "settings": {"slidesToShow": 2}},
                                        {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                        {"breakpoint":577, "settings": {"slidesToShow": 3}},
                                        {"breakpoint":481, "settings": {"slidesToShow": 2}},
                                        {"breakpoint":321, "settings": {"slidesToShow": 2}}
                                    ]'>
                                        <div class="single-slide red">
                                            <img src="assets/images/single-product/small-size/1.jpg" alt="Hiraola's Product Thumnail">
                                        </div>
                                        <div class="single-slide orange">
                                            <img src="assets/images/single-product/small-size/2.jpg" alt="Hiraola's Product Thumnail">
                                        </div>
                                        <div class="single-slide brown">
                                            <img src="assets/images/single-product/small-size/3.jpg" alt="Hiraola's Product Thumnail">
                                        </div>
                                        <div class="single-slide umber">
                                            <img src="assets/images/single-product/small-size/4.jpg" alt="Hiraola's Product Thumnail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6 col-md-6">
                                <div class="sp-content">
                                    <div class="sp-heading">
                                        <h5><a href="#">Light Inverted Pendant Quis Justo Condimentum</a></h5>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="fa fa-star-of-david"></i></li>
                                            <li><i class="fa fa-star-of-david"></i></li>
                                            <li><i class="fa fa-star-of-david"></i></li>
                                            <li><i class="fa fa-star-of-david"></i></li>
                                            <li><i class="fa fa-star-of-david"></i></li>
                                        </ul>
                                    </div>
                                    <div class="price-box">
                                        <span class="new-price">£82.84</span>
                                        <span class="old-price">£93.68</span>
                                    </div>
                                    <div class="essential_stuff">
                                        <ul>
                                            <li>EX Tax:<span>£453.35</span></li>
                                            <li>Price in reward points:<span>400</span></li>
                                        </ul>
                                    </div>
                                    <div class="list-item">
                                        <ul>
                                            <li>10 or more £81.03</li>
                                            <li>20 or more £71.09</li>
                                            <li>30 or more £61.15</li>
                                        </ul>
                                    </div>
                                    <div class="list-item last-child">
                                        <ul>
                                            <li>Brand<a href="javascript:void(0)">Buxton</a></li>
                                            <li>Product Code: Product 15</li>
                                            <li>Reward Points: 100</li>
                                            <li>Availability: In Stock</li>
                                        </ul>
                                    </div>
                                    <div class="color-list_area">
                                        <div class="color-list_heading">
                                            <h4>Available Options</h4>
                                        </div>
                                        <span class="sub-title">Color</span>
                                        <div class="color-list">
                                            <a href="javascript:void(0)" class="single-color active" data-swatch-color="red">
                                                <span class="bg-red_color"></span>
                                                <span class="color-text">Red (+£3.61)</span>
                                            </a>
                                            <a href="javascript:void(0)" class="single-color" data-swatch-color="orange">
                                                <span class="burnt-orange_color"></span>
                                                <span class="color-text">Orange (+£2.71)</span>
                                            </a>
                                            <a href="javascript:void(0)" class="single-color" data-swatch-color="brown">
                                                <span class="brown_color"></span>
                                                <span class="color-text">Brown (+£0.90)</span>
                                            </a>
                                            <a href="javascript:void(0)" class="single-color" data-swatch-color="umber">
                                                <span class="raw-umber_color"></span>
                                                <span class="color-text">Umber (+£1.81)</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="1" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                    <div class="hiraola-group_btn">
                                        <ul>
                                            <li><a href="cart.html" class="add-to_cart">Cart To Cart</a></li>
                                            <li><a href="cart.html"><i class="ion-android-favorite-outline"></i></a></li>
                                            <li><a href="cart.html"><i class="ion-ios-shuffle-strong"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="hiraola-tag-line">
                                        <h6>Tags:</h6>
                                        <a href="javascript:void(0)">Ring</a>,
                                        <a href="javascript:void(0)">Necklaces</a>,
                                        <a href="javascript:void(0)">Braid</a>
                                    </div>
                                    <div class="hiraola-social_link">
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
                                            <li class="youtube">
                                                <a href="https://www.youtube.com" data-bs-toggle="tooltip" target="_blank" title="Youtube">
                                                    <i class="fab fa-youtube"></i>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Modal Area End Here -->


        <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- print view documents -->
        <div class="modal fade modal-wrapper" id="exampleModalCenter2">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <!-- Begin Hiraola's Single Product Variable Area -->
                        <div class="sp-area">
                            <div class="container">
                                <div class="sp-nav">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="sp-img_area">
                                                <div class="sp-img_slider-2 slick-img-slider hiraola-slick-slider arrow-type-two" data-slick-options='{
                                                        "slidesToShow": 1,
                                                        "arrows": false,
                                                        "fade": true,
                                                        "draggable": false,
                                                        "swipe": false,
                                                        "asNavFor": ".sp-img_slider-nav"
                                                        }'>
                                                    <div class="single-slide red">
                                                        <img src="<?php echo $product_data["path1"]; ?>" alt="Hiraola's Product Image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7">
                                            <div class="sp-content">
                                                <div class="sp-heading">
                                                    <h5><a href="#"><?php echo $product_data["title"]; ?></a></h5>
                                                </div>
                                                <span class="reference"><?php echo $product_data["description"]; ?></span>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star-of-david"></i></li>
                                                        <li><i class="fa fa-star-of-david"></i></li>
                                                        <li><i class="fa fa-star-of-david"></i></li>
                                                        <li><i class="fa fa-star-of-david"></i></li>
                                                        <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="sp-essential_stuff">
                                                    <ul>
                                                        <li>Price: <span class="ic"><?php echo $product_data["price"]; ?> <?php echo $cryname["name"]; ?></span></li>
                                                        <li>Model: <span class="ic"><?php echo $product_data["mname"]; ?> </span></li>
                                                        <li>Category: <span class="ic"><?php echo $product_data["cname"]; ?> </span></li>
                                                        <li>Product code: <span class="ic"><?php echo $product_data["uniq_id"]; ?> </span></li>
                                                        <li>Availbility: <span class="ic"><?php echo $product_data["status"]; ?></span></li>
                                                    </ul>
                                                </div>
                                                <div class="color-list_area">
                                                    <div class="row g-2">
                                                        <div class="col-12">
                                                            <span class="qt"><i class="fa fa-info"></i> You can find related registered info of this item by scaning QR code in this certificate</span>
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
            </div>
        </div>


        <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->





        <!-- //////////////////////////////////////////////////////VIDEO EMBERD/////////////////////////////////////////////////////////// -->
        <div class="modal fade modal-wrapper" id="exampleModalCenter3">
            <div class="modal-dialog modal-dialog-centered col-12" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <!-- Begin Hiraola's Single Product Variable Area -->
                        <div class="sp-area">
                            <div class="container">
                                <div class="sp-nav">
                                    <div class="row text-center">
                                        <div class="col-12 col-md-5">
                                            <iframe width="720" height="480" src="<?php echo $product_data["video_path"]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /////////////////////////////////////////////////////////////VIDEO EMBERD//////////////////////////////////////////////////// -->

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>