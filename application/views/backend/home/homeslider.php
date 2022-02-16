<!-- end page title -->
<!-- end row -->
<div class="row d-flex justify-content-center">
   <div class="col-md-6">
      <div class="card">
         <div class="card-body">
            <div class="head d-flex justify-content-between align-items-center mb-4">
               <h4 class="card-title">Slider</h4>
               <a  href="<?php  echo base_url('slider-list') ?>" style="border-radius: 0px;" class="btn btn-primary waves-effect waves-light">Go Back</a>
            </div>
            <hr>
            <form id="forms" class="custom-validation"  method="POST">
               <div class="mb-3">
                  <label class="form-label"> Image </label>
                  <input type="file" name="image"  class="form-control" >
                  <input type="hidden" name="old_image" value="<?php if(!empty($slider)) echo($slider->image) ?>"  class="form-control" >
                  <input type="hidden" name="edit_id" value="<?php if(!empty($slider)) echo($slider->id) ?>"  class="form-control" >
               </div>
               <div class="mb-0">
                  <div>
                     <button type="submit" class="btn btn-primary waves-effect">
                     Upload
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
<script>
   $("#forms").submit(function(event) {
           event.preventDefault();
           $.ajax({
                   type: "POST", 
                   url: '<?php echo base_url('dashboard/home/savesliders');?>',
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
                      window.location.reload();
                     }  
                   },
                   error:function()
                   {
                     toastr.error('Something Went Wrong..');
                   },
                   complete:function()
                   {}
               });
       })
</script>