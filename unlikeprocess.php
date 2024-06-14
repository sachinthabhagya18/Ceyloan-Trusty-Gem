<?php

session_start();
require "connection.php";


if ($_GET["id"]) {
    $id = $_GET["id"];

    if (isset($_SESSION["u"])) {
        $userid = $_SESSION["u"]["id"];

        $unlikes = Database::search("SELECT * FROM `like_unlike` WHERE `user_id`='" . $userid . "' AND `blog_id`='" . $id . "' AND `blog_status_id`='1';");
        $unlikesnr = $unlikes->num_rows;

        if ($unlikesnr == 1) {
            Database::iud("UPDATE `like_unlike` SET `blog_status_id`='2' WHERE `user_id`='" . $userid . "' AND `blog_id`='" . $id . "';");
            
        }

        $likes = Database::search("SELECT * FROM `like_unlike` WHERE `user_id`='" . $userid . "' AND `blog_id`='" . $id . "' AND `blog_status_id`='2';");
        $likesnr = $likes->num_rows;

        if ($likesnr == 1) {
            echo "Unliked";
        } else {
            Database::iud("INSERT INTO `like_unlike`(`user_id`,`blog_id`,`blog_status_id`) VALUES('" . $userid . "','" . $id . "','2');");
            echo "Unliked";
        }

        
    } else {
        echo "Please login to your account";
    }
} else {
    echo "A wrong action";
}
