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
                                <label class="form-label">Size Name</label>
                                <input class="form-control" placeholder="Enter Size Name" type="text" name="name" id="name" required value="<?php if(!empty($edit_item)){ echo $edit_item->name;} ?>"  />
                                <input type="hidden" name="edit_id" id="edit_id" value="<?php if(!empty($edit_item)){ echo $edit_item->id;} ?>" />
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
    var custome_base_url = "<?php echo base_url('dashboard/catalogue/size/');?>";
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
                        echo "window.location.href ='".base_url('dashboard/catalogue/size/all')."';";
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