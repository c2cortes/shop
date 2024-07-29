<?php

require('./classes/Product.php');

class WeightedProduct extends Product
{
    public function __construct(){}

    public function calcPrice():int {
        return $this->getPrice() - ($this->getPrice() * 10/100);
    }
}

?>