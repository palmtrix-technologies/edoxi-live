<style>
   .no-padding{
   padding-left:0!important;
   padding-right:0!important;
   }
   .customcontrol{
   min-height: 125px;
   }
   .page-header {
   padding-bottom: 9px;
   margin: 10px 0 10px;
   border-bottom: 1px solid #eee;
   }
   .child{
   padding-bottom:20px;
   }
</style>
<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h3>Course Batches</h3>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Course Batches</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <!-- SELECT2 EXAMPLE -->
       
         <div class="row">
         <div class="col-md-6">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Course Batches</h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
               <table class="table table-bordered">
               <tbody>
               <?php foreach($course_batch as $batch){?>
               <tr>
               <td><?= $batch->StartDate;?></td>
               <td><?= $batch->Batch_pattern;?></td>
               <td><span class="text-danger"><?= $batch->BatchfillingStatus;?></span> &nbsp;<?= $batch->Timeing;?></td>
               <td> <a onClick="Editbatch(<?=$batch->course_batchesID;?>)"><i class="fa fa-pencil"></i></a>
               <a onClick="deletebatch(<?=$batch->course_batchesID;?>)"><i class="fa fa-trash"></i></a>
               </td>
               
               </tr>
               <?php }?>
               </tbody>
               </table>
              </div>
              <!-- /.card-body -->
            </div>
         
         </div>
         <div class="col-md-6">
         <div class="card card-default">
         <div class="card-header">
                <h3 class="card-title">Manage Batches</h3>
               
              </div>
            <!-- /.card-header -->
            <div class="card-body">
               <div class="row">
                  <div class="col-md-12 form-group">
                     <label>Course Duration</label>
                     <input id="txtfromto" type="text"  class="form-control" />
                     <input type="hidden" id="txtstart"  value="" />
                     <input  type="hidden" id="txtto"  Value=""  />
                    
                     <input type="hidden" id="hdnBatchId" value="" />
                     <input type="hidden" id="hdnCourseID" value="<?= $courseid;?>" />
                     
                  </div>

                  <div class="col-md-12 form-group">
                     <label>Batch Pattern </label>
                     <input id="txtBatchpattern" type="text" Placeholder="MON-FRI (18 Days)" class="form-control" />
                  </div>
                  
                  <div class="col-md-12 form-group">
                     <label>Timeing</label>
                     <input id="txttimeing" type="text" Placeholder="07:00 AM to 09:00 AM (IST)"  class="form-control" />
                  </div>

                  <div class="col-md-12 form-group">
                     <label>Filling status </label>
                     <input id="txtFillingStatus" type="text"  class="form-control" />
                  </div>

                 
                  
               </div>


 
             
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
 
            <button type="button" id="btn_update" class="btn btn-primary pull-right hidden">update</button>
               <button type="button" id="btn_submit" class="btn btn-primary pull-right">Submit</button>
            </div>
         </div>

         </div>
         </div>
         <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://code.jquery.com/ui/jquery-ui-git.js"></script>
<script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5/tinymce.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>

<!-- bootstrap time picker -->
<script src="<?= base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?= base_url() ?>assets/userscripts/Coursefaq/upcommingmanagement.js"></script>


