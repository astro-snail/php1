<div class="page top-overlap">
    <div class="section-header uppercase">Order Management</div>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Status</th>
                <th>Created On</th>
                <th>Total</th>
                <th>Completed On</th>
                <th>User</th>
                <th>&nbsp;</th>
            </tr>    
        </thead>
        <tbody>
            <?php foreach($orders as $order) { ?>  
            <tr>
                <td class="right">
                    <a href="admin.php?c=order&id=<?= $order['id']; ?>" title="View order">
                        <?= $order['id']; ?>
                    </a>
                </td>
                <td class="center"><?= $order['status']; ?></td>
                <td class="center"><?= date("d F Y H:i:s", strtotime($order['date_created'])); ?></td>
                <td class="right"><?= number_format(getOrderTotal($order['id']), 2); ?></td>
                <td class="center"><?= !empty($order['date_completed']) ? date("d F Y H:i:s", strtotime($order['date_completed'])) : ""; ?></td>
                <td>
                    <a href="admin.php?c=user&id=<?= $order['user']; ?>" title="View user">
                        <?= getUserById($order['user'])['login']; ?>
                    </a>
                </td>
                <td class="center">
                    <?php if ($order['status'] == 'New') { ?>
                    <form action="admin.php?c=order" method="POST">
                        <input type="hidden" name="id" value="<?= $order['id']; ?>">
                        <input type="hidden" name="action" id="<?= $order['id']; ?>">
                        <a href="admin.php?c=order&id=<?= $order['id']; ?>" title="Edit order">
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
</div>