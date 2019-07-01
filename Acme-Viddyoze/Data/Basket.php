<?php


namespace Data;


class Basket
{
    public $orderedItems;
    public $total;
    public $rulesApplied;
    public $rulesAvailable;

    private $discount =0;

    function  __construct(){
        $this->orderedItems = Array();

        //Define rules collection
        $this->rulesApplied = Array();
        $this->rulesAvailable = Array();

        $oD1 = new Rule("*", 50, "less-than", 4.95, "Normal Delivery Charge applies $4.95",0);
        array_push($this->rulesAvailable, $oD1);

        $oD2 = new Rule("*", 90, "less-than", 2.95, "Spend more than $50 and delivery is only $2.95", 51);
        array_push($this->rulesAvailable, $oD2);

        $oD3 = new Rule("*", 90, "greater-than-or-equal", 0.00, "FREE Delivery for orders over $90", 10000000000);
        array_push($this->rulesAvailable, $oD3);
    }

    public function AddItem($pName, $productCode, $productPrice, $qty)
    {
        $oProduct = new OrderedProduct($pName, $productCode, $productPrice, $qty);

        $r01Count = $qty;
        if ($oProduct->productCode == "R01")
        {
            foreach ($this->orderedItems as $oItem)
            {
                //Check that RO1 is not already in the list
                if ($oItem->productCode) {

                    $r01Count += $oItem->quantity;
                }
            }

            //if count of R01 equal to 1
            if ($r01Count >= 2)
            {
                $this->discount = ($oProduct->productPrice / 2);

            }
        }
        array_push($this->orderedItems,$oProduct);
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->orderedItems as $item)
        {
           $total += ($item->productPrice * $item->quantity);

        }

        $total -= $this->discount;

        //Check Delivery Cost Basket Rules
        foreach ($this->rulesAvailable as $ruleItem)
        {
            if ($ruleItem -> comparer == "less-than")
            {
                if ($total < $ruleItem -> triggerValue )
                {
                    if($total >= $ruleItem -> upperValue) {
                        $total += $ruleItem->trueOutcome;
                        if (count($this->rulesApplied) == 0)
                        {
                            array_push($this->rulesApplied, $ruleItem->offerDescription);
                        }
                    }
                }
            }
            elseif ($ruleItem -> comparer == "greater-than-or-equal")
            {
                if ($total >= $ruleItem -> triggerValue)
                {
                    $total += $ruleItem -> trueOutcome;
                    array_push($this->rulesApplied, $ruleItem-> offerDescription);
                }
            }
        }

        return $total;
    }
}

