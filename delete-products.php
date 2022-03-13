<?php

require_once realpath("vendor/autoload.php");

if(isset($_POST['deletedIds'])){
    $ids = $_POST['deletedIds'];
    foreach ($ids as $id) {
        if(!(\App\Classes\Product::deleteProduct($id))){
            echo "Error";
        }
    }
}

header("Location: http://localhost:2000/");
die();
