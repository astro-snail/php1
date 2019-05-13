<?php
    require_once "model/product.php";
    require_once "model/review.php";

    if (isset($_POST['action'])) {
        
        switch($_POST['action']) {
            case "addReview":
                if (!empty($_POST['text'])) {
                    addReview($_POST['product'], $_POST['text']);
                }
                break;
        }
        header("location: {$_SERVER['HTTP_REFERER']}"); 
        
    } else if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];  
        $product = getProduct($id);
        $reviews = getReviews($id);
        $title = $title." - Product ".$product['name'];
        $content = "templates/product.php";
        
    } else if (isset($_GET['category'])) {
        $category_id = (int)$_GET['category'];
        $category = getCategory($category_id);
        $products = getProducts($category_id);
        $title = $title." - Category ".$category['name'];
        $content = "templates/products.php";
        
    } else {
        $products = getAllProducts();
        $title = $title." - Products";
        $content = "templates/products.php";
    }
?>