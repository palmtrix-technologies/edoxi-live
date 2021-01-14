<link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Casestudy List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Case Study List</li>
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
                  <th>Company name</th>
                  <th>Slug</th>
                  <th>Meta title</th>
                  <th>Meta Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
           
                  foreach($listdata as $key=>$data)
                  {
                    ?>
                <tr>
                  <td><?=$data->CompanyName;?></td>
                  <td><?=$data->slug;?></td>
                  <td><?=$data->Meta_tittle;?></td>
                  <td><?=$data->Metadescription;?></td>


<td><ul class="nav"><li class="dropdown">
                <a class="btn btn-sm dropdown-toggle" style="width: 50px;" data-toggle="dropdown" href="#">
                  <i class="fa fa-ellipsis-v"></i> 
                </a>
                <ul class="dropdown-menu">
               
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url()."edit-casestudy/".$data->ci_casestudy_id;?>">Edit</a></li>
                 
                  <li role="presentation"><a role="menuitem" tabindex="-1" onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};"  href="<?php echo base_url()."delete-casestudy/". $data->ci_casestudy_id;?>">Delete</a></li>
                  <!-- <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Deactivate</a></li> -->
                </ul>
              </li>  </ul></td>    
                </tr>
                <?php } ?>
               
                </tbody>
                <tfoot>
                <tr>
                <tr>
                  <th>Company name</th>
                  <th>Slug</th>
                  <th>Meta title</th>
                  <th>Meta Description</th>
                  <th>Action</th>
                </tr>
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
