<?php
session_start();
// unset($_SESSION["products"]);

class Inventory
{
    public function __construct(){}
    public function loadData():Array{
        $jsonString = file_get_contents('./data/products.json');
        $data = json_decode($jsonString, true);

        if(!isset($_SESSION['products'])){
            $_SESSION['products'] = $data['products'];
            // var_dump($_SESSION['products']);
        }
        
        return $data["products"];
    }
}

?>