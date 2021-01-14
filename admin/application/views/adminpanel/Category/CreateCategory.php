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
               <h3>Add Category</h3>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">create Category</li>
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
         <div class="card card-default">
            <!-- /.card-header -->
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6 form-group">
                     <label>Category Name</label>
                     <input id="txt_cate_name" class="form-control" value="" />
                  </div>
                  <div class="col-md-6 form-group">
                     <label>Slug</label>
                     <input id="txt_slug" class="form-control" value="" />
                  </div>
                  <div class="col-md-6">
                     <div class="col-md-12 no-padding form-group">
                        <label>Seo Tittle</label>
                        <input id="txt_seotittle" class="form-control" value="" />
                     </div>
                     <div class="col-md-12 no-padding form-group">
                        <label>Meta Keywords</label>
                        <input id="txt_metakeyword" class="form-control" value="" />
                     </div>
                  </div>
                  <div class="col-md-6 form-group">
                     <label>Meta Description <span id="charNum"></span></label>
                     <textarea id="txtMetadesctiption"  class="form-control customcontrol" onkeyup="countChar(this)"></textarea>
                  </div>
               </div>


  <!-- <form enctype="multipart/form-data"  id="submitimage"> -->
               <?php
                echo form_open_multipart('controller', array('id' => 'submitimage'));

               ?>
               <div class="row">
              
                  <div class="col-md-12 page-header"></div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Image (1358 x363)</label>
                        <input type="file" id="file" name="file" class="form-control">
                       
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Image Alt Text</label>
                        <input type="text" name="img_alttext" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Image Meta Tag</label>
                        <input type="text" name="img_metatag" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="col-md-12 form-group">
                        <label>Banner Caption</label>
                        <input type="text" name="banner_caption" class="form-control">
                     </div>
                     <div class="col-md-12 form-group">
                        <label>Banner Short Description</label>
                        <input type="text" name="banner_shortdesc" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6">
                  <div class=" form-group">
                        <label> Banner Bullet Description</label>
                        <textarea class="tynimces" name="banner_bullet" id="bannerbullet"></textarea>
                   </div>

                    
                  </div>
               
               </div>
               </form>
               <div class="row">
               <div class="col-md-12">  <div class="page-header"></div></div>
               </div>

               <!-- /.row -->

               <div class="row">
                  <div class="col-md-8">
                     <h5>Content Sections</h5>
                  </div>
                 
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="page-header"></div>
                     <input id="hdnCount" type="hidden" value="1"/>
                     <div class="parent" >
                     <div class="child" sortno="1">
                    <a onClick="deletes(this);"> <span class="badge pull-right bg-warning">X</span></a>
                    <select name="boxtyle" class="form-control boxtyle" id="boxtyle"><option value="Normal">Normal</option><option value="bullet-box-with-bg">bullet-box-with-bg</option><option value="bullet-box-list">bullet-box-list</option><option value="bullet-box-without-bg">bullet-box-without-bg</option><option value="bullet-box-most-popular">bullet-box-most-popular</option></select>
    <textarea class="tynimce" id="section1"></textarea>
    </div>
                     </div>
                  </div>
               </div>
               <div class="row">
               <div class="col-md-12"><input type="button" class="btn btn-sm pull-right " id="btnadd" onclick="addnewrow();" value="Add Section"/></div>
               </div>
             
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
 

               <button type="button" id="btn_submit" class="btn btn-primary pull-right">Submit</button>
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
<script src="<?= base_url() ?>assets/userscripts/Category/addcategory.js"></script>

