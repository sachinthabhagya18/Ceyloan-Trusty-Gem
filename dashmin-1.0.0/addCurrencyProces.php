<?php
session_start();

require "connection.php";

$cu = $_POST["cu"];

if (empty($cu)) {
    echo "Please Add a Currency.";
} else {
    $cad = Database::search("SELECT `id` FROM `currency` WHERE `name`='" . $cu . "' ");

    if ($cad->num_rows == 1) {
        echo "The Currency Doesn't Exist";
    } else {
        Database::iud("INSERT INTO `currency`(`name`) VALUES('" . $cu . "') ");
      echo  "Product added successfully";
    }
}
