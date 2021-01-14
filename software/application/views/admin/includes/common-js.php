<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>assets/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
        "fnDrawCallback": function( oSettings ) {     $("[name='status-change']").bootstrapSwitch();
    $('input[name="status-change"]').on('switchChange.bootstrapSwitch', function(event, state) {
    var this_=$(this);
    var id=$(this).data('id');
    //alert(id);
    var status=$(this).data('status');
    //alert(status);

    $.ajax({
      type: 'POST',
      url: '<?php echo base_url(); ?>admin/order/change_order_status',
      beforeSend: function(){$('input[name="status-change"]').bootstrapSwitch('toggleDisabled', true, true);},
      //complete: function(){},
      data: {id: id,status: status},
      success: function(html)
      {
          $('input[name="status-change"]').bootstrapSwitch('toggleDisabled', false, false);
          location.reload();
      }
      
      });
      
    });
            
        }
    });
  });
</script>