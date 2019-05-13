<?php
    require_once "connection.php";

    function getProduct($id) {
        $today = date("Y-m-d");

        $query = "select product.*, category.id as category_id, category.name as category, price.price ".
                 "from product ". 
                 "join category on category.id = product.category ".
                 "join price on price.product = product.id and price.date_from <= '$today' and price.date_to >= '$today' ".
                 "where product.id = $id and product.date_from <= '$today' and product.date_to >= '$today'";

        $result = mysqli_query(db(), $query);

        if ($product = mysqli_fetch_assoc($result)) {        
            $product['features'] = explode('\n', $product['features']);
        }
        mysqli_free_result($result);
        
        return $product;
    }

    function getAllProducts() {
        $products = [];

        $today = date("Y-m-d");

        $query = "select product.*, category.id as category_id, category.name as category, price.price ". 
                 "from product ". 
                 "join category on category.id = product.category ".
                 "join price on price.product = product.id and price.date_from <= '$today' and price.date_to >= '$today' ".
                 "where product.date_from <= '$today' and product.date_to >= '$today' ".
                 "order by category.id, product.name";

        $result = mysqli_query(db(), $query);

        while($product = mysqli_fetch_assoc($result)) {
            $products[] = $product;
        }
        mysqli_free_result($result);
        
        return $products;
    }

    function getProducts($category) {
        $products = [];

        $today = date("Y-m-d");

        $query = "select product.*, category.id as category_id, category.name as category, price.price ". 
                 "from product ". 
                 "join category on category.id = product.category and category.id = $category ".
                 "join price on price.product = product.id and price.date_from <= '$today' and price.date_to >= '$today' ".
                 "where product.date_from <= '$today' and product.date_to >= '$today' ".
                 "order by product.name";

        $result = mysqli_query(db(), $query);

        while($product = mysqli_fetch_assoc($result)) {
            $products[] = $product;
        }
        mysqli_free_result($result);
        
        return $products;
    }

    function createProduct($name, $description, $features, $image_small, $image, $category, $new_flag, $hot_flag) {
        $insert = "insert into product (name, description, features, image_small, image, category, new_flag, hot_flag) ".
            "values ('$name', '$description', '$features', '$image_small', '$image', $category, $new_flag, $hot_flag)";
        
        mysqli_query(db(), $insert);

        return mysqli_insert_id(db());   
    }

    function updateProduct($id, $name, $description, $features, $image_small, $image, $category, $new_flag, $hot_flag) {
        $update = "update product ".
            "set name = '$name', ".
            "description = '$description', ".
            "features = '$features', ".
            "image_small = '$image_small', ".
            "image = '$image', ".
            "category = $category, ".
            "new_flag = $new_flag, ".
            "hot_flag = $hot_flag ".
            "where id = $id";
        
        mysqli_query(db(), $update);

        return mysqli_affected_rows(db());
    }

    function deleteProduct($id) {
        $delete = "delete from product where id = $id";
        
        mysqli_query(db(), $delete);
        
        return mysqli_affected_rows(db());
    }
?>