<?php
session_start();
require "connection.php";

$np = $_POST["np"];

if(isset($_SESSION["vc"])){
    $vc = $_SESSION["vc"];
}

if(empty($np)){
    echo "Enter your new password";
}else if (strlen($np) < 7 || strlen($np) > 20) {
    echo "Password length must between 7 to 20";
} else if (!preg_match("/[A-z]+[a-z]+[0-9]+/", $np)) {
    echo "Your password must contain Capital letters,Simple letters and Numbers";
}else{

    $rs = Database::search("SELECT * FROM `verification` WHERE `code` = '".$vc."'");
    if($rs->num_rows>0){
        $d = $rs->fetch_assoc();
        $uid = $d["user_id"];

        Database::iud("UPDATE `user` SET `password` = '".$np."' WHERE `id` = '".$uid."'");
        session_destroy();
        echo "1";

    }

}

?>