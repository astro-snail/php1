<?php
    require_once "connection.php";

    function getCategories() {
        $categories = [];

        $query = "select * from category";
        $result = mysqli_query(db(), $query);

        while($category = mysqli_fetch_assoc($result)) {
            $categories[] = $category;
        }
        mysqli_free_result($result);
        
        return $categories;
    }

    function getCategory($id) {
        $query = "select * from category where id = $id";
        
        $result = mysqli_query(db(), $query);

        $category = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        
        return $category;
    }
?>