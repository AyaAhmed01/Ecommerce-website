<?php
include '../includes/autoload.inc.php';

if(isset($_POST['deletedIds'])){
    $ids = $_POST['deletedIds'];
    foreach ($ids as $key => $val) {
        $product = new Product();
        if(!($product->deleteProduct($val))){
            echo "Error";
        }
    }
}

header("Location: http://localhost:2000/");
die();
