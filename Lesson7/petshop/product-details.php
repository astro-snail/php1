<div class="page top-overlap">
    <div class="section-header uppercase"><?= $product['name']; ?></div>
    <div class="row">
        <div class="col-lg-7 col-md-12 col-sm-12">
            <div class="product-info-img">
                <img src="images/products/big/<?= $product['image']; ?>" alt="<?= $product['name']; ?>">
            </div>
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12">
            <div class="product-descr">
                <?= $product['description']; ?>
                <div class="product-price">
                    <div class="price actual-price"><?= $product['price']; ?></div>
                </div>
            </div>
            <ul class="product-features">
                <?php foreach($product['features'] as $feature) { ?>
                    <li><?= $feature; ?></li>
                <?php } ?>   
            </ul>
            <div class="product-action">
                <form action="controller/shopping-cart.php" method="POST">
                    <input type="hidden" name="product" value="<?= $id; ?>">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="action" value="addToCart">
                    <a href="javascript:;" onclick="parentNode.submit();" title="Add to cart">
                        <img src="images/icons8-add-shopping-cart-48.png">
                    </a>
                </form> 
            </div>    
        </div>    
    </div>  
    <?php include "reviews.php"; ?>
</div>