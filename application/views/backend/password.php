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
               <h4>Password</h4>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Password</a></li>
                  <li class="breadcrumb-item active">Password</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- end page title -->
      <!-- end row -->
      <div class="row justify-content-center">
         <div class="col-xl-6 ">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Password</h4>
                  <form class="custom-validation" action="<?php echo base_url();  ?>Dashboard/admin/update_password" method="POST">
                     <div class="mb-3">
                        <label class="form-label">Old Password</label>
                        <input type="text" class="form-control" name="password"    required placeholder="Password"/>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="text" class="form-control" name="new_password"    required placeholder="Confirm Password"/>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="text" class="form-control" name="repeat_password"    required placeholder="Confirm Password"/>
                     </div>
                     <div class="mb-0">
                        <div>
                           <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                           Update profile
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- end col -->
      </div>
      <!-- end row -->
   </div>
   <!-- container-fluid -->
</div>
<!-- End Page-content -->