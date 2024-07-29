<?php
session_start();

// unset($_SESSION["cart"]);

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