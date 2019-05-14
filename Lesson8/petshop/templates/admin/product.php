<div class="page top-overlap">
    <div class="section-header uppercase">Product <?= $product['name']; ?></div>
    <form action="admin.php?c=product" method="POST">
        <input type="hidden" name="id" value="<?= $product['id']; ?>">
        <div class="form-group">
            <label for="category">Category</label>
			<select id="category" class="form-control" name="category" required>
                <?php foreach(getCategories() as $category) { ?>
                <option value="<?= $category['id']; ?>" <?= $product['category_id'] == $category['id'] ? "selected" : ""?>><?= $category['name']; ?></option>
                <?php } ?> 
            </select>   
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" class="form-control" type="text" name="name" value="<?= $product['name'] ?>" placeholder="Product name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input id="description" class="form-control" type="text" name="description" value="<?= $product['description']; ?>"placeholder="Product description">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input id="price" class="form-control" type="text" name="price" value="<?= number_format($product['price'], 2); ?>" placeholder="Price">
        </div>
        <div class="form-group">
            <label for="imageSmall">Image (small)</label>
            <input id="imageSmall" class="form-control" type="text" name="image_small" value="<?= $product['image_small']; ?>" placeholder="Image (small)">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input id="image" class="form-control" type="text" name="image" value="<?= $product['image']; ?>" placeholder="Image">
        </div>
        <div class="form-check">
            <input id="new" class="form-check-input" type="checkbox" name="new_flag" value="true" <?= (bool)$product['new_flag'] ? "checked" : "" ?>>
            <label class="form-check-label" for="new">New offer</label>
        </div>
        <div class="form-check">
            <input id="hot" class="form-check-input" type="checkbox" name="hot_flag" value="true" <?= (bool)$product['hot_flag'] ? "checked" : "" ?>>
            <label class="form-check-label" for="hot">Hot offer</label>
        </div>
        <div class="form-group">
            <label for="features">Product features</label>
            <textarea id="features" class="form-control" name="features" rows="5"><?= !empty($product['features']) ? implode('\n', $product['features']) : "" ?></textarea>
        </div>
        <?php if (!empty($product['id'])) { ?>
			<button class="btn btn-primary" type="submit" name="action" value="updateProduct">Update</button>
		<?php } else { ?>
			<button class="btn btn-primary" type="submit" name="action" value="createProduct">Create</button>
		<?php } ?>	
    </form>
</div>