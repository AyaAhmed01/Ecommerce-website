<?php

require 'vendor/autoload.php';

if(isset($_POST['submit']))
{
    $typeClass = $_POST['product-type'];
    $className = "\App\Classes\\".$typeClass;
    $product = new $className();

    if($product->insertProduct($_POST))                       // handle exception when SKU is not unique.
    {
        header("Location: http://localhost:2000/");
        die();
    }
}else {
    echo "Error: Form isn't submitted";
}
