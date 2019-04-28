<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>My Friend</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway|Roboto">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container-fluid slide">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-sm-6 col-xs-12">
                        <div class="slide-header"></div>
                    </div>
                    <div class="col-lg-9 col-md-7 col-sm-6 col-xs-12">
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
        
        <div class="container-fluid content">
            <div class="container">                
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-sm-12 uppercase">
                        <ul class="menu top-overlap level1"> <!-- title="Menu">-->
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
                        </ul>
                        <div class="banner">
                            <div class="banner-text uppercase">Now is open!</div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7 col-sm-12">
                        <div class="catalogue top-overlap">
                            <div class="section-header uppercase">Our products</div>
                            <div class="section">
                                
                            <?php
                                include "catalogue.php";
                                while($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $price = $row['price'];
                                    $image = $row['image_small'];
                                    $new = $row['new_flag'];
                                    $hot = $row['hot_flag'];
                            ?>        
                            <a href="product-info.php?id=<?= $id; ?>">
                                <div class="product">
                                    
                                    <?php if ($new) { ?>
                                    <div class="corner corner-new"></div>
                                    <div class="corner-text corner-text-new uppercase">New</div>
                                    <?php } else if ($hot) { ?>
                                    <div class="corner corner-hot"></div>
                                    <div class="corner-text corner-text-hot uppercase">Hot</div>
                                    <?php } ?>
                                    
                                    <div class="product-img">
                                        <img src="images/products/small/<?= $image; ?>">
                                    </div>
                                    <div class="product-descr">
                                        <div class="product-name"><?= $name; ?></div>
                                        <div class="product-price">
                                            <div class="price actual-price"><?= $price; ?></div>
                                            <div class="price former-price"></div>
                                        </div>
                                    </div>
                                </div>
                            </a> 
                            
                            <?php
                                }
                                mysqli_free_result($result);
                            ?>    
                            </div>                    
                        </div>
                    </div>
                </div>    

                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="brands">
                    <div class="brand-img">
                        <img src="images/Science-Diet-Company-Logo.jpg">
                    </div>
                    <div class="brand-img">
                        <img src="images/Brit-Company-Logo.jpg">
                    </div>
                    <div class="brand-img">
                        <img src="images/First-Mate-Company-Logo.jpg">
                    </div>
                    <div class="brand-img">
                        <img src="images/Iams-Company-Logo.jpg">
                    </div>
                    <div class="brand-img">
                        <img src="images/Purina-Company-Logo.jpg">
                    </div>
                    <div class="brand-img">
                        <img src="images/Almo-Nature-Company-Logo.png">
                    </div>
                    <div class="brand-img">
                        <img src="images/Royal-Canine-Company-Logo.jpg">
                    </div>
                    <div class="brand-img">
                        <img src="images/Nutri-Source-Company-Logo.jpg">
                    </div>
                </div>
                    </div>
                </div>    
                    
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="instagram instagram-header">
                            <a href="https://www.instagram.com/dogsofinstagram/" target="_blank">
                                <i class="fab fa-instagram"></i> Instagram feed: <span class="instagram-id">#dogsofinstagram</span>
                            </a>
                        </div>
                    </div>    
                </div>
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="instagram instagram-items">
                            <div class="instagram-item">
                                        <div class="instagram-img">
                                            <img src="images/image-2018-04-101.jpg">
                                        </div>
                                    </div> 
                            <div class="instagram-item">
                                        <div class="instagram-img">
                                            <img src="images/image-2018-04-102.jpg">
                                        </div>
                                    </div>
                            <div class="instagram-item">
                                        <div class="instagram-img">
                                            <img src="images/image-2018-04-103.jpg">
                                        </div>
                                    </div>
                            <div class="instagram-item">
                                        <div class="instagram-img">
                                            <img src="images/image-2018-04-104.jpg">
                                        </div>
                                    </div> 
                            <div class="instagram-item">
                                        <div class="instagram-img">
                                            <img src="images/image-2018-04-105.jpg">
                                        </div>
                                    </div>
                            <div class="instagram-item">
                                        <div class="instagram-img">
                                            <img src="images/image-2018-04-106.jpg">
                                        </div>
                                    </div>
                        </div>
                    </div>    
                </div>
                
                <div class="row no-gutters">
                    <div class="col-lg-4 col-sm-12">
                        <div class="social-logo-large logo-facebook">
                            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f fa-4x"></i></a>
                        </div>
                    </div>    
                    <div class="col-lg-4 col-sm-12">
                        <div class="social-logo-large logo-twitter">
                            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter fa-4x"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="social-logo-large logo-pinterest">
                            <a href="https://www.pinterest.com" target="_blank"><i class="fab fa-pinterest fa-4x"></i></a>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        
        <div class="container-fluid footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="footer-block">
                            <div class="footer-block-title">Category</div>
                            <div class="footer-block-content">
                                <a href="#">Home</a>
                                <a href="#">About us</a>
                                <a href="#">eShop</a>
                                <a href="#">Features</a>
                                <a href="#">New collections</a>
                                <a href="#">Blog</a>
                                <a href="#">Our experts</a>
                            </div>
                        </div>    
                    </div>    
                    <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="footer-block">
                            <div class="footer-block-title">Your Account</div>
                            <div class="footer-block-content">
                                <a href="#">Account</a>
                                <a href="#">Personal details</a>
                                <a href="#">Contact details</a>
                                <a href="#">Bonus points</a>
                                <a href="#">Personal offers</a>
                                <a href="#">Cart</a>
                                <a href="#">Order history</a>
                            </div>
                        </div>    
                    </div>    
                    <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="footer-block">
                            <div class="footer-block-title">Our Support</div>
                            <div class="footer-block-content">
                                <a href="#">FAQ</a>
                                <a href="#">Ask an expert</a>
                                <a href="#">Useful links</a>
                                <a href="#">Payment methods</a>
                                <a href="#">Delivery</a>
                                <a href="#">Return policy</a>
                                <a href="#">Terms and conditions</a>
                            </div>
                        </div>    
                    </div>    
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-block footer-block-wide">
                            <div class="footer-block-title">Newsletter</div>
                            <div class="footer-block-content footer-block-content-wide">
                                <p>Join thousands of other people - subscribe to our news:</p>
                                <form>
                                    <input class="uppercase" type="email" placeholder="Insert email" name="email">
                                    <input class="uppercase" type="submit" value="Submit">
                                </form>
                                <div class="payment">
                                    <img src="images/aex.png">
                                    <img src="images/mastercard.png">
                                    <img src="images/maestero.png">
                                    <img src="images/paypal.png">
                                    <img src="images/discover.png">
                                    <img src="images/visa_straight.png">
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-block footer-block-wide">
                            <div class="footer-block-title">About Us</div>
                            <div class="footer-block-content footer-block-content-wide">
                                <p>Lorem ipsum dolor sit amet, mel at odio assentior, viderer delicatissimi ad vix. Dicit diceret eum id. Reque causae has an, sed te primis virtute noluisse, ceteros volumus eu eam. Eu nam quaeque phaedrum reprimique, nostro vivendo ne ius.</p>
                                <p class="contact"><span class="fixed-width">Phone:</span>1-999-342-9876</p>
                                <p class="contact"><span class="fixed-width">E-Mail:</span><a href="mailto:info@surfhouse.com">info@myfriend.com</a></p>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>      
        </div>            
            
        <div class="container-fluid footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg 12 col-sm-12">
                        &copy; 2014 MYFRIEND. All rights reserved - Designed by theuncreativelab.com
                        <div class="social-logo-small">
                            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.pinterest.com" target="_blank"><i class="fab fa-pinterest"></i></a>
                            <a href="https://plus.google.com" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                            <a href="https://www.tumblr.com" target="_blank"><i class="fab fa-tumblr"></i></a>
                            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.rss.com" target="_blank"><i class="fas fa-rss"></i></a>
                        </div>
                    </div>    
                </div>
            </div>    
        </div>
    
    </body>

</html>    
