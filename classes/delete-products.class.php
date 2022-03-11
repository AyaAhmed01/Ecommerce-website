<?php
include '../includes/autoload.inc.php';

if(isset($_POST['deletedIds'])){
    $ids = $_POST['deletedIds'];
    foreach ($ids as $id) {
        if(!(Product::deleteProduct($id))){
            echo "Error";
        }
    }
}

header("Location: http://localhost:2000/");
die();
