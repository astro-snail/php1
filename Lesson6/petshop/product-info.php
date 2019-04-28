<?php
    include "db/connection.php";

    $id = (int)$_GET['id'];
    $today = date("Y-m-d");

    $query = "select product.*, category.name as category_name, price.price ".
             "from product ". 
             "join category on category.id = product.category ".
             "join price on price.product = product.id and price.date_from <= '$today' and price.date_to >= '$today' ".
             "where product.id = $id";

    $result = mysqli_query($link, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $category = $row['category_name'];
        $description = $row['description'];
        $features = explode('\n', $row['features']);
        $price = $row['price'];
        $image = $row['image'];
    }
    mysqli_free_result($result);

    if (isset($_POST['save']) && !empty($_POST['review'])) {
        $text = $_POST['review'];
        $insert = "insert into review (product, text) values ($id, '$text')";
        
        mysqli_query($link, $insert);
        header("location: product-info.php?id=$id");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Product Information</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>      
        <div class="content">
            <div class="product-info">
                <div class="product-info-img">
                    <img src="images/products/big/<?= $image; ?>" alt="<?= $name; ?>">
                </div>
                <div class="product-info-text">
                    <div class="product-descr">
                        <div class="product-name"><?= $name; ?></div> 
                        <div class="product-price">
                            <div class="price actual-price"><?= $price; ?></div>
                        </div>
                    </div> 
                    
                    <div class="product-descr"><?= $description; ?></div>
                    <ul class="product-features">
                    <?php foreach($features as $feature) { ?>
                        <li><?= $feature; ?></li>
                    <?php } ?>   
                    </ul>
                    
                    <div class="product-descr">Отзывы</div>
                    <ul class="product-reviews">
                        <?php include "reviews.php"; ?>        
                    </ul>
                </div>
                
                <div class="clearfix"></div>
                
                <form class="review" action="" method="POST">
                    <div class="product-descr">Оставьте свой отзыв:</div>                    
                    <textarea name="review"></textarea>
                    <br>
                    <input type="submit" name="save" value="Сохранить">
                </form>    
            </div>   
        </div>

    </body>
</html>