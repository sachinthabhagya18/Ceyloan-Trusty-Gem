<?php
session_start();

require "connection.php";

$co = $_POST["co"];

if (empty($co)) {
    echo "Please Add a Color.";
} else {
    $cad = Database::search("SELECT `id` FROM `color` WHERE `name`='" . $co . "' ");

    if ($cad->num_rows == 1) {
        echo "The Product Doesn't Exist";
    } else {
        Database::iud("INSERT INTO `color`(`name`) VALUES('" . $co . "') ");
      echo  "Product added successfully";
    }
}
