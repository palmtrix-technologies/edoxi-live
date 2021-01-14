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
               <h3>Course Faq</h3>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Course Faq</li>
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
                <h3 class="card-title">Course Faqs</h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div id="accordion">
                 <?php foreach($course_faq as $faq) { ?>

                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a onClick="EditFaq(<?=$faq->faq_id;?>)"><i class="fa fa-pencil"></i></a>
                        <a onClick="DeleteFaq(<?=$faq->faq_id;?>)"><i class="fa fa-trash"></i></a>
                        
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse<?=$faq->faq_id;?>" aria-expanded="false">
                         <?= $faq->faq_title; ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse<?=$faq->faq_id;?>" class="collapse" data-parent="#accordion" style="">
                      <div class="card-body">
                      <?= $faq->faq_description; ?>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                 
                </div>
              </div>
              <!-- /.card-body -->
            </div>
         
         </div>
         <div class="col-md-6">
         <div class="card card-default">
         <div class="card-header">
                <h3 class="card-title">Manage Faq</h3>
               
              </div>
            <!-- /.card-header -->
            <div class="card-body">
               <div class="row">
                  <div class="col-md-12 form-group">
                     <label>Tittle</label>
                     <textarea id="txt_tittle" class="form-control" ></textarea>
                     <input type="hidden" id="hdnfaqId" value="" />
                     <input type="hidden" id="hdnCourseID" value="<?= $courseid;?>" />
                     
                  </div>

                  <div class="col-md-12 form-group">
                     <label>Description </label>
                     <textarea id="section1" class="form-control" ></textarea>
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
<script src="<?= base_url() ?>assets/userscripts/Coursefaq/faqmanagement.js"></script>