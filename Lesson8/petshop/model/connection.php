<?php
    function db() {
        static $conn;
        
        if ($conn === NULL) {
			$conn = mysqli_connect ("localhost", "root", "", "petshop");
            //$conn = mysqli_connect ("shareddb-g.hosting.stackcp.net", "petshop-373148f8", "qv6p2u87kf", "petshop-373148f8");
			mysqli_set_charset($conn, 'utf8');
        }
        return $conn;
    }
?>