<?php
    require_once "connection.php";

    function createOrder($user, $items) {
        
        mysqli_begin_transaction(db());
        
        $insert = "insert into order_header (user) values ($user)";
        mysqli_query(db(), $insert);
        
        $id = mysqli_insert_id(db());

        foreach($items as $item) {            
            $values[] = "($id, {$item['id']}, {$item['quantity']}, {$item['price']})";
        }
        
        $insert = "insert into order_item (order_header, product, quantity, price) values ".implode(',', $values);
        
        mysqli_query(db(), $insert);

        mysqli_commit(db());
	
        return $id;
    }

    function getOrder($id) {
        
        $query = "select * from order_header where id = $id";

        $result = mysqli_query(db(), $query);

        $order = mysqli_fetch_assoc($result);        
        mysqli_free_result($result);
        
        return $order;
    }

    function getOrderItems($id) {
        $items = [];
        
        $query = "select h.*, i.id as item_id, i.product, p.name, i.quantity, i.price ".
                 "from order_header as h ". 
                 "join order_item as i on i.order_header = h.id ".
                 "join product as p on i.product = p.id ".
                 "where h.id = $id";

        $result = mysqli_query(db(), $query);

        while ($item = mysqli_fetch_assoc($result)) {
            $item['amount'] = (float)((int)$item['quantity'] * (float)$item['price']);
            $items[] = $item;
        }
        mysqli_free_result($result);
        
        return $items;
    }

    function getOrders($user) {
        $orders = [];
        
        $query = "select * from order_header where user = $user";

        $result = mysqli_query(db(), $query);

        while ($order = mysqli_fetch_assoc($result)) {
            $orders[] = $order;
        }
        mysqli_free_result($result);
        
        return $orders;        
    }

    function getAllOrders() {
        $orders = [];
        
        $query = "select * from order_header";

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

    function setOrderStatus($id, $status) {
        $update = "update order_header set status = '$status' where id = $id";
        
        mysqli_query(db(), $update);
        
        return mysqli_affected_rows(db());
    }

    function updateOrder($id, $status, $date_completed) {
        if ($date_completed == null) {
            $update = "update order_header set status = '$status' where id = $id";    
        } else {
            $update = "update order_header set status = '$status', date_completed = '$date_completed' where id = $id";
        }
        mysqli_query(db(), $update);
        
        return mysqli_affected_rows(db());
    }

    function deleteOrderItem($id, $item_id) {
        
        $delete = "delete from order_item where order_header = $id and id = $item_id";
        
        mysqli_query(db(), $delete);
        
        return mysqli_affected_rows(db());
    }

    function changeOrderItem($id, $item_id, $quantity) {
        
        $update = "update order_item set quantity = quantity + $quantity where order_header = $id and id = $item_id";
        
        mysqli_query(db(), $update);
        
        return mysqli_affected_rows(db());
    }

    function getStatuses() {
        return ['New', 'In process', 'Completed', 'Cancelled'];        
    }
?>