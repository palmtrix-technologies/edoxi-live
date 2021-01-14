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
    <link rel="icon" type="<?php echo base_url()?>/image/png" sizes="16x16" href="<?php echo base_url()?>/images/favicon.png">
    <title>LEAD MANAGEMENT SOFTWARE</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/css/style.css" rel="stylesheet">
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
                    <div class="col-lg-6" style="margin-left: 250px;">
                         <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-info alert-dismissible no-border fade in mb-2 alert-success" role="alert" style="background-color:#448aff !important;opacity:1;color:#fff;height:">
                <h4><?= $this->session->flashdata('message'); ?></h4>
            </div>
        <?php endif; ?>
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white" style="text-align:  center;">Add Lead</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo site_url('admin/home/lead_add'); ?>" method="post">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Person Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                              <div class="col-md-6">
                                               <div class="form-group has-success">
                                                    <label class="control-label">Institute</label>
                                                       <select class="form-control custom-select" name="institute">
                                                        <option>Select your Institute</option>
                                                         <option value="Edoxi Training">Edoxi Training</option>
                                                        <option value="Time Training">Time Training</option>
                                                      <option value="Time Master">Time Master</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date</label>
                                                    <input type="date" name="date" class="form-control" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" id="firstName" name="name" class="form-control" placeholder="Enter first name ">
                                                   
                                                </div>
                                            </div>
                                                    <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Enter email">
                                                </div>
                                            </div>
                                           <!--  <div class="col-md-6">
                                                <div class="form-group has-danger has-success">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" id="lastName" class="form-control form-control-danger" placeholder="Enter last name">
                                                  
                                                </div>
                                            </div> -->
                                         
                                        </div>
                                        <!--/row-->
                                 <!--        <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Gender</label>
                                                    <select class="form-control custom-select">
                                                        <option value="">Male</option>
                                                        <option value="">Female</option>
                                                    </select>
                                                
                                                </div>
                                            </div> 
                                           
                                       <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div> 
                                        
                                           
                                        </div> -->
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                               <div class="form-group has-success">
                                                    <label class="control-label">Mobile</label>
                                                    <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Enter mobile">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                               <div class="form-group has-success">
                                                    <label class="control-label">Whatsapp</label>
                                                    <input type="number" id="whatsapp" name="whatsapp" class="form-control" placeholder="Enter whatsapp">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                           <!--/row-->
                                        <div class="row">
                                                <div class="col-md-6">
                                               <div class="form-group has-success">
                                                    <label class="control-label">Sourse</label>
                                                       <select class="form-control custom-select" name="source">
                                                        <option value="">Select your Source</option>
                                                        <option value="twitter">Twitter</option>
                                                        <option value="facebook">Facebook</option>
                                                        <option value="linkedin">Linkedin</option>
                                                        <option value="website">Website</option>
                                                        <option value="brochure">Brouchure</option>
                                                        <option value="laimoon">Laimoon</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                               <div class="form-group has-success">
                                                    <label class="control-label">Course</label>
                                                       <select class="form-control custom-select select2" name="course">
                                                        <option value="">Select your Course</option>
                                                        <option value="Course 1">Course 1</option>
                                                        <option value="Course 2">Course 2</option>
                                                        <option value="Course 3">Course 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <div class="row">
                                           <div class="col-md-6">
                                               <div class="form-group has-success">
                                                    <label class="control-label">Faculty</label>
                                                       <select class="form-control custom-select" name="faculty">
                                                        <option value="">Select your Faculty</option>
                                                        <?php
                                                        //print_r($all_faculty);
                                                        foreach($all_faculty as $faculty)
                                                        { ?>
                                                        <option value="<?php echo $faculty->faculty_id;?>"><?php echo $faculty->faculty_name;?></option>
                                                        <?php
                                                         }
                                                         ?>
                                                        <!-- <option value="Faculty 2">Faculty 2</option>
                                                        <option value="Faculty 3">Faculty 3</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Place</label>
                                                    <!-- <input type="text" id="place" name="place" class="form-control" placeholder="Enter Place "> -->
                                                    <select class="form-control custom-select" name="place">
                                                        <option value="" >Select your Place</option>
                                                        <option value="Abu Dhabi">Abu Dhabi</option>
                                                        <option value="Dubai">Dubai</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                              <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Lead Managers</label>
                                                    <!-- <input type="text" id="place" name="place" class="form-control" placeholder="Enter Place "> -->
                                                    <select class="form-control custom-select" name="lead_manager">
                                                        <option value="" >Select Lead Managers</option>
                                                        <option value="sarath">sarath</option>
                                                        <option value="anas">anas</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                     <!--    <h3 class="box-title m-t-40">Address</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Street</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div> -->
                                  <!--       <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            
                                        </div> -->
                                        <!--/row-->
                                  <!--       <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Post Code</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-control custom-select">
                                                        <option>--Select your Country--</option>
                                                        <option>India</option>
                                                        <option>Sri Lanka</option>
                                                        <option>USA</option>
                                                    </select>
                                                </div>
                                            </div>
                                          
                                        </div> -->
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
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
      <!-- <script>
$(function() {
setTimeout(function() {
    $(".alert-success").hide('blind', {}, 1000)
}, 1000);
});
</script> -->
     <!---select2 -------->
  <script src="<?php echo base_url() ?>design/select2/select2.full.min.js"></script>
<script>
 $(function () {
   //Initialize Select2 Elements
   $(".select2").select2();
 });
</script>
<link rel="stylesheet" href="<?php echo base_url() ?>design/select2/select2.min.css">
  <!---close select2---->
  <script>
    $('#mobile').keyup(function(){
    $('#whatsapp').val(this.value);
});
  </script>

</body>

</html>