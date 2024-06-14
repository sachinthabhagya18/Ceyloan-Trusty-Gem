<?php

session_start();

require "connection.php";



$id = $_GET["id"];


$_SESSION["au"] = $id;

echo "success";
