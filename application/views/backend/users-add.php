<style type="text/css">
    .show_img{
        display: none;
    }
</style>
<!-- end row -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title"><?php echo $title; ?></h4>
                    </div>
                </div>
                <form class="needs-validation" name="event-form" id="forms" novalidate method="post" enctype="multipart/form-data">
                    <div class="row" id="group-row-div">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">User Name</label>
                                <input class="form-control" placeholder="Enter User Name" type="text" name="username" id="username" required value="<?php if(!empty($edit_item)){ echo $edit_item->username;} ?>"  />
                                <input type="hidden" name="edit_id" id="edit_id" value="<?php if(!empty($edit_item)){ echo $edit_item->id;} ?>" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label"> Email</label>
                                <input class="form-control" placeholder="Enter Email" type="text" name="email" id="email" required value="<?php if(!empty($edit_item)){ echo $edit_item->email;} ?>"  />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Contact No.</label>
                                <input class="form-control" placeholder="Enter Contact No." type="text" name="contact" id="contact" required value="<?php if(!empty($edit_item)){ echo $edit_item->contact;} ?>"  />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">Profile Image</label>
                                <input class="form-control" type="file" name="image" id="image" onchange="show_image(event)" />
                            </div>
                        </div>
                        <div class="col-2 ">
                            <div class="mb-3 <?php echo !empty($edit_item) && !empty($edit_item->image) ? '' : 'show_img' ?>">
                                <label class="form-label">Image Preview</label>
                                <img src="<?php echo !empty($edit_item) && !empty($edit_item->image) ? get_files($this->upload_user, $edit_item->image): '' ?>" title="attach image" style="width: 50%;" id="load_img" class="form-control ">
                            </div>
                        </div>
                        <?php if(empty($edit_item)){ ?>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input class="form-control" placeholder="Enter Password" type="password" name="password" id="password" required value="<?php if(!empty($edit_item)){ echo $edit_item->password;} ?>"  />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input class="form-control" placeholder="Enter Confirm Password" type="password" name="conf_password" id="conf_password" required value=""  />
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">About</label>
                                <input class="form-control" placeholder="Enter About" type="text" name="about" id="about" required value="<?php if(!empty($edit_item)){ echo $edit_item->about;} ?>"  />
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-control" name="is_active">
                                    <?php
                                        foreach (STATUS as $key => $row) {
                                    ?>
                                    <option value="<?=$key ?>" <?php if(!empty($edit_item) && $edit_item->is_active == $key){ echo "selected"; } ?> ><?=$row?></option>
                                    <?php
                                       }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6"> </div>
                        <div class="col-6 text-end">
                            <button type="submit" class="btn btn-primary" id="btn-save-event">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<script>
    var custome_base_url = "<?php echo base_url('dashboard/users/');?>";
    function show_image(event) {
        $("#load_img").attr('src', URL.createObjectURL(event.target.files[0]));
        $(".show_img").show();
    }
    $("#forms").submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST", 
            url: custome_base_url+'save',
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
                <?php 
                    if(!empty($edit_item)){ 
                        echo "window.location.href ='".base_url('dashboard/users/all')."';";
                    } else{
                        echo "window.location.href = window.location.href;";
                    }
                ?>
                
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