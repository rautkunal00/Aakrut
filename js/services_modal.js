$(document).ready(function(){  

     $('#availableWork').click(function(e){   
        e.preventDefault(); 
        var data = $('#serviceDetails').serialize();   
        data +="&College_Name=xyz";    
          $.ajax({  
               url:"php/insert_availableForWork.php",  
               method:"POST",  
               data: data,  
               success:function(data)  
               {    
                   alert("successfully added!!!");
               }  
          });  
     });  
});  