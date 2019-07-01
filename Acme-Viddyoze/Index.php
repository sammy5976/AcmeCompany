<?php
require 'Data/Product.php';
require 'Data/Basket.php';

use Data\Basket;
use Data\Product;

$r01 = new Product("Red Widget", "R01", 32.95);
$g01 = new Product("Green Widget", "G01", 24.95);
$b01 = new Product("Blue Widget", "B01", 7.95);

$basket = new Basket();

$productCat = array($r01, $b01, $g01);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Viddyoze Acme Widget: Basket Solution</title>
		<meta charset="UTF-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <title>Acme Widget Company - Product Catalogue</title>
	</head>
	<body>
		<h1 class="text-center">Product Catalogue</h1>
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <h3>Available Offers</h3>
        	<?php foreach($basket->rulesAvailable as $offer)
        	    {
                    echo "<h5>$offer->offerDescription <span class=\"badge badge-secondary\">Offer</span></h5>";
        	    }
        	    ?>
        </div>
        <hr>
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <form action="Total.php" method="POST" role="form">
                <table class="table table-hover">
                    <thead>
                        <td>Product Name</td>
                        <td>Product Code</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Add to Basket</td>
                    </thead>
                	<tbody>
                    <?php
                    for ($x = 0; $x < count($productCat); $x++) {
                        echo "<tr> \n";
                        echo "    <td> \n";
                        echo "<input type=\"text\" name=\"products[$x][productName]\"  class=\"form-control \" value=\"" . $productCat[$x]  -> productName. "\" title=\"\" required=\"required\">";
                        echo "    </td> \n";

                        echo "    <td> \n";
                        echo "<input type=\"text\" name=\"products[$x][productCode]\"  class=\"form-control \" value=\"" . $productCat[$x]  -> productCode. "\" title=\"\" required=\"required\" >";
                        echo "    </td> \n";

                        echo "    <td> \n";
                        echo "<input type=\"text\" name=\"products[$x][productPrice]\" class=\"form-control \" value=\"" . $productCat[$x]  -> productPrice. "\" title=\"\" required=\"required\" >";
                        echo "    </td> \n";

                        echo "    <td> \n";
                        echo "<input type=\"number\" name=\"products[$x][qty]\"  class=\"form-control \" value=\"\" title=\"Qty Required\" ";
                        echo "    </td> \n";

                        echo "    <td> \n";
                        echo "<input type=\"checkbox\" name=\"products[$x][AddToBasket]\"  class=\"form-control\" >";

                        echo "    </td> \n";
                        echo "</tr> \n";
                    }
                    ?>

                	</tbody>
                </table>




            	<button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	</body>
</html>
