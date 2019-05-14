<?php
    session_start();
    
    require_once "model/user.php";
    //require_once "model/shopping-cart.php";

    if (isset($_POST['action'])) {
        
        $destination = $_SERVER['HTTP_REFERER'];
    
        switch($_POST['action']) {
            
            case "login": 
                if (!isset($_SESSION['login'])) {
                    $user = findUser($_POST['login'], md5($_POST['password']));
                    if (!empty($user)) {
                        $_SESSION['login'] = $user['login'];
                        /*if (isset($_SESSION['cart'])) {
                            saveShoppingCart($user['id']);
                        }*/
                        $destination = "index.php";
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
                    $destination = "index.php";
                } else {
                    $_SESSION['error'] = "You are not logged on.";
                } 
                break;    
                
            case "updateUser":
                $id = (int)$_POST['id'];
                
                if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['email'])) {
                    exit("Please enter user name, password and email address");
                }
                
                $login = $_POST['login'];
                $password = md5($_POST['password']);
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                
                updateUser($id, $login, $password, $first_name, $last_name, $email, 0);
                
                $destination = "index.php";
                
                break;  
        }
        header("location: $destination");
    } else {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $user = getUserById($id);
            $title = $title." - User ".$user['login'];
            $content = "templates/user.php";
        } else if (!isset($_SESSION['login'])) {
            $title = $title." - Log In";
            $content = "templates/login.php";
        } else {
            $title = $title." - Log Out";
            $content = "templates/logout.php";
        }
    }
?>