<?php

require_once realpath("vendor/autoload.php");

const BURL = "https://ecommerce-website-php.herokuapp.com/index.php";    // "http://localhost:2000/"

if(isset($_POST['deletedIds'])){
    $ids = $_POST['deletedIds'];
    foreach ($ids as $id) {
        if(!(\App\Classes\Product::deleteProduct($id))){
            echo "Error";
        }
    }
}

header("Location: ".BURL);
die();
