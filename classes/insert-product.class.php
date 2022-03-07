<?php
include 'product.class.php';
// COMPLETE: insert using abstract class for other columns

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $sku = $_POST['SKU'];
    $price = $_POST['price'];

    $product = new Product();
    $dataInsert = Array ( "name" => $name ,
        "SKU" => $sku ,
        "price" => $price
    );

    if($product->insertProduct($dataInsert))
    {
        header("Location: ".BURL);
        die();
    }
}

