<?php

require "connection.php";

if (isset($_POST["id"])) {


    $id = $_POST["id"];

    $productrs = Database::search("SELECT * FROM `product_offers` WHERE `product_id`='" . $id . "' ");
    $num = $productrs->num_rows;

    if ($num == 1) {
        $row = $productrs->fetch_assoc();
        $ps = $row["status"];

        if ($ps == "1") {
            Database::iud("UPDATE `product_offers` SET `status`='2' WHERE `product_id`='" . $id . "' ");
            echo "success1";
        } else {
            Database::iud("UPDATE `product_offers` SET `status`='1' WHERE `product_id`='" . $id . "' ");
            echo "success2";
        }
    }
}
