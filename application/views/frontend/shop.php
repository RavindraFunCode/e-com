<style type="text/css">
   li{
      padding: 1rem 0 1rem 0.2rem;
   }
   #loading {
      text-align:center; 
      background: url('https://i.gifer.com/ZZ5H.gif') no-repeat center; 
      height: 300px;
   }
</style>
<!--Start of Main -->
<main class="main">
   <!-- Start of Page Header -->
   <div class="page-header">
      <div class="container">
         <h1 class="page-title mb-0">Shop</h1>
      </div>
   </div>
   <!-- End of Page Header -->
   <!-- Start of Breadcrumb -->
   <nav class="breadcrumb-nav mb-10 pb-1">
      <div class="container">
         <ul class="breadcrumb">
            <li><a href="<?php  echo base_url(); ?>">Home</a></li>
            <li>Shop</li>
         </ul>
      </div>
   </nav>
   <!-- End of Breadcrumb -->
   <!-- End of Breadcrumb -->
   <!-- Start of Page Content -->
   <div class="page-content">
      <div class="container">
         <!-- Start of Shop Content -->
         <div class="shop-content row gutter-lg mb-10">
            <!-- Start of Sidebar, Shop Sidebar -->
            <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
               <!-- Start of Sidebar Overlay -->
               <div class="sidebar-overlay"></div>
               <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
               <!-- Start of Sidebar Content -->
               <div class="sidebar-content scrollable">
                  <!-- Start of Sticky Sidebar -->
                  <div class="sticky-sidebar">
                     <div class="filter-actions">
                        <label>Filter :</label>
                        <a href="<?php echo base_url('shop');  ?>" class="btn btn-dark btn-link filter-clean">Clean All</a>
                     </div>
                     <!-- Start of Collapsible widget -->
                     <div class="widget widget-collapsible">
                        <h3 class="widget-title"><span>All Categories</span></h3>
                        <ul class="widget-body filter-items search-ul">
                           <?php $sr=1;
                              if(!empty($category)){
                                 foreach ($category as $row)
                                 {
                           ?>
                           <li>
                              <input type="checkbox" class="custom-control-input  product_category common_selector" data-category="<?php echo $row->slug; ?>" name="category"  <?php echo isset($cat_slug) && $cat_slug==$row->slug ? "checked" : ""; ?> value="<?php echo $row->slug; ?>" id="category-<?php echo $row->slug; ?>" >
                              <label for="category-<?php echo $row->slug; ?>"><?php echo $row->cat_name; ?></label>
                           </li>
                           <?php  
                              $sr++;
                                 }
                              }
                           ?>
                        </ul>
                     </div>
                     <!-- End of Collapsible Widget -->
                     <!-- Start of Collapsible Widget -->
                     <div class="widget widget-collapsible">
                        <h3 class="widget-title"><span>Price</span></h3>
                        <div class="widget-body">
                           <ul class="filter-items search-ul">
                              <li>
                                 <input type="checkbox" class="custom-control-input  price common_selector" value="1,20"  id="price-1">
                                 <label class="custom-control-label" for="price-1">Less Then 20 </label>
                              </li>
                              <li>
                                 <input type="checkbox" class="custom-control-input price common_selector" value="21,50"  id="price-2">
                                 <label class="custom-control-label" for="price-2">Rs. 21 to Rs. 50</label>
                              </li>
                              <li>
                                 <input type="checkbox" class="custom-control-input price common_selector" value="51,100"  id="price-3">
                                 <label class="custom-control-label" for="price-3">Rs. 51 to Rs. 100 </label>
                              </li>
                              <li>
                                 <input type="checkbox" class="custom-control-input price common_selector" value="101,200"  id="price-4">
                                 <label class="custom-control-label" for="price-4">Rs. 101 to Rs. 200</label>
                              </li>
                              <li>
                                 <input type="checkbox" class="custom-control-input price common_selector"  value="201,500"  id="price-5">
                                 <label class="custom-control-label" for="price-5">Rs. 201 to Rs. 500</label>
                              </li>
                           </ul>
                           <form class="price-range">
                              <input type="number" name="min_price" class="min_price text-center"
                                 placeholder="$min"><span class="delimiter">-</span>
                              <input type="number" name="max_price" class="max_price text-center"
                                 placeholder="$max">
                              <a href="#" class="btn btn-primary btn-rounded">Go</a>
                           </form>
                        </div>
                     </div>
                     <!-- End of Collapsible Widget -->
                     <!-- Start of Collapsible Widget -->
                     <div class="widget widget-collapsible">
                        <h3 class="widget-title"><span>Discount</span></h3>
                        <div class="widget-body">
                           <ul class="filter-items search-ul">
                              <li>
                                 <input type="checkbox" class="custom-control-input  discount common_selector" value="1,20"  id="discount-1">
                                 <label class="custom-control-label" for="discount-1">Less Then 20 </label>
                              </li>
                              <li>
                                 <input type="checkbox" class="custom-control-input discount common_selector" value="21,50"  id="discount-2">
                                 <label class="custom-control-label" for="discount-2">Rs. 21 to Rs. 50</label>
                              </li>
                              <li>
                                 <input type="checkbox" class="custom-control-input discount common_selector" value="51,100"  id="discount-3">
                                 <label class="custom-control-label" for="discount-3">Rs. 51 to Rs. 100 </label>
                              </li>
                              <li>
                                 <input type="checkbox" class="custom-control-input discount common_selector" value="101,200"  id="discount-4">
                                 <label class="custom-control-label" for="discount-4">Rs. 101 to Rs. 200</label>
                              </li>
                              <li>
                                 <input type="checkbox" class="custom-control-input discount common_selector"  value="201,500"  id="discount-5">
                                 <label class="custom-control-label" for="discount-5">Rs. 201 to Rs. 500</label>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <!-- End of Collapsible Widget -->
                     <!-- Start of Collapsible Widget -->
                     <div class="widget widget-collapsible">
                        <h3 class="widget-title"><span>Size</span></h3>
                        <ul class="widget-body filter-items item-check mt-1">
                           <?php $sr=1;
                              if(!empty($size)){
                                 foreach ($size as $row)
                                 {
                           ?>
                           <li>
                              <input type="checkbox" class="custom-control-input product_size common_selector" data-size="<?php echo $row->id; ?>" name="size"  <?php //echo isset($url_cat_id) && $url_cat_id==$row->id ? "checked" : ""; ?> value="<?php echo $row->id; ?>" id="size-<?php echo $row->id; ?>" >
                              <label for="size-<?php echo $row->id; ?>"><?php echo $row->name; ?></label>
                           </li>
                           <?php  
                              $sr++;
                                 }
                              }
                           ?>
                        </ul>
                     </div>
                     <!-- End of Collapsible Widget -->
                     <!-- Start of Collapsible Widget -->
                     <div class="widget widget-collapsible">
                        <h3 class="widget-title"><span>Brand</span></h3>
                        <ul class="widget-body filter-items item-check mt-1">
                           <?php $sr=1;
                              if(!empty($brand)){
                                 foreach ($brand as $row)
                                 {
                           ?>
                           <li>
                              <input type="checkbox" class="custom-control-input product_brand common_selector" data-brand="<?php echo $row->slug; ?>" name="brand"  <?php //echo isset($url_cat_id) && $url_cat_id==$row->slug ? "checked" : ""; ?> value="<?php echo $row->slug; ?>" id="brand-<?php echo $row->slug; ?>" >
                              <label for="brand-<?php echo $row->slug; ?>"><?php echo $row->name; ?></label>
                           </li>
                           <?php  
                              $sr++;
                                 }
                              }
                           ?>
                        </ul>
                     </div>
                     <!-- End of Collapsible Widget -->
                     <!-- Start of Collapsible Widget -->
                     <div class="widget widget-collapsible">
                        <h3 class="widget-title"><span>Color</span></h3>
                        <ul class="widget-body filter-items item-check mt-1">
                           <?php $sr=1;
                              if(!empty($color)){
                                 foreach ($color as $row)
                                 {
                           ?>
                           <li>
                              <input type="checkbox" class="custom-control-input product_color common_selector" data-color="<?php echo $row->id; ?>" name="color"  <?php //echo isset($url_cat_id) && $url_cat_id==$row->id ? "checked" : ""; ?> value="<?php echo $row->id; ?>" id="color-<?php echo $row->id; ?>" >
                              <label for="color-<?php echo $row->id; ?>"><?php echo ucfirst($row->name); ?></label>
                           </li>
                           <?php  
                              $sr++;
                                 }
                              }
                           ?>
                        </ul>
                     </div>
                     <!-- End of Collapsible Widget -->
                  </div>
                  <!-- End of Sidebar Content -->
               </div>
               <!-- End of Sidebar Content -->
            </aside>
            <!-- End of Shop Sidebar -->
            <!-- Start of Shop Main Content -->
            <div class="main-content">
               <nav class="toolbox sticky-toolbox sticky-content fix-top">
                  <div class="toolbox-left">
                     <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                        btn-icon-left d-block d-lg-none"><i
                        class="w-icon-category"></i><span>Filters</span></a>
                     <div class="toolbox-item toolbox-sort select-box text-dark">
                        <label>Sort By :</label>
                        <select name="orderby" class="form-control">
                           <option value="default" selected="selected">Default sorting</option>
                           <option value="popularity">Sort by popularity</option>
                           <option value="rating">Sort by average rating</option>
                           <option value="date">Sort by latest</option>
                           <option value="price-low">Sort by pric: low to high</option>
                           <option value="price-high">Sort by price: high to low</option>
                        </select>
                     </div>
                     <?php if($search){ ?>
                     <div class="toolbox-item toolbox-sort text-dark">
                        <label>Search for : <?php echo $search; ?></label>
                     </div>
                     <?php } ?>
                  </div>
                  <div class="toolbox-right">
                     <div class="toolbox-item toolbox-show select-box">
                        <select name="count" class="form-control">
                           <option value="9">Show 9</option>
                           <option value="12" selected="selected">Show 12</option>
                           <option value="24">Show 24</option>
                           <option value="36">Show 36</option>
                        </select>
                     </div>
                  </div>
               </nav>
               <div class="product-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-2" id="product_list">
                  <!-- <div class="product-wrap">
                     <div class="product text-center">
                        <figure class="product-media">
                           <a href="product-default.html">
                           <img src="<?php  echo base_url();  ?>assets/web/assets/images/shop/1.jpg" alt="Product" width="300"
                              height="338" />
                           </a>
                           <div class="product-action-horizontal">
                              <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                 title="Add to cart"></a>
                              <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                 title="Wishlist"></a>
                              <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                 title="Compare"></a>
                              <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                 title="Quick View"></a>
                           </div>
                        </figure>
                        <div class="product-details">
                           <div class="product-cat">
                              <a href="shop-banner-sidebar.html">Electronics</a>
                           </div>
                           <h3 class="product-name">
                              <a href="product-default.html">3D Television</a>
                           </h3>
                           <div class="ratings-container">
                              <div class="ratings-full">
                                 <span class="ratings" style="width: 100%;"></span>
                                 <span class="tooltiptext tooltip-top"></span>
                              </div>
                              <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                           </div>
                           <div class="product-pa-wrapper">
                              <div class="product-price">
                                 $220.00 - $230.00
                              </div>
                           </div>
                        </div>
                     </div>
                  </div> -->
                  <!-- <div class="product-wrap">
                     <div class="product text-center">
                        <figure class="product-media">
                           <a href="product-default.html">
                           <img src="<?php  echo base_url();  ?>assets/web/assets/images/shop/2-1.jpg" alt="Product" width="300"
                              height="338" />
                           <img src="<?php  echo base_url();  ?>assets/web/assets/images/shop/2-2.jpg" alt="Product" width="300"
                              height="338" />
                           </a>
                           <div class="product-countdown-container">
                              <div class="product-countdown countdown-compact" data-until="2021, 9, 9"
                                 data-format="DHMS" data-compact="false"
                                 data-labels-short="Days, Hours, Mins, Secs">
                                 00:00:00:00
                              </div>
                           </div>
                           <div class="product-action-horizontal">
                              <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                 title="Add to cart"></a>
                              <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                 title="Wishlist"></a>
                              <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                 title="Compare"></a>
                              <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                 title="Quick View"></a>
                           </div>
                        </figure>
                        <div class="product-details">
                           <div class="product-cat">
                              <a href="shop-banner-sidebar.html">Electronics</a>
                           </div>
                           <h3 class="product-name">
                              <a href="product-default.html">Alarm Clock With Lamp</a>
                           </h3>
                           <div class="ratings-container">
                              <div class="ratings-full">
                                 <span class="ratings" style="width: 100%;"></span>
                                 <span class="tooltiptext tooltip-top"></span>
                              </div>
                              <a href="product-default.html" class="rating-reviews">(10 reviews)</a>
                           </div>
                           <div class="product-pa-wrapper">
                              <div class="product-price">
                                 <ins class="new-price">$30.00</ins><del
                                    class="old-price">$60.00</del>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="product-wrap">
                     <div class="product text-center">
                        <figure class="product-media">
                           <a href="product-default.html">
                           <img src="<?php  echo base_url();  ?>assets/web/assets/images/shop/3.jpg" alt="Product" width="300"
                              height="338" />
                           </a>
                           <div class="product-action-horizontal">
                              <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                 title="Add to cart"></a>
                              <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                 title="Wishlist"></a>
                              <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                 title="Compare"></a>
                              <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                 title="Quick View"></a>
                           </div>
                        </figure>
                        <div class="product-details">
                           <div class="product-cat">
                              <a href="shop-banner-sidebar.html">Electronics</a>
                           </div>
                           <h3 class="product-name">
                              <a href="product-default.html">Apple Laptop</a>
                           </h3>
                           <div class="ratings-container">
                              <div class="ratings-full">
                                 <span class="ratings" style="width: 80%;"></span>
                                 <span class="tooltiptext tooltip-top"></span>
                              </div>
                              <a href="product-default.html" class="rating-reviews">(5 reviews)</a>
                           </div>
                           <div class="product-pa-wrapper">
                              <div class="product-price">
                                 $1,000.00
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="product-wrap">
                     <div class="product text-center">
                        <figure class="product-media">
                           <a href="product-default.html">
                           <img src="<?php  echo base_url();  ?>assets/web/assets/images/shop/4.jpg" alt="Product" width="300"
                              height="338" />
                           </a>
                           <div class="product-action-horizontal">
                              <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                 title="Add to cart"></a>
                              <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                 title="Wishlist"></a>
                              <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                 title="Compare"></a>
                              <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                 title="Quick View"></a>
                           </div>
                        </figure>
                        <div class="product-details">
                           <div class="product-cat">
                              <a href="shop-banner-sidebar.html">Electronics</a>
                           </div>
                           <h3 class="product-name">
                              <a href="product-default.html">Attachable Charge Alarm</a>
                           </h3>
                           <div class="ratings-container">
                              <div class="ratings-full">
                                 <span class="ratings" style="width: 60%;"></span>
                                 <span class="tooltiptext tooltip-top"></span>
                              </div>
                              <a href="product-default.html" class="rating-reviews">(7 reviews)</a>
                           </div>
                           <div class="product-pa-wrapper">
                              <div class="product-price">
                                 $15.00
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="product-wrap">
                     <div class="product text-center">
                        <figure class="product-media">
                           <a href="product-default.html">
                           <img src="<?php  echo base_url();  ?>assets/web/assets/images/shop/5.jpg" alt="Product" width="300"
                              height="338" />
                           </a>
                           <div class="product-action-horizontal">
                              <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                 title="Add to cart"></a>
                              <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                 title="Wishlist"></a>
                              <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                 title="Compare"></a>
                              <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                 title="Quick View"></a>
                           </div>
                        </figure>
                        <div class="product-details">
                           <div class="product-cat">
                              <a href="shop-banner-sidebar.html">Fashion</a>
                           </div>
                           <h3 class="product-name">
                              <a href="product-default.html">Best Travel Bag</a>
                           </h3>
                           <div class="ratings-container">
                              <div class="ratings-full">
                                 <span class="ratings" style="width: 80%;"></span>
                                 <span class="tooltiptext tooltip-top"></span>
                              </div>
                              <a href="product-default.html" class="rating-reviews">(4 reviews)</a>
                           </div>
                           <div class="product-pa-wrapper">
                              <div class="product-price">
                                 $83.00
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="product-wrap">
                     <div class="product text-center">
                        <figure class="product-media">
                           <a href="product-default.html">
                           <img src="<?php  echo base_url();  ?>assets/web/assets/images/shop/6.jpg" alt="Product" width="300"
                              height="338" />
                           </a>
                           <div class="product-action-horizontal">
                              <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                 title="Add to cart"></a>
                              <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                 title="Wishlist"></a>
                              <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                 title="Compare"></a>
                              <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                 title="Quick View"></a>
                           </div>
                        </figure>
                        <div class="product-details">
                           <div class="product-cat">
                              <a href="shop-banner-sidebar.html">Sports</a>
                           </div>
                           <h3 class="product-name">
                              <a href="product-default.html">Black Stunt Motor</a>
                           </h3>
                           <div class="ratings-container">
                              <div class="ratings-full">
                                 <span class="ratings" style="width: 100%;"></span>
                                 <span class="tooltiptext tooltip-top"></span>
                              </div>
                              <a href="product-default.html" class="rating-reviews">(12 reviews)</a>
                           </div>
                           <div class="product-pa-wrapper">
                              <div class="product-price">
                                 $374.00
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="product-wrap">
                     <div class="product text-center">
                        <figure class="product-media">
                           <a href="product-default.html">
                           <img src="<?php  echo base_url();  ?>assets/web/assets/images/shop/7-1.jpg" alt="Product" width="300"
                              height="338" />
                           <img src="<?php  echo base_url();  ?>assets/web/assets/images/shop/7-2.jpg" alt="Product" width="300"
                              height="338" />
                           </a>
                           <div class="product-action-horizontal">
                              <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                 title="Add to cart"></a>
                              <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                 title="Wishlist"></a>
                              <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                 title="Compare"></a>
                              <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                 title="Quick View"></a>
                           </div>
                        </figure>
                        <div class="product-details">
                           <div class="product-cat">
                              <a href="shop-banner-sidebar.html">Fashion</a>
                           </div>
                           <h3 class="product-name">
                              <a href="product-default.html">Blue Sky Trunk</a>
                           </h3>
                           <div class="ratings-container">
                              <div class="ratings-full">
                                 <span class="ratings" style="width: 100%;"></span>
                                 <span class="tooltiptext tooltip-top"></span>
                              </div>
                              <a href="product-default.html" class="rating-reviews">(9 reviews)</a>
                           </div>
                           <div class="product-pa-wrapper">
                              <div class="product-price">
                                 $85.00
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="product-wrap">
                     <div class="product text-center">
                        <figure class="product-media">
                           <a href="product-default.html">
                           <img src="<?php  echo base_url();  ?>assets/web/assets/images/shop/8.jpg" alt="Product" width="300"
                              height="338" />
                           </a>
                           <div class="product-action-horizontal">
                              <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                 title="Add to cart"></a>
                              <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                 title="Wishlist"></a>
                              <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                 title="Compare"></a>
                              <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                 title="Quick View"></a>
                           </div>
                        </figure>
                        <div class="product-details">
                           <div class="product-cat">
                              <a href="shop-banner-sidebar.html">Beauty</a>
                           </div>
                           <h3 class="product-name">
                              <a href="product-default.html">Bodycare Smooth Powder</a>
                           </h3>
                           <div class="ratings-container">
                              <div class="ratings-full">
                                 <span class="ratings" style="width: 60%;"></span>
                                 <span class="tooltiptext tooltip-top"></span>
                              </div>
                              <a href="product-default.html" class="rating-reviews">(4 reviews)</a>
                           </div>
                           <div class="product-pa-wrapper">
                              <div class="product-price">
                                 $25.00
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="product-wrap">
                     <div class="product text-center">
                        <figure class="product-media">
                           <a href="product-default.html">
                           <img src="<?php  echo base_url();  ?>assets/web/assets/images/shop/9.jpg" alt="Product" width="300"
                              height="338" />
                           </a>
                           <div class="product-action-horizontal">
                              <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                 title="Add to cart"></a>
                              <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                 title="Wishlist"></a>
                              <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                 title="Compare"></a>
                              <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                 title="Quick View"></a>
                           </div>
                        </figure>
                        <div class="product-details">
                           <div class="product-cat">
                              <a href="shop-banner-sidebar.html">Electronics</a>
                           </div>
                           <h3 class="product-name">
                              <a href="product-default.html">Bright Green IPhone</a>
                           </h3>
                           <div class="ratings-container">
                              <div class="ratings-full">
                                 <span class="ratings" style="width: 80%;"></span>
                                 <span class="tooltiptext tooltip-top"></span>
                              </div>
                              <a href="product-default.html" class="rating-reviews">(4 reviews)</a>
                           </div>
                           <div class="product-pa-wrapper">
                              <div class="product-price">
                                 $950.00
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="product-wrap">
                     <div class="product text-center">
                        <figure class="product-media">
                           <a href="product-default.html">
                           <img src="<?php  echo base_url();  ?>assets/web/assets/images/shop/10.jpg" alt="Product" width="300"
                              height="338" />
                           </a>
                           <div class="product-action-horizontal">
                              <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                 title="Add to cart"></a>
                              <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                 title="Wishlist"></a>
                              <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                 title="Compare"></a>
                              <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                 title="Quick View"></a>
                           </div>
                        </figure>
                        <div class="product-details">
                           <div class="product-cat">
                              <a href="shop-banner-sidebar.html">Fashion</a>
                           </div>
                           <h3 class="product-name">
                              <a href="product-default.html">Cavin Fashion Suede Handbag</a>
                           </h3>
                           <div class="ratings-container">
                              <div class="ratings-full">
                                 <span class="ratings" style="width: 80%;"></span>
                                 <span class="tooltiptext tooltip-top"></span>
                              </div>
                              <a href="product-default.html" class="rating-reviews">(4 reviews)</a>
                           </div>
                           <div class="product-pa-wrapper">
                              <div class="product-price">
                                 $163.00
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="product-wrap">
                     <div class="product text-center">
                        <figure class="product-media">
                           <a href="product-default.html">
                           <img src="<?php  echo base_url();  ?>assets/web/assets/images/shop/11-1.jpg" alt="Product" width="300"
                              height="338" />
                           <img src="<?php  echo base_url();  ?>assets/web/assets/images/shop/11-2.jpg" alt="Product" width="300"
                              height="338" />
                           </a>
                           <div class="product-action-horizontal">
                              <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                 title="Add to cart"></a>
                              <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                 title="Wishlist"></a>
                              <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                 title="Compare"></a>
                              <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                 title="Quick View"></a>
                           </div>
                        </figure>
                        <div class="product-details">
                           <div class="product-cat">
                              <a href="shop-banner-sidebar.html">Electronics</a>
                           </div>
                           <h3 class="product-name">
                              <a href="product-default.html">Charming Design Watch</a>
                           </h3>
                           <div class="ratings-container">
                              <div class="ratings-full">
                                 <span class="ratings" style="width: 100%;"></span>
                                 <span class="tooltiptext tooltip-top"></span>
                              </div>
                              <a href="product-default.html" class="rating-reviews">(10 reviews)</a>
                           </div>
                           <div class="product-pa-wrapper">
                              <div class="product-price">
                                 $30.00
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="product-wrap">
                     <div class="product text-center">
                        <figure class="product-media">
                           <a href="product-default.html">
                           <img src="<?php  echo base_url();  ?>assets/web/assets/images/shop/12.jpg" alt="Product" width="300"
                              height="338" />
                           </a>
                           <div class="product-action-horizontal">
                              <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                 title="Add to cart"></a>
                              <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                 title="Wishlist"></a>
                              <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                 title="Compare"></a>
                              <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                 title="Quick View"></a>
                           </div>
                        </figure>
                        <div class="product-details">
                           <div class="product-cat">
                              <a href="shop-banner-sidebar.html">Fashion</a>
                           </div>
                           <h3 class="product-name">
                              <a href="product-default.html">Classic Simple Backpack</a>
                           </h3>
                           <div class="ratings-container">
                              <div class="ratings-full">
                                 <span class="ratings" style="width: 100%;"></span>
                                 <span class="tooltiptext tooltip-top"></span>
                              </div>
                              <a href="product-default.html" class="rating-reviews">(9 reviews)</a>
                           </div>
                           <div class="product-pa-wrapper">
                              <div class="product-price">
                                 $85.00
                              </div>
                           </div>
                        </div>
                     </div>
                  </div> -->
               </div>
               <div class="toolbox toolbox-pagination justify-content-between" id="pagination_link">
                  <!-- <p class="showing-info mb-2 mb-sm-0">
                     Showing<span>1-12 of 60</span>Products
                  </p>
                  <ul class="pagination">
                     <li class="prev disabled">
                        <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                        <i class="w-icon-long-arrow-left"></i>Prev
                        </a>
                     </li>
                     <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link" href="#">2</a>
                     </li>
                     <li class="next">
                        <a href="#" aria-label="Next">
                        Next<i class="w-icon-long-arrow-right"></i>
                        </a>
                     </li>
                  </ul> -->
               </div>
            </div>
            <!-- End of Shop Main Content -->
         </div>
         <!-- End of Shop Content -->
      </div>
   </div>
   <!-- End of Page Content -->
</main>
<!-- End of Main-->

<script>
   $(document).ready(function(){
       filter_data(1);
       // price_range ();
       function filter_data(page)
       {
           $('#product_list').html('<div id="loading" style="text-align:center;width: 100%;" >Product Loading...</div>');
           var action = 'fetch_data';
           var minimum_price = $('#min_price').val();
           var maximum_price = $('#max_price').val();
           var size = get_filter('product_size');
           var color = get_filter('product_color');
           var brand = get_filter('product_brand');
           var category = get_filter('product_category');
           
           var price = get_filter('price');
           var discount = get_filter('discount');
            
           // var sort_product = $("#sort-price").val();
           var search_query = '<?php echo $search; ?>';
           
           $.ajax({
            
               url:"<?php echo base_url(); ?>shop/fetch_data/"+page,
               method:"POST",
               dataType:"JSON",
               data:{action:action,minimum_price:minimum_price, maximum_price:maximum_price, size:size,discount:discount,price:price,color:color,brand:brand,category:category, search_query:search_query},
               success:function(data){
                   // console.log(data.product_list);
                   $('#product_list').html(data.product_list);
                   $('#pagination_link').html(data.pagination_link);
                     //alert('hello');
               }
           });
       }
   
       function get_filter(class_name)
       {
           var filter = [];
           $('.'+class_name+':checked').each(function(){
               filter.push($(this).val());
           });
           return filter;
       }
   
       $('.common_selector').click(function(){
           filter_data(1);
       });
       
       $(document).on('click', '.pagination li a', function(event){
       event.preventDefault();
       var page = $(this).data('ci-pagination-page');
       filter_data(page);
       });
   
       $("#sort-price").change(function () {
           //alert(this.value);
           filter_data(1);
       });
   });
</script>
