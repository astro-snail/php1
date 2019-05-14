<?php
    require_once "connection.php";

    function getAllUsers() {
        $users = [];

        $query = "select * from user order by login";

        $result = mysqli_query(db(), $query);

        while($user = mysqli_fetch_assoc($result)) {
            $users[] = $user;
        }
        mysqli_free_result($result);
        
        return $users;
    }

    function findUser($login, $password) {    
        $query = "select * from user where login = '$login' and password = '$password'";
        $result = mysqli_query(db(), $query);

        $user = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        
        return $user;
    }

    function getUserByLogin($login) {
        $query = "select * from user where login = '$login'";
        
        $result = mysqli_query(db(), $query);

        $user = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        
        return $user;
    }

    function getUserById($id) {
        $query = "select * from user where id = $id";
        $result = mysqli_query(db(), $query);

        $user = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        
        return $user;
    }

    function getCurrentUser() {
        return getUserByLogin($_SESSION['login']);
    }

    function updateUser($id, $login, $password, $first_name, $last_name, $email, $administrator) {
        
        if (!empty($administrator)) {
            $update = "update user ".
                "set login = '$login', ".
                "password = '$password', ".
                "first_name = '$first_name', ".
                "last_name = '$last_name', ".
                "email = '$email', ".
                "administrator = $administrator ".
                "where id = $id";
        } else {
            $update = "update user ".
                "set login = '$login', ".
                "password = '$password', ".
                "first_name = '$first_name', ".
                "last_name = '$last_name', ".
                "email = '$email' ".
                "where id = $id";
        }    
        
        mysqli_query(db(), $update);

        return mysqli_affected_rows(db());
    }

    function deleteUser($id) {
        $delete = "delete from user where id = $id";
        
        mysqli_query(db(), $delete);
        
        return mysqli_affected_rows(db());
    }

    function isAdministrator() {
        return (bool)getCurrentUser()['administrator'];
    }
?>