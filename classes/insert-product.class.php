<?php
include '../includes/autoload.inc.php';

if(isset($_POST['submit']))
{
    $typeClass = $_POST['product-type'];
    $product = new $typeClass();

    if($product->insertProduct($_POST))
    {
        header("Location: http://localhost:2000/");
        die();
    }
}else {
    echo "Error: Form isn't submitted";
}
