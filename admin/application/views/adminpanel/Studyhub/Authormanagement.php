<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h3>Author Management</h3>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Author Management</li>
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
                <h3 class="card-title">Authors List</h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Author name</th>
                  <th>Slug</th>
                  <th>Meta tag</th>
                  <th>Meta Description</th>
                  <th>Action</th>
                
                </tr>
                </thead>
                <tbody>
                <?php 
                  foreach($authors as $key=>$data)
                  {
                    ?>
                <tr>
                  <td><?=$data->Author_name;?></td>
                  <td><?=$data->Author_name;?></td>
                  <td ><?=$data->Meta_tittle;?></td>
                  <td><?=$data->meta_description;?></td>
                   <td><a style="  cursor: pointer;" dataval='<?=$data->profile;?>' onClick="edit('<?=$data->Author_name;?>','<?=$data->Author_name;?>','<?=$data->Meta_tittle;?>','<?=$data->meta_description;?>',this,<?=$data->ci_studyhub_authorid;?>);" >Edit</a></td>
                      
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
                <h3 class="card-title">Manage Author</h3>
               
              </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php
                echo form_open_multipart('controller', array('id' => 'submitimage'));

               ?>
               <div class="row">
                  <div class="col-md-12 form-group">
                  <label>Author Name</label>
                     <input class="form-control" type="text" name="txt_authorname" id="txt_authorname" />                     
                  </div>
                  <div class="col-md-12 form-group">
                  <label>Author Slug</label>
                     <input class="form-control" type="text"  name="txt_authorslug" id="txt_authorslug" />                     
                  </div>

                  <div class="col-md-12 form-group">
                  <label>Meta title</label>
                     <input class="form-control" type="text"  name="txt_Metatitle" id="txt_Metatitle" />                     
                  </div>

                  <div class="col-md-12 form-group">
                  <label>Meta Description</label>
                     <input class="form-control" type="text"  name="txt_metadescription" id="txt_metadescription" />                     
                  </div>

                 

                  <div class="col-md-12 form-group ">
                     <label>Profile Image</label>
                     <input type="file" name="up_file" value="" class="form-control"/>
                     <input type="hidden" name="fileid" id="hdn_field" value=""  />
                     
                  </div>

                  <div class="col-md-12 form-group">
                     <label>Author Profile </label>
                     <textarea name="profiles" id="txt_profile" class="form-control" ></textarea>
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
<script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5/tinymce.min.js"></script>
<script src="<?= base_url() ?>assets/userscripts/Studyhub/author.js"></script>