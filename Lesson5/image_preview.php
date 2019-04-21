<?php
    include "db/connection.php";

    $id = $_GET["id"];
    $update = "update images set views = views + 1 where id = $id";
    if (!mysqli_query($link, $update)){
	   echo "Error while updating data";
    }

    $query = "select * from images where id = $id";
    $result = mysqli_query($link, $query);  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Photo Preview</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>       
    <?php    
        if ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="product-descr">
            <div class="product-name"><?=$row["name"]." viewed ".$row["views"]." times"?></div>                
        </div>
        <img src=<?=$row["path"]."/".$row["name"]?> alt=<?=$row["name"]?> >
    <?php
        }
        mysqli_free_result($result);
        mysqli_close($link);
    ?>

    </body>
</html>