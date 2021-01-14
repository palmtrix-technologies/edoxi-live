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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h3>Study hub home</h3>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Study hub home</li>
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
         <div class="col-md-8">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Article List</h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tittle</th>
                  <th>Slug</th>
                  <th>Author</th>
                  <th>#</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  foreach($studyhubs as $key=>$studyhub)
                  {
                    ?>
                <tr>
                  <td><?=$studyhub->Tittle;?></td>
                  <td><?=$studyhub->slug;?></td>
                  <td><?=$studyhub->Author_name;?></td>
                  <td><a class="btn btn-primary" href="studyhub-home-recent-add/<?=$studyhub->ci_studyhubid;?>"><i class="fa fa-plus"></i> Main</a>
                  <a class="btn btn-success" href="studyhub-home-recomment-add/<?=$studyhub->ci_studyhubid;?>"><i class="fa fa-plus"></i> recomment</a>
                  <a class="btn btn-warning" href="studyhub-home-popular-add/<?=$studyhub->ci_studyhubid;?>"><i class="fa fa-plus"></i> popular</a>
                  </td>
                  
  
                </tr>
                <?php } ?>
               
                </tbody>
             
              </table>
               
              </div>
              <!-- /.card-body -->
            </div>
         
         </div>
         <div class="col-md-4">
         <div class="card card-default">
         <div class="card-header">
                <h3 class="card-title">Most Popular</h3>
               
              </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tittle</th>
                  <th>Author</th>
                  <th>#</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  foreach($popular as $key=>$studyhub)
                  {
                    ?>
                <tr>
                  <td><?=$studyhub->Tittle;?></td>
                  <td><?=$studyhub->Author_name;?></td>
                  <td>
                  <a class="btn btn-warning btn-sm" href="studyhub-home-popular-delete/<?=$studyhub->ci_studyhubid;?>"> Remove</a>
                  </td>
                  
  
                </tr>
                <?php } ?>
               
                </tbody>
             
              </table>


 
             
            </div>
            <!-- /.card-body -->
           
         </div>



         <div class="card card-default">
         <div class="card-header">
                <h3 class="card-title">Main article</h3>
               
              </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tittle</th>
                  <th>Author</th>
                  <th>#</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  foreach($recent as $key=>$studyhub)
                  {
                    ?>
                <tr>
                  <td><?=$studyhub->Tittle;?></td>
                  <td><?=$studyhub->Author_name;?></td>
                  <td>
                  <a class="btn btn-primary btn-sm" href="studyhub-home-recent-delete/<?=$studyhub->ci_studyhubid;?>"> Remove</a>
                  </td>
                  
  
                </tr>
                <?php } ?>
               
                </tbody>
             
              </table> 
             
            </div>
            <!-- /.card-body -->
           
         </div>

         <div class="card card-default">
         <div class="card-header">
                <h3 class="card-title">Recommented articles</h3>
               
              </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tittle</th>
                  <th>Author</th>
                  <th>#</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  foreach($recommented as $key=>$studyhub)
                  {
                    ?>
                <tr>
                  <td><?=$studyhub->Tittle;?></td>
                  <td><?=$studyhub->Author_name;?></td>
                  <td>
                  <a class="btn btn-success btn-sm" href="studyhub-home-recomment-delete/<?=$studyhub->ci_studyhubid;?>"> Remove</a>
                  </td>
                  
  
                </tr>
                <?php } ?>
               
                </tbody>
             
              </table>
             
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
