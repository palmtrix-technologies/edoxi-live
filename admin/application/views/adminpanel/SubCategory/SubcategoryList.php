<link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub Category List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sub Category List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Slug</th>
                  <th>Meta title</th>
                  <th>Meta Description</th>
                  <th>status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  foreach($categorylist as $key=>$categorylists)
                  {
                    ?>
                <tr>
                  <td><?=$categorylists->subcategory_name;?></td>
                  <td><?=$categorylists->subcategory_slug;?></td>
                  <td><?=$categorylists->subcategory_seo_title;?></td>
                  <td><?=$categorylists->subcategory_meta_description;?></td>
                  <?php 
                    if($categorylists->subcategory_status==0)
                      { ?> <td><span class="label label-primary"> <?php echo "Enabled";?></td></span><?php }
                      else
                      { ?> <td><span class="label label-danger"><?php echo "Disabled";?></td></span><?php } ?>


<td><ul class="nav"><li class="dropdown">
                <a class="btn btn-sm dropdown-toggle" style="width: 50px;" data-toggle="dropdown" href="#">
                  <i class="fa fa-ellipsis-v"></i> 
                </a>
                <ul class="dropdown-menu">
               
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url()."editsubcategory/".$categorylists->subcategory_id;?>">Edit</a></li>
                 
                
                  <?php 
                    if($categorylists->subcategory_status==0)
                      { ?>
                         <li role="presentation"><a role="menuitem" tabindex="-1" onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};" href="<?php echo base_url()."subCategory/disable-status/". $categorylists->subcategory_id;?>">
                 
                      delete
                      <?php } 
                      else {
                        ?>
                         <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url()."subCategory/enable-status/".$categorylists->subcategory_id;?>">

                        Enable <?php
                      } ?>
                     
                        </a></li>

                  <!-- <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Deactivate</a></li> -->
                </ul>
              </li>  </ul></td>    
                </tr>
                <?php } ?>
               
                </tbody>
                <tfoot>
                <tr>
                <th>Category Name</th>
                  <th>Slug</th>
                  <th>Meta title</th>
                  <th>Meta Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- DataTables -->
<script src="<?= base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
  $(function () {
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
</body>
</html>
