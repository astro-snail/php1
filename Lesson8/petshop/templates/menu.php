<ul class="menu top-overlap level1 uppercase">
    <li class="caption">Menu</li>
    <li><a href="index.php?c=product">All products</a></li>
    <?php foreach($categories as $category) { ?>
        <li><a href="index.php?c=product&category=<?= $category['id']; ?>"><?= $category['name']; ?></a></li>
    <?php } ?>
    
    <?php if ((bool)$currentUser['administrator']) { ?>
        <li><a href="#">Control panel</a>
            <ul class="submenu level2">
                <li><a href="admin.php?c=product">Products<i class="select-arrow fas fa-angle-right"></i></a></li>  
                <li><a href="admin.php?c=order">Orders<i class="select-arrow fas fa-angle-right"></i></a>
                    <ul class="submenu level3">
                        <li><a href="admin.php?c=order&active=true">Active orders<i class="select-arrow fas fa-angle-right"></i></a></li>
                        <li><a href="admin.php?c=order&active=false">Completed orders<i class="select-arrow fas fa-angle-right"></i></a></li>
                    </ul>                
                </li>
                <li><a href="admin.php?c=user">Users<i class="select-arrow fas fa-angle-right"></i></a></li>                   
            </ul>  
        </li>
    <?php } ?>

    <li><a href="#">About</a></li>
    <li><a href="#">Contact</a></li>  
    <?php if (isset($_SESSION['login'])) { ?>
        <li><a href="index.php?c=order">Мои заказы</a></li>  
        <li><a href="index.php?c=user">Log Out</a></li>  
    <?php } ?>
</ul>
<div class="banner">
    <div class="banner-text uppercase">Now is open!</div>
</div>