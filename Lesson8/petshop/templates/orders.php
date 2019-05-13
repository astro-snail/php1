<div class="page top-overlap">
    <div class="section-header uppercase">My orders</div>
    <?php if ($orders === NULL || empty($orders)) { ?>
        You have no orders yet.   
    <?php } else { ?>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Status</th>
                <th>Created On</th>
                <th>Total</th>
                <th>Completed On</th>
                <th>&nbsp;</th>
            </tr>    
        </thead>
        <tbody>
            <?php foreach($orders as $order) { ?>  
            <tr>
                <td class="right">
                    <a href="index.php?c=order&id=<?= $order['id']; ?>" title="View order">
                        <?= $order['id']; ?>
                    </a>
                </td>
                <td class="center"><?= $order['status']; ?></td>
                <td class="center"><?= date("d F Y H:i:s", strtotime($order['date_created'])); ?></td>
                <td class="right"><?= number_format(getOrderTotal($order['id']), 2); ?></td>
                <td class="center"><?= !empty($order['date_completed']) ? date("d F Y H:i:s", strtotime($order['date_completed'])) : ""; ?></td>
                <td class="center">
                    <?php if ($order['status'] == 'New') { ?>
                    <form action="order.php" method="POST">
                        <input type="hidden" name="id" value="<?= $order['id']; ?>">
                        <input type="hidden" name="action" id="<?= $order['id']; ?>">
                        <a href="index.php?c=order&id=<?= $order['id']; ?>" title="Edit order">
                            <img src="images/icons8-edit-file-32.png">
                        </a>
                        <a href="javascript:;" onclick="document.getElementById('<?= $order['id']; ?>').value='cancelOrder';parentNode.submit();" title="Cancel order">
                            <img src="images/icons8-trash-can-32.png">
                        </a>
                    </form>    
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>  
    <?php } ?>
</div>