<!-- Start of Main -->
<main class="main">
   <!-- Start of Page Header -->
   <div class="page-header">
      <div class="container">
         <h1 class="page-title mb-0">Contact Us</h1>
      </div>
   </div>
   <!-- End of Page Header -->
   <!-- Start of Breadcrumb -->
   <nav class="breadcrumb-nav mb-10 pb-1">
      <div class="container">
         <ul class="breadcrumb">
            <li><a href="demo1.html">Home</a></li>
            <li>Contact Us</li>
         </ul>
      </div>
   </nav>
   <!-- End of Breadcrumb -->
   <!-- Start of PageContent -->
   <div class="page-content contact-us">
      <div class="container">
         <section class="content-title-section mb-10">
            <h3 class="title title-center mb-3">Contact
               Information
            </h3>
            <p class="text-center">Lorem ipsum dolor sit amet,
               consectetur
               adipiscing elit, sed do eiusmod tempor incididunt ut
            </p>
         </section>
         <!-- End of Contact Title Section -->
         <section class="contact-information-section mb-10">
            <div class=" swiper-container swiper-theme " data-swiper-options="{
               'spaceBetween': 20,
               'slidesPerView': 1,
               'breakpoints': {
               '480': {
               'slidesPerView': 2
               },
               '768': {
               'slidesPerView': 3
               },
               '992': {
               'slidesPerView': 4
               }
               }
               }">
               <div class="swiper-wrapper row cols-xl-4 cols-md-3 cols-sm-2 cols-1">
                  <div class="swiper-slide icon-box text-center icon-box-primary">
                     <span class="icon-box-icon icon-email">
                     <i class="w-icon-envelop-closed"></i>
                     </span>
                     <div class="icon-box-content">
                        <h4 class="icon-box-title">E-mail Address</h4>
                        <p>mail@example.com</p>
                     </div>
                  </div>
                  <div class="swiper-slide icon-box text-center icon-box-primary">
                     <span class="icon-box-icon icon-headphone">
                     <i class="w-icon-headphone"></i>
                     </span>
                     <div class="icon-box-content">
                        <h4 class="icon-box-title">Phone Number</h4>
                        <p>(123) 456-7890 / (123) 456-9870</p>
                     </div>
                  </div>
                  <div class="swiper-slide icon-box text-center icon-box-primary">
                     <span class="icon-box-icon icon-map-marker">
                     <i class="w-icon-map-marker"></i>
                     </span>
                     <div class="icon-box-content">
                        <h4 class="icon-box-title">Address</h4>
                        <p>Lawrence, NY 11345, USA</p>
                     </div>
                  </div>
                  <div class="swiper-slide icon-box text-center icon-box-primary">
                     <span class="icon-box-icon icon-fax">
                     <i class="w-icon-fax"></i>
                     </span>
                     <div class="icon-box-content">
                        <h4 class="icon-box-title">Fax</h4>
                        <p>1-800-570-7777</p>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- End of Contact Information section -->
         <hr class="divider mb-10 pb-1">
         <section class="contact-section">
            <div class="row gutter-lg pb-3">
               <div class="col-lg-6 mb-8">
                  <h4 class="title mb-3">People usually ask these</h4>
                   
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.925311405978!2d80.98190131436415!3d26.842327769580013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd2b9abf3c65%3A0x884ab8d1bd3da9c6!2sSTUALLY!5e0!3m2!1sen!2sin!4v1643960816233!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
               </div>
               <div class="col-lg-6 mb-8">
                  <h4 class="title mb-3">Send Us a Message</h4>
                  <form class="form contact-us-form" action="javascript:void(0)" id="contact-forms" method="post">
                     <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Your Name">
                     </div>
                     <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Your Email">
                     </div>
                     <div class="form-group">
                        <label for="contact">Your Phone No.</label>
                        <input type="number" id="contact" name="contact" class="form-control" placeholder="Your Phone No.">
                     </div>
                     <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" cols="30" rows="5" class="form-control" placeholder="Your Message"></textarea>
                     </div>
                     
                     <!-- <div class="form-group">
                        <label for="message">Address Type</label>
                        <label class="radio-inline">
      						<input type="radio" name="address_type" value="1" readonly="" style="width: 20px;height: 15px" checked>Home (All day delivery)</label>
      						<label class="radio-inline">
      						<input type="radio" name="address_type" readonly="" value="2" style="width: 20px;height: 15px">Office (Delivery between 10 AM - 5 PM)</label>
                        </div>                     
                        Address Type-->
                     <button type="submit" class="btn btn-dark btn-rounded">Save Address</button>
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
    var custome_base_url = "<?php echo base_url('web/');?>";
    $("#contact-forms").submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST", 
            url: custome_base_url+'save_contact',
            dataType:'json',
            data: new FormData(this), 
            contentType: false,
            cache: false,
            processData:false,
            beforeSend:function() {},
            success:function(responce)
            {
              if(responce.status==0)
              {
               toastr.error(responce.message);
              }else if(responce.status==1)
              {
               $("#contact-forms")[0].reset();
                toastr.success(responce.message);
              }
            },
            error:function()
            {
              toastr.error('Something Went Wrong..');
            },
            complete:function()
            {
            }
        });
    });
</script>