      <!-- end row -->
      <div class="row d-flex justify-content-center">
         <div class="card">
            <div class="card-body">
               <div class="head d-flex justify-content-between align-items-center mb-4">
               <h4 class="card-title">Product</h4>
               <a  href="<?php  echo base_url();  ?>dashboard/product/product/all" style="border-radius: 0px;" class="btn btn-primary waves-effect waves-light"> Manage Product </a>
               </div>
               <hr>
               <!-- <h4 class="card-title"> Biography </h4> -->
               <form id="forms"  method="POST" enctype="multipart/form-data">
                   <?php //print_r($edit_product); ?>
                  <div class="row">
                     <div class="col-12 mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="name" value="<?php if(!empty($edit_product)) echo($edit_product->name) ?>" class="form-control" required placeholder="Product Name" required>
                        <input type="hidden" name="edit_id" value="<?php if(!empty($edit_product)) echo($edit_product->id) ?>"  class="form-control" >
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-6 mb-3">
                        <label class="form-label"> Category</label>
                        <select class="form-control select2" name="category" id="category_id" required onchange="getSubCategory(this.value)">
                           <option value=""> --- Select Category ---</option>
                           <?php
                               if(!empty($category)){
                                 $i=1;
                                 foreach ($category as $k=>$v) {
                            ?>
                            <option value="<?=$v->slug?>" <?php if(!empty($edit_product) && $edit_product->category == $v->slug){ echo "selected"; } ?> ><?=$v->cat_name?></option>
                            <?php
                                 }
                               }
                            ?>
                        </select>
                     </div>
                     <div class="col-6 mb-3">
                        <label class="form-label"> Sub Category</label>
                        <select class="form-control select2" name="sub_category" id="sub_category" required>
                           <option value=""> --- Select Sub Category ---</option>
                           <?php
                               if(!empty($sub_category)){
                                 $i=1;
                                 foreach ($sub_category as $k=>$v) {
                            ?>
                            <option value="<?=$v->slug?>" <?php if(!empty($edit_product) && $edit_product->sub_category == $v->slug){ echo "selected"; } ?> ><?=$v->cat_name?></option>
                            <?php
                                 }
                               }
                            ?>
                        </select>
                     </div>
                     <div class="col-6 mb-3">
                        <label class="form-label"> Size </label>
                        <select class="form-control select2" name="size" id="size" required>
                           <option value=""> --- Select size ---</option>
                           <?php
                               if(!empty($size)){
                                 $i=1;
                                 foreach ($size as $k=>$v) {
                            ?>
                            <option value="<?=$v->id?>" <?php if(!empty($edit_product) && $edit_product->size == $v->id){ echo "selected"; } ?> ><?=$v->name?></option>
                            <?php
                                 }
                               }
                            ?>
                        </select>
                     </div>
                     <div class="col-6 mb-3">
                        <label class="form-label"> Unit </label>
                        <select class="form-control select2" name="unit" id="unit" required>
                           <option value=""> --- Select Unit ---</option>
                           <?php
                               if(!empty($unit)){
                                 $i=1;
                                 foreach ($unit as $k=>$v) {
                            ?>
                            <option value="<?=$v->id?>" <?php if(!empty($edit_product) && $edit_product->unit == $v->id){ echo "selected"; } ?> ><?=$v->name?></option>
                            <?php
                                 }
                               }
                            ?>
                        </select>
                     </div>
                     <div class="col-6 mb-3">
                        <label class="form-label"> Color </label>
                        <select class="form-control select2" name="color" id="color" required>
                           <option value=""> --- Select Color ---</option>
                           <?php
                               if(!empty($color)){
                                 $i=1;
                                 foreach ($color as $k=>$v) {
                            ?>
                            <option value="<?=$v->id?>" <?php if(!empty($edit_product) && $edit_product->color == $v->id){ echo "selected"; } ?> ><?=$v->name?></option>
                            <?php
                                 }
                               }
                            ?>
                        </select>
                     </div>
                     <div class="col-6 mb-3">
                        <label class="form-label"> Quantity </label>
                        <input type="text" name="quantity" class="form-control" value="<?php if(!empty($edit_product)) echo($edit_product->quantity) ?>" placeholder="Quantity">
                     </div>

                     <div class="col-6 mb-3">
                        <label class="form-label"> Brand</label>
                        <select class="form-control select2" name="brand" id="brand" required>
                           <option value=""> --- Select Brand ---</option>
                           <?php
                               if(!empty($brand)){
                                 $i=1;
                                 foreach ($brand as $k=>$v) {
                            ?>
                            <option value="<?=$v->slug?>" <?php if(!empty($edit_product) && $edit_product->brand == $v->slug){ echo "selected"; } ?> ><?=$v->name?></option>
                            <?php
                                 }
                               }
                            ?>
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12 mb-3">
                        <label class="form-label">Description </label>
                        <textarea rows="3" name="description" class="form-control ckeditor" placeholder="Enter Short Description"><?php if(!empty($edit_product)) echo($edit_product->description) ?></textarea>
                       
                     </div>
                     <div class="col-12 mb-3">
                        <label class="form-label">Specifications</label>
                        <textarea class="form-control ckeditor" id="specifications" name="specifications"><?php if(!empty($edit_product)) echo($edit_product->specifications) ?></textarea>
                        
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-6 mb-3">
                        <label class="form-label"> Price </label>
                        <input type="number" name="price" min="0" class="form-control" value="<?php if(!empty($edit_product)) echo($edit_product->price) ?>" placeholder="Price">
                     </div>
                     <div class="col-6 mb-3">
                        <label class="form-label"> Discount Type </label>
                        <select class="form-control select2" name="discount_type" id="discount_type" required>
                           <option value=""> --- Select Discount Type ---</option>
                           <option value="fix"> --- Fix  ---</option>
                           <option value="percentage"> --- Percentage  ---</option>
                        </select>
                     </div>
                     <div class="col-6 mb-3">
                        <label class="form-label"> Discount </label>
                        <input type="number" name="discount" min="0" class="form-control" value="<?php if(!empty($edit_product)) echo($edit_product->discount) ?>" placeholder="Discount">
                     </div>
                     <div class="col-6 mb-3">
                        <label class="form-label"> Tax </label>
                        <select class="form-control select2" name="tax" id="tax" required>
                           <option value=""> --- Null ---</option>
                           <option value="1"> --- GST@18  ---</option>
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <!-- <div class="col-6 mb-3">
                        <label class="form-label"> Slug </label>
                        <input type="text" name="slug" class="form-control" value="<?php if(!empty($edit_product)) echo($edit_product->slug) ?>" placeholder="Slug">
                     </div> -->
                     <div class="col-6 mb-3">
                        <label class="form-label">Product Cover Image </label>
                        <input type="file" name="image" class="form-control" >
                        <input type="hidden" name="old_image" value="<?php if(!empty($edit_product)) echo($edit_product->image) ?>" >
                     </div>

                     <?php
                     if(empty($edit_product)){
                     ?>
                     <div class="row mb-3" style="align-items: center;" >
                        <div class="col-md-10 dynamic-field" id="dynamic-field-1">
                           <div class="row" >
                              <div class="col-md-9">
                                 <div class="staresd">
                                    <div class="imgup">
                                       <p><i class="fa fa-image"></i>Upload Gallery Image</p>
                                       <input type="file"  name="product_image[]" class="form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2 mt-30 append-buttons">
                           <div class="clearfix" style="margin-top: 35px;">
                              <button type="button" id="add-button" class="btn btn-secondary float-left text-uppercase shadow-sm"><i class="fa fa-plus fa-fw"></i>
                              </button>
                              <button type="button" id="remove-button" class="btn btn-secondary float-left text-uppercase ml-1" disabled="disabled"><i class="fa fa-minus fa-fw"></i>
                              </button>
                           </div>
                        </div>
                     </div>
                     <?php
                     }
                     ?>
                  </div>
                  <div class="row">
                     <div class=" col-12 mb-3">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_tag_title" class="form-control" placeholder="Meta Title" value="<?php if(!empty($edit_product)) echo($edit_product->meta_tag_title) ?>">    
                     </div>
                     <div class=" col-12 mb-3">
                        <label class="form-label">Meta Description</label>
                        <textarea cols="3" name="meta_tag_description" class="form-control" placeholder="Meta Description"><?php if(!empty($edit_product)) echo($edit_product->meta_tag_description) ?></textarea>  
                     </div>
                     <div class=" col-12 mb-3">
                        <label class="form-label">Meta Keyword</label>
                        <textarea cols="3" name="meta_tag_keywords" class="form-control" placeholder="Meta Keyword"><?php if(!empty($edit_product)) echo($edit_product->meta_tag_keywords) ?></textarea> 
                     </div>
                     <div class=" col-12 mb-3">
                        <label class="form-label">Tags</label>
                        <textarea cols="3" name="tag" class="form-control" placeholder="Tags"><?php if(!empty($edit_product)) echo($edit_product->tag) ?></textarea>  
                     </div>
                     <div class="col-6 mb-3">
                        <label class="form-label"> Status </label>
                        <select class="form-control select2" name="is_active" id="is_active" required>
                           <option value=""> --- Select Status ---</option>
                           <option value="1" <?php if(!empty($edit_product) && $edit_product->is_active == 1){ echo "selected"; } ?> >  Active </option>
                           <option value="2" <?php if(!empty($edit_product) && $edit_product->is_active == 2){ echo "selected"; } ?> > Inactive </option>
                        </select>
                     </div>
                     <div class="col-6 mb-3">
                        <label class="form-label"> Product Type </label>
                        <select class="form-control select2" name="product_type" id="product_type" required>
                           <option value=""> --- Product Type ---</option>
                           <?php
                               if(!empty($type)){
                                 $i=1;
                                 foreach ($type as $k=>$v) {
                            ?>
                            <option value="<?php echo $v->id ?>" <?php if(!empty($edit_product) && $edit_product->brand == $v->id){ echo "selected"; } ?> ><?php echo $v->name?></option>
                            <?php
                                 }
                               }
                            ?>
                            <option value=""> Other </option>
                        </select>
                     </div>
                  </div>
                  <div class="mb-0 row">
                     <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary waves-effect">
                        Submit
                        </button>
                        <button type="reset" class="btn btn-secondary waves-effect">
                        Cancel
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- end row -->
<script>
   $(document).ready(function() {
     var buttonAdd = $("#add-button");
     var buttonRemove = $("#remove-button");
     var className = ".dynamic-field";
     var count = 0;
     var field = "";
     var maxFields =50;
   
     function totalFields() {
       return $(className).length;
     }
   
     function addNewField() {
       count = totalFields() + 1;
       field = $("#dynamic-field-1").clone();
       field.attr("id", "dynamic-field-" + count);
       field.children("label").text("Field " + count);
       field.find("input").val("");
       $(className + ":last").after($(field));
     }
   
     function removeLastField() {
       if (totalFields() > 1) {
         $(className + ":last").remove();
       }
     }
   
     function enableButtonRemove() {
       if (totalFields() === 2) {
         buttonRemove.removeAttr("disabled");
         buttonRemove.addClass("shadow-sm");
       }
     }
   
     function disableButtonRemove() {
       if (totalFields() === 1) {
         buttonRemove.attr("disabled", "disabled");
         buttonRemove.removeClass("shadow-sm");
       }
     }
   
     function disableButtonAdd() {
       if (totalFields() === maxFields) {
         buttonAdd.attr("disabled", "disabled");
         buttonAdd.removeClass("shadow-sm");
       }
     }
   
     function enableButtonAdd() {
       if (totalFields() === (maxFields - 1)) {
         buttonAdd.removeAttr("disabled");
         buttonAdd.addClass("shadow-sm");
       }
     }
   
     buttonAdd.click(function() {
       addNewField();
       enableButtonRemove();
       disableButtonAdd();
     });
   
     buttonRemove.click(function() {
       removeLastField();
       disableButtonRemove();
       enableButtonAdd();
     });
   });
   
   
   
   $("#forms").submit(function(event) {
   
       event.preventDefault();
        for ( instance in CKEDITOR.instances ) {
          CKEDITOR.instances[instance].updateElement();
        }
       $.ajax({
           type: "POST", 
           url: '<?php echo base_url('dashboard/product/Product/save');?>',
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
               setTimeout(function(){ 
                 window.location.reload()
                }, 1000);
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
   
   /*function getCategory(parent_catid){
     $.ajax({
         url:"<?php echo base_url('Admin/bio/Biography/get_category');?>",
         type:"POST",
         data:{parent_catid:parent_catid},
         success:function(succ){
             //alert(succ);
             $("#category_id").html(succ);
         }
     });
   }*/
   function getSubCategory(cat_slug){
     $.ajax({
         url:"<?php echo base_url('dashboard/product/Product/get_sub_category');?>",
         type:"POST",
         data:{cat_slug:cat_slug},
         success:function(succ){
            $("#sub_category").html(succ);
         }
     });
   }
</script>