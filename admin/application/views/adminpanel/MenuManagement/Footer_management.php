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
               <h3>Footer menu</h3>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Footer menu</li>
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
         


             
            </div>
         <div class="col-md-12">
         <div class="card">
              <div class="card-header">
                <h3 class="card-title">Footer menu</h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="container">
    </div>
              </div>
                <!-- /.card-body -->
              <div class="card-footer">
 

               <button type="button" id="btn_submit" onClick="add_header_menu();" class="btn btn-primary pull-right">update</button>
            </div>
            


             
            </div>
         
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
<script src="<?= base_url() ?>assets/plugins/treejs-master/dist/tree.js"></script>

<script>
var data;
let obj = <?php echo json_encode($listdata );?>;
let selected = <?php echo json_encode($selected );?>;
let selectedval=[];
$.each( selected, function( key, value ) {
  
  selectedval.push(value.id);
});

console.log( selectedval);

// let data=JSON.parse(obj);
let tree = new Tree('.container', {
        data: [{ id: '-1', text: 'Select All', children: obj }],
        closeDepth: 3,
        loaded: function () {
            this.values = selectedval;
         //    console.log(this.selectedNodes)
         //   console.log(this.values)
            // this.disables = ['0-0-0', '0-0-1', '0-0-2']
        },
        onChange: function () {
           data=this.values;
        }
    })


function add_header_menu()
{


  var postData = {
    datas: data
  }

     var request = $.ajax({
        url: 'add-footer-menu',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
        request.done( function ( data ) {
         swal(" menu updated !", "  Menu  saved successfully", "success").then(function() {
            location.reload();
        });;
          });
          request.fail( function ( jqXHR, textStatus) {
            swal(" menu updated !", "  Menu  saved successfully", "success").then(function() {
            location.reload();
        });;
         
          });

}



</script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  