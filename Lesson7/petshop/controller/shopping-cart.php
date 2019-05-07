<?php
    session_start();
    require_once "../model/shopping-cart.php";
    require_once "../model/order.php";

    if (isset($_POST['action'])) {
    
        switch($_POST['action']) {
            
            case "addToCart": 
                $product = (int)$_POST['product'];
                $quantity = (int)$_POST['quantity'];
                addProduct($product, $quantity);
                break;
            
            case "removeFromCart":
                $product = (int)$_POST['product'];
                removeProduct($product);
                break;
                
            case "changeQuantity":
                $product = (int)$_POST['product'];
                $quantity = (int)$_POST['quantity'];
                changeQuantity($product, $quantity);
                break;
            
            case "createOrder":
                if (!isset($_SESSION['login'])) {
                    exit("Please log on first to place an order.");
                } else {
                    $order = createOrder(getShoppingCart());
                    $destination = "../index.php?p=orders";
                }
                break; 
                
            case "emptyCart":
                emptyShoppingCart();
                break; 
        }
    }
    if (empty($destination))
        header("location: {$_SERVER['HTTP_REFERER']}");
    else
        header("location: {$destination}");
?>