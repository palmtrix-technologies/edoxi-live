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
                                <h4 class="m-b-0 text-white" style="text-align:  center;">Add Lead</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo site_url('admin/home/lead_add'); ?>" method="post">
                                    <div class="form-body">
                                        <?php
                                        if(!empty( $_SESSION['register_email']))
                                        {
                                        ?>
                                          <input type="hidden" value="<?php echo $_SESSION['register_email'];?>" name="lead_added_person">
                                          <?php
                                        }
                                        ?>
                                        <h3 class="card-title m-t-15">Person Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                              <div class="col-md-6">
                                               <div class="form-group has-success">
                                                    <label class="control-label">Institute</label>
                                                       <select class="form-control custom-select institute" name="institute" required="">
                                                        <?php
                                                        if(!empty($_SESSION['register_institute']))
                                                        {
                                                        ?>
                                                        <option value='<?php echo $_SESSION['register_institute'];?>'><?php echo $_SESSION['register_institute'];?></option>
                                                        <?php
                                                        }
                                                        else
                                                        {
                                                        ?>
                                                        <option value="">Select your Institute</option>
                                                         <option value="Edoxi Training">Edoxi Training</option>
                                                        <option value="Time Training">Time Training</option>
                                                      <option value="Time Master">Time Master</option>
                                                       <option value="Times Education">Times Education</option>
                                                       <?php
                                                       }
                                                       ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Date</label>
                                                    <input type="text" name="date" id="date_picker1" class="form-control" placeholder="dd/mm/yyyy" value="<?php echo date('d-m-Y');?>">
                                                </div>
                                            </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" id="firstName" name="name" class="form-control" placeholder="Enter first name" required>
                                                   
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
                                                    <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Enter mobile" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                               <div class="form-group has-success">
                                                    <label class="control-label">Whatsapp</label>
                                                    <input type="number" id="whatsapp" name="whatsapp" class="form-control" placeholder="Enter whatsapp" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                           <!--/row-->
                                        <div class="row">
                                                <div class="col-md-6">
                                               <div class="form-group has-success">
                                                    <label class="control-label">Source</label>
                                                       <select class="form-control custom-select js-example-basic-single1 select2" name="source" required>
                                                        <option value="">Select your Source</option>
                                                        
                                                        <option value="facebook">Facebook</option>
                                                        <option value="walk-in">Walk-in</option>
                                                        <option value="website">Website</option>
                                                        <option value="brochure">Brouchure</option>
                                                        <option value="laimoon">Chat</option>
                                                        <option value="telephone call">Telephone Call</option>
                                                        <option value="whatsapp">WhatsApp</option>
                                                        <option value="reference">Reference</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                               <div class="form-group has-success" id="course">
                                                    <label class="control-label">Course</label>
                                                       <select id="course" class="form-control custom-select select2 course js-example-basic-single" name="course" required="">
                                                        <option value="">Select your Course</option>
                                                        <!-- <option value="Course 1">Course 1</option>
                                                        <option value="Course 2">Course 2</option>
                                                        <option value="Course 3">Course 3</option> -->
                                                          <?php
                                                        //print_r($all_faculty);
                                                        foreach($all_course as $course)
                                                        { ?>
                                                        <option value="<?php echo $course->course_id;?>"><?php echo $course->course_name;?></option>
                                                        <?php
                                                         }
                                                         ?>
                                                    </select>
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <div class="row">
                                           <div class="col-md-6">
                                               <div class="form-group has-success">
                                                    <label class="control-label">Faculty</label>
                                                       <select  id="faculty" class="form-control custom-select select2 js-example-basic-single2" name="faculty" required="">
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
                                                    <select id="place" class="form-control custom-select select2 js-example-basic-single3" name="place" required="">
                         
                                                        <option value="" >Select your Place</option>
                                                        <option value="Abu Dhabi">Abu Dhabi</option>
                                                        <option value="Dubai">Dubai</option>
                                                        <option value="Ajman">Ajman</option>
                                                        <option value="Sharjah">Sharjah</option>
                                                        <option value="Fujairah ">Fujairah</option>
                                                        <option value="Ras Al Khaimah">Ras Al Khaimah</option>
                                                        <option value="Umm Al Quwain">Umm Al Quwain</option>
                                                         <option value="Al Ain">Al Ain</option>
                                       
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                              <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Lead Managers</label>
                                                    <!-- <input type="text" id="place" name="place" class="form-control" placeholder="Enter Place "> -->
                                                    <select id="lead_manager" class="form-control custom-select select2 js-example-basic-single4" name="lead_manager">
                                                        <option value="" >Select Lead Managers</option>
                                                        <?php
                                                        foreach($all_manager as $manager)
                                                        { ?>
                                                        <option value="<?php echo $manager->manager_id;?>"><?php echo $manager->manager_name;?></option>
                                                        <?php
                                                         }
                                                         ?>
                                                       
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
                                        <button type="submit" class="btn btn-success bub"> <i class="fa fa-check"></i> Save</button>
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
    <script src="<?php echo base_url();?>assets/js/jquery-ui.js" type="text/javascript"></script>
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
      <script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.js"></script>
    <script>
$(function() {
setTimeout(function() {
    $(".alert-success").hide('blind', {}, 1000)
}, 1000);
});
</script>
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
<script>
  $(document).ready(function()
  {
    $("#date_picker1").datepicker({ dateFormat: 'dd-mm-yy',
         onSelect: function() {
                $("#firstName").focus();
            } 
    });
   
    
  });
</script>
  <script>
    $('.institute').on('change',function(){
      var institute = $(this).val();
      $.ajax({
        url: '<?php echo base_url()?>admin/home/course_ajax',
        method: "post",
        data: {institute:institute},
        success: function(data){
            var half = "";
             var half1= "";
               var half2= "";
            var JSONObject=JSON.parse(data); 
            //console.log(JSONObject);
            var selectHTML ="<label class='control-label'>Course</label><select placeholder='Select' name='course'  class='form-control custom-select select2 course js-example-basic-single'><option value=''>Select Your Course</option>";

                $.each(JSONObject.course_ajax, function( index, value ) {
                  half += "<option value="+ value['course_id']+">"+value['course_name'] +"</option>";
                });
                selectHTML +=half+"</select>";
                $("#course").html(selectHTML);

                var selectHTML1 ="<label class='control-label'>Faculty</label><select placeholder='Select' name='faculty' id='faculty' class='form-control custom-select select2 faculty'><option value=''>Select Your Faculty</option>";

                $.each(JSONObject.faculty_ajax, function( index, value ) {
                  half1 += "<option value="+ value['faculty_id']+">"+value['faculty_name'] +"</option>";
                });
                selectHTML1 +=half1+"</select>";
                $("#faculty").html(selectHTML1);

                 var selectHTML2 ="<label class='control-label'>Lead Managers</label><select placeholder='Select' name='lead_manager' id='lead_manager' class='form-control custom-select lead_manager select2'><option value=''>Select Lead managers</option>";

                $.each(JSONObject.manager_ajax, function( index, value ) {
                  half2 += "<option value="+ value['manager_id']+">"+value['manager_name'] +"</option>";
                });
                selectHTML2+=half2+"</select>";
                $("#lead_manager").html(selectHTML2);
                $(".select2").select2();

          
        }
      }); 
    });

  </script>
   <script>

$(document).on('focus', '.select2.select2-container', function (e) {
    
  if (e.originalEvent && $(this).find(".select2-selection--single").length > 0) {
    $(this).siblings('select').select2('open');
  } 
});
$('body').on('change', '.js-example-basic-single1', function (e) {
   // alert("hai");
$('.js-example-basic-single').select2('open');
 
});
$('body').on('change', '.js-example-basic-single', function (e) {
    //alert("hai");
$('#faculty').select2('open');
});
$('body').on('change', '.js-example-basic-single2', function (e) {
    //alert("hai");
$('.js-example-basic-single3').select2('open');
});
$('body').on('click', '.js-example-basic-single3 option', function (e) {
    //alert("hai");
$('#lead_manager').select2('open');
});
$('body').on('change', '.js-example-basic-single3', function (e) {
    //alert("hai");
$('#lead_manager').select2('open');
});
$('body').on('change', '.js-example-basic-single4', function (e) {
    //alert("hai");
$('.bub').focus();
});
</script>
</body>

</html>