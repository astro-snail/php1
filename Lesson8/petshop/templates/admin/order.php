<div class="page top-overlap">
    <div class="section-header uppercase">Order No. <?= $order['id']; ?></div>
    <form action="admin.php?c=order" method="POST">
        <input type="hidden" name="id" value="<?= $order['id']; ?>">
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" class="form-control" name="status" required>
                <?php foreach(getStatuses() as $status) { ?>
                <option value="<?= $status; ?>" <?= $order['status'] == $status ? "selected" : ""?>><?= $status; ?></option>
                <?php } ?> 
            </select>    
        </div>
        <div class="form-group">
            <label for="user">Created by</label>
            <input id="user" class="form-control" type="text" name="user" value="<?= getUserById($order['user'])['login'] ?>" disabled>
        </div>
        <div class="form-group">
            <label for="dateCreated">Created on</label>
            <input id="dateCreated" class="form-control" type="datetime" name="date_created" value="<?= $order['date_created']; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="dateCompleted">Completed on</label>
            <input id="dateCompleted" class="form-control" type="datetime" name="date_completed" value="<?= $order['date_completed'] == null ? "" : date('Y-m-d H:i:s', strtotime($order['date_completed'])) ?>">
        </div>
        <button class="btn btn-primary" type="submit" name="action" value="updateOrder">Update</button>
    </form>
    <br>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>&nbsp;</th>
                <th>Amount</th>
                <th>&nbsp;</th>
            </tr>    
        </thead>
        <tbody>
            <?php foreach($items as $item) { ?>  
            <tr>
                <td>
                    <a href="admin.php?c=product&id=<?= $item['product']; ?>" title="View product">
                        <?= $item['name']; ?>
                    </a>
                </td>
                <td class="right"><?= number_format($item['price'], 2); ?></td>
                <td class="center"><?= $item['quantity']; ?></td>
                <td class="center">
                    <?php if ($order['status'] == 'New') { ?>
                    <form action="admin.php?c=order" method="POST">
                        <input type="hidden" name="id" value="<?= $order['id']; ?>">
                        <input type="hidden" name="item_id" value="<?= $item['item_id']; ?>">
                        <input type="hidden" name="quantity" id="<?= $item['item_id']; ?>">
                        <input type="hidden" name="action" value="changeOrderItem">
                        <a href="javascript:;" onclick="document.getElementById('<?= $item['item_id']; ?>').value='1';parentNode.submit();" title="More">
                            <img src="images/icons8-add-new-24.png">
                        </a>
                        <a href="javascript:;" onclick="document.getElementById('<?= $item['item_id']; ?>').value='-1';parentNode.submit();" title="Less">
                            <img src="images/icons8-reduce-24.png">
                        </a>
                    </form>  
                    <?php } ?>
                </td>
                <td class="right"><?= number_format($item['amount'], 2); ?></td>
                <td class="center">
                    <?php if ($order['status'] == 'New') { ?>
                    <form action="admin.php?c=order" method="POST">
                        <input type="hidden" name="id" value="<?= $order['id']; ?>">
                        <input type="hidden" name="item_id" value="<?= $item['item_id']; ?>">
                        <input type="hidden" name="action" value="deleteOrderItem">
                        <a href="javascript:;" onclick="parentNode.submit();" title="Remove">
                            <img src="images/icons8-trash-can-32.png">
                        </a>
                    </form>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>            
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Total:</td>
                <td style="text-align: right;"><?= number_format(getOrderTotal($order['id']), 2); ?></td>
            </tr>    
        </tfoot>  
    </table>  
</div>