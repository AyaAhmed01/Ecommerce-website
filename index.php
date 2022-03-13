<?php
include('src/Includes/header.php');
require_once realpath("vendor/autoload.php");
use App\Classes\Book;
use App\Classes\Dvd;
use App\Classes\Furniture;
?>

<!--Here I show the list of products-->

<nav class="navbar navbar-light navbar-expand-lg" style="background-color: #cf0b0c;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="src/Assets/logo.png" width=40 alt="">
            <span style="color: white; font-size: medium">Product List</span>
        </a>
    </div>

    <form class="container-fluid justify-content-start">
        <button class="btn btn-sm btn-outline-secondary" type="button">
            <a class="nav-link" href="add-product.php">ADD</a>
        </button>
        <button class="btn btn-sm btn-outline-secondary" type="submit" form="delete_form">MASS DELETE</button>
    </form>
</nav>

<div class="container">
    <form action="delete-products.php" method="POST" id="delete_form">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            $products = array_merge(Book::getProducts(), Dvd::getProducts(), Furniture::getProducts());
            usort($products, function ($a, $b) {
                return strcmp($a->getSku(), $b->getSku());
            });
            foreach ($products as $product){
            ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input delete-checkbox" name="deletedIds[]"
                                       value="<?php echo $product->getSku(); ?>">
                            </div>
                            <ul class=\"card-text\" style=\"align-content: center; padding: 20px;\">
                                <li><?php echo $product->getSku(); ?></li>
                                <li><?php echo $product->getName(); ?></li>
                                <li><?php echo $product->getPrice()." $"; ?></li>
                                <li><?php echo $product->showSpecialAttr(); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </form>
</div>

<?php include('src/Includes/footer.php'); ?>    <!-- has the footer only -->
    </body>
</html>