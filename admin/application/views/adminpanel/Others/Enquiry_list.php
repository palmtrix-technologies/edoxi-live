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
               <h3>Enquiry_List</h3>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Enquiry_List</li>
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
         
         <div class="col-md-12">
         
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Enquiry_List</h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
             <form action="<?=base_url();?>enquiry-search" method="post" >
               <div class="row">
               <div class="col-md-4 form-group">
               <label>Enquiry Type</label>
               <select id="ddl_type" name="types"  class="form-control">
                    <option value="All">all</option>
                    <option value="Broucher Download">Broucher Download</option>
                    <option value="Whitepaper Download">Whitepaper Download</option>
                    <?php foreach($enq_types as $type){?>
                     <option value="<?=$type->Enq_Type;?>"><?=$type->Enq_Type;?></option>
                    <?php }?>
                   
                    </select>
               </div>

               <div class="col-md-4 form-group">
               <label>Date Range </label>
                     <input id="txtfromto" type="text"  class="form-control" />
                     <input type="hidden" name="txtstart" id="txtstart"  value="" />
                     <input  type="hidden" name="txtto" id="txtto"  Value=""  />
               </div>
               <div class="col-md-2 form-group">
               <input type="submit" name="efsubmit" value="Search" id="submit" class="btn btn-success">
               </div>
               </div>
              </form>
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->

                <div class="row">
                <div class="col-md-12 table-responsive">
                <table id="example" class="exampletab table table-border" >
        <thead>
            <tr>
                <th>Date</th>
                <th>Enquiry type</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Course</th>
                <th>Message</th>
                <th>Company</th>
            </tr>
        </thead>
        <tbody>
	
        <?php foreach($enq_data as $datas){?>
            <tr>

                <td><?php 
               $date = new DateTime($datas->EnqTime, new DateTimeZone('Asia/Calcutta'));
               
               $date->setTimezone(new DateTimeZone('Asia/Dubai'));
               echo $date->format('Y-m-d H:i:s') . "\n";
                ?></td>
                <td><?=$datas->Enquiry;?></td>
                <td><?=$datas->Name;?></td>
                <td><?=$datas->Mobile;?></td>
                <td><?=$datas->Email;?></td>
                <td><?php if($datas->Coursename==''){echo "NIL";}else{echo $datas->Coursename;};?></td>
                <td><?php if($datas->Message==''){echo "NIL";}else{echo $datas->Message;};?></td>
                <td><?php if($datas->Companyname==''){echo "NIL";}else{echo $datas->Companyname;};?></td>
            </tr>
         <?php }?>  
            
        </tbody>
       
    </table>
    </div>
                </div>
                </div>
                
              </div>
              <!-- /.card-body -->
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>


<script>

$(document).ready(function() {
    $('.exampletab').DataTable( {
        dom: 'Bfrtip',
        "pageLength": 100,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );


$( document ).ready(function() {
  

  $('#txtfromto').daterangepicker(
    {
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate: moment()
    },
    function (start, end) {
      $('#txtfromto').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      $('#txtstart').val(start.format('YYYY/MM/D') );
      $('#txtto').val(end.format('YYYY/MM/D'));
      
    });

   });

</script>