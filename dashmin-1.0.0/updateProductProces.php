<?php
session_start();

require "connection.php";

if (isset($_POST["id"])) {
    $pid = $_POST["id"];
    $category = $_POST["category"];
    $color = $_POST["color"];
    $model = $_POST["model"];
    $title = $_POST["title"];
    $qty = (int)$_POST["qty"];
    $price = (int)$_POST["price"];
    $description = $_POST["des"];

    $link = $_POST["link"];

    // if (isset($_FILES["img"])) {
    //     $image = $_FILES["img"];
    // } else {
    // }

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");


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
        $product0 = Database::search("SELECT * FROM product INNER JOIN model_has_category ON product.model_has_category_id=model_has_category.id
        INNER JOIN model ON model_has_category.model_id=model.id
        INNER JOIN category ON model_has_category.category_id=category.id
        INNER JOIN product_item ON product_item.product_id=product.id
        INNER JOIN color ON product_item.color_id=color.id
        INNER JOIN product_img ON product_img.product_item_id=product_item.id WHERE  `product_id`='" . $pid . "' ");

        $item_data = $product0->fetch_assoc();


        Database::iud("UPDATE `model_has_category` SET `model_id`='" . $model . "',`category_id`='" . $category . "' WHERE `id`='" . $item_data["model_has_category_id"] . "'  ");

        Database::iud("UPDATE `product` SET `title`='" . $title . "' ,`description`='" . $description . "' WHERE  `id`='" . $pid . "' ");

        Database::iud("UPDATE `product_item` SET `color_id`='" . $color . "' ,`qty`='" . $qty . "',`price`='" . $price . "',`date`='" . $date . "' WHERE  `product_id`='" . $pid . "' ");



        if (isset($_FILES["img"])) {
            $imageFile = $_FILES["img"];
            $fileName = "resources//Item//" . uniqid() . ".png";
            move_uploaded_file($imageFile["tmp_name"], $fileName);
        } else {
            $fileName = $item_data["path1"];
        }

        if (isset($_FILES["img2"])) {
            $imageFile2 = $_FILES["img2"];
            $fileName2 = "resources//Item//" . uniqid() . ".png";
            move_uploaded_file($imageFile2["tmp_name"], $fileName2);
        } else {
            $fileName2 = $item_data["path2"];
        }

        if (isset($_FILES["img3"])) {
            $imageFile3 = $_FILES["img3"];
            $fileName3 = "resources//Item//" . uniqid() . ".png";
            move_uploaded_file($imageFile3["tmp_name"], $fileName3);
        } else {
            $fileName3 = $item_data["path3"];
        }

        if (isset($_FILES["img4"])) {
            $imageFile4 = $_FILES["img4"];
            $fileName4 = "resources//Item//" . uniqid() . ".png";
            move_uploaded_file($imageFile4["tmp_name"], $fileName4);
        } else {
            $fileName4 = $item_data["path4"];
        }

        if (isset($_FILES["img5"])) {
            $imageFile5 = $_FILES["img5"];
            $fileName5 = "resources//Item//" . uniqid() . ".png";
            move_uploaded_file($imageFile5["tmp_name"], $fileName5);
        } else {
            $fileName5 = $item_data["path5"];
        }

        $itemId2 = Database::search("SELECT `id` FROM `product_item` WHERE `product_id`='" . $pid . "'");
        $iT = $itemId2->fetch_assoc();
        $itemID = $iT["id"];

        Database::iud("UPDATE `product_img` SET `path1`='" . $fileName . "' ,`path2`='" . $fileName2 . "',`path3`='" . $fileName3 . "',`path4`='" . $fileName4 . "',`path5`='" . $fileName5 . "',`video_path`='" . $link . "' WHERE `product_item_id`='" . $itemID . "' ");



        $product = Database::search("SELECT * FROM product INNER JOIN model_has_category ON product.model_has_category_id=model_has_category.id
        INNER JOIN model ON model_has_category.model_id=model.id
        INNER JOIN category ON model_has_category.category_id=category.id
        INNER JOIN product_item ON product_item.product_id=product.id
        INNER JOIN color ON product_item.color_id=color.id
        INNER JOIN product_img ON product_img.product_item_id=product_item.id WHERE  `product_id`='" . $pid . "' ");

        $n = $product->num_rows;

        if ($n == 1) {
            $row = $product->fetch_assoc();

            $_SESSION["p"] = $row;
            echo "Product updated successfully";
        } else {
            echo "Error";
        }
    }
} else {
    echo "Product Does not Exit";
}
