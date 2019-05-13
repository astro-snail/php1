<?php
    session_start();
    
    require_once "model/shopping-cart.php";
    require_once "model/order.php";

    if (isset($_POST['action'])) {
    
        $destination = $_SERVER['HTTP_REFERER'];
        
        switch($_POST['action']) {
            
            case "addToCart": 
                $id = (int)$_POST['id'];
                $name = $_POST['name'];
                $price = (float)$_POST['price'];
                $quantity = (int)$_POST['quantity'];
                addProduct($id, $name, $price, $quantity);
                break;
            
            case "removeFromCart":
                $id = (int)$_POST['id'];
                removeProduct($id);
                break;
                
            case "changeQuantity":
                $id = (int)$_POST['id'];
                $quantity = (int)$_POST['quantity'];
                changeQuantity($id, $quantity);
                break;
            
            case "createOrder":
                if (!isset($_SESSION['login'])) {
                    exit("Please log on first to place an order");
                } else {
                    $id = createOrder($currentUser['id'], getShoppingCart());
                    if (empty($id)) {
                        exit("Error occurred when creating an order");
                    }
                    $destination = "index.php?c=order&id=".$id;
                }
                break;
                
            case "emptyCart":
                emptyShoppingCart();
                break; 
        }
        header("location: $destination");  
        
    } else {
        $shoppingCart = getShoppingCart();
        $title = $title." - Shopping Cart";
        $content = "templates/shopping-cart.php";
    }
?>