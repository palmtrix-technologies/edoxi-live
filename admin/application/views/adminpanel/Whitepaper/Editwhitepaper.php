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
               <h3>Edit Whitepaper</h3>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Edit Whitepaper</li>
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
                     <label>Whitepaper Name</label>
                     <input id="txt_white_name" class="form-control" value="<?=$whitepaper->Whitepaper_name;?>" />
                     <input type="hidden" id="hdnid" value="<?=$whitepaper->ci_witepaperID;?>"/>
                  </div>
                  <div class="col-md-6 form-group">
                     <label>Slug</label>
                     <input id="txt_slug" class="form-control" value="<?=$whitepaper->slug;?>" />
                  </div>
                  <div class="col-md-6">
                     <div class="col-md-12 no-padding form-group">
                        <label>Seo Tittle</label>
                        <input id="txt_seotittle" class="form-control" value="<?=$whitepaper->seo_tittle;?>" />
                     </div>
                     <div class="col-md-12 no-padding form-group">
                        <label>Meta Keywords</label>
                        <input id="txt_metakeyword" class="form-control" value="<?=$whitepaper->meta_keyword;?>" />
                     </div>
                  </div>
                  <div class="col-md-6 form-group">
                     <label>Meta Description <span id="charNum"></span></label>
                     <textarea id="txtMetadesctiption"  class="form-control customcontrol" ><?=$whitepaper->meta_description;?></textarea>
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
                        <label>Banner image</label>
                        <input type="file" id="Bannerimage" name="Bannerimage" class="form-control">
                       <input name="hdnbanner" type="hidden" value="<?=$whitepaper->Banner_image;?>"/>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Image Alt Text</label>
                        <input type="text" id="img_alttext" value=<?=$whitepaper->Banner_image_alt;?> name="img_alttext" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Image Meta Tag</label>
                        <input type="text" id="img_metatag" value="<?=$whitepaper->Banner_image_meta;?>" class="form-control">
                     </div>
                  </div>
                  
                 
               
               </div>

               <div class="row">
               <div class="col-md-4">
                     <div class="form-group">
                        <label>Whitepaper File</label>
                        <input type="file" id="whitepaperfile" name="whitepaperfile" class="form-control">
                        <input name="hdnwhitepaperfile" type="hidden" value="<?=$whitepaper->Whitepaper_file;?>"/>
                     </div>
                  </div>
               <div class="col-md-8 form-group">
               <label> Email content</label>
                        <textarea class="tynimces" name="txt_email" id="txt_email"><?=$whitepaper->Email_content;?></textarea>
               </div>
               </div>
               </form>
               <div class="row">
               <div class="col-md-12">  <div class="page-header"></div></div>
               </div>

               <!-- /.row -->

               <div class="row">

                  <div class="col-md-6 form-group">
                  <label>Tittle</label>
                  <input id="txt_Tittle" class="form-control" value="<?=$whitepaper->Tittle;?>" />
                  </div>
                  <div class="col-md-6 form-group">
                  <label>Sub tittle</label>
                  <input id="txt_subtittle" class="form-control" value="<?=$whitepaper->Sub_tittle;?>" />
                  </div>

                  <div class="col-md-12 form-group">
                     
                     <label>content</label>
                  <textarea class="tynimce" id="txt_content"><?=$whitepaper->Content;?></textarea>
                    </div>

                    <div class="col-md-12 form-group">
                        <label> advantage</label>
                        <textarea class="tynimces" name="advantage" id="txt_advantage"><?=$whitepaper->Advantage;?></textarea>
                   </div>

                    
                  </div>
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
<script src="<?= base_url() ?>assets/userscripts/Whitepaper/editwhitepaper.js"></script>