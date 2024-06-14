<?php
session_start();

require "connection.php";

if (isset($_POST["id"])) {
    $pid = $_POST["id"];
    $title = $_POST["title"];
    $p1 = $_POST["p1"];
    $p2 = $_POST["p2"];
    $note = $_POST["note"];

    // if (isset($_FILES["img"])) {
    //     $image = $_FILES["img"];
    // } else {
    // }

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d");


    if (empty($title)) {
        echo "Please Add a Title.";
    } else if (empty($p1)) {
        echo "Please insert the Paragraph 01";
    } else if (empty($note)) {
        echo "Please enter the Blog Note";
    } else {
        $product0 = Database::search("SELECT * FROM blog INNER JOIN blog_img ON blog_img.blog_id=blog.id
         WHERE  `blog_id`='" . $pid . "' ");

        $item_data = $product0->fetch_assoc();

   
        Database::iud("UPDATE `blog` SET `title`='" . $title . "' ,`paragraph1`='" . $p1 . "',`paragraph2`='" . $p2 . "',`note`='" . $note . "',`blogdate`='".$date."' WHERE  `id`='" . $pid . "' ");


       

        if (isset($_FILES["img"])) {
            $imageFile = $_FILES["img"];
            $fileName = "resources//Block//" . uniqid() . ".png";
            move_uploaded_file($imageFile["tmp_name"], $fileName);
        } else {
            $fileName = $item_data["img_path"];
        }

        $itemId2 = Database::search("SELECT `id` FROM `blog` WHERE `title`='" . $title . "' AND `paragraph1`='".$p1."'");
        $iT = $itemId2->fetch_assoc();
        $itemID = $iT["id"];

        Database::iud("UPDATE `blog_img` SET `img_path`='" . $fileName . "' WHERE `blog_id`='" . $itemID . "' ");



        $product = Database::search("SELECT * FROM blog INNER JOIN blog_img ON blog_img.blog_id=blog.id
         WHERE  `blog_id`='" . $pid . "' ");

        $n = $product->num_rows;

        if ($n == 1) {
            $row = $product->fetch_assoc();

            $_SESSION["b"] = $row;
            echo "Product updated successfully";
        } else {
            echo "Error";
        }
    }
} else {
    echo "Product Does not Exit";
}
