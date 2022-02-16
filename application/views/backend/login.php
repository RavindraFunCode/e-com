<!doctype html>
<head>

        <meta charset="utf-8" />
        <title>Login |  Admin & Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/assets/images/favicon.ico"> 
        
        <!-- Bootstrap Css -->
        <link href="<?php echo base_url(); ?>assets/admin/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url(); ?>assets/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url(); ?>assets/admin/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/jquery/jquery.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </head>

<body>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="card-body pt-0">

                        <h3 class="text-center mt-5 mb-4">
                            <a href="index.html" class="d-block auth-logo">
                                <img src="<?php echo base_url(); ?>assets/admin/assets/images/logo-dark.png" alt="" height="30" class="auth-logo-dark">
                                <img src="<?php echo base_url(); ?>assets/admin/assets/images/logo-light.png" alt="" height="30" class="auth-logo-light">
                            </a>
                        </h3>

                        <div class="p-3">
                            <h4 class="text-muted font-size-18 mb-1 text-center">Welcome Back !</h4>
                            <p class="text-muted text-center">Sign in to continue to Lexa.</p>
                                <form class="form-horizontal mt-4"  action="<?php echo site_url('auth/login_process');?>" method="post">
                                <div class="mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control"  name="username" value="admin" id="username" placeholder="Enter username">
                                </div>
                                <div class="mb-3">
                                    <label for="userpassword">Password</label>
                                    <input type="password" class="form-control" name="password" value="admin@123"  id="userpassword" placeholder="Enter password">
                                </div>
                                <div class="mb-3 row mt-4">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customControlInline">
                                            <label class="form-check-label" for="customControlInline">Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>
                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-4">
                                        <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
</div>

    
    <script src="<?php echo base_url(); ?>assets/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/assets/libs/node-waves/waves.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- App js -->
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/app.js"></script>

    
    <script type="text/javascript">
        toastr.options = {
                      "closeButton": false,
                      "debug": false,
                      "newestOnTop": false,
                      "progressBar": false,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "3000",
                      "hideDuration": "1000",
                      "timeOut": "5000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                  }
    <?php if($this->session->flashdata('success')){ ?>
       Command: toastr["success"]('<?php echo $this->session->flashdata('success');  $this->session->unset_userdata('success');?>');

    <?php } ?>

    <?php if($this->session->flashdata('update')){ ?>
       Command: toastr["info"]('<?php echo $this->session->flashdata('update');   $this->session->unset_userdata('update'); ?>');

    <?php } ?>

    <?php if($this->session->flashdata('error')){ ?>
       Command: toastr["error"]('<?php echo $this->session->flashdata('error');   $this->session->unset_userdata('success'); ?>');

    <?php } ?>

    <?php if($this->session->flashdata('info')){ ?>
       Command: toastr["info"]('<?php echo $this->session->flashdata('info');   $this->session->unset_userdata('success'); ?>');

    <?php } ?>

    $(function () {
     $('[data-toggle="tooltip"]').tooltip()
    })

   </script>
    </body>
</html>
