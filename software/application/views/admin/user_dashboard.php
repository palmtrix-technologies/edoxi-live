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
                  <h2 style="color:#fc6180">LEAD OVERVIEW</h2>
                <div class="row">

            <!--       <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2></h2>
                                    <p class="m-b-0">Total Leads</p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                     <?php
                    if($_SESSION['register_institute']=='Edoxi Training')
                    {
                    ?>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $edoxi_count;?></h2>
                                    <a class="has-arrow" href="<?php echo base_url();?>admin/home/lead_view" aria-expanded="false"><p class="m-b-0">Total Leads</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $converted_lead;?></h2>
                                    <p class="m-b-0">Converted Leads</p>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $closed_lead;?></h2>
                                    <p class="m-b-0">Closed Leads</p>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php $opencount=$edoxi_count-$converted_lead-$closed_lead;?>
                                    <h2><?php echo $opencount;?></h2>
                                    <p class="m-b-0">Open Leads</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                     else if($_SESSION['register_institute']=='Time Training')
                    {
                    ?>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                    <span></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $timetraining_count;?></h2>
                                    <a class="has-arrow" href="<?php echo base_url();?>admin/home/lead_view" aria-expanded="false"><p class="m-b-0">Time Training</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $converted_lead;?></h2>
                                    <p class="m-b-0">Converted Leads</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $closed_lead;?></h2>
                                    <p class="m-b-0">Closed Leads</p>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php $opencounttimetraining=$timetraining_count-$converted_lead-$closed_lead;?>
                                    <h2><?php echo $opencounttimetraining;?></h2>
                                    <p class="m-b-0">Open Leads</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                              else if($_SESSION['register_institute']=='Time Master')
                    {
                    ?>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                    <span></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $timemaster_count;?></h2>
                                    <a class="has-arrow" href="<?php echo base_url();?>admin/home/lead_view" aria-expanded="false"><p class="m-b-0">Time Master</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $converted_lead;?></h2>
                                    <p class="m-b-0">Converted Leads</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $closed_lead;?></h2>
                                    <p class="m-b-0">Closed Leads</p>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                   
                                    <?php $opencounttimemaster=$timemaster_count-$converted_lead-$closed_lead;?>
                                    <h2><?php echo $opencounttimemaster;?></h2>
                                    <p class="m-b-0">Open Leads</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                            else if($_SESSION['register_institute']=='Times Education')
                    {
                    ?>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                    <span></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $timeseducation_count;?></h2>
                                    <p class="m-b-0">Times Education</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $converted_lead;?></h2>
                                    <p class="m-b-0">Converted Leads</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $closed_lead;?></h2>
                                    <p class="m-b-0">Closed Leads</p>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                   
                                    <?php $opencounttimeseducation=$timeseducation_count-$converted_lead-$closed_lead;?>
                                    <h2><?php echo $opencounttimeseducation;?></h2>
                                    <p class="m-b-0">Open Leads</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
        
                </div>
             <div class="container">
  <h2>Upcoming Meeting Dates</h2>
  <!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>   -->          
  <table class="table">
    <thead>
      <tr>
        <th>Date</th>
        <th>Name</th>
        <th>Course</th>
        <th>Mobile</th>
        <!--<th>Whatsapp <i class="fa fa-whatsapp" aria-hidden="true" style="color:#25d366"></i></th>-->
        <th>Meeting Date</th>
       <th>Lead Manager</th>
      </tr>
    </thead>
    <tbody>
        <?php
         foreach ($institute_upcoming_meetingdate as $value)
         {
         ?>
      <tr>
        <td style='color:black;'><?php echo date('d-m-Y',strtotime($value->lead_date));?></td>
        <td style='color:black;'><?php echo $value->lead_name;?></td>
        <td style='color:black;'><?php echo $value->course_name;?></td>
        <td style='color:black;'><?php echo $value->lead_mobile;?></td>
        <!--<td style='color:black;'><?php echo $value->lead_whatsapp;?></td>-->
        <td style='color:black;'><?php echo date('d-m-Y',strtotime($value->lead_meeting_date));?></td>
        <td style='color:black;'><?php echo $value->manager_name;?></td>
      </tr>
      <?php
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


    <!-- Amchart -->
     <script src="<?php echo base_url()?>/js/lib/morris-chart/raphael-min.js"></script>
    <script src="<?php echo base_url()?>/js/lib/morris-chart/morris.js"></script>
    <script src="<?php echo base_url()?>/js/lib/morris-chart/dashboard1-init.js"></script>


	<script src="<?php echo base_url()?>/js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url()?>/js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url()?>/js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url()?>/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url()?>/js/lib/calendar-2/pignose.init.js"></script>

    <script src="<?php echo base_url()?>/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url()?>/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="<?php echo base_url()?>/js/scripts.js"></script>
    <!-- scripit init-->

    <script src="<?php echo base_url()?>/js/custom.min.js"></script>
<style>
.has-arrow p:hover
{
color:blue;
}
</style>
  <style>
  .card:hover{
    background:#16d7e2;
}
  .card:hover h2{
    color:white !important;
  }
  .card:hover .color-danger, .text-danger{
    color:white !important;
  }
  .card:hover .media-body p{
    color:white !important;
  }
    .card:hover .m-b-0 .has-arrow{
    color:white !important;
  }

</style>
</body>

</html>