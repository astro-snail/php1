<?php
    require_once "model/user.php";

    if (isset($_POST['action'])) {

        $destination = $_SERVER['HTTP_REFERER'];
    
        switch($_POST['action']) {
                
            case "createUser":
                if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['email'])) {
                    exit("Please enter user name, password and email address");
                }
                
                $login = $_POST['login'];
                $password = md5($_POST['password']);
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $administrator = isset($_POST['administrator']) ? 1 : 0;
                
                $id = createUser($login, $password, $first_name, $last_name, $email, $administrator);
                
                $destination = "admin.php?c=user";
				
                break;
            
            case "updateUser":
                $id = (int)$_POST['id'];
                
                if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['email'])) {
                    exit("Please enter user name, password and email address");
                }
                
                $login = $_POST['login'];
                $password = md5($_POST['password']);
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $administrator = isset($_POST['administrator']) ? 1 : 0;
                
                updateUser($id, $login, $password, $first_name, $last_name, $email, $administrator);
                
                $destination = "admin.php?c=user";
                
                break;        
                
            case "deleteUser":
                $id = (int)$_POST['id'];
                deleteUser($id);
                break;        
        }
        header("location: $destination");
    } else {
		if (isset($_GET['create'])) {
            $user = [];
            $title = $title." - New User";
            $content = "templates/admin/user.php";
		} else if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $user = getUserById($id);
            $title = $title." - User ".$user['login'];
            $content = "templates/admin/user.php";
        } else {
            $users = getAllUsers();
            $title = $title." - Users";
            $content = "templates/admin/users.php";
        }
    }
?>