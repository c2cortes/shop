<?php
class Product
{
    private int $id;
    private string $name;
    private int $price;

    public function __construct(){}

    public function getPrice():int{
        return $this->price;
    }

    public function setPrice(int $price):int{
        return $this->price = $price;
    }
}

?>