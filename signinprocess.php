<?php

session_start();

require "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rm = $_POST["rm"];

if (empty($email)) {
    echo "Please enter your email";
} else if (empty($password)) {
    echo "Please enter your password";
} else {

    $rs1 = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "'");
    if ($rs1->num_rows == 1) {

        $d = $rs1->fetch_assoc();
        //user session details
        $_SESSION["u"] = $d;

        if ($rm == "true") {

            setcookie("e", $email, time() + (60 * 60 * 24 * 365));
            setcookie("p", $password, time() + (60 * 60 * 24 * 365));

        } else {
            setcookie("e", "", -1);
            setcookie("p", "", -1);
        }

        echo "1";

    } else {
        echo "Invalid Email or Password";
    }
}

?>
