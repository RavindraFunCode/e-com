<?php 
    $userdata = is_user_login();
    $cat_url=base_url()."shop/";
    $category = $this->db->get_where($this->tbl_category, ['is_active'=>1])->result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Wolmart eCommmerce Marketplace HTML Template</title>
    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php  echo base_url();  ?>assets/web/assets/images/icons/favicon.png">
    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700'] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[0];
            wf.src = '<?php  echo base_url();  ?>assets/web/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>
   <link rel="stylesheet" type="text/css" href="<?php //  echo base_url();  ?>assets/web/assets/css/loader.css"> 
    <link rel="preload" href="<?php  echo base_url();  ?>assets/web/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="<?php  echo base_url();  ?>assets/web/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="<?php  echo base_url();  ?>assets/web/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
            crossorigin="anonymous">
    <link rel="preload" href="<?php  echo base_url();  ?>assets/web/assets/fonts/wolmart87d5.woff?png09e" as="font" type="font/woff" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="<?php  echo base_url();  ?>assets/web/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/web/assets/vendor/swiper/swiper-bundle.min.css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" type="text/css" href="<?php  echo base_url();  ?>assets/web/assets/vendor/magnific-popup/magnific-popup.min.css">

    <!-- Default CSS -->
   <link rel="stylesheet" type="text/css" href="<?php   echo base_url();  ?>assets/web/assets/css/style.min.css"> 


    <link rel="stylesheet" href="<?php  echo base_url();  ?>assets/web/assets/css/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" type="text/css" href="<?php   echo base_url();  ?>assets/web/assets/css/new_style.css"> 

</head>


<body>
    
    	<!-- Preloader -->
<section>
		<div id="preloader">
			<div id="ctn-preloader" class="ctn-preloader">
				<div class="animation-preloader">
					<div class="spinner"></div>
					<div class="txt-loading">
						<span data-text-preloader="L" class="letters-loading">
							L
						</span>
						
						<span data-text-preloader="O" class="letters-loading">
							O
						</span>
						
						<span data-text-preloader="A" class="letters-loading">
							A
						</span>
						
						<span data-text-preloader="D" class="letters-loading">
							D
						</span>
						
						<span data-text-preloader="I" class="letters-loading">
							I
						</span>
						
						<span data-text-preloader="N" class="letters-loading">
							N
						</span>
						
						<span data-text-preloader="G" class="letters-loading">
							G
						</span>
					</div>
				</div>	
				<div class="loader-section section-left"></div>
				<div class="loader-section section-right"></div>
			</div>
		</div>
	</section> 
	
    <script>
        $(document).ready(function() {
  
          setTimeout(function() {
            $('#ctn-preloader').addClass('loaded');
            // Una vez haya terminado el preloader aparezca el scroll
            $('body').removeClass('no-scroll-y');

            if ($('#ctn-preloader').hasClass('loaded')) {
              // Es para que una vez que se haya ido el preloader se elimine toda la seccion preloader
              $('#preloader').delay(1000).queue(function() {
                $(this).remove();
              });
            }
          }, 3000);
          
        });
    </script> 
 <!-- loader end -->  
    
    
    
    
    <div class="page-wrapper">
        <!-- Start of Header -->
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">Welcome to Wolmart Store message or remove it!</p>
                    </div>
                    <div class="header-right">
                        <div class="dropdown">
                            <a href="#currency">USD</a>
                            <div class="dropdown-box">
                                <a href="#USD">USD</a>
                                <a href="#EUR">EUR</a>
                            </div>
                        </div>
                        <!-- End of DropDown Menu -->

                        <div class="dropdown">
                            <a href="#language"><img src="<?php  echo base_url();  ?>assets/web/assets/images/flags/eng.png" alt="ENG Flag" width="14"
                                    height="8" class="dropdown-image" /> ENG</a>
                            <div class="dropdown-box">
                                <a href="#ENG">
                                    <img src="<?php  echo base_url();  ?>assets/web/assets/images/flags/eng.png" alt="ENG Flag" width="14" height="8"
                                        class="dropdown-image" />
                                    ENG
                                </a>
                                <a href="#FRA">
                                    <img src="<?php  echo base_url();  ?>assets/web/assets/images/flags/fra.png" alt="FRA Flag" width="14" height="8"
                                        class="dropdown-image" />
                                    FRA
                                </a>
                            </div>
                        </div>
                        <!-- End of Dropdown Menu -->
                        <span class="divider d-lg-show"></span>
                        <a href="blog.html" class="d-lg-show">Blog</a>
                        <a href="<?php  echo base_url('contact-us');  ?>" class="d-lg-show">Contact Us</a>
                        
                        <?php if(!empty($userdata)){ ?>
                        <a href="<?php echo base_url('account') ?>" class="d-lg-show">My Account</a>
                        <?php } ?>
                        
                        <?php if(empty($userdata)){ ?>
                        <a href="<?php  echo base_url('user-login') ?>" class="d-lg-show login"><i
                                class="w-icon-account"></i>Sign In</a>
                        <span class="delimiter d-lg-show">/</span>
                        <a href="<?php  echo base_url('user-registration') ?>" class="ml-0 d-lg-show login">Register</a>
                        <?php } ?>
                        
                         <?php if(!empty($userdata)){ ?>
                        <a href="<?php echo base_url('User/userlogout') ?>" class="d-lg-show"> Logout </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- End of Header Top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left mr-md-4">
                        <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                        </a>
                        <a href="<?php echo base_url();  ?>" class="logo ml-lg-0">
                            <img src="<?php  echo base_url();  ?>assets/web/assets/images/logo.png" alt="logo" width="144" height="45" />
                        </a>
                        <form method="get" action="<?php echo base_url('shop');  ?>" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                            <div class="select-box">
                                <select id="category" name="category">
                                    <option value="">All Categories</option>
                                    <?php
                                        foreach ($category as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value->slug; ?>"><?php echo $value->cat_name; ?></option>
                                    <?php
                                        }
                                    ?>
                                    <!-- <option value="5">Furniture</option>
                                    <option value="6">Shoes</option>
                                    <option value="7">Sports</option>
                                    <option value="8">Games</option>
                                    <option value="9">Computers</option>
                                    <option value="10">Electronics</option>
                                    <option value="11">Kitchen</option>
                                    <option value="12">Clothing</option> -->
                                </select>
                            </div>
                            <input type="text" class="form-control" name="search" id="search"
                                placeholder="Search in..." required />
                            <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="header-right ml-4">
                        <div class="header-call d-xs-show d-lg-flex align-items-center">
                            <a href="tel:#" class="w-icon-call"></a>
                            <div class="call-info d-lg-show">
                                <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                    <a href="mailto:#" class="text-capitalize">Live Chat</a> or :</h4>
                                <a href="tel:#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
                            </div>
                        </div>
                        <a class="wishlist label-down link d-xs-show" href="wishlist.html">
                            <i class="w-icon-heart"></i>
                            <span class="wishlist-label d-lg-show">Wishlist</span>
                        </a>
                        <a class="compare label-down link d-xs-show" href="compare.html">
                            <i class="w-icon-compare"></i>
                            <span class="compare-label d-lg-show">Compare</span>
                        </a>
                        <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                            <div class="cart-overlay"></div>
                            <?php
                                $this->cart->total_items();
                            ?>
                            <a href="#" class="cart-toggle label-down link">
                                <i class="w-icon-cart">
                                    <span class="cart-count"></span>
                                </i>
                                <span class="cart-label">Cart</span>
                            </a>
                            <div class="dropdown-box">
                                <div class="cart-header">
                                    <span>Shopping Cart</span>
                                    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                                </div>

                                <div class="products" id="cart-products">
                                    <div class="product product-cart">
                                        <div class="product-detail">
                                            <a href="product-default.html" class="product-name">Beige knitted
                                                elas<br>tic
                                                runner shoes</a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">$25.68</span>
                                            </div>
                                        </div>
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="<?php  echo base_url();  ?>assets/web/assets/images/cart/product-1.jpg" alt="product" height="84"
                                                    width="94" />
                                            </a>
                                        </figure>
                                        <button class="btn btn-link btn-close" aria-label="button">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>

                                    <div class="product product-cart">
                                        <div class="product-detail">
                                            <a href="product-default.html" class="product-name">Blue utility
                                                pina<br>fore
                                                denim dress</a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">$32.99</span>
                                            </div>
                                        </div>
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="<?php  echo base_url();  ?>assets/web/assets/images/cart/product-2.jpg" alt="product" width="84"
                                                    height="94" />
                                            </a>
                                        </figure>
                                        <button class="btn btn-link btn-close" aria-label="button">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price" id="total-price">$58.67</span>
                                </div>

                                <div class="cart-action">
                                    <a href="<?php echo base_url('cart'); ?>" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                                    <a href="<?php echo base_url('checkout'); ?>" class="btn btn-primary  btn-rounded">Checkout</a>
                                </div>
                            </div>
                            <!-- End of Dropdown Box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Header Middle -->

            <div class="header-bottom sticky-content fix-top sticky-header">
                <div class="container">
                    <div class="inner-wrap">
                        <div class="header-left">
                            <div class="dropdown category-dropdown has-border" data-visible="true">
                                <a href="#" class="category-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true" data-display="static"
                                    title="Browse Categories">
                                    <i class="w-icon-category"></i>
                                    <span>Browse Categories</span>
                                </a>

                                <div class="dropdown-box">
                                    <ul class="menu vertical-menu category-menu">
                                        <?php
                                            foreach ($category as $key => $value) {
                                         ?>
                                        <li>
                                            <a href="<?php echo $cat_url.'?category='.$value->slug; ?>">
                                                <i class="w-icon-heartbeat"></i><?php echo $value->cat_name; ?>
                                            </a>
                                        </li>
                                        <?php
                                            }
                                         ?>
                                        <!-- <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-tshirt2"></i>Fashion
                                            </a>
                                            <ul class="megamenu">
                                                <li>
                                                    <h4 class="menu-title">Women</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Jewlery &
                                                                Watches</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Sale</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <h4 class="menu-title">Men</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Jewlery &
                                                                Watches</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="banner-fixed menu-banner menu-banner2">
                                                        <figure>
                                                            <img src="<?php  echo base_url();  ?>assets/web/assets/images/menu/banner-2.jpg" alt="Menu Banner"
                                                                width="235" height="347" />
                                                        </figure>
                                                        <div class="banner-content">
                                                            <div class="banner-price-info mb-1 ls-normal">Get up to
                                                                <strong
                                                                    class="text-primary text-uppercase">20%Off</strong>
                                                            </div>
                                                            <h3 class="banner-title ls-normal">Hot Sales</h3>
                                                            <a href="shop-banner-sidebar.html"
                                                                class="btn btn-dark btn-sm btn-link btn-slide-right btn-icon-right">
                                                                Shop Now<i class="w-icon-long-arrow-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-home"></i>Home & Garden
                                            </a>
                                            <ul class="megamenu">
                                                <li>
                                                    <h4 class="menu-title">Bedroom</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">Beds, Frames &
                                                                Bases</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Dressers</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Nightstands</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Kid's Beds &
                                                                Headboards</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Armoires</a></li>
                                                    </ul>

                                                    <h4 class="menu-title mt-1">Living Room</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">Coffee Tables</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Chairs</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Tables</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Futons & Sofa
                                                                Beds</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Cabinets &
                                                                Chests</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <h4 class="menu-title">Office</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">Office Chairs</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Desks</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Bookcases</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">File Cabinets</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Breakroom
                                                                Tables</a></li>
                                                    </ul>

                                                    <h4 class="menu-title mt-1">Kitchen & Dining</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">Dining Sets</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Kitchen Storage
                                                                Cabinets</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Bashers Racks</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Dining Chairs</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Dining Room
                                                                Tables</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Bar Stools</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="menu-banner banner-fixed menu-banner3">
                                                        <figure>
                                                            <img src="<?php  echo base_url();  ?>assets/web/assets/images/menu/banner-3.jpg" alt="Menu Banner"
                                                                width="235" height="461" />
                                                        </figure>
                                                        <div class="banner-content">
                                                            <h4
                                                                class="banner-subtitle font-weight-normal text-white mb-1">
                                                                Restroom</h4>
                                                            <h3
                                                                class="banner-title font-weight-bolder text-white ls-normal">
                                                                Furniture Sale</h3>
                                                            <div
                                                                class="banner-price-info text-white font-weight-normal ls-25">
                                                                Up to <span
                                                                    class="text-secondary text-uppercase font-weight-bold">25%
                                                                    Off</span></div>
                                                            <a href="shop-banner-sidebar.html"
                                                                class="btn btn-white btn-link btn-sm btn-slide-right btn-icon-right">
                                                                Shop Now<i class="w-icon-long-arrow-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-electronics"></i>Electronics
                                            </a>
                                            <ul class="megamenu">
                                                <li>
                                                    <h4 class="menu-title">Laptops &amp; Computers</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">Desktop
                                                                Computers</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Monitors</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Laptops</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Hard Drives &amp;
                                                                Storage</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Computer
                                                                Accessories</a></li>
                                                    </ul>

                                                    <h4 class="menu-title mt-1">TV &amp; Video</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">TVs</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Home Audio
                                                                Speakers</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Projectors</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Media Streaming
                                                                Devices</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <h4 class="menu-title">Digital Cameras</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">Digital SLR
                                                                Cameras</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Sports & Action
                                                                Cameras</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Camera Lenses</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Photo Printer</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Digital Memory
                                                                Cards</a></li>
                                                    </ul>

                                                    <h4 class="menu-title mt-1">Cell Phones</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                        <li><a href="shop-fullwidth-banner.html">Carrier Phones</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Unlocked Phones</a>
                                                        </li>
                                                        <li><a href="shop-fullwidth-banner.html">Phone & Cellphone
                                                                Cases</a></li>
                                                        <li><a href="shop-fullwidth-banner.html">Cellphone
                                                                Chargers</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="menu-banner banner-fixed menu-banner4">
                                                        <figure>
                                                            <img src="<?php  echo base_url();  ?>assets/web/assets/images/menu/banner-4.jpg" alt="Menu Banner"
                                                                width="235" height="433" />
                                                        </figure>
                                                        <div class="banner-content">
                                                            <h4 class="banner-subtitle font-weight-normal">Deals Of The
                                                                Week</h4>
                                                            <h3 class="banner-title text-white">Save On Smart EarPhone
                                                            </h3>
                                                            <div
                                                                class="banner-price-info text-secondary font-weight-bolder text-uppercase text-secondary">
                                                                20% Off</div>
                                                            <a href="shop-banner-sidebar.html"
                                                                class="btn btn-white btn-outline btn-sm btn-rounded">Shop
                                                                Now</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-furniture"></i>Furniture
                                            </a>
                                            <ul class="megamenu type2">
                                                <li class="row">
                                                    <div class="col-md-3 col-lg-3 col-6">
                                                        <h4 class="menu-title">Furniture</h4>
                                                        <hr class="divider" />
                                                        <ul>
                                                            <li><a href="shop-fullwidth-banner.html">Sofas & Couches</a>
                                                            </li>
                                                            <li><a href="shop-fullwidth-banner.html">Armchairs</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">Bed Frames</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">Beside Tables</a>
                                                            </li>
                                                            <li><a href="shop-fullwidth-banner.html">Dressing Tables</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-6">
                                                        <h4 class="menu-title">Lighting</h4>
                                                        <hr class="divider" />
                                                        <ul>
                                                            <li><a href="shop-fullwidth-banner.html">Light Bulbs</a>
                                                            </li>
                                                            <li><a href="shop-fullwidth-banner.html">Lamps</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">Celling Lights</a>
                                                            </li>
                                                            <li><a href="shop-fullwidth-banner.html">Wall Lights</a>
                                                            </li>
                                                            <li><a href="shop-fullwidth-banner.html">Bathroom
                                                                    Lighting</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-6">
                                                        <h4 class="menu-title">Home Accessories</h4>
                                                        <hr class="divider" />
                                                        <ul>
                                                            <li><a href="shop-fullwidth-banner.html">Decorative
                                                                    Accessories</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">Candals &
                                                                    Holders</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">Home Fragrance</a>
                                                            </li>
                                                            <li><a href="shop-fullwidth-banner.html">Mirrors</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">Clocks</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-6">
                                                        <h4 class="menu-title">Garden & Outdoors</h4>
                                                        <hr class="divider" />
                                                        <ul>
                                                            <li><a href="shop-fullwidth-banner.html">Garden
                                                                    Furniture</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">Lawn Mowers</a>
                                                            </li>
                                                            <li><a href="shop-fullwidth-banner.html">Pressure
                                                                    Washers</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">All Garden
                                                                    Tools</a></li>
                                                            <li><a href="shop-fullwidth-banner.html">Outdoor Dining</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-6">
                                                        <div class="banner banner-fixed menu-banner5 br-xs">
                                                            <figure>
                                                                <img src="<?php  echo base_url();  ?>assets/web/assets/images/menu/banner-5.jpg" alt="Banner"
                                                                    width="410" height="123"
                                                                    style="background-color: #D2D2D2;" />
                                                            </figure>
                                                            <div class="banner-content text-right y-50">
                                                                <h4
                                                                    class="banner-subtitle font-weight-normal text-default text-capitalize">
                                                                    New Arrivals</h4>
                                                                <h3
                                                                    class="banner-title font-weight-bolder text-capitalize ls-normal">
                                                                    Amazing Sofa</h3>
                                                                <div
                                                                    class="banner-price-info font-weight-normal ls-normal">
                                                                    Starting at <strong>$125.00</strong></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="banner banner-fixed menu-banner5 br-xs">
                                                            <figure>
                                                                <img src="<?php  echo base_url();  ?>assets/web/assets/images/menu/banner-6.jpg" alt="Banner"
                                                                    width="410" height="123"
                                                                    style="background-color: #9F9888;" />
                                                            </figure>
                                                            <div class="banner-content y-50">
                                                                <h4
                                                                    class="banner-subtitle font-weight-normal text-white text-capitalize">
                                                                    Best Seller</h4>
                                                                <h3
                                                                    class="banner-title font-weight-bolder text-capitalize text-white ls-normal">
                                                                    Chair &amp; Lamp</h3>
                                                                <div
                                                                    class="banner-price-info font-weight-normal ls-normal text-white">
                                                                    From <strong>$165.00</strong></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-heartbeat"></i>Healthy & Beauty
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-gift"></i>Gift Ideas
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-gamepad"></i>Toy & Games
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-ice-cream"></i>Cooking
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-ios"></i>Smart Phones
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-camera"></i>Cameras & Photo
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-fullwidth-banner.html">
                                                <i class="w-icon-ruby"></i>Accessories
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-banner-sidebar.html"
                                                class="font-weight-bold text-primary text-uppercase ls-25">
                                                View All Categories<i class="w-icon-angle-right"></i>
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <nav class="main-nav">
                                <ul class="menu active-underline">
                                    <li>
                                        <a href="<?php echo base_url();  ?>">Home</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('shop');  ?>">Shop</a>
                                    </li>
                                    <?php
                                        foreach ($category as $key => $value) {
                                            if($value->is_menu==1){
                                           // $sub_cate = $this->db->get_where($this->tbl_product, ['id' => $value['id']])->row_array();
                                     ?>
                                    <li>
                                        <a href="<?php echo $cat_url.'?category='.$value->slug; ?>"><?php echo $value->cat_name; ?></a>
                                    </li>
                                    <?php
                                            }
                                        }
                                     ?>
                                    <!-- <li class="active">
                                        <a href="blog.html">Blog</a>
                                        <ul>
                                            <li><a href="blog.html">Classic</a></li>
                                            <li><a href="blog-listing.html">Listing</a></li>
                                            <li>
                                                <a href="blog-grid-3cols.html">Grid</a>
                                                <ul>
                                                    <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                                    <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                                    <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                                    <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="blog-masonry-3cols.html">Masonry</a>
                                                <ul>
                                                    <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                                    <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                                    <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                                    <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="blog-mask-grid.html">Mask</a>
                                                <ul>
                                                    <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                                    <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="post-single.html">Single Post</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="about-us.html">Pages</a>
                                        <ul>

                                            <li><a href="about-us.html">About Us</a></li>
                                            <li><a href="become-a-vendor.html">Become A Vendor</a></li>
                                            <li><a href="contact-us.html">Contact Us</a></li>
                                            <li><a href="faq.html">FAQs</a></li>
                                            <li><a href="error-404.html">Error 404</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="my-account.html">My Account</a></li>
                                            <li><a href="compare.html">Compare</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="elements.html">Elements</a>
                                        <ul>
                                            <li><a href="element-accordions.html">Accordions</a></li>
                                            <li><a href="element-alerts.html">Alert &amp; Notification</a></li>
                                            <li><a href="element-blog-posts.html">Blog Posts</a></li>
                                            <li><a href="element-buttons.html">Buttons</a></li>
                                            <li><a href="element-cta.html">Call to Action</a></li>
                                            <li><a href="element-icons.html">Icons</a></li>
                                            <li><a href="element-icon-boxes.html">Icon Boxes</a></li>
                                            <li><a href="element-instagrams.html">Instagrams</a></li>
                                            <li><a href="element-categories.html">Product Category</a></li>
                                            <li><a href="element-products.html">Products</a></li>
                                            <li><a href="element-tabs.html">Tabs</a></li>
                                            <li><a href="element-testimonials.html">Testimonials</a></li>
                                            <li><a href="element-titles.html">Titles</a></li>
                                            <li><a href="element-typography.html">Typography</a></li>

                                            <li><a href="element-vendors.html">Vendors</a></li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right">
                            <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                            <a href="#"><i class="w-icon-sale"></i>Daily Deals</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End of Header -->