<?php
include('src/Includes/header.php');
require_once realpath("vendor/autoload.php");
?>

<body>
    <header>
        <nav class="navbar navbar-light navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="src/Assets/logo.png" width=40 alt="">
                    <span>Product Add</span>
                </a>
            </div>

            <form class="container-fluid justify-content-start">
                <button class="btn" type="button">
                    <a class="nav-link" href="index.php">Cancel</a>
                </button>
                <button class="btn form-btn" name="submit" form="product_form" value="Save">Save</button>
            </form>
        </nav>
    </header>

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
                <input type="number" required class="form-control" name="price" id="price" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" pattern="\d+">
            </div>

            <div class="form-group">
                <label for="sku">SKU</label>
                <input type="text" required class="form-control" name="SKU" id="sku" pattern="\w+"
                       oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" title="">
                <div class="invalid-feedback">SKU should only contain letters and digits e.g. 8fe7HG87</div>
            </div>

            <label for="productType">Product type</label>
            <select class="form-select" aria-label="Default select example" id="productType" name="product-type" required>
                <option selected value="Book">Book</option>
                <option value="DVD">DVD</option>
                <option value="Furniture">Furniture</option>
            </select>
            <div id="specialData" class="form-group">
                <div id="Book">
                    <label for="weight">Weight (KG) </label>
                    <input type="number" required class="form-control" name="weight" id="weight" pattern="\d+" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);">
                    <small>*Please provide book weight in KG*</small>
                </div>
                <div id="Furniture">
                    <label for="length">Length (CM) </label>
                    <input type="number" required class="form-control" name="length" id="length" pattern="\d+" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);">

                    <label for="width">Width (CM) </label>
                    <input type="number" required class="form-control" name="width" id="width" pattern="\d+" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);">

                    <label for="height">Height (CM) </label>
                    <input type="number" required class="form-control" name="height" id="height" pattern="\d+" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);">

                    <small>*Please provide dimensions in LxWxH format*</small>
                </div>
                <div id="DVD">
                    <label for="size">Size (MB) </label>
                    <input type="number" required class="form-control" name="size" id="size" pattern="\d+" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);">
                    <small>*Please provide DVD size in MB*</small>
                </div>
            </div>
            <input type="submit" class="hide" id="hiddenSubmit">
        </form>
    </div>

<?php include('src/Includes/footer.php'); ?>
</body>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">

    // hide and show special attributes input fields
    jQuery(document).ready(function () {
        $('#Book').show();
        $('#Furniture').hide();
        $('#DVD').hide();
        jQuery("#productType").change(toggleSpecialInputs);

        function toggleSpecialInputs() {
            let selected_type = $("#productType option:selected").val();
            let types = ['Book', 'DVD', 'Furniture'];
            types.forEach(function (type) {
                if(type === selected_type) {
                    $('#'+selected_type).show();
                } else {
                    $('#'+type).hide();
                }
            });
        }
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
        } else {
            inputBox.setCustomValidity('');
        }
        return true;
    }
</script>
</html>