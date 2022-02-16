         <!-- end page title -->
         <!-- end row -->
         <div class="row">
            <div class="col-xl-12">
               <div class="card">
                  <div class="card-body">
                     <div class="head d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title">All Payment List</h4>
                     </div>
                     <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                           <thead>
                              <tr>
                                 <th> S.No </th>
                                 <th> Order ID </th>
                                 <th> User Name </th>
                                 <th> User Phone </th>
                                 <th> Grand Total </th>
                                 <th> Payment By </th>
                                 <th> Payment Status </th>
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
<script type="text/javascript">
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
        url:"<?php echo base_url('dashboard/order/payment/getdatalist');?>",
        type:"POST",
        data:{}
       }
      });
     }
   });

    $(document).on("change", '.payment_status', function(){
        var id = $(this).attr('id');
        var status = $(this).val();
        $.ajax({
              type: "POST", 
              url: '<?php echo base_url('dashboard/order/payment/change_payment_status');?>',
              dataType:'json',
              data:{id:id,status:status}, 
              beforeSend:function()
              {},
              success:function(responce)
              { 
                if(responce.status==0) {
                   toastr.error(responce.message);
                }else if(responce.status==1) {
                    toastr.success(responce.message);
                }
              },
              error:function()
              {
                toastr.error("BOOM....!", "error");
              },
              complete:function()
              {
              }
        });

    });
</script>