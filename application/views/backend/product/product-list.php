      <!-- end row -->
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <div class="head d-flex justify-content-between align-items-center mb-4">
                     <h4 class="card-title">All Product List</h4>
                     <a  href="<?php  echo base_url('dashboard/product/product/index') ?>" style="border-radius: 0px;" class="btn btn-primary waves-effect waves-light">Add Product</a>
                  </div>
                  <div class="table-responsive">
                      <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Image</th>
                              <th>Category / SubCategory </th>
                              <th>Product Name</th>
                              <th>price</th>
                              <th>Sell Price</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>
                     
                  </div>
               </div>
            </div>
         </div>
         <!-- end col -->
      </div>
      <!-- end row -->
<!-- End Page-content -->
<!--  product details modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content" style="border-radius: 0px">
         <div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">Details</h5>
            <button type="button" class="btn-close btn btn-primary" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body" id="detailsData">
         </div>
      </div>
    
   </div>
   
</div>
<!-- /.product details modal -->

<script type="text/javascript">
   function changeStatus(id){

  $.ajax({
      url:"<?=base_url() ?>dashboard/product/product/changeStatus",
      type:"POST",
      data:{id:id},
      success:function(succ){
          succ = JSON.parse(succ);
          if(succ.status==0)
          {
            toastr.error(succ.message);
          }else if(succ.status==1)
          {
            toastr.success(succ.message);
              } 
          }
      });
    }


   $(document).ready(function(){
     fill_datatable();
     function fill_datatable()
     {
   
      var dataTable = $('#datatable').DataTable({
       "processing" : true,
       "serverSide" : true,
       "searching" : true,
       "order" : [],
       "dom": 'Bfrtip',
        buttons: [
                   'csv', 'excel'
               ],
       "ajax" : {
        url:"<?php echo base_url('dashboard/product/product/getdatalist');?>",
        type:"POST",
        data:{}
       }
      });
     }
   });
   function showDetails(id)
       {
         $.ajax({
                 type: "POST", 
                 url: '<?php echo base_url('dashboard/product/product/showDetails');?>',
                 dataType:'html',
                 data:{'id':id}, 
                 beforeSend:function()
                 {},
                 success:function(responce)
                 { 
                   $('#detailsData').html(responce);
                   $('.bs-example-modal-lg').modal('show');
                 },
                 error:function()
                 {
                   // $.notify("BOOM....!", "error");
                 },
                 complete:function()
                 {
                 }
             });
       }
     $(document).on('click', '.delete', function(){  
              var delete_id = $(this).attr("id");  
               Swal.fire({   
               title: "Are you sure?",
               text: "You won't be able to revert this!",
               icon: "warning",
               showCancelButton: !0,
               confirmButtonText: "Yes, delete it!",
               cancelButtonText: "No, cancel!",
               confirmButtonClass: "btn btn-success mt-2",
               cancelButtonClass: "btn btn-danger ms-2 mt-2",
               buttonsStyling: !1
             }).then((result) => {
               if (result.value) {
                     $.ajax({
                        url:"<?php echo base_url(); ?>dashboard/product/product/delete",  
                        method:"POST",  
                        data:{delete_id:delete_id},
                        error: function() {
                           Swal.fire({
                             icon: 'error',
                             title: 'Oops...',
                             text: 'Something went wrong!',
                           })
                        },
                        success: function(data) {
                              //  window.location.reload();
                                Swal.fire("Deleted!", "Your imaginary file has been deleted.", "success");
                                window.location.reload();
                        }
                     });
                   } else {
                     Swal.fire("Cancelled", "Your imaginary file is safe :)", "error");
                   }
                 });
          });
</script>