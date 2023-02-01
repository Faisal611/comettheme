
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Comet | Creative Multi-Purpose HTML Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="css/bundle.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Halant:300,400" rel="stylesheet" type="text/css">
    <!--if lt IE 9
    script(src='http://html5shim.googlecode.com/svn/trunk/html5.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')
    -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-46276885-13', 'auto');
        ga('send', 'pageview');
    </script>
	<?php wp_head();?>
</head>
<body>
<!--<div id="loader">-->
<!--    <div class="centrize">-->
<!--        <div class="v-center">-->
<!--            <div id="mask"><span></span><span></span><span></span><span></span><span></span></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<header id="topnav">
    <div class="container">
        <div class="logo"><a href="<?php home_url();?>"><img src="<?php echo get_template_directory_uri().'/assets/images/logo_light.png';?>" alt="" class="logo-light"><img src="<?php echo get_template_directory_uri().'/assets/images/logo_dark.png'?>" alt="" class="logo-dark"></a></div>
        <div class="menu-extras">
            <div class="menu-item">
                <div class="cart"><a href="#"><i class="ti-bag"></i><span class="cart-number">2</span></a>
                    <div class="shopping-cart">
                        <div class="shopping-cart-info">
                            <div class="col-xs-6">
                                <div class="row">
                                    <h6 class="upper">Your Cart</h6>
                                </div>
                            </div>
                            <div class="col-xs-6 text-right">
                                <div class="row">
                                    <h6 class="upper">$399.99</h6>
                                </div>
                            </div>
                        </div>
                        <ul class="nav product-list">
                            <li>
                                <div class="product-thumbnail"><img src="images/shop/2.jpg" alt=""></div>
                                <div class="product-summary"><a href="#">Premium Suit Blazer</a><span>$199.99</span></div>
                            </li>
                            <li>
                                <div class="product-thumbnail"><img src="images/shop/5.jpg" alt=""></div>
                                <div class="product-summary"><a href="#">Reiss Vara Tailored Blazer</a><span>$199.99</span></div>
                            </li>
                        </ul>
                        <p><a href="#" class="btn btn-color btn-block btn-sm">Checkout</a></p>
                    </div>
                </div>
            </div>
            <div class="menu-item">
                <div class="search"><a href="#"><i class="ti-search"></i></a>
                    <div class="search-form">
                        <form action="#" class="inline-form">
                            <div class="input-group">
                                <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                      <button type="button" class="btn btn-color"><span><i class="ti-search"></i></span></button></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="menu-item"><a class="navbar-toggle">
                    <div class="lines"><span></span><span></span><span></span></div></a></div>
        </div>
        <div id="navigation">
            <?php
                wp_nav_menu(array(
                    'theme_location'    => 'main-menu',
                    'menu_class'        => 'navigation-menu',
//                    'fallback_cb'       => 'default_main_menu',
                    'walker'            => new Custom_Nav_Menu(),
                ));
            ?>
        </div>
    </div>
</header>
