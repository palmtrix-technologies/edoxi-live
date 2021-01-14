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
               <h3>Testimonials</h3>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Testimonials</li>
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
                <h3 class="card-title">Testimonials</h3>
               
              </div>
            <!-- /.card-header -->
            <div class="card-body">
           
            <div class="row">
            <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Course name</th>
                  <th>Writer</th>
                  <th>Writer designation</th>
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
                  <td><?=$data->Designation;?></td>
                  <td style="font-size:10px;" id="review"><?=$data->testimonial_review;?></td>
                  <td><?=$data->testimonial_sourse;?></td>
                  <td>
                  <a  class="btn" onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};"  href="<?php echo base_url()."Testimonials/delete/". $data->testimonial_id;?>"><i class="fa fa-trash"></i></a>
                     <a class="btn" onClick='edits(<?=$data->testimonial_id;?>,<?=$data->testimonial_course;?>,"<?=$data->testimonial_name;?>",this,"<?=$data->testimonial_sourse;?>","<?=$data->Designation;?>");' ><i class="fa fa-pencil"></i></a>
                  
                  </td>
                      
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
            <div class="col-md-12 form-group">
            <label>Course</label>
            <select class="form-control select2" id="ddlcourse" style="width: 100%; min-height:150px;">
                

                <?php
                                foreach($courses as $course)
                                {
                                ?>
                                        <option value="<?php echo $course->course_id;?>">
                                            <?php echo $course->course_name;?></option>
                                        <?php
                                }
                                ?>
                    <!-- <option selected="selected">Alabama</option> -->
                   
                  </select>
            </div>

            <div class="col-md-12 form-group">
            <label>Writer</label>
            <input type="text" id="txt_writer" class="form-control"/>
            </div>
            <div class="col-md-12 form-group">
            <label>Writer designation</label>
            <input type="text" id="txt_desig" class="form-control"/>
            </div>
            
            <div class="col-md-12 form-group">
            <label>Review</label>
            <textarea type="text" id="txt_review" class="form-control"> </textarea>
            <input type="hidden" id="hdnId" />
            </div>

            <div class="col-md-12 form-group">
            <label>Source</label>
            <!-- <input type="text" id="txt_source" class="form-control"/> -->
            <select  class="form-control"  id="txt_source">
  <option value="Google">google</option>
  <option value="facebook">facebook</option>
  <option value="glassdoor">glassdoor</option>
  <option value="edarabia">edarabia</option>
  <option value="goodfirms">goodfirms</option>
  <option value="laimoon">laimoon</option>
</select>
            </div>


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


<script src="<?= base_url() ?>assets/plugins/select2/select2.full.min.js"></script>
<script src="<?= base_url() ?>assets/userscripts/Others/testimonialmanagement.js"></script>
