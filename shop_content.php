<?php
require "connection.php";
$page = $_GET["p"];
$currency = Database::search("SELECT * FROM `currency`  WHERE `status_id`='1'");
$cryname = $currency->fetch_assoc();

$offset = 12 * ($page - 1);
$resultset = Database::search("SELECT * FROM `product` INNER JOIN `model_has_category` ON `product`.`model_has_category_id`=`model_has_category`.`id` INNER JOIN `category` ON `model_has_category`.`category_id`=`category`.`id` INNER JOIN `product_item` ON `product`.`id`=`product_item`.`product_id`
INNER JOIN `product_img` ON `product_item`.`id`=`product_img`.`product_item_id` WHERE product.product_status_id='1'  LIMIT 12 OFFSET " . $offset . ";");
for ($x = 0; $x < 12; $x++) {
    $data = $resultset->fetch_assoc();
    if ($data != null) {
?>
        <div class="col-lg-4">
            <div class="slide-item">
                <div class="single_product">
                    <div class="product-img">
                        <a href="single-product-variable.php?id=<?php echo $data["product_id"]; ?>">
                            <img class="primary-img" src="admin/<?php echo $data["path1"] ?>" alt="Hiraola's Product Image">
                            <img class="secondary-img" src="admin/<?php echo $data["path2"] ?>" alt="Hiraola's Product Image">
                        </a>
                    </div>
                    <div class="hiraola-product_content">
                        <div class="product-desc_info">
                            <h6><a class="product-name" ><?php echo $data["title"] ?></a></h6>
                            <div class="price-box">
                                <span class="new-price"><?php echo $data["price"] ?> <?php echo $cryname["name"]; ?></span>
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
                        <a href="single-product-variable.php?id=<?php echo $data["product_id"]; ?>">
                            <img class="primary-img" src="<?php echo $data["path1"] ?>" alt="Hiraola's Product Image">
                            <img class="secondary-img" src="<?php echo $data["path2"] ?>" alt="Hiraola's Product Image">
                        </a>
                    </div>
                    <div class="hiraola-product_content">
                        <div class="product-desc_info">
                            <h6><a class="product-name"><?php echo $data["title"] ?></a></h6>
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
                                <span class="new-price"><?php echo $data["price"] ?> <?php echo $cryname["name"]; ?></span>
                            </div>
                            <div class="product-short_desc">
                                <p><?php echo $data["description"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
?>
<?php
$resultset = Database::search("SELECT * FROM `product` ;");
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
                            <li> <a onclick="m1(<?php echo $page - 1; ?>)">Previouse</a></li>
                        <?php
                        }
                        ?>

                        <?php
                        for ($i = 1; $i <= $t2; $i++) {

                            if ($i == $page) {
                        ?>
                                <li><a onclick="m1(<?php echo $i; ?>)"><?php echo $i; ?></a></li>
                            <?php
                            } else {
                            ?>
                                <li> <a onclick="m1(<?php echo $i; ?>)"><?php echo $i; ?></a></li>

                        <?php
                            }
                        }
                        ?>
                        <?php
                        if ($page != $t2) {
                        ?>
                            <li> <a onclick="m1(<?php echo $page + 1; ?>)">Next</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="product-select-box">
                        <div class="product-short">
                            <?php
                            $count = Database::search("SELECT COUNT(`product`.`id`) AS `product_count` FROM `product`");
                            $count_data = $count->fetch_assoc();
                            $max = $count_data["product_count"];
                            ?>
                            <p>Showing 1–12 of <?php echo $max; ?> Products</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>