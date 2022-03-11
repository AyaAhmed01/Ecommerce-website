<?php
include 'includes/autoload.inc.php';
include('includes/header.inc.php');
?>

<!--Here I show the list of products-->

<nav class="navbar navbar-light navbar-expand-lg" style="background-color: #cf0b0c;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="assets/logo.png" width=40 alt="">
            <span style="color: white; font-size: medium">Product List</span>
        </a>
    </div>

    <form class="container-fluid justify-content-start">
        <button class="btn btn-sm btn-outline-secondary" type="button">
            <a class="nav-link" href="add-product.php">ADD</a>
        </button>
        <button class="btn btn-sm btn-outline-secondary" type="submit" form="delete-form">MASS DELETE</button>
    </form>
</nav>

<div class="container">
    <form action="classes/delete-products.class.php" method="POST" id="delete-form">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Now each card is (col -> card -> in card body put info and the form checkbox -->
            <!-- foreach product -->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input delete-checkbox" name="deletedIds[]"
                                   value="3r4df">
                        </div>
                        <p class="card-text" style="align-content: center; padding: 20px;">This is a longer card with
                            supporting text below as a natural lead-in to additional content. This content is a little
                            bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input delete-checkbox" name="deletedIds[]"
                                   value="2">
                        </div>
                        <p class="card-text" style="align-content: center; padding: 20px;">This is a longer card with
                            supporting text below as a natural lead-in to additional content. This content is a little
                            bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input delete-checkbox" name="deletedIds[]"
                                   value="3">
                        </div>
                        <p class="card-text" style="align-content: center; padding: 20px;">This is a longer card with
                            supporting text below as a natural lead-in to additional content. This content is a little
                            bit longer.</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include('includes/footer.inc.php'); ?>
