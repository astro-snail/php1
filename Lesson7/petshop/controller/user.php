<?php
    session_start();
    require_once "../model/user.php";
    require_once "../model/shopping-cart.php";

    if (isset($_POST['action'])) {
    
        switch($_POST['action']) {
            
            case "login": 
                if (!isset($_SESSION['login'])) {
                    $user = findUser($_POST['login'], md5($_POST['password']));
                    if (!empty($user)) {
                        $_SESSION['login'] = $user['login'];
                        if (isset($_SESSION['cart'])) {
                            saveShoppingCart($user['id']);
                        }
                        $destination = "../index.php";
                    } else {
                        $_SESSION['error'] = "Your login or password is incorrect. Please try again.";
                    }
                } else {
                    $_SESSION['error'] = "You are already logged on.";
                }
                break;
            
            case "logout":
                if (isset($_SESSION['login'])) {
                    unset($_SESSION['login']);
                    $destination = "../index.php";
                } else {
                    $_SESSION['error'] = "You are not logged on.";
                } 
                break;    
        }
    }
    if (empty($destination))
        header("location: {$_SERVER['HTTP_REFERER']}");
    else
        header("location: {$destination}");
?>