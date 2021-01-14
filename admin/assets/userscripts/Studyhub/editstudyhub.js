
      function countChar(val) {
        var len = val.value.length;
        if (len >= 500) {
          val.value = val.value.substring(0, 500);
        } else {
          $('#charNum').text(500 - len);
        }
      };

      


$( document ).ready(function() {
    $("#txt_cate_name").change(function(){
      var slug=$(this).val().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
      $("#txt_slug").val(slug)

      });
      $(".tynimce").each(function(){
      initTyny($(this).attr("id"));
      });

      $('.select2').select2();
     
      $(".boxtyle").each(function(){
        $(this).val($(this).attr("selectedval"));
        });
     
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
    var text = '<div class="child" sortno="' + count + '">'+
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
  

  $( "#submitimage" ).submit();




});

$(document).ready(function(){  
$('#submitimage').on('submit', function(e){  
var formdata = new FormData(this);
formdata.append("authorid", $("#ddl_author").val());
e.preventDefault();  
     $.ajax({  
          url:"../studyupload",   
          method:"POST",  
          fileElementId:'userfile',
          data:formdata,  
          contentType: false,  
          cache: false,  
          processData:false,  
          success:function(data)  
          {  
              $id=$.trim(data);
              addcategory($id);
                
          },
          error: function (error) {
           alert('error; ' + eval(error));
           }
     });  
  
});  
});  

function addcategory(imageid)
{
var contents= $('.select2').val();
var cv=[];
for(i=0; i < contents.length; i++){

var Sectionslist={
  "ci_studyhubid":imageid,
  "ci_studyhub_repeted": contents[i]
 }
 cv.push(Sectionslist); 
} 

var postData = {
related: cv,
id:imageid
}
var request = $.ajax({
url: '../update-studyhubrelated',
type: 'POST',
data: {postData:postData} ,
dataType: 'JSON'
});
request.done( function ( data ) {

addcategorysections(imageid);

});
request.fail( function ( jqXHR, textStatus) {
 
 addcategorysections(imageid);

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
    "studyhub_id":categoryid,
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
url: '../update-studyhubsection',
type: 'POST',
data: {postData:postData} ,
dataType: 'JSON'
});
request.done( function ( data ) {
  
 swal("Study hub Created!", "new study hub created successfuly", "success");

 });
 request.fail( function ( jqXHR, textStatus) {
   swal("Study hub Created!", "new study hub created successfuly", "success");

 });

}
  