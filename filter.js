    $('input.cat').on('click',function(e){
         e=window.event.target;
         if($(e).hasClass('selected')){
            
         }else{
                $('input.cat').removeClass('selected');
                $(e).addClass('selected');
                $('.elements').fadeOut(600);
                filterfolders();
            }
     });
   

function filterfolders(){
    var folder = $('.selected').val();
         $.ajax({
            url:'filterphotos.php',
            async:false,
            type:'POST',
            dataType:'JSON',
            data:{
               folder:folder 
              },
           success:function(data){
               data = data.slice(0,data.length-3);
               var result = data.toString().split('|||');
               var string = '';
                
               for(var i=0;i<result.length;i+=3){ 
                 var r = $('.selected').val();
                 var bg='';
                 if(r != 'bez folderu' && r != 'Bez folderu'){
                     r = r.length;
                     bg += result[i].slice(0,2)+'/'+result[i].slice(3,10)+'/'+result[i].slice(11,11+r)+"/"+result[i].slice(12+r,result[i].length);
                 }else
                bg += result[i].slice(0,2)+'/'+result[i].slice(3,10)+'/'+result[i].slice(11,result[i].length);
               
                string += '<div class="el"><a href="'+result[i]+'" data-lightbox="roadtrip" data-title="'+result[i+1]+'"><div class="miniturePicture" style="background-image:url('+bg+');" ></div></a><div class="name">'+result[i+2]+'</div><input class="path" value="'+result[i+1]+'"></div>';
               }$('.elements').hide();
               $('.elements').html(string);
               $('.elements').fadeIn(600);
           },
           error:function(data){alert('nope');}
         });
     }
     filterfolders();
     $('.cat').on('click',function(){
        
         filterfolders(e);
     });