<!-- end page title -->
<div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <div class="head d-flex justify-content-between align-items-center mb-4">
                     <h4 class="header-title mb-4"  style="font-family: 'Poppins';">Manage Slider</h4>
                     <a  href="<?php  echo base_url('add-slider') ?>" style="border-radius: 0px;" class="btn btn-primary waves-effect waves-light">Add Slider</a>
                  </div>
                  <div class="table-responsive">
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Image</th>
                              <th>Status</th>
                              <th class="hidden-sm">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $i=1;
                              foreach($slider as $row)
                              {
                              ?>
                           <tr>
                              <td><?php echo $i++; ?></td>
                              <td><img src="<?php echo base_url(); ?>uploads/homeslider/<?php echo $row->image; ?>" style="width: 150px;height: 80px;"></td>
                              <td>
                                 <?php
                                   $ischecked = $row->status=="1"?"checked":"";
                                  ?>
 
                                  <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                      <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd<?php echo $i ?>" <?php echo $ischecked ?>   onclick="changeStatus(<?php echo $row->id ?>)">
                                  </div>
                              </td>
                              <td>
                                 <a  href="<?php echo base_url('add-slider') ?>/<?php echo $row->id; ?>" style="border-radius: 0px;" class="btn btn-secondary" ><i class="fas fa-edit"></i></a>
                                 <a  id="<?php echo $row->id; ?>" name="delete"  href="javascript:void(0)" class="btn btn-xs btn-danger delete" style="border-radius: 0px;"> 
                                 <i class="fas fa-trash-alt"></i></a>
                              </td>
                           </tr>
                           <?php
                              }
                              ?> 
                        </tbody>
                     </table>
                  </div>
               </div>
               <!-- end col -->
            </div>
         </div>
         <!-- end row -->    
      </div>
<!-- content -->
<script type="text/javascript">
    function changeStatus(id){
    //alert(id);
     //console.log(id);
      $.ajax({
          url:"<?=base_url() ?>dashboard/home/changeStatus",
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
   $(document).on('click', '.delete', function(){  
            var id = $(this).attr("id");  
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
                      url:"<?php echo base_url(); ?>dashboard/Home/delete",  
                      method:"POST",  
                      data:{id:id},
                      error: function() {
                         alert('Something is wrong');
                      },
                      success: function(data) {
                            //  window.location.reload();
                               Swal.fire("Deleted!", "Your imaginary file has been deleted.", "success");
                              
                               location.reload(true);
                      }
                   });
                 } else {
                   Swal.fire("Cancelled", "Your imaginary file is safe :)", "error");
                 }
               });
        });
</script>