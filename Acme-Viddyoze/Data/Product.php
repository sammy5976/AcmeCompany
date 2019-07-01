<?php


namespace Data;


class Product
{
    public $productName;
    public $productCode;
    public $productPrice;


    function __construct($pName, $pCode, $price)
    {
        $this->productName = $pName;
        $this->productCode = $pCode;
        $this->productPrice = $price;
    }
}

class OrderedProduct extends Product
{
    public $quantity;

    function __construct($pName, $pCode, $price, $qty)
    {
        $this->productName = $pName;
        $this->productCode = $pCode;
        $this->productPrice = $price;
        $this->quantity = $qty;
    }
}

class Rule
{
    function __construct($prod, $trig, $comp, $outcome, $offerDesc, $uVal)
    {
        $this->product = $prod;
        $this->triggerValue = $trig;
        $this->comparer = $comp;
        $this->trueOutcome = $outcome;
        $this->offerDescription = $offerDesc;
        $this->upperValue = $uVal;
    }

    public $product;
    public $triggerValue;
    public $comparer;
    public $trueOutcome;
    public $offerDescription;
    public $upperValue;

}

class OfferRule extends Rule{
    function __construct($prod, $trig, $comp, $outcome, $offerDesc, $uVal)
    {
        $this->product = $prod;
        $this->triggerValue = $trig;
        $this->comparer = $comp;
        $this->trueOutcome = $outcome;
        $this->offerDescription = $offerDesc;
        $this->upperValue = $uVal;
    }
}

