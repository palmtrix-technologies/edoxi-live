
    


$( document ).ready(function() {
  

  $('.select2').select2();
 
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





function edits(id,courseid,writer,review,source,desig)
{



  $("#hdnId").val(id);
  $('#ddlcourse').select2("val", courseid);
  $('#txt_writer').val(writer);
  $('#txt_desig').val(desig);
  $('#txt_review').text($(review).parent().parent().find( "#review" ).html());
  $('#txt_source').val(source);
  $("#btn_submit").addClass("hidden");
  $("#btn_update").removeClass("hidden");
  $( "#txt_writer" ).focus();

}

$("#btn_submit").click(function() {
  
    
  Addfaq();
    
  });
  $("#btn_update").click(function() {
  
    
    updatefaq();
      
    });
  

function Addfaq()
{
  var data = {
    "testimonial_course": $('#ddlcourse').val(),
    "testimonial_name": $('#txt_writer').val(),
    "testimonial_review":$('#txt_review').val(),
    "testimonial_sourse":$('#txt_source').val(),
    "Designation":$('#txt_desig').val()
  };
      var postData = {
        testi: data
      }
      console.log(data);

    
         var request = $.ajax({
            url: 'Testimonials/add',
            type: 'POST',
            data: {postData:postData} ,
            dataType: 'JSON'
            });
            request.done( function ( data ) {
                // $id=$.trim(data);
                // addcategorysections($id);
                swal(" Testimonial Created !", " Testimonial Created successfully", "success").then(function() {
                  location.reload();
              });;
                
             
              });
              request.fail( function ( jqXHR, textStatus) {
                
             
              });
          
    


 
}


function updatefaq()
{
  
    var data = {
        "testimonial_course": $('#ddlcourse').val(),
        "testimonial_name": $('#txt_writer').val(),
        "testimonial_review":$('#txt_review').val(),
        "testimonial_sourse":$('#txt_source').val(),
        "Designation":$('#txt_desig').val()
      };
      var postData = {
        testi: data,
        id:$('#hdnId').val()
      }
      console.log(postData);

         var request = $.ajax({
            url: 'Testimonials/update',
            type: 'POST',
            data: {postData:postData} ,
            dataType: 'JSON'
            });
            request.done( function ( data ) {
              swal(" Testimonial Updated !", " Testimonial Updated successfully", "success").then(function() {
                location.reload();
            });
                
         
             
              });
              request.fail( function ( jqXHR, textStatus) {
                
             
              });
          
    


 
}


  