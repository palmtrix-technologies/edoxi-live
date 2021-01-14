<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
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
                
                <div class="col-12">
                 <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-info alert-dismissible no-border fade in mb-2 alert-success" role="alert" style="background-color:#448aff !important;opacity:1;color:#fff;height:">
                <h4><?= $this->session->flashdata('message'); ?></h4>
            </div>
        <?php endif; ?>
        <?php
                                                        if(empty($_SESSION['register_institute']))
                                                        {
                                                        ?>
<!--        <div class="row">-->
<!--          <div class="col-md-4" style="margin-left: 690px !important;">-->
<!--                             <div id="reportrange" style="background: #5E60AA;color:white; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">-->
<!--    <i class="fa fa-calendar"></i>&nbsp;-->
<!--    <span></span> <i class="fa fa-caret-down"></i>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<?php
}
?>
  <div class="pnl-srh">
  <div class="panel-group srch-panel-sub" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
        <a style="color: #666666; font-family: 'Lato', sans-serif;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Search<i class="fa fa-search" style="padding-left: 10px;"></i>
        </a>
      </h4>
      </div>
            <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
                            <div class="card">
                <span class="modify">
                <a href="javascript:void(0);">Search</a>
                </span> 
                 <input type="hidden" name="" id="page_no" value="1">
                 <input type="hidden" name="" id="page_stop" value="">
                <form action="<?php echo site_url('admin/home/search_lead'); ?>" method="post" id="quick_lead_search">
                  <div class="row">
                         <div class="col-md-6 ">
                                <div class="form-group has-success ">
                                                   
                                      <label class="control-label">Search</label>
                                             <input type="text" id="search" class="form-control " placeholder="Search Here" name="search" >   
                                                </div>
                                            </div>
                                          </div>
                                <div class="row">
                                   <div class="col-md-3">

                                               <div class="form-group has-success">
                                                 <div class="col-md-3 has-success">
                                                
                                                 </div>
                                                    <label class="control-label">Institute</label>
                                                       <select class="form-control custom-select institute suru" name="institute">
                                                         <?php
                                                        if(!empty($_SESSION['register_institute']))
                                                        {
                                                        ?>
                                                           <option value='<?php echo $_SESSION['register_institute'];?>' readonly><?php echo $_SESSION['register_institute'];?></option>
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
                                                          <div class="col-md-3">
                                               <div class="form-group has-success">
                                                    <label class="control-label">Course</label>
                                                       <select id="course" class="suru form-control custom-select select2 course" name="lead_course">
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
                                                <div class="col-md-3">
                                               <div class="form-group has-success">
                                                    <label class="control-label">Faculty</label>
                                                       <select id="faculty" class="suru form-control custom-select" name="lead_faculty">
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
                                                <div class="col-md-3">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Lead Managers</label>
                                                    <!-- <input type="text" id="place" name="place" class="form-control" placeholder="Enter Place "> -->
                                                    <select id="lead_manager" class="suru form-control custom-select" name="lead_manager">
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
                                          <div class="row">
              <!--                 <div class="col-md-3 has-success">-->
              <!--  <div class="form-group form-group-icon-left">-->
              <!--      <label>Lead Date</label>-->
              <!--      <input type="text" id="date_picker4" class="form-control " placeholder=" Lead Date" name="lead_date" data-provide="datepicker">-->
              <!--  </div>-->
              <!--</div>-->
              <div class="col-md-3 has-success">
                  <div class="form-group has-success">
                                                    <label class="control-label">Sourse</label>
                                                       <select class="form-control custom-select suru" name="source">
                                                        <option value="">Select your Source</option>
                                                        
                                                        <option value="facebook">Facebook</option>
                                                        <option value="walk-in">Walk-in</option>
                                                        <option value="website">Website</option>
                                                        <option value="brochure">Brouchure</option>
                                                        <option value="laimoon">Laimoon</option>
                                                        <option value="telephone call">Telephone Call</option>
                                                        <option value="whatsapp">WhatsApp</option>
                                                        <option value="reference">Reference</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                </div>
              </div>
                 
         <div class="col-md-3 has-success">
<label class="control-label">Lead Date</label>
<input type="hidden" name="lead_date" id="set_lead_date">
<?php
          if(!empty($_SESSION['register_institute']))
          {
            ?>
          <input type="hidden" name="sessName" value="<?php echo $_SESSION['register_institute']?>"> 
          <?php
          }
         
            ?>

    <div id="reportrange" style="background: #5E60AA;color:white; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>
</div>
</div>

                      <div class="col-md-3 has-success">
                <div class="form-group form-group-icon-left">
                    <label class="control-label">Meeting Date</label>
                    <input type="text" id="date_picker5" class="form-control suru" placeholder="Meeting date" name="lead_meeting_date" data-provide="datepicker">
                </div>
              </div>
              <!--  <div class="col-md-3">-->
              <!--  <div class="form-group has-success">-->
              <!--    <label>Lead Marked As </label>-->
              <!--    <select name="lead_mark" class="suru form-control type">-->
              <!--      <option value="">Select</option>-->
              <!--       <option value="Contacted">Contacted</option>-->
              <!--      <option value="Converted">Converted</option>-->
              <!--      <option value="Closed">Closed</option>-->
              <!--      <option value="Not Contacted">Not Contacted</option>-->
              <!--    </select>                  -->
              <!--  </div>-->
              <!--</div>-->
              <!--   <div class="col-md-3">-->
              <!--<div class="form-group form-group-icon-left">-->
              <!--      <label>Converted Date</label>-->
              <!--      <input type="text" id="date_picker1" class="form-control " placeholder="Converted Date" name="lead_converted_date" data-provide="datepicker">-->
              <!--  </div> -->
              <!--  </div>-->
<!--                                     <div class="col-md-3 has-success">-->
<!--<label>Converted Date</label>-->
<!--                             <div id="reportrange1" class="reportrange" style="background: #5E60AA;color:white; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">-->
<!--    <i class="fa fa-calendar"></i>&nbsp;-->
<?php
//$today=date('Y-m-d');
?>
<!--    <span id="codate"></span><i class="fa fa-caret-down"></i>-->
<!--</div>-->
<!--</div>-->
              <!--                 <div class="col-md-3 has-success">-->
              <!--  <div class="form-group form-group-icon-left">-->
              <!--      <label>Followup Date</label>-->
              <!--      <input type="text" id="date_picker2" class="form-control " placeholder="Followup date" name="lead_followup_date" data-provide="datepicker">-->
              <!--  </div>-->
              <!--</div>-->
<!--        <div class="col-md-3 has-success">-->
<!--<label>Followup Date</label>-->
<!--                             <div id="reportrange2" class="reportrange" style="background: #5E60AA;color:white; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">-->
<!--    <i class="fa fa-calendar"></i>&nbsp;-->
<?php
// $today=date('Y-m-d');
 ?>
<!--    <span id="codate"></span><i class="fa fa-caret-down"></i>-->
<!--</div>-->
<!--</div>-->
  <div class="col-md-3 has-success">
                <div class="form-group form-group-icon-left">
                    <label class="control-label">Followup Date</label>
                    <input type="text" id="date_picker4" class="form-control suru" placeholder="Followup date" name="lead_followup_date" data-provide="datepicker">
                </div>
              </div>
                  <div class="form-group form-group-icon-left">
                    <label class="control-label">Lead marked as:</label>
                    <span class="place3">
							            <span class="plce1"><input type="checkbox" name="lead_mark[]" value="Contacted" class="chk2 suru">Contacted </span>
							            <span class="plce2"><input type="checkbox" name="lead_mark[]" value="Converted" class="chk2 suru">Converted </span>
							             <span class="plce2"><input type="checkbox" name="lead_mark[]" value="Closed" class="chk2 suru">Closed </span>
							              <span class="plce2"><input type="checkbox" name="lead_mark[]" value="Not Contacted" class="chk2 suru">Not Contacted </span>
							          </span>
							          </div>
        <!--        <div class="col-md-3">-->
        <!--        <div class="form-group has-success">-->
        <!--          <label>Period </label>-->
        <!--          <select name="report_basis" class="form-control type">-->
        <!--            <option value="">Select</option>-->
        <!--            <option value="Daily Basis">Daily Basis</option>-->
        <!--            <option value="Weekly Basis">Weekly Basis</option>-->
        <!--            <option value="Monthly Basis">Monthly Basis</option>-->
        <!--            <option value="Yearly Basis">Yearly Basis</option>-->
        <!--          </select>                  -->
        <!--        </div>-->
        <!--      </div>-->
         
        <!--               <div class="col-md-3 option1 box1 has-success">-->
        <!--        <div class="form-group form-group-icon-left">-->
        <!--            <label>Daily</label>-->
        <!--            <input type="text" id="date_picker1" class="form-control daily" placeholder="Daily" name="daily" data-provide="datepicker">-->
        <!--        </div>-->
        <!--      </div>-->
        <!--      <div class="col-md-3 option2 box1 has-success">-->
        <!--        <div class="form-group form-group-icon-left">-->
        <!--            <label>From</label>-->
        <!--            <input type="text" id="date_picker2" class="form-control from" placeholder="From Date" name="from_date" data-provide="datepicker"> -->
        <!--        </div>-->
        <!--      </div>-->
        <!--      <div class="col-md-3 option2 box1 has-success">-->
        <!--        <div class="form-group form-group-icon-left">-->
        <!--            <label>To</label>-->
        <!--            <input type="text" id="date_picker3" class="form-control to" placeholder="To Date" name="to_date" data-provide="datepicker"> -->
        <!--        </div>-->
        <!--      </div>-->
          
        <!--      <div class="col-md-3 option3 box1 has-success">-->
        <!--        <div class="form-group">-->
        <!--            <label>Month </label>-->
        <!--            <select class="form-control" placeholder="From" name="month" id="month" >-->
        <!--              <option value="">Select</option>-->
        <!--              <option value="01">January</option>-->
        <!--              <option value="02">Febraury</option>-->
        <!--              <option value="03">March</option>-->
        <!--              <option value="04">April</option>-->
        <!--              <option value="05">May</option>-->
        <!--              <option value="06">June</option>-->
        <!--              <option value="07">July</option>-->
        <!--              <option value="08">Augest</option>-->
        <!--              <option value="09">September</option>   -->
        <!--              <option value="10">October</option>-->
        <!--              <option value="11">November</option>   -->
        <!--              <option value="12">December</option>  -->
        <!--            </select>                -->
        <!--        </div>-->
        <!--      </div>                                            -->
        <!--      <div class="col-md-3 option4 box1 has-success">-->
        <!--        <div class="form-group form-group-icon-left">-->
        <!--            <label>Year </label>-->
                  
        <!--             <select name="year" class="form-control typeahead" id="year">-->
        <!--        <option value="">Yearly Report</option>-->
        <!--    <?php for($i=2016; $i<2050; $i++) { ?>-->
        <!--        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>-->
        <!--    <?php } ?>-->
        <!--</select>-->
        <!--        </div>-->
        <!--      </div>-->
              <div class="col-md-2">
              <br>
                <!--<button class="btn btn-primary btn-search" name="search" type="submit">Search</button>-->
              </div>  
                </form>
                </div>
                </div>
                
                
</div>

</div>
</div>
</div>
</div>
                
                <div class="row result-review">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">View Leads</h4>
                           <!--      <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                           <?php
                           if(!empty($search_count))
                           {
                            ?>
                           <span style="color:blue;">Lead Count:</span>
                           <?php echo @$search_count;
                           }
                           ?>
                           <div class="large-table-fake-top-scroll-container-3">
  <div>&nbsp;</div>
</div>
                                <div class="table-responsive m-t-40 large-table-container-3">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered ansu" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                 <th style="min-width: 150px !important;display:none;">id</th>
                                                 <th>Date</th>
                                                <?php if(empty($_SESSION['register_institute']))
                                                {
                                                ?>
                                                <th>Institute</th>
                                                <?php
                                                }
                                                ?>
                                                <th style="min-width: 140px !important;">Name & location</th>
                                                <th style="min-width: 170px !important;">Contact info</th>
                                                <th style="min-width: 100px !important;">Course</th>
                                                <th>Lead Marked as</th>
                                                <th style="min-width: 200px !important;">Comments</th>
                                                <th>Followup Date</th>
                                                 <th>Meeting Date</th>
                                                 
                                               
                                                
                                               
                                                <!--<th>Note 1</th>-->
                                                <!--<th>Note 2</th>-->
                                                <!--<th>Note 3</th>-->
                                                <!--<th>Status</th>-->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="lead">
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
                                            
                                            <tr style="background-color:white">
                                                 <td style="color:black !important;display:none;">
                                                               <? echo $post->lead_id;?> 
                                                                </td>
                                                            <td style="color: #666666 !important;">
                                                           <?php
                                                  $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                           echo "<span style='color:red;'>".date('d-m-Y',strtotime($post->lead_date))."</span>" ;
                                                        }
                                                        else
                                                        {
                                                             echo "<span style='color: #666666;'>".date('d-m-Y',strtotime($post->lead_date))."</span>" ;
                                                        }
                                                        ?>
                                                  </td>
                                                 <?php if(empty($_SESSION['register_institute']))
                                                {
                                                ?>
                                                <td>
                                                    <?php
                                                    $data=date('Y-m-d');
                                                        $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                           echo "<span style='color:red;'>$post->lead_institute</span>" ;
                                        
                                                        }
                                                        else
                                                        {
                                                             echo "<span style='color: #666666;'>$post->lead_institute</span>";
                                                            
                                                        }
                                                        ?>
                                                        
                                                    </td>
                                                    <?php
                                                }
                                                ?>
                                                <td style='color: #666666;'>
                                                  <?php
                                                  $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                           echo "<span style='color:red;'>$post->lead_name</span><br>" ;
                                                            echo "<span style='color:red;'>$post->lead_place</span>" ;
                                                        }
                                                        else
                                                        {
                                                             echo "<span style='color: #666666;'>$post->lead_name</span><br>" ;
                                                              echo "<span style='color: #666666;'>$post->lead_place</span>" ;
                                                        }
                                                        ?>
                                                      </td>
                                                <td>
                                                       <?php
                                                  $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                           echo "<span style='color:red;'><i class='fa fa-envelope' aria-hidden='true'></i> $post->lead_email</span><br>" ;
                                          echo "<span style='color:red;'><i class='fa fa-mobile' aria-hidden='true'></i> $post->lead_mobile</span><br>" ;
                                            echo "<span style='color:red;'><i class='fa fa-whatsapp' aria-hidden='true'></i> $post->lead_whatsapp</span>" ;
                                                        }
                                                        else
                                                        {
                                                             echo "<span style='color: #666666;'><i class='fa fa-envelope' aria-hidden='true'></i> $post->lead_email</span><br>" ;
                                         echo "<span style='color: #666666;'><i class='fa fa-mobile' aria-hidden='true'></i> $post->lead_mobile</span><br>" ;
                                          echo "<span style='color: #666666;'><i class='fa fa-whatsapp' aria-hidden='true'></i> $post->lead_whatsapp</span>" ;
                                                        }
                                                        ?>
                                                 </td>
                                               
                                                <td>
                                                          <?php
                                                  $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                           echo "<span style='color:red;'>$post->course_name</span>" ;
                                                        }
                                                        else
                                                        {
                                                             echo "<span style='color: #666666;'>$post->course_name</span>" ;
                                                        }
                                                        ?>
                                                        </td>
                                    
                                                 <td>
                                                    <?php
                                                  $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                           //echo "<span style='color:red;'>$post->lead_markedas</span>" ;
                                                                          if(empty($post->lead_markedas))
                                                          {
                                                        echo "<select name='lead_marked' class='lead_marked sarutty' data-id='$post->lead_id'>
                                                        <option value='Not Contacted'>Not Contacted</option>
                                                        <option value='Contacted'>Contacted</option>
                                                        <option value='Converted'>Converted</option>
                                                        <option value='Closed'>Closed</option>
                                                        
                                                       
                                                    </select>";
                                                        }
                                                           else
                                                        {
                                                        ?>
                                                         <select name='lead_marked' class='lead_marked sarutty' data-id='<?php echo $post->lead_id;?>'>
                                                        <option value='<?php echo $post->lead_markedas;?>'><?php echo $post->lead_markedas;?></option>
                                                        <option value='Not Contacted'>Not Contacted</option>
                                                        <option value='Contacted'>Contacted</option>
                                                        <option value='Converted'>Converted</option>
                                                        <option value='Closed'>Closed</option>
                                                        
                                                       
                                                    </select>
                                                        <?php  
                                                        }
                                                        }
                                                        else
                                                        {
                                                            // echo "<span>$post->lead_markedas</span>" ;
                                                               if(empty($post->lead_markedas))
                                                          {
                                                        echo "<select name='lead_marked' class='lead_marked sarutty' data-id='$post->lead_id'>
                                                        <option value='Not Contacted'>Not Contacted</option>
                                                        <option value='Contacted'>Contacted</option>
                                                        <option value='Converted'>Converted</option>
                                                        <option value='Closed'>Closed</option>
                                                        
                                                       
                                                    </select>";
                                                        }
                                                        else
                                                        {
                                                        ?>
                                                         <select name='lead_marked' class='lead_marked sarutty' data-id='<?php echo $post->lead_id;?>'>
                                                        <option value='<?php echo $post->lead_markedas;?>'><?php echo $post->lead_markedas;?></option>
                                                        <option value='Not Contacted'>Not Contacted</option>
                                                        <option value='Contacted'>Contacted</option>
                                                        <option value='Converted'>Converted</option>
                                                        <option value='Closed'>Closed</option>
                                                        
                                                       
                                                    </select>
                                                        <?php  
                                                        }
                                                        }
                                                        ?>
                                                 
                                                    
                                                  </td>
                                                  <td class="editable-cols closed_reason_sarathcomment" contenteditable='true' data-id="lead_comment" data-val="<?php echo $post->lead_id;?>">
                                                       <?php
                                                    if($post->lead_markedas=='Contacted'||'Converted'||'Closed'||'Not Contacted')
                                                     {
                                                        $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                         //echo "<span style='color:red;'>$post->lead_contact_comment</span>" ;
                                                         ?>
                                                         <textarea name='comment' class='comment_change' data-id='lead_comment' placeholder='Enter comments here' style='width:200px;height:73px;line-height:15px;'><?php echo $post->lead_contact_comment;?></textarea>
                                                         <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                
                                            <textarea name="comment" class="comment_change" data-id="lead_comment" placeholder="Enter comments here" style="width:200px;height:73px;line-height:15px;"><?php echo $post->lead_contact_comment;?></textarea>  
                                            <?php
                                                        }
                                                     //echo $post->lead_contact_comment ;
                                                     }
                                                     ?>
                                                     </td>
                                                                        <td class="followupdate sarufollow" contenteditable='true' data-id="followup_date" data-val="<?php echo $post->lead_id;?>">
                                                       <?php
                                                     if($post->lead_markedas=='Contacted')
                                                     {
                                                        //$data=date('Y-m-d');
                                                        $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                         //echo "<span style='color:red;'>$post->lead_followup_date</span>" ;
                                                          if(!empty($post->lead_followup_date)){
                                                          $strtotime = strtotime($post->lead_followup_date);
                                                         $output = ($strtotime >= 0) ? date('d-m-Y', $strtotime) : '';    
                                                          echo "<input type='text' class='editable-col follow_change' name='followup_date' contenteditable='true' data-id='followup_date' data-val='$post->lead_id' value='$output' style='width:70px !important;'>";
                                                          }
                                                          else
                                                          {
                                                             echo "<input type='text' class='editable-col follow_change' name='followup_date' contenteditable='true' data-id='followup_date' data-val='.$post->lead_id.' value='' style='width:70px !important;'>";
                                                          }
                                                        }
                                                        else
                                                        {
                                                          if(!empty($post->lead_followup_date)){
                                                               $strtotime = strtotime($post->lead_followup_date);
                                                     $output = ($strtotime >= 0) ? date('d-m-Y', $strtotime) : '';              
                                                          echo "<input type='text' class='editable-col follow_change' name='followup_date' contenteditable='true' data-id='followup_date' data-val='$post->lead_id' value='$output' style='width:70px !important;'>";
                                                          }
                                                          else
                                                          {
                                                             echo "<input type='text' class='editable-col follow_change' name='followup_date' contenteditable='true' data-id='followup_date' data-val='.$post->lead_id.' value='' style='width:70px !important;'>";
                                                          }
                                                      
                                                        }
                                                      }
                                                     ?>
                                                     </td>
                                                      <td class=" closed_reason_sarathdate sarumeet" contenteditable='true' data-id="meeting_date" data-val="<?php echo $post->lead_id;?>">
                                                       <?php
                                                     if($post->lead_markedas=='Contacted')
                                                     {
                                                        //$data=date('Y-m-d');
                                                        $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                         //echo "<span style='color:red;'>$post->lead_meeting_date</span>" ;
                                                               if(!empty($post->lead_meeting_date)){
                                                       $strtotime1 = strtotime($post->lead_meeting_date);
                                                         $output1 = ($strtotime1 >= 0) ? date('d-m-Y', $strtotime1) : '';             
                                                          echo "<input type='text' class='editable-col meet_change' name='meeting_date' contenteditable='true' data-id='meeting_date' data-val='$post->lead_id' value='$output1' style='width:70px !important;'>";
                                                          }
                                                          else
                                                          {
                                                             echo "<input type='text' class='editable-col' name='meeting_date' contenteditable='true' data-id='meeting_date' data-val='.$post->lead_id.' value='' style='width:70px !important;'>";
                                                          }
                                                        }
                                                        else
                                                        {
                                                             //echo "<span>$post->lead_meeting_date</span>" ;
                                                             if(!empty($post->lead_meeting_date)){
                                                                  $strtotime1 = strtotime($post->lead_meeting_date);
                                                         $output1 = ($strtotime1 >= 0) ? date('d-m-Y', $strtotime1) : '';
                                                          echo "<input type='text' class='editable-col meet_change' name='meeting_date' contenteditable='true' data-id='meeting_date' data-val='$post->lead_id' value='$output1' style='width:70px !important;'>";
                                                          }
                                                          else
                                                          {
                                                             echo "<input type='text' class='editable-col' name='meeting_date' contenteditable='true' data-id='meeting_date' data-val='.$post->lead_id.' value='' style='width:70px !important;'>";
                                                          }
                                                        }
                                                      }
                                                     ?>
                                                     </td>
                                                                               
                                                   <td style="float:left;"> <a href="<?php echo base_url();?>admin/home/lead_edit/<?php echo $post->lead_id;?>" style="float:left; width: 35px; line-height: 35px; text-align: center;"><img src="<?php echo base_url(); ?>assets/images/pencil.png" style="width:17px;"></a>
                                                                    <a data-toggle="modal" href="#Delete_Log" class="delete_option " data-id="<?php echo $post->lead_id;?>" style="float:left; width: 35px; line-height: 35px; text-align: center;"><img src="<?php echo base_url(); ?>assets/images/delete.png"style="width:17px;"></a></td>
                                            </tr>
                                           
                                           <?php
                                           }
                                           }
                                           ?> 
                                        </tbody>
                                    </table>
                                    <div id="pag_links">
                                    <p ><?php echo $links ?></p>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6 " id="load_button">
                            <input type="button" id="loadmore" name="" class="btn btn-outline-primary pull-right" value="Load More Results">
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
    <script src="<?php echo base_url();?>assets/js/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
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
    <!--<script src="<?php echo base_url();?>/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>-->
    <script src="<?php echo base_url();?>/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="<?php echo base_url();?>/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>/js/lib/datatables/datatables-init.js"></script>
    <script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/daterangepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.js"></script>
</body>
 <script>
 $(document).ready(function (){


$("#example23_info").css("display", "none");
$("#load_button").css("display", "none");

   $('.dataTables_paginate').hide();
      //$('body').on('change','.suru',function(){

 $('#search').on('keyup',function(){

      $(".dataTables_paginate").css("display", "none");
             $("#example23_info").css("display", "none");

      var mydata=$('#quick_lead_search').serialize();
      $('#page_stop').val(0);
       $('#page_no').val(2);
       $.ajax({
         type: "POST",
        url: '<?php echo base_url()?>admin/home/search_lead_quick',
       
        data:mydata,
        beforeSend: function() {
              $("body").css({"opacity":"0.5"});
                      
                },
        success: function(data){
          allLead = JSON.parse(data);
          console.log(allLead.length);
            
          if( allLead=="end")
          {
            //$("#lead").html('no results');
            var table = $('#example23').DataTable();
 
               table
                 .clear()
                  .draw();

             $("#load_button").css("display", "none");
             $("#pag_links").css("display", "none");
             $("body").css({"opacity":""});
          }
          else{
              if(allLead.length<50)
               {
                   
                    $("#loadmore").css("display", "none");
                }
           append_result(allLead,'');
              
           $("#load_button").css("display", "block");
           $("#pag_links").css("display", "none");
           $("body").css({"opacity":""});
          }
        }
      }); 
      });



       $('.suru').on('change',function(){
             $(".dataTables_paginate").css("display", "none");
             $("#example23_info").css("display", "none");

      var mydata=$('#quick_lead_search').serialize();
      $('#page_stop').val(0);
       $('#page_no').val(2);
       $.ajax({
         type: "POST",
        url: '<?php echo base_url()?>admin/home/search_lead_quick',
       
        data:mydata,
         beforeSend: function() {
              $("body").css({"opacity":"0.5"});
                      
                },
        success: function(data){
          allLead = JSON.parse(data);
          console.log(allLead.length);
      
          if( allLead=="end")
          {
            //$("#lead").html('no results');
            var table = $('#example23').DataTable();
 
               table
                 .clear()
                  .draw();

             $("#load_button").css("display", "none");
             $("#pag_links").css("display", "none");
             $("body").css({"opacity":""});
          }
          else{
              
              if(allLead.length<50)
               {
                   
                    $("#loadmore").css("display", "none");
                }
           append_result(allLead,'');
              
           $("#load_button").css("display", "block");
           $("#pag_links").css("display", "none");
           $("body").css({"opacity":""});
          }
        }
      }); 
      });
      });




      </script>
<script type="text/javascript">
 $(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    
    function cb(start, end) {
      //alert('test');
        //$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
         $(".dataTables_paginate").css("display", "none");
         $("#example23_info").css("display", "none");
        $('#reportrange span').html(start.format('YYYY-MM-DD') + ' , ' + end.format('YYYY-MM-DD'));
        var reportrange=$('#reportrange span').text();
        $('#set_lead_date').val(reportrange);
       
        /*var sessName='';
          <?php
          if(!empty($_SESSION['register_institute']))
          {
            ?>
          var sessName = '<?php echo $_SESSION['register_institute']?>';
          <?php
          }
          //'reportrange='+reportrange+'&sessName='+sessName
         
            ?>*/
             $('#page_stop').val(0);
               $('#page_no').val(2);
      $.ajax({
         type: "POST",
         url: '<?php echo base_url()?>admin/home/search_lead_quick',
       
        data:$('#quick_lead_search').serialize(), 
         beforeSend: function() {
              $("body").css({"opacity":"0.5"});
                      
                },
        success: function(data){
           allLead = JSON.parse(data);
           console.log(allLead.length);
            
          if( allLead=="end")
          {
            //$("#lead").html('no results');
            var table = $('#example23').DataTable();
 
               table
                 .clear()
                  .draw();

             $("#load_button").css("display", "none");
             $("#pag_links").css("display", "none");
             $("body").css({"opacity":""});
          }
          else{
              
              if(allLead.length<50)
               {
                   
                    $("#loadmore").css("display", "none");
                }
             append_result(allLead,'');
             $("body").css({"opacity":""}); 
           $("#load_button").css("display", "block");
           $("#pag_links").css("display", "none");
          }
          
        }
      }); 
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

    //cb(start, end);

});

     function append_result(allLead,type='')
     {
       var html = "";
      
      if(allLead!="end")
      {
          
     
    
     allLead.forEach(function(lead){
var formattedDate = new Date(lead.lead_date);
var d = formattedDate.getDate();
var m =  formattedDate.getMonth();
m += 1;  // JavaScript months are 0-11
var y = formattedDate.getFullYear();
year_2d = y.toString().substring(2, 4)
var saru=d + "-" + m + "-" + y;
            html += `<tr style="background-color:white">
                         <td style="color: #666666;">${saru}</td>`;
                         <?php
          if(empty($_SESSION['register_institute']))
          {
            ?>
                        html += `<td style="color: #666666;">${lead.lead_institute}</td>`;
                        <?php
                      }
                      ?>
                          html += `<td style="color: #666666;"><span style="color: #666666">${lead.lead_name}</span><br>
                         ${lead.lead_place}</td>
                        <td style="color: #666666;"><span><i class='fa fa-envelope' aria-hidden='true'></i> ${lead.lead_email}</span><br>
                        <span><i class='fa fa-mobile' aria-hidden='true'></i> ${lead.lead_mobile}</span><br>
                         <i class='fa fa-whatsapp' aria-hidden='true'></i> ${lead.lead_whatsapp}</td>
                         <td style="color: #666666;">${lead.course_name}</td>
                         <td>`;
                                    
                                    if (lead.lead_markedas=='')
                                                          {
                                                        
                                                         html += `<select name='lead_marked' class='lead_marked sarutty' data-id='${lead.lead_id}'>
                                                        <option value='Not Contacted'>Not Contacted</option>
                                                        <option value='Contacted'>Contacted</option>
                                                        <option value='Converted'>Converted</option>
                                                        <option value='Closed'>Closed</option>
                                                        
                                                       
                                                    </select>`;
                                                 
                                                        }
                                                        else
                                                        {
                                                       
                                                        html += `<select name='lead_marked' class='lead_marked sarutty' data-id='${lead.lead_id}'>
                                                        <option value='${lead.lead_markedas}'>${lead.lead_markedas}</option>
                                                        <option value='Not Contacted'>Not Contacted</option>
                                                        <option value='Contacted'>Contacted</option>
                                                        <option value='Converted'>Converted</option>
                                                        <option value='Closed'>Closed</option>
                                                        
                                                       
                                                    </select>`;
                                                  
                                                  }
                                                
                                                 
                          html += `</td>
                          <td class="editable-cols closed_reason_sarathcomment" contenteditable='true' data-id="lead_comment" data-val="${lead.lead_id}">
                          
                          <textarea name="comment" class="comment_change" data-id="lead_comment" placeholder="Enter comments here" style="width:200px;height:73px;line-height: 15px;">${lead.lead_contact_comment}</textarea>  
                          </td>
                          <td class=" followupdate sarufollow" contenteditable='true' data-id="followup_date" data-val="${lead.lead_id}">`;
                           
                              if(lead.lead_markedas=='Contacted')
                              {
                                //if(lead.lead_markedas!=''){ 
                                if((lead.lead_markedas!='')&&(lead.lead_followup_date!='0000-00-00')){
                                     var formattedDate1 = new Date(lead.lead_followup_date);
            var d1 = formattedDate1.getDate();
var m1 =  formattedDate1.getMonth();
m1 += 1;  // JavaScript months are 0-11
var y1 = formattedDate1.getFullYear();
//year_2d1 = y1.toString().substring(2, 4)
var saru1=d1 + "-" + m1 + "-" + y1;
                               
                             html += `<input type='text' class='editable-col follow_change' name='followup_date' contenteditable='true' data-id='followup_date' data-val='${lead.lead_id}' value='${saru1}' style='width:70px !important;'>`;
                               
                                                          }
                                                          else
                                                          {
                                                         html += `<input type='text' class='editable-col' name='followup_date' contenteditable='true' data-id='followup_date' data-val='${lead.lead_id}' value='' style='width:70px !important;' > `;    
                                                          }
                                                        }
                                           
                                                   
                          html += ` </td>
                          <td class=" closed_reason_sarathdate sarumeet" contenteditable='true' data-id="meeting_date" data-val="${lead.lead_id}">`;
                           
                              if(lead.lead_markedas=='Contacted')
                              {
                                //if(lead.lead_markedas!=''){ 
                                if((lead.lead_markedas!='')&&(lead.lead_meeting_date!='0000-00-00')){
                                                                    var formattedDate2 = new Date(lead.lead_meeting_date);
            var d2 = formattedDate2.getDate();
var m2 =  formattedDate2.getMonth();
m2 += 1;  // JavaScript months are 0-11
var y2 = formattedDate2.getFullYear();
//year_2d1 = y1.toString().substring(2, 4)
var saru2=d2 + "-" + m2 + "-" + y2;
//alert(typeof(saru2));
                             html += `<input type='text' class='editable-col meet_change' name='meeting_date' contenteditable='true' data-id='meeting_date' data-val='${lead.lead_id}' value='${saru2}' style='width:70px !important;'>`;
                               
                                                          }
                                                          else
                                                          {
                                                         html += `<input type='text' class='editable-col' name='meeting_date' contenteditable='true' data-id='meeting_date' data-val='${lead.lead_id}' value='' style='width:70px !important;' > `;    
                                                          }
                                                        }
                                           
                                                   
                           html += `</td>
                              <td style="float:left;"><a href="<?php echo base_url();?>admin/home/lead_edit/${lead.lead_id}" style="float:left; width: 35px; line-height: 35px; text-align: center;"><img src="<?php echo base_url(); ?>assets/images/pencil.png" style="width:17px;"></a>
                        <a data-toggle="modal" href="#Delete_Log" class="delete_option" data-id="${lead.lead_id}" style="float:left; width: 35px; line-height: 35px; text-align: center;"><img src="<?php echo base_url(); ?>assets/images/delete.png"style="width:17px;"></a>
                        </td>
                    </tr>`;
          // console.log(lead.lead_id);
          // console.log(lead.lead_institute);
          //  console.log(lead.lead_date);
          //  console.log(lead.lead_name);
          })

       if(type=='load')
       {
         $("#lead").append(html);
       }
       else{

          $("#lead").html(html);
        }
      }
         //console.log(allLead);
        // $('#example23').empty();
        //var lead_id=allLead.lead_id;
        //var lead_institute=allLead.lead_institute;
    
  

     }


function load_more_data(page_no)
{

           
         var data=$("#quick_lead_search").serializeArray();
         data.push({name: 'page', value: page_no});
        
         console.log(data); 

           $.ajax({
               type: "POST",
               data:data ,
                      
               url: "<?php echo site_url(); ?>admin/home/search_lead_quick",
               beforeSend: function() {
              $("body").css({"opacity":"0.5"});
                      
                },
               success: function(data)
               {
                 console.log(allLead.length);  
                allLead = JSON.parse(data);
               
                 if(allLead =='end')
                 {

                     $('#page_stop').val(1);
                   
                     $("body").css({"opacity": ""});
                      $("#loadmore").css("display", "none");

                 }
                 else{
                  if(allLead.length<50)
               {
                   
                    $("#loadmore").css("display", "none");
                }
                 $("body").css({"opacity":""});
                  append_result(allLead,'load');
                  $("#load_button").css("display", "block");
                  $("#pag_links").css("display", "none");

                    
                    }
                }
            });

}



  $( "body" ).on( "click", "#loadmore", function() {

        var page= $('#page_no').val();

       if($('#page_stop').val()!= 1)

          { 
             load_more_data(page);

               page++;
             $('#page_no').val(page);
            //console.log(page);
          } 
          if($('#page_stop').val()== 1)
          {
            $("#load_button").css("display", "none");
          }


       });



</script>
   
  <script type="text/javascript">
    $(document).ready(function(){
        $(".type").change(function(){
            $(this).find("option:selected").each(function(){
                if(($(this).attr("value")=="Daily Basis")){
                    $(".box1").not(".option1").hide();
                    $(".option1").show();
                }

                else if(($(this).attr("value")=="Weekly Basis")) {
                    $(".box1").not(".option2").hide();
                    $(".option2").show();
                }

                else if(($(this).attr("value")=="Monthly Basis")) {
                    $(".box1").not(".option3").hide();
                    $(".option3").show();
                }

                else if(($(this).attr("value")=="Yearly Basis")) {
                    $(".box1").not(".option4").hide();
                    $(".option4").show();
                }
                
                else{
                    $(".box1").hide();
                }
            });
        }).change();
    });
</script>

   <script>
    $(function() {
  var tableContainer = $(".large-table-container-3");
  var table = $(".large-table-container-3 table");
  var fakeContainer = $(".large-table-fake-top-scroll-container-3");
  var fakeDiv = $(".large-table-fake-top-scroll-container-3 div");

  var tableWidth = table.width();
  fakeDiv.width(tableWidth);
  
  fakeContainer.scroll(function() {
    tableContainer.scrollLeft(fakeContainer.scrollLeft());
  });
  tableContainer.scroll(function() {
    fakeContainer.scrollLeft(tableContainer.scrollLeft());
  });
})
  </script>
 
<style>
.large-table-container-3 {
  *max-width: 200px;
  overflow-x: scroll;
  overflow-y: auto;
}
.large-table-container-3 table {
  
}
.large-table-fake-top-scroll-container-3 {
  *max-width: 200px;
  overflow-x: auto;
  overflow-y: auto;
}
.large-table-fake-top-scroll-container-3 div {
  background-color: red;
  font-size:1px;
  line-height:1px;
}

/*misc*/
td {
  border: 1px solid gray;
}

th {
  text-align: left;
}
</style> 
 <script>
    /*$('.btn-search').click(function()
  {
     var daily_date=$('.daily').val();
     var from_date=$('.from').val();
     var to_date=$('.to').val();
     var month=$('#month').val();
     var year=$('#year').val();

     $.ajax({
        type: 'POST',
        url: '<?php echo site_url(); ?>admin/home/search_lead',
        //data:'name='+$name+'&comment='+$comment,
         data: {daily_date:daily_date,from_date:from_date,to_date:to_date,month:month,year:year},
        success: function(data){
          var response=JSON.parse(data); 
          console.log(response['fieldHTML']);
           //$('.coment-search').empty();
           //alert("hai");
                 //$('.result-review').empty();
                 //$('.result-review').append(response);
                 $('.result-review').append(response['fieldHTML']);

        }
      })
        })*/
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
}
.modify a {
    /*width: 160px;
    height: 60px;
    float: right;*/
    padding: 18px 20px;
    background: #fff;
    color: #19205b;
    border: solid 2px #fff;
    text-decoration: none;
    font-size: 18px;
    line-height: 25px;
    font-weight: 700;
    text-align: center;
    position: relative;
    transition: all ease-in-out 0.5s;
    -moz-transition: all ease-in-out 0.5s;
    -ms-transition: all ease-in-out 0.5s;
    -o-transition: all ease-in-out 0.5s;
    -webkit-transition: all ease-in-out 0.5s;
}
</style>
<script>
  $(document).ready(function()
  {
    $("#date_picker1").datepicker({ dateFormat: 'dd-mm-yy'});
    $("#date_picker2").datepicker({ dateFormat: 'dd-mm-yy'});
    $("#date_picker3").datepicker({ dateFormat: 'dd-mm-yy'});
    $("#date_picker4").datepicker({ dateFormat: 'dd-mm-yy'});
    $("#date_picker5").datepicker({ dateFormat: 'dd-mm-yy'});
    
  });
</script>
<script>
$(function() {
setTimeout(function() {
    $(".alert-success").hide('blind', {}, 1000)
}, 1000);
});
</script>
<script type="text/javascript">
//$('td.editable-col').on('focusout', function() {
 $('body').on('focusout','td.editable-col',function(){
    data = {};
    var tdvalue = $(this).text();
    var leadid = $(this).data('val');
    var type = $(this).data('id');
  //   alert(tdvalue);
  // alert(leadid);
  // alert(type);exit;
    $.ajax({
     type: "POST",
     url: '<?php echo base_url()?>admin/home/lead_quick',
     //beforeSend: function(){$('.loading-div').addClass('loading_icon');},
     //complete: function(){$('.loading-div').removeClass('loading_icon');},
     data:'tdvalue='+tdvalue+'&leadid='+leadid+'&editfield='+type,    
     success: function(data)
     {   
     
     }
     });

});
</script>
  <script>
 $(document).on('focus', ".editable-col", function() {
 $(this).datepicker({
   dateFormat: "yy-mm-dd",
   onSelect: function(date) {
     //alert($(this).val());
     //console.log();
     data = {};
     var tdvalue = $(this).val();
     var leadid = $(this).data('val');
     var type = $(this).data('id');
     $.ajax({
       type: "POST",
       url: '<?php echo base_url()?>admin/home/lead_quick',
       //beforeSend: function(){$('.loading-div').addClass('loading_icon');},
       //complete: function(){$('.loading-div').removeClass('loading_icon');},
      data:'tdvalue='+tdvalue+'&leadid='+leadid+'&editfield='+type,    
       success: function(data) {

       }
     });

   }
 });
});
 </script>
      <script>
      //$('.lead_marked').on('change',function(){
       $('body').on('change','.lead_marked',function(){
      //alert(1);
      var lead_marked = $(this).val();
      //alert(lead_marked);
      var leadid = $(this).data('id');
      //alert(leadid);
      var _this = $(this);
      $.ajax({
        url: '<?php echo base_url()?>admin/home/change_lead_marked',
        method: "post",
       // data: {lead_marked:lead_marked},
        data:'lead_marked='+lead_marked+'&leadid='+leadid,    
        success: function(data){
            var response=JSON.parse(data); 
            //console.log(response);
            //alert("hai");
               if(response=="Contacted")
            {
            //  var selectHTML1=`    
            //                       <textarea name="comment" class="comment_change" data-id="lead_comment" placeholder="Enter comments here" style="width:213px;height:100px;line-height: 24px;"></textarea>`
            //                         _this.parents('tr').find(".closed_reason_sarathcomment").html(selectHTML1);
                   var selectHTML2 =`<input type='text' class='editable-col meet_change' name='meeting_date' contenteditable='true' data-id='meeting_date' data-val='`+leadid+`' value='' >`
           _this.parents('tr').find(".closed_reason_sarathdate").html(selectHTML2); 
            var selectHTML3 =`<input type='text' class='editable-col follow_change' name='followup_date' contenteditable='true' data-id='followup_date' data-val='`+leadid+`' value='' >`
           _this.parents('tr').find(".followupdate").html(selectHTML3);
            //   $('.saru').hide();
            //   $('.fee_change').val('');
            //   $('.fee_change').hide();
              
            }
           else if(response=="Closed")
            {
                 //$('.meet_change').hide();
                  //$('.follow_change').hide();
                   _this.parents('tr').find(".meet_change ").hide();
                    _this.parents('tr').find(".follow_change ").hide();
            }
             else if(response=="Converted")
            {
                // $('.meet_change').hide();
                  //$('.follow_change').hide();
                   _this.parents('tr').find(".meet_change ").hide();
                   _this.parents('tr').find(".follow_change ").hide();
            }
             else if(response=="Not Contacted")
            {
                //$('.meet_change').hide();
                 _this.parents('tr').find(".meet_change ").hide();
                  //$('.follow_change').hide();
                   _this.parents('tr').find(".follow_change ").hide();
            }
             /*else
            {
                
            }*/
      

          
        }
      }); 
    });


  </script>
    <script>
  //$('.editable-col').on('Select', function() {
  //$('.fee').focusout(function () {
     $('body').on('focusout','.comment_change',function(){
   
    var tdvalue=$(this).val();
    //alert(tdvalue);
    //var DateCreated = new Date(Date.parse(tdvalue)).format("y-m-d");
    //var leadid = $(this).data('val');
    var _this = $(this);
    var leadid=_this.parents('tr').find(".closed_reason_sarathcomment").data('val');
    //alert(leadid);
    var type = $(this).data('id');
    //alert(type);
    //alert(DateCreated);
   
    $.ajax({
     type: "POST",
     url: '<?php echo base_url()?>admin/home/lead_quick',
     //beforeSend: function(){$('.loading-div').addClass('loading_icon');},
     //complete: function(){$('.loading-div').removeClass('loading_icon');},
     data:'tdvalue='+tdvalue+'&leadid='+leadid+'&editfield='+type,    
     success: function(data)
     {   
     
     }
     });

});

  </script>
      
    <script>
//$('.delete_option').click(function()
$('body').on('click','.delete_option',function(){
{
$('#lead_id').val($(this).data('id'));
}
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
            var selectHTML ="<label class='control-label'>Course</label><select placeholder='Select' name='lead_course'  class='form-control custom-select select2 course'><option value=''>Select Your Course</option>";

                $.each(JSONObject.course_ajax, function( index, value ) {
                  half += "<option value="+ value['course_id']+">"+value['course_name'] +"</option>";
                });
                selectHTML +=half+"</select>";
                $("#course").html(selectHTML);

                var selectHTML1 ="<label class='control-label'>Faculty</label><select placeholder='Select' name='lead_faculty' id='faculty' class='form-control custom-select faculty'><option value=''>Select Your Faculty</option>";

                $.each(JSONObject.faculty_ajax, function( index, value ) {
                  half1 += "<option value="+ value['faculty_id']+">"+value['faculty_name'] +"</option>";
                });
                selectHTML1 +=half1+"</select>";
                $("#faculty").html(selectHTML1);

                 var selectHTML2 ="<label class='control-label'>Lead Managers</label><select placeholder='Select' name='lead_manager' id='lead_manager' class='form-control custom-select lead_manager'><option value=''>Select Lead managers</option>";

                $.each(JSONObject.manager_ajax, function( index, value ) {
                  half2 += "<option value="+ value['manager_id']+">"+value['manager_name'] +"</option>";
                });
                selectHTML2+=half2+"</select>";
                $("#lead_manager").html(selectHTML2);
          
        }
      }); 
    });

  </script>
  <script src="//cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js" type="text/javascript"></script>
  <script type="text/javascript">
  
$(document).ready(function (){
  

var table = $('#example23').DataTable({ "destroy": true,"paging": false,"info":false  });

 


table
    .order( [0, 'desc' ] )
    .draw(); 

});
</script>

<style>
.sarutty {
    padding:3px;
    margin: 0;
    -webkit-border-radius:8px;
    -moz-border-radius:8px;
    border-radius:8px;
    /*-webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;*/
    background: #ff6c2b;
    color:#fff;
    border:none;
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
}
tr:hover {
    background: #e8f8f5 !important;
}
.fa-envelope
{
    color:#ff6c2b;
}
.fa-whatsapp
{
    color:#25d366;
}
/* Targetting Webkit browsers only. FF will show the dropdown arrow with so much padding. */
@media screen and (-webkit-min-device-pixel-ratio:0) {
    select {padding-right:18px}
}


</style>
         
</html>
