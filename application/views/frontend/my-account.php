<?php
 $userdata = is_user_login();
?>
<!-- Start of Main -->
<main class="main">
   <!-- Start of Page Header -->
   <div class="page-header">
      <div class="container">
         <h1 class="page-title mb-0">My Account</h1>
      </div>
   </div>
   <!-- End of Page Header -->
   <!-- Start of Breadcrumb -->
   <nav class="breadcrumb-nav">
      <div class="container">
         <ul class="breadcrumb">
            <li><a href="demo1.html">Home</a></li>
            <li>My account</li>
         </ul>
      </div>
   </nav>
   <!-- End of Breadcrumb -->
   <!-- Start of PageContent -->
   <div class="page-content pt-2">
      <div class="container">
         <div class="tab tab-vertical row gutter-lg">
            <ul class="nav nav-tabs mb-6" role="tablist">
               <li class="nav-item">
                  <a href="#account-dashboard" class="nav-link active">Dashboard</a>
               </li>
               <li class="nav-item">
                  <a href="#account-orders" class="nav-link">Orders</a>
               </li>
               <!-- <li class="nav-item">
                  <a href="#account-downloads" class="nav-link">Downloads</a>
               </li> -->
               <li class="nav-item">
                  <a href="#account-addresses" class="nav-link">Addresses</a>
               </li>
               <li class="nav-item">
                  <a href="#account-details" class="nav-link">Account details</a>
               </li>
               <li class="nav-item">
                  <a href="<?php  echo base_url('wishlist'); ?>" class="nav-link">Wishlist</a>
               </li>
               <li class="nav-item">
                  <a href="<?php echo base_url("User/userlogout"); ?>" class="nav-link">Logout</a>
               </li>
            </ul>
            <div class="tab-content mb-6">
               <div class="tab-pane active in" id="account-dashboard">
                  <!-- <p class="greeting">
                     Hello
                     <span class="text-dark font-weight-bold">John Doe</span>
                     (not
                     <span class="text-dark font-weight-bold">John Doe</span>?
                     <a href="#" class="text-primary">Log out</a>)
                  </p>
                  <p class="mb-4">
                     From your account dashboard you can view your <a href="#account-orders"
                        class="text-primary link-to-tab">recent orders</a>,
                     manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping
                     and billing
                     addresses</a>, and
                     <a href="#account-details" class="text-primary link-to-tab">edit your password and
                     account details.</a>
                  </p> -->
                  <div class="row">
                     <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                        <a href="#account-orders" class="link-to-tab">
                           <div class="icon-box text-center">
                              <span class="icon-box-icon icon-orders">
                              <i class="w-icon-orders"></i>
                              </span>
                              <div class="icon-box-content">
                                 <p class="text-uppercase mb-0">Orders</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <!-- <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                        <a href="#account-downloads" class="link-to-tab">
                           <div class="icon-box text-center">
                              <span class="icon-box-icon icon-download">
                              <i class="w-icon-download"></i>
                              </span>
                              <div class="icon-box-content">
                                 <p class="text-uppercase mb-0">Downloads</p>
                              </div>
                           </div>
                        </a>
                     </div> -->
                     <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                        <a href="#account-addresses" class="link-to-tab">
                           <div class="icon-box text-center">
                              <span class="icon-box-icon icon-address">
                              <i class="w-icon-map-marker"></i>
                              </span>
                              <div class="icon-box-content">
                                 <p class="text-uppercase mb-0">Addresses</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                        <a href="#account-details" class="link-to-tab">
                           <div class="icon-box text-center">
                              <span class="icon-box-icon icon-account">
                              <i class="w-icon-user"></i>
                              </span>
                              <div class="icon-box-content">
                                 <p class="text-uppercase mb-0">Account Details</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                        <a href="wishlist.html" class="link-to-tab">
                           <div class="icon-box text-center">
                              <span class="icon-box-icon icon-wishlist">
                              <i class="w-icon-heart"></i>
                              </span>
                              <div class="icon-box-content">
                                 <p class="text-uppercase mb-0">Wishlist</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                        <a href="<?php echo base_url("User/userlogout"); ?>">
                           <div class="icon-box text-center">
                              <span class="icon-box-icon icon-logout">
                              <i class="w-icon-logout"></i>
                              </span>
                              <div class="icon-box-content">
                                 <p class="text-uppercase mb-0">Logout</p>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="tab-pane mb-4" id="account-orders">
                  <div class="icon-box icon-box-side icon-box-light">
                     <span class="icon-box-icon icon-orders">
                     <i class="w-icon-orders"></i>
                     </span>
                     <div class="icon-box-content">
                        <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                     </div>
                  </div>
                  <table class="shop-table account-orders-table mb-6">
                     <thead>
                        <tr>
                           <th class="order-id">Order</th>
                           <th class="order-date">Date</th>
                           <th class="order-status">Status</th>
                           <th class="order-total">Total</th>
                           <th class="order-actions">Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           // $order_details_url=base_url()."product-details/";
                           foreach ($orders as $key => $value) {
                        ?>
                        <tr>
                           <td class="order-id">#<?php echo $value['order_id']; ?></td>
                           <td class="order-date"><?php echo $value['created_at']; ?></td>
                           <td class="order-status"><?php echo ORDER_STATUS[$value['status']]; ?></td>
                           <td class="order-total">
                              <span class="order-price"><?php echo $value['grand_total']; ?></span> for
                              <span class="order-quantity"> <?php echo $count = getRowCount($this->tbl_ecom_order_product, ['order_id'=>$value['order_id']]); ?></span> <?php echo $count>1 ? "items" : "item" ; ?>
                           </td>
                           <td class="order-action">
                              <a href="#"
                                 class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                           </td>
                        </tr>
                        <?php
                           }
                        ?>
                        <!-- <tr>
                           <td class="order-id">#2321</td>
                           <td class="order-date">August 20, 2021</td>
                           <td class="order-status">Processing</td>
                           <td class="order-total">
                              <span class="order-price">$150.00</span> for
                              <span class="order-quantity"> 1</span> item
                           </td>
                           <td class="order-action">
                              <a href="#"
                                 class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                           </td>
                        </tr>
                        <tr>
                           <td class="order-id">#2319</td>
                           <td class="order-date">August 20, 2021</td>
                           <td class="order-status">Processing</td>
                           <td class="order-total">
                              <span class="order-price">$201.00</span> for
                              <span class="order-quantity"> 1</span> item
                           </td>
                           <td class="order-action">
                              <a href="#"
                                 class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                           </td>
                        </tr>
                        <tr>
                           <td class="order-id">#2318</td>
                           <td class="order-date">August 20, 2021</td>
                           <td class="order-status">Processing</td>
                           <td class="order-total">
                              <span class="order-price">$321.00</span> for
                              <span class="order-quantity"> 1</span> item
                           </td>
                           <td class="order-action">
                              <a href="#"
                                 class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                           </td>
                        </tr> -->
                     </tbody>
                  </table>
                  <a href="<?php echo base_url()."shop"; ?>" class="btn btn-dark btn-rounded btn-icon-right">Go
                  Shop<i class="w-icon-long-arrow-right"></i></a>
               </div>
               <div class="tab-pane" id="account-downloads">
                  <div class="icon-box icon-box-side icon-box-light">
                     <span class="icon-box-icon icon-downloads mr-2">
                     <i class="w-icon-download"></i>
                     </span>
                     <div class="icon-box-content">
                        <h4 class="icon-box-title ls-normal">Downloads</h4>
                     </div>
                  </div>
                  <p class="mb-4">No downloads available yet.</p>
                  <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                  Shop<i class="w-icon-long-arrow-right"></i></a>
               </div>
               <div class="tab-pane" id="account-addresses">
                  <div class="icon-box icon-box-side icon-box-light">
                     <span class="icon-box-icon icon-map-marker">
                     <i class="w-icon-map-marker"></i>
                     </span>
                     <div class="icon-box-content">
                        <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
                     </div>
                  </div>
                  <p>The following addresses will be used on the checkout page
                     by default.
                  </p>
                  <div class="row">
                    
                    <?php
                    $id =  $userdata['id'];
                    $address = $this->db->get_where('tbl_useraddress',['user_id'=>$id])->result();
                    foreach( $address as $row ){
                    ?>
                      
                      
                     <div class="col-sm-6 mb-6">
                        <div class="ecommerce-address billing-address pr-lg-8">
                           <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                           <address class="mb-4">
                              <table class="address-table">
                                 <tbody>
                                    <tr>
                                       <th>Name:</th>
                                       <td><?php echo $row->billing_name;  ?></td>
                                    </tr>
                                    <tr>
                                       <th>Email:</th>
                                       <td><?php echo $row->billing_email;  ?></td>
                                    </tr>
                                    <tr>
                                       <th>Address:</th>
                                       <td><?php echo $row->building_name;  ?><br><?php echo $row->road_area_colony;  ?></td>
                                    </tr>
                                    <tr>
                                       <th>City:</th>
                                       <td><?php echo $row->city	;  ?></td>
                                    </tr>
                                    <tr>
                                       <th>Country:</th>
                                       <td><?php echo $row->country;  ?></td>
                                    </tr>
                                    <tr>
                                       <th>Postcode:</th>
                                       <td><?php echo $row->pincode;  ?></td>
                                    </tr>
                                    <tr>
                                       <th>Phone:</th>
                                       <td><?php echo $row->billing_mobile_no;  ?>,<?php echo $row->alter_mobile_no;  ?></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </address>
                            <a href="<?php echo base_url(''); ?>user-address/<?php echo $row->id;  ?>"  type="button" class="btn btn-dark btn-rounded">Edit <i class="w-icon-long-arrow-right"></i></a>
                        </div>
                     </div>
                     
                    <?php
                    }
                    ?>
                     <a href="<?php  echo base_url('user-address'); ?>"  type="button"  class="btn btn-dark btn-rounded">Add New Address <i class="w-icon-long-arrow-right"></i></a>
                  </div>
               </div>
               <div class="tab-pane" id="account-details">
                  <div class="icon-box icon-box-side icon-box-light">
                     <span class="icon-box-icon icon-account mr-2">
                     <i class="w-icon-user"></i>
                     </span>
                     <div class="icon-box-content">
                        <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                     </div>
                  </div>
                 
                  
                     <div class="form-group mb-3">
                        <label for="display-name"> User name *</label>
                        <input type="text" id="display-name" name="username" placeholder="John Doe"
                           class="form-control form-control-md mb-0" value="<?php if(!empty($userdata)) echo($userdata['username']) ?>">
                        <p>This will be how your name will be displayed in the account section and in reviews</p>
                     </div>
                     
                     <div class="form-group mb-6">
                        <label for="email_1"> Email address *</label>
                        <input type="email" id="email_1" name="email" value="<?php if(!empty($userdata)) echo($userdata['email']) ?>"
                           class="form-control form-control-md">
                     </div>
                     
                     <div class="form-group mb-6">
                        <label for="email_1"> Contact Number *</label>
                        <input type="number" id="contact" name="contact" value="<?php if(!empty($userdata)) echo($userdata['contact']) ?>"
                           class="form-control form-control-md">
                     </div>
                     
                     <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                     <form id="changepassword" action="javascript:void(0)"  method="POST">
                        <div class="form-group mb-6">
                           <label class="text-dark" for="cur-password">Current Password leave blank to leave unchanged</label>
                           <input type="password" name="password" class="form-control form-control-md"
                              id="cur-password"  required>
                        </div>
                        <div class="form-group mb-6">
                           <label class="text-dark" for="new-password">New Password leave blank to leave unchanged</label>
                           <input type="password" class="form-control form-control-md"
                              id="new_password" name="new_password" required>
                        </div>
                        <div class="form-group mb-6">
                           <label class="text-dark" for="conf-password">Confirm Password</label>
                           <input type="password" class="form-control form-control-md"
                              id="conf_password" name="conf_password" required>
                        </div>
                        <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                     </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End of PageContent -->
</main>
<!-- End of Main -->
<script>
 $("#changepassword").submit(function(event) {
        event.preventDefault();
     
       $.ajax({
           type: "POST", 
           url: '<?php echo base_url('User/update_password');?>',
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
                 }  
           },
           error:function()
           {
             toastr.error('Something Went Wrong..');
           },
           complete:function()
           {}
       });
   });
</script>