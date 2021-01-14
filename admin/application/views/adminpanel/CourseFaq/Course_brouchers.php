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
               <h3>Course Brouchers</h3>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Course Brouchers</li>
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
         <div class="card card-default">
         <div class="card-header">
                <h3 class="card-title">Manage Broucher</h3>
               
              </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php
                echo form_open_multipart('controller', array('id' => 'submitimage'));

               ?>
               <div class="row">
                  <div class="col-md-12 form-group">
                     <label>Broucher</label>
                     <input type="file" name="up_file" value="<?=$course_brochers->Broucher_file;?>" class="form-control"/>
                     <input type="hidden" name="hdnCourseID" value="<?= $courseid;?>" />
                     <input type="hidden" name="fileid" id="hdn_field" value="<?=$course_brochers->ci_course_broucherID;?>"  />
                     
                     
                  </div>


                  <div class="col-md-12 form-group">
                     <label>Mail Content </label>
                     <textarea id="txt_mail_content" class="form-control" ><?=$course_brochers->Email_content;?></textarea>
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
<script src="<?= base_url() ?>assets/userscripts/Coursefaq/broucher.js"></script>