   function deletes(e)
      {
        var id=$(e).parent().find('textarea').attr('id');
     
        var ids="#"+id+"";
        
        tinymce.remove(ids);
        $(e).parent().remove();
      }
      
    


$( document ).ready(function() {
    // $("#txt_cate_name").change(function(){
    //   var slug=$(this).val().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
    //   $("#txt_slug").val(slug)

    //   });

      initTyny("section1");
      initTyny("bannerbullet");
      $('.select2').select2();
      $("#subcatid option" ).addClass("hidden");
      $(".parent").sortable({
         animation: 150, containment: "parent", cursor: "move", scroll: true, axis: "y",
          start: function(e, ui) {
             $(ui.item).find('textarea').each(function() {
                tinymce.execCommand('mceRemoveEditor', false, $(this).attr('id'));
                 }); 
                 },
          stop: function(e, ui) {
         
             $(ui.item).find('textarea').each(function() {
                tinymce.execCommand('mceAddEditor', true, $(this).attr('id')); 
                
                
                });
                Dropped();
            } 
           
      });


      $('#catselectid').on('change', function() {
        $("#subcatid option" ).addClass("hidden");
      $("#subcatid option[cat='"+this.value+"']" ).removeClass("hidden");
      $("#subcatid").val("")
      });
      
});


function Dropped(){
    
      var idno=1;
    $(".child").each(function(){
      $(this).attr("sortno",idno);
      idno++;
    });
    
  }


function addnewrow() {
    var count = $("#hdnCount").val();
    count++;
    var text = '<div class="child" sortno="' + count + '">  <a onClick="deletes(this);"> <span class="badge pull-right bg-warning">X</span></a>'+
    '<select name="boxtyle" class="form-control boxtyle" id="boxtyle"><option value="Normal">Normal</option><option value="bullet-box-with-bg">bullet-box-with-bg</option><option value="bullet-box-list">bullet-box-list</option><option value="bullet-box-without-bg">bullet-box-without-bg</option><option value="bullet-box-most-popular">bullet-box-most-popular</option></select>'+
    '<textarea class="tynimce" id="section' + count + '"></textarea></div>';
    $(".parent").append(text);
    initTyny("section" + count);
    $("#hdnCount").val(count);
}



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
  
    
  var values = $('.select2').val();

  $slug=$('#txt_slug').val()
  var request = $.ajax({
    url: 'slugexistancycheck',
    type: 'POST',
    data: {slug:$slug} ,
    dataType: 'JSON'
    });
    request.done( function ( data ) {
        if(data==null)
        {
          $( "#submitimage" ).submit();
        }
        else{
          swal("Duplication!", "slug duplicated!! Please check", "error");
        }
       
     
      });
      request.fail( function ( jqXHR, textStatus) {
        
     
      });
    
  });

  $(document).ready(function(){  
    $('#submitimage').on('submit', function(e){  
      var formdata = new FormData(this);
      formdata.append("bulletval", tinyMCE.get("bannerbullet").getContent());
         e.preventDefault();  
              $.ajax({  
                   url:"imageupload",   
                   method:"POST",  
                   fileElementId:'userfile',
                   data:formdata,  
                   contentType: false,  
                   cache: false,  
                   processData:false,  
                   success:function(data)  
                   {  
                       $id=$.trim(data);
                       Addcourse($id);
                         
                   },
                   error: function (error) {
                    alert('error; ' + eval(error));
                    }
              });  
           
    });  
});  

function Addcourse(imageid)
{
    var Category = {
        // "course_category":$("#catselectid").val(),
        // "course_subcategory":$("#subcatid").val(),
        // "course_accreditation":$("#Accrediations").val(),
        "course_name":$("#txt_course_name").val(),
        "course_seo_title": $('#txt_seotittle').val(),
        "course_slug": $('#txt_slug').val(),
        "course_meta_description": $('#txtMetadesctiption').val(),
        "course_meta_keywords": $('#txt_metakeyword').val(),
        "course_title": $('#txt_coursetittle').val(),

        "course_caption": $('#txt_courseCaption').val(),
        "course_duration": $('#txt_courseduration').val(),
        "ImageID":imageid
      };
      var postData = {
        Coursedetails: Category,
      }
     

         var request = $.ajax({
            url: 'Createcourse',
            type: 'POST',
            data: {postData:postData} ,
            dataType: 'JSON'
            });
            request.done( function ( data ) {
                $id=$.trim(data);
                addcategorysections($id);
             
              });
              request.fail( function ( jqXHR, textStatus) {
                
             
              });
          
    


 
}

function addcategorysections(categoryid)
{
    var contents=[];
    for(i=0; i < tinymce.editors.length; i++){
      if(tinymce.editors[i].id!="bannerbullet")
      {
        var content =tinymce.get(tinymce.editors[i].id).getContent();
        var sortingorder=$("#"+tinymce.editors[i].id).parent().attr("sortno");
        var style=$("#"+tinymce.editors[i].id).parent().find("#boxtyle").val();
        
         var Sectionslist={
             "courseId":categoryid,
             "Classname": style,
             "SortOrder": sortingorder,
             "Content": content,
             "Status": 1,
            }
            contents.push(Sectionslist); 
      }
     } 
 
     var postData = {
        Categorys: contents,
      }
     var request = $.ajax({
        url: 'addCoursesection',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
        request.done( function ( data ) {
         
          Addrelatedcourses(categoryid);
         
          });
          request.fail( function ( jqXHR, textStatus) {
            Addrelatedcourses(categoryid);
         
          });

}


function Addcategorycourses(courseId)
{
    var contents= $('#subcatid').val();
    var cv=[];
    for(i=0; i < contents.length; i++){
     
         var Sectionslist={
             "CourseId":courseId,
             "Subcatparentid": contents[i]
            }
            cv.push(Sectionslist); 
     } 
 
     var postData = {
        related: cv,
        id:courseId,
        cc:contents
      }
     var request = $.ajax({
        url: 'add-coursecategory',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
        request.done( function ( data ) {
          AddCourse_accreditations(courseId);
         
          });
          request.fail( function ( jqXHR, textStatus) {
            AddCourse_accreditations(courseId);
         
          });

}
function AddCourse_accreditations(courseId)
{
    var contents= $('#subcatid').val();
    var cv=[];
    for(i=0; i < contents.length; i++){
     
         var Sectionslist={
             "CourseID":courseId,
             "accreditationsID": contents[i]
            }
            cv.push(Sectionslist); 
     } 
 
     var postData = {
        related: cv,
        id:courseId
      }
     var request = $.ajax({
        url: 'add-Course-accreditations',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
        request.done( function ( data ) {
           
          swal("Course Created!", "Course created successfuly", "success").then(function() {
            location.reload();
        });
         
          });
          request.fail( function ( jqXHR, textStatus) {
            swal("Course Created!", "Course created successfuly", "success").then(function() {
              location.reload();
          });
         
          });

}




function Addrelatedcourses(courseId)
{
    var contents= $('#relatedcourses').val();
    var cv=[];
    for(i=0; i < contents.length; i++){
      
         var Sectionslist={
             "CourseId":courseId,
             "replatedcourseId": contents[i]
            }
            cv.push(Sectionslist); 
     } 
 
     var postData = {
        related: cv,
      }
     var request = $.ajax({
        url: 'addrealatedcourses',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
        request.done( function ( data ) {
           
          Addcategorycourses(courseId);
         
          });
          request.fail( function ( jqXHR, textStatus) {
            Addcategorycourses(courseId);
         
          });

}

  