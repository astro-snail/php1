<?php
    session_start();

    require_once "model/user.php";
    require_once "model/category.php";

    $currentUser = getCurrentUser();
    
    if (empty($currentUser) || !isAdministrator()) {
        exit("You have no permissions to access control panel");
    }

    $categories = getCategories();

    $title = "My Friend - Control Panel";
    $content = "";

    if (isset($_GET['c'])) {
        include "admin/".$_GET['c'].".php";
    }

    include "templates/main.php";
?>