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
               <h3>Home Upcoming courses</h3>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Home Upcoming courses</li>
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
               <table class="table table-bordered" id="example2">
               <thead>
                  <tr>
                     <th>Course name</th>
                     <th>Start Date</th>
                     <th>Batch Pattern</th>
                     <th>Timeing</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
               <?php foreach($course_batch as $batch){?>
               <tr>
               <td><?= $batch->course_name ;?></td>
               <td><?= $batch->StartDate;?></td>
               <td><?= $batch->Batch_pattern;?></td>
               <td><span class="text-danger"><?= $batch->BatchfillingStatus;?></span> &nbsp;<?= $batch->Timeing;?></td>
               <td> <a href="home-upcoming/add/<?=$batch->course_batchesID;?>">add</a></td>
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
                <h3 class="card-title">Home upcoming Courses</h3>
               
              </div>
            <!-- /.card-header -->
            <div class="card-body">
               <div class="row">
               <table class="table table-bordered " >
               
               <tbody>
               <?php foreach($home_batch as $batch){?>
               <tr>
               <td><?= $batch->course_name ;?></td>
               <td><?= $batch->StartDate;?></td>
               <td><?= $batch->Batch_pattern;?></td>
               <td><span class="text-danger"><?= $batch->BatchfillingStatus;?></span> &nbsp;<?= $batch->Timeing;?></td>
               <td> <a href="home-upcoming/delete/<?=$batch->course_batchesID;?>">remove</a></td>
               </tr>
               <?php }?>
               </tbody>
               </table> 
               
                  
               </div>


 
             
            </div>
            <!-- /.card-body -->
           
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

<!-- DataTables -->
<script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": true
    });
  });
</script>


