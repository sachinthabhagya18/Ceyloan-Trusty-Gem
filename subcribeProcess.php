<?php
require "connection.php";

$email = $_POST["email"];

if (empty($email)) {
    echo "Please Enter your email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalide email address";
} else if (strlen($email) > 100) {
    echo "Email must be less than 100 characters";
} else {

    $r = Database::search("SELECT * FROM `subcribers` WHERE `email`='" . $email . "'");
    if ($r->num_rows > 0) {
        echo "User with the same email address already exsist";
    }


    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO subcribers (`email`,`date`) VALUES 
    ('" . $email . "','" . $date . "')");
    echo "Success";
}
