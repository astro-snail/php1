<?php
    define("IMG_GALLERY", "small");
    define("IMG_FULLSIZE", "big");

    function get_path_small($filename) {
        return IMG_GALLERY."/".$filename;
    }

    function get_path_big($filename) {
        $arr = explode("_", $filename, 2);
        return IMG_FULLSIZE."/".$arr[0]."_1600x1600.jpg";
    }

    $images = array_diff(scandir(IMG_GALLERY), array(".", "..") );
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
                foreach($images as $image) {
            ?>    
                <div class="product">
                    <div class="product-img">
                        <a href=<?=get_path_big($image)?> target="_blank"><img src=<?=get_path_small($image)?> alt=<?=$image?>/></a>
                    </div>
                </div>
            <?php
                }
            ?>    
            </div>
        </div>
    </body>
</html>