<?php
    require_once "connection.php";
    require_once "user.php";

    function createOrder($cart) {
        $user = getCurrentUser();
        
        $insert = "insert into order_header (user) values ({$user['id']})";
        mysqli_query(db(), $insert);
        
        $order = mysqli_insert_id(db());
        
        foreach($cart as $key => $value) {            
            $values[] = "($order, {$value['id']}, {$value['quantity']}, {$value['price']})";
        }
        $insert = "insert into order_item (order_header, product, quantity, price) values ".implode(',', $values);
        mysqli_query(db(), $insert);

        return $order;
    }

    function getOrderHeader($id) {
        $query = "select * from order_header where id = $id";

        $result = mysqli_query(db(), $query);

        $order = mysqli_fetch_assoc($result);        
        mysqli_free_result($result);
        
        return $order;
    }

    function getOrderItems($id) {
        $items = [];
        
        $query = "select order_header.*, order_item.product, order_item.quantity, order_item.price ".
                 "from order_header ". 
                 "join order_item on order_item.order_header = order_header.id ".
                 "where order_header.id = $id";

        $result = mysqli_query(db(), $query);

        while ($item = mysqli_fetch_assoc($result)) {        
            $items[] = $item;
        }
        mysqli_free_result($result);
        
        return $items;
    }

    function getOrders() {
        $orders = [];
        
        $user = getCurrentUser();
        
        $query = "select * from order_header where user = {$user['id']}";

        $result = mysqli_query(db(), $query);

        while ($order = mysqli_fetch_assoc($result)) {
            $orders[] = $order;
        }
        mysqli_free_result($result);
        
        return $orders;        
    }

    function getOrderTotal($id) {
        $total = 0;
        $items = getOrderItems($id);
        foreach($items as $item) {
            $total += $item['quantity'] * $item['price'];
        }
        return $total;
    }
?>