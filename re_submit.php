<?php
session_start();
require "connection.php";

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
} else {
    $user = "";
}

$email = $_POST["email"];
$content = $_POST["content"];
$star = $_POST["star"];
$pid = $_POST["pid"];

//date
$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$todaydate = $d->format("Y-m-d");

if ($user == "") {
    echo "You must login before comment your idea...";
} else if ($email == "") {
    echo "Please enter your email...";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please enter valid email...";
} else if ($content == null) {
    echo "Please review your idea...";
} else if ($star == null) {
    echo "Please rate the product...";
} else {

    $rs_user = Database::search("SELECT * FROM `user` INNER JOIN `invoice` ON `user`.`id`=`invoice`.`user_id` WHERE `email`='" . $email . "'");
    $rs_user_n = $rs_user->num_rows;
    if ($rs_user_n != null) {
        Database::iud("INSERT INTO `product_reviews`(`product_id`,`username`,`content`,`rating`,`date`)VALUES('" . $pid . "','Bihanga','" . $content . "','" . $star . "','" . $todaydate . "')");
        echo "1";
    } else {
        echo "0";
    }
}
