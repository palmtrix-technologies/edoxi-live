
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
      var itemid=[]; 


$( document ).ready(function() {
  initTyny("bannerbullet");
    $("#txt_cate_name").change(function(){
      var slug=$(this).val().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
      $("#txt_slug").val(slug)

      });
      $(".tynimce").each(function(){
      initTyny($(this).attr("id"));
      });
     
     
     var data=JSON.parse($('#selectedcatss').html());
     $.each( data, function( key, value ) {
      $.each( value, function( key, value ) {
       
        itemid.push(value);
       });
     
     });

     $('.select2').select2();
     $('.select2').val(itemid).change();
     
      $(".boxtyle").each(function(){
        $(this).val($(this).attr("selectedval"));
        });

        $("#catselectid").val($("#catselectid").attr("dataval"));
        
     
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
    var text = '<div class="child" sortno="' + count + '"><a onClick="deletes(this);"> <span class="badge pull-right bg-warning">X</span></a>'+
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
    url: '../slugexistancycheckid',
    type: 'POST',
    data: {slug:$slug,id:$("#hdn_catid").val()} ,
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
   
    "subcategory_name": $('#txt_cate_name').val(),
    "subcategory_seo_title": $('#txt_seotittle').val(),
    "subcategory_slug": $('#txt_slug').val(),
    "subcategory_meta_description": $('#txtMetadesctiption').val(),
    "subcategory_meta_keywords": $('#txt_metakeyword').val(),
    "ImageID":imageid
  };
      var postData = {
        Categorys: Category,
        id:$("#hdn_catid").val()
      }
     

         var request = $.ajax({
            url: 'updatesubcategory',
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
        id:$("#hdn_catid").val()
      }
     var request = $.ajax({
        url: 'updatesubcategorysection',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
        request.done( function ( data ) {
           
          Addsubcats(categoryid)
         
          });
          request.fail( function ( jqXHR, textStatus) {
            Addsubcats(categoryid)
         
          });

}

function Addsubcats(catId)
{
    var contents= $('.select2').val();
    if(contents.length==0)
    {
      contents=itemid;
    }
    var cv=[];
    for(i=0; i < contents.length; i++){
     
         var Sectionslist={
             "SubCategoryId":catId,
             "CategoryId": contents[i]
            }
            cv.push(Sectionslist); 
     } 
 
     var postData = {
        related: cv,
        id:catId
      }
     
      var request = $.ajax({
        url: 'updatesubcategoryscategory',
        type: 'POST',
        data: {postData:postData} ,
        dataType: 'JSON'
        });
        request.done( function ( data ) {
           
          swal("Sub category updated!", "sub category updated successfuly", "success");
         
          });
          request.fail( function ( jqXHR, textStatus) {
            swal("Sub category updated!", "sub category updated successfuly", "success");
         
          });

}
  