<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('main-header.php');?>
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
         <?php include('header.php');?>
        <!-- End header header -->
        <!-- Left Sidebar  -->
         <?php include('left-sidebar.php');?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                     <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-info alert-dismissible no-border fade in mb-2 alert-success" role="alert" style="background-color:#448aff !important;opacity:1;color:#fff;height:">
                <h4><?= $this->session->flashdata('message'); ?></h4>
            </div>
        <?php endif; ?>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">View Users</h4>
                           <!--      <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Institute</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                                <!--<th>Status</th>-->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($all_users)) {
                                            $i=0;
                                            foreach($all_users as $post){
                                            $i++;
                                            if($post->register_status=='0')
                                            {
                                                $status_type="success";
                                                $status_state="checked";
                                            }
                                            elseif($post->register_status=='1')
                                            {
                                                $status_type="info";
                                                $status_state="";
                                            }
                                            ?>
                                            <tr style="background:white;">
                                                <td style='color:black;'><?php echo $i;?></td>
                                                <td style='color:black;'><?php echo $post->register_institute;?></td>
                                                <td style='color:black;'><?php echo $post->register_username;?></td>
                                                <td style='color:black;'><?php echo $post->register_email;?></td>
                                                <td style='color:black;'><?php echo $post->register_date;?></td>
                                                <!--<td></td>-->
                                                 <td>
                                                     <a href="<?php echo base_url();?>admin/home/reset_user_password/<?php echo $post->register_id;?>" class="delete_option btn_view_delete" data-val="<?php echo $post->register_id;?>"><img src="<?php echo base_url(); ?>assets/images/reset.png" style="width:17px; margin-right:25px; "></a>

                                                <a href="<?php echo base_url();?>admin/home/user_edit/<?php echo $post->register_id;?>" class="delete_option btn_view_delete" data-val="<?php echo $post->register_id;?>"><img src="<?php echo base_url(); ?>assets/images/pencil.png" style="width:17px; margin-right:25px; "></a>
                                                <a data-toggle="modal" href="#Delete_Log" class="delete_option btn_view_delete" data-val="<?php echo $post->register_id;?>"><img src="<?php echo base_url(); ?>assets/images/delete.png"></a></td>
                                            </tr>
                                            <?php
                                            }
                                            }
                                            ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    
             
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
           <footer class="footer">©2018. All rights reserved by Lead Management Software | Powered by<a href="">TNM Online Solutions (P) Ltd. </a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
     <!-- user delete confirmation modal -->
      <div class="modal fade" id="Delete_Log" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="z-index: 10000 !important;">
    <div class="modal-content">
      <div class="modal-header">
     
        <h4 class="modal-title" id="myModalLabel">Delete User</span> ?</h4>
      </div>
      <div class="modal-body">
        Do you want to delete selected User ?<br/>
        This Process cannot be Rolled Back
      </div>
        <form name="frm_delete_sale" id="frm_delete_sale" action="<?php echo base_url(); ?>admin/home/user_delete/" method="POST">
          <input type="hidden" name="register_id" id="register_id" class="register_id" value=""/>
          <div class="modal-footer">
            <button type="submit" name="btn_delete_user" id="btn_delete_user" value="Delete" class="btn btn-danger btn-flat">Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->
    <!-- All Jquery -->
    <script src="<?php echo base_url();?>/js/lib/jquery/jquery.min.js"></script>
     <script src="<?php echo base_url();?>assets/js/jquery-ui.js" type="text/javascript"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url();?>/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url();?>/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>/js/custom.min.js"></script>


    <script src="<?php echo base_url();?>/js/lib/datatables/datatables.min.js"></script>
    <script src="<?php echo base_url();?>/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="<?php echo base_url();?>/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>/js/lib/datatables/datatables-init.js"></script>
        <script>
        $(document).on("click", ".btn_view_delete", function()
{
$('.register_id').val($(this).data('val'));
});
</script>
<script>
$(function() {
setTimeout(function() {
    $(".alert-success").hide('blind', {}, 1000)
}, 1000);
});
</script>
<style>
    tr:hover {
    background: #e8f8f5 !important;
}
</style>
</body>

</html>