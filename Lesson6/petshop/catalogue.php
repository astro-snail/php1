<?php
    include "db/connection.php";

    $today = date("Y-m-d");

    $query = "select product.id, product.name, product.image_small, product.new_flag, product.hot_flag, price.price ". 
             "from product ". 
             "join category on category.id = product.category ".
             "join price on price.product = product.id and price.date_from <= '$today' and price.date_to >= '$today' ".
             "order by category.id, product.name";

    $result = mysqli_query($link, $query);
?>