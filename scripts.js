$(document).ready(function(){  
     lightbox.option({
      'resizeDuration': 100,
      'wrapAround': true,
      'maxHeight': '500'
    });
     
   $('#upload').change(function() {
        var filename = $(this).val();
        var lastIndex = filename.lastIndexOf("\\");
        if (lastIndex >= 0) {
            filename = filename.substring(lastIndex + 1);
        }
        $('#filename').val(filename);
    });
   $('.right').on('click',function(){
       var folder = prompt("Podaj nazwę folderu: "); 
      $.ajax({
         url:'makefolder.php',
         async:false,
         type:'POST',
         dataType:'JSON',
         data:{
            folder:folder 
           },
           success:function(){location.reload();}
         });
         
          
      });
  
   });
   