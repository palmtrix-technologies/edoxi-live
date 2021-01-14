
    


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
      
    }
);

$(".timepicker").timepicker({
  showInputs: false
});
     
      
});




//ajax start

function Editbatch(id)
{


  var postData = {
    idval: id
  }

     var request = $.ajax({
        url: 'get',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
        request.done( function ( data ) {
          console.log(data);
          
          $('#txtto').val(data.EndDate);
           $('#txtstart').val(data.StartDate);
           $('#txtBatchpattern').val(data.Batch_pattern);
          $('#txttimeing').val(data.Timeing),
          $('#txtFillingStatus').val(data.BatchfillingStatus)
          var start1=data.StartDate;
          var end1=data.EndDate;
          start= moment(start1).format('YYYY/MM/D');
          end= moment(end1).format('YYYY/MM/D');

          $('#txtfromto').val(moment(start).format('MMMM D, YYYY') + ' - ' + moment(end).format('MMMM D, YYYY'));
          $("#hdnBatchId").val(data.course_batchesID);
        
          $("#btn_submit").addClass("hidden");
          $("#btn_update").removeClass("hidden");
          });
          request.fail( function ( jqXHR, textStatus) {
            
         
          });

}
function deletebatch(id)
{


  var postData = {
    idval: id
  }

     var request = $.ajax({
        url: 'delete',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
        request.done( function ( data ) {
          swal(" Course Batch deleted !", " Course Batch Deleted successfully", "success").then(function() {
            location.reload();
        });;
          });
          request.fail( function ( jqXHR, textStatus) {
            
         
          });

}


$("#btn_submit").click(function() {
  
  
   Addbatch();
    
  });
  $("#btn_update").click(function() {
  
    
    updatebatch();
      
    });
  

function Addbatch()
{
    var batchlist=[];
   
      var endd = moment($('#txtto').val());
      var startd = moment($('#txtstart').val());
      var diffrent =endd.diff(startd, 'days')+1;
      diffrentt=0;
      
      for(i=0; i<3; i++)
      {
        startd=moment($('#txtstart').val()).add(diffrentt, 'd');
       
        endd=moment($('#txtto').val()).add(diffrentt, 'd');
        
        var batchs = {
          "EndDate": endd.format('YYYY-MM-DD'),
          "StartDate":startd.format('YYYY-MM-DD'),
          "CourseID":$('#hdnCourseID').val(),
          "Batch_pattern":$('#txtBatchpattern').val(),
          "Timeing":$('#txttimeing').val(),
          "BatchfillingStatus":$('#txtFillingStatus').val()
        };
        batchlist.push(batchs);
        diffrentt=diffrentt+diffrent;
      }

     
      var postData = {
        batch: batchlist
      }

         var request = $.ajax({
            url: 'add',
            type: 'POST',
            data: {postData:postData} ,
            dataType: 'JSON'
            });
            request.done( function ( data ) {
                // $id=$.trim(data);
                // addcategorysections($id);
                swal(" Course Batch Created !", " Course Batch Created successfully", "success").then(function() {
                  location.reload();
              });;
               
             
              });
              request.fail( function ( jqXHR, textStatus) {
                
             
              });
          
    


 
}


function updatebatch()
{
  var batchs = {
    "EndDate": $('#txtto').val(),
    "StartDate": $('#txtstart').val(),
    "CourseID":$('#hdnCourseID').val(),
    "Batch_pattern":$('#txtBatchpattern').val(),
    "Timeing":$('#txttimeing').val(),
    "BatchfillingStatus":$('#txtFillingStatus').val()
  };
  var postData = {
    batch: batchs,
    id:$("#hdnBatchId").val()
  }

         var request = $.ajax({
            url: 'update',
            type: 'POST',
            data: {postData:postData} ,
            dataType: 'JSON'
            });
            request.done( function ( data ) {
              swal(" Course Batch Updated !", " Course Batch Updated successfully", "success").then(function() {
                location.reload();
            });
         
              });
              request.fail( function ( jqXHR, textStatus) {
                
             
              });
          
    


 
}


  