<?php
session_start();

require "connection.php";
$user = $_SESSION["u"];


$id = $_POST["id"];

$txt = $_POST["txt"];

$usr = Database::search("SELECT * FROM `user` WHERE `email`='" . $user["email"] . "'");
$usrdt = $usr->fetch_assoc();

$auctionrs = Database::search("SELECT * FROM `auction` WHERE `id`='" . $id . "'");
$aucdt = $auctionrs->fetch_assoc();

$usid = $usrdt["id"];
$usemail = $usrdt["email"];


$price = $aucdt["beginning_price"];
$auid = $aucdt["id"];

//echo $txt;
//echo $id;
//echo $usid;
//echo $usemail;
//echo $auid;

$bidrs = Database::search("SELECT * FROM `bidding` WHERE `auction_id`='" . $auid . "'");
$bdns = $bidrs->num_rows;

if (empty($id)) {
    echo "error";
} else if (empty($txt)) {
    echo "Please Enter Your BID Value";
} else if ($txt == "0") {
    echo "Please Enter Your Valid Value";
} else if (!preg_match('/^([1-9][0-9]*|0)(\.[0-9]{2})?$/', $txt)) {
    echo "Please Enter Your Valid Price";
} else if ($txt <= $price) {
    echo "Price Must Greater Than Existing Price";
} else {

    if ($bdns == 1) {
        Database::iud("UPDATE `bidding` SET `user_id`='" . $usid . "', `bidding_price`='" . $txt . "' WHERE `auction_id`='" . $auid . "' ");
        //  echo "Your Auction Added13";
    } else {
        Database::iud("INSERT INTO `bidding` (`user_id`,`auction_id`,`bidding_price`) VALUES ('" . $usid . "','" . $auid . "','" . $txt . "')");
    }
    echo "Your Auction Added";
}
