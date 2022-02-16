<!-- end row -->
<div class="row d-flex justify-content-center">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title"> Term And Conditions </h4>
         <form id="forms"  method="POST" enctype="multipart/form-data">
            <div class="row">
               <div class=" col-12 mb-3">
                  <label class="form-label">Term And Conditions</label>
                  <textarea cols="3" name="term_and_conditions" class="form-control ckeditor" placeholder="Term And Conditions"><?php if(!empty($websetting)) echo($websetting->term_and_conditions) ?></textarea> 
               </div>
            </div>
            <div class="mb-0 row">
               <div class="col-12 text-end">
                  <button type="submit" class="btn btn-primary waves-effect">
                  Update
                  </button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- end row -->
<script>
   $("#forms").submit(function(event) {
       event.preventDefault();
        for ( instance in CKEDITOR.instances ) {
          CKEDITOR.instances[instance].updateElement();
        }
       $.ajax({
           type: "POST", 
           url: '<?php echo base_url('dashboard/home/term_and_conditions_save');?>',
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
</script>