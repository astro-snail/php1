<div class="page top-overlap">
    <div class="section-header uppercase">Product Management</div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>New</th>
                <th>Hot</th>
                <th>&nbsp;</th>
            </tr>    
        </thead>
        <tbody>
            <?php foreach($products as $product) { ?>  
            <tr>
                <td>
                    <a href="admin.php?c=product&id=<?= $product['id']; ?>" title="View product">
                        <?= $product['name']; ?>
                    </a>
                </td>
                <td><?= $product['category']; ?></td>
                <td class="right"><?= $product['price']; ?></td>
                <td rowspan="2" class="center">
                    <?php if ((bool)$product['new_flag']) { ?>
                        <img src="images/icons8-checkmark-48.png">
                    <?php } ?>
                </td>
                <td rowspan="2" class="center">
                    <?php if ((bool)$product['hot_flag']) { ?>
                        <img src="images/icons8-checkmark-48.png">
                    <?php } ?>
                </td>
                <td rowspan="2" class="center">
                    <form action="admin.php?c=product" method="POST">
                        <input type="hidden" name="id" value="<?= $product['id']; ?>">
                        <input type="hidden" name="action" id="<?= $product['id']; ?>">
                        <a href="admin.php?c=product&id=<?= $product['id']; ?>" title="Update product">
                            <img src="images/icons8-edit-file-32.png">
                        </a>
                        <a href="javascript:;" onclick="document.getElementById('<?= $product['id']; ?>').value='deleteProduct';parentNode.submit();" title="Delete product">
                            <img src="images/icons8-trash-can-32.png">
                        </a>
                    </form>    
                </td>
            </tr>
            <tr>
                <td colspan="3"><?= $product['description']; ?></td>
            </tr>
            <tr>
                <td colspan="6">&nbsp</td>
            </tr>
            <?php } ?>
        </tbody>
    </table> 
	<button class="btn btn-primary" onclick="window.location.href = 'admin.php?c=product&create=true';">New product</button>
</div>