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
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white" style="text-align:  center;">Update Course</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo site_url('admin/home/course_update'); ?>" method="post">
                                    <div class="form-body">
                                        <!-- <h3 class="card-title m-t-15">Person Info</h3> -->
                                        <hr>
                                        <div class="row p-t-20">
                                              <div class="col-md-6">
                                                <input type="hidden" name="course_id" value="<?php echo $single_course[0]->course_id;?>">
                                               <div class="form-group has-success">
                                                    <label class="control-label">Institute</label>
                                                       <select class="form-control custom-select" name="course_institute">
                                                        <option>Select your Institute</option>
                                                        <option value="<?php echo $single_course[0]->course_institute;?>" selected><?php echo $single_course[0]->course_institute;?></option>
                                                         <option value="Edoxi Training">Edoxi Training</option>
                                                        <option value="Time Training">Time Training</option>
                                                      <option value="Time Master">Time Master</option>
                                                       <option value="Times Education">Times Education</option>
                                                    </select>
                                                </div>
                                            </div>
                                              <div class="col-md-6">
                                                
                                                <div class="form-group has-success">
                                                    <label class="control-label"> Course Name</label>
                                                    <input type="text" id="Name" name="course_name" class="form-control" value="<?php echo $single_course[0]->course_name;?>" placeholder="Enter course name ">
                                                   
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
            <footer class="footer">©2018. All rights reserved by Lead Management Software | Powered by<a href="">TNM Online Solutions (P) Ltd. </a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="<?php echo base_url()?>/js/lib/jquery/jquery.min.js"></script>
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

</body>

</html>