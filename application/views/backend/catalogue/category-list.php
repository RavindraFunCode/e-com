<div class="row">
  <div class="col-xl-12">
      <div class="card">
            <div class="card-body">
               <div class="head d-flex justify-content-between align-items-center mb-4">
                   <h4 class="card-title">Category List</h4>
                   <a  href="<?php echo base_url('dashboard/catalogue/category/index') ?>" style="border-radius: 0px;" class="btn btn-primary waves-effect waves-light">Add Category</a>
               </div>
               <div class="col-md-6" id="dataTableButtons"> </div>
               <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                      <tr>
                          <th>SN</th>
                          <th>Category</th>
                          <th>Parent Category</th>
                          <th>Image</th>
                          <th>Icon</th>
                          <th>Description</th>
                          <th>Is Menu</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                   <tbody>
                      
                   
                  </tbody>
              </table>
          </div>
      </div>
  </div> <!-- end col -->
</div> <!-- end row -->
                    
<script>
   var custome_base_url = "<?php echo base_url('dashboard/catalogue/category/');?>";
   $(document).ready(function () {
       $('#datatable').DataTable();
   });
   $(function () {
      fill_datatable();
   });
   function fill_datatable()
   {
      $('#datatable').DataTable().destroy();
      var dataTable = $('#datatable').DataTable({
       "processing" : true,
       "serverSide" : true,
       "order" : [],
       "searching" : true,
       "columns": [
             null,
             null,
             null,
             { "width": "10%" },
             null,
             null,
             null,
             null,
             null
         ],
         "columnDefs": [
               { "orderable": false, "targets": [0, 3, 5, 6, 7] }  // Disable order on first columns
         ],
       "ajax" :{
               url:custome_base_url+"getdatalist",
               type:"POST",
               data:{}
            },
        "filter": true,
        "deferRender": true,
      });
   }
   
   $('.filter').on('change',function(){
       fill_datatable();
   });
   function delete_data(delete_id)
   {
      // $('#delete-message').html("");
      $('#delete_id').val(delete_id);
      $('#delete_url').val(custome_base_url+"deleteitem");
      $('#deleteModal').modal('show');
   }
</script>