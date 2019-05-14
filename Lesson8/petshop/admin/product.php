<?php
    require_once "model/product.php";

    if (isset($_POST['action'])) {

        $destination = $_SERVER['HTTP_REFERER'];
    
        switch($_POST['action']) {
                
            case "createProduct":
                if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['image_small']) || empty($_POST['image']) || empty($_POST['price'])) {
                    exit("Please enter product name, description, price, and select image files");
                }
                    
                $name = $_POST['name'];
                $description = $_POST['description'];
                $features = $_POST['features'];
                $image_small = $_POST['image_small'];
                $image = $_POST['image'];
                $category = (int)$_POST['category'];
                $new_flag = isset($_POST['new_flag']) ? 1 : 0;
                $hot_flag = isset($_POST['hot_flag']) ? 1 : 0;
				$price = $_POST['price'];
				
                $id = createProduct($name, $description, $features, $image_small, $image, $category, $new_flag, $hot_flag, $price);
				
				$destination = "admin.php?c=product";
                break;        
            
            case "updateProduct":
                $id = (int)$_POST['id'];
                
                if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['image_small']) || empty($_POST['image']) || empty($_POST['price'])) {
                    exit("Please enter product name, description, price, and select image files");
                }
                    
                $name = $_POST['name'];
                $description = $_POST['description'];
                $features = $_POST['features'];
                $image_small = $_POST['image_small'];
                $image = $_POST['image'];
                $category = (int)$_POST['category'];
                $new_flag = isset($_POST['new_flag']) ? 1 : 0;
                $hot_flag = isset($_POST['hot_flag']) ? 1 : 0;
				$price = $_POST['price'];
                
                updateProduct($id, $name, $description, $features, $image_small, $image, $category, $new_flag, $hot_flag, $price);
                
                $destination = "admin.php?c=product";
                break;        
                
            case "deleteProduct":
                $id = (int)$_POST['id'];
                deleteProduct($id);
                break;        
        }
        header("location: $destination");
        
    } else {
		if (isset($_GET['create'])) {
            $product = ['category_id' => 1];
            $title = $title." - New Product";
            $content = "templates/admin/product.php";
		} else if (isset($_GET['id'])) {
			$id = (int)$_GET['id'];  
			$product = getProduct($id);
			$title = $title." - Product ".$product['name'];
			$content = "templates/admin/product.php";
		} else {
			$products = getAllProducts();
			$title = $title." - Products";
			$content = "templates/admin/products.php";
		}
	}
?>