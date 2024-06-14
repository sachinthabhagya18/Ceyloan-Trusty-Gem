<?php

session_start();
require "connection.php";

$vc = $_POST["vc"];

if(empty($vc)){
    echo "Please enter your verification code";
}else{

    $rs = Database::search("SELECT * FROM `verification` WHERE `code` = '".$vc."'");
    if($rs->num_rows == 1){

        $_SESSION["vc"] = $vc;
        echo "1";

    }else{
        echo "Invalid verification code";
    }

}

?>