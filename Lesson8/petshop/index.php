<?php
    session_start();

    require_once "model/user.php";
    require_once "model/category.php";
    
    $currentUser = getCurrentUser();
    $categories = getCategories();

    $title = "My Friend";
    $content = "";

    if (isset($_GET['c'])) {
        include $_GET['c'].".php";
    } else {
        include "product.php";
    }

    include "templates/main.php";
?>