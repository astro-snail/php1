<ul class="menu top-overlap level1 uppercase"> <!-- title="Menu">-->
    <li class="caption">Menu</li>
    <li><a href="#">About</a></li>
    <li><a href="#">Dog shop</a></li>
    <li><a href="#">Cat shop</a></li>
    <li><a href="#">Special needs</a> 
        <ul class="submenu level2">
            <li><a href="#">Puppies<i class="select-arrow fas fa-angle-right"></i></a></li>
            <li><a href="#">Kittens<i class="select-arrow fas fa-angle-right"></i></a></li>
            <li><a href="#">Veterinary diet<i class="select-arrow fas fa-angle-right"></i></a>
                <ul class="submenu level3">
                    <li><a href="#">Joint care<i class="select-arrow fas fa-angle-right"></i></a></li>
                    <li><a href="#">Urinary &amp; renal support<i class="select-arrow fas fa-angle-right"></i></a></li>
                </ul>
            </li>
            <li><a href="#">Senior<i class="select-arrow fas fa-angle-right"></i></a></li>                               
        </ul>                                
    </li>
    <li><a href="#">Hygiene</a></li>
    <li><a href="#">Accessories</a></li>
    <li><a href="#">Sale</a></li>
    <li><a href="#">Brands</a></li>
    <li><a href="#">Blog</a></li>
    <li><a href="#">Books</a></li>                                
    <li><a href="#">Contact</a></li>  
    <?php if (isset($_SESSION['login'])) { ?>
        <li><a href="index.php?p=logout">Log Out</a></li>  
    <?php } ?>
</ul>
<div class="banner">
    <div class="banner-text uppercase">Now is open!</div>
</div>