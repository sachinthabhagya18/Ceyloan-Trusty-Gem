<?php
session_start();

require "connection.php";

$category = $_POST["category"];
$color = $_POST["color"];
$model = $_POST["model"];
$title = $_POST["title"];
$qty = (int)$_POST["qty"];
$price = (int)$_POST["price"];
$description = $_POST["des"];
$link = $_POST["link"];
// $imageFile = $_FILES["img"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$state = 1;

// $useremail = $_SESSION["u"]["email"];
if (empty($title)) {
    echo "Please Add a Title.";
} else if (strlen($title) > 100) {
    echo "Title Must Contain 100 or Less than 100 Characters.";
} else if ($qty == "0" || $qty == "e") {
    echo "Please Add the Quantity of Your Item.";
} else if (!is_int($qty)) {
    echo "Please Add a Valid Quantity";
} else if (empty($qty)) {
    echo "Please Add the Quantity of your Item";
} else if ($qty < 0) {
    echo "Please Add a Valid Quantity";
} else if (empty($price)) {
    echo "Please insert the price of your product";
} else if (!is_int($price)) {
    echo "Please insert a valid price";
} else if ($category == "0") {
    echo "Please Select a Category";
} else if ($model == "0") {
    echo "Please Select a Model";
} else if ($color == "0") {
    echo "Please Select a color";
} else if (empty($description)) {
    echo "Please enter the description of your Item";
} else {
    $modelHasBrand = Database::search("SELECT `id` FROM `model_has_category` WHERE `category_id`='" . $category . "' AND `model_id`='" . $model . "' ");

    if ($modelHasBrand->num_rows == 0) {
        echo "The Product Doesn't Exist";
    } else {
        $f = $modelHasBrand->fetch_assoc();
        $modelHasCategoryID = $f["id"];

        $uid = "Item" . uniqid();

        Database::iud("INSERT INTO `product`(`model_has_category_id`,`title`,`description`,`uniq_id`,`product_status_id`) 
        VALUES('" . $modelHasCategoryID . "','" . $title . "','" . $description . "','" . $uid . "','1')");

        $itemId2 = Database::search("SELECT `id` FROM `product` WHERE `uniq_id`='" . $uid . "' AND `title`='" . $title . "' ");
        $iT = $itemId2->fetch_assoc();
        $itemID = $iT["id"];


        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");



        Database::iud("INSERT INTO `product_item`(`product_id`,`color_id`,`qty`,`price`,`date`) 
        VALUES('" . $itemID . "','" . $color . "','" . $qty . "','" . $price . "','" . $date . "')");


       // echo "Product added successfully";

        $last_id = Database::$connection->insert_id;


        $imageFile = $_FILES["img"];
        if (isset($_FILES["img"])) {
            $fileName = "resources//Item//" . uniqid() . ".png";
            move_uploaded_file($imageFile["tmp_name"], $fileName);
        } else {
            echo "Please select an image";
        }


        if (isset($_FILES["img2"])) {
            $imageFile2 = $_FILES["img2"];
            $fileName2 = "resources//Item//" . uniqid() . ".png";
            move_uploaded_file($imageFile2["tmp_name"], $fileName2);
        } else {
            $fileName2 = "img//cam.svg";
        }


        if (isset($_FILES["img3"])) {

            $imageFile3 = $_FILES["img3"];
            $fileName3 = "resources//Item//" . uniqid() . ".png";
            move_uploaded_file($imageFile3["tmp_name"], $fileName3);
        } else {
            $fileName3 = "img//cam.svg";
        }


        if (isset($_FILES["img4"])) {
            $imageFile4 = $_FILES["img4"];
            $fileName4 = "resources//Item//" . uniqid() . ".png";
            move_uploaded_file($imageFile4["tmp_name"], $fileName4);
        } else {
            $fileName4 = "img//cam.svg";
        }


        if (isset($_FILES["img5"])) {

            $imageFile5 = $_FILES["img5"];
            $fileName5 = "resources//Item//" . uniqid() . ".png";
            move_uploaded_file($imageFile5["tmp_name"], $fileName5);
        } else {
            $fileName5 = "img//cam.svg";
        }

        Database::iud("INSERT INTO `product_img`(`path1`,`product_item_id`,`path2`,`path3`,`path4`,`path5`,`video_path`) VALUES('" . $fileName . "','" . $last_id . "','" . $fileName2 . "','" . $fileName3 . "','" . $fileName4 . "','" . $fileName5 . "','".$link."' ) ");
      echo  "Product added successfully";
    }
}
