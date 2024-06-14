<?php

session_start();

require "connection.php";


$id = $_GET["id"];


$product = Database::search("SELECT * FROM product INNER JOIN model_has_category ON product.model_has_category_id=model_has_category.id
INNER JOIN model ON model_has_category.model_id=model.id
INNER JOIN category ON model_has_category.category_id=category.id
INNER JOIN product_item ON product_item.product_id=product.id
INNER JOIN color ON product_item.color_id=color.id
INNER JOIN product_img ON product_img.product_item_id=product_item.id  WHERE `product_id`='".$id."' ");

$n =$product->num_rows;

if($n == 1){
    $row = $product->fetch_assoc();

    $_SESSION["p"] = $row;

    echo "success";

} else {
    echo "Error";
}

?>