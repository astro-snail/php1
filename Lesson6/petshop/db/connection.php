<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "petshop";

    $link = mysqli_connect($server, $user, $password, $db);

    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
?>