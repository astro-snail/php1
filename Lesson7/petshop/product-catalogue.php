<?php
    $products = getAllProducts();     
?>

<div class="catalogue top-overlap">
    <div class="section-header uppercase">Our products</div>
    <div class="section">
        <?php foreach($products as $product) { ?>        
        <div class="product">
            <?php if ($product['new_flag']) { ?>
            <div class="corner corner-new"></div>
            <div class="corner-text corner-text-new uppercase">New</div>
            <?php } else if ($product['hot_flag']) { ?>
            <div class="corner corner-hot"></div>
            <div class="corner-text corner-text-hot uppercase">Hot</div>
            <?php } ?>
            <a href="index.php?p=products&id=<?= $product['id']; ?>">
                <div class="product-img">
                    <img src="images/products/small/<?= $product['image_small']; ?>">
                </div>
            </a>    
            <div class="product-descr">
                <div class="product-name"><?= $product['name']; ?></div>
                <div class="product-price">
                    <div class="price actual-price"><?= $product['price']; ?></div>
                    <div class="price former-price"></div>
                </div>
            </div>
            <div class="product-action">
                <form action="controller/shopping-cart.php" method="POST">
                    <input type="hidden" name="product" value="<?= $product['id']; ?>">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="action" value="addToCart">
                    <a href="javascript:;" onclick="parentNode.submit();" title="Add to cart">
                        <img src="images/icons8-add-shopping-cart-48.png">
                    </a>
                </form>
            </div>    
        </div>
        <?php } ?>    
    </div>                    
</div>