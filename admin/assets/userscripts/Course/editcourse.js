
      function countChar(val) {
        var len = val.value.length;
        if (len >= 500) {
          val.value = val.value.substring(0, 500);
        } else {
          $('#charNum').text(500 - len);
        }
      };
   function deletes(e)
      {
        var id=$(e).parent().find('textarea').attr('id');
     
        var ids="#"+id+"";
        
        tinymce.remove(ids);
        $(e).parent().remove();

       
      }
      
      

var select_cat=[];
var select_related=[];
var select_acc=[];
$( document ).ready(function() {
    // $("#txt_cate_name").change(function(){
    //   var slug=$(this).val().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
    //   $("#txt_slug").val(slug)

    //   });

    initTyny("bannerbullet");
      $(".tynimce").each(function(){
      initTyny($(this).attr("id"));
      });

      $(".boxtyle").each(function(){
        $(this).val($(this).attr("selectedval"));
      });

        $('.select2').select2();
     var selectedcat=JSON.parse($('#selectedcatss').html());
     $.each( selectedcat, function( key, value ) {
      $.each( value, function( key, value ) {
       if(key=="Subcatparentid")
       {
        select_cat.push(value);
       }
       });
     
     });



     var selectedAccrediations=JSON.parse($('#selectedAccrediations').html());
     $.each( selectedAccrediations, function( key, value ) {
      $.each( value, function( key, value ) {
        if(key=="accreditationsID")
        {
        select_acc.push(value);
        }
       });
     
     });


     var selectedrelatedcourses=JSON.parse($('#selectedrelatedcourses').html());
     console.log(selectedrelatedcourses);
     $.each( selectedrelatedcourses, function( key, value ) {
      $.each( value, function( key, value ) {
        if(key=="replatedcourseId")
        {
        select_related.push(value);
        }
       });
     
     });
    //  console.log(select_cat);
     $('#subcatid').val(select_cat).change();
     $('#Accrediations').val(select_acc).change();
     $('#relatedcourses').val(select_related).change();
     
     make_portable();
      
      
});

function make_portable()
{
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
}


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
    var text = '<div class="child" sortno="' + count + '">   <a onClick="deletes(this);"> <span class="badge pull-right bg-warning">X</span></a>'+
    '<select name="boxtyle" class="form-control boxtyle" id="boxtyle"><option value="Normal">Normal</option><option value="bullet-box-with-bg">bullet-box-with-bg</option><option value="bullet-box-list">bullet-box-list</option><option value="bullet-box-without-bg">bullet-box-without-bg</option><option value="bullet-box-most-popular">bullet-box-most-popular</option></select>'+
    '<textarea class="tynimce" id="section' + count + '"></textarea></div>';
    $(".parent").append(text);
    initTyny("section" + count);
    $("#hdnCount").val(count);
    make_portable();
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
  $slug=$('#txt_slug').val()
  var request = $.ajax({
    url: '../slugexistancycheckid',
    type: 'POST',
    data: {slug:$slug,id:$("#txtcourseid").val()} ,
    dataType: 'JSON'
    });
    request.done( function ( data ) {
        if(data==null)
        {
          var fileName = $("#file").val();
          if(fileName)
          {
           $( "#submitimage" ).submit();
          }
          else{
            $id=$("#imgid").val();
            $( "#submitimage" ).submit();
          }
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
                   url:"../imageupload",   
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
        id:$("#txtcourseid").val()
      }
     

         var request = $.ajax({
            url: 'updatecourse',
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
        id:categoryid
      }
     var request = $.ajax({
        url: 'updateCoursesection',
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
    if(contents.length==0)
    {
      contents=select_cat;
    }
    var cv=[];
    console.log(contents);
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
        url: 'update-coursecategory',
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
    var contents= $('#Accrediations').val();
    
    if(contents.length==0)
    {
      contents=select_acc;
    }
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
        url: 'update-Course-accreditations',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
        request.done( function ( data ) {
           
          swal("Course Updated!", "Course updated successfuly", "success");
         
          });
          request.fail( function ( jqXHR, textStatus) {
            swal("Course Updated!", "Course updated successfuly", "success");
         
          });

}




function Addrelatedcourses(courseId)
{
    var contents= $('#relatedcourses').val();
    console.log(contents);
    if(contents.length==0)
    {
      contents=select_related;
    }
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
        id:courseId
      }
     var request = $.ajax({
        url: 'updaterealatedcourses',
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
