
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
      


$( document ).ready(function() {
    $("#txt_cate_name").change(function(){
      var slug=$(this).val().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
      $("#txt_slug").val(slug)

      });

      initTyny("section1");
      initTyny("bannerbullet");
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
    var Category = {
        "category_name": $('#txt_cate_name').val(),
        "category_seo_title": $('#txt_seotittle').val(),
        "category_slug": $('#txt_slug').val(),
        "category_meta_description": $('#txtMetadesctiption').val(),
        "category_meta_keywords": $('#txt_metakeyword').val(),
        "ImageID":imageid
      };
      var postData = {
        Categorys: Category,
      }
     

         var request = $.ajax({
            url: 'createcategory',
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
             "CategoryID":categoryid,
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
        url: 'addcategorysection',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
        request.done( function ( data ) {
           
          swal("Category Created!", "new category created successfuly", "success").then(function() {
            location.reload();
        });
         
          });
          request.fail( function ( jqXHR, textStatus) {
            swal("Category Created!", "new category created successfuly", "success").then(function() {
              location.reload();
          });
         
          });

}
  