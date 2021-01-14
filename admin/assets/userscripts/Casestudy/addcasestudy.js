
      function countChar(val) {
        var len = val.value.length;
        if (len >= 500) {
          val.value = val.value.substring(0, 500);
        } else {
          $('#charNum').text(500 - len);
        }
      };

      


$( document ).ready(function() {
   
      initTyny("txt_casestudy");
      
      
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
   $( "#submitheaders" ).submit();
    
  });

  $(document).ready(function(){  
    $('#submitheaders').on('submit', function(e){  
      var formdata = new FormData(this);
      formdata.append("imgtype", "Logo");
         e.preventDefault();  
              $.ajax({  
                   url:"multiimageupload",   
                   method:"POST",  
                   data:formdata,  
                   contentType: false,  
                   cache: false,  
                   processData:false,  
                   success:function(data)  
                   {  
                    Addcasestudy(JSON.parse(data))
                  
                   },
                   error: function (error) {
                    alert('error; ' + eval(error));
                    console.log(eval(error));
                    }
              });  
           
    });  
});  

function Addcasestudy(data)
{
   
    var Casestudy = {
        "CompanyName": $('#txtCompanyname').val(),
        "slug": $('#txt_slug').val(),
        "Meta_tittle": $('#txt_metatittle').val(),
        "Metadescription": $('#txt_metadescription').val(),
        "Banner_image_alt": $('#img_alttext').val(),
        "Banner_image_meta": $('#img_metatag').val(),
        "Case_study_tittle": $('#txttittle').val(),
        "Casestudy_shortDesc": $('#txtshortdescription').val(),
        "Industry": $('#txt_industry').val(),
        "Training_used": $('#txt_trainingused').val(),
        "Region": $('#txt_Region').val(),
        "Goal": $('#txt_goal').val(),
        "Obstacle": $('#txt_obstracle').val(),
        "Result_overview": $('#txt_overviewResult').val(),
        "testi_message": $('#txt_message').val(),
        "testi_name": $('#txt_testi_name').val(),
        "testi_desig": $('#txt_testi_desig').val(),
        "result": $('#txt_Result').val(),
        "Sectiondata": tinymce.get("txt_casestudy").getContent(),
        "Logo":data.logo,
        "BannerImage":data.Banner,
        "testi_Image":data.Profile
        
      };
      var postData = {
        Casestudys: Casestudy,
      }
     

         var request = $.ajax({
            url: 'Createcasestudy',
            type: 'POST',
            data: {postData:postData} ,
            dataType: 'JSON'
            });
            request.done( function ( data ) {
                $id=$.trim(data);
               
                swal("Casestudy Created!", "new Casestudy created successfuly", "success").then(function() {
                  location.reload();
              });
         
              });
              request.fail( function ( jqXHR, textStatus) {
                
             
              });
          
    


 
}

