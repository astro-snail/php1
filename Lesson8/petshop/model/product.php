<?php
    require_once "connection.php";

    function getProduct($id) {
        $query = "select product.*, category.id as category_id, category.name as category, price.price ".
                 "from product ". 
                 "join category on category.id = product.category ".
                 "join price on price.product = product.id and price.date_from <= NOW() and price.date_to > NOW() ".
                 "where product.id = $id and product.date_from <= NOW() and product.date_to > NOW()";

        $result = mysqli_query(db(), $query);

        if ($product = mysqli_fetch_assoc($result)) {
            $product['features'] = explode("\r\n", $product['features']);
        }
        mysqli_free_result($result);
        
        return $product;
    }

    function getAllProducts() {
        $products = [];

        $query = "select product.*, category.id as category_id, category.name as category, price.price ". 
                 "from product ". 
                 "join category on category.id = product.category ".
                 "join price on price.product = product.id and price.date_from <= NOW() and price.date_to > NOW() ".
                 "where product.date_from <= NOW() and product.date_to > NOW() ".
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

        $query = "select product.*, category.id as category_id, category.name as category, price.price ". 
                 "from product ". 
                 "join category on category.id = product.category and category.id = $category ".
                 "join price on price.product = product.id and price.date_from <= NOW() and price.date_to > NOW() ".
                 "where product.date_from <= NOW() and product.date_to > NOW() ".
                 "order by product.name";

        $result = mysqli_query(db(), $query);

        while($product = mysqli_fetch_assoc($result)) {
            $products[] = $product;
        }
        mysqli_free_result($result);
        
        return $products;
    }

    function createProduct($name, $description, $features, $image_small, $image, $category, $new_flag, $hot_flag, $price) {
		mysqli_begin_transaction(db());
		
        $insert = "insert into product (name, description, features, image_small, image, category, new_flag, hot_flag) values ('$name', '$description', '$features', '$image_small', '$image', $category, $new_flag, $hot_flag)";

		mysqli_query(db(), $insert);
		
		$id = mysqli_insert_id(db());

		$insert = "insert into price (product, price) values($id, $price)";
			
		mysqli_query(db(), $insert);

        mysqli_commit(db());
	
        return $id;
    }

    function updateProduct($id, $name, $description, $features, $image_small, $image, $category, $new_flag, $hot_flag, $price) {
		
        $product = getProduct($id);
        
        mysqli_begin_transaction(db());
		
        $update = "update product set name = '$name', description = '$description', features = '$features', image_small = '$image_small', image = '$image', category = $category, new_flag = $new_flag, hot_flag = $hot_flag where id = $id";
        
        mysqli_query(db(), $update);
		
		if (number_format($price, 2) != number_format($product['price'], 2)) {

			$update = "update price set date_to = NOW() where product = $id and date_to > NOW()";

			mysqli_query(db(), $update);
			
			$insert = "insert into price (product, price) values($id, $price)";
			
			mysqli_query(db(), $insert);
		}	
		
		mysqli_commit(db());	

        return mysqli_affected_rows(db());
    }

    function deleteProduct($id) {
        $update = "update product set date_to = NOW() where id = $id";
		
        mysqli_query(db(), $update);
		
        return mysqli_affected_rows(db());
    }
?>