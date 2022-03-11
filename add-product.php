<?php
include('includes/header.inc.php');
include 'includes/autoload.inc.php';
?>

<nav class="navbar navbar-light navbar-expand-lg" style="background-color: #cf0b0c;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="assets/logo.png" width=40 alt="">
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
    <form class="was-validated" id="product_form" method="POST" action="classes/insert-product.class.php">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" required name="name" class="form-control" id="name" pattern="^[a-z]+[a-z ]*i">  // start with letter could end with letter or space
            <div class="invalid-feedback">Please, submit required data</div>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" required class="form-control" name="price" id="price" pattern="\d+">
            <div class="invalid-feedback">Please, submit required data</div>
        </div>

        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" required class="form-control" name="SKU" id="sku" pattern="[\w]">
            <div class="invalid-feedback">Please, submit required data</div>
        </div>

        <label for="productType">Product type</label>
        <select class="form-select" aria-label="Default select example" id="productType" name="product-type" required>
            <option selected value="Book">Book</option>
            <option value="DVD">DVD</option>
            <option value="Furniture">Furniture</option>
        </select>
        <div id="specialData" class="form-group">
            <label for="weight">Weight (KG) </label>
            <input type="number" required class="form-control" name="weight" id="weight" pattern="\d+">
            <small>*Please provide book weight in KG*</small>
        </div>
    </form>
</div>

<?php include('includes/footer.inc.php'); ?>

</body>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery("#productType").change(function () {
            let selected_val = $("#productType option:selected").val();
            jQuery("#specialData").load("includes/formData.inc.html #" + selected_val);
        });
    });
</script>
</html>