<?php
require "connection.php";

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$msg = $_POST["msg"];
$status="1";
// echo preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/",$mobile);

if (empty($name)) {
    echo"Please enter your Name";
} else if (empty($email)) {
    echo"Please Enter your email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo"Invalide email address";
} else if (strlen($email) > 100) {
    echo"Email must be less than 100 characters";
} else if (empty($subject)) {
    echo"Please enter your subject";
} else if (empty($msg)) {
    echo"Please enter your Massage";
} else {

    $r = Database::search("SELECT * FROM `contact` WHERE `email`='".$email."'");
    if ($r->num_rows > 0) {
        echo "User with the same email address already exsist";
    }


    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO contact (`name`,`email`,`subject`,`msg`,`date`) VALUES 
    ('".$name."','".$email."','".$subject."','".$msg."','".$date."')");
    echo "Success";

}

?>