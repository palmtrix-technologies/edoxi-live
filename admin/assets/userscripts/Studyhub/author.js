
function edit(name, slug, title, desc,el,id)
{
  $("#txt_authorname").val(name);
  $("#txt_authorslug").val(slug);
  $("#txt_Metatitle").val(title);
  $("#txt_metadescription").val(desc);
  $("#hdn_field").val(id);
  
 
  tinymce.remove("#txt_profile");
  $("textarea#txt_profile").val($(el).attr("dataval"));
  initTyny("txt_profile");
}


$( document ).ready(function() {
  

   initTyny("txt_profile");
     
      
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



$("#btn_submit").click(function() {
  
 $("#submitimage").submit();
    
});




$(document).ready(function(){  
  $('#submitimage').on('submit', function(e){  
    var formdata = new FormData(this);
    formdata.append("profile", tinyMCE.get("txt_profile").getContent());
       e.preventDefault();  
            $.ajax({  
                 url:"authorupload",   
                 method:"POST",  
                 data:formdata,  
                 contentType: false,  
                 cache: false,  
                 processData:false,  
                 success:function(data)  
                 {  
                   $id=$.trim(data);
                   if($id!="no file")
                   {
                     $("#hdn_field").val();
                     swal("success!", " author updation successful", "success").then(function() {
                      location.reload();
                           });;
                   }
                   else{
                    swal("Upload failed!", " Please check your file", "error");
                   }
                       
                 },
                 error: function (error) {
                  alert('error; ' + eval(error));
                  }
            });  
         
  });  
});  

  