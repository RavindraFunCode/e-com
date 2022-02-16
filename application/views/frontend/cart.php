Start of Main -->
<main class="main cart">
   <!-- Start of Breadcrumb -->
   <nav class="breadcrumb-nav">
      <div class="container">
         <ul class="breadcrumb shop-breadcrumb bb-no">
            <li class="active"><a href="cart.html">Shopping Cart</a></li>
            <li><a href="checkout.html">Checkout</a></li>
            <li><a href="order.html">Order Complete</a></li>
         </ul>
      </div>
   </nav>
   <!-- End of Breadcrumb -->
   <!-- Start of PageContent -->
   <div class="page-content">
      <div class="container">
         <div class="row gutter-lg mb-10">
            <div class="col-lg-8 pr-lg-4 mb-6">
               <table class="shop-table cart-table">
                  <thead>
                     <tr>
                        <th class="product-name"><span>Product</span></th>
                        <th></th>
                        <th class="product-price"><span>Price</span></th>
                        <th class="product-quantity"><span>Quantity</span></th>
                        <th class="product-subtotal"><span>Subtotal</span></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $cartItems = $this->cart->contents();
                        $discount_price = 0;
                        $product_details_url=base_url()."product-details/";
                        foreach ($cartItems as $key => $value) {
                           $result = $this->db->get_where($this->tbl_product, ['id' => $value['id']])->row_array();
                           if (!empty($result['image'])) {
                                $imageURL = base_url() . "uploads/product/" . $result['image'] . '';
                           } else {
                                $imageURL = base_url() . "assets/web/img/noproductimage.png";
                           }
                     ?>
                     <tr>
                        <td class="product-thumbnail">
                           <div class="p-relative">
                              <a href="<?php echo $product_details_url.$result['slug']; ?>">
                                 <figure>
                                    <img src="<?php echo $imageURL;  ?>" alt="product"
                                       width="300" height="338">
                                 </figure>
                              </a>
                              <button type="button" onclick="remove_from_cart(`<?php echo $value['rowid']; ?>`); reload_this_page();" class="btn btn-close"><i
                                 class="fas fa-times"></i></button>
                           </div>
                        </td>
                        <td class="product-name">
                           <a href="product-default.html">
                           <?php echo $result['name']; ?>
                           </a>
                        </td>
                        <td class="product-price"><span class="amount">₹ .<?php echo $result['price']; ?></span></td>
                        <td class="product-quantity">
                           <div class="input-group">
                              <input class="quantity123 form-control updated-qty" type="number" value="<?php echo $value['qty']; ?>" min="1" max="100000">
                              <button class="quantity-plus w-icon-plus update_cart_count" data-rowid="<?php echo $value['rowid']; ?>" data-qty-type="plus"></button>
                              <button class="quantity-minus w-icon-minus update_cart_count" data-rowid="<?php echo $value['rowid']; ?>" data-qty-type="minus"></button>
                           </div>
                        </td>
                        <td class="product-subtotal">
                           <span class="amount" id="<?php echo $value['rowid']; ?>">₹ .<?php echo $value['subtotal']; ?></span>
                        </td>
                     </tr>
                     <?php
                        }
                     ?>
                     
                  </tbody>
               </table>
               <div class="cart-action mb-6">
                  <a href="<?php echo base_url() ?>shop" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                  <a href="<?php echo base_url() ?>cart/clear" class="btn btn-rounded btn-default btn-clear">Clear Cart</a>
                  <!-- <button type="submit"  name="clear_cart" value="Clear Cart">Clear Cart</button> -->
               </div>
               <form class="coupon">
                  <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
                  <input type="text" class="form-control mb-4" placeholder="Enter coupon code here..." required />
                  <button class="btn btn-dark btn-outline btn-rounded">Apply Coupon</button>
               </form>
            </div>
            <div class="col-lg-4 sticky-sidebar-wrapper">
               <div class="sticky-sidebar">
                  <div class="cart-summary mb-4">
                     <h3 class="cart-title text-uppercase">Cart Totals</h3>
                     <div class="cart-subtotal d-flex align-items-center justify-content-between">
                        <label class="ls-25">Subtotal</label>
                        <span id="sub_total"><?php echo "₹ ".$this->cart->total(); ?></span>
                     </div>
                     <div class="cart-subtotal d-flex align-items-center justify-content-between">
                        <label class="ls-25">Shipping</label>
                        <span id="sub_total"><?php echo "₹ ".$this->shipping_charge; ?></span>
                     </div>
                     <!-- <hr class="divider">
                     <ul class="shipping-methods mb-2">
                        <li>
                           <label
                              class="shipping-title text-dark font-weight-bold">Shipping</label>
                        </li>
                        <li>
                           <div class="custom-radio">
                              <input type="radio" id="free-shipping" class="custom-control-input"
                                 name="shipping">
                              <label for="free-shipping"
                                 class="custom-control-label color-dark">Free
                              Shipping</label>
                           </div>
                        </li>
                        <li>
                           <div class="custom-radio">
                              <input type="radio" id="local-pickup" class="custom-control-input"
                                 name="shipping">
                              <label for="local-pickup"
                                 class="custom-control-label color-dark">Local
                              Pickup</label>
                           </div>
                        </li>
                        <li>
                           <div class="custom-radio">
                              <input type="radio" id="flat-rate" class="custom-control-input"
                                 name="shipping">
                              <label for="flat-rate" class="custom-control-label color-dark">Flat
                              rate:
                              $5.00</label>
                           </div>
                        </li>
                     </ul>
                     <div class="shipping-calculator">
                        <p class="shipping-destination lh-1">Shipping to <strong>CA</strong>.</p>
                        <form class="shipping-calculator-form">
                           <div class="form-group">
                              <div class="select-box">
                                 <select name="country" class="form-control form-control-md">
                                    <option value="default" selected="selected">United States
                                       (US)
                                    </option>
                                    <option value="us">United States</option>
                                    <option value="uk">United Kingdom</option>
                                    <option value="fr">France</option>
                                    <option value="aus">Australia</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="select-box">
                                 <select name="state" class="form-control form-control-md">
                                    <option value="default" selected="selected">California
                                    </option>
                                    <option value="ohaio">Ohaio</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <input class="form-control form-control-md" type="text" name="town-city" placeholder="Town / City">
                           </div>
                           <div class="form-group">
                              <input class="form-control form-control-md" type="text" name="zipcode" placeholder="ZIP">
                           </div>
                           <button type="submit" class="btn btn-dark btn-outline btn-rounded">Update
                           Totals</button>
                        </form>
                     </div> -->
                     <hr class="divider mb-6">
                     <div class="order-total d-flex justify-content-between align-items-center">
                        <label>Total</label>
                        <span class="ls-50" id="total-price"><?php echo "₹ ".($this->cart->total()+$this->shipping_charge); ?></span>
                     </div>
                     <a href="<?php echo base_url('checkout'); ?>" class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                        Proceed to checkout<i class="w-icon-long-arrow-right"></i>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End of PageContent -->
</main>
<!-- End of Main