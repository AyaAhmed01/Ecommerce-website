<?php
include('src/Includes/header.php');
require_once realpath("vendor/autoload.php");
?>

<nav class="navbar navbar-light navbar-expand-lg" style="background-color: #cf0b0c;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="src/Assets/logo.png" width=40 alt="">
            <span style="color: white; font-size: medium">Product Add</span>
        </a>
    </div>

    <form class="container-fluid justify-content-start">
        <button class="btn btn-sm btn-outline-secondary" type="button">
            <a class="nav-link" href="index.php">Cancel</a>
        </button>
        <button class="btn btn-sm btn-outline-secondary" name="submit" form="product_form" value="Save">Save</button>
    </form>
</nav>


<div class="container">
    <form class="was-validated" id="product_form" method="POST" action="insert-product.php">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" required name="name" class="form-control" id="name" pattern="[A-Za-z]+[A-Za-z ]*"
                   oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" title="">  <!-- start with letter could end with letter or space -->
            <div class="invalid-feedback">Product name should start with letter and only contain letters and spaces</div>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" required class="form-control" name="price" id="price" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);">
        </div>

        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" required class="form-control" name="SKU" id="sku" pattern="[\w]{8,12}"
                   oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" title="">
            <div class="invalid-feedback">SKU should only contain from 8 to 12 letter and digit  e.g. 8fe7HG87</div>
        </div>

        <label for="productType">Product type</label>
        <select class="form-select" aria-label="Default select example" id="productType" name="product-type" required>
            <option selected value="Book">Book</option>
            <option value="DVD">DVD</option>
            <option value="Furniture">Furniture</option>
        </select>
        <div id="specialData" class="form-group">
            <label for="weight">Weight (KG) </label>
            <input type="number" required class="form-control" name="weight" id="weight" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);">
            <small>*Please provide book weight in KG*</small>
        </div>
        <input type="submit" class="hide" id="hiddenSubmit" style="visibility:hidden;">
    </form>
</div>

<?php include('src/Includes/footer.php'); ?>

</body>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">

    // Load special attributes input fields
    jQuery(document).ready(function () {
        jQuery("#productType").change(function () {
            let selected_val = $("#productType option:selected").val();
            jQuery("#specialData").load("src/Includes/formData.html #" + selected_val);
        });
    });

    // Pattern validation

    let hiddenInput = document.getElementById("hiddenSubmit");
    let form = document.getElementById("product_form");

    document.addEventListener("focusout",function(event)
    {
        if(event.target instanceof HTMLInputElement) {
            if(!form.checkValidity()) {
                hiddenInput.click();
            }
        }
    });

    function InvalidMsg(inputBox)
    {
        if(inputBox.validity.patternMismatch) {
            inputBox.setCustomValidity('Please, provide the data of indicated type');
        } else if(inputBox.validity.valueMissing) {
            inputBox.setCustomValidity('Please, submit required data');
        } else if(inputBox.validity.){
            inputBox.setCustomValidity('');
        }
        return true;
    }

    // nameInput.addEventListener("focusout", function (){             // focusing out == submitting: oninvalid, required or validity
    //     hiddenInput.click();
    // });

    // nameInput.oninvalid = function(event) {
    //     if(nameInput.value === ""){
    //         event.target.setCustomValidity('Please, submit required data');
    //     } else {
    //         event.target.setCustomValidity('Product name should start with letter and only contain letters and spaces');
    //     }
    // }
    //
    // document.addEventListener("input",function(event){
    //     if(event.target instanceof HTMLInputElement)
    //     {
    //         event.target.setCustomValidity("");
    //     }
    // });


    // skuInput.addEventListener("focusout", function (){
    //     hiddenInput.click();
    // });

    // skuInput.oninvalid = function(event) {
    //     event.target.setCustomValidity('SKU should only contain from 8 to 12 letter and digit  e.g. 8fe7HG87');
    // }
</script>
</html>