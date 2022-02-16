<?php
    $userdata = is_user_login();
?>
        <!-- Start of Main -->
        <main class="main checkout">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb shop-breadcrumb bb-no">
                        <li class="passed"><a href="cart.html">Shopping Cart</a></li>
                        <li class="active"><a href="checkout.html">Checkout</a></li>
                        <li><a href="order.html">Order Complete</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->


            <!-- Start of PageContent -->
            <div class="page-content">
                <div class="container">
                    <?php
                        if(!$userdata){
                    ?>
                    <div class="login-toggle">
                        Returning customer? <a href="#"
                            class="show-login font-weight-bold text-uppercase text-dark">Login</a>
                    </div>
                    <form class="login-content">
                        <p>If you have shopped with us before, please enter your details below. 
                            If you are a new customer, please proceed to the Billing section.</p>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Username or email *</label>
                                    <input type="text" class="form-control form-control-md" name="name"
                                        required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="text" class="form-control form-control-md" name="password"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group checkbox">
                            <input type="checkbox" class="custom-checkbox" id="remember" name="remember">
                            <label for="remember" class="mb-0 lh-2">Remember me</label>
                            <a href="#" class="ml-3">Last your password?</a>
                        </div>
                        <button class="btn btn-rounded btn-login">Login</button>
                    </form>
                    <?php
                        }else{
                    ?>
                    <div class="address-toggle row">
                        <?php
                            $id =  $userdata['id'];
                            $old_address = $this->db->get_where('tbl_useraddress',['user_id'=>$id])->result();
                            foreach( $old_address as $row ){
                        ?>
                        <div class="col-12">
                            <input type="radio" form="place-order" name="old_address" id="address-<?php echo $row->id; ?>" value="<?php echo $row->id; ?>" class="old-address">
                            <label for="address-<?php echo $row->id; ?>">
                                <?php echo $row->billing_name; ?>,
                                <?php echo $row->billing_email; ?>,
                                <?php echo $row->billing_mobile_no; ?>
                            </label>
                        </div>
                        <?php
                            }
                        ?>
                        <div class="col-12">
                            <label for="address-00">or Add Address</label>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <!-- <form class="form checkout-form" action="#" method="post"> -->
                        <div class="row mb-9">
                            <div class="col-lg-7 pr-lg-4 mb-4">
                                <form class="form checkout-form" action="javascript:void(0);" method="post" id="save-address">
                                    <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                        Billing Details
                                    </h3>
                                    <div class="row gutter-sm">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label>Name *</label>
                                                <input type="text" id="username" name="billing_name" class="form-control" value="<?php if(!empty($address)) echo($address->billing_name) ?>"  required>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input type="email" id="email_1" name="billing_email" class="form-control" value="<?php if(!empty($address)) echo($address->billing_email) ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="number_1">Your Phone Number</label>
                                                <input type="number" id="number_1" name="billing_mobile_no" class="form-control" value="<?php if(!empty($address)) echo($address->billing_mobile_no) ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="number_1">Alternative Phone Number</label>
                                                <input type="number" id="number_1" name="alter_mobile_no" class="form-control" value="<?php if(!empty($address)) echo($address->alter_mobile_no) ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="building_name">House No,Building Name</label>
                                                <textarea id="building_name" name="building_name" cols="30" rows="2" class="form-control" required><?php if(!empty($address)) echo($address->building_name) ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="road_area_colony">Road Area Colony</label>
                                                <input type="text" id="road_area_colony" name="road_area_colony"class="form-control" value="<?php if(!empty($address)) echo($address->road_area_colony) ?>" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="landmark">Land Mark (Optional)</label>
                                                <input type="text" id="landmark" name="landmark" value="<?php if(!empty($address)) echo($address->landmark) ?>"  class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="country">Select Country</label>
                                                <select name="country" id="country"  class="form-control" required>
                                                  <option value="India">India</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="state">Enter State</label>
                                                <input type="text" id="state" name="state" class="form-control" value="<?php if(!empty($address)) echo($address->state) ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="city">Enter District ( City )</label>
                                                <input type="text" id="city" name="city"  class="form-control" value="<?php if(!empty($address)) echo($address->city) ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="pincode">Enter Pincode/Zipcode </label>
                                                <input type="text" id="pincode" name="pincode" class="form-control" value="<?php if(!empty($address)) echo($address->pincode) ?>" required> 
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label for="message">Address Type</label>
                                                <label class="radio-inline">
                                                      <input type="radio" name="address_type" value="1" readonly="" style="width: 20px;height: 15px" checked>Home (All day delivery)
                                                </label>
                                                <label class="radio-inline">
                                                      <input type="radio" name="address_type" readonly="" value="2" style="width: 20px;height: 15px">Office (Delivery between 10 AM - 5 PM)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="6LcKi1keAAAAANvqvXcb8G0scH-XfQAlFUEZWDYL"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-rounded">Save Now</button>
                                    
                                </form>
                            </div>
                            <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                                <div class="order-summary-wrapper sticky-sidebar">
                                    <h3 class="title text-uppercase ls-10">Your Order</h3>
                                    <div class="order-summary">
                                        <table class="order-table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">
                                                        <b>Product</b>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $cartItems = $this->cart->contents();
                                                    foreach ($cartItems as $key => $value) {
                                                       $result = $this->db->get_where($this->tbl_product, ['id' => $value['id']])->row_array();
                                                 ?>
                                                <tr class="bb-no">
                                                    <td class="product-name"><?=strlen($result['name']) > 40 ? substr($result['name'],0,40)."..." : $result['name']?><?php //echo $result['name']; ?> <i class="fas fa-times"></i> 
                                                        <span class="product-quantity"><?php echo $value['qty']; ?></span></td>
                                                    <td class="product-total">₹ .<?php echo $value['subtotal']; ?></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                              
                                            </tbody>
                                            <tfoot>
                                                <!-- <tr class="shipping-methods">
                                                    <td colspan="2" class="text-left">
                                                        <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping
                                                        </h4>
                                                        <ul id="shipping-method" class="mb-4">
                                                            <li>
                                                                <div class="custom-radio">
                                                                    <input type="radio" id="free-shipping"
                                                                        class="custom-control-input" name="shipping">
                                                                    <label for="free-shipping"
                                                                        class="custom-control-label color-dark">Free
                                                                        Shipping</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="custom-radio">
                                                                    <input type="radio" id="local-pickup"
                                                                        class="custom-control-input" name="shipping">
                                                                    <label for="local-pickup"
                                                                        class="custom-control-label color-dark">Local
                                                                        Pickup</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="custom-radio">
                                                                    <input type="radio" id="flat-rate"
                                                                        class="custom-control-input" name="shipping">
                                                                    <label for="flat-rate"
                                                                        class="custom-control-label color-dark">Flat
                                                                        rate: $5.00</label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr> -->
                                                <tr class="order-total">
                                                    <th>
                                                        <b>Shipping</b>
                                                    </th>
                                                    <td>
                                                        <b><?php echo "₹ ".$this->shipping_charge; ?></b>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>
                                                        <b>Total</b>
                                                    </th>
                                                    <td>
                                                        <b><?php echo "₹ ".($this->cart->total()+$this->shipping_charge); ?></b>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <form class="form" id="place-order" method="post">
                                            <div class="payment-methods" id="payment_method">
                                                <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                                <div class="accordion payment-accordion">
                                                    <!-- <div class="card">
                                                        <div class="card-header">
                                                            <a href="#cash-on-delivery" class="collapse">Direct Bank Transfor</a>
                                                        </div>
                                                        <div id="cash-on-delivery" class="card-body expanded">
                                                            <p class="mb-0">
                                                                Make your payment directly into our bank account. 
                                                                Please use your Order ID as the payment reference. 
                                                                Your order will not be shipped until the funds have cleared in our account.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <a href="#payment" class="expand">Check Payments</a>
                                                        </div>
                                                        <div id="payment" class="card-body collapsed">
                                                            <p class="mb-0">
                                                                Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                                            </p>
                                                        </div>
                                                    </div> -->
                                                    <div class="card">
                                                        <input type="radio" name="payment_method" id="cod-1" value="COD" style="width: 20px;height: 15px" class="payment-method">
                                                        <label for="cod-1">Cash on delivery</label>
                                                        <!-- <div class="card-header">
                                                            <a href="#delivery" class="expand">Cash on delivery</a>
                                                        </div>
                                                        <div id="delivery" class="card-body collapsed">
                                                            <p class="mb-0">
                                                                Pay with cash upon delivery.
                                                            </p>
                                                        </div> -->
                                                    </div>
                                                    <!-- <div class="card p-relative">
                                                        <div class="card-header">
                                                            <a href="#paypal" class="expand">Paypal</a>
                                                        </div>
                                                        <a href="https://www.paypal.com/us/webapps/mpp/paypal-popup" class="text-primary paypal-que" 
                                                            onclick="javascript:window.open('https://www.paypal.com/us/webapps/mpp/paypal-popup','WIPaypal',
                                                            'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); 
                                                            return false;">What is PayPal?
                                                        </a>
                                                        <div id="paypal" class="card-body collapsed">
                                                            <p class="mb-0">
                                                                Pay via PayPal, you can pay with your credit cart if you
                                                                don't have a PayPal account.
                                                            </p>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>

                                            <div class="form-group place-order pt-6">
                                                <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->
<script>
    $("#save-address").submit(function(event) {
        
        event.preventDefault();
        $.ajax({
          type: "POST", 
          url: '<?php echo base_url('User/saveaddress'); ?>',
          dataType:'json',
           data: new FormData(this), 
           contentType: false,
           cache: false,
           processData:false,
          beforeSend:function()
          {},
          success:function(responce)
          {
              if(responce.status==0)
              {
               toastr.error(responce.message);
              }else if(responce.status==1)
              {
                toastr.success(responce.message);
                setTimeout(function(){ window.location.href = window.location.href; }, 500);
              }
          },
          error:function()
          {
               toastr.error("Boom!...");
          },
          complete:function()
          {
          }
      });
    });
    $("#place-order").submit(function(event) {
        event.preventDefault();
        var flag = false;
        $(".old-address").each(function(){
            if($(this).prop("checked"))
                flag = true;

        });
        if(!flag)
        {
            toastr.error("Please Select Billing Address....");
            return false;
        }
        $(".payment-method").each(function(){
            if($(this).prop("checked"))
                flag = true;

        });
        if(!flag)
        {
            toastr.error("Please Select Payment Method...");
            return false;
        }

        $.ajax({
              type: "POST", 
              url: '<?php echo base_url('Checkout/conf_checkout'); ?>',
              dataType:'json',
               data: new FormData(this), 
               contentType: false,
               cache: false,
               processData:false,
              beforeSend:function()
              {},
              success:function(responce)
              {
                  if(responce.status==0)
                  {
                   toastr.error(responce.message);
                  }else if(responce.status==1)
                  {
                    toastr.success(responce.message);
                    setTimeout(function(){ window.location.href = '<?php echo base_url('account#account-orders'); ?>'; }, 1000);
                  }
              },
              error:function()
              {
                   toastr.error("Boom!...");
              },
              complete:function()
              {
              }
        });
    });
</script>