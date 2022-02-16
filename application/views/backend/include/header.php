<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title><?php echo APP_NAME; ?> | <?php echo $title; ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="Admin & Dashboard" name="description" />
      <meta content="Themesbrand" name="author" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/assets/images/favicon.ico">
      <!-- Bootstrap Css -->
      <link href="<?php echo base_url(); ?>assets/admin/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="<?php echo base_url(); ?>assets/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      
      <!-- DataTables -->
      <link href="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <!-- Responsive datatable examples -->
      <link href="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <!-- Bootstrap Css -->
      <link href="<?php echo base_url(); ?>assets/admin/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />


      <!-- App Css-->
      <link href="<?php echo base_url(); ?>assets/admin/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
      <script src="<?php echo base_url(); ?>assets/admin/assets/libs/jquery/jquery.min.js"></script>
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
      <style type="text/css">
         .card {
         border-radius: 0px;
         }
         .btn-secondary {
             background-color: #7a6fbe;
             border-color: #7a6fbe;
         }
         .btn {
            border-radius: 0px; 
         }
         button.btn.btn-secondary.buttons-excel.buttons-html5 {
             margin-left: 10px;
             border-radius: none;
         }
         .modal-header {
               border-radius: 0px !important;  
         }
         .modal-content {
              border-radius: 0px !important;  
         }
      </style>
   </head>
   <body data-sidebar="dark">
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner-chase">
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                </div>
            </div>
        </div>
        
        
      <!-- <body data-layout="horizontal" data-topbar="colored"> -->
      <!-- Begin page -->
      <div id="layout-wrapper">
      <header id="page-topbar">
         <div class="navbar-header">
            <div class="d-flex">
               <!-- LOGO -->
               <div class="navbar-brand-box">
                  <a href="<?php  echo base_url('admin-dashboard') ?>" class="logo logo-dark">
                  <span class="logo-sm">
                  <img src="<?php echo base_url(); ?>assets/admin/assets/images/logo-sm.png" alt="" height="22">
                  </span>
                  <span class="logo-lg">
                  <img src="<?php echo base_url(); ?>assets/admin/assets/images/logo-dark.png" alt="" height="17">
                  </span>
                  </a>
                  <a href="<?php  echo base_url('admin-dashboard') ?>" class="logo logo-light">
                  <span class="logo-sm">
                  <img src="<?php echo base_url(); ?>assets/admin/assets/images/logo-sm.png" alt="" height="22">
                  </span>
                  <span class="logo-lg">
                  <img src="<?php echo base_url(); ?>assets/admin/assets/images/logo-light.png" alt="" height="18">
                  </span>
                  </a>
               </div>
               <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
               <i class="mdi mdi-menu"></i>
               </button>
            </div>
            <div class="d-flex">
               <!-- App Search-->
               <form class="app-search d-none d-lg-block">
                  <div class="position-relative">
                     <input type="text" class="form-control" placeholder="Search...">
                     <span class="fa fa-search"></span>
                  </div>
               </form>
               <div class="dropdown d-inline-block d-lg-none ms-2">
                  <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="mdi mdi-magnify"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                     aria-labelledby="page-header-search-dropdown">
                     <form class="p-3">
                        <div class="form-group m-0">
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                              <div class="input-group-append">
                                 <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="dropdown d-none d-md-block ms-2">
                  <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img class="me-2" src="<?php echo base_url(); ?>assets/admin/assets/images/flags/us_flag.jpg" alt="Header Language" height="16"> English <span class="mdi mdi-chevron-down"></span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end">
                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                     <img src="<?php echo base_url(); ?>assets/admin/assets/images/flags/germany_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> German </span>
                     </a>
                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                     <img src="<?php echo base_url(); ?>assets/admin/assets/images/flags/italy_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Italian </span>
                     </a>
                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                     <img src="<?php echo base_url(); ?>assets/admin/assets/images/flags/french_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> French </span>
                     </a>
                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                     <img src="<?php echo base_url(); ?>assets/admin/assets/images/flags/spain_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Spanish </span>
                     </a>
                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                     <img src="<?php echo base_url(); ?>assets/admin/assets/images/flags/russia_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Russian </span>
                     </a>
                  </div>
               </div>
               <div class="dropdown d-none d-lg-inline-block">
                  <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                  <i class="mdi mdi-fullscreen font-size-24"></i>
                  </button>
               </div>
               <div class="dropdown d-inline-block ms-1">
                  <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="ti-bell"></i>
                  <span class="badge bg-danger rounded-pill">3</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                     aria-labelledby="page-header-notifications-dropdown">
                     <div class="p-3">
                        <div class="row align-items-center">
                           <div class="col">
                              <h5 class="m-0"> Notifications (258) </h5>
                           </div>
                        </div>
                     </div>
                     <div data-simplebar style="max-height: 230px;">
                        <a href="javascript:void(0);" class="text-reset notification-item">
                           <div class="d-flex">
                              <div class="flex-shrink-0 me-3">
                                 <div class="avatar-xs">
                                    <span class="avatar-title border-success rounded-circle ">
                                    <i class="mdi mdi-cart-outline"></i>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex-grow-1">
                                 <h6 class="mb-1">Your order is placed</h6>
                                 <div class="text-muted">
                                    <p class="mb-1">If several languages coalesce the grammar</p>
                                 </div>
                              </div>
                           </div>
                        </a>
                        <a href="javascript:void(0);" class="text-reset notification-item">
                           <div class="d-flex">
                              <div class="flex-shrink-0 me-3">
                                 <div class="avatar-xs">
                                    <span class="avatar-title border-warning rounded-circle ">
                                    <i class="mdi mdi-message"></i>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex-grow-1">
                                 <h6 class="mb-1">New Message received</h6>
                                 <div class="text-muted">
                                    <p class="mb-1">You have 87 unread messages</p>
                                 </div>
                              </div>
                           </div>
                        </a>
                        <a href="javascript:void(0);" class="text-reset notification-item">
                           <div class="d-flex">
                              <div class="flex-shrink-0 me-3">
                                 <div class="avatar-xs">
                                    <span class="avatar-title border-info rounded-circle ">
                                    <i class="mdi mdi-glass-cocktail"></i>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex-grow-1">
                                 <h6 class="mb-1">Your item is shipped</h6>
                                 <div class="text-muted">
                                    <p class="mb-1">It is a long established fact that a reader will</p>
                                 </div>
                              </div>
                           </div>
                        </a>
                        <a href="javascript:void(0);" class="text-reset notification-item">
                           <div class="d-flex">
                              <div class="flex-shrink-0 me-3">
                                 <div class="avatar-xs">
                                    <span class="avatar-title border-primary rounded-circle ">
                                    <i class="mdi mdi-cart-outline"></i>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex-grow-1">
                                 <h6 class="mb-1">Your order is placed</h6>
                                 <div class="text-muted">
                                    <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                 </div>
                              </div>
                           </div>
                        </a>
                        <a href="javascript:void(0);" class="text-reset notification-item">
                           <div class="d-flex">
                              <div class="flex-shrink-0 me-3">
                                 <div class="avatar-xs">
                                    <span class="avatar-title border-warning rounded-circle ">
                                    <i class="mdi mdi-message"></i>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex-grow-1">
                                 <h6 class="mb-1">New Message received</h6>
                                 <div class="text-muted">
                                    <p class="mb-1">You have 87 unread messages</p>
                                 </div>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 w-100 text-center" href="javascript:void(0)">
                        View all
                        </a>
                     </div>
                  </div>
               </div>
               <div class="dropdown d-inline-block">
                  <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img class="rounded-circle header-profile-user" src="<?php echo base_url(); ?>assets/admin/assets/images/users/user-4.jpg"
                     alt="Header Avatar">
                  </button>
                  <div class="dropdown-menu dropdown-menu-end">
                     <!-- item-->
                     <a class="dropdown-item" href="<?php  echo  base_url();   ?>admin-profile"><i class="mdi mdi-account-circle font-size-17 text-muted align-middle me-1"></i> Profile</a>
                     <a class="dropdown-item d-block" href="<?php  echo  base_url();   ?>admin-password"><span class="badge bg-success float-end">11</span><i class="mdi mdi-cog font-size-17 text-muted align-middle me-1"></i> Settings</a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item text-danger" href="<?php echo site_url('auth/logout');?>"><i class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i> Logout </a>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- ========== Left Sidebar Start ========== -->
      <div class="vertical-menu">
         <div data-simplebar class="h-100">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
               <!-- Left Menu Start -->
               <ul class="metismenu list-unstyled" id="side-menu">
                  <li class="menu-title">Main</li>
                  <li>
                     <a href="<?php echo base_url('admin-dashboard'); ?>" class="waves-effect">
                     <i class="mdi mdi-view-dashboard"></i>
                     <span class="badge rounded-pill bg-primary float-end">2</span>
                     <span>Dashboard</span>
                     </a>
                  </li>
                  <!-- <li>
                     <a href="calendar.html" class=" waves-effect">
                         <i class="mdi mdi-view-dashboard"></i>
                         <span>User</span>
                     </a>
                     </li> -->
                  <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                     <i class="mdi mdi-view-dashboard"></i>
                     <span>User</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('dashboard/users/all')  ?>"> User List </a></li>
                        <li><a href="<?php echo base_url('dashboard/users/index')  ?>">Add User </a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                     <i class="mdi mdi-view-dashboard"></i>
                     <span>Catalogue</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('dashboard/catalogue/category/index')  ?>"> Add Category </a></li>
                        <li><a href="<?php echo base_url('dashboard/catalogue/category/all')  ?>"> Category List </a></li>
                        <li><a href="<?php echo base_url('dashboard/catalogue/brand/index')  ?>"> Add Brand </a></li>
                        <li><a href="<?php echo base_url('dashboard/catalogue/brand/all')  ?>"> Brand List </a></li>
                        <li><a href="<?php echo base_url('dashboard/catalogue/size/index')  ?>"> Add Size </a></li>
                        <li><a href="<?php echo base_url('dashboard/catalogue/size/all')  ?>"> Size List </a></li>
                        <li><a href="<?php echo base_url('dashboard/catalogue/unit/index')  ?>"> Add Unit </a></li>
                        <li><a href="<?php echo base_url('dashboard/catalogue/unit/all')  ?>"> Unit List </a></li>
                        <li><a href="<?php echo base_url('dashboard/catalogue/color/index')  ?>"> Add Color </a></li>
                        <li><a href="<?php echo base_url('dashboard/catalogue/color/all')  ?>"> Color List </a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                     <i class="mdi mdi-view-dashboard"></i>
                     <span>Order</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('dashboard/order/order/index')  ?>"> Manage Order </a></li>
                        <li><a href="<?php echo base_url('dashboard/order/payment/all')  ?>"> Manage Payments </a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                     <i class="mdi mdi-view-dashboard"></i>
                     <span>Product</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('dashboard/product/product/index')  ?>"> Add Product </a></li>
                        <li><a href="<?php echo base_url('dashboard/product/product/all')  ?>"> Manage Product </a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                     <i class="mdi mdi-view-dashboard"></i>
                     <span> Web Setting </span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('slider-list')  ?>"> Manage Slider </a></li>
                        <li><a href="<?php echo base_url('add-privacypolicy')  ?>"> Privacy Policy </a></li>
                        <li><a href="<?php echo base_url('add-term-and-conditions')  ?>"> Term and Conditions </a></li>
                        <li><a href="<?php echo base_url('add-returns-policy')  ?>"> Returns Policy </a></li>
                        
                        
                        
                     </ul>
                  </li>
                  <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                     <i class="mdi mdi-view-dashboard"></i>
                     <span>Contact</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('dashboard/contact_us/all')  ?>"> Contact Us Message </a></li>
                     </ul>
                  </li>
               </ul>
            </div>
            <!-- Sidebar -->
         </div>
      </div>
      <!-- Left Sidebar End -->
      <script>
         $(document).ready(function(){
             $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
             });
         });
      </script>
      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">
      <div class="page-content">
      <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <h4><?php echo $title; ?></h4>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item active"><?php echo $title; ?></li>
               </ol>
            </div>
         </div>
      </div>
      <!-- end page title -->