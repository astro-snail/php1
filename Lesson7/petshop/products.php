<?php
    include "model/product.php";

    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];  
        $product = getProduct($id);
        include "product-details.php";
    } else {
        include "product-catalogue.php";
    }
?>