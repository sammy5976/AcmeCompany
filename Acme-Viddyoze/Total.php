<?php
require 'Data/Product.php';
require 'Data/Basket.php';

use Data\Basket;

$basket = new Basket();

if (count($_POST) > 0) {
    if (count($_POST['products']) > 0) {
        $postedItems = $_POST['products'];
        for ($i = 0; $i < count($postedItems); $i++) {
            if (isset($postedItems[$i]["AddToBasket"]))
            {
                if($postedItems[$i]["AddToBasket"]=="on") {
                    $selected = new \Data\OrderedProduct($postedItems[$i]["productName"], $postedItems[$i]["productCode"], $postedItems[$i]["productPrice"], $postedItems[$i]["qty"]);

                    echo $selected->productName;
                    echo $selected->productCode;
                    echo $selected->productPrice;
                    echo $selected->quantity;

                    $basket->AddItem($postedItems[$i]["productName"], $postedItems[$i]["productCode"], $postedItems[$i]["productPrice"], $postedItems[$i]["qty"]);
                }
            }
        }
    }
}
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
    <title>Acme Widget Company - Basket Total</title>
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
        <table class="table table-hover">
            <thead>
                <td>Product Code</td>
                <td>Quantity Ordered</td>
            </thead>
            <tbody>
            <?php
            for ($x = 0; $x < count($basket->orderedItems); $x++) {
                echo "<tr> \n";
                echo "    <td> \n";
                echo $basket->orderedItems[$x]->productName ;
                echo "    </td> \n";

                echo "    <td> \n";
                echo $basket->orderedItems[$x]->quantity ;
                echo "    </td> \n";

                echo "</tr> \n";
            }
            ?>

            </tbody>
        </table>

       <h1><?php echo "$".$basket->getTotal(); ?></h1>

    <h3>Rules Applied</h3>
    <?php foreach($basket->rulesApplied as $rules)
    {
            echo "<p>".$rules."</p>";
    }
    ?>
</div>
<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</body>
</html>