<?php
session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $fname = $_POST["f"];
    $lname = $_POST["l"];
    $mobile = $_POST["m"];
    $line1 = $_POST["a1"];
    $line2 = $_POST["a2"];
    $country = $_POST["c"];
    $pc = $_POST["pc"];

    if (isset($_FILES["i"])) {
        $image = $_FILES["i"];
    } else {
    }
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");
    // validate
    if (empty($fname)) {
        echo "Please Enter Your First Name";
    } elseif (empty($lname)) {
        echo "Please Enter Your Last Name";
    } else if (empty($mobile)) {
        echo "Please Enter Your Mobile Number";
    } else if (strlen($mobile) != 10) {
        echo "Please enter 10 digit mobile number";
    } else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile) == 0) {
        echo "Invalid mobile number";
    } else if ($country == "0") {
        echo "Please Select a country";
    } else if (empty($pc)) {
        echo "Please Enter Postal Code";
    } else {

        Database::iud("UPDATE `user` SET 
        `fname`='" . $fname . "',
        `lname`='" . $lname . "',
        `mobile`='" . $mobile . "',
        `registered_date`='" . $date . "'
         WHERE `email`='" . $_SESSION["u"]["email"] . "' ");

        $resultset = Database::search("SELECT * FROM `user` WHERE `email`='" . $_SESSION["u"]["email"] . "' ");

        $details = $resultset->fetch_assoc();
        $_SESSION["u"] = $details;

        $resultset = Database::search("SELECT * FROM `address` WHERE `user_id`='" . $_SESSION["u"]["id"] . "' ");
        $nr = $resultset->num_rows;
        if ($nr == 1) {

            Database::iud("UPDATE `address` SET `line1`='" . $line1 . "',`line2`='" . $line2 . "',`country_id`='" . $country . "',`postal_code`='" . $pc . "' WHERE `user_id`='" . $_SESSION["u"]["id"] . "'  ");
        } else {

            Database::iud("INSERT INTO `address` (`user_id`,`line1`,`line2`,`country_id`,`postal_code`) VALUES 
        ('" . $_SESSION["u"]["id"] . "','" . $line1 . "','" . $line1 . "','" . $country . "','" . $pc . "') ");
        }


        $resultProfileImg = Database::search("SELECT * FROM `profile_img` WHERE `user_id`='" . $_SESSION["u"]["id"] . "'  ");
        $pror = $resultProfileImg->num_rows;

        if ($pror == 1) {


            if (isset($_FILES["i"])) {
                $allowed_image_extention = array("image/jpeg", "image/jpg", "image/png", "image/svg");
                $file_extention = $image["type"];

                if (!in_array($file_extention, $allowed_image_extention)) {
                    echo "Please Select a valid image.";
                } else {

                    $newimgextention;
                    if ($file_extention = "image/jpeg") {
                        $newimgextention = ".jpeg";
                    } elseif ($file_extention = "image/jpg") {
                        $newimgextention = ".jpg";
                    } elseif ($file_extention = "image/png") {
                        $newimgextention = ".png";
                    } elseif ($file_extention = "image/svg") {
                        $newimgextention = ".svg";
                    }

                    $filename = "profileimg//" . uniqid() . $newimgextention;

                    move_uploaded_file($image["tmp_name"], $filename);

                    Database::iud("UPDATE `profile_img` SET `img_path`='" . $filename . "' WHERE `user_id`='" . $_SESSION["u"]["id"] . "'  ");
                }
            }
        } else {

            if (isset($_FILES["i"])) {
                $allowed_image_extention = array("image/jpeg", "image/jpg", "image/png", "image/svg");
                $file_extention = $image["type"];

                if (!in_array($file_extention, $allowed_image_extention)) {
                    echo "Please Select a valid image.";
                } else {

                    $newimgextention;
                    if ($file_extention = "image/jpeg") {
                        $newimgextention = ".jpeg";
                    } elseif ($file_extention = "image/jpg") {
                        $newimgextention = ".jpg";
                    } elseif ($file_extention = "image/png") {
                        $newimgextention = ".png";
                    } elseif ($file_extention = "image/svg") {
                        $newimgextention = ".svg";
                    }

                    $filename = "profileimg//" . uniqid() . $newimgextention;

                    move_uploaded_file($image["tmp_name"], $filename);

                    Database::iud("INSERT INTO `profile_img` (`img_path`,`user_id`) VALUES ('" . $filename . "','" . $_SESSION["u"]["id"] . "') ");
                }
            }
        }
    }
    echo "Update SuccessFully";
} else {

    echo "Update (Error) Please Check";
}
