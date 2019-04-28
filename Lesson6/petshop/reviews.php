<?php
    include "db/connection.php";

    $query = "select * from review where product = $id order by date_created";

    $result = mysqli_query($link, $query);

    while($review = mysqli_fetch_assoc($result)) {
        echo "<li>".$review['date_created']." ".$review['text']."</li>";
    }
    mysqli_free_result($result);
?>