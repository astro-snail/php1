<?php
    require_once "../model/review.php";

    if (isset($_POST['action'])) {
    
        switch($_POST['action']) {
            case "addReview":
                if (!empty($_POST['text'])) {
                    addReview($_POST['product'], $_POST['text']);
                }
                break;
        }
    }
    header("location: {$_SERVER['HTTP_REFERER']}");
?>