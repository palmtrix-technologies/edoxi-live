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
                    <div class="col-lg-6" style="margin-left: 250px;">
                        <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-info alert-dismissible no-border fade in mb-2 alert-success" role="alert" style="background-color:#448aff !important;opacity:1;color:#fff;height:">
                <h4><?= $this->session->flashdata('message'); ?></h4>
            </div>
        <?php endif; ?>
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white" style="text-align:  center;">Update Faculty</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo site_url('admin/home/faculty_update'); ?>" method="post">
                                    <div class="form-body">
                                        <!-- <h3 class="card-title m-t-15">Person Info</h3> -->
                                        <hr>
                                        <div class="row p-t-20">
                                              <div class="col-md-6">
                                                <input type="hidden" name="faculty_id" value="<?php echo $single_faculty[0]->faculty_id;?>">
                                               <div class="form-group has-success">
                                                    <label class="control-label">Institute</label>
                                                       <select class="form-control custom-select" name="faculty_institute">
                                                        <option>Select your Institute</option>
                                                        <option value="<?php echo $single_faculty[0]->faculty_institute;?>" selected><?php echo $single_faculty[0]->faculty_institute;?></option>
                                                         <option value="Edoxi Training">Edoxi Training</option>
                                                        <option value="Time Training">Time Training</option>
                                                      <option value="Time Master">Time Master</option>
                                                       <option value="Times Education">Times Education</option>
                                                    </select>
                                                </div>
                                            </div>
                                              <div class="col-md-6">
                                                
                                                <div class="form-group has-success">
                                                    <label class="control-label"> Faculty Name</label>
                                                    <input type="text" id="firstName" name="faculty_name" class="form-control" value="<?php echo $single_faculty[0]->faculty_name;?>" placeholder="Enter faculty name ">
                                                   
                                                </div>
                                            </div>
                                            </div>
                                 
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Edit</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Row -->
                <!-- Row -->
               
                <!-- Row -->
                <!-- Row -->
    
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
    <!-- All Jquery -->
    <script src="<?php echo base_url()?>/js/lib/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url()?>/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url()?>/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url()?>/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url()?>/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url()?>/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url()?>/js/custom.min.js"></script>
     <script>
$(function() {
setTimeout(function() {
    $(".alert-success").hide('blind', {}, 1000)
}, 1000);
});
</script>
</body>

</html>