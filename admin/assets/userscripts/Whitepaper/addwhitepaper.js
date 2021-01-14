

$( document ).ready(function() {
   
      initTyny("txt_content");
      initTyny("txt_advantage");
      initTyny("txt_email");
      
      
      
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
  
    
    // Addcasestudy();
   $( "#submitimage" ).submit();
    
  });

  $(document).ready(function(){  
    $('#submitimage').on('submit', function(e){  
      var formdata = new FormData(this);
      formdata.append("imgtype", "Logo");
         e.preventDefault();  
              $.ajax({  
                   url:"whitepaperupload",   
                   method:"POST",  
                   data:formdata,  
                   contentType: false,  
                   cache: false,  
                   processData:false,  
                   success:function(data)  
                   {  
                    addwhitepaper(JSON.parse(data))
                  
                   },
                   error: function (error) {
                    alert('error; ' + eval(error));
                    console.log(eval(error));
                    }
              });  
           
    });  
});  

function addwhitepaper(data)
{
   
    var Casestudy = {
        "Whitepaper_name": $('#txt_white_name').val(),
        "slug": $('#txt_slug').val(),
        "seo_tittle": $('#txt_seotittle').val(),
        "meta_keyword": $('#txt_metakeyword').val(),
        "meta_description": $('#txtMetadesctiption').val(),
        "Banner_image_alt": $('#img_alttext').val(),
        "Banner_image_meta": $('#img_metatag').val(),
        "Email_content": tinymce.get("txt_email").getContent(),
        "Content": tinymce.get("txt_content").getContent(),
        "Advantage": tinymce.get("txt_advantage").getContent(),
        "Whitepaper_file":data.whitepaperfile,
        "Banner_image":data.Bannerimage,
        "Tittle": $('#txt_Tittle').val(),
        "Sub_tittle": $('#txt_subtittle').val()
       
        
      };

      var postData = {
        whitepaper: Casestudy,
      }
     

         var request = $.ajax({
            url: 'Createwhitepaper',
            type: 'POST',
            data: {postData:postData} ,
            dataType: 'JSON'
            });
            request.done( function ( data ) {
                $id=$.trim(data);
               
                swal("whitepaper Created!", "new whitepaper created successfuly", "success");
         
              });
              request.fail( function ( jqXHR, textStatus) {
                
             
              });
          
    


 
}

