<?php
session_start();

require "connection.php";

if (isset($_POST["id"])) {
    $pid = $_POST["id"];
    $amount = $_POST["amount"];
    $description = $_POST["des"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");


    if (empty($amount)) {
        echo "Please Add a amount.";
    } else if (empty($description)) {
        echo "Please enter the description of your Item";
    } else {
        $product0 = Database::search("SELECT * FROM product_offers  WHERE product_id='" . $pid . "' ");
        $n2 = $product0->num_rows;
        if ($n2 == 1) {
            Database::iud("UPDATE `product_offers` SET `amount`='" . $amount . "',`discription`='" . $description . "' WHERE `product_id`='" . $pid . "'  ");
          
        } else {
            Database::iud("INSERT INTO `product_offers`(`product_id`,`amount`,`discription`) 
            VALUES('" . $pid . "','" . $amount . "','" . $description . "')");
        }

        echo "Product updated successfully";

        $product = Database::search("SELECT * FROM product_offers INNER JOIN product ON product_offers.product_id=product.id
        INNER JOIN product_item ON product_item.product_id=product.id WHERE product.id='" . $pid . "' ");

        $n = $product->num_rows;

        if ($n == 1) {
            $row = $product->fetch_assoc();

            $_SESSION["pr"] = $row;
        
        } else {
            echo "Error";
        }
    }
} else {
    echo "Product Does not Exit";
}
