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
            <div class="row">
            <div class="col-md-3" style="margin-left: 825px !important;    margin-top: -14px;">
               <div id="reportrange" style="background: #5E60AA !important; color:white; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                  <i class="fa fa-calendar"></i>&nbsp;
                  <span></span> <i class="fa fa-caret-down"></i>
                </div>
           </div>

            </div>
            <div class="container-fluid">
                <!-- Start Page Content -->
                  <h2 style="color:#fc6180">LEAD OVERVIEW</h2>
                <div class="row">

              <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 id="lead_total"><?php echo $count;?></h2>
                                     <a class="has-arrow" href="<?php echo base_url();?>admin/home/lead_view" aria-expanded="false"><p class="m-b-0">Total Leads</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 id="edoxi_total"><?php echo $edoxi_count;?></h2>
                                    <p class="m-b-0">Edoxi Training</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                    <span></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 id="timetraining_total"><?php echo $timetraining_count;?></h2>
                                    <p class="m-b-0">Time Training</p>
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
                                    <h2 id="timemaster_total"><?php echo $timemaster_count;?></h2>
                                    <p class="m-b-0">Time Master</p>
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
                                    <h2 id="timeseducation_total"><?php echo $timeseducation_count;?></h2>
                                    <p class="m-b-0">Times Education</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="" method="post"  id="search_lead">
                <div class="row">
                         <div class="col-md-3">
                                               <div class="form-group has-success">
                                                    <label class="control-label">Institute</label>
                                                       <select class="form-control custom-select institute manager follow_institute" name="institute" required="">
                                                        <option value="">Select your Institute</option>
                                                         <option value="Edoxi Training">Edoxi Training</option>
                                                        <option value="Time Training">Time Training</option>
                                                      <option value="Time Master">Time Master</option>
                                                      <option value="Times Education">Times Education</option>
                                                    </select>
                                                </div>
                                            </div>
                              <div class="col-md-3">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Lead Managers</label>
                                                    <!-- <input type="text" id="place" name="place" class="form-control" placeholder="Enter Place "> -->
                                                    <select class="form-control custom-select manager" name="lead_manager" id="lead_manager">
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
                  </form>
                          <div class="row">

              <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="tot_lead"></h2>
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
                                    <h2 class="conv_lead"></h2>
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
                                    <h2 class="contact_lead"></h2>
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
                                    <h2 class="close_lead"></h2>
                                    <p class="m-b-0">Open Leads</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
  <h2 style="color:#fc6180;margin-top: 40px;">Upcoming Meeting Dates</h2>
  <!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>   -->          
  <table class="table">
    <thead>
      <tr>
        <th>Date</th>
        <th>Institute</th>
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
        foreach ($upcoming_meetingdate as $value)
        {
         ?>
      <tr>
        <td style='color:black;'><?php echo date('d-m-Y',strtotime($value->lead_date));?></td>
        <td style='color:black;'><?php echo $value->lead_institute;?></td>
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
            <!--     <div class="row bg-white m-l-0 m-r-0 box-shadow ">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body browser">
                 
                            </div>
                        </div>
                    </div>
                </div> -->
           <!--      <div class="row">
					<div class="col-lg-3">
                        <div class="card bg-dark">
                            <div class="testimonial-widget-one p-17">
                                <div class="testimonial-widget-one owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="testimonial-content">
                                            <img class="testimonial-author-img" src="images/avatar/2.jpg" alt="" />
                                            <div class="testimonial-author">John</div>
                                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                            <div class="testimonial-text">
                                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimonial-content">
                                            <img class="testimonial-author-img" src="images/avatar/3.jpg" alt="" />
                                            <div class="testimonial-author">Abraham</div>
                                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                            <div class="testimonial-text">
                                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimonial-content">
                                            <img class="testimonial-author-img" src="images/avatar/1.jpg" alt="" />
                                            <div class="testimonial-author">Lincoln</div>
                                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                            <div class="testimonial-text">
                                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimonial-content">
                                            <img class="testimonial-author-img" src="images/avatar/4.jpg" alt="" />
                                            <div class="testimonial-author">TYRION LANNISTER</div>
                                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                           <div class="testimonial-text">
                                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimonial-content">
                                            <img class="testimonial-author-img" src="images/avatar/5.jpg" alt="" />
                                            <div class="testimonial-author">TYRION LANNISTER</div>
                                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                            <div class="testimonial-text">
                                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimonial-content">
                                            <img class="testimonial-author-img" src="images/avatar/6.jpg" alt="" />
                                            <div class="testimonial-author">TYRION LANNISTER</div>
                                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>

                                            <div class="testimonial-text">
                                                <i class="fa fa-quote-left"></i>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation .
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-title">
                                <h4>Recent Orders </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Product</th>
                                                <th>quantity</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="images/avatar/4.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iBook</span></td>
                                                <td><span>456 pcs</span></td>
                                                <td><span class="badge badge-success">Done</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="images/avatar/2.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iPhone</span></td>
                                                <td><span>456 pcs</span></td>
                                                <td><span class="badge badge-success">Done</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="images/avatar/3.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iMac</span></td>
                                                <td><span>456 pcs</span></td>
                                                <td><span class="badge badge-warning">Pending</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="images/avatar/4.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td>John Abraham</td>
                                                <td><span>iBook</span></td>
                                                <td><span>456 pcs</span></td>
                                                <td><span class="badge badge-success">Done</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

<!-- 
                <div class="row">
					<div class="col-lg-8">
						<div class="row">
						<div class="col-lg-6">
							<div class="card">
								<div class="card-title">
									<h4>Message </h4>
								</div>
								<div class="recent-comment">
									<div class="media">
										<div class="media-left">
											<a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
										</div>
										<div class="media-body">
											<h4 class="media-heading">john doe</h4>
											<p>Cras sit amet nibh libero, in gravida nulla. </p>
											<p class="comment-date">October 21, 2018</p>
										</div>
									</div>
									<div class="media">
										<div class="media-left">
											<a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
										</div>
										<div class="media-body">
											<h4 class="media-heading">john doe</h4>
											<p>Cras sit amet nibh libero, in gravida nulla. </p>
											<p class="comment-date">October 21, 2018</p>
										</div>
									</div>

									<div class="media">
										<div class="media-left">
											<a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
										</div>
										<div class="media-body">
											<h4 class="media-heading">john doe</h4>
											<p>Cras sit amet nibh libero, in gravida nulla. </p>
											<p class="comment-date">October 21, 2018</p>
										</div>
									</div>

									<div class="media no-border">
										<div class="media-left">
											<a href="#"><img alt="..." src="images/avatar/1.jpg" class="media-object"></a>
										</div>
										<div class="media-body">
											<h4 class="media-heading">Mr. Michael</h4>
											<p>Cras sit amet nibh libero, in gravida nulla. </p>
											<div class="comment-date">October 21, 2018</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /# card -->
						</div>
						<!-- /# column -->
					<!-- 	<div class="col-lg-6">
							<div class="card">
								<div class="card-body">
									<div class="year-calendar"></div>
								</div>
							</div>
						</div> -->


						</div>
					</div>

				 <!--    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Todo</h4>
                                <div class="card-content">
                                    <div class="todo-list">
                                        <div class="tdl-holder">
                                            <div class="tdl-content">
                                                <ul>
                                                    <li>
                                                        <label>
															<input type="checkbox"><i class="bg-primary"></i><span>Build an angular app</span>
															<a href='#' class="ti-close"></a>
														</label>
                                                    </li>
                                                    <li>
                                                        <label>
															<input type="checkbox" checked><i class="bg-success"></i><span>Creating component page</span>
															<a href='#' class="ti-close"></a>
														</label>
                                                    </li>
                                                    <li>
                                                        <label>
															<input type="checkbox" checked><i class="bg-warning"></i><span>Follow back those who follow you</span>
															<a href='#' class="ti-close"></a>
														</label>
                                                    </li>
                                                    <li>
                                                        <label>
															<input type="checkbox" checked><i class="bg-danger"></i><span>Design One page theme</span>
															<a href='#' class="ti-close"></a>
														</label>
                                                    </li>

                                                    <li>
                                                        <label>
															<input type="checkbox" checked><i class="bg-success"></i><span>Creating component page</span>
															<a href='#' class="ti-close"></a>
														</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <input type="text" class="tdl-new form-control" placeholder="Type here">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div> -->


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

    <script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/daterangepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>/js/custom.min.js"></script>
    <script type="text/javascript">
 $(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        //$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $('#reportrange span').html(start.format('YYYY-MM-DD') + ' , ' + end.format('YYYY-MM-DD'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>
   <script>
     $('body').on('click','.range_inputs .applyBtn ',function(){
          var reportrange=$('#reportrange span').text();
          var lvalue=$(this).html();
           
          //var _this = $(this);
      $.ajax({
         type: "POST",
        url: '<?php echo base_url()?>admin/home/dashboard_date_search',
       
        data:'reportrange='+reportrange+'&lvalue='+lvalue,    
        success: function(data){
          allLead = JSON.parse(data);
           console.log(allLead);
          console.log(allLead.all_leads_count);
          // console.log(allLead.all_leads_edoxi_count);
          // //var a=allLead.length;
          var html = allLead;
           //var html1 = allLead.all_leads_edoxi_count;
           $("#lead_total").html(allLead.all_leads_count);
            $("#edoxi_total").html(allLead.all_leads_edoxi_count);
            $("#timetraining_total").html(allLead.all_leads_timetraining_count);
            $("#timemaster_total").html(allLead.all_leads_timemaster_count);
            $("#timeseducation_total").html(allLead.all_leads_timeseducation_count);
          // allLead.forEach(function(lead){

          // })
  
       
          
        }
      }); 
    });


  </script>
    <script>
      //$('.reportrange').on('click',function(){
         $('body').on('click','li',function(){
          var reportrange=$('#reportrange span').text();
          var lvalue=$(this).html();
           
          //var _this = $(this);
      $.ajax({
         type: "POST",
        url: '<?php echo base_url()?>admin/home/dashboard_date_search',
       
        data:'reportrange='+reportrange+'&lvalue='+lvalue,    
        success: function(data){
          allLead = JSON.parse(data);
           console.log(allLead);
          console.log(allLead.all_leads_count);
          // console.log(allLead.all_leads_edoxi_count);
          // //var a=allLead.length;
          var html = allLead;
           //var html1 = allLead.all_leads_edoxi_count;
           $("#lead_total").html(allLead.all_leads_count);
            $("#edoxi_total").html(allLead.all_leads_edoxi_count);
            $("#timetraining_total").html(allLead.all_leads_timetraining_count);
            $("#timemaster_total").html(allLead.all_leads_timemaster_count);
          // allLead.forEach(function(lead){

          // })
  
       
          
        }
      }); 
    });


  </script>
<script>
      $('body').on('change','.manager',function(){
      //alert("hai");exit;
      //var manager = $(this).val();
      var mydata=$('#search_lead').serialize();
      //alert(manager);
      
      $.ajax({
        url: '<?php echo base_url()?>admin/home/overview_manager',
        method: "post",
       data: mydata,  
        //data:'manager='+manager,    
        success: function(data){
            var response=JSON.parse(data); 
             var a=response.manager_total_lead-response.manager_conv_lead-response.manager_close_lead;
            // console.log(response);
            console.log(a);
             $('.tot_lead').html(response.manager_total_lead);
              $('.conv_lead').html(response.manager_conv_lead);
              $('.contact_lead').html(response.manager_close_lead);
              //$('.close_lead').html(response.manager_close_lead);
              $('.close_lead').html(a);
  

          
        }
      }); 
    });


  </script>
   <script>
    $('.follow_institute').on('change',function(){
      var institute = $(this).val();
      $.ajax({
        url: '<?php echo base_url()?>admin/home/course_ajax',
        method: "post",
        data: {institute:institute},
        success: function(data){
            var half = "";
            var JSONObject=JSON.parse(data); 
            //console.log(JSONObject);

                 var selectHTML ="<label class='control-label'>Lead Managers</label><select placeholder='Select' name='lead_manager' id='lead_manager' class='form-control custom-select lead_manager'><option value=''>Select Lead managers</option>";

                $.each(JSONObject.manager_ajax, function( index, value ) {
                  half += "<option value="+ value['manager_id']+">"+value['manager_name'] +"</option>";
                });
                selectHTML+=half+"</select>";
                $("#lead_manager").html(selectHTML);
          
        }
      }); 
    });

  </script>
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
tr:hover {
    background: #e8f8f5 !important;
}
</style>
</body>

</html>