
    


$( document ).ready(function() {
  

      initTyny("section1");
     
      
});




function initTyny(name) {

    var abc = "textarea#" + name;
    tinymce.init({
        selector: abc,
        height: 200,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: ' undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help ',
        setup: function(editor) {
            /* Menu items are recreated when the menu is closed and opened, so we need
               a variable to store the toggle menu item state. */
            var toggleState = false;
           

        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
}

//ajax start

function EditFaq(id)
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

          
          $("#hdnfaqId").val(data.faq_id);
          $('#txt_tittle').val(data.faq_title);
          tinyMCE.get("section1").setContent(data.faq_description);
          $("#btn_submit").addClass("hidden");
          $("#btn_update").removeClass("hidden");
          });
          request.fail( function ( jqXHR, textStatus) {
            
         
          });

}

function DeleteFaq(id)
{

  
  var postData = {
    id: id
  }

     var request = $.ajax({
        url: 'delete',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
        request.done( function ( data ) {
          swal(" Course Faq deleted !", " Course Faq deleted successfully", "success").then(function() {
            location.reload();
          });
        });
          request.fail( function ( jqXHR, textStatus) {
            
         
          });

}



$("#btn_submit").click(function() {
  
    
  Addfaq();
    
  });
  $("#btn_update").click(function() {
  
    
    updatefaq();
      
    });
  

function Addfaq()
{
    var faqs = {
        "faq_description": tinyMCE.get("section1").getContent(),
        "faq_title": $('#txt_tittle').val(),
        "course_faq_id":$('#hdnCourseID').val()
      };
      var postData = {
        faq: faqs
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
                swal(" Course Faq Created !", " Course Faq Created successfully", "success").then(function() {
                  location.reload();
              });;
                $("#hdnfaqId").val("");
                $('#txt_tittle').val("");
                tinyMCE.get("section1").setContent("");
             
              });
              request.fail( function ( jqXHR, textStatus) {
                
             
              });
          
    


 
}


function updatefaq()
{
    var faqs = {
        "faq_description": tinyMCE.get("section1").getContent(),
        "faq_title": $('#txt_tittle').val(),
        "course_faq_id":$('#hdnCourseID').val()
      };
      var postData = {
        faq: faqs,
        id:$('#hdnfaqId').val()
      }

         var request = $.ajax({
            url: 'update',
            type: 'POST',
            data: {postData:postData} ,
            dataType: 'JSON'
            });
            request.done( function ( data ) {
              swal(" Course Faq Updated !", " Course Faq Updated successfully", "success").then(function() {
                location.reload();
            });
                
          $("#hdnfaqId").val("");
          $('#txt_tittle').val("");
          tinyMCE.get("section1").setContent("");
          $("#btn_update").addClass("hidden");
          $("#btn_submit").removeClass("hidden");
             
              });
              request.fail( function ( jqXHR, textStatus) {
                
             
              });
          
    


 
}


  