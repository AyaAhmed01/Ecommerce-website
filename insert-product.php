<?php
include 'vendor/autoload.php';

if (isset($_POST['submit'])) {
    $typeClass = $_POST['product-type'];
    $className = "\App\Classes\\" . $typeClass;
    $product = new $className();
    try {
        $product->insertProduct($_POST);
        header("Location: https://www.scandiweb.xyz/");
        die();
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
} else {
    echo "Error: Form isn't submitted";
}