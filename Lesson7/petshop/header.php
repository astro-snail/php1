<div class="container-fluid slide">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5 col-sm-6 col-xs-12">
                <a href="index.php"><div class="slide-header"></div></a>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-3 col-xs-6 left-block">
                <div class="top-links">
                <?php if (!isset($_SESSION['login'])) { ?>
                    <a href="index.php?p=login">Log In</a>    
                <?php } else { ?>
                    <a href="index.php?p=orders">Welcome, <?= $_SESSION['login']; ?></a>
                <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-3 col-xs-6 right-block">
                <div class="top-links"><a href="index.php?p=shopping-cart">Shopping Cart: <?= sizeof($_SESSION['cart']); ?></a></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="social-logo-small">
                    <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.pinterest.com" target="_blank"><i class="fab fa-pinterest"></i></a>
                    <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>    
        </div> 
        <div class="row">
            <div class="col-lg-3 col-md-5 col-sm-12">
                <div class="slide-welcome">
                    <p class="slide-welcome-header uppercase">Welcome to My Friend</p>
                    <p class="slide-welcome-text">The only online store you will ever go to for all your pets' needs: food, toys, accessories, and more</p>
                </div>
            </div>    
            <div class="col-lg-5 offset-lg-4 col-md-7 col-sm-12">
                <div class="slide-title">
                    <p class="slide-title-header uppercase">Spring Raffle 2018</p>
                    <p class="slide-title-text">Raffles are a very important way in which we raise money for thousands of stray and abandoned animals. Order your tickets online</p>
                </div>
                <a class="button uppercase" href="#">Order now</a>
            </div>    
        </div>
    </div>
</div>