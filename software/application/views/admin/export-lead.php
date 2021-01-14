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
                <div class="col-12">

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
                <form action="<?php echo site_url('admin/home/search_lead_by_source'); ?>" method="get" id="quick_lead_search">
                  <div class="row">
                               <div class="col-md-6">
                                               <div class="form-group has-success">
                                                    <label class="control-label">Source</label>
                                                       <select class="form-control custom-select js-example-basic-single1 select2" name="search" id="search" required>
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
                             <div class="col-md-2">
                         
                       <button class="btn btn-primary btn-search"  style=" margin-top: 35px;" type="submit">Search</button>
                        </div> 
                        </div>
                           
                </form>
                </div>
                </div>
                
                
</div>

</div>
</div>
</div>
</div>
                <div class="col-12">
                 <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-info alert-dismissible no-border fade in mb-2 alert-success" role="alert" style="background-color:#448aff !important;opacity:1;color:#fff;height:">
                <h4><?= $this->session->flashdata('message'); ?></h4>
            </div>
        <?php endif; ?>

                
                <div class="row result-review">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">View Leads For Export</h4>
                           <!--      <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                           <?php
                           if(!empty($search_count))
                           {
                            ?>
                           <span style="color:blue;">Lead Count:</span>
                           <?php echo @$search_count;
                           }
                           ?>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 120px !important;display:none;">id</th>
                                                <th style="min-width: 120px !important;">Date</th>
                                                <th style="min-width: 150px !important;">Institute</th>
                                                <th style="min-width: 150px !important;">Name</th>
                                                <th style="min-width: 150px !important;">Email</th>
                                                <th style="min-width: 150px !important;">Mobile</th>
                                                <th style="min-width: 150px !important;">Whatsapp</th>
                                                <th style="min-width: 150px !important;">Course</th>
                                                <th style="min-width: 150px !important;">Source</th>
                                                <th style="min-width: 150px !important;">Lead Manager</th>
                                                 <th style="min-width: 150px !important;">Faculty</th>
                                                <th style="min-width: 150px !important;">Lead Marked as</th>
                                                <th style="min-width: 150px !important;">Comments</th>
                                                <!--<th style="min-width: 120px !important;">Followup Date</th>-->
                                                 <th style="min-width: 120px !important;">Meeting Date</th>
                                  
                                              
                                            </tr>
                                        </thead>
                                        <tbody id='lead'>
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
                                            
                                            <tr style="background:white;">
                                                <td style="color:black !important;display:none;">
                                                               <? echo $post->lead_id;?> 
                                                                </td>
                                                             <td style='color:black;'>
                                                           <?php
                                                  $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                          echo "<span style='color:red;'>".date('d-m-y',strtotime($post->lead_date))."</span>" ;
                                                        }
                                                        else
                                                        {
                                                             echo "<span style='color: #666666;'>".date('d-m-y',strtotime($post->lead_date))."</span>" ;
                                                        }
                                                        ?>
                                                  </td>
                                                <td style='color:black;'>
                                                    <?php
                                                    $data=date('Y-m-d');
                                                        $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                           echo "<span style='color:red;'>$post->lead_institute</span>" ;
                                                        }
                                                        else
                                                        {
                                                             echo "<span>$post->lead_institute</span>" ;
                                                        }
                                                        ?>
                                                        
                                                    </td>
                                                <td style='color:black;'>
                                                  <?php
                                                  $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                           echo "<span style='color:red;'>$post->lead_name</span>" ;
                                                        }
                                                        else
                                                        {
                                                             echo "<span>$post->lead_name</span>" ;
                                                        }
                                                        ?>
                                                      </td>
                                                <td style='color:black;'>
                                                       <?php
                                                  $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                           echo "<span style='color:red;'>$post->lead_email</span>" ;
                                                        }
                                                        else
                                                        {
                                                             echo "<span>$post->lead_email</span>" ;
                                                        }
                                                        ?>
                                                 </td>
                                                <td style='color:black;'>
                                                   <?php
                                                  $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                           echo "<span style='color:red;'>$post->lead_mobile</span>" ;
                                                        }
                                                        else
                                                        {
                                                             echo "<span>$post->lead_mobile</span>" ;
                                                        }
                                                        ?>
                                                 </td>
                                                <td style='color:black;'>
                                                       <?php
                                                  $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                           echo "<span style='color:red;'>$post->lead_whatsapp</span>" ;
                                                        }
                                                        else
                                                        {
                                                             echo "<span>$post->lead_whatsapp</span>" ;
                                                        }
                                                        ?>
                                                </td>
                                                <td style='color:black;'>
                                                          <?php
                                                  $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                           echo "<span style='color:red;'>$post->course_name</span>" ;
                                                        }
                                                        else
                                                        {
                                                             echo "<span>$post->course_name</span>" ;
                                                        }
                                                        ?>
                                                        </td>
                                                         <td style='color:black;'>
                                                          <?php
                                                  $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                           echo "<span style='color:red;'>$post->lead_source</span>" ;
                                                        }
                                                        else
                                                        {
                                                             echo "<span>$post->lead_source</span>" ;
                                                        }
                                                        ?>
                                                        </td>
                                                        <td style='color:black;'>
                                                          <?php
                                                  $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                           echo "<span style='color:red;'>$post->manager_name</span>" ;
                                                        }
                                                        else
                                                        {
                                                             echo "<span>$post->manager_name</span>" ;
                                                        }
                                                        ?>
                                                        </td>
                                                           <td style='color:black;'>
                                                          <?php
                                                  $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                           echo "<span style='color:red;'>$post->faculty_name</span>" ;
                                                        }
                                                        else
                                                        {
                                                             echo "<span>$post->faculty_name</span>" ;
                                                        }
                                                        ?>
                                                        </td>
                                                 <td style='color:black;'>
                                                    <?php
                                                  $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                           echo "<span style='color:red;'>$post->lead_markedas</span>" ;
                                                        }
                                                        else
                                                        {
                                                           echo "<span>$post->lead_markedas</span>" ;
                                                        }
                                                        ?>
                                                 
                                                    
                                                  </td>
                                                   <td class="editable-col" contenteditable='true' data-id="lead_comment" data-val="<?php echo $post->lead_id;?>" style='color:black;'>
                                                       <?php
                                                    //if($post->lead_markedas=='Contacted')
                                                     // {
                                                        $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                                         echo "<span style='color:red;'>$post->lead_contact_comment</span>" ;
                                                        }
                                                        else
                                                        {
                                                             echo "<span>$post->lead_contact_comment</span>" ;
                                                        }
                                                     //echo $post->lead_contact_comment ;
                                                     //}
                                                     ?>
                                                     </td>
                                                               <td class="editable-col" contenteditable='true' data-id="meeting_date" data-val="<?php echo $post->lead_id;?>" style='color:black;'>
                                                       <?php
                                                     if($post->lead_markedas=='Contacted')
                                                     {
                                                        //$data=date('Y-m-d');
                                                        $fromDate = date("Y-m-d",strtotime("+2 days"));
                                                        if($post->lead_meeting_date==$fromDate)
                                                        {
                                       
                                                       $strtotime1 = strtotime($post->lead_meeting_date);
                                                         $output1 = ($strtotime1 >= 0) ? date('d-m-Y', $strtotime1) : ''; 
                                                         echo "<span style='color:red;'>".$output1."</span>" ;
                                                        }
                                                        else
                                                        {
                                                           $strtotime1 = strtotime($post->lead_meeting_date);
                                                         $output1 = ($strtotime1 >= 0) ? date('d-m-Y', $strtotime1) : '';   
                                                             echo "<span>".$output1."</span>" ;
                                                      
                                                        }
                                                      }
                                                     ?>
                                                     </td>
                                  
                                 
                                                            
                                   
                                                 
                                            </tr>
                                           
                                           <?php
                                           }
                                           }
                                           ?> 
                                        </tbody>
                                    </table>
                                   <p><?php echo $links ?></p>
                               
                                </div>
                            <!--        <div class="col-md-6 " id="load_button" style="top:14px;">
                            <input type="button" id="loadmore" name="" class="btn btn-outline-primary pull-right" value="Load More Results">
                          </div>-->
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
    <script src="<?php echo base_url();?>/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
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
      $("#example23_info").css("display", "none");
      $('.dataTables_paginate').hide();
    $("#date_picker1").datepicker({ dateFormat: 'dd-mm-yy'});
    $("#date_picker2").datepicker({ dateFormat: 'dd-mm-yy'});
    $("#date_picker3").datepicker({ dateFormat: 'dd-mm-yy'});
    $("#date_picker4").datepicker({ dateFormat: 'dd-mm-yy'});
    $("#date_picker5").datepicker({ dateFormat: 'dd-mm-yy'});
    
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
    
  </script>
  <style>
    tr:hover {
    background: #e8f8f5 !important;
}
</style>
  <script type="text/javascript">
$(document).ready(function (){
  
var table = $('#example23').DataTable({ "destroy": true,"paging": false,"info":false, dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print',
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1,2,3,4,5,6,7,8,9,10,11,12 ]
                }
            },
        ]
      });


 

table
    .order( [0, 'desc' ] )
    .draw(); 

});
</script>
</html>