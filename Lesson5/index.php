<?php
    include "db/connection.php";

    $query = "select * from images order by views desc";
    $result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Photo Gallery</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>        
        <div class="catalogue">
            <div class="section"> 
                
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
            ?>    
                <div class="product">
                    <div class="product-img">
                        <a href=<?="image_preview.php?id=".$row["id"]?> target="_blank">
                            <img src=<?=$row["path_small"]."/".$row["name_small"]?> alt=<?=$row["name_small"]?>/>
                        </a>
                        <div class="product-descr">
                            <div class="product-name"><?=$row["name_small"]." viewed ".$row["views"]." times"?></div>                
                        </div>
                    </div>
                </div>
            <?php
                }
                mysqli_free_result($result);
                
                mysqli_close($link);
            ?>    
            </div>
        </div>
    </body>
</html>