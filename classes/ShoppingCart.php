<?php
session_start();

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}
class ShoppingCart
{
    public function __construct(){}

    public function addProductToCart(int $id, string $action):bool{
        $response = false;
        
        foreach($_SESSION['products'] as $product){
            if($product['id'] == $id){
                if(isset($_SESSION['cart'])){
                    $product_already_added = false;
                    $_cart = $_SESSION['cart'];
                    
                    foreach($_cart as $p){
                        if($id == $p['id']){
                            $product_already_added = true;
                        }
                    }

                    if($product_already_added == false){
                        $product['cant'] = 1;
                        $product['total_price'] = $product['cant'] * $product['price'];
                        array_push($_cart, $product);
                    } else if($action == 'plus'){
                        for($k = 0; $k < count($_cart); $k++){
                            if($_cart[$k]["id"] == $id && $_cart[$k]["cant"] < $product['stock']){
                                $_cart[$k]["cant"] = $_cart[$k]["cant"]+1;
                            }
                        }
                    } else if($action == 'minus'){
                        for($k = 0; $k < count($_cart); $k++){
                            if($_cart[$k]["id"] == $id && $_cart[$k]["cant"] > 0){
                                $_cart[$k]["cant"] = $_cart[$k]["cant"]-1;
                            }
                        }
                    }
                    $response = true;
                    $_SESSION['cart'] = $_cart;
                } 
            }
        }
        return $response;
    }

    public function getCart():Array{
        $_cart = [];
        $total_price = 0;
        $total_products = 0;

        if(isset($_SESSION['cart'])){
            $_cart = $_SESSION['cart'];
            
            for($k = 0; $k < count($_cart); $k++){
                $_cart[$k]['total_price'] = $_cart[$k]['price'] * $_cart[$k]['cant'];
                $total_price += $_cart[$k]['price'] * $_cart[$k]['cant'];
                $total_products += $_cart[$k]['cant'];
            }

            $data = array('cart' => $_cart, 'total_price' => $total_price, 'total_products' => $total_products);
            return $data;
        }else {
            return [];
        }
    }
}

?>