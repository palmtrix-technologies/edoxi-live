<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>/images/favicon.png">
    <title>LEAD MANAGEMENT SOFTWARE</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">View Leads</h4>
                           <!--      <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Institute</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Whatsapp</th>
                                                <th>Course</th>
                                                <th>Date</th>
                                                <th>Lead Marked as</th>
                                                <th>Fee</th>
                                                <th>Closed Reason</th>
                                                <th>Comments</th>
                                                <th>Meeting Date</th>
                                                <th>Note 1</th>
                                                <th>Note 2</th>
                                                <th>Note 3</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                            if (isset($all_leads)) {
                                            $i=0;
                                            foreach($all_leads as $post){
                                            $i++;
                                            if($post->lead_status=='0')
                                            {
                                                $status_type="success";
                                                $status_state="checked";
                                            }
                                            elseif($post->lead_status=='1')
                                            {
                                                $status_type="info";
                                                $status_state="";
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $post->lead_institute;?></td>
                                                <td><?php echo $post->lead_name;?></td>
                                                <td><?php echo $post->lead_email;?></td>
                                                <td><?php echo $post->lead_mobile;?></td>
                                                <td><?php echo $post->lead_whatsapp;?></td>
                                                <td><?php echo $post->lead_course;?></td>
                                                <td><?php echo $post->lead_date;?></td>
                                                 <td><?php echo $post->lead_markedas;?></td>
                                                  <td>
                                                     <?php
                                                     if($post->lead_markedas=='Converted')
                                                     {
                                                     echo $post->lead_converted_fee;
                                                     }
                                                     ?>
                                                      </td>
                                                       <td>
                                                       <?php
                                                     if($post->lead_markedas=='Closed')
                                                     {
                                                     echo $post->lead_closed_reason;
                                                     }
                                                     ?>
                                                     </td>
                                                             <td>
                                                       <?php
                                                     if($post->lead_markedas=='Contacted')
                                                     {
                                                     echo $post->lead_contact_comment ;
                                                     }
                                                     ?>
                                                     </td>
                                                              <td>
                                                       <?php
                                                     if($post->lead_markedas=='Contacted')
                                                     {
                                                     echo $post->lead_meeting_date ;
                                                     }
                                                     ?>
                                                     </td>

                                                                 <td>
                                                       <?php
                                                     if($post->lead_markedas=='Contacted')
                                                     {
                                                     echo $post->lead_contact_note1 ;
                                                     }
                                                     ?>
                                                     </td>
                                                                  <td>
                                                       <?php
                                                     if($post->lead_markedas=='Contacted')
                                                     {
                                                     echo $post->lead_contact_note2 ;
                                                     }
                                                     ?>
                                                     </td>
                                                                  <td>
                                                       <?php
                                                     if($post->lead_markedas=='Contacted')
                                                     {
                                                     echo $post->lead_contact_note3 ;
                                                     }
                                                     ?>
                                                     </td>


                                              <!--       <select class="form-control sarath custom-select">
                                                    <option>Contacted</option>
                                                     <option>Converted</option>
                                                     <option>Closed</option>
                                                     <option>Not Connected</option>
                                                </select> -->

                                         
                                              <!--   <td> <input type="date" name="date" class="form-control" placeholder="dd/mm/yyyy"></td> -->
                                                <td></td>
                                                   <td> <a href="<?php echo base_url();?>admin/home/lead_edit/<?php echo $post->lead_id;?>"><img src="<?php echo base_url(); ?>assets/images/pencil.png"></a>
                                                                    <a data-toggle="modal" href="#Delete_Log" class="delete_option " data-id="<?php echo $post->lead_id;?>"><img src="<?php echo base_url(); ?>assets/images/delete.png"></a></td>
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
            <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
        <!-- lead delete confirmation modal -->
      <div class="modal fade" id="Delete_Log" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="z-index: 10000 !important;">
    <div class="modal-content">
      <div class="modal-header">
     
        <h4 class="modal-title" id="myModalLabel">Delete Lead</span> ?</h4>
      </div>
      <div class="modal-body">
        Do you want to delete selected Lead ?<br/>
        This Process cannot be Rolled Back
      </div>
        <form name="frm_delete_sale" id="frm_delete_sale" action="<?php echo base_url(); ?>admin/home/lead_delete/" method="POST">
          <input type="hidden" name="lead_id" id="lead_id" value=""/>
          <div class="modal-footer">
            <button type="submit" name="btn_delete_lead" id="btn_delete_lead" value="Delete" class="btn btn-danger btn-flat">Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->
    <!-- All Jquery -->
    <script src="<?php echo base_url();?>/js/lib/jquery/jquery.min.js"></script>
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
</body>
    <script>
$('.delete_option').click(function()
{
$('#lead_id').val($(this).data('id'));
});
</script>
<style>
.sarath {
    height: 42px;
    width: 162px;
    border-radius: 0;
    font-size: 18px;
    box-shadow: none;
    border-color: #e7e7e7;
    font-family: 'Poppins', sans-serif;
</style>
</html>