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
               <h3>Corporate Testimonials</h3>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Corporate Testimonials</li>
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
                <h3 class="card-title">Testimonial List</h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Course name</th>
                  <th>Writer</th>
                  <th>content</th>
                  <th>source</th>
                  <th>Action</th>
                
                </tr>
                </thead>
                <tbody>
                <?php 
                  foreach($testimonial as $key=>$data)
                  {
                    ?>
                <tr>
                  <td><?=$data->course_name ;?></td>
                  <td><?=$data->testimonial_name;?></td>
                  <td style="font-size:10px;" id="review"><?=$data->testimonial_review;?></td>
                  <td><?=$data->testimonial_sourse;?></td>
                  <td><a href="corporate-testimonials/add/<?=$data->testimonial_id;?>">add</a></td>
                      
                </tr>
                <?php } ?>
               
                </tbody>
                
              </table>
              </div>
              <!-- /.card-body -->
            </div>
         
         </div>
         <div class="col-md-6">
         <div class="card card-default">
         <div class="card-header">
                <h3 class="card-title">Corporate Testimonials</h3>
               
              </div>
            <!-- /.card-header -->
            <div class="card-body">
               <div class="row">
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Course name</th>
                  <th>Writer</th>
                  <th>content</th>
                  <th>source</th>
                  <th>Action</th>
                
                </tr>
                </thead>
                <tbody>
                <?php 
                  foreach($hometestimonial as $key=>$data)
                  {
                    ?>
                <tr>
                  <td><?=$data->course_name ;?></td>
                  <td><?=$data->testimonial_name;?></td>
                  <td style="font-size:10px;" id="review"><?=$data->testimonial_review;?></td>
                  <td><?=$data->testimonial_sourse;?></td>
                   <td><a href="corporate-testimonials/delete/<?=$data->testimonial_id;?>">Remove</a></td>
                      
                </tr>
                <?php } ?>
               
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


<script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
$( document ).ready(function() {
$("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
   });
</script>
