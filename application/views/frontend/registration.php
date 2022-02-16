<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>E-commerce - Login and Register Form HTML5 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/login/assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/login/assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/login/assets/fonts/flaticon/font/flaticon.css">
      <link rel="stylesheet" type="text/css" href="<?php   echo base_url();  ?>assets/web/assets/css/loader.css">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/login/assets/img/favicon.ico" type="image/x-icon" >

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <!-- Custom Stylesheet -->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/login/assets/css/style.css">
      <script src="<?php echo base_url(); ?>assets/login/assets/js/jquery-3.6.0.min.js"></script>
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body id="top">
<div class="page_loader"></div>

<!-- Login 14 start -->
<div class="login-14" style="background-image: url('<?php echo base_url(); ?>assets/login/assets/img/e-commerces.jpg');" >
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

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-section">
                    <div class="form-inner">
                        <div class="logo-2">
                            <a href="login-14.html">
                                <img src="<?php echo base_url(); ?>assets/login/assets/img/logos/logo-2.png" alt="logo">
                            </a>
                        </div>
                        <div class="details">
                            <h3>Create An Cccount
                            </h3>
                            <form id="save-user"  method="POST">
                                <div class="form-group clearfix">
                                    <input name="username" type="text" class="form-control" placeholder="Full Name" aria-label="Full Name">
                                </div>
                                <div class="form-group clearfix">
                                    <input name="contact" type="number" min="0" class="form-control" placeholder="Contact Number" aria-label="Contact Number">
                                </div>
                                <div class="form-group clearfix">
                                    <input name="email" type="email" class="form-control" placeholder="Email Address" aria-label="Email Address">
                                </div>
                                <div class="form-group clearfix">
                                    <input name="password" type="password" class="form-control" autocomplete="off" placeholder="Password" aria-label="Password">
                                </div>
                                <div class="form-group clearfix">
                                    <input name="conf_password" type="password" class="form-control" autocomplete="off" placeholder="Confirm Password" aria-label="Confirm Password">
                                </div>
                                 <div class="form-group clearfix">
                                    <div class="g-recaptcha" data-sitekey="6LcKi1keAAAAANvqvXcb8G0scH-XfQAlFUEZWDYL"></div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberme">
                                        <label class="form-check-label" for="rememberme">
                                            I agree to the terms of service
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-primary btn-theme"><span>Register</span></button>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                            <p style="color: #ffffff;">Already a member? <a href="<?php echo base_url('user-login'); ?>"><b style="color: #ffffff;">Login here</b></a></p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login 14 end -->

<!-- External JS libraries -->
<script src="<?php echo base_url(); ?>assets/login/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/assets/js/app.js"></script>
<!-- Custom JS Script -->
<script>
$("#save-user").submit(function(event) {
    
      event.preventDefault();
      $.ajax({
      type: "POST", 
      url: '<?php echo base_url('User/userRegister'); ?>',
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
</body>
</html>
