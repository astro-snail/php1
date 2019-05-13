<?php
    session_start();

    require_once "model/order.php";

    if (isset($_POST['action'])) {
        
        $destination = $_SERVER['HTTP_REFERER'];
        
        switch($_POST['action']) {  
                
            case "updateOrder": 
                $id = (int)$_POST['id'];
                $status = $_POST['status'];
                $date_completed = empty($_POST['date_completed']) ? null : date('Y-m-d H:i:s', strtotime($_POST['date_completed']));
                updateOrder($id, $status, $date_completed);
                break;      
                
            case "completeOrder": 
                $id = (int)$_POST['id'];
                
                if (empty($_POST['date_completed'])) {
                    exit("Enter order completed date");
                }
                
                $date_completed = date('Y-m-d H:i:s', strtotime($_POST['date_completed']));
                completeOrder($id, $date_completed);
                break;    
                
            case "cancelOrder": 
                $id = (int)$_POST['id'];
                cancelOrder($id);
                break;    
                
            case "deleteOrderItem": 
                $id = (int)$_POST['id'];
                $item_id = (int)$_POST['item_id'];
                deleteOrderItem($id, $item_id);
                break;    
                
            case "changeOrderItem": 
                $id = (int)$_POST['id'];
                $item_id = (int)$_POST['item_id'];
                $quantity = (int)$_POST['quantity'];
                changeOrderItem($id, $item_id, $quantity);
                break;        
        }
        header("location: $destination"); 
        
    } else if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];  
        $order = getOrder($id);
        $items = getOrderItems($id);
        $title = $title." - Order No. ".$id;
        $content = "templates/admin/order.php";
    } else {
        $orders = getAllOrders();
        $title = $title." - Orders";
        $content = "templates/admin/orders.php";
    }
?>