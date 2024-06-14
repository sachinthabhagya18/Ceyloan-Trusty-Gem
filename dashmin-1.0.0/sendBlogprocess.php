<?php

session_start();

require "connection.php";


$id = $_GET["id"];


$product = Database::search("SELECT * FROM blog INNER JOIN blog_img ON blog_img.blog_id=blog.id  WHERE `blog_id`='".$id."' ");

$n =$product->num_rows;

if($n == 1){
    $row = $product->fetch_assoc();

    $_SESSION["b"] = $row;

    echo "success";

} else {
    echo "Error";
}

?>