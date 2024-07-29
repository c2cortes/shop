<?php

require('../classes/ShoppingCart.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $response = ['message' => "The Product has been added to the cart!"];
    
    if(isset($_POST['id'])){
        $shopping_cart = new ShoppingCart();
        
        $add_product = $shopping_cart->addProductToCart($_POST['id'], $_POST['action']);
        
        if(!$add_product){
            $response['message'] = "Error...";
        }
    }
    echo json_encode($response);
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
?>