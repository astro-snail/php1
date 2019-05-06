<?php
    require_once "connection.php";

    function findUser($login, $password) {    
        $query = "select * from user where login = '$login' and password = '$password'";
        $result = mysqli_query(db(), $query);

        $user = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        
        return $user;
    }

    function getUser($login) {
        $query = "select * from user where login = '$login'";
        $result = mysqli_query(db(), $query);

        $user = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        
        return $user;
    }

    function getCurrentUser() {
        return getUser($_SESSION['login']);
    }
?>