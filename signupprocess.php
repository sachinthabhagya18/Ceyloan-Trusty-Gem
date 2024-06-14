<?php

require "connection.php";

$fn = $_POST["fn"];
$ln = $_POST["ln"];
$e = $_POST["e"];
$m = $_POST["m"];
$p = $_POST["p"];
$cp = $_POST["cp"];

if (empty($fn)) {
    echo "Please enter your Firstname";
} else if (empty($ln)) {
    echo "Please enter your Lastname";
} else if (empty($e)) {
    echo "Please enter your Email";
} else if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email";
} else if (empty($m)) {
    echo "Please enter your Mobile";
} else if (strlen($m) != 10) {
    echo "Please use 10 digit mobile nomber";
} else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $m) == 0) {
    echo "Invalid mobile nomber";
} else if (empty($p)) {
    echo "Please enter your password";
} else if (strlen($p) < 8 || strlen($p) > 20) {
    echo "Password length must between 8 to 20";
} else if (!preg_match("/[A-z]+[a-z]+[0-9]+/", $p)) {
    echo "Your password must contain Capital letters,Simple letters and Numbers";
} else if (empty($cp)) {
    echo "Please confirm your Password";
} else if ($p != $cp) {
    echo "Passwords are not similar";
} else {

    $rs1 = Database::search("SELECT * FROM `user` WHERE `email` = '" . $e . "' OR `mobile` = '" . $m . "'");
    if ($rs1->num_rows > 0) {
        echo "This user already exists";
    } else {
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user`(`fname`,`lname`,`email`,`password`,`mobile`,`registered_date`,`user_type_id`,`user_status_id`) 
        VALUES('" . $fn . "','" . $ln . "','" . $e . "','" . $p . "','" . $m . "','" . $date . "','2','1')");
        $user_rs = Database::search("SELECT * FROM `user` WHERE `fname`='" . $fn . "' AND `email`='" . $e . "' AND `password`='" . $p . "' ");
        $user_data = $user_rs->fetch_assoc();
        Database::iud("INSERT INTO `profile_img`(`user_id`) VALUES('" . $user_data["id"] . "')");

        echo "Register Successful";
    }
}
