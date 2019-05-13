<div class="row">
    <div class="col-sm-12">
        <div class="product-descr">Reviews</div>
        <ul class="product-reviews">
            <?php foreach($reviews as $review) { ?>
                <li><?= $review['date_created']." ".$review['text']; ?></li>    
            <?php } ?>       
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <form class="review" action="" method="POST">
            <div class="product-descr">Add your review:</div>                    
            <textarea class="form-control" name="text"></textarea><br>
            <input type="hidden" name="product" value=<?= $id; ?>>
            <button class="btn btn-primary" type="submit" name="action" value="addReview">Save</button>
        </form>
    </div>    
</div>