<?php
    require_once "product.php";

    function isInCart($id) {
        return !empty($_SESSION['cart']) && in_array($id, array_keys($_SESSION['cart']));
    }

    function updateTotal($id) {
        if (isInCart($id)) {
            $_SESSION['cart'][$id]['total'] = $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['quantity'];
        }
    }

    function addProduct($id, $quantity) {
        if (!isInCart($id)) {
            $product = getProduct($id);
            $_SESSION['cart'][$id] = $product;
            $_SESSION['cart'][$id]['quantity'] = $quantity;
        } else {
            $_SESSION['cart'][$id]['quantity'] += $quantity;
        }
        updateTotal($id);
    }

    function removeProduct($id) {
        unset($_SESSION['cart'][$id]);
    }

    // to add pass in positive quantity
    // to subtract pass in negative quantity
    function changeQuantity($id, $quantity) {
        if (!isInCart($id)) {
            return;
        }
        $_SESSION['cart'][$id]['quantity'] += $quantity;
        
        if ($_SESSION['cart'][$id]['quantity'] <= 0) {
            removeProduct($id);
        } else {
            updateTotal($id);
        }
    }

    function emptyShoppingCart() {
        unset($_SESSION['cart']);
    }

    function getShoppingCart() {
        return $_SESSION['cart'];
    }

    function getCartTotal() {
        $total = 0;
        if (!empty($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $item) {
                $total += $item['total'];
            }
        }
        return $total;
    }

    function saveShoppingCart($user) {
        if (!isset($_SESSION['cart'])) {
            return;
        }
        foreach($_SESSION['cart'] as $key => $value) {            
            $values[] = "($user, {$value['id']}, {$value['quantity']})";
        }
        $insert = "insert into shopping_cart (user, product, quantity) values ".implode(',', $values);
        mysqli_query(db(), $insert);

        return mysqli_affected_rows(db());
    }
?>