<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>E-commerce - Login and Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/login/assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/login/assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/login/assets/fonts/flaticon/font/flaticon.css">

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
<div class="login-14"  style="background-image: url('<?php echo base_url(); ?>assets/login/assets/img/e-commerces.jpg');">
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
                            <h3>Recover Your Password</h3>
                            <form id="forget-password" method="post">
                                <div class="form-group clearfix">
                                    <input name="email" type="email" class="form-control" placeholder="Email Address" aria-label="Email Address">
                                </div>
                                <div class="form-group clearfix">
                                    <div class="g-recaptcha" data-sitekey="6LcKi1keAAAAANvqvXcb8G0scH-XfQAlFUEZWDYL"></div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-primary btn-theme"><span>Send Me Email</span></button>
                                </div>
                                <div class="clearfix"></div>
                                <div class="social-list">
                                    <span>Or Login With</span>
                                    <a href="#" class="facebook-bg">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#" class="twitter-bg">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#" class="google-bg">
                                        <i class="fa fa-google"></i>
                                    </a>
                                    <a href="#" class="linkedin-bg">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </div>
                            </form><br>
                          
                            
                            <div class="clearfix"></div>
                        </div>
                          <div style="background: white;padding: 10px;"><p>Already a member? <a href="<?php echo base_url('user-login'); ?>"><b>Login here</b></a></p></div>
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
$("#forget-password").submit(function(event) {
   
      event.preventDefault();
      $.ajax({
      type: "POST", 
      url: '<?php echo base_url('User/forgetPassword');?>',
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
          }else
          {
            toastr.success(responce.message);
            setTimeout(function(){ window.location = "<?php echo base_url();?>"; }, 1000);
          }   
      },
      error:function()
      {
           toastr.error("Boom!...");
      },
      complete:function()
      {}
  });
});
</script>
</body>
</html>
