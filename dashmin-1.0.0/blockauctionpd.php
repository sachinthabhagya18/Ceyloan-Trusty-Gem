<?php

require "connection.php";

if (isset($_POST["id"])) {


    $id = $_POST["id"];

    $productrs = Database::search("SELECT * FROM `auction` WHERE `id`='" . $id . "' ");
    $num = $productrs->num_rows;

    if ($num == 1) {
        $row = $productrs->fetch_assoc();
        $ps = $row["auction_status_id"];

        if ($ps == "1") {
            Database::iud("UPDATE `auction` SET `auction_status_id`='2' WHERE `id`='" . $id . "' ");
            echo "success1";
        } else {
            Database::iud("UPDATE `auction` SET `auction_status_id`='1' WHERE `id`='" . $id . "' ");
            echo "success2";
        }
    }
}
