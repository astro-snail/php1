<?php
    require_once "connection.php";

    function getReviews($product) {
        $reviews = [];

        $query = "select * from review where product = $product order by date_created";
        $result = mysqli_query(db(), $query);

        while($review = mysqli_fetch_assoc($result)) {
            $reviews[] = $review;
        }
        mysqli_free_result($result);
        
        return $reviews;
    }

    function addReview($product, $text) {
        $insert = "insert into review (product, text) values ($product, '$text')";
        
        mysqli_query(db(), $insert);
        
        return mysqli_affected_rows(db());
    }
?>