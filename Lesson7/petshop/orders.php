<?php
    include "model/order.php";
    $orders = getOrders();
?>

<div class="page top-overlap">
    <div class="section-header uppercase">My orders</div>
    <?php if ($orders === NULL || empty($orders)) { ?>
        You have no orders yet.   
    <?php } else { ?>
    <table>
        <thead>
            <tr>
                <th>Order No</th>
                <th>Status</th>
                <th>Created On</th>
                <th>Completed On</th>
                <th>Order Total</th>
                <th>Cancelled</th>
            </tr>    
        </thead>
        <tbody>
            <?php foreach($orders as $order) { ?>  
            <tr>
                <td><?= $order['id']; ?></td>
                <td class="center"><?= $order['status']; ?></td>
                <td class="center"><?= $order['date_created']; ?></td>
                <td class="center"><?= $order['date_completed']; ?></td>
                <td class="right"><?= number_format(getOrderTotal($order['id']), 2); ?></td>
                <td class="center"><?= $order['cancelled'] == true ? "Yes" : "No"; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>  
    <?php } ?>
</div>