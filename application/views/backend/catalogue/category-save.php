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
                                <label class="form-label">Parent Category</label>
                                <select class="form-control" name="parent_cat">
                                    <option value="0" >Select Parent Category</option>
                                    <?php
                                        foreach ($all_category as $key => $row) {
                                            if(!empty($edit_item) && $row->cat_name==$edit_item->cat_name){
                                                continue;
                                            }
                                    ?>
                                    <option value="<?php echo $row->slug ?>" <?php if(!empty($edit_item) && $edit_item->slug == $row->slug){ echo "selected"; } ?> ><?php echo $row->cat_name?></option>
                                    <?php
                                       }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <input class="form-control" placeholder="Enter Category Name" type="text" name="cat_name" id="cat_name" required value="<?php if(!empty($edit_item)){ echo $edit_item->cat_name;} ?>"  />
                                <input type="hidden" name="edit_id" id="edit_id" value="<?php if(!empty($edit_item)){ echo $edit_item->id;} ?>" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">Category Image</label>
                                <input class="form-control" type="file" name="image" id="image" onchange="show_image(event)" />
                            </div>
                        </div>
                        <div class="col-2 ">
                            <div class="mb-3 <?php echo !empty($edit_item) && !empty($edit_item->image) ? '' : 'show_img' ?>">
                                <label class="form-label">Image Preview</label>
                                <img src="<?php echo !empty($edit_item) && !empty($edit_item->image) ? get_files($this->upload_category, $edit_item->image): '' ?>" title="attach image" style="width: 50%;" id="load_img" class="form-control ">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Category Icon</label>
                                <textarea class="form-control" name="icon" id="icon" data-role="tagsinput" placeholder="Enter Category Icon"><?php if(!empty($edit_item)){ echo $edit_item->icon;} ?></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Category Description</label>
                                <textarea class="form-control" name="description" id="description" required><?php if(!empty($edit_item)){ echo $edit_item->description;} ?></textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Is Menu<span style="color:red;"> (**Applicable Only for Category)</span></label>
                                <select class="form-control" name="is_menu">
                                    <option value="2" <?php if(!empty($edit_item) && $edit_item->is_menu == 2){ echo "selected"; } ?> >No</option>
                                    <option value="1" <?php if(!empty($edit_item) && $edit_item->is_menu == 1){ echo "selected"; } ?> >Yes</option>
                                </select>
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
    var custome_base_url = "<?php echo base_url('dashboard/catalogue/category/');?>";
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
                        echo "window.location.href ='".base_url('dashboard/catalogue/category/all')."';";
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