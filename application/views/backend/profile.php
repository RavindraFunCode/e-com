
                       
<!-- end row -->
<div class="row justify-content-center">
    <div class="col-xl-6 ">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Profile</h4>
              

                <form class="custom-validation" action="<?php echo base_url(); ?>Dashboard/admin/update_profile" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Profile Image</label>
                        <input type="file" class="form-control" name="image">
                        <input type="hidden" class="form-control" name="oldImage"   value="<?php  echo $profile->image  ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username"   value="<?php  echo $profile->username  ?>"  required placeholder="Username"/>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">E-Mail</label>
                        <div>
                            <input type="email" class="form-control" name="email"   value="<?php  echo $profile->email  ?>" required
                                    parsley-type="email" value="E-Mail"/>
                        </div>
                    </div>
                   
                  
                    <div class="mb-3">
                        <label class="form-label">Number</label>
                        <div>
                            <input data-parsley-type="number" name="contact" value="<?php  echo $profile->contact  ?>"   type="text" class="form-control" required  placeholder="Phone Number"/>
                        </div>
                    </div>
                 
                    <div class="mb-3">
                        <label class="form-label">About</label>
                        <div>
                            <textarea required class="form-control" name="about" rows="5"></textarea>
                        </div>
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
    </div> <!-- end col -->

</div> <!-- end row -->
