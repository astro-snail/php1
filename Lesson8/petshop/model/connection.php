<?php
    function db() {
        static $conn;
        
        if ($conn === NULL) {
            $conn = mysqli_connect ("localhost", "root", "", "petshop");
        }
        return $conn;
    }
?>