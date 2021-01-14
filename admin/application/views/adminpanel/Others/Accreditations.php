<style>
.select2-container--default .select2-selection--single .select2-selection__rendered{
   line-height:22px!important;
}
</style>

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/select2.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h3>accreditations</h3>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">accreditations</li>
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
         <div class="card card-default">
         <div class="card-header">
                <h3 class="card-title">accreditations</h3>
               
              </div>
            <!-- /.card-header -->
            <div class="card-body">
           
            <div class="row">
            <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Logo</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Action</th>
                
                </tr>
                </thead>
                <tbody>
                <?php 
                  foreach($accreditations as $key=>$data)
                  {
                    ?>
                <tr>
                  <td style="background-color:black; border-bottom:1px solid #fff;"><a href="../accreditations"><img src="<?=base_url();?>assets/img/accreation/<?=$data->accreditation_logo_big;?>" width="30" height="28" alt="autodesk-logo" class="img"/></a></td>
                  <td><?=$data->accreditation_name;?></td>
                  <td style="font-size:10px;" id="review"><?=$data->accreditation_description;?></td>
                 <td><a class="btn" ><i class="fa fa-trash"></i></a></td>
                      
                </tr>
                <?php } ?>
               
                </tbody>
                
              </table>
            </div>
            </div>
             
            </div>
            <!-- /.card-body -->
           
         </div>

         </div>
  <!-- /.card -->
        
         <div class="col-md-4">

         <div class="card card-default">
         <div class="card-header">
                <h3 class="card-title">Manage</h3>
               
              </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
            <?php
                echo form_open_multipart('controller', array('id' => 'submitimage'));

               ?>
               <div class="col-md-12 form-group">
               <label>Name</label>
               <input type="text" name="name" class="form-control" />
               </div>

               <div class="col-md-12 form-group">
               <label>Description</label>
               <textarea name="desc" class="form-control" ></textarea>
               </div>

               <div class="col-md-12 form-group">
               <label>Image</label>
               <input type="file" id="file" name="file" class="form-control">
               </div>
               </form>
            
            </div>
           
            </div>
            <div class="card-footer">
 
 <button type="button" id="btn_update" class="btn btn-primary pull-right hidden">update</button>
    <button type="button" id="btn_submit" class="btn btn-primary pull-right">Submit</button>
 </div>
            </div>
         </div>
         </div>
       
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- DataTables -->
<script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
$("#btn_submit").click(function() {
  
  
  
          $( "#submitimage" ).submit();
        
  
   
    
  });
 $(document).ready(function(){  
    $('#submitimage').on('submit', function(e){  
      var formdata = new FormData(this);
         e.preventDefault();  
              $.ajax({  
                   url:"accreditations-add",   
                   method:"POST",  
                   data:formdata,  
                   contentType: false,  
                   cache: false,  
                   processData:false,  
                   success:function(data)  
                   {  
                       
                       swal("accreditations added!", "new accreditations added successfuly", "success").then(function() {
            location.reload(); });
                         
                   },
                   error: function (error) {
                     swal("accreditations added!", "new accreditations added successfuly", "success").then(function() {
            location.reload(); });
                    }
              });  
           
    });  
});  
</script>
