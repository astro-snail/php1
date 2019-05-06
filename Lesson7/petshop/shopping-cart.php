<?php
    include "model/shopping-cart.php";
    $shoppingCart = getShoppingCart();
?>

<div class="page top-overlap">
    <div class="section-header uppercase">Shopping cart</div>
    <?php if ($shoppingCart === NULL || empty($shoppingCart)) { ?>
        Your shopping cart is empty!   
    <?php } else { ?>
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
            <?php foreach($shoppingCart as $item) { ?>  
            <tr>
                <td>
                    <a href="index.php?p=products&id=<?= $item['id']; ?>"><?= $item['name']; ?></a>
                </td>
                <td class="right"><?= number_format($item['price'], 2); ?></td>
                <td class="center"><?= $item['quantity']; ?></td>
                <td class="center">
                    <form action="controller/shopping-cart.php" method="POST">
                        <input type="hidden" name="product" value="<?= $item['id']; ?>">
                        <input type="hidden" name="action" value="changeQuantity">
                        <input type="hidden" name="quantity" id="<?= $item['id']; ?>">
                        <a href="javascript:;" onclick="document.getElementById('<?= $item['id']; ?>').value='1';parentNode.submit();" title="More">
                            <img src="images/icons8-add-new-24.png">
                        </a>
                        <a href="javascript:;" onclick="document.getElementById('<?= $item['id']; ?>').value='-1';parentNode.submit();" title="Less">
                            <img src="images/icons8-reduce-24.png">
                        </a>
                    </form>    
                </td>
                <td class="right"><?= number_format($item['total'], 2); ?></td>
                <td class="center">
                    <form action="controller/shopping-cart.php" method="POST">
                        <input type="hidden" name="product" value="<?= $item['id']; ?>">
                        <input type="hidden" name="action" value="removeFromCart">
                        <a href="javascript:;" onclick="parentNode.submit();" title="Remove">
                            <img src="images/icons8-clear-shopping-cart-48.png">
                        </a>
                    </form>    
                </td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Total:</td>
                <td style="text-align: right;"><?= number_format(getCartTotal(), 2); ?></td>
            </tr>    
        </tfoot>    
    </table>  
    <form action="controller/shopping-cart.php" method="POST">
        <br>
        <button class="btn btn-primary" type="submit" name="action" value="createOrder">Place order</button>
        <button class="btn btn-secondary" type="submit" name="action" value="emptyCart">Remove all items</button>
    </form> 
    <?php } ?>
</div>