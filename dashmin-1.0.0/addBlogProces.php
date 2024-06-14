<?php
session_start();

require "connection.php";

$title = $_POST["title"];
$p1 = $_POST["p1"];
$p2 = $_POST["p2"];
$note = $_POST["note"];
// $imageFile = $_FILES["img"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d");

$state = 1;

// $useremail = $_SESSION["u"]["email"];
if (empty($title)) {
    echo "Please Add a Title.";
} else if (empty($p1)) {
    echo "Please insert the Paragraph 01";
} else if (empty($note)) {
    echo "Please enter the Blog Note";
} else {


        Database::iud("INSERT INTO `blog`(`title`,`paragraph1`,`paragraph2`,`note`,`blogdate`) 
        VALUES('" . $title . "','" . $p1 . "','" . $p2 . "','" . $note . "','".$date."')");

        $itemId2 = Database::search("SELECT `id` FROM `blog` WHERE `title`='" . $title . "' AND `paragraph1`='" . $p1 . "' ");
        $iT = $itemId2->fetch_assoc();
        $itemID = $iT["id"];

        echo "Block added successfully";

    //    $last_id = Database::$connection->insert_id;

        $imageFile = $_FILES["img"];

        if (isset($_FILES["img"])) {

            $fileName = "resources//Block//" . uniqid() . ".png";
            move_uploaded_file($imageFile["tmp_name"], $fileName);
        } else {
            echo "Please select an image";
        }

        Database::iud("INSERT INTO `blog_img`(`img_path`,`blog_id`) VALUES('" . $fileName . "','" . $itemID . "' ) ");
    
}
