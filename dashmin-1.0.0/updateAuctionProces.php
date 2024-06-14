<?php
session_start();

require "connection.php";

if (isset($_POST["id"])) {
    $pid = $_POST["id"];

    $price = $_POST["price"];
    $exdate = $_POST["date"];

    //  echo $exdate;
    $today = date("Y-m-d");
    // if (isset($_FILES["img"])) {
    //     $image = $_FILES["img"];
    // } else {
    // }

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");


    if (empty($exdate)) {
        echo "Please Add a Expire Date.";
    } elseif ($exdate <= $today) {
        echo "Please Add a Valid Date.";
    } else {
        $product = Database::search("SELECT * FROM `auction`  WHERE  `product_item_id`='" . $pid . "' ");
        $n = $product->num_rows;
        if ($n == 1) {
            $row = $product->fetch_assoc();
            Database::iud("UPDATE `auction` SET `added_datetime`='" . $date . "' ,`expire_datetime`='" . $exdate . "',`beginning_price`='" . $price . "' WHERE `auction`.`id`='" . $row["auction_id"] . "' ");
        } else {
            Database::iud("INSERT INTO `auction`(`product_item_id`,`added_datetime`,`expire_datetime`,`beginning_price`,`auction_status_id`) 
            VALUES('" . $pid . "','" . $date . "','" . $exdate . "','" . $price . "','1')");
        }




        $product2 = Database::search("SELECT  *
        FROM `auction` WHERE  `product_item_id`='" . $pid . "' ");

        $n2 = $product2->num_rows;

        if ($n2 == 1) {
            $row2 = $product2->fetch_assoc();

            $_SESSION["au"] = $row2;
            echo "Product updated successfully";
        } else {
            echo "Error";
        }
    }
} else {
    echo "Product Does not Exit";
}
