      <!-- end row -->
   </div>
   <!-- container-fluid -->
</div>
<!-- End Page-content -->
   <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    © <script>document.write(new Date().getFullYear())</script> <?php echo APP_NAME; ?>  <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by SSAK.</span>
                </div>
            </div>
        </div>
   </footer>
   </div>            
   <!-- end main content-->

</div>
<!-- END layout-wrapper -->
   <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger">
              <h5 class="modal-title" id="myModalLabel">Confirm Delete</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
          </div>
          <div class="modal-body">
            <p id="delete-message">are you sure you want to delete this?</p>
            <input type="hidden" id="delete_id">
            <input type="hidden" id="delete_url">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary waves-effect waves-light"onclick="confirm_delete();">OK</button>
          </div>
        </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
      

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!--Morris Chart-->
        <!-- <script src="<?php echo base_url(); ?>assets/admin/assets/libs/morris.js/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/raphael/raphael.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/admin/assets/js/pages/dashboard.init.js"></script> -->
        <!-- Required datatable js -->
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.3.0-beta.1/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/assets/js/app.js"></script>
        
        <script type="text/javascript">
            function confirm_delete()
            {
              let delete_id=$('#delete_id').val();
              let delete_url=$('#delete_url').val();
              $.ajax({
                type: "POST", 
                url: delete_url,
                dataType:'json',
                data: {'delete_id':delete_id}, 
                beforeSend:function()
                {},
                success:function(responce)
                {
                  if(responce.status==0)
                  {
                    toastr.error(responce.message);
                  }else if(responce.status==1)
                  {
                    $('#deleteModal').modal('hide');
                    toastr.success(responce.message);
                    fill_datatable();
                  }  
                },
                error:function()
                {
                  $.notify("BOOM....!", "error");
                },
                complete:function()
                {
                }
              });

            }
            toastr.options = {
                   "closeButton": false,
                   "debug": false,
                   "newestOnTop": false,
                   "progressBar": false,
                   "positionClass": "toast-top-right",
                   "preventDuplicates": false,
                   "onclick": null,
                   "showDuration": "3000",
                   "hideDuration": "1000",
                   "timeOut": "5000",
                   "extendedTimeOut": "1000",
                   "showEasing": "swing",
                   "hideEasing": "linear",
                   "showMethod": "fadeIn",
                   "hideMethod": "fadeOut"
            }
             <?php if($this->session->flashdata('success')){ ?>
                Command: toastr["success"]('<?php echo $this->session->flashdata('success');  $this->session->unset_userdata('success');?>');

             <?php } ?>

             <?php if($this->session->flashdata('update')){ ?>
                Command: toastr["info"]('<?php echo $this->session->flashdata('update');   $this->session->unset_userdata('update'); ?>');

             <?php } ?>

             <?php if($this->session->flashdata('error')){ ?>
                Command: toastr["error"]('<?php echo $this->session->flashdata('error');   $this->session->unset_userdata('success'); ?>');

             <?php } ?>

             <?php if($this->session->flashdata('info')){ ?>
                Command: toastr["info"]('<?php echo $this->session->flashdata('info');   $this->session->unset_userdata('success'); ?>');

             <?php } ?>

             $(function () {
               $('[data-toggle="tooltip"]').tooltip()
             })
          
      </script>
   </body>
</html>