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
               <h3>Manage Gallery</h3>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Gallery Management</li>
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
                <h3 class="card-title">Gallery List</h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>image  </th>
                  <th>Image type</th>
                  <th>Alt text</th>
                  <th>Meta </th>
                  <th>Action</th>
                
                </tr>
                </thead>
                <tbody>
                <?php 
                  foreach($gallery as $key=>$data)
                  {
                    ?>
                <tr>
                <td><img src="<?=base_url().'/assets/img/gallery/'.$data->imageurl?>" width="50px" height="50px"/></td>
                  <td><?=$data->Image_type ;?></td>
                  <td><?=$data->image_alt;?></td>
                  <td><?=$data->image_meta;?></td>
                  <td><a class="btn" onClick='edits(<?=$data->ci_gallery_id;?>,"<?=$data->Image_type;?>","<?=$data->image_alt;?>","<?=$data->image_meta;?>");' ><i class="fa fa-pencil"></i></a></td>
                      
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
                <h3 class="card-title">Manage Gallery</h3>
               
              </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php
                echo form_open_multipart('controller', array('id' => 'submitimage'));

               ?>
               <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Image type</label>
                    <select id="ddl_imagetype"  class="form-control">
                    <option>select</option>
                    <?php foreach($gallerytype as $type){?>
                     <option value="<?=$type->Image_type;?>"><?=$type->Image_type;?></option>
                    <?php }?>
                    <option value="new_item">create new</option>
                    </select>
                  </div>
                  <div class="col-md-6 form-group hidden" id="imagetype">
                    <label>Image type</label>
                    <input type="text" name="txt_imagetype" id="txt_imagetype" class="form-control" />
                  </div>

                  <div class="col-md-12 form-group ">
                     <label>Gallery Image</label>
                     <input type="file" name="up_file" value="" class="form-control"/>
                     <input type="hidden" name="fileid" id="hdn_field" value=""  />
                     
                  </div>
                  <div class="col-md-12 form-group">
                  <label> Image Alt text </label>
                  <input type="text" name="txt_imagealt" id="txt_imagealt" class="form-control" />
                  </div>
                  <div class="col-md-12 form-group">
                  <label> Image Mata description </label>
                  <textarea name="txt_imagedescription" id="txt_imagedescription" class="form-control" ></textarea>
                  </div>



                
                  
               </div>
         </form>

 
             
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


<script>
$( document ).ready(function() {
$( "#ddl_imagetype" ).change(function() {
  if($("#ddl_imagetype").val()!="new_item")
  {
   $("#imagetype").addClass("hidden");
   $("#txt_imagetype").val($("#ddl_imagetype").val());
  }
  else{
   $("#imagetype").removeClass("hidden");
   $("#txt_imagetype").val("");
  }
});


$("#btn_submit").click(function() {
  
  $("#submitimage").submit();
     
 });
 $("#btn_update").click(function() {
  
  $("#submitimage").submit();
     
 });
 
 
   $('#submitimage').on('submit', function(e){  
     var formdata = new FormData(this);;
        e.preventDefault();  
             $.ajax({  
                  url:"galleryupload",   
                  method:"POST",  
                  data:formdata,  
                  contentType: false,  
                  cache: false,  
                  processData:false,  
                  success:function(data)  
                  {  
                    $id=$.trim(data);
                    if($id!="no file")
                    {
                      $("#hdn_field").val();
                      swal("success!", " gallery updation successful", "success");
                    }
                    else{
                     swal("Upload failed!", " Please check your file", "error");
                    }
                        
                  },
                  error: function (error) {
                   alert('error; ' + eval(error));
                   }
             });  
          
 
 }); 
 
 



});

function edits(id,imagetype,alt,meta)
{ $("#hdn_field").val(id);
  $('#ddl_imagetype').val(imagetype);
  $('#txt_imagealt').val(alt);
  $('#txt_imagedescription').val(meta);
  $("#txt_imagetype").val(imagetype);
  $("#btn_submit").addClass("hidden");
  $("#btn_update").removeClass("hidden");
  $( "#ddl_imagetype" ).focus();

}
</script>