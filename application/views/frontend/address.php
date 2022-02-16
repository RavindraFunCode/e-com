<!-- Start of Main -->
<main class="main">
   <!-- Start of Page Header -->
   <div class="page-header">
      <div class="container">
         <h1 class="page-title mb-0">Address</h1>
      </div>
   </div>
   <!-- End of Page Header -->
   <!-- Start of Breadcrumb -->
   <nav class="breadcrumb-nav mb-10 pb-1">
      <div class="container">
         <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li>Address</li>
         </ul>
      </div>
   </nav>
   <!-- End of Breadcrumb -->
   <!-- Start of PageContent -->
   <div class="page-content contact-us">
      <div class="container">
         <section class="content-title-section mb-10">
            <h3 class="title title-center mb-3"> Add Address </h3>
         </section>
    
         <!-- End of Contact Information section -->
         <hr class="divider mb-10 pb-1">
         <section class="contact-section">
            <div class="row gutter-lg pb-3">
                  <form class="form contact-us-form"  id="save-address" method="post">
                     <div class="row gutter-lg pb-3"> 
                    
                       <div class="form-group col-lg-6">
                        <label for="username">Your Name</label>
                        <input type="text" id="username" name="billing_name" class="form-control" value="<?php if(!empty($address)) echo($address->billing_name) ?>"  required>
                        <input type="hidden" id="edit_id" name="edit_id" class="form-control" value="<?php if(!empty($address)) echo($address->id) ?>"  required>
                       </div>
                    
                     
                      <div class="form-group col-lg-6">
                        <label for="email_1">Your Email</label>
                        <input type="email" id="email_1" name="billing_email" class="form-control" value="<?php if(!empty($address)) echo($address->billing_email) ?>" required>
                      </div>
                   
                    
                     <div class="form-group col-lg-6">
                        <label for="number_1">Your Phone Number</label>
                        <input type="number" id="number_1" name="billing_mobile_no" class="form-control" value="<?php if(!empty($address)) echo($address->billing_mobile_no) ?>" required>
                     </div>
                     
                     <div class="form-group col-lg-6">
                        <label for="number_1">Alternative Phone Number</label>
                        <input type="number" id="number_1" name="alter_mobile_no" class="form-control" value="<?php if(!empty($address)) echo($address->alter_mobile_no) ?>" required>
                     </div>
                     
                     
                     <div class="form-group col-lg-12">
                        <label for="building_name">House No,Building Name</label>
                        <textarea id="building_name" name="building_name" cols="30" rows="3" class="form-control" required><?php if(!empty($address)) echo($address->building_name) ?></textarea>
                     </div>
                     
                     <div class="form-group col-lg-6">
                        <label for="road_area_colony">Road Area Colony</label>
                        <input type="text" id="road_area_colony" name="road_area_colony"class="form-control" value="<?php if(!empty($address)) echo($address->road_area_colony) ?>" required>
                     </div>
                     
                     <div class="form-group col-lg-6">
                        <label for="landmark">Land Mark (Optional)</label>
                        <input type="text" id="landmark" name="landmark" value="<?php if(!empty($address)) echo($address->landmark) ?>"  class="form-control">
                     </div>
                     
                     <div class="form-group col-lg-6">
                        <label for="country">Select Country</label>
                        <select name="country" id="country"  class="form-control" required>
                          <option value="India">India</option>
                        </select>
                     </div>
                     
                     <div class="form-group col-lg-6">
                        <label for="state">Enter State</label>
                        <input type="text" id="state" name="state" class="form-control" value="<?php if(!empty($address)) echo($address->state) ?>" required>
                     </div>
                     
                     <div class="form-group col-lg-6">
                        <label for="city">Enter District ( City )</label>
                        <input type="text" id="city" name="city"  class="form-control" value="<?php if(!empty($address)) echo($address->city) ?>" required>
                     </div>
                     
                     <div class="form-group col-lg-6">
                        <label for="pincode">Enter Pincode/Zipcode </label>
                        <input type="text" id="pincode" name="pincode" class="form-control" value="<?php if(!empty($address)) echo($address->pincode) ?>" required> 
                     </div>
                     
                     <div class="form-group col-lg-12">
                        <label for="message">Address Type</label>
                        <label class="radio-inline">
   						      <input type="radio" name="address_type" value="1" readonly="" style="width: 20px;height: 15px" checked>Home (All day delivery)
                        </label>
   						   <label class="radio-inline">
   						      <input type="radio" name="address_type" readonly="" value="2" style="width: 20px;height: 15px">Office (Delivery between 10 AM - 5 PM)
                        </label>
                     </div>
                     
                     
                      <div class="form-group col-lg-12">
                        <div class="g-recaptcha" data-sitekey="6LcKi1keAAAAANvqvXcb8G0scH-XfQAlFUEZWDYL"></div>
                      </div>
                                
                     
                      </div>
                     <button type="submit" class="btn btn-dark btn-rounded">Save Now</button>
                  </form>
               </div>
            </div>
         </section>
         <!-- End of Contact Section -->
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
            setTimeout(function(){ window.location = "<?php echo base_url();?>"; }, 500);
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